<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        View::share('categories', $categories);
        View::share('ps_options', $this->pageSizeOptions());
        View::share('sort_options', $this->sortingOptions());
    }

    protected function pageSizeOptions(): array
    {
        return [10, 20, 50];
    }

    protected function sortingOptions(): array
    {
        return [
            'date' => 'Release Date',
            'price' => 'Price: Low to High',
            'price_desc' => 'Price: High to Low',
            'rating' => 'Avg. Rating',
        ];
    }
}
