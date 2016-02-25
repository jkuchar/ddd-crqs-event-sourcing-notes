<?php

abstract class AbstractAggregate implements RecordsEvents, EventsApplicable, ReconstitutesFromHistory
{

	// ------------- implementation of EventApplicable ------------------------
	/**
	 * @param \DomainEvent $domainEvent
	 * @return string
	 */
	private function getApplyMethodForDomainEvent(DomainEvent $domainEvent): string
	{
		return "apply" . get_class($domainEvent);
	}

	public function applyIfAccepts(DomainEvent $domainEvent)
	{
		if(method_exists($this, $this->getApplyMethodForDomainEvent($domainEvent))) {
			$this->apply($domainEvent);
		}
	}

	public function apply(DomainEvent $domainEvent)
	{
		$method = $this->getApplyMethodForDomainEvent($domainEvent);
		$this->$method($domainEvent);
	}

	// ---------------------------------------------------------------------

	public static function reconstituteFrom(AggregateHistory $aggregateHistory): self
	{
		$basketId = $aggregateHistory->getAggregateId();
		$basket = new static(new BasketId($basketId));

		foreach($aggregateHistory as $event) {
			$basket->apply($event);
		}
		return $basket;
	}

	// -------- implementation of RecordsEvents ------------------
	private $recordedEvents = [];

	public function getRecordedEvents(): DomainEvents
	{
		return new DomainEvents($this->recordedEvents);
	}

	public function clearRecordedEvents()
	{
		$this->recordedEvents = [];
	}

	protected function recordThat(DomainEvent $domainEvent)
	{
		$this->recordedEvents[] = $domainEvent;
		$this->apply($domainEvent);
	}

}