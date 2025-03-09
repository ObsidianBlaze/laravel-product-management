<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * List all products.
     *
     * Returns a list of all available products.
     *
     * @group Products
     * @response 200 {
     *   "id": 1,
     *   "name": "Keyboard",
     *   "category": "Electronics",
     *   "status": "available",
     *   "created_at": "2025-03-09T12:00:00.000000Z",
     *   "updated_at": "2025-03-09T12:00:00.000000Z"
     * }
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Create a new product.
     *
     * @group Products
     * @bodyParam name string required The name of the product. Example: "Samsung"
     * @bodyParam category string required The product category. Example: "Electronics"
     * @bodyParam status string required The product status (available/unavailable). Example: "available"
     * @response 201 {
     *   "id": 1,
     *   "name": "Samsung",
     *   "category": "Electronics",
     *   "status": "available",
     *   "created_at": "2025-03-09T12:00:00.000000Z",
     *   "updated_at": "2025-03-09T12:00:00.000000Z"
     * }
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        return response()->json($product, 201);
    }

    /**
     * Show a product.
     *
     * Fetches details of a specific product by ID.
     *
     * @group Products
     * @urlParam id int required The ID of the product. Example: 1
     * @response 200 {
     *   "id": 1,
     *   "name": "Redmi",
     *   "category": "Electronics",
     *   "status": "available",
     *   "created_at": "2025-03-09T12:00:00.000000Z",
     *   "updated_at": "2025-03-09T12:00:00.000000Z"
     * }
     * @response 404 {"message": "Product not found"}
     */
    public function show($id): JsonResponse
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
}
