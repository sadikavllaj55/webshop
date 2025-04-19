<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $minPrice;
    public $maxPrice;
    public $search;
    public $category;

    public function updating($field)
    {
        // Reset pagination when filters change
        if (in_array($field, ['search', 'category_id'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Product::query();

        if ($this->minPrice !== null) {
            $query->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice !== null) {
            $query->where('price', '<=', $this->maxPrice);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category) {
            $query->where('category_id', $this->category);
        }

        $products = $query->paginate(6); // 6 items per page
        $categories = Category::all();

        return view('livewire.product-list', compact('products', 'categories'));
    }
}
