<?php


namespace app\bootstrap;


use app\dispatchers\DummyEventDispatcher;
use app\dispatchers\EventDispatcher;
use yii\base\Application;

class Bootstrap implements \yii\base\BootstrapInterface
{


	public function bootstrap($app)
	{
		$container = \Yii::$container;

		$container->setSingleton(EventDispatcher::class, DummyEventDispatcher::class);
	}
}
