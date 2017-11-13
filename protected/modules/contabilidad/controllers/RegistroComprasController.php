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
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
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
	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		

		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('createtempcuentas' ,  'updatetempcuentas',   'rellena','admin',   'ajaxmuestraproveedor','llena','crear','update'),
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
	public function actionCrear()
	{
                      
            $model=new Registrocompras('ins_compralocal');
                $model->hidperiodo=yii::app()->periodo->getperiodo() ;
                   
                    
                    $model->iduser=yii::app()->user->id;
                    $model->codocu=$model->documento;
                   
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model); 
               
		if(isset($_POST[get_class($model)]))
		{
			$model->attributes=$_POST[get_class($model)];
                       // var_dump($model->attributes);
			if($model->save()){
                            $model->refresh();
                                //echo "dia2";
                           $model->updateIdsTemporales($model->id,$model->idkey);
                           //var_dump($model->id);var_dump($model->idkey);
                          // die();
                            //ECHO "DIA3";die();
                            $model->grabatemporalcuentas($model->documento); 
                            $model->limpiatemporales($model->documento);
                            //ECHO "DIA4";
                            MiFactoria::Mensaje('success', 'Se creo el registro de compra con el ID ['.$model->id.']');
                            $this->redirect(array('crear'));
                            //die();
                   }
				
		}else{
                        IF (isset($_GET['ajax']))
                            var_dump($_GET['ajax']);
                    if(!yii::app()->request->isAjaxRequest){ 
                    $model->valorespordefecto();
                       usleep(400000);//dormuir al sisitema poara asegurase delk numero unico
                    $model->idkey= uniqid();
                   // echo "siii";die();
                     $model->cargaCuentasDesdeConf($model->documento);
                           // echo "FALLO";
                            //var_dump($model->geterrors());die();
                           // MiFactoria::Mensaje('error', 'Hubo errores al grabar el registro '.yii::app()->mensajes->getErroresItem($model->geterrors()));
                            
                    }
                   }   //fin de siu es ajax  
                if(is_null($model->id)){ //SI TODAVIA NO HAY ID , ES REGISTRO NEVO SOLO FILTRAR CON EL CAMPO IDKEY
                   $proveedor= $model->getDataProviderToken($model->documento,'idkey');
		 //echo "alo";
                }else{//FILTRAR CON EL CAMPO HIDASIENTO
                     $proveedor= $model->getDataProviderHidasiento($model->documento,'hidasiento');
                    // echo "alo2";
                }
               // VAR_DUMP($proveedor);die();
                 $this->render('create',array(
			'model'=>$model,'proveedor'=>$proveedor
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
               $model->setScenario('upd_compralocal');
               
		if(isset($_POST['Registrocompras']))
		{
			$model->attributes=$_POST['Registrocompras'];
			if($model->save()){
                            $model->grabatemporalcuentas($model->documento);                            
                            MiFactoria::Mensaje('success', "Se grabaron los datos de la compra ");
                      
                            $this->redirect(array('admin'));
                              }
				
		}
                $model->sacatempcuentasupdate($model->documento);
		$proveedor=$model->getDataProviderHidasiento($model->documento,'hidasiento');
		$this->render('update',array(
			'model'=>$model,'proveedor'=>$proveedor
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
		$model= Registrocompras::model()->findByPk($id);
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
                            $valor=''; 
                         }else{
                             $valor=$registro->despro;
                         }
                        // $valor="SI PSO";
                     }else{
                         $valor='';
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
         
      public function actionupdatetempcuentas(){
              $id=$_GET['id'];
               $cata= Templibrodiario::model()->findByPk(MiFactoria::cleanInput($id));
               $cata->setScenario('basico');
               if(isset($_POST[get_class($cata)])){
                   $cata->attributes=$_POST[get_class($cata)];
			if($cata->save()){
                          echo CHtml::script("window.parent.$('#cru-dialog4').dialog('close');
									window.parent.$('#cru-frame4').attr('src','');
									window.parent.$.fn.yiiGridView.update('cuentas-grid');
					");
					Yii::app()->user->setFlash('success', " Se grabaron los datos  ");
					yii::app()->end();  
                        }else{
                            echo yii::app()->mensajes->getErroresItem($cata->geterrors());
                        
                            die();
                        }
                            	
                            
			
               }
               $this->layout = '//layouts/iframe';
               $this->render('_w_cuentas',array(
                'model'=>$cata      ));
             
         }
         
           public function actioncreatetempcuentas(){
              $id=$_GET['id'];
              // $cata= Templibrodiario::model()->findByPk(MiFactoria::cleanInput($id));
              $modelo=$this->loadModel(MiFactoria::cleanInput($id));
               $cata=$modelo->getNewTempCuenta();
               //$cata->setScenario('basico');
               if(isset($_POST[get_class($cata)])){
                   $cata->attributes=$_POST[get_class($cata)];
			if($cata->save()){
                          echo CHtml::script("window.parent.$('#cru-dialog4').dialog('close');
									window.parent.$('#cru-frame4').attr('src','');
									window.parent.$.fn.yiiGridView.update('cuentas-grid');
					");
					Yii::app()->user->setFlash('success', " Se grabaron los datos  ");
					yii::app()->end();  
                        }else{
                            echo yii::app()->mensajes->getErroresItem($cata->geterrors());
                        
                            die();
                        }
                            	
                            
			
               }
               $this->layout = '//layouts/iframe';
               $this->render('_w_crea_cuentas',array(
                'model'=>$cata      ));
             
         }   
}
