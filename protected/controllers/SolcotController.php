<?php


class SolcotController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

const ESTADO_CREADO='10';
const ESTADO_ANULADO='30';
const ESTADO_PUBLICADO='40';
const ESTADO_PREVIO='99';
const NOMBRECLASE_DESOLPE='Desolpe';
	public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
	}

	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");

		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','admin','ocultar','publicar','generadetalle','create','update'),
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
		$model=new Solcot;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solcot']))
		{
			$model->attributes=$_POST['Solcot'];
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
		if(yii::app()->user->id==$model->iduser) {
			if ( isset( $_POST[ 'Solcot' ] ) ) {
				$model->attributes = $_POST[ 'Solcot' ];
				if ( $model->save () ) {
					$this->redirect ( array ( 'view' , 'id' => $model->id ) );
				}else{
					print_r($model->attributes);
					print_r($model->geterrors());yii::app()->end();
				}
			}

			$this->render ( 'update' , array (
				'model' => $model ,
			) );
		}else{
			yii::app()->user->setFlash('notice','Esta solicitud es de otro usuario, no puede relaizar modificaciones');
			$this->redirect(array('view','id'=>$model->id));
		}
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
		$dataProvider=new CActiveDataProvider('Solcot');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Solcot('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Solcot']))
			$model->attributes=$_GET['Solcot'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Solcot the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Solcot::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Solcot $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solcot-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actiongeneradetalle(){
		$identidad=(int)MiFactoria::cleanInput($_GET['id']);
		if(is_null(Solcot::model()->findByPk($identidad)))
			throw new CHttpException(500,'NO existe ningun registor pàra este ID');
        // var_dump(yii::app()->maletin->getvalues(NOMBRECLASE_DESOLPE));yii::app()->end();
		foreach(yii::app()->maletin->getvalues(NOMBRECLASE_DESOLPE) as $fila){
			if(is_null(Desolcot::model()->find("hidsolcot=".$identidad." and hiddesolpe=".$fila['idregistro'].""))) {
				$registro = new Desolcot();
				$registro->setAttributes (
					array (
						'hidsolcot' => $identidad ,
						'hiddesolpe' => $fila[ 'idregistro' ] ,
						'codispo' => ESTADO_CREADO ,
						'cant' => 1 ,
						'preciounit' => 0 ,

					)
				);
				if ( ! $registro->save () )
					print_r ( $registro->geterrors () );
			} else {
				echo "si existe";
			}

		}
	}

	public function actionpublicar($id){
		$id=(int)MiFactoria::cleanInput($_GET['id']);
		$solcoti=$this->loadModel($id);
		if(yii::app()->user->id==$solcoti->iduser) {
			$solcoti->setScenario('cambiaestado');
			$solcoti->codestado=ESTADO_PUBLICADO;
			$solcoti->save();
			if($solcoti->mail=='1')
			{
				$mensax=$this->notificamail($solcoti);
				if(strlen($mensax)>0){
					yii::app()->user->setFlash('notice','El mensaje de correo no se pudo enviar :'.$mensax);
				}
			}


			yii::app()->user->setFlash('success','Esta solicitud ha sido publicada');

			$this->redirect(array('view','id'=>$solcoti->id));
		}else{
			yii::app()->user->setFlash('notice','Esta solicitud es de otro usuario, no puede relaizar modificaciones');
			$this->redirect(array('view','id'=>$solcoti->id));
		}
	 }

	public function actionocultar($id){
		$id=(int)MiFactoria::cleanInput($_GET['id']);
		$solcoti=$this->loadModel($id);
		if(yii::app()->user->id==$solcoti->iduser) {
			$solcoti->setScenario('cambiaestado');
			$solcoti->codestado=ESTADO_CREADO;
			$solcoti->save();
			yii::app()->user->setFlash('notice','Esta solicitud ha sido retirada');

			$this->redirect(array('view','id'=>$solcoti->id));

		}else{
			yii::app()->user->setFlash('notice','Esta solicitud es de otro usuario, no puede relaizar modificaciones');
			$this->redirect(array('view','id'=>$solcoti->id));
		}
	}

		public function notificamail($model){
			$mensaje=$this->renderpartial('detalle_grilla',array('model'=>$model),true);
			//var_dump($mensaje);yii::app()->end();

				$cadena=yii::app()->correo->correo_simple (
					Contactos::getListMailContacto ( $model->idcontacto , $model->codocu ) ,
					Yii::app ()->user->email ,
					'SOLICITUD DE COTIZACION' ,
					" favor de cotizar los siguiente s mateiale   ".$mensaje
				);
			//var_dump($mensaje);yii::app()->end();

			return $cadena;

				}



}
