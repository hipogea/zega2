
<div style="display:table;">
	<div style="display:table-row;">

		<div style="float:left;"  >
			<br>
        <?php // $this->widget('ext.loading.LoadingWidget'); ?>
		<?php
			//echo CHtml::image("/recurso/materiales/".$codigo.".JPG","",array("height"=>"200","width"=>"200")) ;
        Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$codigo.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",80,70)
        ?>
	</div>
	<div style="float:left;"  >
<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'alinvedntario-grid',
	       'itemsCssClass'=>'table table-striped table-bordered table-hover',
	       //'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid-pequeno.css',
			'dataProvider'=>Alinventario::model()->search_por_codigo($codigo),
			//'filter'=>$model,
			'summaryText'=>'',
				'columns'=>array(
				'codcen',
				'codalm',
				//'alinventario_ums.desum',
				//array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>60,"width"=>"60"))'),
				'cantlibre',
                    'maestro.maestro_ums.desum',
				'cantres',
			array('name'=>'punit','value'=>'round($data->punit,2)'),
					'codmon',
				),
				)); ?>
	</div>
	</div>
</div>



