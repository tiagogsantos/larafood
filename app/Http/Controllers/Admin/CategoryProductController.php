<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryProductController extends Controller
{
    protected $profile, $permission;

    public function __construct(Product $product, Category $category,)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function categories($idProduct)
    {
        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.profiles.permissions.permissions', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function products($idCategory)
    {
        if (!$product = $this->product->find($idCategory)) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.permissions.profiles.profile', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', [
            'product' => $product,
            'categories' => $categories,
            'filters' => $filters
        ]);
    }

    public function attachCategoriProduct(Request $request, $idProduct)
    {
        if (!$product = $this->profile->find($idProduct)) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Precisa escolher pelo menos uma categoria');
        }

        $product->categories()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $product->id);
    }

    public function detachPermissionProfile($idProduct, $idCategory)
    {
        $product = $this->profile->find($idProduct);
        $category = $this->permission->find($idCategory);

        if (!$product || !$category) {
            return redirect()->back();
        }

        $product->permissions()->detach($category);

        return redirect()->route('profiles.permissions', $product->id);
    }
}

