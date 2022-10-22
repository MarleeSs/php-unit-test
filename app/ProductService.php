<?php

namespace Punit\Test;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {
    }

    /**
     * @throws \Exception
     */
    public function register(Product $product): Product
    {
        if ($this->repository->findById($product->getId()) != null) {
            throw new \Exception("Product already exist");
        }
        return $this->repository->save($product);
    }

    public function delete(string $id)
    {
        $product = $this->repository->findById($id);
        if ($product == null) {
            throw new \Exception("Product not found");
        }
        $this->repository->delete($product);
    }
}