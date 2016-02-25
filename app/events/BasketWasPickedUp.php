<?php

use Ramsey\Uuid\UuidInterface;

class BasketWasPickedUp implements DomainEvent
{
	private $basketId;

	/**
	 * BasketWasPickedUp constructor.
	 * @param $basketId
	 */
	public function __construct(BasketId $basketId)
	{
		$this->basketId = $basketId;
	}

	public function getAggregateId(): UuidInterface
	{
		return $this->basketId->getId();
	}
}