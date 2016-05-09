<?php

class Logmensajes extends CWidget
{
	
	public $modeloapintar=null;
	public $id=null;
	public $docu=null;

		
	public function init()
	{





	}
	
	public function run()
	{
       $proveedor=Mensajes::model()->search_docu($this->docu,$this->id);
         //var_dump($proveedor);yii::app()->end();
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'alkardex-grid',
			'dataProvider'=>$proveedor,
			//'filter'=>$model,
			'itemsCssClass'=>'table table-striped table-bordered table-hover',
			//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file

			'columns'=>array(

				//array('name'=>'id','header' => 'Accion' ),
				array('name'=>'Usuario','header' => 'Usuario','value' => '$data->usuario' ),
				//array('name'=>'field','header' => 'Campo afectado' ),
				array('name'=>'cuando','header' => 'Fecha' ),
				array('name'=>'tipo','header' => 'Tipo Mens' ),
				array('name'=>'nombrefichero','header' => 'Fichero' ),


			),
		));
	}
}
