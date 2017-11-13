<?php
/**
 * Behavior que gestiona la relacion con las tablas sunat 
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
class formatoNumeroBehavior extends CActiveRecordBehavior
{
  const COD_SUNAT_TIPO_DOC_DNI='001';
   const COD_SUNAT_TIPO_DOC_PASAPORTE='007';
    const COD_SUNAT_TIPO_CARNET_EXTRANJERIA='004';
     const COD_SUNAT_TIPO_DOC_RUC='006';
    /**
 * Funciom que devuelve el numero de documento, 
     * rellenando con ceros hasta aclcanzar el formato adecuado 
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
    public function rellenaNumero($patron,$numero)
    {       
     //var_dump($patron);die();
        //limpiando el 
       // $numero=$this->limpia(trim($numero));
        //var_dump($numero);die();
        $longitud=$this->longitud($patron);    
       //var_dump($longitud);
      // var_dump($numero);
        //die();
        $numero= substr( str_pad($numero, $longitud, "0", STR_PAD_LEFT), -1*$longitud,$longitud);
       
       return $numero;
     }
     
     
     
    private function limpia($numero){
        return preg_replace(
                        array('/[^0-9]{1}/','/[^A-Z]{1}/') , 
                        array('','') , 
                        $numero  
               );
    }
    
    private function longitud($patron){
           for ($i = 1; $i <= 99; $i++) {
                 if(preg_match("/".$patron."/", str_pad('', $i, "0", STR_PAD_LEFT)))
                         break;
                }        
            return $i;
    }
    
    
    public function esfechacontable($idperiodo, $nombrecampofecha){
        
       return  yii::app()->periodo->estadentroperiodo(
                $this->owner->{$nombrecampofecha},false,$idperiodo
                );
        
      }
    
    
    /***********************************
     * Establece le impuesto para la 
     * fecha del documento, es decir para la fecha 
     * 
     * 
     */
    public function getimpuesto($codimpuesto,$nombrecampofecha){
        return yii::app()->impuestos->getImpuesto($codimpuesto,$this->owner->{$nombrecampofecha});
    }
    
    /************************************
     * Establece le impuesto para la 
     * fecha del documento, es decir para la fecha 
     * 
     * 
     */
    public function getcambio($codmoneda,$nombrecampofecha){
        return yii::app()->tipocambio->getImpuesto($codimpuesto,$this->owner->{$nombrecampofecha});
        
    }
    
    /************************************
     * Valida los formatos de DOCUMENTOS 
     * segun el tipo
     * Sean DNI , PASAPORTEM, RUC 
     * 
     * 
     */
    public function validaNumerosDoc($codtipo,$numero){
        if($codtipo==self::COD_SUNAT_TIPO_DOC_DNI)
        {
            if(!preg_match(yii::app()->settings->get("general","general_dni"),$numero))
              return array("mal"=>"El numero de DNI no es correcto");  
        }
        elseif($codtipo==self::COD_SUNAT_TIPO_DOC_RUC){
            if(!preg_match(yii::app()->settings->get("general","general_ruc"),$numero))
              return array("mal"=>"El numero de RUC no es correcto");   
        }
            elseif(($codtipo==self::COD_SUNAT_TIPO_DOC_PASAPORTE)){
              if(!preg_match(yii::app()->settings->get("general","general_pasaporte"),$numero))
              return array("mal"=>"El numero de PASAPORTE no es correcto");      
            }
       RETURN TRUE;
    }
     
    
    
    
    
    /*funcion que permite 
     * recuperar  los asientos en le libro diario de acuerdo al docuemtno
     * y lo alamcna en la tabla templibrodiario
     */
    public function sacatempcuentas($nombrecampo){
        $crite=$this->criterioToken($nombrecampo,'idkey');
         //Templibrodiario::model()->deleteAll($crite);         
          return Templibrodiario::model()->findAll($crite);
         /* var_dump($registros);
          var_dump($crite->params);
         var_dump($crite->condition);die();*/
        /* foreach($registros as $registro){
             $registro->cargatemporal();
         }  */
        
    }
    
    
    /*funcion que permite 
     * recuperar  los asientos en le libro diario de acuerdo al docuemtno
     * y lo alamcna en la tabla templibrodiario, pero ya con le id aisento
     */
    public function sacatempcuentasupdate($nombrecampo){
        /*$crite=$this->criterioHidasiento($nombrecampo,'hidasiento');
        // Templibrodiario::model()->deleteAll($crite);
         
          $registros= Librodiario::model()->findAll($crite);
         /* var_dump($crite->params);
         var_dump($crite->condition);die();*/
         
        
        /*foreach($registros as $registro){
             $registro->cargatemporal();
         }  */
         $crite=$this->criterioHidasiento($nombrecampo,'hidasiento');
         //Templibrodiario::model()->deleteAll($crite);         
          $registros= Librodiario::model()->findAll($crite);
          foreach($registros as $registro){
             $registro->cargatemporal();
         }
        
    }
    
    /*funcion que permite 
     * grabar datos del temporal 
     * en la tabla  librodiario   * 
     */
    public function grabatemporalcuentas($nombrecampo){
         $registros= $this->sacatempcuentasupdate($nombrecampo);
         //echo "hola  ".$nombrecampo. "  ".count($registros);
         //echo count($registros);die();
         if(count($registros)>0)
         foreach($registros as $registro){
           $registro->grabadiario();
         }            
       
    }
   
    /****
     * Esta fundion actualiza los ids de los temporales luego de que 
     * se granaun documento relacionado y se saca el id con refresh();
     */
    public function updateIdsTemporales($id,$key){
       // Templibrodiario::model()->updateAll($this->criteriocuentas($nombrecampo)) 
       // $cri=$this->criteriocuentas($nombrecampo);
       // var_dump($key); var_dump($id);die();
      return   yii::app()->db->createCommand()
        ->update('{{templibrodiario}}',
	array("hidasiento"=>$id),
	"idkey=:vidkey",
	array(":vidkey"=>$key));
        
    }
    
    
    
    /*sac el cteiorio para las el ibro diario y teporal 
     * 
     */
    private function criteriocuentas($nombrecampo){
        if($this->owner->hasAttribute('coddocu') or $this->owner->hasAttribute('codocu')  ){
            $cri=New CDBcriteria();
            $camp=($this->owner->isNewRecord)?"idkey":"hidasiento";
            $cri->addCondition("codocu=:vcodocu");
             $cri->addCondition("iduser=:viduser");
             $cri->addCondition($camp."=:vidkey");
             $cri->params=array(
                 ":vcodocu"=>$nombrecampo, 
                     ":viduser"=>yii::app()->user->id,
                     ":vidkey"=>($this->owner->isNewRecord)?$this->owner->idkey:$this->owner->id,
                     );
         return $cri;   
            
        }else{
            throw new CHttpException(500,'El registro no tiene la propiedad codigo de documento');
		
        }
    }
    
    /*
     * Esta funcio0n retorna las cuentas configuradas en el documento
     * Se fija si el temporal ya tiene la cuenta cargada; Si no 
     * la tiene la agrega 
     * Si no encuentra las crea ; CUIDADO ESTA FUNCION DEBE DE LLAMARSE
     * Solo cuandop el regiustro del docuemnto es nuevo
     */
    public function cargaCuentasDesdeConf($codigodoc){
        if($this->owner->isNewRecord){
        $cri=New CDbCriteria();
        $cri->addCondition("codocu=:vcodocu");
        $cri->params=array(":vcodocu"=>$codigodoc);
        $registros= Cuentasdoc::model()->findAll($cri);
        
        //limpiando 
         $crite=$this->criterioToken($nombrecampo,'idkey');
         Templibrodiario::model()->deleteAll($crite); 
         // muy bien quedo limpio
         // 
         // 
        //var_dump($registros);die();
        $j=1;
        foreach($registros as $registro){
            $temporal=New Templibrodiario('basico');
             $temporal->setAttributes(ARRAY
                     (
                 'codcuenta'=>$registro->codcuenta,
                 'tipo'=>$registro->debehaber,
                     ));
            // var_dump(property_exists(get_class($this->owner),'array_map_camposlibro'));die();
                if (property_exists(get_class($this->owner),'array_map_camposlibro')){
               foreach($this->owner->array_map_camposlibro as $nombrecampodoc=>$nombrecampolibro){
                        $temporal->{$nombrecampolibro}=$this->owner->{$nombrecampodoc};
                     // echo $nombrecampodoc."  =  ".$this->owner->{$nombrecampodoc}."    =>    ".$nombrecampolibro."    =   ".$temporal->{$nombrecampolibro}."  <br>";
                        
                        }
                   
                }
                
                //print_r($temporal->attributes); echo "<br>";
            $temporal->save();
            /*if($j==4)die();
            $j+=1;*/
            //unset($temporal);
            }
            //die();
        }else{
            //echo "no es nuevoi";die();
        }
       
    }
    
    /*
     * esta funcio limpia los temporales 
     */
    public function limpiatemporales($codigodoc){
        //$cri=$this->criteriocuentas($codigodoc);
        yii::app()->db->createCommand()
        ->delete('{{templibrodiario}}',
	//array("hidasiento"=>$id),
	"codocu=:vcodocu AND iduser=:viduser",
	array(":vcodocu"=>$codigodoc,":viduser"=>yii::app()->user->id));
        
    }
    
     /*sac el cteiorio para las el ibro diario y teporal 
     * 
     */
  private function criterioToken($nombrecampodocu,$nombrecampokey){
        if($this->owner->hasAttribute('coddocu') or $this->owner->hasAttribute('codocu')  ){
            $cri=New CDBcriteria();
           // $camp=($this->owner->isNewRecord)?"idkey":"hidasiento";
            $cri->addCondition("codocu=:vcodocu");
             $cri->addCondition("iduser=:viduser");
             $cri->addCondition($nombrecampokey."=:vidkey");
             $cri->params=array(
                 ":vcodocu"=>$nombrecampodocu, 
                     ":viduser"=>yii::app()->user->id,
                     ":vidkey"=>$this->owner->{$nombrecampokey},
                     );
                     //var_dump($cri);die();
         return $cri;   
            
        }else{
            throw new CHttpException(500,'El registro no tiene la propiedad codigo de documento');
		
        }
    }
    
    
     /*sac el cteiorio para las el ibro diario y teporal 
     * CROITEIRO 
     */
    private function criterioHidasiento($nombrecampodocu,$nombrecampoid){
        if($this->owner->hasAttribute('coddocu') or $this->owner->hasAttribute('codocu')  ){
            $cri=New CDBcriteria();
           // $camp=($this->owner->isNewRecord)?"idkey":"hidasiento";
            $cri->addCondition("codocu=:vcodocu");
             $cri->addCondition("iduser=:viduser");
             $cri->addCondition($nombrecampoid."=:vidasiento");
             $cri->params=array(
                 ":vcodocu"=>$nombrecampodocu, 
                     ":viduser"=>yii::app()->user->id,
                     ":vidasiento"=>$this->owner->id,
                     );
         return $cri;   
            
        }else{
            throw new CHttpException(500,'El registro no tiene la propiedad codigo de documento');
		
        }
    }
    
    public function getDataProviderToken($nombrecampodocu,$nombrecampokey){
      return   new CActiveDataProvider('Templibrodiario', array(
            'criteria'=>$this->criterioToken($nombrecampodocu, $nombrecampokey)
                
                ));
    }
    
    public function getDataProviderHidasiento($nombrecampodocu,$nombrecampoid){
      return   new CActiveDataProvider('Templibrodiario', array(
            'criteria'=>$this->criterioHidasiento($nombrecampodocu, $nombrecampoid)
                
                ));
    }
    
    
    /******
     * Fucnion que devuelve un nuevo registro temporal de 
     * cuentas con los campos heredados del registro padre
     * pero sin llenar el tipo ni la cuenta ni el deb o el haber
     * 
     */
    
    public function getNewTempCuenta(){
        //var_dump($this->owner);
        $temp=New Templibrodiario('basico');
        if(property_exists($this->owner,'array_map_camposlibro')){
            foreach ($this->owner->array_map_camposlibro as $clave=>$valor){
                $temp->{$valor}=$this->owner->{$clave};
            }
            return $temp;
        }else{
           throw new CHttpException(500,'El registro no tiene la propiedad array_map_camposlibro');
	 
        }
        
    }
}