<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
	<?php  $datos = array('P' => 'Maquinaria Plantas ','A' => 'Maquinaria embarcaciones ','B'=> 'Artefactos operaciones flota','C'=> 'Muebles oficina','D' => 'Equipos de computo','E' => 'Equipos del local','F'=>'Seguridad naval','G'=>'Equipos PAMA');
		  echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
	<?php echo $form->error($model,'tipo'); ?>
	</div>