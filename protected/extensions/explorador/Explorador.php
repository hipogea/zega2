<?php

class Explorador  
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Inventario the static model class
	 */
	 
	public $codigosap ; //el codigo del archivo a poner correlativo 
	public $rutadearchivos;  //la ruta de la carpera a nalizar
	public $extension; //guarad ala exotension delos archivos 
	public $rutarelativa;
	public function init()
	{
		//$options=$this->options?CJavaScript::encode($this->options):'';
		
	}
	
	public  function devuelvemodelo($campito,$clasi)
	{
	   		   // $mitabla=$this->nombreclase($campito,$relaciones);		
				$cadena="\$estemodelo=  new ".$clasi."('search');";	
				eval($cadena);
				return $estemodelo;
				
		
	
	
	}
	public  function buscavalor($nombrecampo,$vvalor,$ordencampo,$clasi)
	{
		
				//$mitabla=$this->nombreclase($nombrecampo,$relaciones);()
				if ($vvalor===null)
					$vvalor=0;
				$cadena="\$mimodelo=".$clasi."::model()->findBypK('".$vvalor."');";
				eval($cadena);
				//echo $cadena;
				//echo $mimodelo->descripcion;
				if (is_null($mimodelo)) {
						//Guia->adderror('coddocu','El valor ingresado no existe ');
						echo "--No existe este valor";
									} else 		{
													$adel=$mimodelo->attributeNames();
				//echo $adel[1];
													$cadena="echo  \$mimodelo->".$adel[$ordencampo].";";
												eval($cadena);
													//echo $cadena;
										}	
				
				
				
	}
	
	public  function buscavalor1($nombrecampo,$contr,$vvalor,$ordencampo,$clasi)
	{
		$aponer='no pasa nada';
			//$mitabla=$this->nombreclase($nombrecampo,$relaciones);()
				if ($vvalor===null)
					$vvalor=0;


					

				$cadena="\$mimodelo=".$clasi."::model()->findBypK('".$vvalor."');";
				eval($cadena);
				if (is_null($mimodelo)) {
						$aponer="--";
									} else 		{
													$adel=$mimodelo->attributeNames();				
													$cadena="\$aponer= \$mimodelo->".$adel[$ordencampo].";";
												eval($cadena);
													//echo $aponer;
										}
		
		//	echo "<input type=text name='".$contr."[".$nombrecampo."]'   id='".$contr."_".$nombrecampo."'  size='40' value='".$aponer."' >";
				
				
				
	}


   
	public function nombreclase ($campito,$relaciones) 
	   { 

	   	foreach ($relaciones as $clave => $valor) {
							foreach ( $relaciones[$clave] as $clave2=>$valor2 ) {
												//echo $valor2."=???".$campito."<br>";
												// echo $relaciones[$clave][1];
											if ($valor2==$campito) {
											             //echo "salio";
												$mitabla=  $relaciones[$clave][1];
												$aliastabla=$clave;
												//echo $mitabla;
											  break;
											}
										
								}
		
						}
				return $mitabla;
	   
	   }
	   
	   
	}