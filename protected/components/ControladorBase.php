<?php

class ControladorBase extends Controller
{

	//public $modelopadre;
	const PREFIJO_TABLAS ='public_';
	public $documento;
	//public $id;//Identidad del docmuento
	public $documentohijo= null;
	//public $layout='//layouts/column2';
	public $mensajes=array();
	public $campoestado;
	public $bufferdetalle; ///array de datos de detalle qu se guaradarn como temporales
	                       //para comaprar si hubo cambios
	public $modelopadre; //EL modelo de la cabecera
	public $modeloshijos=array();  ///Array de los modelos hijos  : Nombretabla => NombretablaTemporal
	public $camposlink=array(); //ARRAY DE LOS LINKS DE LAS TABLAS HIJAS
	public $estados=array();
	public $transaccion=NULL; //oBJETO DE TRANSACCION
	PUBLIC $SQL;

    protected function ConfigArreglos() {
		$modpadre=$this->modelopadre;
		$matriz=$modpadre::relations();
		foreach($matriz as $clave=>$matricita)
		{
			if($matricita[0]==$modpadre::HAS_MANY){
				if(is_array($matricita[2])){
					$this->camposlink[$matricita[1]]=array_keys($matricita[2]);
				}else{
					$this->camposlink[$matricita[1]]=$matricita[2];
				}


			}

		}

		//ahora solo con estos valores vamos al siguietne nivel
		/*foreach(array_keys($this->camposlink) as $clave=>$valor){
			$matriz=$valor::relations();
			foreach($matriz as $clave=>$matricita)
			{
				if($matricita[0]==$valor::HAS_MANY and  in_array($matricita[1]  ,array_keys($this->modeloshijos)))
					$this->camposlink[$matricita[1]]=$matricita[2];
			}
		}*/


	}

private function relacionesnietas(){
	$modpadre=$this->modelopadre;
	$matriz=$modpadre::relations();
	$vv=array();
	foreach($matriz as $clave=>$matricita)
	{
		if($matricita[0]==$modpadre::HAS_MANY)
			$vv[$matricita[1]]=$matricita[2];
	}
	$dife=array_diff(array_keys($this->modeloshijos),array_keys($vv));
	$ff=array();
	foreach($dife as $clave=>$valor){
		$ff[$valor]=$this->modeloshijos[$valor];

	}
	return $ff;
}

	public function huboerror(){
		$hubo=false;
		foreach($this->mensajes as $clave=>$mensaje){
			if(substr($mensaje,0,5)=='error')
				$hubo= true;
			    break;

		}
		return $hubo;

	}

	public function displaymensajes($nivel){
	      $cadena="";
			$arreglo=yii::app()->user->getFlashes();
			$claves=array_keys($arreglo);
			foreach($claves as $cl=>$valor){
				$auxiliar=$valor;
				if(strpos($auxiliar,"_"))
				{
					$auxiliar=substr($auxiliar,0,strpos($auxiliar,"_"));
				}
				if(strtolower($auxiliar)==$nivel)
				{
					$cadena.=$arreglo[$valor].CHtml::opentag('BR');
				}
			}
      return $cadena;
	}



	public function getFieldLink($nombreclasehija) {
		return $this->camposlink[$nombreclasehija];
	}

