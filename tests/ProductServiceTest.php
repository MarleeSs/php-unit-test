<?php

namespace Punit\Test;

use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    private ProductRepository $repository;
    private ProductService $service;

//    Stub

    public function testStub()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")->willReturn($product);

        $result = $this->repository->findById("1");
        self::assertSame($product, $result);

    }

    public function testStubMap()
    {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("2");

//        Ibarat database
        $map = [
            ["1", $product1],
            ["2", $product2]
        ];

        $this->repository->method('findById')
            ->willReturnMap($map);

        self::assertSame($product1, $this->repository->findById("1"));
        self::assertSame($product2, $this->repository->findById("2"));
    }

    public function testStubCallback()
    {
        $this->repository->method("findById")
            ->willReturnCallback(function (string $id) {
                $product = new Product();
                $product->setId($id);
                return $product;
            });
        self::assertSame("1", $this->repository->findById("1")->getId());
        self::assertSame("2", $this->repository->findById("2")->getId());
        self::assertSame("3", $this->repository->findById("3")->getId());
    }

    public function testRegisterSucces()
    {
        $this->repository->method("findById")->willReturn(null);
        $this->repository->method("save")->willReturnArgument(0);

        $product = new Product();
        $product->setId("1");
        $product->setName("contoh");

        $result = $this->service->register($product);

        self::assertEquals($product->getId(), $result->getId());
        self::assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterException()
    {
        $this->expectException(\Exception::class);

        $productInDB = new Product();
        $productInDB->setId("1");

        $this->repository->method("findById")->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");

        $this->service->register($product);
    }

    public function testDeleteSucces()
    {

        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")->willReturn($product);

        $this->service->delete("1");
        self::assertTrue(true, "Delete success");
    }

    public function testDeleteException()
    {

        $this->expectException(\Exception::class);

        $this->repository->method("findById")->willReturn(null);

        $this->service->delete("1");

    }

    protected function setUp(): void
    {
        $this->repository = $this->createStub(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }
}