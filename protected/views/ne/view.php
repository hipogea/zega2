
<?php
$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('creadocumento')),
	array('label'=>'Editar', 'url'=>array('editadocumento', 'id'=>$model->id)),
	//array('label'=>'Delete Embarcaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('/guia/admin')),
);
?>

<?php MiFactoria::titulo('Ingreso  Generado'.$model->c_serie."-".$model->c_numgui."  ",'arrow_down');  ?> 

<?php				
       $this->renderPartial('viewcabecera', array("model"=>$model)); 
       ?>

<?php				
       $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$model->id,'eseditable'=>'false')); 

       ?>
</div>

