<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Acciones',
		));
		

		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
	?>
	<?php $this->endContent(); ?>
	
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Ver reporte',
		));
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										'name'=>'my_date',
										'model'=>null,
										'attribute'=>null,
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													//'buttonText'=>Yii::t('ui','...'),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
												     	'onSelect'=>'js:function(selected) {
													             $("#manito").attr("src","");
														
																	}',
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:0px;vertical-align:top',
															'readonly'=>'readonly',
															//'visible'=>'false',
															),
															));
		
	?>
	<?php $this->endContent(); 
		$this->endWidget();
	?>
	
	
	</div><!-- sidebar -->
</div>

