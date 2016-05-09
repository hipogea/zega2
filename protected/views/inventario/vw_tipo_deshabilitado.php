<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
	<?php  $datos = array('A' => 'Maquinaria embarcaciones ','B'=> 'Artefactos operaciones flota','C'=> 'Muebles oficina','D' => 'Equipos de computo','E' => 'Equipos del local','F'=>'Seguridad naval');
		  echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--', 'disabled'=>'disabled')  )  ;	?>
	<?php echo $form->error($model,'tipo'); ?>
	</div>