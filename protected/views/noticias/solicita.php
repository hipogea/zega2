
<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>

<?PHP
$this->menu=array(
	array('label'=>'Tablon', 'url'=>array('admin')),
	array('label'=>'Publicar', 'url'=>array('solicita')),
	array('label'=>'Mis avisos Pendientes', 'url'=>array('adminusuariopendientes')),
	array('label'=>'Mis avisos y otros', 'url'=>array('useryaprobados')),
	array('label'=>'Todos del tablon', 'url'=>array('todosdeltablon')),
);
?>




<div class="division">
<div class="wide form">
	<?php
	foreach(Yii::app()->user->getFlashes() as $key => $message) {
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
	?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'noticias-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php
    echo "<div class='botones'>";
    echo CHtmL::imageButton(Yii::app()->getTheme()->baseUrl.'/img/save.png', array ( ));
    echo "</div>";

    ?>

               <div class="row">

						<?php echo $form->labelEx($model,'tiponoticia'); ?>
						<?php  $datos = array('01' => 'Aviso','02'=> 'Onomastico','03'=> 'Efemeride');
							echo $form->DropDownList($model,'tiponoticia',$datos, array('empty'=>'--Seleccione un tipo--')  )  ;	?>
						<?php echo $form->error($model,'tiponoticia'); ?>
	
					</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txtnoticia'); ?>
		<?php echo $form->textArea($model,'txtnoticia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'txtnoticia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechapropuesta'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechapropuesta',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:80px;vertical-align:top',
															'readonly'=>'readonly',
															
															),
															));
	        ?>
		<?php echo $form->error($model,'fechapropuesta'); ?>
	</div>


    <div class="row">
        <?php echo $form->labelEx($model,'fexpira'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            //'name'=>'my_date',
            'model'=>$model,
            'attribute'=>'fexpira',
            'language'=>Yii::app()->language=='es' ? 'es' : null,
            'options'=>array(
                'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showOn'=>'button', // 'focus', 'button', 'both'
                'buttonText'=>Yii::t('ui','...'),
                'dateFormat'=>'yy-mm-dd',
            ),
            'htmlOptions'=>array(
                'style'=>'width:80px;vertical-align:top',
                'readonly'=>'readonly',

            ),
        ));
        ?>
        <?php echo $form->error($model,'fexpira'); ?>
    </div>





<?php $this->endWidget(); ?>

</div><!-- form -->
    </div>