

<?PHP
if(!$model->isNewRecord)
$this->widget('ext.auditoria.Logmensajes',array('docu'=> $model->codocu,'id'=>$model->id));
		 
?>

