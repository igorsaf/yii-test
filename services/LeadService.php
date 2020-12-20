<?php

namespace app\services;

use app\entities\Lead\Created;
use app\entities\Lead\Id;
use app\entities\Lead\Lead;
use app\entities\Lead\Name;
use app\entities\Lead\Source;
use app\entities\Lead\Status;
use app\services\dto\LeadCreateDto;

class LeadService {

	private $leads;
	private $dispatcher;

	public function __construct(LeadRepository $leads, EventDispatcher $dispatcher)
	{
		$this->leads = $leads;
		$this->dispatcher = $dispatcher;
	}

	public function create(LeadCreateDto $dto): void
	{
		$lead = new Lead(
			Id::next(),
			new Name($dto->name),
			new Source($dto->source),
			new Status($dto->status),
			new Created($dto->created->at, $dto->created->by)
		);

		$this->leads->add($lead);
		$this->dispatcher->dispatch($lead->releaseEvents());
	}
}
