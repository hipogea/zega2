<?php
/**
 * Behavior que gestiona los parametros del sisitema 
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
class ParametrosBehavior extends CActiveRecordBehavior
{
    
public $nombrecampodocu=null;
public $nombrecampocentro=null;
private $_centro=null;
private $_documento=null;
public $codparam=null;
public $_tableName='{{config}}';


public function init(){
    if(is_null($this->nombrecampodocu))
      throw new CHttpException(500,
                    __CLASS__.'  '.__FUNCTION__.'    => '
                    . 'no esta definido el campo documento  del modelo '.get_class($this->owner));
	if(is_null($this->nombrecampocentro))
      throw new CHttpException(500,
                    __CLASS__.'  '.__FUNCTION__.'    => '
                    . 'no esta definido el campo centro  del modelo '.get_class($this->owner));	  
    $this->_centro=$this->owner->{$this->nombrecampocentro};
    $this->_documento=$this->owner->{$this->nombrecampodocu};

        
}

public function getTableName()
	{
		return $this->_tableName;
	}
        
        public function getCondition($iduser)
	{
		if (is_null($iduser)){
                   return  "codparam=:vcodparam and "
                      . "codocu=:vcodocu and"
                    . " codcen=:vcodcen ";
                }else{
                    return  "codparam=:vcodparam and "
                      . "codocu=:vcodocu and"
                    . " codcen=:vcodcen and "
                            . "iduser=:viduser";
                }
            
            
           
        }
        
        /*devuerlv los paremtros del afuncion */
         public function getParams($parametro,$iduser)
	{
		if (is_null($iduser)){
                   return array( ":vcodparam"=>$parametro,
                      ":vcodocu"=>$this->_documento,
                    ":vcodcen"=>$this->_centro);
                }else{
                    return array( ":vcodparam"=>$parametro,
                      ":vcodocu"=>$this->_documento,
                    ":vcodcen"=>$this->_centro,
                         ":iduser"=>$iduser,
                        );
                }           
        }
                        
	


public function getParametro($codparametro,$iduser=null){
            $result=yii::app()->db->
            createCommand()->
            select('valor')->from($this->getTableName())->
             where($this->getCondition($iduser),
                   $this->getparams($codparametro,$iduser))->
            queryScalar();
            
            if($result!=false){
                return $result;
            }else{
                 return null;
            }
    
}



    
    
}