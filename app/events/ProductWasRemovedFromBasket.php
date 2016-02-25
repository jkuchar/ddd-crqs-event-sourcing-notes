<?php

use Ramsey\Uuid\UuidInterface;

class ProductWasRemovedFromBasket implements DomainEvent
{
	private $basketId;
	private $productId;

	/**
	 * ProductWasRemovedFromBasket constructor.
	 * @param $basketId
	 * @param $productId
	 */
	public function __construct(BasketId $basketId, ProductId $productId)
	{
		$this->basketId = $basketId;
		$this->productId = $productId;
	}

	public function getAggregateId(): UuidInterface
	{
		return $this->basketId->getId();
	}

	public function getProductId(): ProductId
	{
		return $this->productId;
	}

}