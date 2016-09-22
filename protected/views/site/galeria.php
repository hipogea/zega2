<?php
$arrayimagenes=$model->recuperaarchivos(false);
//var_dump($arrayimagenes);
//$auditoria=$model->getauditoria
     $this->widget('ext.imagegallery1.ImageGallery1',array(

	'images'=>$arrayimagenes,

	'action'=>array('/inventario/borrafotos'),	

	'modelId'=>$modelo->idinventario,		// $model->primarykey (as an example)

 	'selectedImageId'=>$arrayimagenes[0],	// the ID for your image...any unique ID

	'onSuccess'=>'function(data){  }',

	'onError'=>'function(e){ alert(e);  }',

));                                           
                                                
  ?>


