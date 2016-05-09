<?php

class InventarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $direcciones='';

	
	
	
	/**
	 * Esta es una funcion que usa las extensione spara exportar a Excel 
	 * 
	 */
	    public function behaviors()
    {
        return array(
            'eexcelview'=>array(
                'class'=>'ext.eexcelview.EExcelBehavior',
            ),
        );
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * @return array action filters
	 */
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('recibevalor','relaciona','envia','observaciones','borrafoto','exporta','vaa','index','view','detalle','sube','confirmar','misactivos'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','subearchivo','gestionafotos','Borrafotos'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('updatetotal'),
				'users'=>array('@'),
				),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin','@','*'),
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

	public function actionObservaciones()
	{
		$this->redirect(array('observaciones/admin'));
	}

	
	
	
	public function actionConfirmar($id)
	{
		$this->render('vw_confirmar',array(
			'id'=>$id,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Inventario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventario']))
		{
			$model->attributes=$_POST['Inventario'];
			
			
			  
			  
			if($model->save())
			     $model->refresh();
			    $this->enviacorreo($model->codigoaf,$model);
				
				$this->redirect(array('confirmar','id'=>$model->idinventario));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	
	
	public function actionRelaciona()
	{
		//$model=new Inventario;
			//$vvalorclave=$_POST['vvalor'];
			//$nombreclase=$_POST['nombreclase'];
			//$modelo=$_GET['miclase'];
			$ordencampo=$_GET['ordencampo'];
			$campito=$_GET['campo'];
			$vvalore=$_POST['Inventario'][$campito];
			$relaciones=$_GET['relaciones'];
			//$nombrecampo=$_POST['nombrecampo'];
			//$vvalor=$vvalore['coddocu'];
			 // $vnombrecampo=$_POST['nombrecampo'];
			//$vcampoforaneo=$_POST['vnombrecampoforaneo'];
			//$modelo=Documentos::model()->findByPk($vvalorclave);
			
			//$nombreclase='Inventario';
			//$nombrecampo='coddocu';
			//$vvalor='003';
			
			//echo $vvalore;
			
			
			 //$mimodelo=new Inventario;
			 echo  Fotos::buscavalor($campito,$vvalore,$ordencampo,$relaciones);
				//$modelito=$_POST['nombreclase'];
				//$$modelito="";
				//echo print_r($modelito);
				//$ni= $$modelito::buscavalor('hola');
               //echo $modelito;
			//$modelito=$_POST['modelitox'];
		// print_r($modelito);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
			
		
	}
	
	/*
	Procedimiento creado apra recibir los valores del CJUIDILAOG 
	*/
	public function actionRecibevalor()
	{
		
		$autoIdAll=array();
		if(  isset($_POST['checkselected'])   ) //If user had posted the form with records selected
				{
				$autoIdAll = $_POST['checkselected']; ///The records selecteds 
				};
				if(count($autoIdAll)>0)
										{
												echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');													                    
																		window.parent.$('#cru-frame3').attr('src','');
																		var caja=window.parent.$('#cru-dialog3').data('hilo');	
																		window.parent.$('#'+caja+'').attr('value','');																		
																		window.parent.$('#'+caja+'').attr('value','{$_POST['Buscador']['valortexto']}');
																		window.parent.$('#'+caja+'').focusout().blur();
																		");
														Yii::app()->end();
										} else{
												$model=Yii::app()->explorador->devuelvemodelo($_GET[$campito],$_GET[$relaciones]); //modelo para los campos	
												$model->unsetAttributes();  // clear any default values
												if(isset($_GET['Documentos']))
												$model->attributes=$_GET['Documentos'];
												$this->layout='' ;
												$this->render("vw_pruebitas1",array('model'=>$model));
												}
										
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

		if(isset($_POST['Inventario']))
		{
			$model->attributes=$_POST['Inventario'];
			  //echo "OJO CON ESTO ".$_POST['Inventario']['tienecarter'];
			if($model->save())
			 // echo "pso";
			 //echo $model->codep;
			  
			// echo $_POST['Inventario']['codestado'];
				$this->redirect(array('confirmar','id'=>$model->idinventario));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionUpdatetotal($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inventario']))
		{
			
			$model->attributes=$_POST['Inventario'];
			$model->tienecarter=$_POST['Inventario']['tienecarter'];
			 // echo $_POST['Inventario']['codep'];
			if($model->save())
			 // echo "pso";
			 //echo "OJO CON ESTO ".$_POST['Inventario']['tienecarter'];
			 // echo "OJO CON ESTO ".$model->codigoaf;
			 //Yii::app()->end();
			// echo $model->codep;
			 //echo $_POST['Inventario']['codestado'];
			// echo " este es el estado modelo ". $model->codestado. "   est e sle esto ".$_POST['Inventario']['codestado'];
				$this->redirect(array('confirmar','id'=>$model->idinventario));
				
		}

		$this->render('update_total',array(
			'model'=>$model,
		));
	}
	
	public function actionSubearchivo($id)
    {
        $model=new inventario;
		//ECHO "la magen ".$_POST['image'];
        if(isset($_POST['Inventario']))
        {		  
            $model->attributes=$_POST['Inventario'];
            $model->imagen=CUploadedFile::getInstance($model,'imagen');
		         $mensaje="";
				 $mensaje2="";
				if (!(strtoupper($model->imagen->getExtensionName())=='JPG' or strtoupper($model->imagen->getExtensionName()=='JPEG')))
					$mensaje="El archivo no es una imagen valida  ".$model->imagen->getExtensionName();
			    $tamanomaximo=300;
				if ($model->imagen->getSize() > 1024*$tamanomaximo)
					$mensaje2="El archivo  es muy pesado :".(ROUND($model->imagen->getSize()/1024,2))." suba imagenes menores a ".$tamanomaximo." KB ";
				
				if (trim($mensaje.$mensaje2==""))  
				{
				  
					$fot=new Fotos($model->codigosap,Yii::app()->params['rutafotosinventario'],'.JPG' ) ;		
					$fotonueva=$fot->siguiente_numero();
					$model->imagen->saveAs($fot->rutadearchivos.$fotonueva);
					$this->redirect(array('detalle','id'=>$id));
				}
				  
				else 
				{
				   $this->render('vw_error_foto',array('mensaje'=>$mensaje,'mensaje2'=>$mensaje2));
				   Yii::app()->end();
				  }
        }
		$model=$this->loadModel($id);
        $this->render('vw_subir_archivo', array('model'=>$model,'id'=>$id));
    }
	
	
	 
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionSube($id)
	{
		$model=$this->loadModel($id);

		$this->render('vw_subearchivo',array('model'=>$model));
	}
	
	
	
	public function enviacorreo($codigoplaquita,$modelito)
	
			{
			/********************************
				*	Temporalment lo almacenamos asi hasta que se definan los grupos en tablas 								
				**********************************/
				$listacorreos=array(
				'jramirez@exalmar.com.pe',
				//'ecastaneda@exalmar.com.pe',
				//'jtoledo@exalmar.com.pe',
				//'focana@exalmar.com.pe',
				//'mhuaman@exalmar.com.pe',				
				//'ovalenzuela@exalmar.com.pe'
				);
				/***********************************************************
				**************************************************************/
				array_push($listacorreos,Yii::app()->user->email);	
				$listadirecciones=implode (  "," ,  $listacorreos );					
				$titulo="CREACION DE AF";
				$contenido="Se ha creado el activo:";
				$contenido.="<br>";				
				//Los campos que se pintaran em la vista 
				$campos= array( 'descripcion',
							    'marca',
								'modelo',
								//'harribo',
								'serie',
								'codigoaf',
								'barcoactual.nomep'								
								);
								
				//El nombre de 	
				Yii::app()->crugemailer->mail_general($listadirecciones,"-".$titulo,$contenido,$modelito,$campos);	
			}
	
	
	
	
	
	public function actionExporta()
{
    // Load data with a CActiveDataProvider (note that we can easily apply conditions over the result set)
   // ini_set('memory_limit','164M');
	$model = new Inventario('search');
   //$this->toExcel($model->search() , array('creator' => 'Zen',  ),'Excel5');
    // Export it (note the way we define columns, the same as in CGridView, thanks to EExcelView)
   $this->toExcel($model->search(), array('descripcion','marca'),array('creator'=>'Zen'),'Excel5');
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

	
	public function actionVaa($idinventario)
	{
		//$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax']))
			$this->redirect('/motoristas/index.php?r=observaciones/create&idinventario='.$idinventario);
	}
	
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Inventario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inventario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inventario']))
			$model->attributes=$_GET['Inventario'];
			 //$cadenita=Yii::app()->request->baseUrl.DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."fotos".DIRECTORY_SEPARATOR.$model->codigosap."jpg";
			
			// if (file_exists ($cadenita)) {
 							                      //$camarita="<img src='/exalmar/nocamarita.jpg' width=15 height=15  border=0>";
												  
											//} else {
											  // $camarita="";
											  
											//}
			
			
		   
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function codigobarco() {
				if (isset(Yii::app()->user->um)) { //si tiene cruge 
				  return Yii::app()->user->getField('codep'); 
					}
						 else { //si tienen el modeulo user 
							return Yii::app()->getModule('user')->user()->profile->codep;
						} 
	 }
	 
	 public function verificaidentidad($codigobarco) {
	    if ($this->codigobarco()==$codigobarco) {
			return true;
		}else{
			return false;
		}
	 
	 }
	
	
	
	
	/**
	 * Manages all models.
	 */
	public function actionMisactivos($codigobarco)
	{
	   if ($this->verificaidentidad($codigobarco)) {
		$model= new inventario;	
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inventario']))
			$model->attributes=$_GET['Inventario'];
			 //$cadenita=Yii::app()->request->baseUrl.DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."fotos".DIRECTORY_SEPARATOR.$model->codigosap."jpg";
		//$model->codep=$epasignada;
		$this->render('admin_filtrado',array(
			'model'=>$model,'codep'=>$codigobarco,
			//'model'=>$model,
		));
		}else{
		throw new CHttpException(404,'Ha intentado ver los activos de otro barco');
		
		}
		
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function actionDetalle($id)
	{
	   $model=$this->loadModel($id);
		//$model=new Inventario('search');
		//$model->unsetAttributes();  // clear any default values
		if(isset($id)) {
		$fot=new Fotos($model->codigosap,Yii::app()->params['rutafotosinventario'],'.JPG' ) ;
		$fot1=new Fotos($model->codigosap,Yii::app()->params['rutafotosinventario'],'.JPG' ) ;
		$misfotos=$fot->devuelveFotos();
		$misfotosgaleria=$fot1->devuelveFotosGaleria(40);
		//print_r($misfotosgaleria);
		/***********************************************************************************
		*
		*	ESTE FRAGEMENTO DE CODIGO SIRVE PARA SACCAR LOS DATOS QUE NCESITA ESTA ACCION 
		*	PARA RENDERIZAR LA VISTA :    DATOS DEL LOG , DE LAS OBSERVACIONES ETC 
		*
		************************************************************************************
		************************************************************************************
		
	  SACANDO EL LOG */
	    $modelolog= new Loginventario;
		$criteriazo=new CDbCriteria;		
		$criteriazo->addCondition('hidinventario = :phidinventario and codestado <> :pcodestado');								
		$criteriazo->params = array(':phidinventario' => $model->idinventario,':pcodestado' => '01');	
		$criteriazo->order ='fecha DESC ';
		$proveedorlog = new CActiveDataProvider($modelolog, array('criteria'=>$criteriazo,));									
				
	
		$modeloobs= new VwObservaciones;
		$criteri=new CDbCriteria;		
		$criteri->addCondition('hidinventario = :phidinventario');								
		$criteri->params = array(':phidinventario' => $model->idinventario);		
		$proveedorobs = new CActiveDataProvider($modeloobs, array('criteria'=>$criteri,));	
		
		
		//$modeloobs= new VwObservaciones;
		//$criteri=new CDbCriteria;		
		//$criteri->addCondition('hidinventario = :phidinventario');								
		//$criteri->params = array(':phidinventario' => $model->idinventario);		
		//$proveedorobs = new CActiveDataProvider($modeloobs, array('criteria'=>$criteri,));	
		

		
		$this->render('view',array(
							'model'=>$model,
							'fotos'=>$misfotos,
							'misfotosgaleria'=>$misfotosgaleria,
							'ruta'=>Yii::app()->params['rutafotosinventario_'],
							'fot'=>$fot,
							 'modelolog'=>$modelolog,
							  'modeloobs'=>$modeloobs,
							  'proveedorlog'=>$proveedorlog,
							  'proveedorobs'=>$proveedorobs,
								));
		
		}
			
	}

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Inventario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'El enlace o direccion solicitado no existe');
		return $model;
	}

	
	/**
	 * Borra el archivo de imagen en el disco
	 * 
	 * 
	 */
	public function actionborraFoto($nombreimagen)
	{
		//$nombrearchivo='IMG_0059.JPG';
		//$ruta='d:\web\motoristas\assets\FOTOS\G00001.JPG';
		//$ruta='d:/web/motoristas/assets/FOTOS/G00001.JPG';
		//$rutadir=Yii::app()->params['rutafotosinventario'];
		//$ruta=Yii::app()->params['rutafotosinventario'].$nombrearchivo;
		//$miarchivo=Yii::app()->CFile->getInstance(Yii::app()->params['rutafotosinventario'].trim($nombrearchivo));
		//$miarchivo=Yii::app()->CFile->getInstance("");\\192.168.26.100\web\motoristas\assets\FOTOS
	  $myfile = Yii::app()->file->set(Yii::app()->params['rutafotosinventario'].$nombreimagen, true);
	//	$miarchivo->set(Yii::app()->params['rutafotosinventario'].trim($nombrearchivo));
		//$miarchivo->set($miarchivo->getRealPath(Yii::app()->params['rutafotosinventario'].trim($nombrearchivo)));
		//echo $miarchivo->getRealPath(Yii::app()->params['rutafotosinventario'].trim($nombrearchivo));
		return $myfile->delete();
		//echo "El tamno es ".$miarchivo->size;
		
								
								//if($miarchivo->delete()) {echo Yii::app()->params['rutafotosinventario'].trim($nombrearchivo).$miarchivo->realPath."se borrro";}else{ echo Yii::app()->params['rutafotosinventario'].trim($nombrearchivo).$miarchivo->realPath."nos peudo borra";}
		
		
		
	}

	public function actiongestionafotos()
	{
		$this->layout = '//layouts/iframe';
		$fotos=$_GET['fotos'];
		$this->render("vw_galeria",array("fotos"=>$fotos));
		//$myfile = Yii::app()->file->set(Yii::app()->params['rutafotosinventario'].$nombreimagen, true);
		//return $myfile->delete();
	}

	public function actionBorrafotos($modelid, $id, $action){
			
		if($action == 'select') {  
		   // $this->render("vw_cli",array("id"=>$id));
		  // $command = Yii::app()->db->createCommand("insert into fifo (uno) values ('".trim($id)."')"); 
			//$command->execute();
			Yii::app()->end();
			//$this->render("vw_cli",array("id"=>$id));
			} 
		if($action == 'delete') {
				unlink(trim(Yii::app()->params['rutafotosinventario'].$id));
			//$command = Yii::app()->db->createCommand("insert into fifo (uno) values ('".$id."')"); 
			//$command->execute();
			//$cadenita="\";
			//$imagen=Yii::app()->file->set(trim(Yii::app()->params['rutafotosinventario'].$id));
			//$imagen=Yii::app()->file->set('');
			//if($imagen->delete(true)){
									//$command = Yii::app()->db->createCommand("insert into fifo (uno) values ('".trim(Yii::app()->params["rutafotosinventario"].$id)."')"); 
									//$command->execute();
									//echo Yii::app()->params['rutafotosinventario'].$id;
							//} else {
									//throw new CHttpException(500,'No se pudo borrar el archivo');	;
								//}

			Yii::app()->end();
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inventario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
