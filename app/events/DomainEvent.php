<?php

interface DomainEvent
{

	/**
	 * Aggregate instance identifier (must be unique per aggregate)
	 * @return \Ramsey\Uuid\Uuid
	 */
	public function getAggregateId();

}