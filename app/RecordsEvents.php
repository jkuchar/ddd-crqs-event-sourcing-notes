<?php

interface RecordsEvents
{
	public function getRecordedEvents(): DomainEvents;

	public function clearRecordedEvents();
}