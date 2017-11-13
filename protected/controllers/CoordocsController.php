<?php
/***********************************************************
 * Consideraciones:
 * La libreia MPDF, SE CUELGA CUANDO ENCUENTRA CAMPOS VACIOS EN LOS 
 * VALORES DE LOS DIVS DE LA CADENA HTML A PINTAR; POR ESO SE HA
 * COLOCADO LA SIGUIENTE SENTENCIA EN LA FUNCION CABECERA ()
 * IF(TRIM($VALOR!==))  ECHO CHTML "DIV...
 * 
 * 
 * 
 * 
 * 
 */

CONST ESTILO_POSICION_ABSOLUTA=" position:absolute; "; 

class CoordocsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	public $rutaestilos=null;

	public function __construct() {
		parent::__construct($id='coordocs',Null);
		if(is_dir(Yii::app()->getTheme()->basePath.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'reportes'))
			$this->rutaestilos=Yii::app()->getTheme()->basePath.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'reportes';
          if(is_null($this->rutaestilos))
			  throw new CHttpException(500,' No se ha definido el directorio de los estilos para los reportes');
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('hacereporte','cargacampos','creadetalle','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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


	private function sumaarray($arraybase,$arrayaincremento){
		foreach($arrayaincremento as $claveinc=>$valorinc){
			$arraybase[$claveinc]+=$valorinc;
		}
		return $arraybase;
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Coordocs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Coordocs']))
		{
			$model->attributes=$_POST['Coordocs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
   private function insertahijo($codocu,$id,$modeloareportar,$columna){
	   /*var_dump($columna);
	   yii::app()->end();*/
	   $nombrecampo=trim($columna->name);
	   $registrohijito=New Coordreporte();
	   $valores=array(
		     'codocu'=>$codocu,
		   'left_'=>0,
		   'top'=>0,
		   'font_size'=>8,
		   'font_family'=>'arial',
		   'font_weight'=>'bold',
		   'font_color'=>'#000',
		   'nombre_campo'=>$nombrecampo,
		   'lbl_left'=>0,
		   'lbl_top'=>0,
		   'lbl_font_size'=>8,
		   'lbl_font_family'=>'arial',
		   'visiblelabel'=>'0',
		   'lbl_font_color'=>'#000',
		   'visiblecampo'=>'0',
		   'hidreporte'=>$id,
		   'aliascampo'=>trim($modeloareportar->getAttributeLabel($nombrecampo)),
		    'longitudcampo'=>$columna->size,
		   'tipodato'=>$columna->dbType,




   );
	   $registrohijito->setAttributes($valores);
	   $registrohijito->save();

   }

    private function insertahijofalso($codocu,$id,$nombre){
        /*var_dump($columna);
        yii::app()->end();*/
        $nombrecampo=trim($columna->name);
        $registrohijito=New Coordreporte();
        $valores=array(
            'codocu'=>$codocu,
            'left_'=>0,
            'top'=>0,
            'font_size'=>8,
            'font_family'=>'arial',
            'font_weight'=>'bold',
            'font_color'=>'#000',
            'nombre_campo'=>$nombre,
            'lbl_left'=>0,
            'lbl_top'=>0,
            'lbl_font_size'=>8,
            'lbl_font_family'=>'arial',
            'visiblelabel'=>'0',
            'lbl_font_color'=>'#000',
            'visiblecampo'=>'0',
            'hidreporte'=>$id,
            'aliascampo'=>$nombrecampo,
            'longitudcampo'=>40,
            'tipodato'=>'VARCHAR(40)',
        );
        $registrohijito->setAttributes($valores);
        $registrohijito->save();

    }




	public function cabecera($filamuestracabecera,$proveedorestilos,$modelo=null){

		$HTML_cabecera="";
      // echo  var_dump($filamuestracabecera->repfechatraslado); yii::app()->end();
		/*var_dump($proveedordatos->getData());
		yii::app()->end();
		$filamuestra=$proveedordatos[0]; *////Una muestra de filas solo para sacar los datos de la cabecera
		foreach( $proveedorestilos as $record) {
			if ( ! $record->esdetalle == '1' ) {  //si es un campo de cabecera
				// var_dump($record);
				$cadena = ESTILO_POSICION_ABSOLUTA;
				$cadenalabel = ESTILO_POSICION_ABSOLUTA;
				$arraycamposatributos=array(
					'left_',
					'top',
					'font_size',
					'font_family',
					'font_weight',
					'font_color',
					'lbl_left',
					'lbl_top',
					'lbl_font_size',
					'lbl_font_family',
					'lbl_font_weight',
					'lbl_font_color',
				);
                                //var_dump($record->attributes);die();
				foreach ( $record->attributes as $clave => $valor ) //RECORRIEDNO LOSD CAMPOS HORIZOTALMENTE

				{
					if (in_array($clave,$arraycamposatributos) )//PERO RTENER CUIDADO QUE HAY CAMPOS QUE NO SE METEN EN LA CHICHA
					{
						if ( substr ( $clave , 0 , strpos ( $clave , "_" ) ) == "lbl" ) //RECIRDAR QUE LOS CAMPOS
							//DE LAS ETIQUETAS COMIENZAN CON "LBL_"
						{
							$clave = str_replace ( "lbl_" , "" , $clave );//QUITAR EL PREFIJO X EJ "LB_TOP" => "TOP";
							$clave = str_replace ( "_" , "-" , $clave );//REEMPLAZAR  EL "_" por "-" , ya que los nombre de los campos no puedieron nombrarse con el -;
                            /***********   mofiivaiones   razzo  ******/
                           if(!(strpos($clave,'left')===false))
                            {
                               $lon=(strpos($valor,'px')===false)?strlen($valor):strpos($valor,'px');
                                $valor=(integer)substr($valor,0,$lon)+(integer)$modelo->xgeneral;
                                $valor=$valor.'px';
                           // var_dump($clave);var_dump($valor);yii::app()->end();
                            }
                            if(!(strpos($clave,'top')===false))
                            {
                                $lon=(strpos($valor,'px')===false)?strlen($valor):strpos($valor,'px');
                                $valor=(integer)substr($valor,0,$lon)+(integer)$modelo->ygeneral;
                                $valor=$valor.'px';
                            }

                            /*********** fin   mofiivaiones   razzo  ******/

                            $cadenalabel .= " " . $clave . ":" . $valor . "; "; //ASIGNAR EL ESTILO  XEJ   font-size=8px;

						} else {
							if($clave=='left_'){
								$clave = str_replace ( "_" , "" , $clave );
							}else{
								$clave = str_replace ( "_" , "-" , $clave );//REEMPLAZAR  EL "_" por "-" , ya que los nombre de los campos no puedieron nombrarse con el -;

							}
                            /***********   mofiivaiones   razzo  ******/
                            if(!(strpos($clave,'left')===false))
                            {
                                $lon=(strpos($valor,'px')===false)?strlen($valor):strpos($valor,'px');
                                $valor=(integer)substr($valor,0,$lon)+(integer)$modelo->xgeneral;
                                $valor=$valor.'px';
                                // var_dump($clave);var_dump($valor);yii::app()->end();
                            }
                            if(!(strpos($clave,'top')===false))
                            {
                                $lon=(strpos($valor,'px')===false)?strlen($valor):strpos($valor,'px');
                                $valor=(integer)substr($valor,0,$lon)+(integer)$modelo->ygeneral;
                                $valor=$valor.'px';
                            }
                            /*********** fin  mofiivaiones   razzo  ******/

							$cadena .= " " . $clave . ":" . $valor . "; ";
							//$cadena .= str_replace ( "font-color" , "color" , $clave );
						}
					}
				}
				$cadena = str_replace ( "font-color" , "color" , $cadena );
				$cadenalabel = str_replace ( "font-color" , "color" , $cadenalabel );

                /***********   mofiivaiones   razzo  ******/
                if(!(strpos($record->tipodato,'text')===false)){
                   // $cadena.=' width:'.($record->longitudcampo<=0)?'10px':$record->longitudcamp.'px; ';
                }
                /***********  fin   mofiivaiones   razzo  ******/


				//  echo  $record->getAttributeLabel($record->nombre_campo)."  :   ".$modelo->{$record->nombre_campo}."<br>";
				if ( $record->visiblelabel == '1' )
					$HTML_cabecera .= CHtml::tag ( "div" , array ( "style" => $cadenalabel ) , $record->aliascampo , true );
				//$HTML_cabecera .="<div style='".$cadenalabel."'> ".$filamuestracabecera->getAttributeLabel ( $record->nombre_campo ) ."</div>";
				//echo CHtml::tag("div",array("style"=>$cadenalabel),$modelo->getAttributeLabel($record->nombre_campo) ,true);
				if ( $record->visiblecampo == '1' )
				{
					$valorcampo=($record->nombre_campo=='iduser')?strtoupper(Yii::app()->user->um->loadUserById($filamuestracabecera->{$record->nombre_campo},false)->username):$filamuestracabecera->{$record->nombre_campo};
					if(!(trim($valorcampo)==""))
                                        $HTML_cabecera .= CHtml::tag ( "div" , array ( "style" => $cadena ) , $valorcampo , true );

				}
					//$HTML_cabecera .="<div style='".$cadena."'> ".$filamuestracabecera->getAttributeLabel ( $record->nombre_campo ) ."</div>";

				//echo CHtml::tag("div",array("style"=>$cadena),$modelo->{$record->nombre_campo} ,true);
				// echo "  Este es el campo : ".$record->nombre_campo."  <br>";
				//break;   ///solo basta con chpara el primer registro porque osn datos de cabecera

			}
		}
		//$HTML_cabecera.=CHtml::tag ( "div" , array ( "style" => $cadena." top:".$modelo->ylogo.";  left:".$modelo->xlogo.";  "  ) , CHTml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.yii::app()->params['imgreportes'].$modelo->id.".JPG") , true );
               // return "";
                

		return $HTML_cabecera;
		}



	///GENERA LAS COLUMNAS DEL GRID
public function makeColumnas($proveedorestilo,$amontobase,$amontoagregado,$idreporte){
	$arraycolumnas=array();

  // $totalesuma=$proveedordatos->Total();
	/*var_dump($amontobase);
	yii::app()->end();*/
	$camposadosables=Coordreporte::adosables($idreporte); //	Obtiene los campos
	//que alojan un campo de texto u otro valor para concatenar en la misma celda del GRID
	// pej      array('descripcion'=>'comentario', 'preciounitario'=>'comentario2', ...etc)
	foreach( $proveedorestilo as $registroestilo)
	{


		     if(($registroestilo->esdetalle+0) > 0)
		   {
			  // foreach( $proveedordatos->getData() as $recorde)
			   		//{
			  // print_r($camposadosables);yii::app()->end();
			  //$arreglotextos=array('htmlOptions'=> array ( 'width' => $registroestilo->longitudcampo*5 ));
			  $arreglopropiedades=array(
				  'name'=>$registroestilo->nombre_campo,
				  'header'=>$registroestilo->aliascampo,
				  'type'=>'raw',
				 // array_keys($arreglotextos)=>array_values($arreglotextos),
				  //'value'=>'is_numeric($data->'.$registroestilo->nombre_campo.')?MiFactoria::decimal($data->'.$registroestilo->nombre_campo.',2):$data->'.$registroestilo->nombre_campo.'',
				  //'footer'=>(in_array($registroestilo->nombre_campo,array_keys($amontobase)))? ($amontobase[$registroestilo->nombre_campo]+$amontoagregado[$registroestilo->nombre_campo]).'':'',
				  'footer'=>($registroestilo->totalizable=='1')? MiFactoria::decimal(($amontobase[$registroestilo->nombre_campo]+$amontoagregado[$registroestilo->nombre_campo])).'':'',
				  //'footer'=>
				  'htmlOptions'=> array ( 'width' => $registroestilo->longitudcampo*5 ),
				  'footerHtmlOptions'=>array('class' =>'piegrid'),
			  );
			   if($registroestilo->esnumerico=='1'){
				   $arreglopropiedades['value']='MiFactoria::decimal($data->' . $registroestilo->nombre_campo.',2)';

			   }

			   IF(in_array($registroestilo->nombre_campo ,array_keys($camposadosables)))
			   {
				   //$arreglotextos = array('value' => '$data->' . $registroestilo->nombre_campo . '.CHtml::tag("<br>").$data->' . $camposadosables[$registroestilo->nombre_campo] . '');
				 // if($registroestilo->{})
                   /***********   mofiivaiones   razzo  ******/
				    $arreglopropiedades['value']='$data->' . $registroestilo->nombre_campo .'.CHtml::tag("br").CHtml::openTag("span",array("style"=>"font-size:'.$registroestilo->font_size.'px;")).$data->'.$camposadosables[$registroestilo->nombre_campo].'.CHtml::closeTag("span")';
                   /***********  fin  mofiivaiones   razzo  ******/
			   }
			   $arraycolumnas[ ] =$arreglopropiedades ;


		   }
	}
	//$arraycolumnas['footerHtmlOptions']=array('style' =>" font-size:12px;");
	/*print_r($arraycolumnas);
	yii::app()->end();*/
return array_values($arraycolumnas);
}



	public function actionhacereporte($id,$idfiltrodocu,$file=0){ //id del reporte y el ID del modelo a reportar
              // $tiempo=time();
		//echo "skdks";
            $this->layout="";
		$id=MiFactoria::cleanInput((int)$id);
		$idfiltrodocu=MiFactoria::cleanInput((int)$idfiltrodocu);
		$modelo=$this->loadModel($id);
		$nombremodelo=$modelo->modelo;
               
		//VAR_DUMP($modelo->tienecabecera);DIE();
		///////////////////////////////////////////////////////
		///sancao el numero de paginas
		$criterio=New CDbCriteria;
		$criterio->addCondition($modelo->campofiltro."=:vidifiltrodocu");
		$criterio->params=ARRAY(":vidifiltrodocu"=>$idfiltrodocu);
		$proveedordatos=new Miproveedor($nombremodelo,array('pagination' => false,"criteria"=>$criterio));
        $filasdatos=$proveedordatos->getdata();
        
        //echo "  Teimpo pasado getsdata 358: ".(time()-$tiempo)."<br>";
        
       // var_dump($filasdatos);die();
       //cabec echo "filadatos";var_dump($filadatos);die();
		$filamuestracabecera=$filasdatos[0]; ///una fila de datos para la cabcerea
		$registrostotales=count($filasdatos);
		$numeropaginas=ceil($registrostotales/$modelo->registrosporpagina);
		//$numeropaginas=3;
		$proveedorestilo=$modelo->hijos;
		$proveedordatos->camposasumar=Coordreporte::totalizables($id);
              //echo "  Teimpo pasado getsdata 370: ".(time()-$tiempo)."<br>"; 
		$mpdf=Yii::app()->ePdf->mpdf(
			'',trim($modelo->tamanopapel));
                 $mpdf->useSubstitutions=false; 
                 $mpdf->simpleTables = true;
                 $mpdf->packTableData = true;
                //echo "  Teimpo pasado getsdata 373: ".(time()-$tiempo)."<br>";
        $hojaestilo='';
         //var_dump($mpdf);die();
		if(!is_null($modelo->estilo)) {
			$hojaestilo = file_get_contents ( $this->rutaestilos . DIRECTORY_SEPARATOR . $modelo->estilo );
			//$hojaestilo=file_get_contents('themes/abound/css'.DIRECTORY_SEPARATOR.'estilovale.css');
			//$mpdf->WriteHTML ( $hojaestilo , 1 );
                        
		}
		$mpdf->pagenumPrefix = 'Página  ';
		$mpdf->pagenumSuffix = ' ';
		$mpdf->nbpgPrefix = ' de  ';
		$mpdf->nbpgSuffix = '';
		if($modelo->tienepie=='1')
		$mpdf->SetFooter('Usuario   :  '.yii::app()->user->um->loadUserById(yii::app()->user->id)->username.'|'.date("d-m-Y   H : i : s").'|{PAGENO}{nbpg}');
		$mpdf->SetDisplayMode('fullpage');
  /*echo var_dump($proveedordatos);
		yii::app()->end();*/
	//	$arraycamposasumar=array('subto','cant');
		$amontobase=array();
		/*foreach($arraycamposasumar as $mclave => $mvalor){
			$amontobase[$mvalor]=0;
		}*/
      //echo $this->cabecera($filamuestracabecera,$proveedorestilo,$modelo);die();
		//var_dump($numeropaginas);die();
                // echo "  Teimpo pasado getsdata 398: ".(time()-$tiempo)."<br>"; 
$cadena="";
	//var_dump($numeropaginas	);die();
for($i = 1; $i <= $numeropaginas; $i++)
		   {
                // echo "  Teimpo pasado getsdata402: ".(time()-$tiempo)."<br>"; 
			    $criterioporpagina=New CDbCriteria;
			  // $criterioporpagina->addCondition($modelo->campofiltro."=:vidifiltrodocu  ");
			   $criterioporpagina->addCondition($modelo->campofiltro."= ".$idfiltrodocu);
			   //var_dump(Estado::estadosnocalculables($modelo->codocu));yii::app()->end();
			   $criterioporpagina->addNotInCondition($modelo->campoestado,Estado:: estadosnocalculablesdetalle($modelo->codocu));
			  // $criterioporpagina->params=ARRAY(":vidifiltrodocu"=>$idfiltrodocu);
			   $criterioporpagina->limit=$modelo->registrosporpagina;
			    $criterioporpagina->offset=$modelo->registrosporpagina*($i-1);
			    $proveedorporpagina=new Miproveedor($nombremodelo,array('pagination' => false,"criteria"=>$criterioporpagina));
			   $proveedorporpagina->camposasumar=Coordreporte::totalizables($id);
                  $amontoagregado= $proveedorporpagina->Total();
                  // echo "  Teimpo pasado getsdata 414: ".(time()-$tiempo)."<br>"; 
			 	$cadena=$this->renderpartial('reporte',
					array(
						'columnas' =>$this->makeColumnas($proveedorestilo,$amontobase,$amontoagregado,$id),
						'cadenacabecera'=>$this->cabecera($filamuestracabecera,$proveedorestilo,$modelo),
						'proveedordatos'=>$proveedorporpagina,
						'modelo'=>$modelo,
                        'hojaestilo'=>Yii::app()->getTheme()->baseUrl.'/css/reportes/'.$modelo->estilo,                        
					),true,false);

			   $amontobase=$this->sumaarray($amontobase,$amontoagregado);
			   if($i==$numeropaginas and $modelo->comercial=='1'){ //Si es la utima pag y ademas es doc comercial

				   if($numeropaginas==1){
					   $grantotal=$amontobase[$modelo->campototal];
				   }else {
					   $grantotal=$amontobase[$modelo->campototal]+$amontoagregado[$modelo->campototal];
				   }
					     $cadena.=$this->colocaimpuestos($modelo->codocu,$idfiltrodocu,$modelo->xresumen,$modelo->yresumen,$grantotal);
			   }
                            //echo "  Teimpo pasado getsdata 436: ".(time()-$tiempo)."<br>"; 
          //echo $cadena;yii::app()->end();
                           
                         // echo "cadena ".$cadena."<br>";die();
                           //echo "par ver las repeticiones <br>"; 
			   $mpdf->WriteHTML($cadena,0);
                           //die();
                           //echo "  Teimpo pasado getsdata 439: ".(time()-$tiempo)."<br>"; die();
			   if($i<$numeropaginas)
			   $mpdf->AddPage();

		   }
                  
                   
//echo $cadena;yii::app()->end();



		if(Yii::app()->settings->get('documentos', 'documentos_selloagua')=='1') {
					$mpdf->SetWatermarkImage(yii::app()->getBaseUrl(false).Yii::app()->settings->get('documentos', 'documentos_archivo_sello_agua').DIRECTORY_SEPARATOR.'NOAPROBADO.JPG');
			$mpdf->showWatermarkImage = true;
		}





		if($file==0){
//$ruta='assets/'.$modelo->codocu.'_'.$idfiltrodocu.'_'.yii::app()->user->id.'_'.substr(hash('md5',rand() . rand()), 0, 10).'.pdf';
			$rutax=Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR;
			$rutacorta=yii::app()->getBaseUrl(false).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR;
			if(is_dir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR)){
				//echo "weddde";die();
				if(!is_dir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR))
					mkdir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR);
			}else{
				//echo $rutax.yii::app()->user->id.DIRECTORY_SEPARATOR;die();
				mkdir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR);
				mkdir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR);
			}
			//$usuario=yii::app()->user->um->LoadUserById(yii::app()->user->id);

			$nombrear=yii::app()->user->name.'.pdf';
			$rutax.=yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR.$nombrear;
			$rutacorta.=$nombrear;
		//	var_dump($rutax);die();
			$mpdf->Output($rutax,'F');
			$this->render('pdf',array('ruta'=>$rutacorta));
		}
		elseif($file==1){
			$rutax=Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR;
			$rutacorta=yii::app()->getBaseUrl(false).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR;
			if(is_dir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR)){
				//echo "weddde";die();
				if(!is_dir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR))
					mkdir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR);
			}else{
				//echo $rutax.yii::app()->user->id.DIRECTORY_SEPARATOR;die();
				mkdir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR);
				mkdir($rutax.yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR);
			}
			//$usuario=yii::app()->user->um->LoadUserById(yii::app()->user->id);

			$nombrear=yii::app()->user->name.'.pdf';
			$rutax.=yii::app()->user->id.DIRECTORY_SEPARATOR.$modelo->codocu.DIRECTORY_SEPARATOR.$nombrear;
			$rutacorta.=$nombrear;
			//	var_dump($rutax);die();
			$mpdf->Output($rutax,'F');
		}
        elseif($file==2){
            //$mpdf->Output();
            $this->layout='//layouts/docus';
            echo $cadena;die();
          // $this->render('web',array('cadena'=>$cadena));
        }
        else{
			$mpdf->Output();
		}

		//////////////////////////////////////////

		//sacando el dataprovider
		/*
		$criterio=New CDbCriteria;
		$criterio->addCondition($modelo->campofiltro."=:vidifiltrodocu");
		$criterio->params=ARRAY(":vidifiltrodocu"=>$idfiltrodocu);
          $proveedordatos=new Miproveedor($nombremodelo,
			     array("criteria"=>$criterio,
			 				 'pagination' => array(
			  									'pageSize' => 100,
		  										),
			        ));
		$proveedordatos->camposasumar=array('preciounit','cant');
          $filasdatos=$proveedordatos->getData();
		$filamuestracabecera=$filasdatos[0]; ///una fila de datos para la cabcerea
		$proveedorestilo=$modelo->hijos;
		$cadena=$this->renderpartial('reporte',
			           array(//'proveedor'=>$proveedordatos,
						    'columnas' =>$this->makeColumnas($proveedorestilo,$proveedordatos),
						    'cadenacabecera'=>$this->cabecera($filamuestracabecera,$proveedorestilo),
			                 'proveedordatos'=>$proveedordatos,
						     'modelo'=>$modelo,
						  ),
			                         TRUE,
			                        true);

		$mpdf=Yii::app()->ePdf->mpdf(
			'',trim($modelo->tamanopapel));
		$hojaestilo=file_get_contents('themes/abound/css'.DIRECTORY_SEPARATOR.'estilooc.css');
		$mpdf->WriteHTML($hojaestilo,1);
		$mpdf->pagenumPrefix = 'Página  ';
		$mpdf->pagenumSuffix = ' ';
		$mpdf->nbpgPrefix = ' de  ';
		$mpdf->nbpgSuffix = '';
		$mpdf->SetFooter('{PAGENO}{nbpg}');
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($cadena,2);
		$mpdf->Output();
   */
	}



	public function actioncreaDetalle($id){
		$identidad=(int)(MiFactoria::cleanInput($id));
		$modelo=$this->loadModel($identidad);

		$nombredemodelo=$modelo->modelo;

		$modeloareportar=new $nombredemodelo;
	     $columnas=$modeloareportar->getMetaData();
		/*var_dump($campos);
		yii::app()->end();*/
		$contador=0;
        $nombres=array();
		foreach($columnas->columns as $columna){
			//vewrioifcar si existe el registro hijo
			$criterio=New CDBcriteria;
			$criterio->addCondition("hidreporte=:vid AND nombre_campo=:vnombrecampo");
			$criterio->params=array(":vid"=>$modelo->id,":vnombrecampo"=>$columna->name);
			$registrohijo=Coordreporte::model()->findAll($criterio);
$nombres[]=trim(strtolower($columna->name));
			if(count($registrohijo)==0 ){ //SI NO ESTA , ENTONCES INSERTARLO
				$this->insertahijo($modelo->codocu,$modelo->id,$modeloareportar,$columna);
              $contador+=1;
			}


		}
        //var_dump(get_object_vars ($modeloareportar));
           // var_dump($modeloareportar->getAttributes());
       foreach( array_diff(array_keys(get_object_vars ($modeloareportar)),$modeloareportar->attributeNames()) as $campoadicional){
           $criterio=New CDBcriteria;
           $criterio->addCondition("hidreporte=:vid AND nombre_campo=:vnombrecampo");
           $criterio->params=array(":vid"=>$modelo->id,":vnombrecampo"=>$campoadicional);
           $registrohijo=Coordreporte::model()->findAll($criterio);
           if(count($registrohijo)==0 ) { //SI NO ESTA , ENTONCES INSERTARLO
               $this->insertahijofalso($modelo->codocu, $modelo->id, $campoadicional);
               $contador+=1;
           }

       }



        if($contador > 0 ){
			yii::app()->user->setFlash('success','Se agregaron '.$contador.' registros hijos ');

		}else {
			yii::app()->user->setFlash('notice','No se agregaron registros hijos ya existen todos');

		}


		$this->redirect(array('update','id'=>$modelo->id));

	}


	/************************
	 *  Construye el logo de la sociedad
	 *
	 *************************/

	public function renderLogo($idsociedad,$idreporte,$xlogo,$ylogo){
		$idsociedad=MiFactoria::cleanInput($idsociedad);
		$modelosociedad=Sociedades::model()->findByPk($idsociedad);
		if(!is_null($modelosociedad)){
			$cadena=$this->renderpartial('logo',
				array(
					'model' =>$modelosociedad,
					'idreporte'=>$idreporte,
					'xlogo'=>$xlogo,
					'ylogo'=>$ylogo,
					//'rutalogo'=>$rutalogo,
				),TRUE,	true);
		}
		return $cadena;
	}



