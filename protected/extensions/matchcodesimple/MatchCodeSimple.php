<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class MatchCodeSimple extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	public $nombrecampo='';
	public $tamano=3;
	public $nombreclase='';
	public $nombredelinput='';
	public $model=null;
	public $form=null;
	public $nombredialogo='';
	public $nombreframe='';	
	public $controlador='';
	public $nombrearea=''; //nombre del Id del DIV donde se pintaran los resultados de la busqueda





	public function init()
	{

		$cadi=$this->controlador;
		//ECHO $cadi."   ";
		$cadi=strtoupper(trim($cadi[0]));
		//ECHO " LA PRIMER ALETRA ".$cadi;
		$cadi=$cadi.substr($this->controlador,1);
		//echo " el resto ".substr($this->controlador,1);
		$this->controlador=$cadi;
		
		//$this->controlador=ucwords(strtolower(trim($this->controlador)));
		//$this->nombreclase=Yii::app()->explorador->nombreclase($this->nombrecampo,$this->relaciones);
		


						}





	public function run()
	{
		///array del AJAX, segun el valor de la propiedad $comopintar


			
							echo "<div style='float: left; '>";
		  					 echo $this->form->textField($this->model,$this->nombrecampo,array('size'=>$this->tamano,
		       					// 'value'=>($this->model->isNewRecord)?$this->defol:'',

                 							 )); 
			  
			  
			 				echo " </div>";
			 				echo " <div style='float: left;'>";
			   				echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Search.png"),'#' ,array('onclick'=>'$("#'.$this->nombreframe.'").attr(
																					"src",
																					"'.Yii::app()->createurl('/Matchcode/recibevalorsimple',
																												array("campo"=> $this->nombrecampo, "clasesita"=> $this->nombreclase, "controlado"=> $this->controlador ) 
																											)
																					.'"); $("#'.$this->nombredialogo.'").data("hilo","'.$this->controlador.'_'.$this->nombrecampo.'@'.$this->nombrearea.'").dialog("open"); return false',
												)
											);	
			 				echo " </div>";






					 }




														 		//PINTAR EL INPUT BOX DEL CAMPO EN UESTION 
 						//	echo "<input size='40' maxlength='40' value='". Yii::app()->explorador->buscavalor($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase)."'  name='Detgui[c_descri]' id='Detgui_c_descri' 	type='text' />	";
						
			

			 		//}


				

}
