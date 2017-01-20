<?php

class TMonedaController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array( 'activalog',   'updatecambio',    'activamoneda',   'listamonedas',   'create','update','admin','cambio','colocacambio','actualizacambio'),
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
		$model=new TMoneda;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TMoneda']))
		{
			$model->attributes=$_POST['TMoneda'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codmoneda));
		}

		$this->render('create',array(
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
		$dataProvider=new CActiveDataProvider('TMoneda');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actioncambio()
	{
		$model=new Tipocambio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TMoneda']))
			$model->attributes=$_GET['TMoneda'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actioncolocacambio()
	{
		$model=new Tipocambio('general');
		//$model->unsetAttributes();  // clear any default values

		
		if(isset($_POST['Tipocambio'])){
			//$model->attributes=$_POST['Tipocambio'];
			$model->attributes=$_POST['Tipocambio'];
			if ($model->validate()) {
				yii::app ()->tipocambio->setcompra ( $model->monedaref , $model->compra );
				yii::app ()->tipocambio->setventa ( $model->monedaref , $model->venta );
				$this->redirect(array('cambio'));
			}

		}
		$this->render('_form',array(
			'model'=>$model,'monedas'=>yii::app()->tipocambio->monedasexternas(),
		));

	}

	public function actionactualizacambio($moneda1,$moneda2)
	{

		$moneda=MiFactoria::cleanInput($moneda2);
		$moneda=MiFactoria::cleanInput($moneda1);
		$monedas= yii::app()->db->createCommand()->selectDistinct('codmon1')->
		from('{{tipocambio}}')->queryColumn();
		if(!in_array($moneda1,$monedas))
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.' '.__LINE__.' ...parametro de moneda incorrecto .');

		if(!in_array($moneda2,$monedas))
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.' '.__LINE__.' ...parametro de moneda incorrecto .');

		$model=Tipocambio::model()->find("codmon1='".$moneda1."' and codmon2='".$moneda2."'");
		if(is_null($model))
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.' '.__LINE__.' ...No se han encotrado cambios para esta combinacion de monedas .');

		$model->setScenario('general');
		$model->compra=yii::app()->tipocambio->getcompra($moneda2);
		$model->venta=round(1/yii::app()->tipocambio->getventa($moneda2),2);
		$model->monedaref=$moneda1;

		$monedasfirme=array_combine($monedas,$monedas);
		if(isset($_POST['Tipocambio'])){
			//$model->attributes=$_POST['Tipocambio'];
			$model->attributes=$_POST['Tipocambio'];
			if ($model->validate()) {
				yii::app ()->tipocambio->setcompra ( $model->monedaref , $model->compra );
				yii::app ()->tipocambio->setventa ( $model->monedaref , $model->venta );
			}
			$this->redirect(array('cambio'));
		}
		$this->render('_form',array(
			'model'=>$model,'monedas'=>$monedasfirme,
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TMoneda the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TMoneda::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TMoneda $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tmoneda-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionlistamonedas()
            {
		$model=new Monedas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Monedas']))
			$model->attributes=$_GET['Monedas'];

		$this->render('adminmonedas',array(
			'model'=>$model,
		));
	}
        
      /*  Esta funcion agrega 
       * kla estruutua para una nueva moneda 
       * agrega registro de moneda en la tabla rtmoneda 
       * params : 
       * @codmon: Codifo de l anueva moenda
       * @seguir:  Indica si el tipo de cambio de esta moneda tebdra un Log
       * 
       */  
        public function actionactivamoneda(){
            if(isset($_GET['codmon'])){
                 $codmon= strtoupper(MiFactoria::cleanInput($_GET['codmon']));
                 ///ACTUALIZANDO EL STATUS DE LA MONEDA 
                 $regmoneda=Monedas::model()->findByPk($codmon);
                 if(is_null($regmoneda)){
                    MiFactoria::mensaje('error','NO ha especificado una moneda para agregar');
                  
                 } else{
                     $regmoneda->setScenario('status');
                     $regmoneda->habilitado='1';
                    $regmoneda->save();
                       
                      yii::app()->tipocambio->agregarmoneda($codmon,$seguir=false);
                     MiFactoria::mensaje('success','Se agrego la moneda al sistema');
                 }
                     
                
            }else{
                 MiFactoria::mensaje('error','NO ha especificado una moneda para agregar');
            }
           $this->redirect('cambio');
           
            
        }
        
        
        public function actionupdatecambio($fecha=null)
        {
             $items= Tipocambio::model()->findAll();    
                if(isset($_POST['Tipocambio']))
                        {
                            //echo "saliomm "; die();
                    $valid=true;
                             $transaccion=$items[0]->dbConnection->beginTransaction();
                                 foreach($items as $i=>$item)
                                         {
                                           // echo "entro "; die();
                                     if(isset($_POST['Tipocambio'][$i])){
                                                $item->attributes=$_POST['Tipocambio'][$i];
                                                $valid=$item->validate();
                                                    if($valid){
                                                        $item->save();
                                                         }else{
                                                            break; 
                                                            }
                
                                                                }
                
                                        }
                                    if($valid){
                                        $transaccion->commit();
                                        MiFactoria::Mensaje('success','Se grabaron los registros');
                                        $this->redirect('cambio');
                                        
                                    }else{
                                            $transaccion->rollback(); 
                                            MiFactoria::Mensaje('error',' NO Se grabaron los registros');
                                       
                                        }
             }
          
    // displays the view to collect tabular input
    $this->render('actualizacambio',array('items'=>$items));
           
            
        }
      public function actionactivalog(){
                    
          if(yii::app()->request->isAjaxRequest){
              if(isset($_GET['id'])){
                  $id= (integer)MiFactoria::cleanInput($_GET['id']);
                  $registro= Tipocambio::model()->findByPk($id);
                  if(is_null($registro))
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);
		   $registro->setScenario('seguimiento');
                   if($registro->seguir=='1')
                   {
                       $registro->seguir='0';
                   } else {
                       $registro->seguir='1';
                   }
                  // $registro->seguir='1';
                   $registro->save();
                   echo "Se actualizo el seguiemietno del tipo de cambio para la moneda ".$registro->codmon1;
              }
          }
      }  
}
        

