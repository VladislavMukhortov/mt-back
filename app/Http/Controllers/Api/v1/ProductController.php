<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductService::getAllProducts();

        return response()->json([
            'success' => true,
            'data' => [
                'products' => $products,
            ],
        ], 200);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'product' => ProductService::getProductById($id),
            ],
        ], 200);
    }


    public function update(Request $request, $id)
    {
        if (ProductService::updateProduct($request->all(), $id)) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        if (ProductService::deleteProduct($id)) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
}
