<?php

class ServicioswebController extends Controller
{
	public function accessRules()
	{




		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('server'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actions() {
		return array(
			'service'=>array(
				'class'    => 'ext.GWebService.GSoapServerAction',
			),
		);
	}

 public function actionserver(){

	 include( Yii::getPathOfAlias( 'app.nusoap').'nusoap.php' );
	 $servicio=new nusoap_server();
  /*
//register a function that works on server
	 $server->register('get_message');
// create the function
	 function get_message($your_name)
	 {
		 if(!$your_name){
			 return new soap_fault('Client','','Put Your Name!');
		 }
		 $result = "Welcome to ".$your_name .". Thanks for Your First Web Service Using PHP with SOAP";
		 return $result;
	 }
// create HTTP listener
	 $server->service($HTTP_RAW_POST_DATA);*/
 }
}