	public function IniciaBuffer($id)
	{ ///Levanta la tabal temporal
		//$nametablapadre=$this->modelopadre;
		/*var_dump($this->modeloshijos);
		yii::app()->end();*/
		Bloqueos::clearbloqueos();
		foreach($this->modeloshijos as $nametablaoriginal => $nametablatemporal)		  {
				 $campoenlace=$this->getFieldLink($nametablaoriginal);
			//  var_dump( $campoenlace);die();
			  if(is_array($campoenlace)){
				  $aid=array($id,$this->documento);
				 // var_dump( $aid);die();
			  } else{
				  $aid=$id;
			  }
			  $registroshijos=MiFactoria::getRegistrosHijos($nametablaoriginal,$campoenlace,$aid);
                          //if($nametablatemporal=='Tempdesolpe')
                                //{print_r($registroshijos);die();}
                          foreach  ($registroshijos as $row)
			  {
				
                              
///Evitamos levantar items duplicados
				$existeregistro=MiFactoria::ExisteRegistro($nametablatemporal,$row->id);
				 
				if(is_null($existeregistro))
				  {  ///Solo si no existe
					//if($nametablatemporal=='Tempdesolpe')
                                   //echo "no existe registro para el id ".$row->id;
                                    $modelotempdpeticion=new $nametablatemporal;
					 $modelotempdpeticion->setScenario("buffer");
					  $row->setScenario("buffer");
					$modelotempdpeticion->attributes=$row->attributes;
					  //if (get_class($modelotempdpeticion)=='Tempimpuestosdocuaplicados'){
					  //print_r($row->attributes);echo "<br>";  print_r($modelotempdpeticion->attributes);
					  //}
					  //print_r($row->attributes);echo "<br>";  print_r($modelotempdpeticion->attributes);yii::app()->end();
					$modelotempdpeticion->idstatus=0; ///0 : Conectado  <> -1  eliimnado  <> +1  agregado
					$modelotempdpeticion->idusertemp=Yii::app()->user->id;
					if(!$modelotempdpeticion->save()){
						print_r($row->attributes);echo "<br>";
						print_r($modelotempdpeticion->getErrors()); yii::app()->end();
					}
					//array_push($registrostemporales,$modelotempdpeticion);
				      
                                        } else{
                                       //if($nametablatemporal=='Tempdesolpe')
                                    //echo "ya existe registro para el id ".$row->id." el ditemp es   ".$existeregistro->idtemp;
                                   }
			 }
                          /*if($nametablatemporal=='Tempdesolpe')
                                    die();*/
	        }
		//yii::app()->end();
	}

	/*Esta funcio, clona los registros  TEMPDPETICION
        temporal deuvelve un array de modelos DPETICION clonados  */

	//public function ConfirmaBuffer($nombremodelodetalletemporal,$campoenlace,$id)
	public function ConfirmaBuffer($id)
	{
		$nametablapadre=$this->modelopadre;
		$amodeloshijos=$this->modeloshijos;
		$grupototal=array(); //PÀRA ALMACENAR LOS GRUPOS DE REGISTROS HIJOS POR CADA TABLA HIJA

		foreach($amodeloshijos as $nametablaoriginal => $nametablatemporal)
		{


			//$registrosoriginales=array();
			$campoenlace=$this->getFieldLink($nametablaoriginal);
			if(is_array($campoenlace))
				$id=array($id,$this->documento);
			$registroshijos=MiFactoria::getRegistrosHijos($nametablatemporal,$campoenlace,$id);
			//var_dump($registroshijos);var_dump($id);echo "salio";die();
			//var_dump($campoenlace);var_dump($id);echo "salio";die();
			foreach  ($registroshijos as $row) {
				//$row->setScenario('buffer');
				$modelooriginal=NULL;

				IF($row->id >0 )
				$modelooriginal=$nametablaoriginal::model()->findByPk($row->id);
				if(is_null($modelooriginal)) {
					$modelooriginal=new $nametablaoriginal;

				}
				$modelooriginal->setScenario('buffer');
				$modelooriginal->attributes=$row->attributes;

						if($row->idstatus==-1 and !$modelooriginal->isNewRecord)
					if(!$modelooriginal->delete())
						MiFactoria::Mensaje('error', "NO se pudo borrar el registro  ".get_class($modelooriginal).yii::app()->mensajes->getErroresItem($modelooriginal->geterrors()));


				if($modelooriginal->save())

				{
					//MiFactoria::Mensaje('success', "se gravixx el registro  ".get_class($modelooriginal)." Con wescenario  ".$modelooriginal->getScenario()."    ".yii::app()->mensajes->getErroresItem($modelooriginal->geterrors()));

					//MiFactoria::Mensaje('success', "Se grabo el documento  ".$nametablaoriginal);
					//echo "<BR><BR><BR><BR><BR>   grabo mal   ".get_class($modelooriginal);
					//print_r($modelooriginal->geterrors());
					//throw new CHttpException(500,__CLASS__.' -> NO s epudo grabar el item  '.$modelooriginal->id. 'Del mdoelo'.$nametablaoriginal.'    '.yii::app()->mensajes->getErroresItem($modelooriginal->geterrors()));

				} else {
					//MiFactoria::Mensaje('success', "Se grabo el documento  ".$nametablatemporal);
					MiFactoria::Mensaje('error', "NO se pudo grabar el registro  ".get_class($modelooriginal).yii::app()->mensajes->getErroresItem($modelooriginal->geterrors()));

					///echo "<BR><BR><BR><BR><BR>   grabo bien   ".get_class($modelooriginal);
					//print_r($modelooriginal->attributes);die();
				}

				//array_push($registrosoriginales,$modelooriginal);
			}
//yii::app()->end();
			//array_push($grupototal,$registrosoriginales);
		}
		//return $grupototal;

	}


