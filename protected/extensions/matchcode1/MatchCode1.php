<?php
class MatchCode1 extends CWidget
{
	
	public $nombrecampo='';
	public $nombrecampoareemplazar;
	public $urlinputbox='';
	public $urllink='';
	public $ordencampo;
	public $pintarcaja=1;
	public $relaciones;
	public $tamano=3;
	public $nombreclase='';
	public $nombredelinput='';
	public $model=null;
	public $form=null;
	public $nombredialogo='';
	public $nombreframe='';	
	public $controlador='';
	public $habilitado=true;
	public $defol='';
	public $defol2='';
	public $campoex='';
	private $caden='';
	public $comopintar;
	public $nombrearea=''; //nombre del Id del DIV donde se pintaran los resultados de la busqueda
	//public $campo2=null;
	public function init()
	{
		
       if ($this->habilitado) {
		$cadi=$this->controlador;
		$cadi=strtoupper(trim($cadi[0]));
		$cadi=$cadi.substr($this->controlador,1);
		$this->controlador=$cadi;
               // var_dump($this->relaciones);die();
			foreach ($this->relaciones as $clave => $valor) {
							foreach ( $this->relaciones[$clave] as $clave2=>$valor2 ) {
												//echo $valor2."=???".$campito."<br>";
												// echo $relaciones[$clave][1];
											if ($valor2==$this->nombrecampo) {
											             //echo "salio";
												$mitabla=  $this->relaciones[$clave][1];
												$aliastabla=$clave;
												//echo $mitabla;
											  break;
											}
								}
						}
				$this->nombreclase= $mitabla;
		}
	}
	
	public function run()
	{
           $aparm=ARRAY('campolargo'=>$this->nombrecampoareemplazar,
			   'campo'=>$this->nombrecampo,
			   //'miclase'=>'Inventario',
			   'ordencampo'=>$this->ordencampo,
			   // 'relaciones'=>$this->relaciones,
			   'clasesita'=>$this->nombreclase,
			   'contr'=>$this->controlador."",

		   );
		if( trim($this->campoex)!="")
			$aparm["campoex"]=$this->campoex;


		if (!is_null($this->nombrearea)) {

				$opcionesajax=array( 
                   					 'type'=>'POST', 
										'url'=>Yii::app()->createUrl('/Matchcode/relaciona1',
													$aparm

													),		
											
                    				'replace'=>'#'.$this->controlador."_".$this->nombrecampoareemplazar,
               					 ) ;

			}else { 
				$opcionesajax=array( 
                   					 'type'=>'POST', 
										'url'=>Yii::app()->createUrl('/Matchcode/relaciona'),
                    					'replace'=>'#Detgui_c_descri',
               					) ;
			}
		  

					echo "<div style='float: left; '>";
		  					 echo $this->form->textField($this->model,$this->nombrecampo,array('size'=>$this->tamano, 'disabled'=>($this->habilitado)?'':'disabled',
		       					// 'value'=>($this->model->isNewRecord)?$this->defol:'',
                			'ajax'=>$opcionesajax,
                 							 )); 
			 				echo " </div>";


			 			 if ($this->habilitado) {
							 $aparametros=array("campo"=> $this->nombrecampo, "clasesita"=> $this->nombreclase, "controlado"=> $this->controlador );
							 if( trim($this->campoex)!="")
								 $aparametros["campoex"]=$this->campoex;
			 				echo " <div style='float: left;'>";
			   				echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."ayuda.png"),'#' ,array('onclick'=>'$("#'.$this->nombreframe.'").attr(
																					"src",
																					"'.Yii::app()->createurl('/Matchcode/recibevalor1', $aparametros
																												)
																					.'"); $("#'.$this->nombredialogo.'").data("hilo","'.$this->controlador.'_'.$this->nombrecampo.'@'.$this->controlador.'_'.$this->nombrecampoareemplazar.'").dialog("open"); return false',
												)
											);	
			 				echo " </div>";
			 			}
			 			
						echo " <div id ='".$this->nombrearea."'  >";
						   //$formulario=$this->form;
							 //echo $formulario->textField($this->model,$this->nombrecampoareemplazar,array('value'=> Yii::app()->explorador->buscavalor($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase)));
							 	if ($this->pintarcaja==1)	{	
							 	//	if ($this->model->isNewRecord) {
							 			//Yii::app()->explorador->buscavalor1($this->nombrecampoareemplazar,$this->controlador,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase) ;
							 			// }
							 			// else {

							 			 	$formulario=$this->form;
							 			 	echo $formulario->textField($this->model,$this->nombrecampoareemplazar,array('value'=>$this->model->{$this->nombrecampoareemplazar} ,'size'=>40, 'disabled'=>($this->habilitado)?'':'disabled'));
							 				echo $formulario->error($this->model,$this->nombrecampoareemplazar);
							 			// }
							 			 }
						echo "</div>";
						
           							

          }


   }
  ?>


