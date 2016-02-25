<?php

interface EventsApplicable
{
	/**
	 * Apply domain event if this aggregate accepts this event
	 * @param \DomainEvent $domainEvent
	 * @internal
	 */
	public function applyIfAccepts(DomainEvent $domainEvent);

	/**
	 * Apply domain event; if objects does not accepts this event -> fail
	 * @param \DomainEvent $domainEvent
	 */
	public function apply(DomainEvent $domainEvent);
}