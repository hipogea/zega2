

<?php
$mode=new Alinventario();
?>


<div class="division">
	Numero de items en inventario   :               <span class="label badge-warning" > <?php echo $mode->getnumeroitems($model->codcen,$model->codalm);?>
		</span>

	<br>



<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'General'=>array('id'=>'tab_',
				'content'=>$this->renderPartial('tab_form', array('model'=>$model),TRUE)
			),
			'Stock'=>array('id'=>'tab__',
				'content'=>$this->renderPartial('adminalmacenes', array('model'=>$model,'codal'=>$codal,'codcen'=>$codcen),TRUE)
			),
			'Supervision del stock '=>array('id'=>'tab___',
				'content'=>$this->renderPartial('tab_supervision', array('model'=>$model,'codal'=>$codal,'codcen'=>$codcen),TRUE)
			),
			'Evolucion '=>array('id'=>'tab___tr',
				'content'=>$this->renderPartial('tab_evolucion', array('model'=>$model,'codal'=>$codal,'codcen'=>$codcen),TRUE)
			),
		/*	'Solicitudes Pend '=>array('id'=>'tab___',
				'content'=>$this->renderPartial('tab_solicitudes_pend', array('model'=>$model,'codal'=>$codal,'codcen'=>$codcen),TRUE)
			),*/
		),
		'options' => array(	'collapsible' => false,),
		'id'=>'MyTabi',)
);
?>

</div>