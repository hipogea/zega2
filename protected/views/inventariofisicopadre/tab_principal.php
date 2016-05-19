
<div class="panelizquierdo">

    <div class="row">
        <?php echo $form->labelEx($model,'numero'); ?>
        <?php echo $form->textField($model,'numero',array('size'=>12,'maxlength'=>12,'disabled'=>'disabled')); ?>
        <?php echo $form->error($model,'numero'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'ano'); ?>
        <?php echo $form->textField($model,'ano',array('disabled'=>'disabled','size'=>2,'maxlength'=>2)); ?>
        <?php echo $form->error($model,'ano'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'mes'); ?>
        <?php echo $form->textField($model,'mes',array('disabled'=>'disabled','size'=>2,'maxlength'=>2)); ?>
        <?php echo $form->error($model,'mes'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'esciego'); ?>
        <?php echo $form->checkBox($model,'esciego'); ?>

    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'descripcion'); ?>
        <?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
        <?php echo $form->error($model,'descripcion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'fechaprog'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'fechaprog', //attribute name
            'language'=>'es',
            'mode'=>'datetime', //use "time","date" or "datetime" (default)
            'options'=>array( 'dateFormat'=>'yy-mm-dd',
                'showOn'=>'button', // 'focus', 'button', 'both'
                'buttonText'=>Yii::t('ui',' ... '),
                //'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
                //'buttonImageOnly'=>true,
            ),
            'htmlOptions'=>array(
                'style'=>'width:150px;vertical-align:top',
                //'readonly'=>'readonly',
            ),				// jquery plugin options
        ));
        ?>
        <?php echo $form->error($model,'fechaprog'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'fechafin'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'fechafin', //attribute name
            'language'=>'es',
            'mode'=>'datetime', //use "time","date" or "datetime" (default)
            'options'=>array( 'dateFormat'=>'yy-mm-dd',
                'showOn'=>'button', // 'focus', 'button', 'both'
                'buttonText'=>Yii::t('ui',' ... '),
                //'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
                //'buttonImageOnly'=>true,
            ),
            'htmlOptions'=>array(
                'style'=>'width:150px;vertical-align:top',
                //'readonly'=>'readonly',
            ),				// jquery plugin options
        ));
        ?>
        <?php echo $form->error($model,'fechafin'); ?>
    </div>



</div>
<div class="panelizquierdo">
    <div class="row">
        <?php echo $form->labelEx($model,'fechacre'); ?>
        <?php echo $form->textField($model,'fechacre',array('disabled'=>'disabled')); ?>
        <?php echo $form->error($model,'fechacre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'codresponsable'); ?>
        <?php

        if ($this->eseditable($model->codestado))

        {
            $this->widget('ext.matchcode.MatchCode',array(
                    'nombrecampo'=>'codresponsable',
                    'ordencampo'=>1,
                    'controlador'=>$this->id,
                    'relaciones'=>$model->relations(),
                    'tamano'=>6,
                    'model'=>$model,
                    'form'=>$form,
                    'nombredialogo'=>'cru-dialogdetalle',
                    'nombreframe'=>'cru-detalle',
                    'nombrearea'=>'fehgdfddj',
                )

            );
        } else{
            echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

        }
        ?>
        <?php echo $form->error($model,'codresponsable'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'codestado'); ?>
        <?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
        <?php echo $form->error($model,'codestado'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'codal'); ?>
        <?php
        if($model->isNewRecord) {
            $datos1 = CHtml::listData(Almacenes::model()->findAll(array('order'=>'nomal')),'codalm','nomal');
            echo $form->DropDownList($model,'codal',$datos1, array('empty'=>'--Seleccione un Almacen--',
            ) ) ;
        } else {
            echo $form->textField($model,'codal',array('size'=>4,'disabled'=>'disabled'));
        }
        ?>
        <?php echo $form->error($model,'codcen'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'codcen'); ?>
        <?php
        if($model->isNewRecord) {
            $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
            echo $form->DropDownList($model,'codcen',$datos1, array('empty'=>'--Seleccione un centro--',
            ) ) ;
        } else {
            echo $form->textField($model,'codcen',array('size'=>4,'disabled'=>'disabled'));
        }
        ?>
        <?php echo $form->error($model,'codcen'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'hidcarga'); ?>
        <?php

            $datos1 = CHtml::listData(Cargamasiva::model()->findAll(array('order'=>'descripcion')),'id','descripcion');
            echo $form->DropDownList($model,'hidcarga',$datos1, array('empty'=>'--Seleccione plantilla de carga--',
            ) ) ;
      ?>
        <?php echo $form->error($model,'codcen'); ?>
    </div>


</div>