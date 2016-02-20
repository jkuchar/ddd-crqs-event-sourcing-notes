<?php

abstract class AbstractId {

	private $uuid;

	/**
	 * BasketId constructor.
	 * @param \Ramsey\Uuid\UuidInterface $uuid
	 */
	public function __construct(\Ramsey\Uuid\UuidInterface $uuid)
	{
		$this->uuid = $uuid;
	}

	function getId() {
		return $this->uuid;
	}

	function __toString()
	{
		return (string) $this->uuid;
	}

}

class BasketId extends AbstractId {};
class ProductId extends AbstractId {};