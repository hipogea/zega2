
<?PHP 
   
$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(
									//'StaticTab 1' => 'Content for tab 1',
									//'StaticTab 2' => array('content' => 'Content for tab 2', 'id' => 'tab2'),
        // panel 3 contains the content rendered by a partial view
									//'AjaxTab' => array('ajax' => $this->createUrl('..')),
									//'StaticTab 21' => array('content' => 'Content for tab 23', 'id' => 'tab23'),
									'Observaciones'=>array('id'=>'tab_motorycaja',
														'content'=>$this->renderPartial('_tab_observaciones', array('canica'=>$canica,'proveedorobs'=>$proveedorobs),TRUE)
																			),
									'Historial movimientos'=>array('id'=>'tab_historial',
														'content'=>$this->renderPartial('_tab_historial', array('modelolog'=>$modelolog,'proveedorlog'=>$proveedorlog),TRUE)
																			),
									
									'Procedimientos'=>array('id'=>'tab_procedimientos',
														'content'=>$this->renderPartial('_tab_procedimientos', array('canica'=>$canica),TRUE)
																			),
									
								        'Modificaciones'=>array('id'=>'tab_auditoria',
														'content'=>$this->renderPartial('_tab_auditoria', array('modeloapintar'=>$model,'clave'=>$canica),TRUE)
																			),
									),
								 
    // additional javascript options for the tabs plugin
					'options' => array(	'collapsible' => false,),
    // set id for this widgets
					'id'=>'MyTabi',
												)
			);

?>
	
		 
		 
