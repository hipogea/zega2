<?php

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-gridx',
	'dataProvider'=>Inventariofisico::model()->search_por_inventario($model->id),
	// 'dataProvider'=>VwKardex::model()->search(),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		//'numkardex',
		'id',
		array(
			'name'=>'fecha',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Para',
			'value'=>'date("d/m/y", strtotime($data->fecha))',
			'htmlOptions'=>array('width'=>40),
		),
		array('name'=>'iduser', 'type'=>'html','value'=>'yii::app()->user->um->LoadUserById($data->iduser)->username."   ".CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business.png","",array())'),
		'cant',
		'diferencia',
		'monto',

		array(
			'class'=>'CButtonColumn',
			'buttons'=>array(

				'view'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/alinventario/editaconteofisico/", array("id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id,"ed"=>"no",))',
						'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'view.png',
						'label'=>'Actualizar Item',
					),
				'update'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/alinventario/editaconteofisico/", array("id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id,"ed"=>"no",))',
						'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png',
						'label'=>'Actualizar Item',
					),
				'delete'=>
					array(

						'visible'=>'false',
					),

			),
		),


    ),
)); ?>
