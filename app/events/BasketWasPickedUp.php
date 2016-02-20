<?php

class BasketWasPickedUp implements IDomainEvent
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

	/**
	 * @return \BasketId
	 */
	public function getAggregateId()
	{
		return $this->basketId;
	}
}