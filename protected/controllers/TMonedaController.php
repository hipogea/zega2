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
				'actions'=>array('desactivamoneda', 'actualiza',   'updatecambiolog',    'ajaxcambioporfecha',      'activalog',   'updatecambio',    'activamoneda',   'listamonedas',   'create','update','admin','cambio','colocacambio','actualizacambio'),
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
                $logcambio=New Logtipocambio();
               $logcambio->fecha= date('Y-m-d',time()-24*60*60);
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TMoneda']))
			$model->attributes=$_GET['TMoneda'];

		$this->render('admin',array(
			'model'=>$model,'logcambio'=>$logcambio
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
                    MiFactoria::mensaje('error','La moneda '.$codmon.' No existe');
                  
                 } else{
                     //veridicando que este habilitada 
                    
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
             $items= Tipocambio::model()->search()->getdata();
                     
                   //  Tipocambio::model()->findAll("codmon1 <> :vcodmon1",array(":vcodmon1"=>yii::app()->settings->get('general','general_monedadef')));    
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
        
        
         public function actionupdatecambiolog()
        {
            if(isset($_GET['fecha'])){
                //var_dump($_GET['fecha']);die();
                if(preg_match('/(19|20)\d{2}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/',$_GET['fecha'])){
                    
                    $items= Logtipocambio::model()->findAll(" codmondef='".yii::app()->settings->get('general','general_monedadef')."' and fecha='".$_GET['fecha']."'");
                    //var_dump($items);die();
                    $yaestanmonedas=array();
                    foreach($items AS $fila){
                         $yaestanmonedas[]=$fila->codmon;
                     } 
                     //var_dump($yaestanmonedas);die();
                    $monedasactivas=yii::app()->tipocambio->monedasactivas();
                    //var_dump($monedasactivas);die();
                    $faltanmonedas= array_diff($monedasactivas, $yaestanmonedas);
                    foreach($faltanmonedas as $clave=>$monedafalta){
                        $registro=New Logtipocambio();
                        $cambioac=yii::app()->tipocambio->registroactual($monedafalta);
                        
                        //var_dump($cambioac);
                        $registro->setAttributes(                               
                                    array(
                                                         'hidcambio'=>$cambioac->id,
                                                         'compra'=>null,
                                                        'codmon'=>$monedafalta,
                                                        'codmondef'=>$cambioac->codmondef,
                                                        'venta'=>null,
                                                        'fecha'=>$_GET['fecha'],
                                                        'dia'=>date("w",strtotime($_GET['fecha'])),
                                                         'iduser'=>yii::app()->user->id,
                                                            'diaano'=>date("z",strtotime($_GET['fecha'])),
                                                        )                                 
                                );
                       $items[]=$registro;
                    }
                    if(!isset($_POST['Logtipocambio']))
                    $this->render('actualizalogcambio',array('items'=>$items,'fecha'=>$_GET['fecha']));
           
            }
            
                    }
            
                if(isset($_POST['Logtipocambio']))
                        {
                    //var_dump($items);die();
                       // unset($_GET) ;  
                    //var_dump($items); die();
                    $valid=true;
                             $transaccion=$items[0]->dbConnection->beginTransaction();
                                 foreach($items as $i=>$item)
                                         {
                                           //echo count($items); die();
                                    //var_dump($item);die();
                                     if(isset($_POST['Logtipocambio'][$i])){
                                                $item->attributes=$_POST['Logtipocambio'][$i];
                                                //$item->venta=$_POST['Logtipocambio'][$i]['venta'];
                                                //var_dump($item->attributes);
                                                $valid=$item->validate();
                                                    if($valid){
                                                       $item->save();
                                                           //echo yii::app()->mensajes->getErroresItem($item->geterrors());
                                                         }else{
                                                             $mensaje=yii::app()->mensajes->getErroresItem($item->geterrors());
                                                            break; 
                                                            }
                
                                                                }
                
                                        }
                                    if($valid){
                                        $transaccion->commit();
                                        MiFactoria::Mensaje('success','Se grabo el registro ');
                                        $this->redirect('cambio');
                                        
                                        
                                    }else{
                                            $transaccion->rollback(); 
                                            MiFactoria::Mensaje('error',' NO Se grabaron los registros  ->  '.$mensaje);
                                            $this->render('actualizalogcambio',array('items'=>$items));
                                       
                                        }
                              
             }
          
    // displays the view to collect tabular input
    
            
        }
         
        
      public function actionajaxcambioporfecha(){
                    
          if(yii::app()->request->isAjaxRequest){
              if(isset($_POST['fechita'])){
                  $fecha=$_POST['fechita'];
                  $model=New Logtipocambio();
                  echo $this->renderpartial('cambioporfecha',array('model'=>$model,'fecha'=>$fecha),true, false);
              }
          }
      } 
      
    public function actiondesactivamoneda($id){
         yii::app()->tipocambio->desactivamoneda($id);
        $this->redirect(array('cambio'));
        
        
        
    }  
    
    public function actionactualiza(){
        $codmon= MiFactoria::cleanInput($_GET['codmon']);
         $model= TMoneda::model()->findByPk($codmon); 
          $modelocambio=yii::app()->tipocambio->registroactual($codmon);
                      
        IF(!is_null($model)){
          if(isset($_POST['TMoneda']))
		{
			$model->attributes=$_POST['TMoneda'];
			
                         if(!is_null($modelocambio)){
                             $modelocambio->setScenario('rapido');
                             $modelocambio->attributes=$_POST['Tipocambio'];
                             if($model->save() and $modelocambio->save())
				$this->redirect(array('listamonedas'));
                         }else{
                             if($model->save())
				$this->redirect(array('listamonedas'));
                         }
                            
           // var_dump($modelocambio);
                        
                        
		}  
           
             $this->render("_editar",array('model'=>$model,'modelocambio'=>$modelocambio));
              
            
        }else{
           throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.' '.__LINE__.' ...No se han encotrado esta moneda :'.$codmon);
 
        }
        
        
    } 
}
        