	/*public function SaveRegistrosHijos($grupototal)
	{
        $nombremodelocabecera=$this->modelopadre;
		foreach($grupototal as $registroshijos)
		{

        // foreach ($grupo as $registroshijos)
		    //{
			// $campoenlace=$nombremodelocabecera::getFieldLink($nombremodelocabecera::relations(), $nombremodelocabecera,$nombremodelohijo);
			// $registroshijos=MiFactoria::getRegistrosHijos($nombremodelohijo,$campoenlace,$id);
				foreach  ($registroshijos as $row)
				{

					if(is_null(MiFactoria::ExisteRegistro()))
					if($row->idstatus==-1)
						if(!$row->delete())
						     throw new CHttpException(500,'NO s epudo borrar el item  '.$row->id. 'Del mdoelo'.$nombremodelohijo);
					if(!$row->save())
							throw new CHttpException(500,'NO s epudo grabar el item  '.$row->id. 'Del mdoelo'.$nombremodelohijo);

				}
		   //}
		}


	}*/

	public function ClearBuffer($id=null)
	{
		Bloqueos::clearbloqueos();               
		/*$docbloqueados = Yii::app()->db->createCommand()
			->select('iddocu')
			->from('{{bloqueos}}')
			->where("codocu=:vcodocu AND iduser=:videuser",
				array(":vcodocu" => $this->documento, ":videuser" => yii::app()->user->id)
			)->queryColumn();*/
		if(is_null($id)) {
		}else{                   
			foreach($this->modeloshijos as $clave=>$valor ){                           
				$campoenlace=$this->camposlink[$valor];
                                 //var_dump($campoenlace);echo "<br>";
				$clase=new $valor;
				if(is_array($campoenlace)){
					$id=array($id,$this->documento);
					$valor::model()->deleteAllByAttributes(array_combine($campoenlace,$id));
				}else{
                                   // var_dump($campoenlace);echo "<br>";
					$valor::model()->deleteAllByAttributes(array($campoenlace=>$id,"idusertemp"=>yii::app()->user->id));
				}
		                                    }
                                               
		}

  return true;
	}


public function borraitemhijo($nombremodelohijotemp,$idmodelohijo){
	$retorno=false;
	//verificado pirmero que no acceda desde el URL
	//echo $idmodelohijotemp;
	$modelohijotemp=$nombremodelohijotemp::model()->findByPk($idmodelohijo);

	if(!is_null($modelohijotemp)) {


		IF(!$modelohijotemp->hasScenario('escenario_idstatus'))
			throw new CHttpException(500,__CLASS__.'  '.__FUNCTION__.'    => El modelo '.$nombremodelohijotemp.'  No tiene el ESCENARIO  "escenario_idstatus" agreguelo por que s importante para borrar items del detalle  ');
		    $modelohijotemp->setScenario('idstatus');


		//Verificamos primero si es un registro recien ingresado  en la tabla temporal o ya esta
		//confirmado en la tabla original
		if($modelohijotemp->id > 0 ){
			$modelohijotemp->idstatus=-1; ///FLAG BORRADO
			$retorno=$modelohijotemp->save();
		  }else {//
			$retorno=$modelohijotemp->delete ();
		}

		//echo $modelohijo->idtemp;
	}
	unset($modelohijo);
	return $retorno;

}




	public function StartTransaction($algunmodelo) { ///recibe un objeto del modelo padre
		if (gettype($algunmodelo) <> 'object'  or is_null($this->modelopadre))
			throw new CHttpException(500,__CLASS__.'  '.__FUNCTION__.'    => Quizo ininar una transaccion, pero el modelo padre de este controller o se ha definiso no esta definido');
			$this->transaccion=$algunmodelo->dbConnection->beginTransaction();

	}

	public function Commit() { ///recibe un objeto del modelo padre
		if (!isset($this->transaccion))
			throw new CHttpException(500,'Quizo terminar  una transaccion, pero no esta definida la proiedad transaccion del controlador');
		$this->transaction->Commit();
	}


