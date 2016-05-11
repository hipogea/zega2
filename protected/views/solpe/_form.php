<?php
/* @var $this SolpeController */
/* @var $model Solpe */
/* @var $form CActiveForm */
?>

<?PHP

$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs' => array(
			'General'=>array('id'=>'tab_general',
				'content'=>$this->renderPartial('_cabeza_general', array(
					'model'=>$model,
				),TRUE)),



						'Resumen'=>array('id'=>'tab_logss',
				'content'=>$this->renderPartial('vw_movimietos', array(
					'model'=>$model,
					'visible'=>false,
				),TRUE)),
			'Auditoria'=>array('id'=>'tab_auditoriass',
				'content'=>$this->renderpartial("//site/tab_auditoria",
					array('model'=>$model ),true)
			),





		),


		'options' => array(	'collapsible' => false,
			//'heightStyle'=>'auto',
			'height'=>'1600px',
		),
		// set id for this widgets
		'id'=>'MyTabes',
	)
)

;





?>
