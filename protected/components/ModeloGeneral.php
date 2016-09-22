<?php



class ModeloGeneral extends CActiveRecord


{

	PRIVATE $_venumModels=null;
	private $_modelPath=null;

	public $oldAttributes=array(); //arayu ara guaradar los atributos viejos
	public $documento=NULL;
	//public $campodenumero=NULL; //Nombre de campo que guarda el valor del numero del doc
	public $mensajes=array(); //ARRAY PARA UARADAR LOS MENSAKESW
	public $campoprecio=null; //nobre del campo precio del modelo
	public $isdocParent=true; ///Si es modelo padre TRUE , FALSE  SI es un item

	
	
	
	
	
	
	public function insertamensaje($nivel,$mensaje){
	//	$ingreso= array_push($this->mensajes,array($nivel=>$mensaje));
		/* print_r($this->mensajes);
		echo "agrefgo  :".$ingreso;
		yii::app()->end();*/
		$mensaje=$nivel."__".$mensaje;
		array_push($this->mensajes,$mensaje);
		return 1;
	}


	public function valorespordefecto(){

		VwOpcionesdocumentos::valorespordefecto($this);
		/*//Vamos a cargar los valores por defecto
		$matriz=VwOpcionesdocumentos::Model()->search_d($documento)->getData();
		//recorreindo la matriz
         print_r($matriz);yii::app()->end();

		$i=0;

		for ($i=0; $i <= count($matriz)-1;$i++) {
			if ($matriz[$i]['tipodato']=="N" ) {
				$this->{$matriz[$i]['campo']}=!empty($matriz[$i]['valor'])?$matriz[$i]['valor']+0:'';
			}ELSE {
				$this->{$matriz[$i]['campo']}=!empty($matriz[$i]['valor'])?$matriz[$i]['valor']:'';

			}

		}
		return 1;*/
	}




	public function devuelveimpuestos(){

		if($this->isdocParent) {
				$comando=yii::app()->db->createCommand()->select('sum(a.valor),a.codimpuesto,x.descripcion')
					->from('{{impuestosaplicados}} a , {{impuestos}} x')
					->where('a.codimpuesto=x.codimpuesto and a.hidocupadre=:vidocupadre and a.codocu=:vcodocu  ',array(':vcodocu'=>$this->documento,':vidocupadre'=>$this->getPrimaryKey()))
				->group('a.codimpuesto,x.descripcion');
			echo $comando->getText();
			ECHO "<BR>";
			echo $this->documento;
			ECHO "<BR>";
			echo $this->getPrimaryKey();
			ECHO "<BR>";
			//return $comando->queryAll();

			yii::app()->end();
		} else {
			return array();
		}
	}



	public function hasScenario($escena) {
		 return in_array($escena,$this->getScenarios());
	}
///devuelve todos los escenarios definidos en el modelo a exceocion de INSERT, UPDATE
	public function getScenarios() {
		//$escenarios=array();
		$cadena="";
		$reglas=$this->rules();
		foreach( $reglas as $clave=>$valor)
		{
			foreach( $reglas[$clave] as $clavecita=>$valorcito)
			{
				if(strtolower($clavecita)=='on') {
					$cadena.=",".$valorcito;
					//$escenarios[]=explode(",",$valorcito);
				}
			}
		}
		return array_unique(explode(",",$cadena));


	}





	public  function getModelPath()
	{
		if($this->_modelPath!==null)
			return $this->_modelPath;
		else
			return Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'models';
	}


	/**
	 * enumControllers
	 *    lista los nombres de los controllers declarados.
	 * @access public
	 * @return array con nombre del controller
	 */
	public function enumModels()
	{
		if ($this->_venumModels == null) {
			$this->_venumModels = array();
			$p = $this->getModelPath();
			foreach (scandir($p) as $f) {
				if ($f == '.' || $f == '..') {
					continue;
				}
				if (strlen($f)) {
					if ($f[0] == '.') {
						continue;
					}
				}

				$this->_venumModels[] = substr($f,0,strpos($f,'.php'));

			}
			return $this->_venumModels;
		} else {
			return $this->_venumModels ;
		}
	}

	/*Esta funcion  provee una matriz competa de campos cons us etiquetas
	¿Cual es la diferencia con la funcion attributelbesl?  , es qque x si hayas
	borrado algun elemento de esta matriz,(siempre sucede)  esta duncion decuelve las etiquetas
	de TODOS  los campos sin falta,
	reemplzando para los campos que faltan el mismo nomnre del campo


	Utilizacion : cuando escoges un campo de un combo , te aseguras que el id
	del combo des el nombe del campo y el label es us etiqueta, asi todos los cvampos tenfran una
	imafgen o etiqueta
	*/
public function etiquetascampos (){
	$arreglo=array();
	foreach( $this->getattributes() as $cla=>$val){
		 if(!in_array($cla,array_keys($this->attributeLabels() )  ))
		 {$arreglo[$cla]=$cla;}ELSE{$arreglo[$cla]=$this->attributeLabels()[$cla];}

	}
	//print_r($arreglo);
	return $arreglo;
}



 public  function parsemensajes($flagerror) {
	 $cadena="";
	 foreach($this->mensajes as $arreglo){
		 foreach($arreglo as $clave=>$valor){
			  if($clave==$flagerror)
				  $cadena.=$valor."<br>";
		 }
	 }
	 return $cadena;
 }

