<div class="row">
<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'cog.png',"hola",array('width'=>'30','height'=>'15')); ?><h1>Ajustes de Documentos de compra  <?php  echo "    - ".Yii::app()->user->name;  ?></h1>
</div>


  <div style="width:500px; ">
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid2',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	'summaryText'=>'',
	'columns'=>array(
		'desdocu',
                'idusuario',
		'campo',
		'nombrecampo',
		'valor',
                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/Opcionesdocumentos/Update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                                    'click'=>('function(){ 
							    $("#cru-detalle").attr("src",$(this).attr("href")); 
							    $("#cru-dialogdetalle").dialog("open");  
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png', 
								'label'=>'Actualizar Item', 
                                ),
								'delete'=>
                              array(
                                   
								'visible'=>'false',
                                ),

                            ),
		),
                                
	),
)); ?>
       </div> 








<div style="width:500px; ">
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$proveedor1,
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	'summaryText'=>'',
	'columns'=>array(
		'desdocu',
                'idusuario',
		'campo',
		'nombrecampo',
		'valor',
                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/Opcionesdocumentos/Update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                                    'click'=>('function(){ 
							    $("#cru-detalle").attr("src",$(this).attr("href")); 
							    $("#cru-dialogdetalle").dialog("open");  
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png', 
								'label'=>'Actualizar Item', 
                                ),
								'delete'=>
                              array(
                                   
								'visible'=>'false',
                                ),

                            ),
		),
                                
	),
)); ?>
                
     	
        
      </div>



<h1>Tenores de reporte</h1>

<div style="width:500px; ">
    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'detalle-grid3',
        'dataProvider'=>Tenores::model()->search('021'),
        //'filter'=>$model,
        //'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

        'summaryText'=>'',
        'columns'=>array(
            'coddocu',
            'posicion',
            'mensaje',
            'activo',
            'sociedad',

            array(
                'class'=>'CButtonColumn',
                'buttons'=>array(

                    'view'=>
                        array(

                            'visible'=>'false',
                        ),

                    'update'=>
                        array(
                            'url'=>'$this->grid->controller->createUrl("/Tenores/Update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                            'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
                            'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png',
                            'label'=>'Actualizar Item',
                        ),
                    'delete'=>
                        array(

                            'visible'=>'false',
                        ),

                ),
            ),

        ),
    )); ?>
</div>


<h1> Logo del documento</h1>
<div class="division" ">
    <?php

        $ruta='logos'.DIRECTORY_SEPARATOR;
        $this->widget('ext.coco.CocoWidget'
            ,array(
                'id'=>'cocowidget1',
                'onCompleted'=>'function(id,filename,jsoninfo){  }',
                'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
                'onMessage'=>'function(m){ alert(m); }',
                'allowedExtensions'=>array('JPEG','JPG','gif','PNG'), // server-side mime-type validated
                'sizeLimit'=>2000000, // limit in server-side and in client-side
                'uploadDir' => $ruta, // coco will @mkdir it
                // this arguments are used to send a notification
                // on a specific class when a new file is uploaded,
                'buttonText'=>'Subir Logo',
                'receptorClassName'=>'application.models.Opcionesdocumentos',
                'methodName'=>'FileReceptor',
                'userdata'=>$this->documento,
                // controls how many files must be uploaded
                'maxUploads'=>1, // defaults to -1 (unlimited)
                'maxUploadsReachMessage'=>'No esta permitido cargar mas archivos', // if empty, no message is shown
                // controls how many files the can select (not upload, for uploads see also: maxUploads)
                'multipleFileSelection'=>true, // true or false, defaults: true
                'nombrealt'=>'021',
            ));


    ?>

    <div >
        <DIV ID="imagenmaterial" >
            <?php

            echo CHtml::image(
                "/recurso/logos/".$this->documento.".JPG"
                ,"",
                array('width'=>'120','height'=>'120')

            );

            ?>
        </DIV>
    </div>

</div> <!--  FIn del panel derecho      !-->



<h1>Coordendas Reporte</h1>

<div style="width:500px; ">
    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'detalle-grid4',
        'dataProvider'=>Coordocs::model()->search('021'),
        //'filter'=>$model,
        //'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

        'summaryText'=>'',
        'columns'=>array(
            'xgeneral',
            'ygeneral',
            'xlogo',
            'ylogo',
            'codocu',

            array(
                'class'=>'CButtonColumn',
                'buttons'=>array(

                    'view'=>
                        array(

                            'visible'=>'false',
                        ),

                    'update'=>
                        array(
                            'url'=>'$this->grid->controller->createUrl("/Coordocs/Update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                            'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
                            'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png',
                            'label'=>'Actualizar Item',
                        ),
                    'delete'=>
                        array(

                            'visible'=>'false',
                        ),

                ),
            ),

        ),
    )); ?>
</div>




<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Ingresar valor',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>200,
        'height'=>250,
		'show'=>'Transform',
    ),
    ));
?>








<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
          
                
                
       </div>         
                
                
                
                
                
                
                
                
                

