<?php

final class Basket implements RecordsEvents
{

	/** @var BasketId $basketId */
	private $basketId;

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
		$this->recordThat(
			new ProductWasAddedToBasket($this->basketId, $productId, $name)
		);
	}

	public function removeProduct(ProductId $productId) {
		$this->recordThat(
			new ProductWasRemovedFromBasket($this->basketId, $productId)
		);
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