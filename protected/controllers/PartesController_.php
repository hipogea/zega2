<?php

class PartesController extends Controller
{
		public $layout='//layouts/column2';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','muestracarteres'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','confirmamateriales','update','mismateriales','selecciona'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','jtoledo','@'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionMismateriales($codigobarco)
	{
	   $this->layout="";
						$modeloguia= new VwGuia;					
						$criteriazo=new CDbCriteria;	
		$criteriazo->compare('distpartida',$modeloguia->distpartida,true);
		$criteriazo->compare('distllegada',$modeloguia->distllegada,true);
		$criteriazo->compare('c_numgui',$modeloguia->c_numgui,true);
		$criteriazo->compare('c_descri',$modeloguia->c_descri,true);
		$criteriazo->compare('c_serie',$modeloguia->c_serie,true);
		$criteriazo->compare('c_itguia',$modeloguia->c_itguia,true);
		$criteriazo->compare('n_cangui',$modeloguia->n_cangui);
		$criteriazo->compare('c_codgui',$modeloguia->c_codgui,true);
		$criteriazo->compare('c_descri',$modeloguia->c_descri,true);
		$criteriazo->compare('c_codactivo',$modeloguia->c_codactivo,true);
		$criteriazo->compare('nomep',$modeloguia->nomep,true);
		$criteriazo->compare('c_af',$modeloguia->c_af,true);
		$criteriazo->compare('c_codsap',$modeloguia->c_codsap,true);
									$criteriazo->addCondition('c_codep = :codigobarco');
									$criteriazo->addCondition('codocu = :codocu');
									$criteriazo->addCondition('d_fectra  > :d_fectra');
									//$criteriazo->addCondition('c_rsguia =:c_rsguia');
									$criteriazo->addCondition('c_estgui = :c_estgui'); //primero que las guias deben de star confirmmadas '02' 
									$criteriazo->addCondition('c_estado = :c_estado'); //segundo que el detalle debe de ser '02' aceptadas no hay otra opcion 
									//$fechita=date()-20;
									$fecha=date("Y-m-d");
									$fechita=date("Y-m-d", strtotime("$fecha -120 day"));  

							$criteriazo->params = array(':codigobarco' => $codigobarco,':codocu'=>'001', ':d_fectra'=>" ".$fechita."",':c_estado'=>'02',':c_estgui'=>'02');					
							
											$proveedor = new CActiveDataProvider($modeloguia, array(
											'criteria'=>$criteriazo,
									));	
		$this->render('vw_materiales',array(
			'model'=>$modeloguia,'proveedor'=>$proveedor,
		));
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Partes;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
		 
			if (!isset($_GET['codep'])) {
		   $codep=Yii::app()->getModule('user')->user()->profile->codep;
		} else {
		  $codep=$_GET['codep'];
		  
		  
		  
		if(isset($_POST['Partes']))
		{
		  
			$model->attributes=$_POST['Partes'];
			//if (empty($model->codep))
					//$model->codep=Yii::app()->getModule('user')->user()->profile->codep;
					$model->codep=$codep;
			 $model->refrescacampos();
			//echo " ESTE ES EL numeroauxilair  ".$model->numeroauxiliar."<br>";
			//$idauxiliar=$model->id;
			if($model->save())
			    {
				
				
						/***************************************
						*	Este fragmento de codigo sirve para
						*	sacar un ACTIVE RECORD  de la tabla 
						*	Aceites, y actualizarla segun los da
						*	de la tabla partes 
						****************************************
						****************************************/
						$modeloequipitos=New Inventario;
						$proveedorequipos=$modeloequipitos->search3($model->codep);
						$matriz=$proveedorequipos->getdata();
						  $i=0;
						  foreach ($matriz as $clave => $valor) {
						       if (!is_null($modeloaceites=Carteres::model()->findByAttributes(array('idequipo'=> $matriz[$i]['idinventario']))))
							        {
										$modeloaceites->setAttribute('horometro',$model->horometrodes);
										$modeloaceites->save();
									}
							     $i=$i+1;
											}
							//	$this->redirect(array('view','id'=>$model->id));				
					
				
				
				
				
				
				
				
				
				
				/////----------------actualizamos los hid de las noveaddes
				         ///pra esto primero obtenemos el nuevo id genrado ede la base de datos
						 ///para luego actualizar en la tabla de novedaddes el hid CON ESTE ULTIMO 
						 
						 $model->refresh();
						 $cadenasql="UPDATE novedades  SET hidparte =".$model->id." where hidparte= ".$model->numeroauxiliar." ";
						 Yii::app()->db->createCommand($cadenasql)->execute();
						 //echo " este es elutlimo id ---------------------->".$model->id."<br>";
						 //echo "este es el auxliar ---------------->".$model->numeroauxiliar."<br>";
						$this->redirect(array('view','id'=>$model->id));	
				///--------------
				}
				//$this->redirect(array('view','id'=>$model->id));
				
				
		}

		//Sacamos otro modelo de datos 
		//$criteria=new CDbCriteria; 
		//$criteria->condition='isActive = 1';
		//$model1=new Inventario;
		//$criteria=new CDbCriteria; 
		//$criteria->compare('descripcion',$model1->descripcion,true);
		//$criteria->compare('name',$this->name,true);
		//$criteria->compare('email',$this->email,true);
              ///ENERSMOS UN NUMERO LEATRIO PARA PASARLE COMO PARAMETRO A LOS NUEVAS NOVEDADES 
		//alimentamos el generador de aleatorios
					
               // if ( !(isset($model->id)) or ($model->id==0))			
				// $model->id= mt_rand(10000000,200000000);
			if (!empty($_GET['aleatorio']))	
			$model->numeroauxiliar=$_GET['aleatorio'];
			
		//$proveedor= new CActiveDataProvider('Inventario', array('criteria'=>$criteria,));
						$modelonovedades= new novedades;					
						$criteriazo=new CDbCriteria;
		//-----------------fin del codigo nuevo		----- para entrar los datos del parte de motorista 				
									$criteriazo->addCondition('hidparte = :idparte');
								//$criteriazo->addCondition('1 = 1');
							$criteriazo->params = array(':idparte' => $model->numeroauxiliar);
							
							
							$criteriazo->compare('codsistema',$modelonovedades->codsistema,true);		
		//$criteria->compare('codep',$this->codep,true);
							$criteriazo->together  =  true;
						$criteriazo->with = array('sistemas');
							if($modelonovedades->sistemas_sistema){
									$criteriazo->compare('sistemas.sistema',$modelonovedades->sistemas_sistema,true);
							}
											$proveedornovedades = new CActiveDataProvider($modelonovedades, array(
											'criteria'=>$criteriazo,
									));	
		
		
		
		 
		}
		$modelito=New Vwaceites;
		$model->codep=$codep;
		$ptipo=$modelito->search2($codep);
		$this->render('create',array(
			'model'=>$model,'modelonovedades'=>$modelonovedades,'proveedornovedades'=>$proveedornovedades,'ptipo'=>$ptipo,'codep'=>$codep,
		));
		//));
		
		
		
		//$this->render('create',array(
		//	'model'=>$model,'modelo1'=>$model1)
		//));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $model->refrescacampos();
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Partes']))
		{
			$model->attributes=$_POST['Partes'];
			//if (empty($model->codep))
					//$model->codep=Yii::app()->getModule('user')->user()->profile->codep;
			if($model->save()) {
						/***************************************
						*	Este fragmento de codigo sirve para
						*	sacar un ACTIVE RECORD  de la tabla 
						*	Aceites, y actualizarla segun los da
						*	de la tabla partes 
						****************************************
						****************************************/
						$modeloequipitos=New Inventario;
						$proveedorequipos=$modeloequipitos->search3($model->codep);
						$matriz=$proveedorequipos->getdata();
						  $i=0;
						  foreach ($matriz as $clave => $valor) {
						       if (!is_null($modeloaceites=Carteres::model()->findByAttributes(array('idequipo'=> $matriz[$i]['idinventario']))))
							        {
										/*  siempre y cuando el horometro del parte sea mayor a cualquier lectura */
										$minaf=VwUltimashoras::model()->search($matriz[$i]['idinventario']) ;//sacando las lesturas mas altas 										
										$mina=$minaf->getdata();
										if (count($mina)>0 ) {
												if ($mina[0]['horometro'] < $model->horometrodes) {
														$modeloaceites->setAttribute('horometro',$model->horometrodes);
														$modeloaceites->setAttribute('fulectura',$model->fechaarribo);
														$modeloaceites->save();
														}
														}
									}
							     $i=$i+1;
											}
								
								$this->redirect(array('view','id'=>$model->id));				
							}
		}
		
		//-----------------codigo nuevo a a gregar para opbenter el proveedor de las nvedades		
						$modelonovedades= new novedades;					
						$criteriazo=new CDbCriteria;
						$criteriazo->addCondition('hidparte = :idparte');
						$criteriazo->params = array(':idparte' => $model->id);								
						$proveedornovedades= new  CActiveDataProvider($modelonovedades, array(
									'criteria'=>$criteriazo,
									));	
		//-----------------fin del codigo nuevo		----- para entrar los datos del parte de motorista 				
						//	ECHO "EL ID ES ----------------------->".$model->id."<br>";		
							//ECHO "EL ITEM TOTAL ES ".$proveedornovedades->totalItemCount;	
						//	ECHO "la condicion ES ".$proveedornovedades->criteria->condition;	
							$model->numeroauxiliar=$model->id;
							/************************************
							*  Cargando el modelo de los CARTERES
							*************************************/
							$modelito=New Vwaceites;
							$ptipo=$modelito->search2($model->codep);
									  
		  
		  

		  
		$this->render('update',array(
			'model'=>$model,'modelonovedades'=>$modelonovedades,'proveedornovedades'=>$proveedornovedades,'ptipo'=>$ptipo,'codep'=>$model->codep,
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

	public function actionSelecciona()
	{
		
		if(isset($_POST['selecciona'])) {
		   //if ($_GET['selecciona-form']['selep'] <> '' )
				$this->redirect(array('/partes/index','codigobarco'=>$_POST['selecciona']['selep'] ));	
		}else {
		 // echo "salio";
		 $this->render('selecciona');
		
		}
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	   $codigobarco=Yii::app()->getModule('user')->user()->profile->codep;
	    if ( $codigobarco == '000' ) 
			{
						if(!isset($_POST['Selecciona']))
							{
											$modelazo=new Selecciona;
											$this->render('selecciona',array('modelazo'=>$modelazo));											
							}else {  ///ENCASO DE QUE SEA 										
		                                        $codigobarco=$_POST['Selecciona']['codigodelbarco'];
												$this->pinta($codigobarco);	
							}
		
		    } else { ///se trata de un motorista 
			  
			$this->pinta($codigobarco);
			}
	}

	
	public function pinta($codigobarco) {
	
													//$codigobarco=$_POST['Selecciona']['codigodelbarco'];
														$modelopartes=new Partes;
														$modeloaceites=new Vwaceites;
														$criteriazo=new CDbCriteria;
															$dataProvider=new CActiveDataProvider('Partes');
														$criteriazo->addCondition('codep = :codigobarco');
														$criteriazo->params = array(':codigobarco' => $codigobarco );	
														$criteriazo->order=" numero asc";
														$criterial=new CDbCriteria;
														$criterial->addCondition("codep = '".$codigobarco."'");
														$criterial->addCondition("tienecarter = '1'");
														$proveedor = new CActiveDataProvider($modelopartes, array('criteria'=>$criteriazo));
														$proveedoraceites = new CActiveDataProvider($modeloaceites, array('criteria'=>$criterial));
		
		//$proveedoraceites=Aceites::search2(Yii::app()->getModule('user')->user()->profile->codep );
														$matriz=$proveedor->getdata();
														$i=0;
															$presionesmotor=array();
															$presionescaja=array();
																	foreach ($matriz as $clave => $valor) {
																			$presionesmotor[$i]=$matriz[$i]['m_presionaceite']	;
																			$presionescaja[$i]=$matriz[$i]['caja_paceite']	;
																				$i=$i+1;
																					}
																		$this->render('index',array('presionesmotor'=>$presionesmotor,'presionescaja'=>$presionescaja ,'proveedoraceites'=>$proveedoraceites,'codigobarco'=>$codigobarco));
		
		
		
		
	
	
	
	
	}
	
	
	
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Partes('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Partes']))
			$model->attributes=$_GET['Partes'];
		//$model->refrescacampos(); //refresca los camos calculados 
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	
	
	
	
	
	
	public function actionConfirmamateriales($id)
	{
		//$model=$this->loadModel($id);
		//$model->advertencia="Coloque la criticidad de esta novedad con mucho cuidado, en el caso de que sea grave un correo sera enviado a las personas involucradas";


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
   //  $model=  VwGuia::model()->findAll("n_detgui=".$id);
	 //$id =101;
	     $id =$_GET['id'];
		//$criteriaj = new CDbCriteria();
		//$criteriaj->addCondition("n_detgui =".$id);
		//$model=
		$model = VwGuia::model()->findByAttributes(array('n_detgui'=> $id));
          if($model===null)
			throw new CHttpException(404,'No se pudo encontrar el registro solicitado');
		
		if(isset($_POST['VwGuia']))
		{
			  $model->attributes=$_POST['VwGuia'];
			
			//if($model->save()) {
			           // $model->refresh();
			           // if(($model->criticidad =='A') OR ($model->criticidad =='B')) 
			            // $this->enviacorreo(substr($model->descridetalle,0,35),$model->descridetalle,$model->idnovedad);
						 if ($model->acepta=="SI") {
						   //ACTUALIZAR EL ESTADO DEL DETALLE DE LA GUIA 
						    /*cargadms unmodelito de de talle dela guia */
							$modelodetalle=Detgui::model()->findByPk($model->n_detgui);
							if($modelodetalle===null)
								throw new CHttpException(404,'No se pudo encontrar el registro solicitado');
							
								//actualizando el modelo
								$modelodetalle->setAttribute('c_estado','07'); //colocamos aelestado como ENTREGHADO 
								$modelodetalle->save();
								
							  if (!empty($_GET['asDialog']))
												{
													//Close the dialog, reset the iframe and update the grid
													
													
													echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
													                    window.parent.$('#cru-frame').attr('src','');
																		window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
																		");
														Yii::app()->end();
												}
						} else {
						  //si contesto con  NO 
						   echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');
													                    window.parent.$('#cru-frame').attr('src','');																		
																		");
														Yii::app()->end();
						  
						}
						
				
		}
		
		
			if (!empty($_GET['asDialog']))
					$this->layout = '//layouts/iframe';
		
		
				$this->render('vw_confirmamateriales',array(
					'model'=>$model,'id'=>$id,
		));
	}

	
	
	
	public function actionMuestracarteres()
	{
		
		$this->layout="";
		//$modelito=New Vwaceites;
		$proveedorcarteres=Vwaceites::model()->search();
		 
		
		
		
		$this->render('vw_carteres_total',array(
			'proveedorcarteres'=>$proveedorcarteres,
		));
		
		
		
	}
	
	
	
	
	
	
	
	
	
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Partes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'El enlace o direccion solicitado no existe');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='partes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
