<?php
const ESTADO_CREADO='10';
const ESTADO_AUTORIZADO='20';
const ESTADO_ANULADO='30';
const ESTADO_LIQUIDADO='40';
const TIPO_DE_FLUJO_A_RENDIR='102';


class CajachicaController extends ControladorBase


{

	public function __construct() {
		parent::__construct($id='cajachica',Null);
		$this->documento='370';
		$this->modelopadre='Cajachica';
		$this->modeloshijos=array();
		$this->documentohijo='200';
		$this->ConfigArreglos();
		$this->campoestado='codestado';

	}
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
	}

	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('cargaimputacion','admin','view','create','borraitems','aprobaritem','update','creadetalle','actualizadetalle'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionActualizadetalle($id)
	{
		$model=Dcajachica::model()->findByPk($id);
		if(is_null($model))
			throw new CHttpException(500,'No existe este detalle con este ID');
		if(isset($_POST['Dcajachica']))
		{
			$model->attributes=$_POST['Dcajachica'];
			if($model->save())
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		");
					Yii::app()->end();
				}
		}			// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_form_detalle',array(
			'model'=>$model, 'idcabeza'=>$model->hidcaja
		));



	}

	public function actionCierracaja()
	
	{
			$model=$this->loadModel($_POST['Cajachica']['id']);
		if(is_null($model))
		  {
		  echo "No se encontro el registro";
		  } else {
		     if($model->hijospendientes > 0 )		{
		  		echo "No se puede cerrar, faltan confirmar los items";
		  		} else {
		  		$model->setScenario('cambiaestado');
		  		$model->codestado='20';
		  		if($model->save()){}
		  		//echo " Se cambio el estado";
		  		 }
		  		
		  }
					
					
	}
	
	
	public function actionAprobaritem()
	{
		if(!isset($_GET['ajax'])) {
			$identidad = $_GET[ 'id' ];
			$modelo = Dcajachica::model ()->findByPk ( $identidad );
			if ( is_null ( $modelo ) )
				throw new CHttpException( 500 , 'No existe esta solicitud con este ID    ' . $_GET[ 'id' ] . '    ' );

			//primero si le corresponde
			if ( $modelo->isTratable () ) {
				if ( ! $modelo->tieneHijospendientes () ) {
					$modelo->setScenario ( 'cambiaestado' );
					$modelo->codestado = ESTADO_AUTORIZADO;
					$modelo->save ();
				}

			}

		}


	 

	}

 public function borraitemhijox($id){
	 $modeloxx=Dcajachica::model()->findByPk($id);
	 return $modeloxx->borra();
 }


	public function actionBorraitems()
	{
         $cadeni="";
		$autoIdAll = $_POST['cajita'];//var_dump($_POST['cajita']);yii::app()->end();
		 foreach($autoIdAll as $autoId)
			{
				//var_dump($autoId);yii::app()->end();
				$cadeni.=$this->borraitemhijox($autoId);

			}

         echo $cadeni;

	}





	public function actionCreadetalle($idcabeza)
	{
		$modelocabeza=Cajachica::model()->findByPk($_GET['idcabeza']);
     //VERIFICANDO QUE NO EXCEDA EL % DE TOLERNACIA

			if ( is_null ( $modelocabeza ) )
				throw new CHttpException( 500 , 'No existe esta solicitud con este ID    ' . $_GET[ 'idcabeza' ] . '    ' );

		$model = new Dcajachica;
			$model->valorespordefecto ( $this->documento );
			$model->{$this->campoestado} = ESTADO_CREADO;
			$model->coddocu = $this->documentohijo;
			// Uncomment the following line if AJAX validation is needed
			//$this->performAjaxValidation($model);

			if ( isset( $_POST[ 'Dcajachica' ] ) ) {
				$model->attributes = $_POST[ 'Dcajachica' ];
				if ( $model->save () )
					if ( ! empty( $_GET[ 'asDialog' ] ) ) {
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script ( "window.parent.$('#cru-dialog3').dialog('close');
													                    window.parent.$('#cru-frame3').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-grid');
																		" );
						Yii::app ()->end ();
					}
			}            // if (!empty($_GET['asDialog']))


			$this->layout = '//layouts/iframe';
			$this->render('_form_detalle',array(
				'model'=>$model, 'idcabeza'=>$idcabeza
			));



	}







	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		///Verificamos que este bloqueado por el usuario
		if(MiFactoria::estasensesion($id,$this->documento)){
			$this->terminabloqueo($id);
			//$this->limpiatemporaldetalle();

		}


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
		$model=new $this->modelopadre;
		$model->valorespordefecto($this->documento);
		$model->iduser=Yii::app()->user->id;
		if(isset($_POST[$this->modelopadre]))
		{
			$model->attributes=$_POST[$this->modelopadre];
			$model->codestado='10';
            $model->codocu=$this->documento;
			if($model->save()){
				$this->redirect(array('update','id'=>$model->id));

			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

private function buscasaldoanterior ($id){



}




	public function actionUpdate($id)
	{
		$model=MiFactoria::CargaModelo($this->modelopadre,$id);
		if($this->itsFirsTime($id))
		{
			if($this->getUsersWorkingNow($id))
			{ //si esta ocupado
				Yii::app()->user->setFlash('error', "El documento esta siendo modificado por otro usuario ");
				$this->redirect(array('view','id'=>$model->id));
			} else { // Si no lo esta renderizar sin mas
				$this->setBloqueo($id) ; 	///bloquea
				$this->render('update',array('model'=>$model));
				yii::app()->end();
			}

		} else {
			if($this->isRefreshCGridView($id))
			{ //si esta refresh de grilla
				$this->render('update',array('model'=>$model));
				yii::app()->end();
			} else { // Si no lo es  tenemos que analizar los dos casos que quedan
				if($this->IsRefreshUrlWithoutSubmit($id))
				{ ///Solo refreso la pagina
					Yii::app()->user->setFlash('notice', "No has confirmado los datos, solo haz refrescaod la pagina ");

					//echo "<br><br><br><br><br><br><br><br>salio eso";
					$this->render('update',array('model'=>$model));
					yii::app()->end();
				} else { 	 ///Ahora si recein se animo a hacer $_POST	, y confirmar los datos
					IF(isset($_POST[$this->modelopadre])) {
						$model->attributes=$_POST[$this->modelopadre];
						//if($model->hacambiado()) {
							if($model->save()){
								$this->terminabloqueo($id);
								Yii::app()->user->setFlash('success', "Se grabo el documento  ".$this->SQL);
								$this->redirect(array('view','id'=>$model->id));
							} else {
								Yii::app()->user->setFlash('error', "  NO s epudo granar e domcjuento ".$this->displaymensajes('error'));

								$this->render('update',array('model'=>$model));
								yii::app()->end();
								}
						//} else   {
							//Yii::app()->user->setFlash('notice', "  no has modificado nada  de la cabecera ");
							//$this->render('update',array('model'=>$model));
							//yii::app()->end();
						//}
					} else  { //En este caso quiere decir que la sesion/bloqueo anterior no se ha cerrado correactmente
						$this->terminabloqueo($id);
						$this->SetBloqueo($id);
						Yii::app()->user->setFlash('notice', "NO cerraste correctamente, Ya tenías una sesion abierta en este domcuento,");
						$this->render('update',array('model'=>$model));
						yii::app()->end();
					}
				}
			}
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
		$dataProvider=new CActiveDataProvider('Cajachica');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
//var_dump(yii::app()->settings->get('general_monedadef'));yii::app()->end();
		$model=new Cajachica('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cajachica']))
			$model->attributes=$_GET['Cajachica'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cajachica the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cajachica::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cajachica $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cajachica-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/*  Veriicamosa que nadie entre q actualizar si no es su propiedad */

PUBLIC FUNCTION actioncargaimputacion (){
    
    IF(yii::app()->request->isAjaxRequest){
       $tipo=MiFactoria::cleanInput($_POST['tipo']);
   /* $modelo= Dcajachica::model()->findByPk(
            (Integer)MiFactoria::cleanInput($_POST['Dcajachica']['id']));
    */
       $modelo=new Dcajachica;
       /*$mode= serialize($modelo);
       $mode= unserialize($mode);
       var_dump($mode);die();*/
       $formulario= unserialize(base64_decode($_POST['formula']));
       //var_dump($formulario);die();
       $registros=Tipimputa::model()->findAll("codimpu=:v",array(":v"=>$tipo));
    foreach($registros as $record){
        if(is_null($record->validacion) or empty($record->validacion)){
            //var_dump($registro);die();
             //echo "error "; die();
            throw new CHttpException(500,'Este tipo de imputacion '.$record->desimputa.' no tiene un modelo asociado  '.gettype($record->validacion));
		
        }else{
            //echo "jajaja"; die();
          echo $this->renderpartial('imputacion_'.trim($record->validacion),array('form'=>$formulario,'model'=>$modelo),true); 
        } 
     }
        
         }  else{
             echo "no salu ecompare";
         } 
    
    
        }
        
        
        
}