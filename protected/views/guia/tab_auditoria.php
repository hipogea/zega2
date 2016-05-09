

<?PHP
if(!$model->isNewRecord)
$this->widget('ext.auditoria.Logauditor',array('modeloapintar'=> get_class($model),'clave'=>$model->getPrimaryKey()));
		 
?>

