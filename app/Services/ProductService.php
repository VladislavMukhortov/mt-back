<?php


namespace App\Services;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public static function getAllProducts(): Collection
    {
        $products = Product::all();
        $i = 0;
        foreach ($products as $product) {
            $parentCategory = CategoryService::getCategoryById($product->category_id);
            $products[$i]->category_name = $parentCategory->name;
            $i++;
        }
        return $products;
    }

    public static function getProductById(int $id): Product
    {
        return Product::find($id);
    }

    public static function storeProduct(array $data): bool
    {
        if (Product::create($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateProduct(array $data, int $id): bool
    {
        if (Product::find($id)->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteProduct(int $id): bool
    {
        if (Product::find($id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
