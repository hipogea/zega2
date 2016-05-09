
 <?php  $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$modelcabecera->id,'eseditable'=>$eseditable),false, true);
 ?>
	<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'cru-dialogdetalle',
		'options'=>array(
			'title'=>'Item',
			'autoOpen'=>false,
			'modal'=>true,
			'width'=>800,
			'height'=>500,
			'show'=>'Transform',
		),
	));
	?>
	<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
	<?php
	$this->endWidget();	//--------------------- end new code --------------------------
	?>



<?php  $createUrl = $this->createUrl('/cajachica/creadetalle',
										array(
										       "idcabeza"=>$modelcabecera->id,
												"asDialog"=>1,
												"gridId"=>'detalle-grid',
												//"idcabecera"=>Numeromaximo::numero_aleatorio(20,100000),
												
											)
							);
 $UrlDefault = $this->createUrl('/solpe/defaulte');
 ?>
 <div class="botones">

<?php echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/mas.png','', array('height'=>25,'width'=>25)), '#',array('onclick'=>" $('#cru-frame3').attr('src','$createUrl ');$('#cru-dialog3').dialog('open');")); ?>
 </div>
  <div class="botones">
<?php 
		ECHO CHtml::ajaxSubmitButton(' - ',array('solpe/borraitems'	),
	array('success'=>'reloadGrid'),
											array(
												 'confirm'=>'Esta seguro de borrar los items seleccionados ?',
												  ),
									array('class'=>'botonborra')		
											
 							);
			?>
  </div>

	<?php

	$UrlDefaultI = $this->createUrl('/solpe/cargafavorito',array(
		"id"=>$modelcabecera->id,
		"asDialog"=>1,
	));
	?>
	<div class="botones">
		<?php
		echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/estrellita.png','', array('height'=>25,'width'=>25)), '#',array('onclick'=>" $('#cru-detalle').attr('src','$UrlDefaultI');$('#cru-dialogdetalle').dialog('open');"));
		?>
	</div>




