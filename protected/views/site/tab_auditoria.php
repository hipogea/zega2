<?PHP
/*if( get_class($model)=='Docompratemp')
{
    $nombremodelo='Docompra';
    $clave=$model->id;
}
elseif( get_class($model)=='Tempimpuestosdocuaplicados'){
    $nombremodelo='Impuestodocuaplicados';
    $nombremodelo='Docompra';
    $clave=$model->id;
}
else{
    $nombremodelo=get_class($model);
}*/
$nombremodelo=get_class($model);
if(get_parent_class($this)=='ControladorBase'){

    $clave=$this->sacaclave($model);
    //var_dump($nombremodelo);var_dump($model->getPrimaryKey());
  
}else{
    $clave=$model->getPrimaryKey();
}
//var_dump($nombremodelo);var_dump($clave);
$this->widget('ext.auditoria.Logauditor',array('modeloapintar'=> $nombremodelo,'clave'=>$clave));



?>