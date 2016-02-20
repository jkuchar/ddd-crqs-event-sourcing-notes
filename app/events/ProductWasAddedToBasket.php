<?php

class ProductWasAddedToBasket implements IDomainEvent
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

	public function getAggregateId()
	{
		return $this->basketId;
	}

	/**
	 * @return BasketId
	 */
	public function getProductId()
	{
		return $this->productId;
	}

	/**
	 * @return ProductId
	 */
	public function getProductName()
	{
		return $this->productName;
	}

}