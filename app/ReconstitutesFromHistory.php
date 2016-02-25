<?php

interface ReconstitutesFromHistory
{
	/**
	 * @param \AggregateHistory $aggregateHistory
	 * @return static
	 */
	public static function reconstituteFrom(AggregateHistory $aggregateHistory);
}