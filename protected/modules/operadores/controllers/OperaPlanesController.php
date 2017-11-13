<?php

class OperaPlanesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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
				'actions'=>array('ajaxCopia','editaTemp','index','view','admin','revisaPendientes',  'create','update','admin','motMuestraPlan','checkPlanMot'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OperaPlanes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OperaPlanes']))
		{
			$model->attributes=$_POST['OperaPlanes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
$this->layout='//layouts/column2';
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OperaPlanes']))
		{
			$model->attributes=$_POST['OperaPlanes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
$this->layout='//layouts/column2';
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OperaPlanes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		 //var_dump(Yii::app()-> getLanguage());die();
            $model=new OperaPlanes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OperaPlanes']))
			$model->attributes=$_GET['OperaPlanes'];
$this->layout='//layouts/celular';
		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        
        
        /**
	 * Muestra el plan de la embarcacion por perfil
	 */
	public function actionmotMuestraPlan()
	{
	   
            $model=new OperaPlanes('search_por_mot');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OperaPlanes']))
			$model->attributes=$_GET['OperaPlanes'];

		$this->render('admin_por_mot',array(
			'model'=>$model,
		));
	}
        
        
         /**
	 * hace check al las tareas del aplan 
	 */
	public function actionrevisaPendientes()
	{
            
            $valores=OperaCodep::getEp();
           $codigobarco=$valores['barco'];
            $codofi=$valores['ofic'];
            //var_dump($valores);die();
            if(!is_null($codigobarco)){
	   if(!isset($_GET['ajax'])){
            
            $proveedor=OperaPlanes::model()->search_por_mot($codigobarco, $codofi);
            $registros=$proveedor->getdata();
            //borarndo lo anteriors 
            OperaTempplan::model()->deleteAll("iduser=:viduser",array(":viduser"=>yii::app()->user->id));
            foreach($registros as $fila){ //creando nuevos 
                $fila->createmp();
            }
           }   
            $model=new OperaTempplan('search_por_user');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OperaTempplan']))
			$model->attributes=$_GET['OperaTempplan'];
                $proveedor2= $model->search_por_user();
           $this->render('admin_por_pend',array(
			'model'=>$model,'proveedor'=>$proveedor2
		));
            }else{
                $model=new OperaTempplan();
                $this->render('reject',array(
			'model'=>$model,
		));  
            }
	}
        
        
        /**
	 * hace check al las tareas del aplan 
	 */
	public function actioncheckPlanMot()
	{
	   $valores=OperaCodep::getEp();
           $codigobarco=$valores['barco'];
            $codofi=$valores['ofic'];
            //var_dump($codigobarco);var_dump($codofi);die();
            if(!is_null($codigobarco)){
                $model=new OperaPlanes('search_por_mot');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OperaPlanes']))
			$model->attributes=$_GET['OperaPlanes'];

		$this->render('admin_por_mot',array(
			'model'=>$model,'codep'=>$codigobarco,'codof'=>$codofi
		));
            }else{
               $this->render('reject',array(
			'model'=>$model,
		)); 
            }
            
	}
        
        
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OperaPlanes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OperaPlanes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OperaPlanes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='opera-planes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
      public function actioneditaTemp($id)
	{
	 $id=$_GET['id'];
              // $cata= Templibrodiario::model()->findByPk(MiFactoria::cleanInput($id));
              
         $id=(integer) MiFactoria::cleanInput($id);
          
                            $valores=OperaCodep::getEp();
                            $codigobarco=$valores['barco'];
                                 $codofi=$valores['ofic'];
                                //var_dump($codigobarco);var_dump($codofi);die();
                            if(!is_null($codigobarco)){
                                //$model=New OperaTempplan();
                             $model= OperaTempplan::model()->findByPk(MiFactoria::cleanInput($id));
                             if(!is_null($model)){
                             $model->setScenario('editatemp');
                                if(isset($_POST['OperaTempplan'])){		{
                                $model->attributes=$_POST['OperaTempplan'];  
                                //$model->validate();
                                  IF($model->save()){
                                      echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
                                            window.parent.$('#cru-detalle').attr('src','');
                                     window.parent.$.fn.yiiGridView.update('opera-planes-grid');
				                      ");

                                                }else{
                                                    //  var_dump($model->geterrors());die(); 
                                                }
                                  }
                                }
                                 $this->layout = '//layouts/iframe';  
                                 //var_dump($model->attributes);die();
                                 if(is_null($model->fechaejec) or empty($model->fechaejec) or (strlen(trim($model->fechaejec))==''))
                                     $model->fechaejec=date('Y-m-d H:i:s');
                                  $this->render('_edita_temp',array(
                                        'model'=>$model,
                                    ));
                                }else{
                                  throw new CHttpException(500,'No se encontró ningún registro con el id  '.$id);
		  
                                }
                            }
                            
                            ELSE{
                               $this->render('reject',array(
                                        'model'=>$model,
                                    ));  
                            }
            }  
            
            public function actionajaxCopia(){
                if(yii::app()->request->isAjaxRequest){ 
                    if(isset($_GET['id'])){               
                        $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                        $registro= OperaTempplan::model()->findByPk($id); 
                        if(is_null($registro))    
                            throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
                        } else{
                            $reglog=New OperaLogtareas('basico');
                            $reglog->setAttributes(array(
                                    'hidplan'=>$registro->hidplan,
                                    'fechaejec'=>$registro->hidplan,
                                        'explicacion'=>$registro->texto,
                                    ));
                            $reglog->save();
                            $registro->delete();
                        }         
                        
                    }
            }
   }
               
		
	  

