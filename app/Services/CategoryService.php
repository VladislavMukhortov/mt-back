<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public static function getAllCategories(): Collection
    {
        return self::getAllCategoriesWithProductsAmount();
    }

    public static function getCategoryById(int $id): Category
    {
        return Category::find($id);
    }

    public static function storeCategory(array $data): bool
    {
        if (Category::create($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateCategory(array $data, int $id): bool
    {
        if (Category::find($id)->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteCategoryWithChildren(int $id): bool
    {
        $category = Category::find($id);

        if ($category) {
            $category->products()->delete();
            $category->delete();
            return true;
        } else {
            return false;
        }
    }

    public static function getAllCategoriesWithProductsAmount()
    {
        $categories = Category::all();

        foreach ($categories as $key => $category) {
            foreach ($category->products()->get() as $product) {
                $categories[$key]->productAmount += $product->items_left;
            }
        }

        return $categories;
    }
}
