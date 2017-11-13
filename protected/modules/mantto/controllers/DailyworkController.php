<?php

class DailyworkController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
   const COD_ANNO='anno';
   const COD_MES='mes';
   const COD_SEMANA='semana';
   const COD_DIA='anno';
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
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('CheckDailyWork',     'events',    'ajaxDeleteShift',    'manageShifts',   'summary','ajaxcargasemanas',  'updatedailyevent','ajaxDeleteEvent', 'view','admin','daily','creaevento','updatedailydet',   'ajaxproyecto','create','update'),
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
	
            $this->warningWrongData();
            $model=new Dailywork;
                 $model->valorespordefecto();
                 $model->fecha=date('d/m/Y');
                 $model->codestado=$model::ESTADO_PREVIO;
                 $model->codresponsable= Trabajadores::getCodigoFromUsuario(yii::app()->user->id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dailywork']))
		{
			$model->attributes=$_POST['Dailywork'];
			if($model->save()){
                            
                            $model->refresh();
                            //var_dump($model->idot);die();
                           $this->creadetalle($model->getot(),$model->id);
                            MiFactoria::Mensaje('success', 'Daily woksheet, created. Please Now, fill detail data');
		             
                            $this->redirect(array('update','id'=>$model->id));
                           
                                        }
				}
                                $criterio=new CDbCriteria();
                                
                if(is_null($model->codproyecto)){
                    $criterio->addCondition("1=1");
                }else{
                     $criterio->addCondition("codproyecto=:vcodproyecto");
                      $criterio->params=array(":vcodproyecto"=>$model->codproyecto);
                }
		$this->render('create',array(
			'model'=>$model,
                         'criterio'=>$criterio,
                        		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		//var_dump(Dailyturnos::getSecuencia('490000000031'));die();
            $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dailywork']))
		{
			$model->attributes=$_POST['Dailywork'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
$criterio=new CDbCriteria();
                                
                
                     $criterio->addCondition("codproyecto=:vcodproyecto");
                      $criterio->params=array(":vcodproyecto"=>$model->codproyecto);
               $siguiente=$model->getNext();
                $anterior=$model->getPrev();
		$this->render('update',array(
			'model'=>$model,'criterio'=>$criterio,
                        'siguiente'=>$siguiente,'anterior'=>$anterior
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
		$dataProvider=new CActiveDataProvider('Dailywork');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VwParteopdetalle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwParteopdetalle']))
			$model->attributes=$_GET['VwParteopdetalle'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Dailywork the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Dailywork::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Dailywork $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dailywork-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionajaxproyecto(){
            if(yii::app()->request->isAjaxRequest){             
                if(isset($_POST['codigoproyecto'])){                 
                    $id= (integer)MiFactoria::cleanInput($_POST['codigoproyecto']); 
                    $registro= Ot::findByNumero($id);   
                    if(is_null($registro)) {
                         echo "Valor no encontrado";
                    }  else{
                        echo $registro->textocorto;
                    }
                       
                        //throw new CHttpException(500,'NO se encontro el registro con el id '.$id);        
                    
                    
                }      
                    }
        }
        
        private function creadetalle($idproyecto,$idparte){
          // var_dump($idproyecto);var_dump($idparte);
           $provmaquinas= Machineswork::Model()->search_por_proyecto($idproyecto)->getdata();
           $contador=0;
          // var_dump($provmaquinas);die();
           foreach($provmaquinas as $filamaq){
               //var_dump($filamaq);die();
               //verificando si existe 
               $existe= Dailydet::model()->findAll("hidparte=:vhidparte and hidequipo=:vhidequipo",
                       array(":vhidparte"=>$idparte,":vhidequipo"=>$filamaq->hidinventario));
              
               if(count($existe)==0){
                  
                   $model=New Dailydet('minimo');
                   //var_dump($idparte);die();
                   $model->hidparte=$idparte;
                   $model->hidequipo=$filamaq->hidinventario;
                   $centro=Ot::model()->findByPk($idproyecto)->codcen;
                   if(Configuracion::valor(Dailywork::COD_DOCU, $centro,'1125')=='1'){ ///si existe restriccion de horometros 
                   $horometro=$model->getHorometroAnterior('hmf');
                   $horometrop=$model->getHorometroAnterior('hpf');
                   }else{
                    $horometro=-1;
                   $horometrop=-1;   
                   }
                   $model->setAttributes(
                           array(
                               'hidparte'=>$idparte,
                               'hidequipo'=>$filamaq->hidinventario,
                               'codtipo'=>$filamaq->inventario->tipo,
                               'hmi'=>($horometro==-1)?null:$horometro,
                               'hmf'=>($horometro==-1)?null:$horometro,
                               'hpi'=>($horometrop==-1)?null:$horometrop,
                               'hpf'=>($horometrop==-1)?null:$horometrop,
                           ));
                   if(!($filamaq->inventario->tienecarter='1')){
                       $model->hpi=-1;
                       $model->hpf=-1;
                   }
                           
                   if($model->save()){
                       $contador+=$contador;
                       //echo "auentado<br>";
                   }else{
                     //print_r($model->geterrors());
                   }
                       
                   
               }
               }
               return $contador;
           }
         
           
           public function actionupdatedailydet(){
               if(isset($_POST['name'])and 
                   isset($_POST['value'])and
                       isset($_POST['pk'])and
                       isset($_POST['scenario'])){
                   $value= html_entity_decode($_POST['value'], ENT_QUOTES, "UTF-8");
                    $name= MiFactoria::cleanInput($_POST['name']);
                     $pk= MiFactoria::cleanInput($_POST['pk']);
                      $escenario= MiFactoria::cleanInput($_POST['scenario']);
               }
               //var_dump($_POST);
              if(isset($_POST['modelito'])){
                   $modelito= MiFactoria::cleanInput($_POST['modelito']);
              }else{
                  $modelito='Dailydet';
              }
               $model= $modelito::model()->findByPk($pk);
               if($model===null)
                  throw new CHttpException(500,yii::t('errvalid','No se encontro el registro con el Id {id} ',array('{id}'=>$value)));
                $model->setScenario($escenario);
               
                
               $model->{$name}=$value;
               if(!is_null($model->inventario))
               if(!($model->inventario->tienecarter=='1')) {
                   if(in_array($name,array('hpi','hpf'))){
                       
                       $model->adderror($name,yii::t('errvalid','In these equipments this hour meters are not enabled. Try enabled this behavior in data master Equipment. Yo will need some authorizations for this  '));
                 // var_dump($model->geterrors());DIE();
                       }
               }
              // var_dump($model->{$name});die();
              // $model->validate(null,false);
               if($model->validate(null,false)){
                   
                if($model->save()){
                    echo "grabo";
                }else{
                   echo "no grabo"; 
                }
                
                //Yii::app()->end();
               }else{
            $mensaje=$model->geterrors();
                   $mensaje=Yii::app()->mensajes->getErroresItem(array_unique($mensaje));
                   throw new CHttpException(500,yii::t('errvalid','There are Problems  :{errores}',array('{errores}'=>$mensaje)));
                 
               }
                   
               // $f->save();
               //echo "hola";
           }
                
            public function actionupdatedailyevent(){
               if(isset($_POST['name'])and 
                   isset($_POST['value'])and
                       isset($_POST['pk'])and
                       isset($_POST['scenario'])){
                   $value= html_entity_decode($_POST['value'], ENT_QUOTES, "UTF-8");
                    $name= MiFactoria::cleanInput($_POST['name']);
                     $pk= MiFactoria::cleanInput($_POST['pk']);
                      $escenario= MiFactoria::cleanInput($_POST['scenario']);
               }
               //var_dump($_POST);
              
               $model= Dailyevents::model()->findByPk($pk);
               if($model===null)
                  throw new CHttpException(500,yii::t('errvalid','No se encontro el registro con el Id {id} ',array('{id}'=>$value)));
                $model->setScenario($escenario);
               $model->{$name}=$value;
              // var_dump($model->{$name});die();
               $model->validate();
               if(count($model->geterrors())==0){
                   
                if($model->save()){
                    echo "grabo";
                }else{
                   echo "no grabo"; 
                }
                echo CHtml::script("$.fn.yiiGridView.update('ot-grid');");
                //Yii::app()->end();
               }else{
                   $mensaje=$model->geterrors();
                   $mensaje=Yii::app()->mensajes->getErroresItem($mensaje);
                   throw new CHttpException(500,yii::t('errvalid','Se presentaron los siguientes errores :{errores}',array('{errores}'=>$mensaje)));
                 
               }
                   
               // $f->save();
               //echo "hola";
           } 
           
        public function actioncreaevento($id){
            $id=(integer) MiFactoria::cleanInput($id);
           $reg= Dailydet::model()->findByPk($id);
           if(is_null($reg)){
                throw new CHttpException(500,yii::t('errvalid','No se encontro el registro para este valor "{valor}"',array('{valor}'=>$id)));
               
           }
            $registro=New Dailyevents('insert');
            $registro->hidet=$id;
            if(isset($_POST[get_class($registro)])){
                $registro->attributes=$_POST[get_class($registro)];
                if($registro->save()){
                    echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
					window.parent.$('#cru-frame3').attr('src','');
					window.parent.$.fn.yiiGridView.update('ot-grid');
					");
					Yii::app()->user->setFlash('success', " Se grabaron los datos  ");
					yii::app()->end();
                } else{
                   // print_r($registro->geterrors());die();
                } 
                    
                
            }
         $this->layout = '//layouts/iframe';
            $this->render("_eventos",array('model'=>$registro));
        }   
           
          public function actionDaily(){
            
              if(isset($_GET['year']) and
                     isset($_GET['day']) and
                      isset($_GET['month']) and
                      isset($_GET['level']) 
                      ){
                  // var_dump($_GET);die();
                 $year=str_pad((integer) MiFactoria::cleanInput($_GET['year']),2,"0",STR_PAD_LEFT);
                 $day=str_pad((integer)MiFactoria::cleanInput($_GET['day']),2,"0",STR_PAD_LEFT);
                 $month=str_pad((integer) MiFactoria::cleanInput($_GET['month']),2,"0",STR_PAD_LEFT);
                 $level=MiFactoria::cleanInput($_GET['level']);
                 //die();
                 $registro=New VwParteopdetalle(); 
                 $params=array('anno'=>$year,'mes'=>$month,'semana'=>null,'dia'=>$day);
                 //var_dump($this->getparams());die();
                 
                 $params=$this->getparams();
                 
                 $proveedor=$registro->proveedor($params);
                     
                 
                 //var_dump($proveedor->getdata());die();
                 //ibteneiendo la data apra el grafico; solo so este pedaZOP
                 //DE CODIGO NO HAE NADA MAS QUE ESO 
                // VAR_DUMP($proveedor->getdata()[0]);DIE();
                 $matrizdatos=$registro->getEquipos($proveedor);
                 //var_dump(array_keys($matrizdatos));die();
                 $tipos=array_keys($matrizdatos);//drillers y dumpers
                 $equipos1=array_keys($matrizdatos[$tipos[0]]);
                 $categorias1=$matrizdatos[$tipos[0]]['codigoaf'];
                  $series11=$matrizdatos[$tipos[0]]['avg_util'];
                   $series12=$matrizdatos[$tipos[0]]['avg_dispo'];
                   
                   $equipos2=array_keys($matrizdatos[$tipos[1]]);
                 $categorias2=$matrizdatos[$tipos[1]]['codigoaf'];
                  $series21=$matrizdatos[$tipos[1]]['avg_util'];
                   $series22=$matrizdatos[$tipos[1]]['avg_dispo'];
                 ///fion deobnetner la data para el grafico
                 
                 $turnos=Regimen::model()->findAll();
                $turnitos=array();
                foreach($turnos as $turno){
                    $turnitos[]['id']=$turno->id;
                    $turnitos[]['link']=$turno->desregimen;
                }
                   //var_dump($turnitos);die();
                 $fechita=$day."/".$month."/20".$year;
                 
                 
                 $registro->_campopivote="codtipo";                 
                 $proveedor2=$registro->proveedor($params);
                // var_dump($proveedor2->getdata());die();
                 $modelos=$proveedor->getData();
                 $model=$modelos[0];
                 //var_dump($equipos1);die();
                $this->render("_form_diario",array('model'=>$model,
                    'proveedor2'=>$proveedor2,
                    'proveedor'=>$proveedor,
                    //'equipos1'=>$equipos1,
                    'categorias1'=>$categorias1,
                    'series11'=>$series11,
                    'series12'=>$series12,
                    'categorias2'=>$categorias2,
                    'series21'=>$series21,
                    'series22'=>$series22,
                    'fecha'=>$fechita,
                    'turnitos'=>$turnitos,
                    
                    )
                        );
                
                 
              }else{
                throw new CHttpException(500,yii::t('errvalid','No se encontro el registro '));
                 
              }
              
          }
        
        
        public function actionajaxDeleteEvent(){
            if(yii::app()->request->isAjaxRequest){     
                if(isset($_GET['id'])){   
                    $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                    $registro= Dailyevents::model()->findByPk($id);    
                    if(is_null($registro))                
                        throw new CHttpException(500,'NO se encontro el registro con el id '.$id);                 }          }
                    $registro->delete();
                         echo CHtml::script("
					window.parent.$.fn.yiiGridView.update('ot-grid');
					");
                }
        
           
       private function getparams(){
           $registro=New VwParteopdetalle();
           $camposprofundidad=$registro->_camposprofundidad;
          
           $valores=array();
           //var_dump($_GET);
           foreach(array_keys($camposprofundidad) as $clave=>$valor){
              //var_dump($valor);
               if(isset($_GET[$registro->tr($valor)])){
                   //var_dump($_GET[$registro->t()[$valor]]);
                  $valores[$registro->tr($valor)]= str_pad( (integer) MiFactoria::cleanInput($_GET[$registro->tr($valor)]),2,"0",STR_PAD_LEFT);
               
                 }
            } 
             unset($registro);
          //var_dump($valores);die();
            return $valores;
       }
       
       
       
       public function actionsummary(){
           $model=new VwParteopdetalle('filtro');                
		if(isset($_POST['VwParteopdetalle']))
		{
			//die();
                 /* $model->fecha1=$model->cambiaformatofecha($_POST['VwParteopdetalle']['fecha1'],false);
                          $model->fecha=$model->cambiaformatofecha($_POST['VwParteopdetalle']['fecha'],false);
                          $model->periodo=$_POST['VwParteopdetalle']['periodo'];
                          $model->grupo=$_POST['VwParteopdetalle']['grupo'];*/
			$model->attributes=$_POST['VwParteopdetalle'];
                    if($model->validate()){
                            if(!is_null($_POST['VwParteopdetalle']['semana'])){
                                $model->_level='dia';
                                $model->_campopivote='codcen';
                                $parametros=array('semana'=>$_POST['VwParteopdetalle']['semana']);
                                $proveedor=$model->proveedor($parametros);
                                 $this->render('_summary_graph',
                                  array(
                                      'model'=>$model,
                                       'proveedor'=>$proveedor,
                                      //'proveedor'=>$proveedor,
                                      ));die();
                            }else{
                                
                            }
                            /*$this->render('summary2',array(
			'model'=>$model,
                        ));*/
                         /* $model->_level=$model->periodo;
                          $model->_campopivote=$model->grupo;
                            //print_r($model->attributes);die();
                          echo $model->buildSqlFechas($model->fecha, $model->fecha1);
                          $proveedor=$model->proveedor(null);
                          print_r($proveedor->getData());
                          $model->_level=$model->periodomenor();
                          $proveedormin=$model->proveedor(null);
                          $model->_level=$model->periodo;*/
                          $this->render('_summary_graph',
                                  array(
                                      'model'=>$model,
                                     //  'proveedormin'=>$proveedormin,
                                      'proveedor'=>$proveedor,
                                      ));
                           
                                        }else{
                                            print_r($model->geterrors());die();
                                        }
				}

		$this->render('_summary_week',array(
			'model'=>$model,
		));
       }

     public function actionweekly(){
         
     }
       
     
   
    
    public function actionajaxcargasemanas()
	{
		if(yii::app()->request->isAjaxRequest){  
            if(isset($_POST['anno']) and isset($_POST['mes']) ){           
                $anno= MiFactoria::cleanInput($_POST['anno']); 
                $mes= MiFactoria::cleanInput($_POST['mes']); 
		$data=yii::app()->periodo->semanas($mes,$anno);
		 
			echo CHtml::tag('option', array('value'=>null),CHtml::encode('--Chose Week--'),true);
			foreach($data as $value=>$name) { 
			    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			   } 
                    }
    
                }
        }
        
      //renderiza un vire para gestionar los turnos 
        //asociados a un día
     public function actionmanageShifts(){
         $model=New Dailyturnos('insert');
         $criteria=New CDBcriteria();
         $criteria->addCondition("activo='1'");
        
               
         if(isset($_POST['Dailyturnos'])){
             $model->attributes=$_POST['Dailyturnos'];
             
            // $registro=New Dailyturnos();
      // var_dump($model->attributes);die();
           if( $model->save()){
               $excepciones=yii::app()->db->createCommand()->
                     select('hidturno')->from($model->tableName())->
                 where("codproyecto=:vcodproyecto",
                         array(":vcodproyecto"=>
                             $_POST['Dailyturnos']['codproyecto'])
                         )->queryColumn();
             $criteria->addNotInCondition('id',array_unique($excepciones));
             MiFactoria::Mensaje('success', 'A shift has been added to the day of this project');
              $model->unsetAttributes();
               
           }else{
              //excep var_dump($model->search()->getData());
         
           }
         }       
          $proveedor=$model->search();
         $datoscomboturno=CHtml::listData(Regimen::model()->findAll($criteria), "id", "desregimen");
           $this->render('turnos',
                   array(
                       'datoscomboturno'=>$datoscomboturno,
                       'model'=>$model,
                       'proveedor'=>$proveedor,
                   ));
         
        
     }   
   
 public function actionajaxDeleteShift(){
            if(yii::app()->request->isAjaxRequest){     
                if(isset($_GET['id'])){   
                    $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                    $registro= Dailyturnos::model()->findByPk($id);    
                    if(is_null($registro))                
                        throw new CHttpException(500,'NO se encontro el registro con el id '.$id);                 }          }
                    $registro->delete();
                         echo "The shift has been deleted.";
                }

     public function getLastDaily($proyecto){
         $id=yii::app()->db->createCommand()->select('max(id)')->
                 from('{{dailywork}}')->
                 where("codproyecto=:vcodproyecto",array(
                     ':vcodproyecto'=>$proyecto
                 ))->queryScalar();
        return ($id!=false)?$this->loadModel((integer)$id):null;
     }
    
     
     public function warningWrongData($proyecto=null){
          //create(var_dump($proyecto);die();
             if(is_null($proyecto))  {
                 //imtemtwe sacar de datos pro defaulr de lsusuario
                 $tg=new Dailywork;
                 $proyecto= $tg->getValueDefault('codproyecto');
                
                 unset($tg);
                 if(is_null($proyecto))
                     return;
             }   
         
         $registro=$this->getLastDaily($proyecto);
         if($this->CheckDailyWork($registro->id)>0)
             return;
         if(is_null($registro)){
             return;
         }else{
             if(Configuracion::valor(Dailywork::COD_DOCU, $registro->getCentro()  ,'1125'))
           {
                      IF($registro->isProbablyDataIncomplete()  ){
                          $link= CHtml::link(yii::t('errvalid','  Click here to see '),yii::app()->createUrl('/mantto/'.$this->id.'/update/',array('id'=>$registro->id)));
                 
                 $mensaje= yii::t('errvalid','The previos Document ({documento} -'
                         . ' {fecha} - {turno}) probably has incomplet data. '
                         . 'Before to continue; make sure to check events and hour meters '
                         . ' ',array('{documento}'=>$registro->numero,
                             '{fecha}'=>$registro->fecha,
                             '{turno}'=>$registro->regimen->desregimen,
                             ));
                  MiFactoria::Mensaje ('notice', $mensaje.' - '.$link); 
             }else{
                 return;
             }
                
           }else{
               return ;
           }
         }
     }
   
     
      public function actionSummaryBetweenDates(){
          $model=New VwParteopdetalle();
          $nombre= get_class($model);
          if(isset($_POST[$nombre]['fecha']) and 
              isset($_POST[$nombre]['fecha1']))
              {
              $this->render();
            }else{
              $this->render();  
            }
      }
      
      public function actionevents(){
        
		$model=new VwParteeventos ('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwParteeventos']))
			$model->attributes=$_GET['VwParteeventos'];

		$this->render('admineventos',array(
			'model'=>$model,
		));
	
      }
      
      public function CheckDailyWork($id,$withMessages=true){
         //if(isset($_GET['id'])){
             $id=(integer) MiFactoria::cleanInput($id);
         
         $errores=array();
        $registro=$this->loadModel($id);
        $detalles=$registro->dailydet;
        //var_dump($detalles);die();
        $mensaje=yii::t('errvalid','There are some errors, In the previous document ({numero}). Before to create new one, you must fix this : <br>',array('{numero}'=>$registro->numero));
            foreach($detalles as $filadetalle){
                //die();
                $filadetalle->setScenario('update');
                if(!($filadetalle->validate(null,false))){
                    $equipo=$filadetalle->inventario->codigoaf;
                    $errores[$equipo]=$filadetalle->getErrors();
                    if($withMessages){
                        if(count($errores[$equipo]) >0){
                            $keypri=array_keys($errores[$equipo])[0];
                             $mensaje=$equipo."   [".$filadetalle->getAttributeLabel($keypri)."] :   ".$errores[$equipo][$keypri][0]." <br>";
                          MiFactoria::Mensaje('error',$mensaje);
                             
                        }
                       
                        //
                    }
                }else{
                  //  MiFactoria::Mensaje('success', 'ok');
                }
                   
            }
            $mensaje="";
	return count($errores);	
      }
}