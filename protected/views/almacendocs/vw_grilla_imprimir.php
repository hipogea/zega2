<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',	
	'dataProvider'=>VwKardex::model()->search_porvale_firme($idcabecera),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file
        'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'summaryText'=>'',
	'columns'=>array(

			//'item',
			//array('name'=>'tipimputacion','header'=>'I'),
		//	array('name'=>'tipsolpe','header'=>'T'),
			//'tipsolpe',
	     // array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->est=="02")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
		//'n_hguia',
		//'c_itguia',
		'cant',
                'um',
		'codart',
		//'c_edgui',	
		'descripcion',
                //array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                 array('name'=>'comentario', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->comentario))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		//'centro',
		//	'codal',
			//'fechacrea',
			//'fechaent',
			//'usuario',		//'estado',
                
                
	                ),
                    )

)

; ?>
