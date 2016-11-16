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
	public $modosimple=false;
	public $nombrecamporemoto=false;//ES el nombre del campo remoto que permnite filtrar  en el modelo remoto ,
	// no ncesriamente es la calve principal, basta que sea indince unico
	//public $campo2=null;










	public function init()
	{
		$modelo=$this->model;
		$cadi=$this->controlador;
		//ECHO $cadi."   ";
		$cadi=strtoupper(trim($cadi[0]));
		//ECHO " LA PRIMER ALETRA ".$cadi;
		$cadi=$cadi.substr($this->controlador,1);
		//echo " el resto ".substr($this->controlador,1);
		$this->controlador=$cadi;

		//$this->controlador=ucwords(strtolower(trim($this->controlador)));
		//$this->nombreclase=Yii::app()->explorador->nombreclase($this->nombrecampo,$this->relaciones);
		$modelo->{$this->nombrecampo}=self::cleanInput($modelo->{$this->nombrecampo});
					     
								  
		
		
		
			foreach ($this->relaciones as $clave => $valor) {
				               if($valor[0]==$modelo::BELONGS_TO and $valor[2]==$this->nombrecampo)
							   {
								  	$mitabla=  $valor[1];
											  break;
							   }
										
								}
		$this->nombreclase= $mitabla;

		//echo "Ek nombre de la clase es :".$mitabla;
		unset($modelo);
						}




	/** Saca el nombre del modelo
	 * externo relacionado en el campo*/
	private function getModelParent($nombrecampo)
	{
		//obteniendo la clase donde buscar
		$rompio=false;
		$modelinb=$this->model;
		$relaciones=$this->model->relations();
		foreach($relaciones as  $clave =>$valor) {
			foreach( $valor as $clav =>$valo) {
				if($nombrecampo==$valo and !is_array($valo) and $valor[0]=='CBelongsToRelation') ///si se trata del campo y no es un array ademas la relacion es un BELONGS TO,
				{
					$nombreclase=$valor[1];
					$rompio=true;
					break;
				}
				if($rompio) break;
			}
		}
		if(!$rompio) {  ///si no encotro nada avisar
			throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  '.__LINE__.' No se encontro ningun modelo relacionado a este campo:  '.$nombrecampo.', por favor revise la propiedad RELATIONS del modelo ');
		} else {
			return $nombreclase;
		}
	}

	public function relaciona($nombrecampo,$valorcampo,$ordencampo=null){

           
                $nombreclase=$this->getModelParent($nombrecampo);
		//si no  devolver valor
		$cvn=(gettype($valorcampo)=='string')?"'":"";
		if (!($valorcampo===null )) {
			/*$cadena="\$moki=".$nombreclase."::model()->findByPk(".$cvn.$valorcampo.$cvn.");";
			eval($cadena);*/
			if($this->nombrecamporemoto===false){
				$moki=$nombreclase::model()->findByPk($valorcampo);
			}else{ //noes un cmapo clave buscar en los otros campos indexados
				$mokix =new $nombreclase;
				$func = function($valor) {
					if (gettype($valor)=='string')
						return strtolower($valor);
				};
				$columnas=array_map($func,$mokix->getTableSchema()->getColumnNames());
				//print_r($columnas);yii::app()->end();
				if(!in_array(strtolower($this->nombrecamporemoto),$columnas) )
					throw new CHttpException(500,__CLASS__.'   '.__FUNCTION__.'  '.__LINE__.' No se encontro ninguna columna remota con el nombre :  '.$this->nombrecamporemoto.', por favor revise la propiedad ');

				//$moki=$nombreclase::model()->find(":vcampo=:vvalor",array(":vcampo"=>$this->nombrecamporemoto,":vvalor"=>trim($valorcampo)));
				$moki=$nombreclase::model()->find("".$this->nombrecamporemoto."='".trim($valorcampo)."'");

				//var_dump($moki);yii::app()->end();
			}



		}else{
			$moki=null;
		}
		if(is_null($moki)) {
			return "--Valor no encontrado";
                          //echo "  huy  ";die();
		}else {
			$camposotros=$moki->attributeNames();
                       //echo "  huy  ";die();
			//$ordencampo=0;
			//return array_ print_r($moki->attributeNames());die();
			return $moki->{$moki->attributeNames()[is_null($ordencampo)?1:$ordencampo]};
			// return get_class($moki)."->".$camposotros[is_null($ordencampo)?4:$ordencampo];
		}
            
		
	}





	public function run()
	{
		///array del AJAX, segun el valor de la propiedad $comopintar
		if (!is_null($this->nombrearea)) {
				$opcionesajax=array( 
                   					 'type'=>'GET',
										'url'=>Yii::app()->createUrl('/Matchcode/relaciona',
													ARRAY('campo'=>$this->nombrecampo,
														  //'miclase'=>'Inventario',
														  'ordencampo'=>$this->ordencampo,
														 // 'relaciones'=>$this->relaciones,
														  'clasesita'=>$this->nombreclase,
														  'contr'=>$this->controlador,
														'camporemoto'=>($this->nombrecamporemoto===false)?"":$this->nombrecamporemoto,
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

			 
			
			 				

			} else {
			$opcionesajax=array();
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
																					.'"); $("#'.$this->nombredialogo.'").data("hilo","'.get_class($this->model).'_'.$this->nombrecampo.'@'.$this->nombrearea.'").dialog("open"); return false',
												)
											);	
			 				echo " </div>";




		// if (!is_null($this->nombrearea)) {
		//$modelorel=$this->nombreclase;
		if (!is_null($this->nombrearea)) {
						echo " <div style='float: left; background-color :#FFF; padding-left:4px;  padding-right:4px; font-family: verdana,tahoma,arial,sans-serif;
								font-size: 8pt;'  id =".$this->nombrearea.">";
		                                                             //var_dump($this->model->attributes);
						echo (!$this->model->isNewRecord or 
                                                       strlen(trim($this->model->{$this->nombrecampo}))>0
                                                        )?$this->relaciona($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo):'.                       .';

		echo " </div>";
															unset($modelorel);


					 }




														 		//PINTAR EL INPUT BOX DEL CAMPO EN UESTION 
 						//	echo "<input size='40' maxlength='40' value='". Yii::app()->explorador->buscavalor($this->nombrecampo,$this->model->{$this->nombrecampo},$this->ordencampo,$this->nombreclase)."'  name='Detgui[c_descri]' id='Detgui_c_descri' 	type='text' />	";
						
			

			 		//}


				
	}
	public static function cleanInput($input) {

		$search = array(
			'@<script[^>]*?>.*?</script>@si',   // Elimina javascript
			'@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
			'@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
		);

		$output = preg_replace($search, '', $input);
		return $output;
	}



}
