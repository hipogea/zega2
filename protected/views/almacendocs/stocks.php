<div style=" 
    border:1px solid #79B4DC;
   
    margin : 2px;
    padding: 5px;
    width: 600px;
    float:left;">


	<div  style="
    width: 20%;
    float:left;">
        <?php $this->widget('ext.loading.LoadingWidget'); ?>
		<?php
			echo CHtml::image("/recurso/materiales/".$codigo.".JPG","",array("height"=>"200","width"=>"200")) ;
		?>

		
	</div>
	<div style="
	margin : 2px;
    padding: 5px;
    width: 70%;
    float:right;" >

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

		//'descripcion',
		//'punit',
				'punit',
			//array('name'=>'ptlibre','value'=>'Yii::app()->numberFormatter->format("0,##0.00",$data->ptlibre)'),


				//'codmon',


		//'creadopor',



				),
				)); ?>



	</div>
</div>



