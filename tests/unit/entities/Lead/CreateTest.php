<?php

namespace tests\unit\entities\Lead;

use app\entities\Lead\Created;
use app\entities\Lead\Events\LeadCreated;
use app\entities\Lead\Id;
use app\entities\Lead\Lead;
use app\entities\Lead\Name;
use app\entities\Lead\Source;
use app\entities\Lead\Status;
use Codeception\Test\Unit;

class CreateTest extends Unit {

	public function testSuccess(): void
	{
		$lead = new Lead(
			$id = Id::next(),
			$name = new Name('Тестовый лид'),
			$source = new Source(Source::ORGANIC),
			$status = new Status(Status::ACTIVE),
			$created = new Created(new \DateTimeImmutable(), 'Вася')
		);

		$this->assertEquals($id, $lead->getId());
		$this->assertEquals($name, $lead->getName());
		$this->assertEquals($source, $lead->getSource());
		$this->assertEquals($status, $lead->getStatus());
		$this->assertEquals($created, $lead->getCreated());

		$this->assertNotEmpty($events = $lead->releaseEvents());
		$this->assertInstanceOf(LeadCreated::class, end($events));
	}

}