	public function actionConfiguraop($docu,$docuhijo){
		//$docu=$this->documento;  //peticion
		//$docuhijo=$this->documentohijo; //detalle petricion


		$matrizpadre=Opcionescamposdocu::Model()->findAll(" codocu=:cod",array(":cod"=>$docu));
		foreach($matrizpadre as $fila){
			$cantidadregistros=Yii::app()->db->createCommand()->select("id")
				->from( "{{opcionesdocumentos}}" )
				->where("idopoc=v:idop",array("v:idop"=>$fila->id))
				->queryScalar();
			If (!$cantidadregistros) {
				$modex=new Opcionesdocumentos();
				$modex->setAttributes(array("idusuario"=>Yii::app()->user->id,"idopoc"=>$fila->id),false);
		        $modex->save();
			}
		}






    if (!is_null($this->documentohijo)){
		$matrizpadre1=Opcionescamposdocu::Model()->findAll(" codocu=:cod",array(":cod"=>$docuhijo));
		for ($i=0; $i < count($matrizpadre1); $i++){
			$cantidadregistros=Yii::app()->db->createCommand("SELECT id FROM  ".self::PREFIJO_TABLAS."opcionesdocumentos WHERE IDOPDOC=".$matrizpadre1[$i]['id']."")->QueryScalar();
			If (!$cantidadregistros) {
				$command = Yii::app()->db->createCommand("INSERT INTO ".self::PREFIJO_TABLAS."opcionesdocumentos (IDUSUARIO,IDOPDOC,valor) VALUES (".Yii::app()->user->id.",".$matrizpadre1[$i]['id'].",'') ");
				$command->execute();
			}
		}
		$proveedor1=VwOpcionesdocumentos::model()->search_us($docuhijo,Yii::app()->user->id);
	}

		$proveedor=VwOpcionesdocumentos::model()->search_us($docu,Yii::app()->user->id);

		$this->render('vw_admin_opciones',array(
			'proveedor'=>$proveedor,
			'proveedor1'=>$proveedor1,
		));


	}

//Devuelve el id de la cabecera, pero se asegura de que este no
///lo pasen por la URL, es decir revisa la sesion de edicion del documento, primero
///Muy util cuando se aregan registros hijos
/*public function getIdCabecera($id) {
   $idcabe=$this->estasEnSesion($id);
     if($idcabe){
	     return $idcabe;
     } else {
	throw new CHttpException(500,'Está intentando entrar por la puerta falsa ');
     }
}*/

	///Inicia bloqueo
	public function SetBloqueo($id) {
		try {
			Bloqueos::bloquea($id,$this->documento);
			}
		catch (Exception $e) {
			$mensaje=$e->getMessage();
			yii::app()->user->setFlash('error',$mensaje);
			$this->render('/usuariosfavoritos/misbloqueos');
			yii::app()->end();
		}
		// return MiFactoria::getBloqueo($id,$this->documento);

	}

	public function out($id){
		$this->TerminaBloqueo($id);
		$this->ClearBuffer($id);


	}

///Termina bloqueo
	public function TerminaBloqueo($id) {
      return MiFactoria::getDesbloqueo($id,$this->documento);

	  }

		public function estasEnSesion($id) {
                   // var_dump(MiFactoria::getEstasEnSesion($id,$this->documento));
			return  MiFactoria::getEstasEnSesion($id,$this->documento);

			}

public function detectaerrores(){
	$retorno=false;
	return (is_null(yii::app()->user->getFlash('error',null,false)))?false:true;
	/*$arreglo=yii::app()->user->getFlashes(false);
	$claves=array_keys($arreglo);
	foreach($claves as $cl=>$valor){
		if(strpos($valor,"_"))
		{
			$valor=substr($valor,0,strpos($valor,"_"));
		}
			if(strtolower($valor)=='error')
			{	$retorno=true;
			break;
			}
	}
	//print_r($arreglo);
	return $retorno;*/
}

	///Nos indica si se accede x primera vez al action UPDATE
	public function itsFirsTime($id) {
		return (!isset($_POST[$this->modelopadre]) and
			!isset($_GET[$this->modelopadre]) and
			!isset($_GET['ajax']) and
			!$this->estasEnSesion($id));
	}

