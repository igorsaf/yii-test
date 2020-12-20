<?php


namespace app\entities\Lead\Events;


use app\entities\Lead\Id;

class LeadCreated
{
	public $lead;

	public function __construct(Id $lead)
	{
		$this->lead = $lead;
	}
}
