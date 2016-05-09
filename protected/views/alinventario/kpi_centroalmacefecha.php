<div>
<?php echo $form->labelEx($model,'codalm'); ?>
<?php
$datos = CHtml::listData(Almacenes::model()->findAll(array('order'=>'nomal')),'codalm','nomal');
echo $form->DropDownList($model,'codalm',$datos, array('empty'=>'--Llene el almacen--'));

?>
<?php echo $form->error($model,'codalm'); ?>
</div>


<div class="row">
    <?php echo $form->labelEx($model,'codcen'); ?>
    <?php
    $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
    echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Llene el centro emisor--'));
    ?>
    <?php echo $form->error($model,'codcen'); ?>
</div>

    <div class="row">
        <?php echo $form->labelEx($model,'fechaini'); ?>
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'my_date',
                'model'=>$model,
                'attribute'=>'fechaini',
                'language'=>Yii::app()->language=='es' ? 'es' : null,
                'options'=>array(
                    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                    'showOn'=>'button', // 'focus', 'button', 'both'
                    'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
                    'buttonImageOnly'=>true,
                    'dateFormat'=>'yy-mm-dd',
                ),
                'htmlOptions'=>array(
                    'style'=>'width:80px;vertical-align:top',
                    'readonly'=>'readonly',
                ),
            ));



        ?>
        <?php echo $form->error($model,'fechaini'); ?>
    </div>


<div class="row">
    <?php echo $form->labelEx($model,'fechafin'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        //'name'=>'my_date',
        'model'=>$model,
        'attribute'=>'fechafin',
        'language'=>Yii::app()->language=='es' ? 'es' : null,
        'options'=>array(
            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
            'showOn'=>'button', // 'focus', 'button', 'both'
            'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
            'buttonImageOnly'=>true,
            'dateFormat'=>'yy-mm-dd',
        ),
        'htmlOptions'=>array(
            'style'=>'width:80px;vertical-align:top',
            'readonly'=>'readonly',
        ),
    ));



    ?>
    <?php echo $form->error($model,'fechafin'); ?>
</div>
