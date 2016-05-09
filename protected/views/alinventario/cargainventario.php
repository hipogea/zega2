<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(

 'id'=>'csv-form',

 'enableAjaxValidation'=>false,

    'htmlOptions'=>array('enctype' => 'multipart/form-data'),

)); ?>



	<?php //echo $form->errorSummary($model); ?>

	<div class="row">





		<?php echo $form->hiddenField($model,'id'); ?>

	</div>

	<div class="row">

		<?php echo $form->labelEx($model,'Alinventario'); ?>

		<?php

            $this->widget('CMultiFileUpload', array(

                'model'=>$model,

                'name' => 'csvfile', ///el input name del form

                'max'=>1,

                'accept' => 'csv',

                'duplicate' => 'Duplicate file!',

                'denied' => 'Invalid file type',

            ));

        ?>

		<?php echo $form->error($model,'Alinventario'); ?>

	</div>



	<div class="row buttons">

		<?php echo CHtml::submitButton('Import',array("id"=>"Import",'name'=>'Import')); ?>

	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
