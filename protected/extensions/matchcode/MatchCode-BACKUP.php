<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class MatchCode extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	public $nombrecampo='';
	public $urlinputbox='';
	public $urllink='';
	public $ordencampo;
	public $relaciones;
	public $tamano=3;
	public $nombreclase='';
	public $nombredelinput='';
	public $model=null;
	public $form=null;
	public $nombredialogo='';
	public $nombreframe='';	
	public $controlador='';
	public $defol='';
	public $defol2='';
	private $caden='';
	public $comopintar;
	public $nombrearea=''; //nombre del Id del DIV donde se pintaran los resultados de la busqueda
	//public $campo2=null;
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
	
	public function run()
	{
		///array del AJAX, segun el valor de la propiedad $comopintar
		if (!is_null($this->nombrearea)) {
				$opcionesajax=array( 
                   					 'type'=>'POST', 
										'url'=>Yii::app()->createUrl('/Matchcode/relaciona',
													ARRAY('campo'=>$this->nombrecampo,
														  //'miclase'=>'Inventario',
														  'ordencampo'=>$this->ordencampo,
														 // 'relaciones'=>$this->relaciones,
														  'clasesita'=>$this->nombreclase,
														  'contr'=>$this->controlador,
														)		

													),		
												/*'data'	=>array('pcampo'=>$this->nombrecampo,
														  //'miclase'=>'Inventario',
														  'pordencampo'=>$this->ordencampo,
														 // 'relaciones'=>$this->relaciones,
														  'pclasesita'=>$this->nombreclase,
														  'pcontr'=>$this->controlador,
														),		*/
                    				'update'=>'#'.$this->nombrearea,
               					 ) ;

			 
			
			 				

			}else { //propiedad $comopintar='REPLACE'

 						//$d=$this->comopintar;
 						$opcionesajax=array( 
                   					 'type'=>'POST', 
										'url'=>Yii::app()->createUrl('/Matchcode/relaciona'),
                    					'replace'=>'#Detgui_c_descri',
               					) ;

 						


			}


			
							echo "<div style='float: left; '>";
		  					 echo $this->form->textField($this->model,$this->nombrecampo,array('size'=>$this->tamano,
		       					// 'value'=>($this->model->isNewRecord)?$this->defol:'',
                			'ajax'=>$opcionesajax,
                 							 )); 
			  
			  
			 				echo " </div>";
			 				echo " <div style='float: left;'>";
			   				echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Search.png"),'#' ,array('onclick'=>'$("#'.$this->nombreframe.'").attr(
																					"src",
																					"'.Yii::app()->createurl('/Matchcode/recibevalor', 
																												array("campo"=> $this->nombrecampo, "clasesita"=> $this->nombreclase, "controlado"=> $this->controlador ) 
																											)
																					.'"); $("#'.$this->nombredialogo.'").data("hilo","'.$this->controlador.'_'.$this->nombrecampo.'@'.$this->nombrearea.'").dialog("open"); return false',
												)
											);	
			 				echo " </div>";




		// if (!is_null($this->nombrearea)) {

						echo " <div style='float: left; background-color :#FFF; padding:3px; font-family: verdana,tahoma,arial,sans-serif;
								font-size: 8pt;'  id =".$this->nombrearea.">";
			 
					 
			  									if ($this->model->isNewRecord) {
					     										//if( !empty($this->defol) or !is_null($this->defol) or !empty($this->model->{$this->nombrecampo} ) or !is_null($this->model->{$this->nombrecampo}) ) {
																	 Yii::app()->explorador->buscavalor($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase);
			          
								  								// } 
					
					                 
					          										 } else {
																		  Yii::app()->explorador->buscavalor($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase);
			           
					    										}
					             
								
			   
														 echo " </div>";


					// } ELSE {




														 		//PINTAR EL INPUT BOX DEL CAMPO EN UESTION 
 						//	echo "<input size='40' maxlength='40' value='". Yii::app()->explorador->buscavalor($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase)."'  name='Detgui[c_descri]' id='Detgui_c_descri' 	type='text' />	";
						
			

			 		//}


				
	}
}
