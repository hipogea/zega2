<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class Usuario extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	
	
	
	
	public $numerousuarios=0;	
	public $nombrearea=''; //nombre del Id del DIV donde se pintaran los resultados de la busqueda
	public $controlador ='';
	//public $campo2=null;
	public function init()
	{		
			$this->numerousuarios=CrugeUsertabla::model()->count();
		//$this->controlador=
	}
	
	public function run()
	{
		
		
		//averiguar si esta logueado 
                if (Yii::app()->user->isGuest){
		      //SI LO ESTA PINTAR LOS DATOS DE USUARIO
		
			
			$this->pinta_numerousuarios();
			
			
			}else {
		  //7SI NO LO ESTA PINTAR DATOS GENERALES
				//BUSCANDO EL NUMERO DE USUARIOS
				//MOSTRAR EL LINK DE LOGIN
				
				//Mostrar el link de regidtrase
				//echo $this->numerousuarios;
				//$this->controlador->renderpartial("vw_anonimo",
						  // array(  'nusuarios'=>$this->numerousuarios )
						   //  );
				
				$this->pinta_numerousuarios();
				
				
			}
		
				
	}
	
	
	public function pinta_numerousuarios()
	{
		echo " <ul> Hay  ".$this->numerousuarios."  Usuarios registrados </ul>";
		echo "<a href=".Yii::app()->createUrl('/cruge/ui/login')." >   Ingresa a tu cuenta </a><br>";
		//echo Yii->app()->createUrl("/cruge/ui/login");
		
		
				
	}
}
