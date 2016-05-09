<?php
$this->widget('CTreeView', array(
    'id'=>'myteam-treeview',
    'data'=>array(
                    array('text'=>'<span class="manager">Solicitudes</span>',
                         'children'=>$arraysolpes,
                    ),
             array('text'=>'<span class="manager">Ordenes de compra</span>',
            'children'=>$arraycompras,
                     ),
                ),
    'collapsed'=>'false',
    'htmlOptions'=>array(
        'class'=>'usertree', //apply usertree definition in css
        //'class'=>'treeview-famfamfam',
    ),
));
?>

<?php

?>