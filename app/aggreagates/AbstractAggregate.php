<?php

abstract class AbstractAggregate
{

	/**
	 * @param \IDomainEvent $domainEvent
	 * @return string
	 */
	private function getApplyMethodForDomainEvent(IDomainEvent $domainEvent)
	{
		return "apply" . get_class($domainEvent);
	}

	/**
	 * Apply domain event if this aggregate accepts this event
	 * @param \IDomainEvent $domainEvent
	 * @internal
	 */
	public function applyIfAccepts(IDomainEvent $domainEvent) {
		if(method_exists($this, $this->getApplyMethodForDomainEvent($domainEvent))) {
			$this->apply($domainEvent);
		}
	}

	/**
	 * Apply domain event; if objects does not accepts this event -> fail
	 * @param \IDomainEvent $domainEvent
	 */
	public function apply(IDomainEvent $domainEvent) {
		$method = $this->getApplyMethodForDomainEvent($domainEvent);
		$this->$method($domainEvent);
	}

}