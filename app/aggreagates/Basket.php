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
	public static function pickUp(BasketId $basketId)
	{
		$basket = new Basket($basketId);
		$basket->recordThat(new BasketWasPickedUp($basketId));
		return $basket;
	}

	// ------------- public interface --------------
	public function addProduct(ProductId $productId, $name)
	{
		// Verify invariants
		$this->guardMaxItemsLimit();

		// Produce events
		$this->recordThat(
			new ProductWasAddedToBasket($this->basketId, $productId, $name)
		);

		// Update internal tracked state
		if(!$this->isProductInBasket($productId)) {
			$this->itemsCountById[(string)$productId] = 0;
		}
		$this->itemsCountById[(string)$productId]++;
	}

	public function removeProduct(ProductId $productId)
	{
		// Check invariants
		if(!$this->isProductInBasket($productId)) {
			return;
		}

		// Produce events (optional)
		$this->recordThat(
			new ProductWasRemovedFromBasket($this->basketId, $productId)
		);

		// Update internal tracked state
		$this->itemsCountById[(string)$productId]--;
	}

	// ------------ guarding helpers --------------------

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