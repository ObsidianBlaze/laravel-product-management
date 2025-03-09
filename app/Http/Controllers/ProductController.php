<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * List all products.
     *
     * Returns a list of all available products.
     *
     * @group Products
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Keyboard",
     *       "category": "Electronics",
     *       "status": "available",
     *       "created_at": "2025-03-09T12:00:00.000000Z",
     *       "updated_at": "2025-03-09T12:00:00.000000Z"
     *     },
     *     {
     *       "id": 2,
     *       "name": "Laptop",
     *       "category": "Electronics",
     *       "status": "unavailable",
     *       "created_at": "2025-03-09T12:05:00.000000Z",
     *       "updated_at": "2025-03-09T12:05:00.000000Z"
     *     }
     *   ]
     * }
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }   /**
     * Create a new product.
     *
     * @group Products
     * @bodyParam name string required The name of the product. Example: "Samsung"
     * @bodyParam category string required The product category. Example: "Electronics"
     * @bodyParam status string required The product status (available/unavailable). Example: "available"
     * @response 201 {
     *   "data": {
     *     "id": 1,
     *     "name": "Samsung",
     *     "category": "Electronics",
     *     "status": "available",
     *     "created_at": "2025-03-09T12:00:00.000000Z",
     *     "updated_at": "2025-03-09T12:00:00.000000Z"
     *   }
     * }
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Show a product.
     *
     * Fetches details of a specific product by ID.
     *
     * @group Products
     * @urlParam id int required The ID of the product. Example: 1
     * @response 200 {
     *   "data": {
     *     "id": 1,
     *     "name": "Redmi",
     *     "category": "Electronics",
     *     "status": "available",
     *     "created_at": "2025-03-09T12:00:00.000000Z",
     *     "updated_at": "2025-03-09T12:00:00.000000Z"
     *   }
     * }
     * @response 404 {"message": "Product not found"}
     */
    public function show($id): JsonResponse|ProductResource
    {
        try {
            $product = Product::findOrFail($id);
            return new ProductResource($product);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
