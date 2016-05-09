<?php
/* @var $this EventosController */
/* @var $model Eventos */

$this->breadcrumbs=array(
	'Eventoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Eventos', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Eventos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View Eventos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codocu',
		'estadofinal',
		'estadoinicial',
		'descripcion',
		'creadopor',
		'creadoel',
	),
)); ?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clipro-form',	
	'enableClientValidation'=>false,
    //'clientOptions' => array(
       //  'validateOnSubmit'=>true,
       //  'validateOnChange'=>true       
    // ),
	'enableAjaxValidation'=>true,
	
)); ?>

	<?php
				///solo si es el usuario administrador de mensajes

	        If (Yii::app()->params['esmensajero']==$usuario=Yii::app()->user->name) {
			
			$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(	
							'Mensajes'=>array('id'=>'mensajes',
										'content'=>$this->renderPartial(
													'mensajes',
                                               array('model'=>$model,'proveedor'=>$proveedor),true
								 )

											
											),
							
						
							  
							  
								), 
   
						'options' => array(
									'collapsible' => true,
										),
   
													'id'=>'Mytab',
					));

 
					

		}

		?>










<?php $this->endWidget(); ?>

<?php
print_r(Mensajesd::model()->listarcorreos ($model->id,'1'));
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Destinatario',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>300,
        'height'=>150,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
