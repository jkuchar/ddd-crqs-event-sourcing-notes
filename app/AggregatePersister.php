<?php

use Ramsey\Uuid\UuidInterface;

class AggregatePersister
{
	public function save(string $aggregateRoot, AbstractAggregate $aggregate) : void {
		
	}

	public function load(string $aggregateRoot, UuidInterface $id): AbstractAggregate {

	}
}