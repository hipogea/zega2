<div style="position:absolute;width:280px;height:80px; padding:0px; top:<?php echo $ylogo-1; ?>px; left:<?php echo $xlogo-1; ?>px; border-style:solid; border-width:1px; ">



</div>

<div style="position:absolute; padding:1px; top:<?php echo $ylogo; ?>px; left:<?php echo $xlogo; ?>px; ">

				<div style="float:left">
					<?php echo CHTml::image(Yii::app()->baseUrl.yii::app()->params['imgreportes'].$idreporte.".JPG",'',array('border'=>'1','width'=>150,'height'=>100)); ?>
				</div>

</div>
<div style="position:absolute;  padding:0px; float:left; left:<?php echo ($xlogo+100); ?>px; top:<?php echo ($ylogo+10); ?>px;">

							<span style="font-family:courier; font-size:10px !important;">
								<?php echo $model->dsocio; ?>
							</span>
	<div  >
							<span style="font-family:courier; font-size:7px !important;">
								<?php echo $model->direccionfiscal; ?>
							</span>
	</div>
	<div>
							<span style="font-family:courier; font-size:7px !important;">
								<?php echo $model->getAttributeLabel('rucsoc')." : ".$model->rucsoc; ?>
							</span>
	</div>
	<div >
							<span style="font-family:courier; font-size:7px !important;">
								<?php  echo $model->getAttributeLabel('telefono')." : ".$model->telefono;  ?>
							</span>
	</div>
	<div >
							<span style="font-family:courier; font-size:7px !important;">
								<?php  echo $model->getAttributeLabel('mail')." : ".$model->mail."    ".$model->web; ?>
							</span>
	</div>
</div>



