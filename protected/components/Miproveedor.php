<?php

class Miproveedor extends CActiveDataProvider
{
	public $camposasumar=array();  //array de de campos a sumar (aliascampo1=>nombrecampo1,aliascampo2=>nombrecampo2, ...)
    private $_valoressumados=array();

	public function init(){
		/*foreach($this->camposasumar as $clave=>$valor){
			$this->_valoressumados[$valor]=0;
		}*/
	}
	public function Total(){
		if(count($this->camposasumar)>0){
		foreach($this->camposasumar as $aliascampo=>$nombrecampoasumar) {
			$filas = $this->getdata ();
			foreach ( $filas as $fila ) {
				foreach ( $fila->attributes as $nombrecampo => $valorcampo ) {
					if ( is_numeric ( $valorcampo ) and trim ( strtolower ( $nombrecampoasumar ) ) == trim ( strtolower ( $nombrecampo ) ) ) {
						$this->_valoressumados[ $nombrecampo ] += $valorcampo;
					}
				}
			}

			}

		//devilviendo un array de la forma   array( aliascampo1=>array($nobrecampo1=>$sumavalorcampo1),...  )
  			 $nuevoarray=ARRAY();
			foreach($this->camposasumar as $clave=>$valor){
			   $nuevoarray[$valor]=$this->_valoressumados[$valor];
			}
		}else {

			$nuevoarray=array();
		}




     return $nuevoarray;
	}

	}
