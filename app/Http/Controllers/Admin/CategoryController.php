<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = CategoryService::getAllCategories();
        return view('admin/categories/index', compact('categories'));
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(CategoryRequest $request)
    {
        if (CategoryService::storeCategory($request->validated())) {
            return redirect()->route('categories.index')->with('store_success', 'Store success!');
        } else {
            return redirect()->route('categories.create')->with('store_success', 'Store wrong!');
        }
    }

    public function edit(int $id)
    {
        $category = CategoryService::getCategoryById($id);
        return view('admin/categories/edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        if (CategoryService::updateCategory($request->validated(), $id)) {
            return redirect()->route('categories.index')->with('update_success', 'Update success!');
        } else {
            return redirect()->route('categories.edit', $id)->with('update_wrong', 'Update wrong!');
        }
    }

    public function destroy($id)
    {
        if (CategoryService::deleteCategoryWithChildren($id)) {
            return redirect()->route('categories.index')->with('delete_success', 'Delete success!');
        } else {
            return redirect()->route('categories.index')->with('delete_wrong', 'Delete wrong!');
        }
    }
}
