<?php

class AlmacenesController extends Controller
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


	public function behaviors() {
		return array(

			'exportableGrid' => array(
				'class' => 'application.components.ExportableGridBehavior',
				'exportParam'=>'exportacion',
				'filename' => 'Inventario.csv',
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
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('rotacion','evolucion','pintalinkevolucion','graficar','descargainventario','admin','delete','create','detalle','update','creade','view','cambiaestatusmov','cambiaestatusmovan'),
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

	public function actionCreade (){

		echo '<input type="text"  value="A" name="Almacenes[codsoc]" id="Almacenes_codsoc"  SIZE="1"  maxlenght="1"  DISABLED="DISAbled"/>';
		//echo '<input type="HIDDEN"  value="A" name="Almacenes[codsoc]" id="Almacenes_codsoc"  SIZE="1"  maxlenght="1" />';
	}

	public function actiondetalle($codalmacen,$codcentro){
		$palma=MiFactoria::cleanInput($codalmacen);
		$pcentro=MiFactoria::cleanInput($codcentro);
		$model=Almacenes::Model()->find("codalm=:vcodal AND codcen=:vcentro",array(":vcodal"=>$palma,":vcentro"=>$pcentro));
		$model->setScenario('grafico');
		if(Is_null($model))
			throw new CHttpException(500,'No se ha encontrado el almacen indicado');
		$this->render('detalle',array(
			'model'=>$model,
		));

	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Almacenes;
if(isset($_POST['Almacenes']))
		{
			$model->attributes=$_POST['Almacenes'];
			if($model->save()){
				yii::app()->user->setFlash('success','Se grabo el Almacen');
				$this->redirect(array('admin'));
				yii::app()->end();
			}ELSE{
				//PRINT_R($model->geterrors());die();
                                MiFactoria::Mensaje('error', 'Se detectaron los errores '.yii::app()->mensajes->geterroresItem($model->geterrors()));
			}
			//yii::app()->end();
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

		if(isset($_POST['Almacenes']))
		{
			$model->attributes=$_POST['Almacenes'];
			$model->save();
				yii::app()->user->setFlash('success','Se modificó el Almacén');
			$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('Almacenes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Almacenes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Almacenes']))
			$model->attributes=$_GET['Almacenes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Almacenes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Almacenes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Almacenes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='almacenes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actioncambiaestatusmov(){
		$codmov=MiFactoria::cleanInput($_GET['codmov']);
		$codal=MiFactoria::cleanInput($_GET['codal']);
		$registro=Almacentransacciones::model()->find("codal=:vcodal  and codmov=:vcodmov",
			array(":vcodmov"=>$codmov,":vcodal"=>$codal));

		if(!is_null($registro)){
			$registro->activo='1';
			$registro->save();
		}
	}

	public function actioncambiaestatusmovan(){
		$codmov=MiFactoria::cleanInput($_GET['codmov']);
		$codal=MiFactoria::cleanInput($_GET['codal']);
		$registro=Almacentransacciones::model()->find("codal=:vcodal  and codmov=:vcodmov",
			array(":vcodmov"=>$codmov,":vcodal"=>$codal));

		if(!is_null($registro)){
			$registro->activo=null;
			$registro->save();
		}
	}

	public function actiondescargainventario(){
		$almacen=MiFactoria::cleanInput($_GET['codal']);
		$model=New Alinventario();
		//var_dump($almacen);die();
		//var_dump($model->search_por_almacen_con_stock($almacen)->getdata());die();
		$camposaexportar=array(
			'id',
			'codcen',
			'codalm',
			'codart',
			'maestro.maestro_ums.desum',
			'maestro.descripcion',
			'ubicacion',
			'cant'

		);
		$camposaexportar1=array_merge($camposaexportar,array_values($model->camposstock));

		$this->exportCSV($model->search_por_almacen_con_stock($almacen),$camposaexportar1);
	}

	public function actiongraficar(){
		if(yii::app()->request->isAjaxRequest){
			$codal=$_POST['Almacenes']['codalm'];
			$numeropuntos=$_POST['Almacenes']['numeropuntos'];
			$periodo=$_POST['Almacenes']['periodo'];


        $datos=Montoinventario::datosgrafo($periodo,$numeropuntos,null,$codal);
        echo $this->renderpartial('//alinventario/grafo',array('datos'=>$datos),true,true);
        yii::app()->end();


		}
	}

	public function actionpintalinkevolucion(){
		if(yii::app()->request->isAjaxrequest){
				$periodo=MiFactoria::cleanInput($_GET['periodo']);
			    $densidad=MiFactoria::cleanInput($_GET['densidad']);
			     $almacen=MiFactoria::cleanInput($_GET['almacen']);
			     $alm=Almacenes::model()->findByPk($almacen);
			if(!is_null($alm)){
				ECHO CHtml::link("Ver evolucion","#", array("onclick"=>'$("#cru-frame3").attr("src","'.Yii::app()->createurl('/almacenes/evolucion', array('almacen'=> $almacen, 'periodo'=>$periodo,'densidad'=>$densidad) ).'");$("#cru-dialog3").dialog("open"); return false;' ));

			}else{
				throw new CHttpException(404,'NO existe este cod de almacen');
			}
					}
				}

	public function actionevolucion(){
		$periodo=MiFactoria::cleanInput($_GET['periodo']);
		$densidad=MiFactoria::cleanInput($_GET['densidad']);
		$almacen=MiFactoria::cleanInput($_GET['almacen']);
		$alm=Almacenes::model()->findByPk($almacen);
		$this->layout = '//layouts/iframe';
		if(!is_null($alm)){
			$datos=Montoinventario::datosgrafo($periodo,$densidad,null,$almacen);
			echo $this->renderpartial('//alinventario/grafo',array('datos'=>$datos),true,true);
			yii::app()->end();
			//echo $this->renderpartial('//alinventario/grafo',array('datos'=>$datos),true,true);
		}else{
			throw new CHttpException(404,'NO existe este codigo de almacen');
		}
	}

	public function actionrotacion(){

		$almacen=MiFactoria::cleanInput($_GET['almacen']);
		$alm=Almacenes::model()->findByPk($almacen);
		$this->layout = '//layouts/iframe';
		if(!is_null($alm)){
           echo yii::app()->request->url;
			yii::app()->end();
			//echo $this->renderpartial('//alinventario/grafo',array('datos'=>$datos),true,true);
		}else{
			throw new CHttpException(404,'NO existe este codigo de almacen');
		}
	}
}
