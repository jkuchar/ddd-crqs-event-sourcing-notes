<?php

final class Basket implements RecordsEvents
{

	/** @var BasketId $basketId */
	private $basketId;

	private $itemsCountById = [];

	/**
	 * Basket constructor.
	 * @param \BasketId $basketId
	 */
	private function __construct(BasketId $basketId)
	{
		$this->basketId = $basketId;
	}

	/**
	 * Named constructor: Basket::pickUp()
	 * @param \BasketId $basketId
	 * @return \Basket
	 */
	public static function pickUp(BasketId $basketId) {
		$basket = new Basket($basketId);
		$basket->recordThat(new BasketWasPickedUp($basketId));
		return $basket;
	}

	public function addProduct(ProductId $productId, $name) {
		$this->guardMaxItemsLimit();

		$this->recordThat(
			new ProductWasAddedToBasket($this->basketId, $productId, $name)
		);
		if(!$this->isProductInBasket($productId)) {
			$this->itemsCountById[(string)$productId] = 0;
		}
		$this->itemsCountById[(string)$productId]++;
	}

	public function removeProduct(ProductId $productId) {
		if(!$this->isProductInBasket($productId)) {
			return;
		}

		$this->recordThat(
			new ProductWasRemovedFromBasket($this->basketId, $productId)
		);
		$this->itemsCountById[(string)$productId]--;
	}

	private function guardMaxItemsLimit()
	{
		$numberOfItems = array_sum($this->itemsCountById);
		if ($numberOfItems >= 3) {
			throw new BasketLimitReached("Cannot have more then 3 items in basket.");
		}
	}

	private function isProductInBasket(ProductId $productId) {
		return isset($this->itemsCountById[(string) $productId]) && ($this->itemsCountById[(string) $productId] > 0);
	}

	// -------- implementation of RecordsEvents ------------------
	private $recordedEvents = [];

	public function getRecordedEvents()
	{
		return new DomainEvents($this->recordedEvents);
	}

	public function clearRecordedEvents()
	{
		$this->recordedEvents = [];
	}

	private function recordThat(IDomainEvent $domainEvent)
	{
		$this->recordedEvents[] = $domainEvent;
	}

}