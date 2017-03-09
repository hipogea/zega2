<?php
class Seleccionavarios extends CWidget
{
	public $id;
	public $nombrecampo='';
	public $relaciones;
	public $tamano=3;
	public $nombreclase='';
	public $model=null;
	public $form=null;
	public $nombredialogo='';
	public $nombreframe='';	
	public $controlador='';
	public $habilitado=true;
	public $nombremodelo;
	public function init()
	{

	}
	
	public function run()
	{

		$existefiltro=ISSET($_SESSION['sesion_'.$this->nombremodelo]);
		  if(!$existefiltro) {
		  				$imagen="ayuda.png";
		     }else {
		     				$imagen="filter.png";
		     }
					echo "<div style='float: left; '>";
		  					 echo $this->form->textField($this->model,$this->nombrecampo,array('size'=>$this->tamano, 'disabled'=>($this->habilitado)?'':'disabled',
		       						'value'=>($existefiltro)?$_SESSION['sesion_'.$this->nombremodelo][0]:'',
                			                							 ));
			 				echo " </div>";
			 				echo " <div id='ayudaimg' style='float: left;'>";
			   				echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$imagen,'x',array('id'=>'pio'.$this->controlador.'_'.$this->nombrecampo)),'#' ,array('onclick'=>'$("#'.$this->nombreframe.'").attr(
																					"src",
																					"'.Yii::app()->createurl('/Matchcode/recibevalores', 
																												array("campo"=> $this->nombrecampo, "clasesita"=> $this->nombremodelo, "nombremodelo"=> $this->nombremodelo ) 
																											)
																					.'"); $("#'.$this->nombredialogo.'").data("hilo","'.$this->controlador.'_'.$this->nombrecampo.'@'.$this->controlador.'_'.$this->controlador.'").dialog("open"); return false',
												)
											);	
			 				echo " </div>";

			 				echo " <div  style='float: left;'>";
			   				echo CHtml::ajaxlink(CHtml::image(($existefiltro)?Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nofilter.png":"",'',array('id'=>'pio2'.$this->controlador.'_'.$this->nombrecampo)),
			   									Yii::app()->createUrl( '/Matchcode/eliminasesiones' ),
          																	 array( // ajaxOptions
               																	 'type' => 'POST',                																	
                																		'data' => array('sesion'=>$this->nombremodelo),
																				'success'=> 'function(data) {	$("#pio'.$this->controlador."_".$this->nombrecampo.'").attr("src","'.Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'ayuda.png");
																				 										$("#'.$this->controlador."_".$this->nombrecampo.'").attr("value","");
																				 									$("#pio2'.$this->controlador."_".$this->nombrecampo.'").attr("src","");
																				 									$("#pio3'.$this->controlador."_".$this->nombrecampo.'").attr("src","");
																				 }',
                																		//'success'=>'$("#pio").attr("src","'.Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'ayuda.png")',
           																			),
           																		array( //htmlOptions
               																			// 'href' => Yii::app()->createUrl( 'user/region' ),
          																				 )
												
											);	
			 				echo " </div>";

		echo "<div style='float: left; '>";

		echo CHtml::link(CHtml::image(($existefiltro)?Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'Column.png':"",'',array('id'=>'pio3'.$this->controlador.'_'.$this->nombrecampo)),'#' ,array('onclick'=>'$("#'.$this->nombreframe.'").attr(
																					"src","'.Yii::app()->createurl('/Matchcode/muestrasesiones',array( "nombremodelo"=> $this->nombremodelo )).'"); $("#'.$this->nombredialogo.'").data("hilo","'.$this->controlador.'_'.$this->nombrecampo.'@'.$this->controlador.'_'.$this->controlador.'").dialog("open"); return false',
			)
		);
		echo " </div>";

			 			//echo $this->controlador."_".$this->nombrecampo;
				
           							

          }


   }
  ?>


