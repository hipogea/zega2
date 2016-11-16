<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class Semaforo extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	public $valores=array(); 
	// O ENLACE  			array['print'=>array( '/recurso/', array('id'=>23))  ]   SE DEBE DE ESPECIFICAR LE ENELACE CON UN ARRAY
	public $asc=1; /// 1 Si el orden es   verde-amarillo-rojo segun los valores, -1 si el orden es rojo-amarillo-verde
  public $color;
	public $valor;
	public $ruta;
		
	public function init()
	{


		$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
		$this->ruta=$asset;
    	$cs=Yii::app()->clientScript;
    	$cs->registerCssFile($asset."/css/semaforo.css");
		$script = 'assetUrl = "' . $asset . '";';
		if(!isset($this->valores) or count($this->valores) <> 3)
			throw new CHttpException(500,__CLASS__.' - '.__FUNCTION__.'   No se definieron los valores del Widget-Semaforo');
		if(empty($this->asc) or is_null($this->asc))
			throw new CHttpException(500,__CLASS__.' - '.__FUNCTION__.'   No se definio el orden colores del Widget-Semaforo');
		if(!(($this->valores[0] < $this->valores[1]) and  ($this->valores[1] < $this->valores[2])))
			throw new CHttpException(500,__CLASS__.' - '.__FUNCTION__.'   El orden de los valores Widget-Semaforo');




	}
	private function iniciamarco(){
		echo "<DIV CLASS='marco' >";
	}
	private function cierradiv(){
		echo "</div>";
	}


	private function determinacolor(){
	     if($this->asc==1){
			    if($this->valor < $this->valores[0])
					$this->color='rojo';
			    if($this->valor >= $this->valores[0] and $this->valor < $this->valores[1])
				 $this->color='ambar';
			 if($this->valor >= $this->valores[1] and $this->valor <= $this->valores[2])
				 $this->color='verde';
			 if($this->valor > $this->valores[2])
				 $this->color='rojo';

		 } else {
			 if($this->valor < $this->valores[0])
				 $this->color='rojo';
			 if($this->valor >= $this->valores[0] and $this->valor < $this->valores[1])
				 $this->color='verde';
			 if($this->valor >= $this->valores[1] and $this->valor <= $this->valores[2])
				 $this->color='ambar';
			 if($this->valor > $this->valores[2])
				 $this->color='rojo';
		 }
  return 1;
	}



	public function run()
	{
	  $this->iniciamarco();
		$this->determinacolor();
		echo  CHtml::image($this->ruta.'/img/semaforo-'.$this->color.'.png');
		$this->cierradiv();


	}
}
