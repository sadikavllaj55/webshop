<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Address;
use App\Models\PaymentData;
use App\Models\ShoppingCart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout(): View
    {
        return view('orders.checkout');
    }

    public function create(CreateOrderRequest $request): RedirectResponse
    {
        $order = DB::transaction(function () use ($request) {
            $cart = ShoppingCart::fromSession();
            $data = $request->all();

            $address = Address::query()->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address_line_1' => $data['address'],
                'address_line_2' => $data['address2'],
                'city' => $data['city'],
                'state' => $data['state'],
                'country' => $data['country'],
                'postal_code' => $data['postal_code'],
            ]);

            $payment = PaymentData::create([
                'payment_method' => $request->payment_type,
                'data' => [
                    'card_nr' => $request->card_nr,
                    'card_name' => $request->card_name,
                    'card_expiry' => $request->card_expiry,
                    'card_cvc' => $request->card_cvc
                ]
            ]);

            $data['address_id'] = $address->id;
            $data['payment_id'] = $payment->id;
            $data['reference_id'] = Str::uuid();
            $data['total_price'] = $cart->getTotal();
            $data['status'] = 'pending';

            $order = Order::query()->create($data);

            $order->items()->saveManyQuietly($cart->getItemsForInsert());

            $cart->clear();

            return $order;
        });

        return redirect(route('orders.show', $order->reference_id));
    }

    public function show(string $id): View
    {
        $order = Order::with(['items.product.image', 'address'])->where('reference_id', $id)->firstOrFail();

        return view('orders.view', compact('order'));
    }

    public function storePayment(Request $request)
    {
        return PaymentData::create([
            'type' => 'paypal',
            'data' => [
                'card_number' => $request->card_nr,
                'card_name' => $request->card_name,
                'card_expiry' => $request->card_expiry,
                'card_cvc' => $request->card_cvc
            ],
        ]);
    }

    public function thankYou()
    {
        return view('checkout.thankyou');
    }
}
