<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'first_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAddressHtml(): string
    {
        $countries = View::getShared()['countries'];

        $html = $this->fullName() . '<br>' . $this->address_line_1;

        if ($this->address_line_1) {
            $html .= '<br>' . $this->address_line_2;
        }
        $html .= $this->city . ', ' . $countries[$this->country] . '<br>' . $this->postal_code;

        return $html;
    }
}
