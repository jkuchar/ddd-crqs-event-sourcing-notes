<?php

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

	/**
	 * @return BasketId
	 */
	public function getAggregateId()
	{
		return $this->basketId;
	}

	/**
	 * @return ProductId
	 */
	public function getProductId()
	{
		return $this->productId;
	}

}