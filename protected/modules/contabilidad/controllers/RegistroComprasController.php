<?php

class RegistroComprasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
   const MONEDA_REPORTE='USD';
   const COD_SUNAT_TIPO_DOC_RUC='006';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

      public function behaviors(){
          return array(
			'exportableGrid' => array(
				'class' => 'application.components.ExportableGridBehavior',
				'filename' => 'Compras.csv',
				'csvDelimiter' =>(Yii::app()->user->isGuest)?",":Yii::app()->user->getField('delimitador') , //i.e. Excel friendly csv delimiter
			
                            ),
              	                    
                    'tablasunat'=>array(
				'class'=>'contabilidad.behaviors.tablasSunatBehavior',
                                                           ),
               'formatonumero'=>array(
				'class'=>'contabilidad.behaviors.formatoNumeroBehavior',
                                                           ),
              );
          
      }
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('rellena',   'ajaxmuestraproveedor','llena','crear','update'),
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
	public function actionCrear()
	{
		$model=new Registrocompras('ins_compralocal');
                    $model->valorespordefecto();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model); 

		if(isset($_POST[get_class($model)]))
		{
			$model->attributes=$_POST[get_class($model)];
                       // var_dump($model->attributes);
			if($model->save()){
                            $model->refresh();
                            MiFactoria::Mensaje('success', 'Se creo el registro de compra con el ID ['.$model->id.']');
                            $this->redirect(array('update','id'=>$model->id));
                            //die();
                        }else{
                            //var_dump($model->geterrors());die();
                           // MiFactoria::Mensaje('error', 'Hubo errores al grabar el registro '.yii::app()->mensajes->getErroresItem($model->geterrors()));
                            
                        }
				
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
                $model->setScenario();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cuentas']))
		{
			$model->attributes=$_POST['Cuentas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codcuenta));
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
		$dataProvider=new CActiveDataProvider('Cuentas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registrocompras('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registrocompras']))
			$model->attributes=$_GET['Registrocompras'];
                
                 if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
			//ECHO "SALIO";DIE();
			$this->exportCSV($model->search(), array(
					'codcuenta',
					'descuenta',
					'clase',
					'contrapartida',
					'grupo',
					'codigo',
                            'n2',
					'n3',
					'registro',
                                                                )
                                            );
		} else {

		$this->render('admin',array(
			'model'=>$model,
		));
                }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cuentas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cuentas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cuentas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cuentas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionllena(){
		$regclases=Clases::model()->findAll();
	  foreach($regclases as $fila){
		  $comando2=Yii::app()->db->createCommand(" UPDATE {{cuentas}} SET desclase='".$fila->desclase."' where clase='".$fila->clase."'  ");
		  $comando2->execute();

	  }
         }
         
         public function actionajaxmuestraproveedor(){
             if(yii::app()->request->isAjaxRequest){
                 if(isset($_POST['ruc']) and isset($_POST['tipo']) ){
                     $ruc=  MiFactoria::cleanInput($_POST['ruc']);
                     $tipo= MiFactoria::cleanInput($_POST['tipo']);
                      //$modelo=  MiFactoria::cleanInput($_POST['modelo']);
                     //$campo= MiFactoria::cleanInput($_POST['campo']);
                     //VAR_DUMP($tipo);VAR_DUMP($ruc);
                     if($tipo==self::COD_SUNAT_TIPO_DOC_RUC){
                         $registro=Clipro::model()->findByRuc($ruc);
                         //var_dump($valor);die();
                         if(is_null($registro)){
                            $valor='No hay coincidencias'; 
                         }else{
                             $valor=$registro->despro;
                         }
                        // $valor="SI PSO";
                     }else{
                         $valor='No hay coincidencias';
                     }
                     //var_dump($valor);
                     echo $valor;
                 }
             }
         }
         
         public function actionrellena(){
             if(yii::app()->request->isAjaxRequest){ 
                 if(isset($_POST['numero'])){  
                     $valor= MiFactoria::cleanInput($_POST['numero']); 
                    // $registro= Tipocambio::model()->findByPk($id);  
                     //if(is_null($registro))  
                     //var_dump($valor);die();               
                         //throw new CHttpException(500,'NO se encontro el registro con el id '.$id); 
                   echo $this->rellenaNumero(
                            yii::app()->settings->get('conta','conta_formatonumerocomprobantes'),
                            $valor);
                     //echo "2345";
                 }          
                     
                 }
         }
}
