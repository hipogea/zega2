<?php

class Logauditor extends CWidget
{
	
	public $modeloapintar=null;
	public $clave=null;

		
	public function init()
	{



		//Obteniendo los datos de modelo

			if (is_null($this->clave)) {
				$this->clave=-1;

			  } else  {

				if(gettype($this->clave)=='string')   {
					$this->clave =$this->clave +0;
				}
			}


    /*echo " LA CLVE ES   :  ".$this->clave."   ".gettype($this->clave);
		yii::app()->end();*/
		//var_dump($this->modeloapintar);var_dump($this->clave);die();

	}
	
	public function run()
	{


		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'alkbvardex-grivvbd',
			'dataProvider'=>ActiveRecordLog::model()->search_general(ActiveRecordLog::hacercriterio($this->modeloapintar,$this->clave)),
			//'filter'=>$model,
			'itemsCssClass'=>'table table-striped table-bordered table-hover',
			//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file

			'columns'=>array(

				array('name'=>'action','header' => 'Accion' ),
				array('name'=>'Usuario','header' => 'Usuario','value' => 'Yii::app()->user->um->loadUserById($data->userid)->username' ),
				//array('name'=>'field','header' => 'Campo afectado' ),
				array('name'=>'nombrecampo','header' => 'Campo Modif' ),
				array('name'=>'creationdate','header' => 'Fecha' ),
				array('name'=>'oldvalue','header' => 'Val ant' ),
				array('name'=>'newvalue','header' => 'Val act' ),


			),
		));
	}
}
