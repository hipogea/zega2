<?php

class DefaultController extends Controller
{
	
 public $layout='//layouts/celular';

	/**
	 * @return array action filters
	 */
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
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('Profile',   'Workers','index',   'ajaxCopia','editaTemp','index','view','admin','revisaPendientes',  'create','update','admin','motMuestraPlan','checkPlanMot'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
   
    
    public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionWorkers()
	{
            $this->layout="//layouts/celular";
		$this->render('index');
	}
        
        
        public function actionProfile(){
           
		$model = Yii::app()->user->user;  // ciudado es: user->user, el cual da al CrugeStoredUser
		Yii::app()->user->um->loadUserFields($model); // le pedimos al api que carge los campos personalizados
		//$this->performAjaxValidation('crugestoreduser-form', $model);
		$postName = CrugeUtil::config()->postNameMappings['CrugeStoredUser'];
		if (isset($_POST[$postName])) {
			$model->attributes = $_POST[$postName];
			if ($model->validate()) {
				$newPwd = trim($model->newPassword);
				if ($newPwd != '') {
					Yii::app()->user->um->changePassword($model, $newPwd);
					Yii::app()->crugemailer->sendPasswordTo($model, $newPwd);
				}
				if (Yii::app()->user->um->save($model, 'update')) {
					Yii::app()->user->setFlash('profile-flash',
						'Tus datos de usuario han sido actualizados');
				}
			}
		}
		$this->render("profile",array('model'=>$model));
	}
        
}