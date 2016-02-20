<?php
/**
 * simple basket test
 * @testCase
 */

use Ramsey\Uuid\Uuid;
use Tester\Assert;

require __DIR__ . "/bootstrap.php";


class BasketTest extends \Tester\TestCase {

	public function testSimpleBasketTest() {
		// Arrange
		$basket = Basket::pickUp(new BasketId(Uuid::uuid4()));

		$productId = new ProductId(Uuid::uuid4());
		$basket->addProduct($productId, "Awesome product");

		$basket->removeProduct($productId);

		// Act
		$history = $basket->getRecordedEvents();

		// Assert
		Assert::count(3, $history, "should have recorded 3 events");
		Assert::type(BasketWasPickedUp::class, $history[0], "First should be Basket was picked up.");
		Assert::type(ProductWasAddedToBasket::class, $history[1], "Second should be Product was added to basket.");
		Assert::type(ProductWasRemovedFromBasket::class, $history[2], "Second should be Product was removed from basket.");
	}

	/**
	 * Basket can have maximally 3 items at time in it
	 */
	public function testBasketShouldProtectInvariants() {
		$basket = Basket::pickUp(new BasketId(Uuid::uuid4()));

		$basket->addProduct(new ProductId(Uuid::uuid4()), "Awesome product 1");
		$basket->addProduct(new ProductId(Uuid::uuid4()), "Awesome product 2");
		$basket->addProduct(new ProductId(Uuid::uuid4()), "Awesome product 3");

		Assert::exception(function() use($basket) {
			$basket->addProduct(new ProductId(Uuid::uuid4()), "Awesome product 4");
		}, BasketLimitReached::class);
	}

	/**
	 * Basket can have maximally 3 items at time in it
	 */
	public function testBasketShouldRecordAnEventForDoubleRemovedProduct() {
		$basket = Basket::pickUp(new BasketId(Uuid::uuid4()));

		$id = new ProductId(Uuid::uuid4());

		$basket->addProduct($id, "Awesome product 1");
		$basket->removeProduct($id);
		$basket->removeProduct($id);

		Assert::count(3, $basket->getRecordedEvents(), "Double removed product should not generate another event.");
	}

}

(new BasketTest())->run();
