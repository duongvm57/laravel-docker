<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductService
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getColumns(['*'], ['category:id,name,slug']);
    }

    public function show(Product $product): Product
    {
        return $product;
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $product = $this->productRepository->store($data);
            if (isset($data['images'])) {
                $product->addMultipleMediaFromRequest(['images'])
                    ->each(fn($fileAdder) => $fileAdder->toMediaCollection('products'));
            }
            DB::commit();
            return $product;
        } catch (Exception $exception) {
            report($exception);
            DB::rollBack();
            return false;
        }
    }

    public function update(Product $product, $data)
    {
        DB::beginTransaction();
        try {
            if(isset($data['images'])) {
                $product->clearMediaCollection('products');
                $product->addMultipleMediaFromRequest(['images'])
                    ->each(fn($fileAdder) => $fileAdder->toMediaCollection('products'));
            }
            $this->productRepository->update($product, $data);
            DB::commit();
            return $product;
        } catch (Exception $exception) {
            report($exception);
            DB::rollBack();
            return false;
        }
    }
}
