<?php

class DefaultController extends Controller
{


	public function actionIndex()
	{
		$this->layout="//layouts/columnhelp";
		$this->render('capitulos');
	}
}