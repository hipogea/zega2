<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docingresados-grid',
  // 'cssFile' => yii::app()->getBaseUrl(true).DIRECTORY_SEPARATOR.Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'dataProvider'=>$proveedor,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
    'summaryText'=>'',
	'columns'=>$arraycolumnas,
    )); ?>


		


