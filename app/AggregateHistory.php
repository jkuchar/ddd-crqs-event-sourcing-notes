<?php
use Ramsey\Uuid\UuidInterface;

/**
 * Collection of domain events
 */
class AggregateHistory extends ArrayObject {

	private $aggregateId;

	public function __construct(UuidInterface $aggregateId, DomainEvents $domainEvents)
	{
		$this->aggregateId = $aggregateId;

		// type check for DomainEvent[]
		array_filter((array) $domainEvents, function(DomainEvent $domainEvent) {});

		parent::__construct((array) $domainEvents);
	}

	public function getAggregateId(): UuidInterface
	{
		return $this->aggregateId;
	}


}