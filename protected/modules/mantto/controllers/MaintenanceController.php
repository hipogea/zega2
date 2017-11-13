<?php

class MaintenanceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
   
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
				'actions'=>array('CreateValuePoint','UpdateMeasurePoint'  , 'AjaxShowDocumentsPoints',     'ManageMeasurePoints' ,'ReplacePoint',    'createMeasurePoint','updateMeasurePoint'),
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
	public function actionCreateMeasurePoint()
	{
	$id=(integer) MiFactoria::cleanInput($_GET['id']);
        $registro= Inventario::model()->findByPk($id);
        if(is_null($registro))
            throw new CHttpException(500,' Can not find registry ');
      
            $nombremodelo='Manttohorometros';
            $model=new $nombremodelo;            
                $model->valorespordefecto();
                 
		if(isset($_POST[$nombremodelo]))
		{
			$model->attributes=$_POST[$nombremodelo];
			if($model->save()){
                             if (!empty($_GET['asDialog']))
			{
                        //Close the dialog, reset the iframe and update the grid
			   echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
				window.parent.$('#cru-frame').attr('src','');
				window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
					");
				Yii::app()->end();
		          }
			//$this->render('ot_equipo',array('id'=>$model->id));
			Yii::app()->end();
                            
                                    }
				}
                     $this->layout="//layouts/iframe";           
		$this->render('_horometro',array(
			'model'=>$model,'id'=>$id,
                         //|'criterio'=>$criterio,
                        		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionupdateMeasurePoint($id)
	{
		
            $id=(integer) MiFactoria::cleanInput($_GET['id']);
        $model= Manttohorometros::model()->findByPk($id);
         
        $nombremodelo='Manttohorometros';
            //$model=new $nombremodelo;   
         //echo "hiola";die();
                //$model->valorespordefecto();
            
		if(isset($_POST[$nombremodelo]))
		{
			$model->attributes=$_POST[$nombremodelo];
			if($model->save()){
                             if (!empty($_GET['asDialog']))
			{
                        //Close the dialog, reset the iframe and update the grid
			   echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
				window.parent.$('#cru-frame').attr('src','');
				window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
					");
				Yii::app()->end();
		          }
			//$this->render('ot_equipo',array('id'=>$model->id));
			Yii::app()->end();
                            
                                    }
				}
                                  
         $this->layout="//layouts/iframe";           
		$this->render('_horometro',array(
			'model'=>$model,'id'=>$model->inventario->idinventario,
                         //|'criterio'=>$criterio,
                        		));
	}

	public function actionReplacePoint($id){
            $id=(integer) MiFactoria::cleanInput($_GET['id']);
        $modelant= Manttohorometros::model()->findByPk($id);
        if(is_null($modelant))
            throw new CHttpException(500,' Can not find registry ');
         if(!$modelant->sePuedeReemplazar())
            throw new CHttpException(500,' Can not replace this Measurement Point');
        
            $nombremodelo='Manttohorometros';
            $model=new $nombremodelo('reemplazo');             
               // $model->valorespordefecto();
                 $model->ubicacion=$modelant->ubicacion;
                 $model->hidpadre=$modelant->id;
                 $model->hidequipo=$modelant->hidequipo;
                 $model->unidades=$modelant->unidades;
                 $model->incremental=$modelant->incremental;
		if(isset($_POST[$nombremodelo]))
		{
			$model->attributes=$_POST[$nombremodelo];
			if($model->save()){
                             if (!empty($_GET['asDialog']))
			{
                        //Close the dialog, reset the iframe and update the grid
			   echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
				window.parent.$('#cru-frame').attr('src','');
				window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
				js:$.notify('This measurement point has restarted')	");
				Yii::app()->end();
		          }
			//$this->render('ot_equipo',array('id'=>$model->id));
			Yii::app()->end();
                            
                                    }
				}
                     $this->layout="//layouts/iframe";           
		$this->render('_horometroreplace',array(
			'model'=>$model,'id'=>$id,
                         //|'criterio'=>$criterio,
                        		));
	}

   public function actionManageMeasurePoints($id){
      
       $id=(integer) MiFactoria::cleanInput($id);
       $equipo=$this->loadEquipment($id);
       
       $proveedor= Manttohorometros::model()->search_por_activo($id);
      
       $this->render('listahorometros',
               array(
                   'model'=>$equipo,
                   'proveedor'=>$proveedor,
               )
               );
       
       
   }
   
   private function loadEquipment($id){
    $registro= Inventario::model()->findByPk($id);
    if(is_null( $registro))
        throw new CHttpException(500,' Can not find Equipment registry ');
      return $registro;

   }
   
   private function loadPoint($id){
    $registro= Manttohorometros::model()->findByPk($id);
    if(is_null( $registro))
        throw new CHttpException(500,' Can not find Equipment registry ');
      return $registro;

   }
   
    private function loadMeasure($id){
    $registro= Manttolecturahorometros::model()->findByPk($id);
    if(is_null( $registro))
        throw new CHttpException(500,' Can not find Equipment registry ');
      return $registro;

   }
   
   
   public function actionAjaxShowDocumentsPoints(){
       
       //if(yii::app()->request->isAjaxRequest)
           //{   
           
           if(isset($_GET['id'])){  
               
               $id= (integer)MiFactoria::cleanInput($_GET['id']); 
             $proveedorlecturas= Manttolecturahorometros::model()->search_por_horometro($id);
             // var_dump($proveedorlecturas);
            $cad=$this->renderPartial('lecturas',array('proveedorlecturas'=>$proveedorlecturas),true, true);
              //  var_dump($cad);    
               }
    //}
   }
   
  
   
   public function actionCreateValuePoint($id){   
		
       $id= (integer)MiFactoria::cleanInput($_GET['id']); 
       $padre=$this->loadPoint($id);
            $nombremodelo='Manttolecturahorometros';
            $model=new $nombremodelo;            
                $model->valorespordefecto();  
                $model->hidhorometro=$padre->id;
		if(isset($_POST[$nombremodelo]))
		{
			
                    $model->attributes=$_POST[$nombremodelo];
                    //var_dump( $model->attributes);die();
                    //var_dump( $model->fecha);
			if($model->save()){
                             if (!empty($_GET['asDialog']))
			{
                        //Close the dialog, reset the iframe and update the grid
			   echo CHtml::script("window.parent.$('#cru-dialog1').dialog('close');
				window.parent.$('#cru-frame1').attr('src','');
				window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
					");
				//Yii::app()->end();
		          }
			//$this->render('ot_equipo',array('id'=>$model->id));
			//Yii::app()->end();
                            
                                    }
                                    //var_dump( $model->fecha);
				}
                  
                   // var_dump( $model->fecha);die();  }            
                     $this->layout="//layouts/iframe";           
		$this->render('medida',array('padre'=>$padre,
			'model'=>$model,'id'=>$id,
                         //|'criterio'=>$criterio,
                        		));
	
      
   }
    
}