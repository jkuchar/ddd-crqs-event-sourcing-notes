<?php

/**
 * Collection of domain events
 */
class DomainEvents extends ArrayObject {

	public function __construct(array $domainEvents)
	{
		// type check for IDomainEvent[]
		array_filter($domainEvents, function(IDomainEvent $domainEvent) {});
		parent::__construct($domainEvents);
	}

}