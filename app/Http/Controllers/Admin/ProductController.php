<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductService::getAllProducts();

        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = CategoryService::getAllCategories();
        return view('admin/products/create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        if (ProductService::storeProduct($request->validated())) {
            return redirect()->route('products.index')->with('store_success', 'Store success!');
        } else {
            return redirect()->route('products.create')->with('store_success', 'Store wrong!');
        }
    }

    public function edit(int $id)
    {
        $product = ProductService::getProductById($id);
        $categories = CategoryService::getAllCategories();

        return view('admin/products/edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        if (ProductService::updateProduct($request->validated(), $id)) {
            return redirect()->route('products.index')->with('update_success', 'Update success!');
        } else {
            return redirect()->route('products.edit', $id)->with('update_wrong', 'Update wrong!');
        }
    }

    public function destroy($id)
    {
        if (ProductService::deleteProduct($id)) {
            return redirect()->route('products.index')->with('delete_success', 'Delete success!');
        } else {
            return redirect()->route('products.index')->with('delete_wrong', 'Delete wrong!');
        }
    }
}
