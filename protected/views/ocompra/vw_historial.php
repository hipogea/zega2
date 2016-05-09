

<?php 


$this->widget('zii.widgets.grid.CGridView', array(
												'id'=>'detallex-grid',
												'dataProvider'=>Alentregas::model()->search_ide($ide),
        'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
                                                 'summaryText'=>'',
												'columns'=>array(
                                                    array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."camion.png","entrega")' ),

                                                    'cant',
                                                    array('name'=>'numkardex','type'=>'raw','value'=>'CHtml::link($data->alentregas_alkardex->alkardex_almacendocs->numvale,Yii::app()->createurl(\'/almacendocs/update\', array(\'id\'=> $data->alentregas_alkardex->hidvale ) ))'),
                                                    'alentregas_alkardex.alemi',
                                                    'alentregas_alkardex.codcentro',
                                                    'alentregas_alkardex.alkardex_almacendocs.fechacont',
																	'usuario',



                                                ),
													)
			) ;


 ?>