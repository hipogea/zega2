<h1>My Players</h1> 
 
<!--  CODE TO INSERT NEW PLAYER BEGINS --> 
<div id='results'>...</div> 
<script> 
        function allFine(data) { 
                // display data returned from action 
                $("#results").html(data); 
                // refresh your grid 
                $.fn.yiiGridView.update('player-grid'); 
        } 
</script> 
<?php echo CHtml::ajaxButton("Insert New Player", array(Yii::app()->createUrl('site/index')), array('success'=>'allFine')); ?> 
<!--  CODE TO INSERT NEW PLAYER ENDS --> 
 
<?php 
$this->widget('zii.widgets.grid.CGridView', array( 
        'id'=>'player-grid', 
    'dataProvider'=>$dataProvider, 
    'columns'=>array( 
        'idplayer', 
        'firstname', 
        'lastname', 
    ), 
)); 
?>