	private function getSizeColumn($attribute)
	{
		if($attribute===null or !$this->hasAttribute($attribute) )
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.'  NO existe el atributo en la clase ');

		return $this->getTableSchema()->getColumn($attribute)->size;
	}
	
	
	private function getPrefijo()
	{
	  $prefix="";
			if($this->documento===null or empty($this->documento))
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.' NO ha definido la propiedad documento ');
		$prefix=Documentos::Prefijo($this->documento);
		if($prefix===null or empty($prefix))
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.' NO se encontro ningun prefijo para el documento '.$this->documento.'  Revise la tabla documentos');
        return trim($prefix);
	}


	public function Correlativo ($attribute,$criteria=null,$prefijo=null,$ancho=null) {
		if(is_null($criteria)){
			$condition="1=1";
			$params=array();
		}else {
			$condition=$criteria->condition;
			$params=$criteria->params;
		}
		/*var_dump($condition);
		var_dump($params);
		var_dump($criteria);
		yii::app()->end();*/
		if(is_null($ancho))
          $ancho=$this->getSizeColumn($attribute);
		if(is_null($prefijo))
		$prefijo=$this->getPrefijo();
                yii::log('el ancho del campo es '.$ancho,'error');

		$valor=Yii::app()->db->createCommand()
			->select('max('.$attribute.')')
			->from($this->tableName())
			->where($condition,$params)->queryScalar();
		//->where("codmovimiento='456'")->queryScalar();
		/*var_dump($condition);
		var_dump($params);
		ECHO "VALOR."; var_dump($valor);*/
 yii::log('el valor crudo es '.$valor,'error');

		   IF ($valor!=false)
		   {
                             $valor=trim(($valor+1)."");
                       if(is_null($prefijo)){
                               
                                $valor=str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
                            }else{
                                $valor=$prefijo.str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
                            }
			    //$valor=str_pad(trim($valor+1),$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
					
                                        
		   }ELSE {
                       if(is_null($prefijo)){
                                $valor=trim("1");
                                $valor=str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
                            }else{
                                $valor=$prefijo.str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
                            }
			  
                                 
		   }
		//$valor=$prefijo.str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
		/*var_dump($valor+0);
		var_dump(($prefijo.str_pad("",$ancho-strlen($prefijo),"9",STR_PAD_LEFT)+0));
		yii::app()->end();*/
           //Return $valor;
		$valmax=$prefijo.str_pad("",$ancho-strlen($prefijo),"9",STR_PAD_LEFT)+0;
		//var_dump($valor);
		//var_dump($valmax);/*
		//yii::app()->end();*/


		   if(($valor+0) > ($valmax+0)) {
				//var_dump((integer)$valor); var_dump((integer)$valmax);DIE();
			   throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
				   ' El valor del numero correlativo de este documento ' . (integer)$valor . ' ya se saturo y excede el ancho de la columna  '.$valmax);
		   }
                   yii::log('Rrtornadno el valor '.$valor,'error');
	return $valor;
		 /*var_dump($prefijo.str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT));
		 YII::APP()->END();*/
	}



	public function  hacambiado()
{
			  $cambio=false;
				 ///verificNDSO PRIMERO SI TINENE EL COMPRAQTAMIENTO CACTIVERECORDLOG
   				 if(array_key_exists('ActiveRecordLogableBehavior',$this->behaviors()))
		{
	   						 return  $this->hubocambio();
   		 } else {
       				 foreach($this->oldAttributes as $nombre =>$anterior)
						{
							$nuevo = $this->Attributes[$nombre];
								 if($nuevo != $anterior )
								 $cambio=true;
			      				break;
		 					}
    		}
   				 return $cambio;
			}

	///Deveuel el valor del cmapo antes del cambio ,
	//valido solo paramodelos cabecera , para modelos detalle
	//EL MECANISMO ES OTRO, NOS BASAMOS EN TABLAS EN DISCO
	public function oldVal($attribute) {
		if (!$this->hasAttribute($attribute))
			throw new CHttpException(500,'No se encontro el atributo   '.$attribute.'   para el modelo : '.$this->getClassName() ) ;
		return $this->oldAttributes[$attribute];

	}

	public function cambiocampo($nombrecampo){
		if($this->oldVal($nombrecampo)<>$this->{$nombrecampo}){
			return true;
		}else{
			return false;
		}

	}

	////Devuelve el valor del campo actual
	/*public function curVal($attribute) {
		if (!$this->hasAttribute($attribute))
			throw new CHttpException(500,'No se encontro el atributo   '.$attribute.'   para el modelo : '.$this->getClassName() ) ;
		return $this->Attributes[$attribute];

	}*

public  function Import (){

}

public function estados()
{
   return array();
}


Public function recorro($matriz)
{

}

/*
 * @matriz Es la matriz de relaciones de la clase
 * @nombde de la clase padre
 *
 *
 */

	public static function getClassName(){
		return __CLASS__;
	}














  public function afterfind() {
	 ///Copiar los valores originales
	$this->oldAttributes=$this->Attributes;

	  Return parent::afterfind();
  }



	public function beforeSave() {

		return parent::beforeSave();
	}

public function afterSave() {

		return parent::afterSave();
	}




public static function model($className=__CLASS__)
{

	return parent::model($className);
}

	public function tableName()
	{
		return null; //ESTO SE COLOCO PARA EVADR UN ERROR
	}

}