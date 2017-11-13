<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('indexs');
	}
        public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
	}
        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		return array(
	 	

		array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('inicio','ajaxGuardaCampo','admin','delete','update','index','view','create','upload', 'download','restore'),
						'users'=>array('@'),
		),
		array('deny',  // deny all users
						'users'=>array('*'),
		),
		);
	}
        
        /****
         * Este ahajx se usara todo el tiempo 
         * para guardar campos del templibroidiuario 
         * en grillas principalemtne 
         */
        
        PUBLIC function actionajaxGuardaCampo(){
         if(yii::app()->request->isAjaxRequest){ 
             if(isset($_GET['nombrecampo']) and isset($_GET['valorcampo']) and isset($_GET['idtemp'])){ 
                 if(preg_match('/[a-zA-Z0-9_]/',$_GET['nombrecampo']) and
                         preg_match('/[a-zA-Z0-9_.,-]/',$_GET['valorcampo'])){
                     $registro= Templibrodiario::model()->findByPk(MiFactoria::cleanInput($_GET['idtemp']));
                     var_dump($registro);
                     if(is_null($registro))                  
                     throw new CHttpException(500,'NO se encontro el registro con el id '.$_GET['idtemp']);                 
                    $registro->setScenario('montobasico');
                    if($registro->isAttributeSafe($_GET['nombrecampo'])){
                        $registro->{$_GET['nombrecampo']}=$_GET['valorcampo'];
                        if(!$registro->save()){
                          echo yii::app()->mensajes->getEerroresItem($registro->geterros());  
                        }
                    }else{
                        throw new CHttpException(500,'El campo '.$_GET['nombrecampo'].' no ES UN ATRIBUTE SAFE DEL MODELO');                 
                    //$registro->setScenario('montobasico');
                   
                    }
                 }
                       
                 
             }          }else{
                 echo "papito";
             }
     }

}