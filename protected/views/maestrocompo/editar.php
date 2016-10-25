<?PHP
$this->menu=array(
array('label'=>'Visualizar', 'url'=>array('ver','id'=>$model->codigo)),
	array('label'=>'Listado', 'url'=>array('admin')),
); ?>

<?PHP
MiFactoria::titulo('Editar material  '.$model->codigo,'color_swatch_2')
?>

<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Datos generales'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('tab_editar', array('form'=>$form,'model'=>$model),TRUE)
					),


					'Auditoria'=>array('id'=>'tab___._..__',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
					),




				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabir',)
		);
		?>


<?php 
$this->widget('ext.adGallery.AdGallery',
        array(
            'imageList' => array(
                array(
                    'image_url' => '/recurso/materiales/12000003.JPG',
                    'thumb_url' => '/recurso/materiales/12000003.JPG',
                    'title' => 'Test tile',
                    'link' => 'http://www.google.com/',
                    'alt' => 'Something something',
                ),
                array(
                    'image_url' => '/recurso/materiales/12000004.JPG',
                    'title' => 'Test tile sdfjaskdf',
                    'link' => 'http://www.msn.com/',
                ),
                '/recurso/materiales/12000004.JPG',
                '/recurso/materiales/12000005.JPG',
                '/recurso/materiales/12000006.JPG',
               '/recurso/materiales/12000007.JPG',
               '/recurso/materiales/12000008.JPG',
              '/recurso/materiales/12000009.JPG',
                '/recurso/materiales/12000010.JPG',
                
            ),
        )
    );

?>