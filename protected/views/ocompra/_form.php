
<?php

$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        'Orden de compra'=>$this->renderPartial('_form1',array('model'=>$model),true,true),
        //'panel 2'=>'Content for panel 2',
       // 'panel 3'=>$this->renderPartial('pages/_content1',null,true),
    ),
    'options'=>array(
        'collapsible'=>true,
        'active'=>0,
    ),
    'htmlOptions'=>array(
        'style'=>'width:800px;padding:1px; backcolor:123;'
    ),
));

?>

