<?php


namespace app\services;


use app\models\Lead;
use app\repositories\LeadRepository;
use yii\web\BadRequestHttpException;

class LeadService
{
	private $leads;

	public function __construct(LeadRepository $leads)
	{
		$this->leads = $leads;
	}

	public function getList(array $filter = [], ?int $page = 0): array
	{
		return $this->leads->getList($filter, $page);
	}

	public function create(array $leadData):Lead
	{
		$lead = new Lead();

		if (!$lead->load($leadData, '')) throw new BadRequestHttpException('Lead data not loaded');

		if (!$lead->validate()) throw new BadRequestHttpException(implode(',', $lead->getErrorSummary(true)));

		$this->leads->create($lead);

		return $lead;
	}
}
