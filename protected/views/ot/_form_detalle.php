<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'generales'=>array('id'=>'tab_..',
				'content'=>$this->renderPartial('_tab_labor_detalle', array('editable'=>$editable,'model'=>$model),TRUE)
			),


			'Auditoria'=>array('id'=>'tab___._..__',
				'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
			),



		),
		'options' => array('overflow'=>'auto','collapsible' => false,),
		'id'=>'MyTabidetealle',)
);
?>