public function actioncargacampos(){
	/*echo $_POST['coordocs']['modelo'];
	yii::app()->end();*/
	$nombremodelo=MiFactoria::cleanInput($_POST['Coordocs']['modelo']);
	$modelito=New $nombremodelo;
	/*var_dump($modelito);
	yii::app()->end();*/
	foreach($modelito->getAttributes() as $clave =>$valor){
		echo CHtml::tag('option', array('value'=>$clave),CHtml::encode($clave),true);
	}


}


    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        $regi=New Coordreporte('search_por_hidreporte');
                $regi->unsetAttributes();  // clear any default values
		if(isset($_GET['Coordreporte']))
			$regi->attributes=$_GET['Coordreporte'];
                
               // var_dump($_GET);
               // var_dump($_GET['Coordreporte']);
        if(isset($_POST['Coordocs']))
        {
            $model->attributes=$_POST['Coordocs'];
			//PRINT_R($model->getSafeAttributeNames());DIE();
            if($model->save()) {
				//VAR_DUMP($model->tienecabecera);die();
				if (!empty($_GET['asDialog'])) {
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialogdetalle').dialog('close');
													                    window.parent.$('#cru-detalle').attr('src','');
															    window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');
																		");
					//  Yii::app()->end();
				}
				/*print_r($model->attributes);
                echo  "<br><br>";
                var_dump($model->save());
                echo  "<br><br> errores : ";
                print_r($model->geterrors());
                yii::app()->end();*/
				//print_r($model->geterrors());die();
				$this->redirect(array('view', 'id' => $model->id));
			}
        }
               //if(yii::app()->request->isAjaxRequest){
                    
               //}
            
                
        if (!empty($_GET['asDialog']))
            $this->layout = '//layouts/iframe';

        $this->render('_form',array(
            'model'=>$model,'regi'=>$regi
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
		$dataProvider=new CActiveDataProvider('Coordocs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Coordocs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Coordocs']))
			$model->attributes=$_GET['Coordocs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Coordocs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Coordocs::model()->findByPk($id+0);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Coordocs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='coordocs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	private function colocaimpuestos($codocu,$idocu,$xresumen,$yresumen,$grantotal){
	  return $this->renderpartial("impuesto",array('grantotal'=>$grantotal,'xresumen'=>$xresumen,'yresumen'=>$yresumen,'codocu'=>$codocu,'idocu'=>$idocu),true,true);
     }
     
     /*
      * Esta funcion pinta los valores de un item con comentarios y deltalle 
      * idela para informes de reportes por ejemlo un item con desctipcion y texto largo
      * 
      *  1)  Descripcion
      *  2)  Texto largo
      *  3)  Imagenes
      *  4)  Lista de materiales
      * 
      * 
      */
     
     private function pintaItem(){
         
     }
/*
      * Esta funcion pinta los valores de un item con comentarios y deltalle 
      * idela para informes de reportes por ejemlo un item con desctipcion y texto largo
      * 
      *  1)  Descripcion
      *  2)  Texto largo
      *  3)  Imagenes
      *  4)  Lista de materiales
      * 
      * 
      */
     
     public function actionPrueba(){
         $mpdf=Yii::app()->ePdf->mpdf(
			'',trim('A4'));
                $mpdf->useSubstitutions=false; 
                //$mpdf->simpleTables = true;
               // $mpdf->packTableData = true;
               //$mpdf-> shrink_tables_to_fit = 3;
                $mpdf->use_kwt = true; 
         $cadena=$this->renderpartial('reporte_informe',
					array(),true,false);         
         //echo $cadena;die();
        //$mpdf->SetFooter('Usuario   :  '.yii::app()->user->um->loadUserById(yii::app()->user->id)->username.'|'.date("d-m-Y   H : i : s").'| Pagina {PAGENO} de  {nb}');
		$mpdf->SetDisplayMode('fullpage');
                $hojaestilo = file_get_contents ( $this->rutaestilos . DIRECTORY_SEPARATOR . 'estilooc.css' );
			//$hojaestilo=file_get_contents('themes/abound/css'.DIRECTORY_SEPARATOR.'estilovale.css');
			//echo $hojaestilo;die();
                        $mpdf->WriteHTML ($hojaestilo , 1 );
                        $mpdf->WriteHTML($cadena,0);
                        $mpdf->Output();
         
     }
}
