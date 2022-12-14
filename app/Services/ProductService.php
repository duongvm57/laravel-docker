<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class ProductService
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getColumns()->get();
    }

    public function store($data)
    {
        return $this->productRepository->store($data);
    }
}
