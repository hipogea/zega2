<?php


class CajachicaController extends ControladorBase


{
const ESTADO_CREADO='10';
const ESTADO_PREVIO='99';
const ESTADO_AUTORIZADO='20';
const ESTADO_ANULADO='30';
const ESTADO_LIQUIDADO='40';
const TIPO_DE_FLUJO_A_RENDIR='102';
const TIPO_DE_FLUJO_DEV_FONDO='103';
const TIPO_DE_FLUJO_FONDO='100';
const ESTADO_DETALLE_CAJA_CREADO='10';
    const ESTADO_DETALLE_CAJA_ANULADO='30';
    const ESTADO_DETALLE_CAJA_CERRADO='20';
     const ESTADO_DETALLE_CAJA_CONFIRMADO='40';
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
				'actions'=>array('ajaxrefrescawidget',   'updatececos',      'salir','admin','anularcaja','liquidadeuda',   'ajaxRevierteCaja',    'creadevolucionfondo',   'ajaxreviertedetalle', 'ajaxconfirmadetalle',   'ajaxanuladetalle',       'ajaxabredetalle',   'ajaxcierradetalle',   'cierracaja','cargaimputacion','admin','view','create','borraitems','aprobaritem','update','creadetalle','actualizadetalle'),
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
																		window.parent.$.fn.yiiGridView.update('detallecaja-grid');
																		");
					Yii::app()->end();
				}
		}			// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
		$this->render('_formeditar',array(
			'model'=>$model, 'idcabeza'=>$model->hidcaja
		));



	}

	public function actioncierracaja()	
	{
		$id=(integer) MiFactoria::cleanInput($_GET['id']);
            $model=$this->loadModel($id);
            //var_dump($model->valornominal);
           // var_dump($model->valornominal*3);
		     if(!$model->puedecerrarse() )		{
		  		MiFactoria::Mensaje('error', "Esta caja no pude cerrarse aun falta completar gastos reales o falta rendir cargos a cuentas ".$model->monto_rendido);
		  		} else {
                                    IF($model->hijos_cargo_por_cerrar ==0 ){
                                             $model->setScenario('cambiaestado');
                                            $model->codestado='20';
                                                if($model->save()){
                                                                    
                                                    
                                                   MiFactoria::Mensaje('success', "Se cerró la caja menor ");
		  		                              }else{
                                                                    MiFactoria::Mensaje('error',yii::app()->mensajes->getErroresItem($model->geterrores()));
		  		                               }
                                    }else{
                                        MiFactoria::Mensaje('error',"Esta caja no puede cerrarse proque existen cargos por rendir que no han sido liquidados ") ;
                                    }
		  		 }
             $this->redirect(array('update','id'=>$model->id));                  
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
                              //var_dump($modelo->tieneHijospendientes());die();
				if ( ! $modelo->hidcargo >0 ) {
                                     //var_dump($modelo->tieneHijospendientes());die();
                                    if(!$modelo->tieneHijospendientes()){
                                        //var_dump($modelo->tieneHijospendientes());die();
                                        //verificar puede tratarse de un carg a rendir sin hjos pendientes pero recien abierto
                                             IF($modelo->tipoflujo==self::TIPO_DE_FLUJO_A_RENDIR and !$modelo->tieneHijos()){
                                                 echo "Este registro no se puede cerrar porque aun no tiene rendiciones , lo que puede hacer es anularlo o borrarlo";
                                             }else{
                                                 $modelo->setScenario ( 'cambiaestado' );
                                                $modelo->codestado = self::ESTADO_AUTORIZADO;
                                                    if($modelo->save ()){
                                            echo "Se cerro el registro ";
                                                    }
                                             } 
                                    }else{
                                        //verificar puede tratarse de un carg a rendir sin hjos pendientes pero recien abierto
                                       echo "Este registro tiene registros pendientes no le puede cerrar";
                                    }
					
				}else{
                                    echo "Este reistro es un cargo a rendir y debe de ser cerrado por la persona que se le dió el dinero"; 
                                }

			}else{
                            echo " Esta caja ya esta cerrada o no tiene el estado adecuado o El dueño de esta caja es otro usuario, no puede cerrar los detalles";
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
			$model->{$this->campoestado} = self::ESTADO_CREADO;
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
						window.parent.$.fn.yiiGridView.update('detallecaja-grid');
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
                            $model->refresh();
                            $model->heredagastos();
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
       // var_dump(unserialize(base64_decode($_POST['formula'])));die();
       $formulario= unserialize(base64_decode($_POST['formula']));
    
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
        
   public function actionajaxabredetalle(){
       if(yii::app()->request->isAjaxRequest){  
           if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
               
               if(($registro->hidcargo >0) and $registro->iduser==yii::app()->user->id and $registro->codestado==self::ESTADO_DETALLE_CAJA_CERRADO){
                     if($registro->padre->codestado==self::ESTADO_DETALLE_CAJA_CREADO) {
                         
                          $registro->setScenario('estado');
                        $registro->codestado=self::ESTADO_DETALLE_CAJA_CREADO;
                             if($registro->save()){
                                    echo "Se ha abierto el registro ";
                                }else{
                                    echo yii::app()->mensajes->getErroresIrem($registro->geterrors());
                            }
                     } else{
                        echo "El estado del monto entregado esta cerrado y ya no puede cambiar el estado de susu comprobantes"; 
                     }
                  
                   
               }else{
                   echo "Esta liquidacion no es de usted O NO TIENE EL STATUS ADECUADO PARA EFECTUAR ESTE PROCESO";
               }
               
               
           }
   }    
     
    public function actionajaxanuladetalle(){
       if(yii::app()->request->isAjaxRequest){  
           if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
             if($registro->hidcargo >0){
                          $registro->setScenario('anulacion');
                        $registro->codestado=self::ESTADO_DETALLE_CAJA_ANULADO;
                        $registro->haber=0;
                             if($registro->save()){
                                    echo "Se ha anulado el registro ";
                                }else{
                                    echo yii::app()->mensajes->getErroresIrem($registro->geterrors());
                            }
             }else{
                 echo "Este registro no puede ser anulado porque no es hijo de otro registro";
             }
           }
   }   
   
     public function actionajaxcierradetalle(){
       if(yii::app()->request->isAjaxRequest){  
           if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
             if(($registro->hidcargo >0) and $registro->iduser==yii::app()->user->id and $registro->codestado==self::ESTADO_DETALLE_CAJA_CREADO){
               if($registro->padre->codestado==self::ESTADO_DETALLE_CAJA_CREADO) {
                         
                          $registro->setScenario('estado');
                        $registro->codestado=self::ESTADO_DETALLE_CAJA_CERRADO;
                             if($registro->save()){
                                    echo "Se ha cerrado el registro ";
                                }else{
                                    echo yii::app()->mensajes->getErroresIrem($registro->geterrors());
                            }
                     } else{
                        echo "El estado del monto entregado esta cerrado y ya no puede cambiar el estado de susu comprobantes"; 
                     }
                  
             }else{
                 echo "ESTA LIQUIDACION NO ES DE USTED, O NO TOEEN EL ESTADO ADECUDO APRA EE TUAR ESTE PROCESO";
             }
           }
   }  
   
    public function actionajaxconfirmadetalle(){
       if(yii::app()->request->isAjaxRequest){  
           if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
             if($registro->codestado==self::ESTADO_DETALLE_CAJA_CERRADO){
                          $registro->setScenario('estado');
                        $registro->codestado=self::ESTADO_DETALLE_CAJA_CONFIRMADO;
                             if($registro->save()){
                                    echo "Se ha confirmado el registro ";
                                }else{
                                    echo yii::app()->mensajes->getErroresIrem($registro->geterrors());
                            }
             }else{
                 echo "Este registro no puede ser confrimado  porque no esta cerrado";
             }
           }
   }   
   
   public function actionajaxreviertedetalle(){ ///regresa del estado anulado al estado cerrado
       if(yii::app()->request->isAjaxRequest){  
           if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
             if($registro->codestado==self::ESTADO_DETALLE_CAJA_ANULADO ){
                 $registropadre= Dcajachica::model()->findByPk($registor->hidcargo);
                 if(in_array($registropadre->codestado,array(self::ESTADO_DETALLE_CAJA_CERRADO,self::ESTADO_DETALLE_CAJA_CONFIRMADO))){
                 if(!($registro->haber=0)){
                     $registro->setScenario('estado');
                        $registro->codestado=self::ESTADO_DETALLE_CAJA_CERRADO;
                             if($registro->save()){
                                    echo "Se ha RESTABLECIDO el registro ";
                                }else{
                                    echo yii::app()->mensajes->getErroresIrem($registro->geterrors());
                            } 
                 }else{
                     echo "Este registro anulado ya se liquido, con efectivo ya no puede liquidar la deuda";
                 }
                 }else{
                     echo "El fondo cargo a rendir ya esta cerrado no puede revertir la anulacion";
                 }         
             }else{
                 echo "Este registro no puede ser RESTABLECIDO PORQUE  no esta anulado";
             }
           }
   }  
   
  public function actionCreaDevolucionFondo(){
       if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
               
            IF(!($registro->tipoflujo==self::TIPO_DE_FLUJO_A_RENDIR))
                 throw new CHttpException(500,'Este registro no puede recibir efectivo, no es un cargo a rendir '.$id);  
          IF(!($registro->codestado==self::ESTADO_DETALLE_CAJA_CERRADO))
                 throw new CHttpException(500,'Este registro no se ha cerrado , antes de liquidar con efectivo por favor cierrelo '.$id);  
         
            
            $model=New Dcajachica();
          $montosugerido=$registro->monto-$registro->rendido;
          $model->setScenario('devuelve');
          $this->layout="//layouts/iframe";
       if ( isset( $_POST['Dcajachica'] ) ) {
           $model->attributes=$_POST['Dcajachica'];
           //var_dump($model->getScenario());
        
				//var_dump ($_POST['Dcajachica']);die();
				 $model->setScenario('insert');
                                    $model->setAttributes(array(
                                            'hidcaja'=>$registro->hidcaja,
                                            'hidcargo'=>$registro->id,
                                            'monto' =>$_POST['Dcajachica']['monto'],
                                            'fecha' =>$_POST['Dcajachica']['fecha'],
                                             'glosa'=>'Dev efectivo :'. substr($registro->glosa,0,20),
                                            'referencia'=>$registro->referencia,
                                              'debe'=>$_POST['Dcajachica']['monto'],
                                                'haber'=>$_POST['Dcajachica']['monto'],
                                               'monedahaber'=>yii::app()->settings->get('general','general_monedadef'),
                                               'codtra'=>$registro->codtra,
                                              'tipoflujo'=>self::TIPO_DE_FLUJO_DEV_FONDO,
                                              'codestado'=>self::ESTADO_DETALLE_CAJA_CONFIRMADO,
                                                'serie'=>$registro->serie,
                                              'tipodocid'=>$registro->tipodocid,
                                             'codocu'=>$registro->codocu,
                                            'numdocid'=>$registro->numdocid,
                                               'razon'=>'PULPO',
                                            ));
                                    $model->save();
                                 
                                     // var_dump($model->attributes); var_dump($modelo2->attributes);
                                   
                                       if ( ! empty( $_GET['asDialog'] ) ) {
						//Close the dialog, reset the iframe and update the grid
						echo CHtml::script ( "window.parent.$('#cru-dialog3').dialog('close');
								" );
						
					
				Yii::app()->end();	
			} 
          
                         }
        $this->render("_form_devolucion",array("model"=>$model,"montosugerido"=>$montosugerido));   
  
        
        
  }
   
   public function actionajaxRevierteCaja(){ ///regresa del estado anulado al estado cerrado
       if(yii::app()->request->isAjaxRequest){  
           if(isset($_GET['id'])){ 
               $id= (integer)MiFactoria::cleanInput($_GET['id']);
               $registro= Dcajachica::model()->findByPk($id); 
               if(is_null($registro))  
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
               } 
             IF($registro->cabecera->codestado==self::ESTADO_CREADO){//si la cabecera esta cerrasa
                 
             if($registro->codestado==self::ESTADO_DETALLE_CAJA_CERRADO ){ //si el detalle esta cerrado
                 
                  if($registro->tipoflujo==self::TIPO_DE_FLUJO_A_RENDIR and
                          $registro->devoluciones> 0 ){
                        echo 'Este cargo a rendir tiene liquidACIONES Y NO PUEDE REVERTIR SUS ESTADO ';  
               
                  }ELSE{
                      if(count($registro->imputaciones)==0){
                      $registro->setScenario('estado');
                        $registro->codestado=self::ESTADO_DETALLE_CAJA_CREADO;
                             if($registro->save()){
                                    echo "Se ha RESTABLECIDO el registro ";
                                }else{
                                    echo yii::app()->mensajes->getErroresItem($registro->geterrors());
                            }
                      }else{
                           echo "Este registro NO SE PUEDE REVERTIR PORQUE ya tiene imputaciones  ";
                      }
                  }
                  
                  
                          
             }else{
                 echo "Este registro no puede ser RESTABLECIDO PORQUE  no esta cerrado";
             }
             
             }else{
                 echo "La caja cabecera no tiene el status adecuado";
             }
           }
   }  
   
    public function actionliquidadeuda(){ ///regresa del estado anulado al estado cerrado
       
        
        IF(ISSET($_GET['id'])){
             $cabeza=Cajachica::model()->findByPk((integer) MiFactoria::cleanInput($_GET['id']));
      
                 IF(IS_NULL($cabeza))
            throw new CHttpException(500,'NO se encontro el registro CABECERA con el id '.$id);  
      
        }
      
        $model= new Dcajachica();
       $this->layout="//layouts/iframe";
       if(isset($_POST['cajita'])){
           $idpadre=$_POST['Dcajachica']['hidcaja']; //NO ES EL HIDCAJA REAL ES UN VALOR  REEEMPLAZADO POR OTRO AVLOR PEROS IRVE PARA PASAR EL POST DEL FORMUALRIO 
           $autoIdAll = $_POST['cajita'];//var_dump($_POST['cajita']);yii::app()->end();
		 foreach($autoIdAll as $autoId)
			{
				$this->liquidardeuda($autoId,$idpadre);

			}
                        
                        echo CHtml::script ( "window.parent.$('#cru-dialog3').dialog('close');
                                                window.parent.$('#cru-frame3').attr('src','');
						window.parent.$.fn.yiiGridView.update('detallecaja-grid');
																		" );
						Yii::app ()->end ();
       }
      //var_dump(count(VwTrabajadores::model()->findAll()));die();
         IF(ISSET($_GET['id'])){
         $identidadcaja=$_GET['id'];
         }
       $this->render('deudas_trabajador',array('identidadcaja'=>$identidadcaja,'model'=>$model));
   }  
   
   private function liquidardeuda($id,$idcabeza){
       $registro= Dcajachica::model()->findByPk((integer) MiFactoria::cleanInput($id));
       $padre= Cajachica::model()->findByPk((integer) MiFactoria::cleanInput($idcabeza));
        if(is_null($registro))
           throw new CHttpException(500,'NO se encontro el registro con el id '.$id);  
      
       if(is_null($padre))
           throw new CHttpException(500,'NO se encontro el registro  padre con el id '.$id);  
      
       ///primero dbemos llenar el haber con el valor del debe para anular la deuda 
       $registro->setScenario('montos');
       $registro->haber=$registro->debe; $registro->save();
       //ahora si la configuracion lo permite , debemos de lllenar esta compensacion 
       //como un fondo para la caja actual , puestoq ue se le ha cobrado o descontado al trabajador
       ///este cbor puede regresar como efectivo para la caja actual
       //esto depende de la configuracion 
       if(yii::app()->settings->get('conta','conta_cajachicadevuelvefondo')=='1'){
           //insertar un registgro de fondo en la caja chica actual
          // echo "salio "; die();
            $modelo2=New Dcajachica();
                                    $modelo2->setScenario('insert');
                                      $modelo2->setAttributes(array(
                                            'hidcaja'=>$padre->id,
                                            'hidcargo'=>null,
                                            'monto' =>-1*abs($registro->monto),
                                            'fecha' =>$_POST['Dcajachica']['fecha'],
                                             'glosa'=>'Liq deuda :'. substr($registro->glosa,0,20),
                                            'referencia'=>$registro->referencia,
                                              'debe'=>-1*abs($registro->debe),
                                                'haber'=>-1*abs($registro->haber),
                                               'monedahaber'=>yii::app()->settings->get('general','general_monedadef'),
                                               'codtra'=>$registro->codtra,
                                              'tipoflujo'=>self::TIPO_DE_FLUJO_FONDO,
                                              'codestado'=>self::ESTADO_DETALLE_CAJA_CONFIRMADO,
                                                'serie'=>$registro->serie,
                                              'tipodocid'=>$registro->tipodocid,
                                             'codocu'=>$registro->codocu,
                                            'numdocid'=>$registro->numdocid,
                                               'razon'=>'',
                                            ));
                                      if(!(
                                      $modelo2->save()))
                                          echo yii::app()->mensajes->getErroresItem($modelo2->geterrors());die();
       }
       
       
   }
   
   public function actionanularcaja($id){
         $id=(Integer) MiFactoria::cleanInput($id);
       $caja= $this->loadModel($id);
       if(isset($_POST['Cajachica'])){
           $this->redirect(array('update','id'=>$caja->id));
          yii::app()->end();
       }else{
        
       if(in_array($caja->codestado,array(self::ESTADO_PREVIO,self::ESTADO_CREADO))){
            if($caja->hijosconproceso==0){
                
                $caja->setScenario('estado');
                $caja->codestado=self::ESTADO_DETALLE_CAJA_ANULADO;
                $caja->save();
                 MiFactoria::mensaje('success','Se anulo la caja'); 
           
            }else{
               
               MiFactoria::mensaje('error','Esta caja no puede cerrarse porque ya hay registros hijos confirmados o cerrados'); 
            }
           
       }else{
          
           MiFactoria::Mensaje('error','Este estado no permite anular la caja');
       } 
        $this->render('update',array('model'=>$caja));
       yii::app()->end();
       }
       
       //var_dump(Yii::app()->user->getFlashes(false));
      
   }
   
    public function actionsalir($id){
		$this->out($id);
		$this->redirect(array('admin'));
	} 
        
        
     public function actionupdatececos($id)
        {
             $id=(integer) MiFactoria::cleanInput($id);
           $caja=$this->loadModel($id);
                $items= $caja->dcajachicas;//los hijos 
              //  foreach ($items as $item)
                   
                 
                 if(isset($_POST['Dcajachica']))
                        {
                            //echo "saliomm "; die();
                            $valid=true;
                             $transaccion=$items[0]->dbConnection->beginTransaction();
                             $errores=array();
                                 foreach($items as $i=>$item)
                                         {
                                     
                                      $item->setScenario('imputaciones');
                                     //var_dump($item->getScenario($item)); die();
                                        if(isset($_POST['Dcajachica'][$i])){
                                                $item->attributes=$_POST['Dcajachica'][$i];
                                              
                                               // var_dump($item->attributes);
                                                //var_dump($item->geterrors());var_dump($item->getScenario($item));die();
                                               //if($item->esimputable()) //solo los impútables
                                                if($item->validate()){
                                                        if($item->montoimputado!=0)
                                                        $item->save();
                                                         }else{
                                                            $errores[]=$item->geterrors();
                                                            }
                                                 }
                
                                        }
                                    if(count($errores)==0){
                                        $transaccion->commit();
                                        MiFactoria::Mensaje('success','Se grabaron los registros');
                                        $this->redirect(array('update','id'=>$id));
                                        
                                    }else{
                                            $transaccion->rollback(); 
                                            MiFactoria::Mensaje('error',' NO Se grabaron los registros');
                                       
                                        }
             }
          
    // displays the view to collect tabular input
    $this->render('imputacionmasiva',array('items'=>$items,'model'=>$caja));
           
            
        }    
        
        
      public function actionajaxrefrescawidget(){ ///regresa del estado anulado al estado cerrado
       if(yii::app()->request->isAjaxRequest){  
            if(isset($_POST['i']) and isset($_POST['valor']) and isset($_POST['valor']) ){
              $i=(integer) MiFactoria::cleanInput ($_POST['i']);
               $valor=MiFactoria::cleanInput ($_POST['valor']);
               $campo=MiFactoria::cleanInput ($_POST['campo']);
               $this->renderpartial('zonaimputacion',
                       array('i'=>$i,
                           'valor'=>$valor,
                           'campo'=>"[$i]ceco"),
                       false,true);
               
            }
              
            
         }
      }
}