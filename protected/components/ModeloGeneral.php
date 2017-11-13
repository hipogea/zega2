<?php
class ModeloGeneral extends CActiveRecord
{
const HTML_DESHABILITADO='disabled';
const ESTADO_REGISTRO_NUEVO='00'; ///ESTO SOLO PARA INCLUIR LA CONDICION isNewRecord()
    
    PRIVATE $_venumModels=null;
	private $_modelPath=null;
        private $_modelPathsModules=array();
	public $oldAttributes=array(); //arayu ara guaradar los atributos viejos
	public $documento=NULL;
	//public $campodenumero=NULL; //Nombre de campo que guarda el valor del numero del doc
	public $mensajes=array(); //ARRAY PARA UARADAR LOS MENSAKESW
	public $campoprecio=null; //nobre del campo precio del modelo
	public $isdocParent=true; ///Si es modelo padre TRUE , FALSE  SI es un item	
        public $campoestado='';
        public $_estacomprometido= false; //Esta prop indica si el registro modelo esta v
                                            //compormetido con otro registro a traves de susus relaciones, 
                                           //Esto quiere decir si se puede editar o borrar sin problemas
                                            //Se actualiza Por medio de la funcion checkcomproimisos()
        public $camposfechas=array();
        public $campossensibles=array();///Esta propiedad guarda los campos sensisble del modelo para veriifcacion si se pueden 
   //editar o no de acuerdo a si ya tieen compromisos
   
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
        
