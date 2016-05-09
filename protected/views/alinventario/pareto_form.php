
<div class="division">
    <div class="wide form">


    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    

    
        <div class="row">
            <?php echo $form->labelEx($model,'centro'); ?>
            <?php echo $form->textField($model,'centro',array('size'=>4)); ?>
            <?php echo $form->error($model,'centro'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'almacen'); ?>
            <?php echo $form->textField($model,'almacen',array('size'=>3)); ?>
            <?php echo $form->error($model,'almacen'); ?>

        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'rangoa'); ?>
            <?php echo $form->textField($model,'rangoa',array('size'=>4)); ?>
            <?php echo $form->error($model,'rangoa'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'rangob'); ?>
            <?php echo $form->textField($model,'rangob',array('size'=>4)); ?>
            <?php echo $form->error($model,'rangob'); ?>

        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'rangoc'); ?>
            <?php echo $form->textField($model,'rangoc',array('size'=>4)); ?>
            <?php echo $form->error($model,'rangoc'); ?>

        </div>


        <div class="row">
            <?php echo $form->labelEx($model,'codtipo'); ?>
            <?php  $datos = CHtml::listData(Maestrotipos::model()->findAll(),'codtipo','destipo');
            echo $form->DropDownList($model,'codtipo',$datos,array('empty'=>'--Seleccione Tipo--') ) ;
            ?>
            <?php echo $form->error($model,'codtipo'); ?>
        </div>


        <div class="row buttons">
            <?php echo CHtml::submitButton('ver',array('class'=>'btn btn btn-primary')); ?>
        </div>
    
    <?php $this->endWidget(); ?>


    </div><!-- form -->
</div><!-- form -->


