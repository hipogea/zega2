<div class="form">

<table class="table table-striped table-bordered table-hover">
<tr><th>Fecha</th><th>Dia</th></tr>
<?php 
//var_dump($items);
foreach($dias as $i=>$dia): ?>

<tr>
 <td><span style=" font-size:14px; "><?PHP ECHO CHtml::link($dia,yii::app()->createUrl($this->id.DIRECTORY_SEPARATOR.updatecambiolog,array('fecha'=>$dia)),array("style"=>"color:#da1034;") ); ?></span></td>
 <td><?php echo MiFactoria::diassemana()[date('w',strtotime($dia))] ?></td>

</tr>
<?php endforeach; ?>
</table>
 


</div><!-- form -->