	///Nos indica si se accede  al action UPDATE mediante la invocación de algun CGRIDVIEW en el formulario
	public function isRefreshCGridView($id) {
		return (
		   (!isset($_POST[$this->modelopadre]) and
			!isset($_GET[$this->modelopadre]) and
			 isset($_GET['ajax']) and
			 $this->estasEnSesion($id)) or
		   (!isset($_POST[$this->modelopadre]) and
			   isset($_GET[$this->modelopadre]) and
			   isset($_GET['ajax']) and
			   $this->estasEnSesion($id))
		)?true:false;
	}


	///Nos indica si el usuario refresco la pagina del form sin hacer submit
	public function IsRefreshUrlWithoutSubmit($id) {
		return 	(!isset($_POST[$this->modelopadre]) and
				!isset($_GET[$this->modelopadre]) and
				!isset($_GET['ajax']) and
				$this->estasEnSesion($id))?true:false;

		/*echo "este es el nombde del modelo cabe  ".$this->modelopadre;
	return 	isset($_POST[$this->modelopadre])?true:false;*/
	}


	///Permite verificar si aluiene sta modificando el miso documento
	///al mosmo tiempo : concurrencia de usuarios en el misom documento
	///DEVUELVE L NOMBRE DEL USUARIO QUE ESTAS EDITNADO EL DOCUMENTO
	public function getUsersWorkingNow($id) {
		Return MiFactoria::getWhoIsWorkingNow($id,$this->documento);
   /*
    $me=Yii::app()->user->id;
		$quien=Yii::app()->db->createCommand( " select distinct iduser from ".self::PREFIJO_TABLAS."bloqueos WHERE  iduser <> ".$me." and  codocu='".$this->documento."' and iddocu=".$id." ")->queryScalar();
           if($quien) { /// Quiere decir que hay otros que estan ediotnado el documento
			     ///PARA VER SIS ES CIERTO DEEBMOS VERIFICAR Q ESTE USUARIO NO HA DEJADO LA VENTANA ABANDONADA CON E DOMCUENTO EN EDICION
					$elusuario=Yii::app()->user->um->LoadUserById($quien);
			     ///hallando la sesion activa de este usuario
			       $sesion_activa=Yii::app()->user->um->findSession($elusuario);
			         if(is_null($sesion_activa)) {
						 return false;  //No esta ocupado por que estaba editando pero ya temrino sus sesion, alo mejor dejo la ventana abierta
					 }  else {
						 return $elusuario->username;  ///Si esta ocupado por que el usuario tiene sesion activa, y eszta editando
					 }

		   } else {
			   return false;  ///NO esta ocupado porque no hay otros usuarios que esten editando el documento
		   }

    */
	}


