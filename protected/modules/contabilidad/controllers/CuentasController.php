<?php

class CuentasController extends Controller
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
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

      public function behaviors(){
          return array(
			'exportableGrid' => array(
				'class' => 'application.components.ExportableGridBehavior',
				'filename' => 'Cuentas.csv',
				'csvDelimiter' =>(Yii::app()->user->isGuest)?",":Yii::app()->user->getField('delimitador') , //i.e. Excel friendly csv delimiter
			));
          
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
				'actions'=>array('llena','create','update','deleteByDoc','updateByDoc','createByDoc'),
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
	public function actionCreate()
	{
		$model=new Cuentas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cuentas']))
		{
			$model->attributes=$_POST['Cuentas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codcuenta));
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
		$model=new Cuentas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cuentas']))
			$model->attributes=$_GET['Cuentas'];
                
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
         
         
         /*
          * ESTA FUNCIO crea LAS CUENTAS DEL ASIENTO DE UN DOTERMINADO DOCUMENTO
          * PARA QUE SALGA POR DEFECTO 
          * @CODOCU
          * 
          */
         
         public function actioncreateByDoc(){
             $codocu=$_GET['codocu'];
             if(!is_null(Documentos::verificadoc($codocu)))
             {
               $cata=New Cuentasdoc;
               if(isset($_POST['Cuentasdoc'])){
                   $cata->attributes=$_POST['Cuentasdoc'];
                   $cata->codocu= $codocu;
			if($cata->save())
                            	echo CHtml::script("window.parent.$('#cru-dialog4').dialog('close');
									window.parent.$('#cru-detalle4').attr('src','');
									window.parent.$.fn.yiiGridView.update('documentosop-grid');
					");
					Yii::app()->user->setFlash('success', " Se grabaron los datos  ");
					
                            
			
               }
               $this->layout = '//layouts/iframe';
               $this->render('//documentos/_form_cuentas',array(
                'model'=>$cata      ));
             }
         }
           /* ESTA FUNCIO MODIFICA LAS CUENTAS DEL ASIENTO DE UN DOTERMINADO DOCUMENTO
          * PARA QUE SALGA POR DEFECTO 
          * @CODOCU
          * 
          */
         
         public function actionupdateByDoc($codocu){
             $cata=Documentos::verificadoc($codocu);
             if(!is_null($cata))
             {
               //$cata=New Cuentasdoc;
               if(isset($_POST['Cuentasdoc'])){
                   $cata->attributes=$_POST['Cuentasdoc'];
			if($cata->save())
                            	echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
									window.parent.$('#cru-detalle').attr('src','');
									window.parent.$.fn.yiiGridView.update('detalle-grid');
					");
					Yii::app()->user->setFlash('success', " Se grabaron los datos  ");
					
                            
			
               }
               $this->layout = '//layouts/iframe';
               $this->render('_form_cuentas',array(
                'model'=>$cata      ));
             }
         }
         
          /* ESTA FUNCIO borra LAS CUENTAS DEL ASIENTO DE UN DOTERMINADO DOCUMENTO
          * PARA QUE SALGA POR DEFECTO 
          * @CODOCU
          * 
          */
         
         public function actiondeleteByDoc(){
            
               $codocu=$_POST['Documentos']['coddocu'];
       $autoIdAll = $_POST['cajita'];
        $cata=Documentos::verificadoc($codocu);
             if(!is_null($cata))
             {
               
       if(count($autoIdAll)>0 ) //and ($this->eseditable($estado)==''))
       {
           foreach($autoIdAll as $autoId)
           {
              echo "borrando \n";
               Cuentasdoc::model()->findByPk(array("codocu"=>$codocu,"codcuenta"=>$autoId))->delete();

           }
       }
   
             }else{
                 echo "No se encontro el codigo de documento ".$codocu;
             }
         }
}
