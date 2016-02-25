<?php

use Ramsey\Uuid\UuidInterface;

class ProductWasAddedToBasket implements DomainEvent
{
	private $basketId;
	private $productId;
	private $productName;

	/**
	 * ProductWasAddedToBasket constructor.
	 * @param $basketId
	 * @param $productId
	 * @param $productName
	 */
	public function __construct(BasketId $basketId, ProductId $productId, $productName)
	{
		$this->basketId = $basketId;
		$this->productId = $productId;
		$this->productName = $productName;
	}

	public function getAggregateId(): UuidInterface
	{
		return $this->basketId->getId();
	}

	public function getProductId(): ProductId
	{
		return $this->productId;
	}

	public function getProductName(): string
	{
		return $this->productName;
	}

}