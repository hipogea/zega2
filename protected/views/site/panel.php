



<div class="division">
<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'home.png',"hola");?>
Gestion de materiales
<li>
<ul>
<?php echo CHtml::link('Solicitudes',Yii::app()->createUrl('/solpe/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Compras',Yii::app()->createUrl('/ocompra/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Inventario',Yii::app()->createUrl('/alinventario/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Materiales',Yii::app()->createUrl('/maestrocompo/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Kardex',Yii::app()->createUrl('/alkardex/admin'),array()); ?>
</ul>
</li>

<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'base.png',"hola");?>
</div>


<div class="division">
<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'blue-print1.png',"hola");?>
Transporte


<li>
<ul>
<?php echo CHtml::link('Movimientos',Yii::app()->createUrl('/VwGuia/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Transportistas',Yii::app()->createUrl('/Choferes/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Vehiculos',Yii::app()->createUrl('/embarcaciones/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Puntos',Yii::app()->createUrl('/direcciones/admin'),array()); ?>
</ul>
<ul>
<?php echo CHtml::link('Lugares',Yii::app()->createUrl('/Lugares/admin'),array()); ?>
</ul>
</li>
<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'base.png',"hola");?>


</div>


<?php //mkdir('webroot.yo.indice',07777); ?>