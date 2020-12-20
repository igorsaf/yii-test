<?php


namespace app\controllers\api;


use app\services\LeadService;
use yii\rest\Controller;

class LeadController extends Controller
{

	private $leadService;

	public function __construct($id, $module, LeadService $leadService, $config = [])
	{
		$this->leadService = $leadService;

		parent::__construct($id, $module, $config);
	}

	public function actionCreate()
	{

	}

}
