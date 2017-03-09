<?php  

IF($valor=='K')
  $ruta=$this->createUrl('Request/suggestceco');
elseif($valor=='T')
     $ruta=$this->createUrl('Request/suggestot');

$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>New Dcajachica(),
			'attribute'=>$campo,
                        'source'=>$ruta,
                        'options'=>array(
				'showAnim'=>'fold',), 
                             
						)); 
?>