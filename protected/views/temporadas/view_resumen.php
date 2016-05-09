<?php $this->widget('zii.widgets.CDetailView', array(
															'data'=>$model,
															//'cssFile' =>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemadetalle'].'style.css',
															'cssFile' =>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemadetalle'].'styles.css',
															'attributes'=>array(
	 //	'id',
															'destemporada',
																'nomespecie',
																'inicio',
																'termino',
																'cuota_anchoveta',
																'sdeclarada',
																array('name'=>'sdescargada','value'=>Yii::app()->numberFormatter->format("0,##0.00",$model->sdescargada)),
																'horasta',
																'sd2',
																'd2porhora',
																'sct',
																'sfd',
																'bodega',
															'eficienciabodega',
															
															'cumplimiento',
																	),
													)); 
											?>	