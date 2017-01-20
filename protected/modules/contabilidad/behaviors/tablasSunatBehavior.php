<?php
/**
 * Behavior que gestiona la relacion con las tablas sunat 
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
class tablasSunatBehavior extends CActiveRecordBehavior
{
    
    public function valorsunat($valorcampo,$valortabla){
 $sql = "SELECT descorta FROM {{sunatmaster}} where codsunat='".trim($valortabla)."' AND codigo='".trim($valorcampo)."'";
$dependency = new CDbCacheDependency('SELECT count(*) FROM {{sunatmaster}}');
$resultado=Yii::app()->db->cache(6000, $dependency )->createCommand($sql)->queryScalar();
if( $resultado!=false ){
        return $resultado;
    }else{
        return '';
    }
}
    
}