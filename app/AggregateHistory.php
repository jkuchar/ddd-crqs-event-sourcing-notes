<?php

/**
 * Collection of domain events
 */
class AggregateHistory extends ArrayObject {

	private $aggregateId;

	public function __construct($aggregateId, DomainEvents $domainEvents)
	{
		$this->aggregateId = $aggregateId;

		// type check for DomainEvent[]
		array_filter((array) $domainEvents, function(DomainEvent $domainEvent) {});

		parent::__construct((array) $domainEvents);
	}

	/**
	 * @return array|null|object
	 */
	public function getAggregateId()
	{
		return $this->aggregateId;
	}


}