        public function hasvaluedefault($namefield){
            return VwOpcionesdocumentos::tienevalorpordefecto($this, $namefield);
        }
        public function getValueDefault($namefield){
            IF($this->hasvaluedefault($namefield)){
                return VwOpcionesdocumentos::valorespordefecto($this, $namefield);
            }ELSE{
                RETURN NULL;
            }
            
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
		$cadena="";
		$reglas=$this->rules();
		foreach( $reglas as $clave=>$valor)
		{
			foreach( $reglas[$clave] as $clavecita=>$valorcito)
			{
				if(strtolower($clavecita)=='on') {
					$cadena.=",".$valorcito;
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
        
        public  function getModelPathsFromModules()
	{
		if(count($this->_modelPathsModules)>0)
			return $this->_modelPathsModules;
		else{
                    $p=Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'modules';
                   foreach (scandir($p) as $f) 
                       {
                         $ruta=Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.$f;
                            if ($f == '.' || $f == '..') {
				continue;
				}
			     if (strlen($f)) {
				if ($f[0] == '.') {
						continue;
				}
				}
                         foreach (scandir($ruta) as $f1) {
				if($f1=="models"){
                                                    foreach (scandir($ruta.DIRECTORY_SEPARATOR.$f1) as $f2) {
                                                                if ($f2 == '.' || $f2 == '..') {
                                                                    continue;
                                                                    }
                                                                if (strlen($f2)) {
                                                                    if ($f2[0] == '.') {
                                                                    continue;
                                                                                    }
                                                                                }
                                                                                $this->_venumModels[] = substr($f2,0,strpos($f2,'.php'));
                                                                    }
                                                }
                                    }
                                
                         }
                                
                       

				

                              } 
                                

				

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
                        
                        $this->getModelPathsFromModules();
                        
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
            
             if (is_null($criteria)){
                 $condition="1=1";
		  $params=array();
             }ELSE{
                 $condition=is_null($criteria->condition)?"1=1":$criteria->condition;
                 $params=is_null($criteria->params)?array():$criteria->params;
             }
            // var_dump($condition);var_dump($params);die();
                 $valor=Yii::app()->db->createCommand()
			->select('max('.$attribute.')')
			->from($this->tableName())
			->where($condition,$params)->queryScalar();
                      if(is_null($valor)){ //sI ES EL PRIMER REGISTRO
                                                   IF(is_null($prefijo)){
                                                                            if(is_null($ancho)){
                                                                                    $ancho=$this->getSizeColumn($attribute);
                                                                       
                                                                                 }else{
                                                                                         if ($ancho > $this->getSizeColumn($attribute)){
                                                                                                        throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                                        ' El ancho especificado [  '.$ancho.'  ] en esta funcion como parametro, es mayor que la longitud ['.$this->getSizeColumn($attribute).'  ] de columna  ');
		  
                                                                                             }else{
                                                                                                         if ($ancho <= 1){
                                                                                                                throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                                                    ' El ancho especificado [  '.$ancho.'  ] en esta funcion como parametro, es minimo  ');
		                                                                      
                                                                                                                         }
                                                                                                    
                                                                                                    }
                                                                                 }
                                                                        return str_pad('1',$ancho,"0",STR_PAD_LEFT); 
                                                                }else { ///si especifico prefijo                                                                        
                                                                    if(is_null($ancho)){ ///si no especifico ancho y si especifico prefijo
                                                                                    $ancho=$this->getSizeColumn($attribute);
                                                                                   
                                                                         }else{ //si especifico prefijo  y tambien ancho
                                                                                         if ($ancho > $this->getSizeColumn($attribute)){
                                                                                                        throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                                        ' El ancho especificado [  '.$ancho.'  ] en esta funcion como parametro, es mayor que la longitud ['.$this->getSizeColumn($attribute).'  ] de columna  ');
		  
                                                                                             }else{
                                                                                                         if ($ancho <= 1){
                                                                                                                throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                                                    ' El ancho especificado [  '.$ancho.'  ] en esta funcion como parametro, es minimo  ');
		                                                                      
                                                                                                                         }
                                                                                                    
                                                                                                    }
                                                                            }
                                                                            
                                                                             if($ancho <= strlen(trim($prefijo))){
                                                                                //VAR_DUMP($ancho); VAR_DUMP($params); VAR_DUMP($condition);die();
                                                                                   throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                    ' El prefijo especificado [  '.$prefijo.'  ] en esta funcion como parametro, es mayor o igual  al ancho  [  '.$ancho.'  ]  del ultimo valor  dela columan es : ['.$valor.'  ]   ');
                                                           
                                                                             }
                                                                                                               
                                                                        $colita=substr($valor,strlen(trim($prefijo)));
                                                                        // var_dump($colita);die();
                                                                           return trim($prefijo).str_pad(trim((string)($colita+1)),$ancho,'0',STR_PAD_LEFT);
                                                       
                                                                    }
                                             }else{  /// ya hay registros 
                                                  IF(is_null($prefijo)){ //Si no especifico prefijo
                                                       if(is_null($ancho))  { //si no epspecifico prefijo y tampoco ancho
                                                                            $ancho=strlen(trim($valor));
                                                                             $prefijo="";       
                                                                         } else{ //si han epscidficado ancho  y prefijo no 
                                                                             
                                                                              if(strlen(trim($ancho))> strlen(trim($valor)))
                                                                                         throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                    ' El ancho especificado [  '.$ancho.'  ] en esta funcion como parametro, es mayor o igual  al ancho del ultimo valor  dela columan es : ['.$valor.'  ]   ');
                                                                                                                                                                                                                                             
                                                                         }
                                                     
                                                      
                                                  }else{///si ha especificadoprefijos
                                                      if(!$prefijo==substr(trim($valor),0,strlen(trim($prefijo)))) // si no coindice el prefijo con los prefijos de los valores almacenados
                                                            throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                    ' El prefijo especificado [  '.$prefijo.'  ] en esta funcion como parametro, no coincide con los valores almacenados en eta columna , por ejemplo el ultimo valor  dela columan es : ['.$valor.'  ]   ');
                                                                         if(is_null($ancho))  {
                                                                            $ancho=strlen(trim($valor));
                                                                                    if($ancho <= strlen(trim($prefijo)))
                                                                                         throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                    ' El prefijo especificado [  '.$prefijo.'  ] en esta funcion como parametro, es mayor o igual  al ancho del ultimo valor  dela columan es : ['.$valor.'  ]   ');
                                                                                   
                                                                                   
                                                                         } else{ //si han epscidficado nacho y prefijo , haya que validar 
                                                                             if(strlen(trim($ancho)) <= strlen(trim($prefijo)))
                                                                                   throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                    ' El ancho del prefijo especificado [  '.$prefijo.'  ] en esta funcion como parametro, es mayor o igual  al ancho tambien especificado : ['.$ancho.'  ]   ');
                                                                                                                                                             
                                                                         }
                                                                         
                                                                          
                                                      
                                                  }
                                                 
                                                $colita=substr($valor,strlen(trim($prefijo)));
                                               /* var_dump($valor);
                                                var_dump($ancho);
                                               var_dump($prefijo);
                                                var_dump($colita);*/
                                                $retorno=trim($prefijo).str_pad(trim((string)($colita+1)),$ancho-strlen(trim($prefijo)),'0',STR_PAD_LEFT); 
                                               // var_dump($retorno);die();
                                               // var_dump(trim((string)((integer)($colita)+1)));
                                               // var_dump($retorno);die();
                                                if(  (integer)substr($retorno,0,strlen(trim($prefijo)))  > (integer)$prefijo ) ///Si ya excedio el limite de la tabla
                                                     throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
                                                                                    ' El valor  [  '.$valor.'  ] ya saturo la longitud de la tabla conlos citerios especificados   ');
                                                      return $retorno;          
                          
                                            }
                                            
                                            
              /*           
            
		if(is_null($criteria)){
			$condition="1=1";
			$params=array();
		}else {
			$condition=$criteria->condition;
			$params=is_null($criteria->params)?array():$criteria->params;
		}
		
		if(is_null($ancho))
          $ancho=$this->getSizeColumn($attribute);
		if(is_null($prefijo))
		$prefijo=$this->getPrefijo();
                yii::log('el ancho del campo es '.$ancho,'error');

		$valor=Yii::app()->db->createCommand()
			->select('max('.$attribute.')')
			->from($this->tableName())
			->where($condition,$params)->queryScalar();
		
 yii::log('el valor crudo es '.$valor,'error');

		   IF ($valor!=false)
		   {
                             $valor=trim(($valor+1)."");
                             
                             
                      
		   }ELSE {
                       if(is_null($prefijo)){
                                $valor=trim("1");
                                $valor=str_pad($valor,$ancho,"0",STR_PAD_LEFT);
                                yii::log('el valor ahora  es  3 '.$valor,'error');
                            }else{
                                $valor=$prefijo.str_pad($valor,$ancho-strlen($prefijo),"0",STR_PAD_LEFT);
                                yii::log('el valor ahora  es  4 '.$valor,'error');
                            }
			  $valmax=$prefijo.str_pad("",$ancho-strlen($prefijo),"9",STR_PAD_LEFT)+0;
                                 
		   }
		

		   if(($valor+0) > ($valmax+0)) {
				
			   throw new CHttpException(500, __CLASS__ . '   ' . __FUNCTION__ . '   ' . __LINE__ .
				   ' El valor del numero correlativo de este documento ' . (integer)$valor . ' ya se saturo y excede el ancho de la columna  '.$valmax);
		   }
                   yii::log('Rrtornadno el valor '.$valor,'error');
	return $valor;*/
		                
                 
             }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
	



	public function  hacambiado()
{
			  $cambio=false;
				
       				 foreach($this->oldAttributes as $nombre =>$anterior)
						{
							$nuevo = $this->Attributes[$nombre];
								 if($nuevo != $anterior ){
                                                                      $cambio=true; 
                                                                      RETURN $cambio;
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
            if(!$this->isNewRecord){
		if($this->oldVal($nombrecampo)<>$this->{$nombrecampo}){
			return true;
		}else{
			return false;
		}
            }else{
                return true;
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
	
           $this->conviertefechas(true);
           //siempre despeus apra que oldd atrrtibutes agarre el 
           //el campo Fechas ya convertido
           $this->oldAttributes=$this->Attributes;        

	  Return parent::afterfind();
  }



	public function beforeSave() {
            //echo "de";die();
              $this->conviertefechas(false);
              //var_dump($this->geterrors());die();F
		return parent::beforeSave();
	}

public function afterSave() {
         // $this->arreglafechas();
//$this->conviertefechas(true);
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

        
    /******************************
     * Esta funcion, vetirica los compromisos de un modelo con sus hijos
     * a travez de la propiedad relations del modelo.
     * De este modo revisa los campos sensibles antes de habilitar su edicion
     * permitiendo o no su eidcion en las vistas de los forms,
     * del mismo modo para borrar, si tiene compromisos ya nos peude borrar
     * 
     * 
     ******************************/    
   public function checkcompromisos ($nombreclase=null){
       //verificando la propedad relatriosn
       
       if(!$this->_estacomprometido){ //Solo efectuarla en el caso de que el flag de compromisos ea falso
           //en otro caso se supopne q  ue ya esta comppemtido, para evitar sobrecarga de trabajo 
       $relaciones =$this->relations();
       $puentes=array();
       foreach($relaciones as $clave=>$valor){
           if(in_array($valor[0],array(self::STAT,self::HAS_ONE,self::HAS_MANY))){
               $puentes[]=$clave;
           }
          
       }
       //var_dump($puentes);die();
        $retorno=false;
      foreach($puentes as $clave=>$valore){
         $valor=$this->{$valore};
          if(!is_null($valor)){
              /*  En estee caos se trataria de campos STAT */
              if(in_array(gettype($valor),array('string','integer','float'))  ){
                        if(($valor+0)>0){
                                $retorno=true;break;//QUIERE DECIR QUE EXISTEN SUMATORIAS O COUNTERS MAOYRES QUE CERO 
                            }else{
                                    $retorno=false;
                                }
                    }
              
             if(gettype($valor)=='object'  ){ //HAS_ONE 
                  //PREVINIEDO ERRORES
                  //var_dump(get_class($valor)); var_dump($nombreclase);
                  IF(method_exists($valor,__FUNCTION__)){
                     if (get_class($valor)==$nombreclase){ //Si se trata del mismo objeto, es una relacion reflexiva 
                               //en este caso, desestimar.  porque se trata del mismo objeto 
                               //POR EJEMPLO   $tempdesolpe->desolpe  RELACION DE UNO  AUNO
                               // cUNADO ANALICE desolpe tambien encontrara la relacion de 
                               // uno a uno  y llegara otra vez a  $tempdesolpe 
                         //En este caso se trata del miso objeto y no vale para el analisis
                     //echo "sale";
                        } else{
                            //En este caso se trata de  de otro registro relacionado de de uno auno
                            //toca anaizarlo recursivamente 
                         // var_dump($valor);die();
                            $retorno=$valor->checkcompromisos($nombreclase);//pero evitar mas recursiones con final=true
                        }
                  }else{
                      
                  }    
                }
              
              if(is_array($valor) ){ //HAS_MANY
                if(count($valor)>0){$retorno=true;break;}else{$retorno=false;}
                }
          }else{//si es nulo no pas anada 
            $retorno=false;  
          }
          
      }          
       $this->_estacomprometido=$retorno;
       }
       return $this->_estacomprometido;
      }
      
      public function escampohabilitado($nombrecampo){
           if($this->isNewRecord){
                  return true;
              }else{
                if(in_array($nombrecampo,array_keys($this->campossensibles)))
                                 {
                                    // isnewrecord =false; verificando si es un campo que solo sepudee ingersar una osla vez y ya no s emodifica 
                                        // if(in_array(self::ESTADO_REGISTRO_NUEVO,array($this->campossensibles[$nombrecampo]))){
                                             //Yii::log(' campossensibles primer criterioel campo '.$nombrecampo.'   '.self::ESTADO_REGISTRO_NUEVO,'error');
                                             //return true;
                                            
                                        // } else{ //isnewrecord =false; ahora toca revisar  segun el estado
                                             // if(in_array($this->{$this->campoestado},array($this->campossensibles[$nombrecampo]))){
                                                // Yii::log(' campossensibles segundo criteiro '.$nombrecampo.'   ','error');
                                            
                                                  //return true; 
                                                //} else{///muy bien ahora que ya paso los 2 criterios (1) ingreso unica vez y 2) estado del documento)
                                                         // ahora toca revisar el criterio 3) de los compromisos, a nivel BASE DE DATOS de las tablas hijas relacionadas
                                                     if($this->checkcompromisos(get_class($this))) {//sis tiene compromisos  ya no  puede ser editable
                                                         // Yii::log(' ahora que ya paso los 2 criterios '.$nombrecampo.'   ','error');
                                                         return false;
                                                     }else{ //en este caso despues de haber pasado los 3 criterios recien puede 
                                                           //decirse que es editable
                                                         // Yii::log(' ahora ya p`sso los 3 croterios y es editable '.$nombrecampo.'   ','error');
                                                         
                                                         return true;
                                                     }
                                                //}
      
                                             //}
                                 
                                     } else{
                                               // var_dump($nombrecampo);var_dump(array_keys($this->campossensibles));die();
                                               // Yii::log(' campossensibles el campo '.$nombrecampo.'   no esta en los campos sensibles ','error');
                                            
                                        return true;
                                }  
              }
      
           }   
       
   
   public function disabledcampo($nombrecampo){
       return ($this->escampohabilitado($nombrecampo))?'':self::HTML_DESHABILITADO;
   }
   
  public function insertamensajes($tipo,$listadestinatarios=null,$titulo=null){
      $clave=$this->getTableSchema()->primaryKey;
      if(is_array($clave))
          throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'   '.__LINE__.' El modelo '.get_class($this).' Tiene calve primaria compuesta y no puede insertr mensajes  ');
    $mensa=New Mensajes();
    $mensa->usuario=Yii::app()->user->name;
    $mensa->cuando= date("Y-m-d H:i:s");
    if(!is_null($listadestinatarios)){
        $mensa->nombrefichero= substr($listadestinatarios,0,300);
    }else{
        $mensa->nombrefichero= null;
    }
    $mensa->codocu=$this->documento;
    $mensa->hidocu=$this->{$clave};
    $mensa->tipo=$tipo;
    $mensa->titulo=$titulo;
    
   IF(!$mensa->save()){
       return -1;
   }else{
      $mensa->refresh();
      return $mensa->id;
   }
       
   
   
}
  

 public function borramensaje($idmensaje){
     return yii::app()->db->delete("{{mensajes}}","id=:vid",array(":vid"=>$idmensaje));
         
   
}


// Registra el log de proceso en la tabla log procesos 
public function  registralog ($notice, $mensaje){
    $registrolog= New Logprocesosdocu();
    /*$controlador=yii::app()->controller->id;
    $accion=yii::app()->controller->action->id;*/
    $registrolog->setAttributes(
            array(
               'codocu'=>$this->documento,
                'notice'=>$notice,
                //'idsession'=>''
                'mensaje'=>$mensaje,
                'proceso'=>yii::app()->controller->id.DIRECTORY_SEPARATOR.yii::app()->controller->action->id,
                   'hidref'=> $this->{$this->getTableSchema()->primaryKey}
                )
            );
    $registrolog->save();
}

// Devuelve un array con los IDS, de los documentos 
//procesadsos del log de procesos , 
// @$flag: indicador de estado : 'green', 'red', 'notice' segun el estado del resultado del proceso
// @$codocu: codigo del documento procesado
// @$codocu: codigo del documento procesado

public static function  getIdsLog ($flag, $codocu){
    $criterio=New CDBCriteria();
    $criterio->addCondition("notice=:vflag and codocu=:vcodocu and iduser=:viduser");
     $criterio->params=array(":vflag"=>$flag,":vcodocu"=>$codocu,":viduser"=>yii::app()->user->id);
  return  yii::app()->db->createCommand()->
		select('c.hidref')->from('{{logprocesosdocu}} c')
			->where($criterio->condition,$criterio->params)->queryColumn();
    
}

public function recuperamensaje($tipo,$codocu,$usuario=null){
    $criterio=New CDBCriteria();
    if($usuario===null){
        $criterio->addCondition("tipo=:vtipo and codocu=:vcodocu ");
        $criterio->params=array(":vtipo"=>$tipo,":vcodocu"=>$codocu);
  
    }else{
        $criterio->addCondition("tipo=:vtipo and codocu=:vcodocu and usuario=:vusername");
        $criterio->params=array(":vtipo"=>$tipo,":vcodocu"=>$codocu,"usuario"=>$usuario);
    }
    $criterio->order="cuando DESC";
    $registro= Mensajes::model()->findAll($criterio);
    if(count($registro)>0){
        return $registro[0];
    }else{
        return null;
    }
     
   
   }

     ///esta funcion permite agregar dinamicamente  la auditoria de log

public function preparaAuditoria(){
            if(!in_array('auditoriaBehavior',$this->behaviors())){
               yii::import('application.behaviors.ActiveRecordLogableBehavior');
                   $this->attachbehavior('auditoriaBehavior', new ActiveRecordLogableBehavior);
                   if(!$this->isNewRecord)
                    $this->setOldAttributes($this->getAttributes());
            }
            
        }   
        
 
        
        
        
 ///cambia las fechas del modelo en los formatos estabeldicdos en la configuracion de
        //de la aplicacion
private function conviertefechas($salida){    
    IF(property_exists($this,'camposfechas'))
    foreach($this->camposfechas as $clave=>$campo)
        {
        //var_dump($campo);
       $this->{$campo}=$this->cambiaformatofecha($this->{$campo},$salida);
            
   }
}
public function cambiaformatofecha($fecha,$salida=true){
   
    if($salida){ 
        die();
        return yii::app()->periodo->fechaParaMostrar($fecha);
    }else{//SI va a ingresar
        //var_dump(yi i::app()->periodo->validaformatos($fecha));
        
             return yii::app()->periodo->fechaParaBd($fecha);
       
    }
    //return 1;
}

}