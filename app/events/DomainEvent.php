<?php

use Ramsey\Uuid\UuidInterface;

interface DomainEvent
{

	/**
	 * Aggregate instance identifier (must be unique per aggregate)
	 */
	public function getAggregateId(): UuidInterface;

}