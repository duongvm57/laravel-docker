<?php

namespace App\Http\Controllers\Api;

use App\Enums\MessageStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use \Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => MessageStatus::SUCCESS,
            'data' => $this->productService->getAll()
        ]);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'message' => MessageStatus::SUCCESS,
            'data' => $this->productService->show($product),
        ]);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $data = $request->validated();
        $product = $this->productService->store($data);
        if ($product) {
            return response()->json([
                'message' => MessageStatus::SUCCESS,
                'data' => $product,
            ]);
        }
        return response()->json([
            'message' => MessageStatus::ERROR,
        ], 400);
    }

    public function update(Product $product, ProductRequest $request): JsonResponse
    {
        $data = $request->validated();
        $product = $this->productService->update($product, $data);
        if ($product) {
            return response()->json([
                'message' => MessageStatus::SUCCESS,
                'data' => $product,
            ]);
        }
        return response()->json([
            'message' => MessageStatus::ERROR,
        ], 400);
    }
}
