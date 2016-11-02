<?PHP
$this->menu=array(
array('label'=>'Visualizar', 'url'=>array('ver','id'=>$model->codigo)),
	array('label'=>'Listado', 'url'=>array('admin')),
); ?>

<?PHP
MiFactoria::titulo('Editar material  '.$model->codigo,'color_swatch_2')
?>

<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Datos generales'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('tab_editar', array('form'=>$form,'model'=>$model),TRUE)
					),


					'Auditoria'=>array('id'=>'tab___._..__',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
					),




				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabir',)
		);
		?>





