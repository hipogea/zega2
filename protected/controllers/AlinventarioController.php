<?php

class AlinventarioController extends Controller
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


	public function behaviors() {
		return array(

			'exportableGrid' => array(
				'class' => 'application.components.ExportableGridBehavior',
				'filename' => 'Inventariomareriles.csv',
				'csvDelimiter' =>(Yii::app()->user->isGuest)?",":Yii::app()->user->getField('delimitador') , //i.e. Excel friendly csv delimiter
			));
	}





	public function actionhistorinventario (){

		$cantidadregistros=Yii::app()->db->createCommand()->select("id")
			->from( "{{opcionesdocumentos}}" )
			->where("idopoc=v:idop",array("v:idop"=>$fila->id))
			->queryScalar();

		$user = Yii::app()->db->createCommand()
			->select('id, username, profile')
			->from('tbl_user u')
			->join('tbl_profile p', 'u.id=p.user_id')
			->where('id=:id', array(':id'=>$id))
			->queryRow();

		$montosmensualesporgrupo=Yii::app()->db->createCommand()
			->select('avg(montolibre)as smontolibre,
			    avg(montoreserva)as smontoreserva,
			    avg(montotran)as smontotran,
			   avg(montodif)as smontodif,
			    a.codal,
			    a.anno,
			    a.codcen,
			    a.mes,
			    a.codgrupo
			    b.destipo
			       ')
			->from('{{montoinventario}} a ,{{maestrotipos}} b')
			->where('b.codtipo=a.codgrupo')
			->group('a.codal,  a.codcen,  a.mes,a.anno, a.codgrupo,b.destipo')
			->queryRow();

		$montosmensuales=Yii::app()->db->createCommand()
			->select('avg(montolibre)as smontolibre,
			    avg(montoreserva)as smontoreserva,
			    avg(montotran)as smontotran,
			    avg(montodif)as smontodif,
			    a.codal,
			    a.codcen,
			    a.mes,
			    a.anno
			       ')
			->from('{{montoinventario}} a ')
			->group('a.codal,  a.codcen,  a.mes ,a.anno')
			->queryRow();

        $inventarioactual=
		$montosanuales=Yii::app()->db->createCommand()
			->select('avg(montolibre)as smontolibre,
			    avg(montoreserva)as smontoreserva,
			   avg(montotran)as smontotran,
			   avg(montodif)as smontodif,
			    a.codal,
			    a.codcen
			    a.anno
			       ')
			->from('{{montoinventario}} a ')
			->group('a.codal,  a.codcen, a.anno')
			->queryRow();



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
				'actions'=>array('ordenlotesube1','ordenlotebaja1','colocaloteultimo','colocaloteprimero','editalote','pintarotacion','revertirajuste','ajuste','editaconteofisico','conteofisico','updateubicacion','muestrakardex','admin','pintareservas','create','supervision','import','pronostica','pareto','adminpareto','repinventario','prueba','buclecarga','update','cargarmat','busqueda','cargaalmacenes','cargaalmacenes1'),
				'users'=>array('@'),
			),


			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}




	public function actionImport(){
       $model=new Alinventario;
		$model->setScenario("cargamasiva");
 if(isset($_POST['Alinventario']))
 {
	 echo " Si salio el POST                             OK ->   ";
  $model->attributes=$_POST['Alinventario'];
           $filelist=CUploadedFile::getInstancesByName('csvfile');
          // if($filelist)
			  // $model->csvfile=1;
           //if($model->validate())
          // {
			  // echo " Se valido  ....";
               foreach($filelist as $file)
               {

				   try{
                   $transaction = Yii::app()->db->beginTransaction();
                   $handle = fopen("$file->tempName", "r");
					   echo "el handle  es ....".gettype($handle);
                   $row = 1;
                   while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                       if($row>1){
                             $newmodel=Alinventario::model()->findByPk($data[0]);
						     $newmodel->setScenario("cargamasiva");
						     $newmodel->cantlibre=$data[1];
						     echo " el id  a cargar es :  ".$data[0]."   \n";
                             if($newmodel->save()) {
								 echo " grabo  carajo --------------------> :  ".$data[1]."   \n";
							 } else {
								 echo " NO grabo  xxxxxxxxxxx-> :  ".$data[1]."   \n";
							 }
                       }
                       $row++;
                   }
                   $transaction->commit();
                   }catch(Exception $error){
                       print_r($error);
                       $transaction->rollback();
                   }
				   yii::app()->end();
               }
           //} else

		  // {
			 //  echo "NO se valido CSM ";
			   //yii::app()->end();
		   //}
 } else  {
	echo "NO se ha enviado ningun form";
	//yii::app()->end();
 }
 $this->render('cargainventario',array(
  'model'=>$model,
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

    public function actionPrueba()
    {
print_r($_SESSION['sesion_Maestrocompo']);

    }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Alinventario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Alinventario']))
		{
			$model->attributes=$_POST['Alinventario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

  
	public function actioncargarmat() {
					$modelito=new cargainForm;
		// collect user input data
		if(isset($_POST['cargainForm']))
		{
           // Yii::app()->end();
			$modelito->attributes=$_POST['cargainForm'];
			// validate user input and redirect to the previous page if valid
            //obtenemos la matriz de datos del maestro de materiales que no esta ampliado en ese centro y almacen
           // $prefix="public_";

			$matriz2=Yii::app()->db->createCommand(" SELECT *from {{maestrocomponentes}} where codigo not in (
                   select codart from {{alinventario}} where codalm='".$modelito->almacen."'  and codcen='".$modelito->centro."'
                 ) ")->queryAll();

			for ($i=0; $i < count($matriz2); $i++) { //recorremos y lo vamos insertando
				$cadena="INSERT INTO {{alinventario}} ( CODCEN,CODALM,CODART, CANTLIBRE,CANTTRAN,CANTRES) VALUES ('".$modelito->centro."','".$modelito->almacen."','".$matriz2[$i]['codigo']."',0,0,0)";
				$command = Yii::app()->db->createCommand($cadena);
				$command->execute();
				/* $cadena2="select codart from ".$prefix."alinventario where codalm='".$modelito->almacen."'  and codcen='".$modelito->centro."'";
                     $command1 = Yii::app()->db->createCommand($cadena2)->queryScalar();
                     if($command1) { ///si no encontro un registro en el inventario entonces

                     }*/
			}


             $matriz=Yii::app()->db->createCommand(" SELECT *from {{maestrocomponentes}} where codigo not in (
                    SELECT codart from {{maestrodetalle}} where codcentro='".trim($modelito->centro)."' and  codal ='".trim($modelito->almacen)."'
                 ) ")->queryAll();

            for ($i=0; $i < count($matriz); $i++) { //recorremos y lo vamos insertando
                   $cadena="INSERT INTO {{maestrodetalle}} ( CODCENTRO,CODAL, CODART,CODGRUPOVENTAS,CANALDIST,CANTECONOMICA,CANTREPOSIC,CANTREORDEN,LEADTIME) VALUES ('".$modelito->centro."','".$modelito->almacen."','".$matriz[$i]['codigo']."', '001','02',0,0,0,0)";
                        $command = Yii::app()->db->createCommand($cadena);
				        $command->execute();
                      /* $cadena2="select codart from ".$prefix."alinventario where codalm='".$modelito->almacen."'  and codcen='".$modelito->centro."'";
                         $command1 = Yii::app()->db->createCommand($cadena2)->queryScalar();
				         if($command1) { ///si no encontro un registro en el inventario entonces

                         }*/
                 }



			$matriz3=Yii::app()->db->createCommand(" SELECT *from {{maestrocomponentes}} where codigo not in (
                    SELECT hcodart from {{maestrodetallecentros}} where codcen='".trim($modelito->centro)."' ) ")->queryAll();

			for ($i=0; $i < count($matriz3); $i++) { //recorremos y lo vamos insertando
				$cadena="INSERT INTO {{maestrodetallecentros}}
				( catvalor,codcen,hcodart,iqf)
				 VALUES (null, '".$modelito->centro."','".$matriz3[$i]['codigo']."', '0')";
				$command = Yii::app()->db->createCommand($cadena);
				$command->execute();
				/* $cadena2="select codart from ".$prefix."alinventario where codalm='".$modelito->almacen."'  and codcen='".$modelito->centro."'";
                     $command1 = Yii::app()->db->createCommand($cadena2)->queryScalar();
                     if($command1) { ///si no encontro un registro en el inventario entonces

                     }*/
			}
			if(yii::app()->settings->get('materiales','materiales_contabilidad')=='1')
			{
				$crit=New CDBCriteria;
				$crit->addCondition("catval=:catval and codal=:codal  and codcentro=:codcentro");
				$crit->params= array(":catval"=>null,":codcentro"=>$modelito->centro,":codal"=>$modelito->almacen);
				$data= Yii::app()->db->createCommand()
					->select('codart')
					->from('{{maestrodetalle}}')
					->where($crit->condition,$crit->params)
					->queryAll();
				$faltan=count($data);
				MiFactoria::Mensaje('notice',' En este almacen  '.$faltan.' registros de materiales que no tienen datos de valoracion contable');

			}

				  $this->render("vw_procesado");
		}
		// display the login form
		$this->render('cargamat',array('model'=>$modelito));
	                          }

    public function buclecarga($centro,$almacen) {
         $prefix="public_";
        $matrizmateriales=Yii::app()->db->createCommand(" SELECT *from ".$prefix."maestrocomponentes where codigo not in (
        SELECT codart from ".$prefix."maestrodetalle where codcentro='".$centro."' and  codal ='".$almacen."'
        ) ")->queryAll();

        return $matrizmateriales;
    }





	public function actioncargaalmacenes()
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("codcen=:proved");
		$valor=$_POST['cargainForm']['centro'];
		//echo $valor;
		$data=CHtml::listData(	Almacenes::model()->findAll(  "codcen='".$valor."'"),
		  //$data=CHtml::listData(	Direcciones::model()->findAll(),
												"codalm",
												"nomal"
											
												); 
			echo CHtml::tag('option', array('value'=>null),CHtml::encode('Escoja un almacen'),true);
			foreach($data as $value=>$name) { 
			    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			   } 
	}
	

	public function actioncargaalmacenes1()
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("codcen=:proved");
		$valor=$_POST['cargainForm']['centro'];
		//echo "el valor es ..".$valor;
        //Yii::app()->end();
		  $data=CHtml::listData(	Almacenes::model()->findAll(  "codcen='".$valor."'"),
		  //$data=CHtml::listData(	Direcciones::model()->findAll(),
												"codalm",
												"nomal"
											
												); 
			echo CHtml::tag('option', array('value'=>null),CHtml::encode('Escoja un almacen'),true);
			foreach($data as $value=>$name) { 
			    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
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

		if(isset($_POST['Alinventario']))
		{
			$model->attributes=$_POST['Alinventario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('detalleinventario',array(
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
		$dataProvider=new CActiveDataProvider('Alinventario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VwAlinventario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwAlinventario'])){
			$model->attributes=$_GET['VwAlinventario'];
		}
		if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
			//ECHO "SALIO";DIE();
			$this->exportCSV($model->search(), array(
					'id',
					'codalm',
					'codcen',
					'cantlibre',
					'ubicacion',
					'desum',
					'um',
					'codart',
					'descripcion',
					'cantlibre',
					'cantres',
					'canttran',
					'punit',
					'lote',
				)

			);
		} else {
			$this->render('admin',array(
				'model'=>$model,
			));
			/*echo "no pasa nada ";
			Yii::app()->end();*/
		}


	}

	public function actionPintareservas(){
		$idinventario=MiFactoria::cleanInput($_GET['idinventario']);
		//var_dump($material);
		//$material='18004821';
		$this->layout='//layouts/iframe';
		echo $this->render('reservas',array('idinventario'=>$idinventario));
	}

///funcion para mostrar el llistadp o ranking de pareto
	public function actionAdminpareto()	{
		$model=new VwPareto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwPareto'])){
			$model->attributes=$_GET['VwPareto'];
			if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]

				$this->exportCSV($model->search(), array('codalm','codart','codcen','desum','cantlibre','punit','descripcion','ptlibre','ubicacion','ranking','clase','acumulado','porcentaje','hidventario','porcentajeac'));
			}

		}

		$this->render('vwlistadopareto',array(
			'model'=>$model,

		));
	}




	/**
	 * Pinta el pareto
	 */
	public function actionPareto()
	{
		$modinventario=new Alinventario();
		$model=new ParetoForm;
		// collect user input data
		if(isset($_POST['ParetoForm']))		{

			$model->attributes=$_POST['ParetoForm'];
			$almacen=$_POST['ParetoForm']['almacen'];
			$centro=$_POST['ParetoForm']['centro'];
			$tipo=$_POST['ParetoForm']['codtipo'];
			$almacen=MiFactoria::cleanInput($almacen);
			$centro=MiFactoria::cleanInput($centro);
	if($model->validate()) {
				ini_set ("set_time_limit" , 0);
					if(is_null($tipo))   {
				  $valortotal=$modinventario->getStockValAlmacen($almacen/*,$centro*/);
				} else  {
						$valortotal=$modinventario->getStockValAlmacen($almacen/*,$centro*/);
					}

		$rows= Yii::app()->db->createCommand()
			->select('a.id, ('.$modinventario->getcadenacampos().')*a.punit*b.cambio as stock,
			    a.codalm,a.codart,
			    a.codcen')
			->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
			->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmon2=:Vmonedadefault  and a.codalm=:vcodal and (".$modinventario->getcadenacampos().") > 0 ",
				array(":vcodal"=>$almacen,":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))
			//->group('a.codalm, a.codcen,a.codart,c.nomal')
			->order('('.$modinventario->getcadenacampos().')*a.punit*b.cambio DESC')
			->queryAll();
				///borramos todos los registros anteriores primero
		$comando=Yii::app()->db->createCommand(" delete from {{pareto}} ");
				// $comando=Yii::app()->db->createCommand(" delete from {{pareto}}  where
				   // hinventario in (SELECT id from ".Yii::app()->params['prefijo']."alinventario where codcen='".$centro."'  and codalm ='".$almacen."' ) ");
				$comando->execute();
					$i=1; //ranking
				$acumulado=0; //valor del stcok acumulado
				$porcenacumulado=0;
				//$transaction = $this->getDbConnection()->beginTransaction();
				foreach($rows as $valor) {
					$acumulado=$acumulado+$valor['stock'];
					/*var_dump($valortotal[$almacen]['stock_total']);
					yii::app()->end();*/
					$porcentaje=round($valor['stock']/$valortotal[$almacen]['stock_total'],3);
					$porcenacumulado=round($porcenacumulado+$porcentaje,2);
					$comando1=Yii::app()->db->createCommand(" INSERT INTO {{pareto}} (hinventario,ranking, clase, acumulado,porcentaje,porcentajeac,  idsesion) values( ".$valor['id']." , ".$i.",'', ".$acumulado.",".$porcentaje.",".$porcenacumulado.",".Yii::app()->user->getId()."  ) ");
					$comando1->execute();
					//$transaction->commit();
					$i=$i+1;
				}


				//luego establecer los margenes de la clase
				$rangoa=$_POST['ParetoForm']['rangoa']/100;
				$rangob=$_POST['ParetoForm']['rangob']/100;
				$rangoc=$_POST['ParetoForm']['rangoc']/100;

				//actualñizar todas las clases A
				$comando2=Yii::app()->db->createCommand(" UPDATE ".Yii::app()->params['prefijo']."pareto SET clase='A' where porcentajeac < ".$rangoa."  ");
				$comando2->execute();

				//actualñizar todas las clases B
				$comando2=Yii::app()->db->createCommand(" UPDATE ".Yii::app()->params['prefijo']."pareto SET clase='B' where porcentajeac >=".$rangoa." and porcentajeac < ".($rangoa+$rangob)." ");
				$comando2->execute();

				//actualñizar todas las clases C
				$comando2=Yii::app()->db->createCommand(" UPDATE ".Yii::app()->params['prefijo']."pareto SET clase='C' where porcentajeac >=".($rangoa+$rangob)." ");
				$comando2->execute();
//echo "llego", die();
				//$this->render('vwlistadopareto');
				//$this->render('vwpareto',array('model'=>$model));
				//$this->redirect('vwpareto',array('model'=>$model));
				$this->redirect(array('adminpareto'));
					}

			//echo "ESTOS SON LOS RANGOS  ".$rangoa."    ".$rangob."    ".$rangoc;
				//Yii::app()->end();

	}
		// display the login form
		$this->render('pareto_form',array('model'=>$model));


	}


	public function actionGraficopareto()
	{

		$cuantoshay=Yii::app()->db->createCommand(" select count(*) from ".Yii::app()->params['prefijo']."pareto where  idsesion=".Yii::app()->user->getId()."  ")->queryScalar();
		$precision=round($cuantoshay/50,0);
		//sacando los registros para el grafico
		$puntosxy=Yii::app()->db->createCommand(" select ranking , acumulado  from ".Yii::app()->params['prefijo']."pareto   where  MOD (ranking,".$precision." )=0 and    idsesion=".Yii::app()->user->getId()." ")->queryAll();



	}



public function actionBusqueda()
	{

		$model=new VwAlinventario;
		// collect user input data
		if(isset($_POST['VwAlinventario']))
		{

			$model->attributes=$_POST['VwAlinventario'];
			// validate user input and redirect to the previous page if valid
			//if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
			$proveedor=$model->search();
			/*$criterio=$proveedor->getCriteria();
			$criterio->select=" SUM(PUNIT*(CANTRES+PTLIBRE)) ";
			$totalinventario=$model->findall($criterio);*/
			$this->render('admin',array(
							'model'=>$model,
							'proveedor'=>$proveedor,
							//'total'=>$totalinventario,
				)

				);
			Yii::app()->end();
		}
         
		if(isset($_GET['VwAlinventario']))
		{
			$model->attributes=$_GET['VwAlinventario'];
			// validate user input and redirect to the previous page if valid
			//if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
			$proveedor=$model->search();
			/*$criterio=$proveedor->getCriteria();
			$criterio->select=" SUM(PUNIT*(CANTRES+PTLIBRE)) ";
			$totalinventario=$model->findall($criterio);*/
			$this->render('admin',array(
							'model'=>$model,
							'proveedor'=>$proveedor,
							//'total'=>$totalinventario,
				)

				);
			Yii::app()->end();
		}


		// display the login form
		$this->render('busqueda',array('model'=>$model));
		
	}

	
	public function actionRepinventario()
	{
	/* $ancho=$this->model()->search_parametros($idtemporada,$idespecie,$codep)->getdata();
			// echo count($ancho);
			 //obteniendo las fechas 
				
		if (count($ancho) >0 and sort($ancho)) {
				$fechas=array()	; //las absicas
					$pescas=array(); //para guardar la pesca descragada
					$combustibles=array(); //para guardar los petroleso consumidos 
					$combustiblesporhora=array(); //petrole por hora 
					$combustibleportonelada=array();//petroleo por hora 
					$eficiencias=array();//eficiencias de bodega 
					$horastrabajadas=array();//hora trabajadas 
					
					//$acumulado=array();
					$meta=array();
							$i=0;
								foreach ($ancho as $clave => $valor) {
											$fechas[$i]=substr($ancho[$i]['fecha'],5,5)	;
											$pescas[$i]=$ancho[$i]['sdescargada']+0	;
											$combustibles[$i]=$ancho[$i]['sd2']+0	;
											$combustiblesporhora[$i]=$ancho[$i]['d2porhora']+0	;
											$combustibleportonelada[$i]=$ancho[$i]['sct']+0	;
											$eficiencias[$i]=$ancho[$i]['eficienciabodega']+0	;
											$horastrabajadas[$i]=$ancho[$i]['horasta']+0	;
											$i=$i+1;
													}
	  return array(
					'nombrebarco'=>$ancho[0]['nomep'],
					'fechas'=>$fechas, //las absicas
					'pescas'=>$pescas, //para guardar la pesca descragada
					'combustibles'=>$combustibles, //para guardar los petroleso consumidos 
					'combustibleporhora'=>$combustiblesporhora, //petrole por hora 
					'combustibleportonelada'=>$combustibleportonelada,//petroleo por hora 
					'eficiencias'=>$eficiencias,//eficiencias de bodega 
					'horastrabajadas'=>$horastrabajadas,//hora trabajadas 
					);
					
					}else {
					return null;
					}
	 */
	
	//$matrizstockalmacenes= Yii::app()->db->createCommand('select sum(stocktotal) as stock,codalm,codcen  from Vw_alinventario_resumen group by codalm, codcen ')->queryAll();
	$matrizstockcentros=Yii::app()->db->createCommand('select sum(stocktotal) as stock,codcen from Vw_alinventario_resumen group by  codcen ')->queryAll();
	$matrizstocktotal=Yii::app()->db->createCommand('select sum(stocktotal) as stock from Vw_alinventario_resumen ')->queryAll();
	
	for ($i=0; $i < count($matrizstockcentros); $i++) { 
	              $almacenesf=Yii::app()->db->createCommand("select distinct codalm  from Vw_alinventario_resumen where codcen='".$matrizstockcentros[$i]['codcen']."' order by codalm asc")->queryAll();
			      $stocksf=Yii::app()->db->createCommand("select sum(stocktotal) as stock , codalm  from Vw_alinventario_resumen where codcen='".$matrizstockcentros[$i]['codcen']."' group by codalm order by codalm asc")->queryAll();
			  
						 $almacenes=array();
						   $stocks=array();
						   for ($k=0; $k < count($almacenesf); $k++) { 
											array_push($almacenes, $almacenesf[$k]['codalm']);
											array_push($stocks, round($stocksf[$k]['stock'],1)+0);
										}
			 
		         $this->render('vw_indicador_por_centro',array(
			  'nombrecentro'=>$matrizstockcentros[$i]['codcen'],
				'almacenes'=>$almacenes,
				'stocks'=>$stocks,
			    'stockcentro'=>$matrizstockcentros[$i]['stock'],
			  'stocktotal'=>$matrizstocktotal[0]['stock'],
			  )
			                   );
							  
		  }
		 } 
	/*  $matriz=VwAlinventarioResumen::Model()->findall();
	  echo count($matriz);
	  echo array_sum($matriz[0]);
	           //matriz por centro 
	//  $matrizcentro=array_column($matriz,6);
	
	
		//$this->render('vw_indicador_por_centro');
		*/
	
	
	
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Alinventario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alinventario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alinventario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alinventario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPronostica()
	{
         $id=(int)$_POST['id'];
		$codmo=(int)$_POST['codmo'];

		var_dump($id);
		echo "<br>";
		var_dump($codmo);
		echo "<br>";

          $id=(int)MiFactoria::cleanInput($id);
		$modinventario=  $this->loadModel($id);
		$datosparagrafico=$modinventario->pronostico($codmo);
		//var_dump($datosparagrafico);

		echo $this->renderpartial ("vw_pronosticografico",array('model'=>$modinventario,'datosparagrafico'=>$datosparagrafico),true);

	}

	public function actionsupervision(){
		$model=new VwStockSupervision('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VwStockSupervision'])){
		//var_dump($_GET['VwStockSupervision']);	die();
                    $model->attributes=$_GET['VwStockSupervision'];
		}
		if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
			$this->exportCSV($model->search(), array(
					'id','codalm','codcen','cantlibre','ubicacion','desum','um',
					'codart','descripcion','cantlibre','cantres','canttran','punit','lote',
				)
			);
		} else {
			$this->render('supervision',array(
				'model'=>$model,
			));
		}
          }


	public function actionCrealote(){


	}

	public function actionmuestrakardex($id){
		$id=MiFactoria::cleanInput($id);
	$modeloinv=$this->loadModel($id);
			$proveedor=VwKardex::model()->search_pormaterial($modeloinv->codcen,$modeloinv->codalm,$modeloinv->codart);
			$this->layout = '//layouts/iframe';
			$this->render('_kardex',array(
				'proveedor'=>$proveedor,'modelo'=>$modeloinv
			));


	}

	public function actionupdateubicacion(){
		$xubicacion = (string)MiFactoria::cleanInput($_POST['codubicacion']);
		$id = (integer)MiFactoria::cleanInput($_POST['id']);
		$modelo=$this->loadModel($id);
		$modelo->setScenario('cambiaubicaciones');
		$modelo->ubicacion=$xubicacion;
		if($modelo->save()){
			$mensaje="Se actualizó la ubicacion sin problemas";
			echo $this->renderpartial("//site/mensajeok",array('mensaje'=>$mensaje));
		} else {
			$mensaje="Hubo errores  : ".yii::app()->mensajes->getErroresItem($modelo->geterrors());
			echo $this->renderpartial("//site/mensajeerror",array('mensaje'=>$mensaje));
		}
		unset($modelo);
	}


	public function actionkpirotacion(){
		$model=New Alinventario("KPI_ROT");
		if(isset($_POST['Alinventario']))
		{
			$model->attributes=$_POST['Alinventario'];
			if($model->validate())
			{

			}
		}

		$this->render('kpi_rot',array(
			'model'=>$model,
		));
	}

	public function actionconteofisico($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$hidpadre=(integer)MiFactoria::cleanInput($_GET['hidpadre']);
		$modeloinv=$this->loadModel($id);
		if ($modeloinv===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
		$model=new Inventariofisico();
		$model->setScenario('insert');
		if(isset($_POST['Inventariofisico']))
		{
			$model->attributes=$_POST['Inventariofisico'];

			if($model->save()) {
				if (!empty($_GET['asDialog'])) {
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-gridx');
																		");
					Yii::app()->end();
				}else{
					print_r($model->geterrors());die();
				}
			}
			//$this->redirect(array('view','id'=>$model->n_guia));
		}

		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';

		$this->render('_form_conteo',array(
			'model'=>$model, 'modelocabeza'=>$modeloinv,
		));
	}
	public function actioneditaconteofisico($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$model=Inventariofisico::model()->findByPk($id);
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos'.$id);
		$model->setScenario('insert');
		if(isset($_POST['Inventariofisico']))
		{
			$model->attributes=$_POST['Inventariofisico'];

			if($model->save()) {
				if (!empty($_GET['asDialog'])) {
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('conteo-grid');
																		");
					Yii::app()->end();
				}else{
					print_r($model->geterrors());die();
				}
			}
			//$this->redirect(array('view','id'=>$model->n_guia));
		}

		if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
		$modeloinv=$model->inventario;
		$this->render('_form_conteo',array(
			'model'=>$model, 'modelocabeza'=>$modeloinv,
		));
	}

	public function actionajuste($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$model=Inventariofisico::model()->findByPk($id);
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
		$modeloinv=$model->inventario;
		//verioficando la operacion contable
		if($model->diferencia >0 ){  ///SOBRANTES
			$operacion='301';
			$movimiento='75';
		}
		if($model->diferencia ==0 ){
			throw new CHttpException(404,'El ajuste no aplica, no existen diferencias');
		}
		if($model->diferencia <0 ){ //FALTANTES
			$operacion='300';
			$movimiento='67';
		}
		if(yii::app()->hasModule('contabilidad')){
			$transaccion=$model->dbConnection->beginTransaction();
			if($model->codestado=='20'){
				throw new CHttpException(500,'Esta diferencia ya esta ajustada contablemente ');
				//Si no se trata de una reversa
			}else{
				$model->setScenario('ajuste');
				if(isset($_POST['Inventariofisico']))
				{
					$model->attributes=$_POST['Inventariofisico'];
					$model->codestado='20';
					if($model->save()) {
						///AHORA NOS TOCA REGISTRAR EL KARDEX DEL MATERIAL
						//Obteniendo el ID del val primero
						$vale=Alinventario::creavaleajuste($movimiento,$model->inventario->codalm,$model->inventario->codcen)->id;
						$signo=Almacenmovimientos::model()->findByPk($movimiento)->signo;
						//CREADNO EL KARDEX
						$nuevokardex=New Alkardex();
						$nuevokardex->SetAttributes(
							array(
								'codart'=>$model->inventario->codart,
								'codmov'=>$movimiento,
								'cant'=>$signo*abs($model->diferencia), //obenener le signo correcto
								'alemi'=>$model->inventario->codalm,
								'fecha'=>date('Y-m-d H:i:s'),
								'um'=>$model->inventario->maestro->um,
								'codocuref'=>'400',
							'codcentro'=>$model->inventario->codcen,
								'hidvale'=>$vale,
								'fechadoc'=>date('Y-m-d H:i:s'),
								'preciounit'=>$model->monto,
								'codmoneda'=>$model->inventario->almacen->codmon,
							)
						);
						//$nuevokardex->save();
						if(!$nuevokardex->save()){
							//echo yii::app()->mensajes->getErroresItem($nuevokardex->geterrors());die();
							MiFactoria::Mensaje('error',yii::app()->mensajes->getErroresItem($nuevokardex->geterrors()));
						}
						if(yii::app()->user->hasFlash('error')){
							$transaccion->rollback();
							if (!empty($_GET['asDialog']))
								$this->layout = '//layouts/iframe';
							$this->render('_form_ajuste',array(
								'model'=>$model, 'modelocabeza'=>$modeloinv,
							));

						}else{
							$transaccion->commit();
							MiFactoria::Mensaje('success','Se realizo el ajuste ocn exito');
							echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('detalle-gridx');
																		");



							Yii::app()->end();
						}





						//MiFactoria::Mensaje('success','Se realizo el ajuste con exito');
					}else{

						MiFactoria::Mensaje('error',yii::app()->mensajes->getErroresItem($model->geterrors()));
						$transaccion->rollback();
						if (!empty($_GET['asDialog']))
							$this->layout = '//layouts/iframe';
						$this->render('_form_ajuste',array(
							'model'=>$model, 'modelocabeza'=>$modeloinv,
						));
					}
				} else{
					//colocando las cuentas predeterminadas
					$model->cuentadebe=Detercuentas::getCuenta($model->inventario->maestrodetalle->catval,$operacion,'D');
					$model->cuentahaber=Detercuentas::getCuenta($model->inventario->maestrodetalle->catval,$operacion,'H');
					if (!empty($_GET['asDialog']))
						$this->layout = '//layouts/iframe';
					$this->render('_form_ajuste',array(
						'model'=>$model, 'modelocabeza'=>$modeloinv,
					));
				}

			}

		}else{
			throw new CHttpException(404,'No se puede realizar esta operacion el modulo de contabilidad no esta activo ');
		}


	}

	public function actionrevertirajuste($id){
		$id=(integer)MiFactoria::cleanInput($id);
		$model=Inventariofisico::model()->findByPk($id);
		if ($model===null)
			throw new CHttpException(404,'No se encontro ningun documento para estos datos');
		$modeloinv=$model->inventario;
		//verioficando la operacion contable
		if($model->diferencia >0 ){  ///SOBRANTES
			$operacion='301';
			$movimiento='19'; //opuesto a 75
		}
		if($model->diferencia ==0 ){
			throw new CHttpException(404,'El ajuste no aplica, no existen diferencias');
		}
		if($model->diferencia <0 ){ //FALTANTES
			$operacion='300';
			$movimiento='18'; //opesto a 67
		}
		if(yii::app()->hasModule('contabilidad')){
			if($model->conteopadre->codestado=='10') {
				$transaccion = $model->dbConnection->beginTransaction();
				if ($model->codestado <> '20') {
					throw new CHttpException(500, 'Este conteo no puede ser revertido ');
					//Si no se trata de una reversa


				} else {
					$model->setScenario('ajuste');
					$model->codestado = '10';
					if ($model->save()) {
						///AHORA NOS TOCA REGISTRAR EL KARDEX DEL MATERIAL
						//Obteniendo el ID del val primero
						$vale = Alinventario::creavaleajuste($movimiento, $model->inventario->codalm, $model->inventario->codcen)->id;
						$signo = Almacenmovimientos::model()->findByPk($movimiento)->signo;
						//CREADNO EL KARDEX
						$nuevokardex = New Alkardex();
						$nuevokardex->SetAttributes(
							array(
								'codart' => $model->inventario->codart,
								'codmov' => $movimiento,
								'cant' => $signo * abs($model->diferencia), //obenener le signo correcto
								'alemi' => $model->inventario->codalm,
								'fecha' => date('Y-m-d H:i:s'),
								'um' => $model->inventario->maestro->um,
								'codocuref' => '400',
								'codcentro' => $model->inventario->codcen,
								'hidvale' => $vale,
								'fechadoc' => date('Y-m-d H:i:s'),
								'preciounit' => $model->monto,
								'codmoneda' => $model->inventario->almacen->codmon,
							)
						);
						//$nuevokardex->save();
						if (!$nuevokardex->save()) {
							//echo yii::app()->mensajes->getErroresItem($nuevokardex->geterrors());die();
							MiFactoria::Mensaje('error', yii::app()->mensajes->getErroresItem($nuevokardex->geterrors()));
						}
						//MiFactoria::Mensaje('success','Se realizo el ajuste con exito');
					} else {
						print_r($model->geterrors());
						die();
					}

					//ya no se neceista colocar la cuentas ya las tiene
					//$model->cuentadebe=Detercuentas::getCuenta($model->inventario->maestrodetalle->catval,$operacion,'D');
					//$model->cuentahaber=Detercuentas::getCuenta($model->inventario->maestrodetalle->catval,$operacion,'H');

				}
				if (yii::app()->user->hasFlash('error')) {
					$transaccion->rollback();
				} else {
					$transaccion->commit();
					MiFactoria::Mensaje('success', 'Se realizo el ajuste ocn exito');
				}

			}else{
				throw new CHttpException(500,'No se puede realizar esta operacion , el conteo está cerradp o anulado ');
			}
		}else{
			throw new CHttpException(404,'No se puede realizar esta operacion el modulo de contabilidad no esta activo ');
		}


	}




	/*public function actionajuste($id){
		if(yii::app()->request->isAjaxRequest){
			$id=(integer)MiFactoria::cleanInput($id);
			$registro=Inventariofisico::model()->findByPk($id);
			if(is_null($registro))
				throw new CHttpException(404,'No se encontraron datos para este registro ');



		}else{
			throw new CHttpException(404,'No se puede invocar esta funcion directamente ');
		}

	}*/

	public function actionpintarotacion(){
		if(yii::app()->request->isAjaxRequest){
			$id=MiFactoria::cleanInput($_GET['id']);
			$model=$this->loadModel($id);
			$fechaini=$_GET['fechaini'];
			$fechafin=$_GET['fechafin'];
			if(preg_match('/^\d{4}-\d{2}-\d{2}$/',$fechaini)>0 and
				preg_match('/^\d{4}-\d{2}-\d{2}$/',$fechafin)>0 )
			{
				echo "rotacion   ".$model->rotacionmaterial($fechaini,$fechafin);
			}
		}


	}

	private function cargalote($idlote){
		$idlote=(integer)MiFactoria::cleanInput($idlote);
		$reglote=Lotes::model()->findByPk($idlote);
		if(is_null($reglote))
			throw new CHttpException(404,'No se encotro el registro del lote para este id '.$idlote);
		return $reglote;
	}

	public function actionordenlotesube1($idlote){
		$idlote=$_GET['idlote'];
		$lote=$this->cargalote($idlote);
		//si este registro tiene un solo lote activo
		$numerolotes=$lote->inventario->numerolotes;
		if( $numerolotes > 1) {
			if ((IN_ARRAY($lote->inventario->detallesmaterial()['controlprecio'], ARRAY('F', 'L')))) {
				if ($lote->inventario->detallesmaterial()['controlprecio'] == 'L')
					$registroshijos = $lote->inventario->loteslifo;
				if ($lote->inventario->detallesmaterial()['controlprecio'] == 'F')
				$registroshijos = $lote->inventario->lotesfifo;

				$transaction = Yii::app()->db->beginTransaction();
				$lotepuntero = $registroshijos[0];
				//$lotecolero=$lote->inventario->loteslifo[$numerolotes-1];
				if ($lotepuntero->orden <> $lote->orden) { //si no esta untero entondces subirlo , o intercambiar le orden hacia ariba
					echo "www2;";
					foreach ($registroshijos as $clave=>$fila) {
						if ($fila->orden == $lote->orden) //esta es la ubicaciaon		{
						{
							$loteanterior = $registroshijos[$clave - 1];
							var_dump($registroshijos);
							var_dump($loteanterior);
							$lote->setScenario('orden');
							$loteanterior->setScenario('orden');
							$lote->orden = $loteanterior->orden;
							$loteanterior->orden = $fila->orden;
							$loteanterior->save();
							$lote->save();
							BREAK;
						}

					}
				}
				$transaction->commit();
			}
		}
		}


	public function actionordenlotebaja1($idlote){
		$idlote=$_GET['idlote'];
		$lote=$this->cargalote($idlote);
		//si este registro tiene un solo lote activo
		$numerolotes=$lote->inventario->numerolotes;
		if( $numerolotes > 1) {

			if ((IN_ARRAY($lote->inventario->detallesmaterial()['controlprecio'], ARRAY('F', 'L')))) {
				if ($lote->inventario->detallesmaterial()['controlprecio'] == 'L')
					$registroshijos = $lote->inventario->loteslifo;
				if ($lote->inventario->detallesmaterial()['controlprecio'] == 'F')
					$registroshijos = $lote->inventario->lotesfifo;
				$transaction = Yii::app()->db->beginTransaction();
				$lotecolero = $registroshijos[$numerolotes-1];
			//	var_dump($lotecolero->orden);				var_dump($lote->orden);

				//$lotecolero=$lote->inventario->loteslifo[$numerolotes-1];
				if ($lotecolero->orden > $lote->orden) { //si no esta colero entondces bajarlo , o intercambiar le orden hacia ariba

					foreach ($registroshijos as $clave=>$fila) {
						if ($fila->orden == $lote->orden) //esta es la ubicaciaon
						{
							$loteposterior = $registroshijos[$clave +1];
							var_dump($loteposterior->orden);
							var_dump($fila->orden);
							$lote->setScenario('orden');
							$loteposterior->setScenario('orden');
							$lote->orden = $loteposterior->orden;
							$loteposterior->orden = $fila->orden;
							if($loteposterior->save())echo "grabo posterior  ".$loteposterior->id." - ".$loteposterior->orden."<br>";
							if($lote->save())echo "grabo actual  ".$lote->id." - ".$lote->orden."<br>";
							BREAK;
						}

					}

				}
				$transaction->commit();

			}
		}
	}


public function  actioncolocaloteprimero($idlote)
{
	$idlote=$_GET['idlote'];
	$lote = $this->cargalote($idlote);
	//si este registro tiene un solo lote activo
	$numerolotes = $lote->inventario->numerolotes;
	if ($numerolotes > 1) {
		if ((IN_ARRAY($lote->inventario->detallesmaterial()['controlprecio'], ARRAY('F', 'L')))) {
			if ($lote->inventario->detallesmaterial()['controlprecio'] == 'L')
				$registroshijos = $lote->inventario->loteslifo;
			if ($lote->inventario->detallesmaterial()['controlprecio'] == 'F')
				$registroshijos = $lote->inventario->lotesfifo;


		$transaction = Yii::app()->db->beginTransaction();
		$arrayorden = array();
		foreach ($registroshijos as $fila) {
			$arrayorden[] = $fila->orden;
		}
		$ubicacion = array_search($lote->orden, $arrayorden);
		$ordenpuntero=$registroshijos[0]->orden;
		$arrayaux = array();
		//$arrayaux[0] = $lote->orden;
		foreach ($arrayorden as $clave => $valor) {
			if($clave < $ubicacion){
				$arrayaux[]=$arrayorden[$clave+1];
			}
			if ($clave == $ubicacion){
				$arrayaux[] =$ordenpuntero ;
			}
			if ($clave > $ubicacion){
				$arrayaux[] =$valor ;
			}

		}

		$i = 0;
			print_r($arrayaux);
		//$lote->orden = $registroshijos[0]->orden;
		foreach ($registroshijos as $fila) {
			$fila->setScenario('orden');
			$fila->orden = $arrayaux[$i];
			if($fila->save()) echo "grabo   ".$fila->id."   -    ".$fila->orden."<br>";
			$i += 1;
		}
		//$lote->save();

		$transaction->commit();

		}
	}
}


	public function  actioncolocaloteultimo($idlote)
	{
		$idlote=$_GET['idlote'];
		$lote = $this->cargalote($idlote);
		//si este registro tiene un solo lote activo
		$numerolotes = $lote->inventario->numerolotes;
		if ($numerolotes > 1) {
			if ((IN_ARRAY($lote->inventario->detallesmaterial()['controlprecio'], ARRAY('F', 'L')))) {
				if ($lote->inventario->detallesmaterial()['controlprecio'] == 'L')
					$registroshijos = $lote->inventario->loteslifo;
				if ($lote->inventario->detallesmaterial()['controlprecio'] == 'F')
					$registroshijos = $lote->inventario->lotesfifo;
				$transaction = Yii::app()->db->beginTransaction();
				$arrayorden = array();
				foreach ($registroshijos as $fila) {
					$arrayorden[] = $fila->orden;
				}
				$ordenultimo=$registroshijos[$numerolotes-1]->orden;
				$ubicacion = array_search($lote->orden, $arrayorden);
				$arrayaux = array();
				foreach ($arrayorden as $clave => $valor) {
					if ($clave < $ubicacion){
						$arrayaux[] = $valor;
					}
					if ($clave == $ubicacion){
						$arrayaux[] = $ordenultimo;
					}
					if ($clave > $ubicacion){
						$arrayaux[] = $arrayorden[$clave-1];
					}

				}
				//$arrayaux[$numerolotes - 1] = $lote->orden;
				print_r($arrayaux);
				$i = 0;

				foreach ($registroshijos as $fila) {
					$fila->setScenario('orden');
					$fila->orden = $arrayaux[$i];
					$fila->save();
					$i += 1;
				}
			//	$lote->save();

				$transaction->commit();

			}

		}



	}

public function actioneditalote($id){
	$model=$this->cargalote($id);
	$model->setScenario('update');

	if(isset($_POST['Lotes']))
	{
		$model->attributes=$_POST['Lotes'];
		$model->save();
		//var_dump($_POST['Lotes']);
		//var_dump($model->attributes);die();
		if (!empty($_GET['asDialog']))
		{
			yii::app()->user->setFlash('success','Se modificó el Lote');
			//Close the dialog, reset the iframe and update the grid
			echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
																		window.parent.$.fn.yiiGridView.update('alkardex-griggdXX');
																		");

			Yii::app()->end();
		}
	}


			if (!empty($_GET['asDialog']))
			$this->layout = '//layouts/iframe';
				$this->render('_form_lote',array(
					'model'=>$model,
				));

}


}
