<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Camara'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('//site/celular', array('model'=>$model),TRUE)
					),

					'Subir de disco'=>array('id'=>'tab__',
						'content'=>$this->renderPartial('//site/disco', array('model'=>$model),TRUE)
					),

					'Webcam'=>array('id'=>'tab___._..__',
						'content'=>$this->renderPartial('//site/camara', array('model'=>$model),TRUE)
					),
                                    //'Galeria'=>array('id'=>'tab___._....__',
						//'content'=>$this->renderPartial('//site/galeria', array('model'=>$model),TRUE)
					//),

				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabi',)
		);
		?>

