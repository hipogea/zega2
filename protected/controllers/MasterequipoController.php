<?php

class MasterequipoController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('borrahijo',  'data','crealista','borralista','modificalista','borradetalle','modificadetalle','admin','creaadicional','create','update'),
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
		$model=new Masterequipo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Masterequipo']))
		{
			$model->attributes=$_POST['Masterequipo'];
			if($model->save()){
				yii::app()->user->setFlash('success','Se creo el equipo '.$model->codigo);
				$this->render('view',array('model'=>$model));
                                yii::app()->end();
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
//yii::app()->maletin->insertafila(10,'Clipro', null);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Masterequipo']))
		{
			$model->attributes=$_POST['Masterequipo'];
			//print_r($model->attributes);
			if($model->save()){
				yii::app()->user->setFlash('success','Se grabo el equipo '.$model->codigo);
				$this->render('view',array('model'=>$model));
                                yii::app()->end();
			} else{
				
			}
				//$this->redirect(yii::app()->createUrl($this->id.'/view',$model->codigo));
		}

                
                $modeloruta=new VwHojaruta('search_por_codigo');
		$modeloruta->unsetAttributes();  // clear any default values
		if(isset($_GET['VwHojaruta'])){
			$modeloruta->attributes=$_GET['VwHojaruta'];
			//var_dump($modelhijo->attributes);die();
		}
                
		$this->render('update',array(
			'model'=>$model,'modeloruta'=>$modeloruta
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
		$dataProvider=new CActiveDataProvider('Masterequipo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Masterequipo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Masterequipo']))
			$model->attributes=$_GET['Masterequipo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Masterequipo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Masterequipo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Masterequipo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='masterequipo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actioncreaadicional($idcabeza){

		$model=new Masterrelacion();
		$model->cant=1;
		$id=MiFactoria::cleanInput($idcabeza);
		$registro=$this->loadModel($id);
		$model->hidpadre=$registro->id;
                //var_dump($model->hidpadre);die();
	//	$model->hidcontacto=$idcabeza;
		if(isset($_POST['Masterrelacion']))		{
			$model->attributes=$_POST['Masterrelacion'];
                        //$model->hidhijo=
                        //var_dump($model->attributes);die();
			if(!$model->save()){
                            var_dump($model->geterrors());die();
                        }
			//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
													                    window.parent.$('#cru-frame3').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
			Yii::app()->end();

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_hijos',array(
			'model'=>$model, 'idcabeza'=>$idcabeza
		));

	}



	public function actionmodificadetalle($id){
		$model=Masterrelacion::model()->findByPk($id);
		//echo "salio";
		//$model->hidcontacto=$idcabeza;
		if(isset($_POST['Masterrelacion']))		{
			$model->attributes=$_POST['Masterrelacion'];
			$model->save();
			//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
			Yii::app()->end();

		}
		//if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_hijos',array(
			'model'=>$model,
		));

	}

	public function actionborradetalle($id){
		$model= Masterlistamateriales::model()->findByPk($id);
		//echo $id;die();
		$model->delete();
	}

        public function actionborrahijo($id){
		$model= Masterrelacion::model()->findByPk($id);
		//echo $id;die();
		$model->delete();
	}

public function actioncrealista($idcabeza){

		$model=new Masterlistamateriales();
		//$model->cant=1;
		$id=MiFactoria::cleanInput($idcabeza);
		$registro=$this->loadModel($id);
		$model->codigo=$registro->codigo;
	//	$model->hidcontacto=$idcabeza;
		if(isset($_POST['Masterlistamateriales']))		{
			$model->attributes=$_POST['Masterlistamateriales'];
			$model->save();
			//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
													                    window.parent.$('#cru-frame3').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detallelista-grid');
																		");
			Yii::app()->end();

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_lista',array(
			'model'=>$model, 'idcabeza'=>$idcabeza
		));

	}


        

	public function actionmodificalista($id){
		$model=  Masterlistamateriales::model()->findByPk($id);
		//echo "salio";
		//$model->hidcontacto=$idcabeza;
		if(isset($_POST['Masterlistamateriales']))		{
			$model->attributes=$_POST['Masterlistamateriales'];
			$model->save();
			//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
							           window.parent.$('#cru-frame3').attr('src','');
								window.parent.$.fn.yiiGridView.update('detallelista-grid');
								");
			Yii::app()->end();

		}
		//if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_lista',array(
			'model'=>$model,
		));

	}
        
        public function actionborralista($id){
		$model=  Masterlistamateriales::model()->findByPk($id);
		//echo "salio";
		$model->delete();
	}
        
        
        public function actiondata(){
            return array(

			// ROLES  TREENODE
			array(
				'text'=>"<b>".CrugeTranslator::t("Roles")."</b>", 
				'expanded'=>true, 
				//'children'=>$treeDataRoles,
			),//end roles treenode

			// TAREAS TREENODE
			array(
				'text'=>"<b>".CrugeTranslator::t("Tareas")."</b>", 
				'expanded'=>true, 
				//'children'=>$arrayTareas,
			),//end tareas treenode

			// OPERATIONS  TREENODE
			array(
				'text'=>"<b>".CrugeTranslator::t(
					"Operaciones Organizadas por Tipo")."</b>", 
				'expanded'=>true, 
				//'children'=>$treeDataOps,
			),//end operations treenode
			
		);
        }
}
