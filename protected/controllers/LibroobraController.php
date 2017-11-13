<?php

class LibroobraController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array(  'AjaxRefrescaJornal', 'itemsot','ajaxborraasistencia','admin','view', 'ajaxagregatrabajadores',    'creaevento',    'create','update'),
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
		$model=new Libroobra;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Libroobra']))
		{
			$model->attributes=$_POST['Libroobra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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

		if(isset($_POST['Libroobra']))
		{
			$model->attributes=$_POST['Libroobra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
		$dataProvider=new CActiveDataProvider('Libroobra');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Libroobra('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Libroobra']))
			$model->attributes=$_GET['Libroobra'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Libroobra the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Libroobra::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Libroobra $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='libroobra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actioncreaevento($id)
	{
		
            $modelopadre=$this->loadModel($id);
              
		//$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
		$model=new Trabajosobra;
              // die();
		$model->hidparte=$id;
		if(isset($_POST['Trabajosobra']))		{
			$model->attributes=$_POST['Trabajosobra'];			
			//$this->performAjaxValidationdetalle($model);
			if($model->save()){
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
                                        window.parent.$('#cru-frame3').attr('src','');
                                        window.parent.$.fn.yiiGridView.update('detalle-eventos-grid');
					window.parent.$.fn.yiiGridView.update('resumenoc-grid');
                                            ");

				}
			}

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
                
		$this->render('_form_detalle',array(
			'model'=>$model, 'idcabeza'=>$idcabeza,'editable'=>true
		));
	}
        
        public function actionajaxagregatrabajadores(){
            if(yii::app()->request->isAjaxRequest){  
                if(isset($_GET['id'])){  
                    $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                    $registro= Libroobra::model()->findByPk($id); 
                    $plan=New Grupoplan();
                    $plan->llenaVacancias($registro->orden->codcen);
                    if(is_null($registro))                 
                        throw new CHttpException(500,'NO se encontro el registro con el id '.$id);     
                    
                    ///creadno los registro de trabajadores 
                    $trabajadores=Trabajadores::model()->findAll();
                    foreach($trabajadores as $trabajador){
                       //verificar primero si ya esta agregado
                      $regasistencia= Asisobra::model()->findAll("hidlibro=:vhidlibro and codtra=:vcodtra ",array(":vhidlibro"=>$registro->id,":vcodtra"=>$trabajador->codigotra));
                      if(count($regasistencia)==0){
                          $asistencia=New Asisobra('masivo');
                                  $asistencia->setAttributes(
                                          array(
                                              'hidlibro'=>$id,
                                              //'codcen'=>$registro->orden->codcen,
                                             // 'hidreg'=> Asisobra::getRegimen(),
                                             // 'calific'=>$trabajador->codpuesto,
                                              'codtra'=>$trabajador->codigotra,
                                              'codtipo'=> Asisobra::getCodTipo(),
                                              'hingreso'=>$registro->hinicio,
                                                  )
                                          );
                                  if($asistencia->save())
                                  {
                                      echo "Se agregaron los registros";
                                  }else{
                                      echo "Hubo errores".yii::app()->mensajes->getErroresItem($registro->geterrors());
                                  }
                          
                      }
                     
                    }
                    
                }     
                    }
        }
        
         public function actionajaxborraasistencia(){
            if(yii::app()->request->isAjaxRequest){  
                if(isset($_GET['id'])){  
                    $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                    $registro= Libroobra::model()->findByPk($id); 
                    if(is_null($registro))                 
                        throw new CHttpException(500,'NO se encontro el registro con el id '.$id);     
                      if($registro->codtipo== Asisobra::getCodTipoInasistencia()){
                         if($registro->delete()){
                             echo "Se borro el registro de asistencia";
                         }else{
                             echo "NO se pudo borrar el registro : ".yii::app()->mensajes->getErroresItem($registro->getErrors());
                         }
                      }else{
                          echo "No se pudo borrar el registro , esta marcado como asistencia";
                      }
                          
                    
                }     
                    }
        }
       
     public function actionitemsot(){
         $identidad=MiFactoria::cleanInput($_POST['idot']);
            $registros=Detot::model()->findAll("hidorden=".$identidad);
        if(!is_null($registros)){
            
            foreach($registros as $registro){

                echo CHtml::tag('option', array('value'=>$registro->id),CHtml::encode($registro->item.'-'.$registro->textoactividad),true);

            }
        }else {
            echo "";
        }

     }   
     
     public function actionAjaxRefrescaJornal(){
         if(yii::app()->request->isAjaxRequest){
             if(isset($_GET['id'])){  
                    $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                    $libro= Libroobra::model()->findByPk($id);
                   // var_dump($libro->asisobra);die();
                    foreach($libro->asisobra as $registro){
                        $registro->jornaldiario();
                        $registro->save();
                    }
                    
                            }
                }
        
        }
}
