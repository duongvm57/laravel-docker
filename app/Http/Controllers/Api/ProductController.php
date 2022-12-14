<?php

namespace App\Http\Controllers\Api;

use App\Enums\MessageStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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
        ], 200);
    }

    public function store(ProductRequest $request, ProductService $productService): JsonResponse
    {
        $data = $request->input();
        $product = $this->productService->store($data);
        if($product) {
            return response()->json([
                'message' => MessageStatus::SUCCESS,
                'data' => $product,
            ], 200);
        }
        return response()->json([
            'message' => MessageStatus::ERROR,
        ], 400);
    }
}
