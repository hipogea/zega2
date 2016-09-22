
<?php
$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('editadocumento', 'id'=>$model->id)),
	//array('label'=>'Delete Embarcaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1> Guia de remision Generada <?php echo $model->c_serie."-".$model->c_numgui  ?> </h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_serie',
		'c_numgui',
		'destinatario.despro',
		'd_fectra',
		'd_fecgui',
		'direccionesllegada.c_direc'
		//'codsap',
		//'creadopor',
		//'creadoel',
		//'modificadopor',
		//'modificadoel',
		//'codcentro',
	),
)); ?>



<?php
				
       $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$model->n_guia,'eseditable'=>'disabled'));   
	

				  
				
				  
		



 ?>


