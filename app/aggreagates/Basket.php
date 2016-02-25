<?php

final class Basket extends AbstractAggregate
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
	public static function pickUp(BasketId $basketId): self
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

		// Internal state NOT changed directly @see apply() method
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

		// Internal state NOT changed directly @see apply() method
	}

	// --------- object state transitions based on incoming events ---------

	/**
	 * @param \ProductWasAddedToBasket $productWasAddedToBasket
	 */
	public function applyProductWasAddedToBasket(ProductWasAddedToBasket $productWasAddedToBasket)
	{
		$productId = $productWasAddedToBasket->getProductId();
		if (!$this->isProductInBasket($productId)) {
			$this->itemsCountById[(string) $productId] = 0;
		}
		$this->itemsCountById[(string) $productId]++;
	}

	/**
	 * @param \ProductWasRemovedFromBasket $productWasRemovedFromBasket
	 */
	public function applyProductWasRemovedFromBasket(ProductWasRemovedFromBasket $productWasRemovedFromBasket)
	{
		$productId = $productWasRemovedFromBasket->getProductId();
		$this->itemsCountById[(string) $productId]--;
	}

	public function applyBasketWasPickedUp()
	{
	}

	// ------------ guarding helpers --------------------

	private function guardMaxItemsLimit()
	{
		$numberOfItems = array_sum($this->itemsCountById);
		if ($numberOfItems >= 3) {
			throw new BasketLimitReached("Cannot have more then 3 items in basket.");
		}
	}

	private function isProductInBasket(ProductId $productId): bool
	{
		return isset($this->itemsCountById[(string) $productId]) && ($this->itemsCountById[(string) $productId] > 0);
	}

}