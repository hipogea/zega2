 <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detallex-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'summaryText'=>'->',
	'columns'=>array(
			array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->id',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajita[]',
                                ),
                            ),
            array('name'=>'id','header'=>'Correl','type'=>'raw','value'=>'CHtml::openTag("tag",array("class"=>"label badge-success")).$data->id.CHtml::closeTag("span")','htmlOptions'=>array('width'=>10)),
	 array(
			'name'=>'fecha',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Fecha',
			'value'=>'date("d.m.Y", strtotime($data->fecha))',
			'htmlOptions'=>array('width'=>50),
		),
		array('name'=>'tipoflujo','header'=>'Tipo','value'=>'$data->flujos->destipo','htmlOptions'=>array('width'=>140)),
		array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->tipoflujo=="102")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."rojo.png"):""'),

		array('name'=>'glosa','header'=>'Glosa','htmlOptions'=>array('width'=>205)),
		array('name'=>'codocu','header'=>'Documento','value'=>'$data->documentos->desdocu','htmlOptions'=>array('width'=>200)),
		array('name'=>'referencia','header'=>'Ref.','htmlOptions'=>array('width'=>205)),
		array('name'=>'debe','header'=>'Cargo','htmlOptions'=>array('width'=>5)),
		array('name'=>'monedahaber','header'=>'Mon','htmlOptions'=>array('width'=>5)),
		array('name'=>'monto','header'=>'Monto','type'=>'raw','value'=>'CHTml::openTag("span",array("style"=>"color:#ff6600;float:right;font-weight:bold;")).MiFactoria::Decimal($data->monto).CHTml::closeTag("span")','footer'=>MiFactoria::Decimal((Dcajachica::getMonto($prove,2))),'htmlOptions'=>array('width'=>5)),

		//array('name'=>'codtra','header'=>'Responsable','value'=>'$data->trabajadores->ap."-".$data->trabajadores->am."-".$data->trabajadores->nombres','htmlOptions'=>array('width'=>405)),
		array('name'=>'Ceco','header'=>'Cc','type'=>'raw','value'=>'$data->ceco','htmlOptions'=>array('width'=>80),'footer'=>CHTml::openTag("span",array("style"=>"color:#ff6600;float:right;font-weight:bold;")).MiFactoria::decimal($model->debe-Dcajachica::getMonto($prove,2)).CHTml::closeTag("span")),
		//array('name'=>'Imput','header'=>'Imput','value'=>'$data->cco->desceco','htmlOptions'=>array('width'=>140)),
		array('name'=>'estado','header'=>'Estado','value'=>'$data->estado->estado','htmlOptions'=>array('width'=>100)),

	   ),
)); ?>


 <div class="row buttons">
		<?php echo CHtml::submitButton( 'Liquidar deudas seleccionadas' ,array("class"=>"botoncito")); ?>
	</div>