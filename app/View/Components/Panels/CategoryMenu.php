<?php

namespace App\View\Components\Panels;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class CategoryMenu extends Component
{
    private ?Category $currentCategory;

    public function __construct()
    {   
        $this->currentCategory = Route::current()->category?->load('ancestors');
    }

    public function render(): View|string|Closure
    {
        $categories = Category::withDepth()->having('depth', '<=', 2)->get()->toTree();

        return view('components.panels.category-menu', compact('categories'));
    }

    public function selectedCategory(?Category $category = null): bool
    {
        if (! Route::is('catalog')) {
            return false;
        }

        if ($category === null || $this->currentCategory === null) {
            return $this->currentCategory === $category;
        }

        return $this->currentCategory->id === $category->id || $this->currentCategory->ancestors->keyBy('id')->has($category->id);
    }
}
