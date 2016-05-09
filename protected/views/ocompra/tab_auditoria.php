<?PHP
if( get_class($model)=='Docompratemp')
{
    $nombremodelo='Docompra';
}
elseif( get_class($model)=='Tempimpuestosdocuaplicados'){
    $nombremodelo='Impuestodocuaplicados';
}

else{
    $nombremodelo=get_class($model);
}

//var_dump($nombremodelo);var_dump($model->getPrimaryKey());yii::app()->end();
$this->widget('ext.auditoria.Logauditor',array('modeloapintar'=> $nombremodelo,'clave'=>$model->getPrimaryKey()));

?>