<?php

class TenenciasController extends Controller
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
			
			
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('activapropietario','modificaevento','borrapropietario','borraevento','creaevento','admin','delete','create','update','view','creapropietario'),
				'users'=>array('@'),
			
		));
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
		$model=new Tenencias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tenencias']))
		{
			$model->attributes=$_POST['Tenencias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codte));
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

		if(isset($_POST['Tenencias']))
		{
			$model->attributes=$_POST['Tenencias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codte));
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
		$dataProvider=new CActiveDataProvider('Tenencias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tenencias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tenencias']))
			$model->attributes=$_GET['Tenencias'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tenencias the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tenencias::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tenencias $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tenencias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actioncreapropietario($id){
            $registro=$this->loadModel($id);
            if(is_null($registro))
                throw new CHttpException(500,'NO existe una tenencia para el id   -> '.$id);
            	
		
		$model=new Tenenciastraba();
		//$model->setScenario('INS_ACTIVO');
		//$model->valorespordefecto($this->documentohijo);
			$model->codte=$registro->codte;
			
		if(isset($_POST['Tenenciastraba']))		{
			$model->attributes=$_POST['Tenenciastraba'];			
			if($model->save())
				 if (!empty($_GET['asDialog']))
						{
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
                                                    window.parent.$('#cru-frame').attr('src','');
						window.parent.$.fn.yiiGridView.update('propietarios-grid');
						");
						Yii::app()->end();
				}
		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('detalle_propietarios',array(
			'model'=>$model, 'idcabeza'=>$registro->codte
		));
		
	}
	 public function actioncreaevento($id){
            $registro=$this->loadModel($id);
            if(is_null($registro))
                throw new CHttpException(500,'NO existe una tenencia para el id   -> '.$id);
            	
		
		$model=new Tenenciasproc();
		//$model->setScenario('INS_ACTIVO');
		//$model->valorespordefecto($this->documentohijo);
			$model->codte=$registro->codte;
			
		if(isset($_POST['Tenenciasproc']))		{
			$model->attributes=$_POST['Tenenciasproc'];			
			if($model->save())
				 if (!empty($_GET['asDialog']))
						{
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
                                                    window.parent.$('#cru-frame').attr('src','');
						window.parent.$.fn.yiiGridView.update('tenencias-grid');
						");
						Yii::app()->end();
				}
		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('detalle_procesos',array(
			'model'=>$model, 'documento'=>$registro->codocu
		));
		
	}
       public function actionmodificaevento($id){
            $model= Tenenciasproc::model()->findByPk($id);
            
            if(is_null($model))
                throw new CHttpException(500,'NO existe una tenencia para el id   -> '.$id);
            	
		
		//$model=new Tenenciasproc();
		//$model->setScenario('INS_ACTIVO');
		//$model->valorespordefecto($this->documentohijo);
			//$model->codte=$registro->codte;
			
		if(isset($_POST['Tenenciasproc']))		{
			$model->attributes=$_POST['Tenenciasproc'];			
			if($model->save())
				 if (!empty($_GET['asDialog']))
						{
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script("window.parent.$('#cru-dialog31').dialog('close');
                                                    window.parent.$('#cru-frame31').attr('src','');
						window.parent.$.fn.yiiGridView.update('tenencias-grid');
						");
						Yii::app()->end();
				}
		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('detalle_procesos',array(
			'model'=>$model, 'documento'=>$model->tenencias->codocu
		));
		
	}
        public function actionactivapropietario(){
            if(yii::app()->request->isAjaxRequest){
                
                $id= (integer) MiFactoria::cleanInput($_GET['id']);
                $registro=Tenenciastraba::model()->findByPk($id);
                if(is_null($registro)){
                   // MiFactoria::Mensaje('error', 'No se encontro el registro para este id');
                    return 'No se encontro el registro para este id';
                }
                  //throw new CHttpException(500,'NO se econtro el registro para el id   -> '.$id);   
                  $registro->setScenario('estado');
                       $registro->activo='1';
                       $registro->save();                     
                       return 'Se ha Activado esta persona en la tenencia';
            
                  }
        }
        
        
        
         public function actionborrapropietario(){
            if(yii::app()->request->isAjaxRequest){
                
                $id= (integer) MiFactoria::cleanInput($_GET['id']);
                $registro=Tenenciastraba::model()->findByPk($id);
                if(is_null($registro)){
                   // MiFactoria::Mensaje('error', 'No se encontro el registro para este id');
                    return 'No se encontro el registro para este id';
                }
                  //throw new CHttpException(500,'NO se econtro el registro para el id   -> '.$id);   
                  if($registro->nprocesosdocu >0){
                     // MiFactoria::Mensaje('error', 'No se epued elimianr este registro , tiene acciones registradas');
                    //return 'No se epued elimianr este registro , tiene acciones registradas';
                      $registro->setScenario('estado');
                       $registro->activo='0';
                       $registro->save();
                       
                       
                       return 'Se ha desactivado esta persona en la tenencia';
                  } else{
                      if($registro->delete()){
                   //MiFactoria::Mensaje('succes', 'Se elimino el registro sin problemas');
                      return 'Se elimino el registro';
                   
                         }
                  }
                     
               
                   
           
            
        }
        }
        
        
        
        
        public function actionborraevento(){
            if(yii::app()->request->isAjaxRequest){
                
                $id= (integer) MiFactoria::cleanInput($_GET['id']);
                $registro=  Tenenciasproc::model()->findByPk($id);
                if(is_null($registro)){
                   // MiFactoria::Mensaje('error', 'No se encontro el registro para este id');
                    return 'No se encontro el registro para este id';
                }
                  //throw new CHttpException(500,'NO se econtro el registro para el id   -> '.$id);   
                  if($registro->nprocesosdocu >0){
                     // MiFactoria::Mensaje('error', 'No se epued elimianr este registro , tiene acciones registradas');
                    return 'No se epued eliminar este registro , tiene acciones registradas';
                      
                  }
                     
               if($registro->delete()){
                  return  'Se elimino el registro sin problemas';
               }
                   
                
            
        }
        
}

 public function actionajaxcargaeventos(){
     if(yii::app()->request->isAjaxRequest){
         $valor=  MiFactoria::cleanInput($_POST['Tenenciasproc']['codocu']);
          $criteria = new CDbCriteria();
		$criteria->addCondition("codocu=:vcodocu");
                $criteria->params=array(":vcodocu"=>$valor);
		
		$data=CHtml::listData(	Eventos::model()->findAll($criteria),
		  //$data=CHtml::listData(	Direcciones::model()->findAll(),
												"id",
												"descripcion"
											
												); 
			echo CHtml::tag('option', array('value'=>null),CHtml::encode('Escoja un evento'),true);
			foreach($data as $value=>$name) { 
			    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			   } 
     }
               
            }    


            
    public function actionajaxcargaprevios(){
     if(yii::app()->request->isAjaxRequest){
         $valor=  MiFactoria::cleanInput($_POST['Tenenciasproc']['codocu']);
          $criteria = new CDbCriteria();
          echo "valor es ".$valor;
		$criteria->addCondition("codocu=:vcodocu");
                $criteria->params=array(":vcodocu"=>$valor);
		
		$data=CHtml::listData(Tenenciasproc::model()->findAll($criteria),
		  //$data=CHtml::listData(	Direcciones::model()->findAll(),
												"id",
												"auxiliar"
											
												); 
			echo CHtml::tag('option', array('value'=>null),CHtml::encode('Escoja un evento'),true);
			foreach($data as $value=>$name) { 
			    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			   } 
     }
               
            }            
            
            

}
