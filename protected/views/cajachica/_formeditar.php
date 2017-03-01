<?php
//var_dump($model->hijos);die();
 if(!$model->isNewRecord and (count($model->hijos) >0)){
   ?>


  
    <?php 
$prove=Dcajachica::model()->search_por_cargo_a_rendir($idcabeza,$model->id);

        $this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'Inicio'=>array('id'=>'tab_',
				'content'=>$this->renderPartial('_form_detalle', array('model'=>$model,'idcabeza'=>$idcabeza),TRUE)
			),
			'Rendiciones'=>array('id'=>'tab_ui',
				'content'=>$this->renderPartial('//trabajadores/vw_detalle_grilla', array('prove'=>$prove),TRUE)
			),
                    
                   
                    
                    
                    
			'Auditoria'=>array('id'=>'tab__3__..__',
				'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
			),
                    
                  


		),
		'options' => array('overflow'=>'auto','collapsible' => false,),
		'id'=>'MyTabi',)
);

 } else{
     $this->render('_form_detalle',array(
			'model'=>$model, 'idcabeza'=>$model->hidcaja
		));
 }
?>



<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>400,
		'height'=>300,
	),
));
?>
	<iframe id="cru-detalle" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>