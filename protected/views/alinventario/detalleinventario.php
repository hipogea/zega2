<?php MiFactoria::titulo('Inventario :'.$model->codart.'  .  '.$model->maestro->descripcion,'package')  ?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alinventario-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="division">

		<?php

		$botones=array(


			'balanza'=>array(
				'type'=>'C',
				'ruta'=>array($this->id.'/conteofisico',array(
					'id'=>$model->id,"cest"=>'01',
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'conteo-grid',
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array('20'),

			),

			'abacus'=>array(
				'type'=>'C',
				'ruta'=>array($this->id.'/conteofisico',array(
					'id'=>$model->id,"cest"=>'01',
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array('20'),

			),
			'config'=>array(
				'type'=>'C',
				'ruta'=>array('maestrocompo/editadetalle',array(
					'almacen'=>$model->codalm,'centro'=>$model->codcen,'codigo'=>$model->codart,
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array('20'),

			),

		);

		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'20',

			)
		);?>


</div>
<?PHP
$proveedor=VwKardex::model()->search_pormaterial($model->codcen,$model->codalm,$model->codart);
$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(
						'General'=>array('id'=>'tab_item',
							'content'=>$this->renderPartial('_form', array(
							'model'=>$model,'form'=>$form),TRUE)
						),
							'Historial'=>array('id'=>'tab_reservas',
							'content'=>$this->renderpartial('vistakardex',array('model'=>$model,'proveedor'=>$proveedor   ), true),
							),
						       'Otros centros'=>array('id'=>'tab_modelo',
							        'content'=>$this->renderpartial('stocks',array('model'=>$model,   ), true),
								   ),
						'pronostico'=>array('id'=>'tab_pronostico',
							'content'=>$this->renderpartial('vw_pronostico',array('model'=>$model,'form'=>$form   ), true),
						),

						'lotes'=>array('id'=>'tab_lotesuu',
							'content'=>$this->renderpartial('vw_lotes',array('orden'=>$orden,'model'=>$model,'form'=>$form   ), true),
						),
						'Conteos'=>array('id'=>'tab_conteosuu',
							'content'=>$this->renderpartial('vw_conteo',array('model'=>$model,'form'=>$form   ), true),
						),

					),




					'options' => array(	'collapsible' => false,
						                'heightStyle'=>'auto',
						             ),
    // set id for this widgets
					'id'=>'MyTab',
												)
			)

;


		 
		 
		 
?>





<?php $this->endWidget(); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>300,
	),
));
?>
	<iframe id="cru-detalle" width="100%" height="100%"></iframe>
<?php $this->endWidget();?>