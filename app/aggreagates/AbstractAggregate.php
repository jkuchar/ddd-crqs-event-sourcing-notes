<?php

abstract class AbstractAggregate
{

	/**
	 * @param \DomainEvent $domainEvent
	 * @return string
	 */
	private function getApplyMethodForDomainEvent(DomainEvent $domainEvent)
	{
		return "apply" . get_class($domainEvent);
	}

	/**
	 * Apply domain event if this aggregate accepts this event
	 * @param \DomainEvent $domainEvent
	 * @internal
	 */
	public function applyIfAccepts(DomainEvent $domainEvent) {
		if(method_exists($this, $this->getApplyMethodForDomainEvent($domainEvent))) {
			$this->apply($domainEvent);
		}
	}

	/**
	 * Apply domain event; if objects does not accepts this event -> fail
	 * @param \DomainEvent $domainEvent
	 */
	public function apply(DomainEvent $domainEvent) {
		$method = $this->getApplyMethodForDomainEvent($domainEvent);
		$this->$method($domainEvent);
	}

}