	public function actionView($id)
	{
		///Verificamos que este bloqueado por el usuario
		if(Numeromaximo::estasensesion($id,$this->documento)){
          $this->terminabloqueo($id);
			//$this->limpiatemporaldetalle();

		}

			$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function hubocambio($registro){
		$retorno=false;
		if(get_parent_class($registro)=='ModeloGeneral'){
			$retorno= $registro->hacambiado();
		}else{
			if(array_key_exists('ActiveRecordLogableBehavior',$registro->behaviors())){
			  $retorno=  $registro->hubocambio();
			}
		}
    return $retorno;
	}





	public function hubocambiodetalle($id)
	{
		$difiere=false; ///Asumismos que no ha variado
    		$nombreclasepadre=$this->modelopadre;
		//Obtiene la matriz de relaciones del modelo padre
		//recorriendo los modelos o clase hijas , puede haber mas de una OJO
		foreach ($this->modeloshijos as $nombreclasehija=>$nombreclasetemporal)
		{
		      //Obteniendo dinamicamente el campo enlace para cada modelo hijo
		     $campoenlace= $this->getFieldLink($nombreclasetemporal);
			if(is_array($campoenlace)){
				$aid=array($id,$this->documento);
				// var_dump( $aid);die();
			} else{
				$aid=$id;
			}
			$registrosoriginales =MiFactoria::getRegistrosHijos($nombreclasehija,$campoenlace,$aid);
			$registrostemporales=MiFactoria::getRegistrosHijos($nombreclasetemporal,$campoenlace,$aid);
			//if (count($registrostemporales)==0)
				//throw new CHttpException(500,'nos e hallaron resgistros tremporal.');
			  ///Recorriendo los registro originales
		if(count($registrostemporales)==count($registrosoriginales)){
			foreach ($registrosoriginales as $roworiginal)
			{
				$roworiginal->setScenario("buffer");
				//echo "  Recorriendo el grupo de regsitros originales(".count($registrosoriginales).")    registros temporales (".count($registrostemporales).") :  <br> ";
				foreach($registrostemporales as $rowtemporal)
				{
					// ECHO " VERIFICAND CULA CORREPSODNE A CUAL ...<BR>";
					//echo "id original ".$roworiginal->attributes['id']."   -     id temporal  ".$rowtemporal->attributes['id']."<br>";
					if($roworiginal->attributes['id']==$rowtemporal->attributes['id'])
					{ //Si son correspondientes
						//var_dump($roworiginal);
						//print_r($roworiginal->getSafeAttributeNames());echo "<br>";die();
							foreach($roworiginal->getSafeAttributeNames() as $clave => $nombrecampo)
						    {
								//echo  "( ".$roworiginal->getScenario()."   ".$roworiginal->id.") El registro original  : ".$nombrecampo." ".$roworiginal->{$nombrecampo}."  es igual a   temporal? :".$nombrecampo."   :  ".$rowtemporal->{$nombrecampo}."<br>";
								// throw new CHttpException(500,"  Se hallo diferencia El registro original  : ".$nombrecampo." ".$valorcampo."  es igual a?   temporal :".$rowtemporal->attributes[$nombrecampo]."<br>");


								if($rowtemporal->{$nombrecampo} <> $roworiginal->{$nombrecampo} and
							  			 $nombrecampo <> 'id' and $nombrecampo <> 'idtemp'
										 and $nombrecampo <> 'idstatus' and  $nombrecampo <> 'idusertemp'   )
							  			 {
											//echo  "El registro original  : ".$nombrecampo." ".$roworiginal->{$nombrecampo}."  es igual a   temporal? :".$nombrecampo."   :  ".$rowtemporal->{$nombrecampo}."<br>";
											// throw new CHttpException(500,"  Se hallo diferencia El registro original  : ".$nombrecampo." ".$valorcampo."  es igual a?   temporal :".$rowtemporal->attributes[$nombrecampo]."<br>");
											 $difiere=true;
										break;
							  			 }

					        } //find de bucle de campos en cada fila

					   }
					unset($rowtemporal);
					if($difiere)break;
				  }
				unset($roworiginal);
				if($difiere)break;

		     } ///fin del bucle del modelo
		} else  {
			$difiere=true;
		}
			unset($registrostemporales);
			unset($registrosoriginales);
			if($difiere)break;
        } //Fin del bucle de los modelos hijos
		//yii::app()->end();
    return $difiere;

	}



  public function loadModel($nombreclase,$id){

	return  Mifactoria::Cargamodelo($nombreclase,$id);
  }


	protected function performAjaxValidation($model,$nombreclase)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$nombreclase.'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

/*Funcio que te dice si el objeto $modelo corresponde a una tabla en buffer o a una tabla en
  persistente */
PUBLIC FUNCTION establafija($modelo){
	$clasesita=get_class($modelo);
	//var_dump($this->modeloshijos);
	if(in_array(trim($clasesita),array_values($this->modeloshijos))){
		//echo "adad";
		return false;}else{
		return true;
	}

}
	PUBLIC FUNCTION establapadre($modelo){
		$clasesita=get_class($modelo);
		if($this->modelopadre==$clasesita){
			return true;}else{
			return false;
		}

	}

public function sacaclave($model)
{

	if ($this->establafija($model)) {
		$clave = $model->getPrimaryKey();

	}
          else {

			  if($this->establapadre($model))
				  return $model->getPrimaryKey();

				$modelooriginal=array_flip($this->modeloshijos)[get_class($model)];
			  $ob=new $modelooriginal;
			  $campo = $ob->getTableSchema()->primaryKey ;unset($modelooriginal);
			  //var_dump($model);die();
					if (!is_array($campo))
					$clave = $model->{$campo};
						else {
								throw new CHttpException(500, 'Hubo un error, el campo clave del modelo  ' . get_class($model) . ' Es un campo combinado');
								}
				}


	return $clave;
}



	public function sacanombremodelo($model)
	{

		if ($this->establafija($model)) {
			return get_class($model);

		}
		else {

			if($this->establapadre($model))
				return get_class($model);

				$hijosalreves=array_flip($this->modeloshijos);
			//var_dump($hijosalreves);
			  return $hijosalreves[get_class($model)];
		}


		return $clave;
	}

        
      // public function 
        
}