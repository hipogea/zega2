<?php
/* @var $this CrugeGruposMailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cruge Grupos Mails',
);

$this->menu=array(
	array('label'=>'Create CrugeGruposMail', 'url'=>array('create')),
	array('label'=>'Manage CrugeGruposMail', 'url'=>array('admin')),
);
?>

<h1>Cruge Grupos Mails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
