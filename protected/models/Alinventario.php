<?php

class Alinventario extends ModeloGeneral
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Inventario the static model class
	 */
	const FLAG_PRECIO_PROMEDIO_VARIABLE ='V';
	const FLAG_PRECIO_LIFO ='L';
	const FLAG_PRECIO_FIFO ='F';
	const FLAG_PRECIO_ESTANDAR ='S';
	const NOMBRE_CAMPO_PRECIO_UNITARIO='punit';
	const CAMPO_STOCK_LIBRE='cantlibre';
	const CAMPO_STOCK_RESERVADO='cantres';
	const CAMPO_STOCK_TRANSITO='canttran';
	const NOMBRE_CAMPO_CONTROL_PRECIO='controlprecio'; //NOmbre del campo de la tabla relaciondad maerto detalle
	const  NOMBRE_CAMPO_PRECIO_ESTANDAR='punit';//NOmbre del campo de la tabla relaciondad maerto detalle
	const     NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA='punitdif';
	const CAMPO_STOCK__RESERVADO='cantres';
     const ESCENARIO_ACTUALIZARSTOCK='modificacantidad';
	//const NOMBRE_CAMPO_PRECIO_UNITARIO='punit';

	public $camposstock=array(
		self::CAMPO_STOCK_LIBRE=>self::CAMPO_STOCK_LIBRE,
		self::CAMPO_STOCK_RESERVADO=>self::CAMPO_STOCK__RESERVADO,
		self::CAMPO_STOCK_TRANSITO=>self::CAMPO_STOCK_TRANSITO
	);

	public $camposstockafectadosporprecio=array(
		self::CAMPO_STOCK_LIBRE=>self::CAMPO_STOCK_LIBRE,
		self::CAMPO_STOCK_RESERVADO=>self::CAMPO_STOCK__RESERVADO,
		self::CAMPO_STOCK_TRANSITO=>self::CAMPO_STOCK_TRANSITO
	);


	//public $mensajes=array(); //guarada los mensajes de las operaciones relaizadas en epscial las advertencias y lso errores
	public $pttotal;
	public $cant;
	public $cantidadmovida; //almacena en el Active record la cantidad movida (Convertida a unidad de medida base del material)  de cualquier transaccion,
	public $montomovido; //ALMACENA EL MONTO INVOLUCRADO EN LA TX , ///sin eimportar la Unidad de medida o el control del precio d S O V DE L AMATEIRAL
	protected $_controldeprecio=NULL;
	protected $_detallematerial=array();
	public $fechaini=null;
	public $fechafin=null;

	protected function getNombreClase(){
		return _CLASS_;
	}

	public static function getcamposstock(){
        return self::camposstock;
    }

    public function getstockregistro(){
		$canttotal=0;
	        foreach ($this->camposstock as $clave=>$valor){
				$canttotal+=is_null($this->{$valor})?0:$this->{$valor};
			}
		return $canttotal;
          }
	public function oldgetstockregistro(){
		$canttotal=0;
		foreach ($this->camposstock as $clave=>$valor){
			$canttotal+=is_null($this->oldVal($valor))?0:$this->oldVal($valor);
		}
		return $canttotal;
	}

	/* DEVULEV EEL STOCK VALORIZADO TOTAL DE TODOS LOS CENTROS Y ALMACENES*/
	public  function getStockValTotal(){
		$data= Yii::app()->db->createCommand()
			->select($this->getsumas())
			->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
			->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault  ",
				array(":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))->queryAll();
		$stocks=array();
		foreach($data[0] as $clave=>$valor){
			$stocks[$clave]=$valor;
		}





		return $stocks;
	}

	/* DEVULEV EEL STOCK VALORIZADO SUBOTALIZADO POR CENTRO*/
	public  function getStockValCentro(){
	  $data= Yii::app()->db->createCommand()
		  ->select($this->getsumas().', a.codcen ')
		  ->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
		  ->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault  ",
			  array(":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))
		  ->group('a.codcen')->order('a.codcen ASC')
		  ->queryAll();
       $centros=array();
        foreach($data as $fila){
           $centros[]=$fila['codcen'] ;
        }
        asort($centros);
        return array_combine($centros,$data);
	}


	/* DEVULEV EEL STOCK VALORIZADO SUBOTALIZADO POR ALMACEN*/
	public  function getStockValAlmacen(){
		$data= Yii::app()->db->createCommand()
			->select($this->getsumas().',
			    a.codalm,
			    a.codcen,c.nomal
			       ')
			->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
			->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault  ",
				array(":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))
			->group('a.codalm, a.codcen,c.nomal')->order('a.codalm asc')
			->queryAll();
		$almacenes=array();
		foreach($data as $fila){
			$almacenes[]=$fila['codalm'] ;
		}
		asort($almacenes);
		return array_combine($almacenes,$data);
	}



	/* DEVULEV EEL STOCK VALORIZADO TOTAL DE TODOS LOS CENTROS Y ALMACENES del MATERIAL*/
	public  function getStockMatTotal($codigo){
		$data= Yii::app()->db->createCommand()
			->select($this->getsumas())
			->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
			->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault and a.codart=:vcodigo ",
				array(":vcodigo"=>$codigo,":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))->queryAll();
		return $data;
	}

	/* DEVULEV EEL STOCK VALORIZADO SUBOTALIZADO POR CENTRO DEL MATERIAL */
	public  function getStockMatCentro($codigo){
		$data= Yii::app()->db->createCommand()
			->select($this->getsumas().', a.codcen,a.codart ')
			->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
			->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault and a.codart=:vcodigo ",
				array(":vcodigo"=>$codigo,":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))
			->group('a.codcen,a.codart')->order('a.codcen ASC')
			->queryAll();
		$centros=array();
		foreach($data as $fila){
			$centros[]=$fila['codcen'] ;
		}
		asort($centros);
		return array_combine($centros,$data);
	}


	/* DEVULEV EEL STOCK VALORIZADO del MATERIAL SUBOTALIZADO POR ALMACEN*/
	public  function getStockMatAlmacen($codigo){
		$data= Yii::app()->db->createCommand()
			->select($this->getsumas().',
			    a.codalm,a.codart,
			    a.codcen,c.nomal
			       ')
			->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
			->where("a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault and a.codart=:vcodigo  ",
				array(":vcodigo"=>$codigo,":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))
			->group('a.codalm, a.codcen,a.codart,c.nomal')->order('a.codalm asc')
			->queryAll();
		$almacenes=array();
		foreach($data as $fila){
			$almacenes[]=$fila['codalm'] ;
		}
		asort($almacenes);
		return array_combine($almacenes,$data);
	}


	public  function getStockTotalAlmacen($codal,$infostock)
    {
        $adatosstock = array();
        $stockalmacen = null;
        if (!is_array($infostock)) { ///si se definio loa consulta
            $adatosstock = $this->getStockValAlmacen();
        } else {
            $adatosstock = $infostock;
        }
        foreach ($adatosstock as $nombrealm=>$arraystocksporalmacen) {
            if ($nombrealm == $codal) {
                foreach ($this->camposstock as $clave => $valor) {
                    $stockalmacen += $arraystocksporalmacen['stock_' . $valor];
                }
                break;
            }
        }
        return $stockalmacen;
    }

        public  function getStockTotalCentro($codcen,$infostock){
            $adatosstock=array();
            $stockcentro=null;
            if(is_array($infostock)){ ///si se definio loa consulta
                $adatosstock=$this->getStockAlmacenes();
            }else{
                $adatosstock=$infostock;
            }
            foreach($adatosstock as $fila)
            {
                if($fila['codcen']==$codcen)
                {
                    foreach($this->camposstock as $clave=>$valor){
                        $stockcentro+=$fila['stock_'.$valor];
                    }
                }
            }
            return $stockcentro;

	}


    public function getstockMaterial($codmaterial){
        return Yii::app()->db->createCommand()
            ->select(self::getsumas().', a.codalm,  a.codcen')
            ->from('{{alinventario}} a ,{{tipocambio}} b , {{almacenes}} c')
            ->where(" a.codalm=c.codalm and a.codcen=c.codcen and
		  c.codmon=b.codmon1 and b.codmondef=:Vmonedadefault and a.codart=:vcodart ",
                array(':vcodart'=>$codmaterial,":Vmonedadefault"=>yii::app()->settings->get('general','general_monedadef')))
            ->group('a.codalm,  a.codcen')
            ->queryAll();

    }

public function getstockTotalmaterial($codmaterial,$adatos=null){
   $cantidad=0;
    if(is_array($adatos)){

            }else{
        $adatos=$this->getstockMaterial($codmaterial);
        }

        foreach($adatos as $fila){
            foreach($this->camposstock as $clave=>$valor){
                $cantidad+=$fila['stock_'.$valor];
            }

        }
    return $cantidad;
}


    public function getstockTotalmaterialCentro($codmaterial,$codcentro,$adatos=null){
        $cantidad=0;
        if(is_array($adatos)){

        }else{
            $adatos=$this->getstockMaterial($codmaterial);
        }

        foreach($adatos as $fila){
            if($fila['codcen']==$codcentro) {
                foreach ($this->camposstock as $clave => $valor) {
                    $cantidad += $fila['stock_' . $valor];
                }
                break;
            }
        }
        return $cantidad;
    }






    public static function getStockAlmacentipo($almacen,$centro,$tipo){
		$valor=Yii::app()->db->createCommand()
			->select(' sum((cantlibre+cantres+canttran)*(punit+punitdif)) as stocktotal ')
			->from('{{alinventario}} a ,{{maestrocomponentes}} b , {{maestrotipos}} c')
			->where('a.codart=b.codigo and b.codtipo=c.codtipo and
			a.codalm=:vcodal and codcen=:vcodcen and
			 codcen=:vcodcen and c.codtipo=:vcodtipo',array(":vcodcen"=>$centro,":vcodal"=>$almacen,":vcodtipo"=>$tipo))
			//->group('a.codalm,  a.codcen')
			->queryScalar();
		return ($valor!=false)?$valor:0;

	}

	///deveuek vel numero de items
	public  function getnumeroitems($codcen=null,$codal=null){
		$criteri=New CDBcriteria();
		$criteri->addCondition(" ( ".$this->getcadenacampos().") >0 ");
		if(!is_null($codcen) and !is_null($codal)){
			$criteri->addCondition(" codcen=:codcen and codalm=:codalm  ");
			$criteri->params=array(":codcen"=>MiFactoria::cleanInput($codcen),":codalm"=>MiFactoria::cleanInput($codal));
		}
		if(is_null($codcen) and !is_null($codal)){
			$criteri->addCondition(" codalm=:codalm  ");
			$criteri->params=array(":codalm"=>MiFactoria::cleanInput($codal));
		}
		if(!is_null($codcen) and is_null($codal)){
			$criteri->addCondition(" codcen=:codcen  ");
			$criteri->params=array(":codcen"=>MiFactoria::cleanInput($codcen));
		}


		$valor=Yii::app()->db->createCommand()
			->select(' count(id) ')
			->from('{{alinventario}} a')
			->where($criteri->condition,$criteri->params)
			//->group('a.codalm,  a.codcen')
			->queryScalar();
		return ($valor!=false)?$valor:0;
	}




	public function pronostico(){
      //buscando las absisas
			$fechainicio=$this->almacen->fecharefpronostico;
		$xarray=array(); //las fechas
		$yarray=array();//Las cantidades de inventario
		$stockinicial=$this->getstockregistro();
		$valores=Yii::app()->db->createCommand()
			->select('a.fecha,sum(a.cant) as consumido')
			->from('{{alkardex}} a')
			->where('a.codart=:vcodart  and fecha >=:vfecha
			and codmov in (select codmov from {{almacenmovimientos}} where esconsumo="1" )
			',array(":vfecha"=>$fechainicio,":vcodart"=>$this->codart)
			       )
			->group('a.fecha')
			->order('a.fecha ASC')
			->queryAll();
		/*var_dump($valores);
		yii::app()->end();*/
		///sacando el comsumido total
		$consumido=0;
		foreach($valores as $fila){
			$consumido+=abs($fila['consumido']);
		}
		//cOLOCAR EL TOPE para luego restar
		$valorux=$stockinicial+$consumido;
		/*print_r($valores);*/
		/*echo "sotckinical ".$stockinicial."<br>";
		echo "consumido ".$consumido."<br>";
		echo "sotckinical +cosumido".$valorux."<br>";
		yii::app()->end();*/
		$fechax=strtotime($fechainicio);
		$diaspasados=0;

		foreach($valores as $fila){
			$diaspasados+=ceil((strtotime($fila['fecha'])-$fechax)/(60*60*24));
			$xarray[$fila['fecha']]=$diaspasados+1;
			$yarray[]=$valorux;
			$valorux-=abs($fila['consumido']);
			$fechax=strtotime($fila['fecha']);
		}
		/*echo "ejes x <br>";
	print_r($xarray);
		echo "ejes y";
		echo "<br>";
		print_r($yarray);
		echo "<br>";
		yii::app()->end();*/

		if(count($xarray) < 2 or count($yarray) < 2 ){
			return array(array(),array(),array(),array());
		} else {
			$recta=yii::app()->estadisticas->linear_regression(array_values($xarray), $yarray);
			//var_dump($recta);die();
//recta devuelve un array ( valorpendiente m, intercepto y)
			
                        /*$x1=array_values($xarray)[0];
            $y1=$recta['m']*$x1+$recta['b'];
            $x2=array_values($xarray)[count($xarray)-1];
            $y2=$recta['m']*$x2+$recta['b'];*/
			$numerodepuntos=ceil((array_values($xarray)[count($xarray)-1]-array_values($xarray)[0])/count($xarray));
			/*var_dump($xarray);echo "<br>";
                        echo "final ".array_values($xarray)[count($xarray)-1]."<br>";
			echo "inicio ".array_values($xarray)[0]."<br>";
			echo "cuantos ".count($xarray)."<br>";
			echo "numeropuntos ".$numerodepuntos."<br>";die();*/
			$x0=-round($recta['b']/$recta['m'],4);
                        
                        $xfinal=round(($stockinicial-$recta['b'])/$recta['m'],4);
                        
                       
			//$escala=floor($x0/10);
			// $xreg=array_values($xarray);
			/*echo "numero puntos  ".$numerodepuntos."<br>";
            echo "x0  ".$x0."<br>";*/
			//calculndo el punto atual en el tiempo
			$ultfecha=strtotime(array_keys($xarray)[count($xarray)-1]);
			$difdias=ceil((time()-$ultfecha)/(24*60*60));
			/* echo "difdias ".$difdias."<br>";
            echo "ulrimo dia  ".array_values($xarray)[count($xarray)-1]."<br>";*/
			$diaactual=array_values($xarray)[count($xarray)-1]+$difdias;
			/*ECHO "DAI ACTUAL  ".$diaactual."<br>";
            ECHO "pendiente  ".$recta['m']."<br>";
            ECHO "residuo  ".$recta['b']."<br>";*/
                         $primerpunto=array(0,$stockinicial+$consumido);
                      // $yf=$diaactual*$recta['m']+$recta['b'];
                        $ultimopunto=array($xfinal,$stockinicial);
                        $absisas=array(0,$xfinal);
                        $ordenadas=array($stockinicial+$consumido,$stockinicial);
                        
                        if($stockinicial >0){
                           //hallnado x0
                            $xfuturo=-round($recta['b']/$recta['m'],4);
                            $yfuturo=$xfuturo*$recta['m']+$recta['b'];
                            $absisas[]= $xfuturo;
                            $ordenadas[]= $yfuturo;
                        }
                        
                        
                        
                        return array($absisas,$ordenadas);
                        
                        
                        
			$frecuencia=floor(($x0-$diaactual)/$numerodepuntos)-1;
			//echo "frecuencia   ".$frecuencia."<br>";die();
			$xreg=array();
			$yreg=array();
			//$xreg[]=0;
			//$yreg[] = round ($recta['m']* $xreg[$diaactual] + $recta['b'] , 0 );
			//$yreg[] = round ($recta['m']*$diaactual + $recta['b'] , 0 );
			$yreg[] = (float)($this->cantlibre+0);
			//echo "stock libre ".$yreg[0]."<br>";
			$xreg[]=(int)(round(($yreg[0]-$recta['b'])/$recta['m'],0));
			//echo "dia actual ".$xreg[0]."<br>";
			$diaactual=(int)$xreg[0];
			$i=1;
			//print_r($valores);
			/*echo "<br>";
			echo "fefucncia ".$frecuencia."<br>";
			echo "diaactual ".$diaactual."<br>";
			echo "numeropuntos ".$numerodepuntos."<br>";
			print_r($xreg);
			ECHO " X0  ".$x0;yii::app()->end();*/
			if($frecuencia > 0) //aseguranos de que no haya un bucle infinito
			while($xreg[ $i - 1 ] < $x0) {
				$xreg[] = (int)($xreg[$i-1] +$frecuencia+0);
				$yreg[] = round ( $recta['m'] * $xreg[$i] + $recta['b'] , 0 )+0;
				$i++;
			}

			foreach($xreg as $clave=>$valor){
				$xreg[$clave]=$valor-$diaactual;
			}
//$dospuntos=array(array($x1,round($y1,1)),array($x2,round($y2,1)));
			///devolvemos las ordenadas, absisas y la ecuacion de la recta de regresion
			///todo listo para el grafico
                        
			return array(array_values($xarray),$yarray,$xreg,$yreg);
		}

	}


	public function getControlPrecio() {
		if(!$this->isnewRecord){
			IF($this->_controldeprecio===NULL){
				return $this->detallesmaterial()['controlprecio'];
			}ELSE{
				$this->_controldeprecio;
			}

		}	else 	{
			return self::FLAG_PRECIO_PROMEDIO_VARIABLE;
		}
	}

	public function detallesmaterial(){

			if(count($this->_detallematerial)==0){
				$maestrodetalle=$this->alinventario_maestrodetalle;
				$this->_detallematerial['reposicion']=$maestrodetalle->cantreposic;
				$this->_detallematerial['economica']=$maestrodetalle->canteconomica;
				$this->_detallematerial['reorden']=$maestrodetalle->cantreorden;
				$this->_detallematerial['cantsol']=$maestrodetalle->cantsol;
				$this->_detallematerial['repautomatica']=$maestrodetalle->repautomatica;
				$this->_detallematerial['supervisionautomatica']=$maestrodetalle->supervisionautomatica;
				$this->_detallematerial['controlprecio']=$maestrodetalle->controlprecio;
				$this->_detallematerial['catval']=$maestrodetalle->catval;
				$this->_detallematerial['bloqueo']=$maestrodetalle->bloqueo;
				$this->_detallematerial['leadtime']=$maestrodetalle->leadtime;

			}
		    return $this->_detallematerial;
	}


	public  function essupervision() {
		if(!$this->isnewRecord){
			return ($this->detallesmaterial()['supervisionautomatica']=='1')?true:false;

		}	else 	{
			return false;
		}
	}

	public  function esauto() {
		if(!$this->isnewRecord){
			if(yii::app()->settings->get('inventario','inventario_auto')=='1'){
				return ($this->detallesmaterial()['repautomatica']=='1')?true:false;
			}else{
				return false;
			}


		}	else 	{
			return false;
		}
	}

	public function reposicionauto(){
		if($this->esauto()){
			if($this->almacen->reposicionsololibre=='1'){ //solo tomar encuenta el stock libre , no el reservado ni el de transito
				$stock=$this->{self::CAMPO_STOCK_LIBRE};
			}else{
				$stock=$this->getstockregistro();
			}
                        
                        
			//VERIFICANDO QUE EL STOCK ESTE DEBAJO DEL REORDEN, PERO TOMANDO EN CUENTA LA
			//CATIDAD DE SOLICITUD ECONOMICA, ES DECIR
			$valorref=$this->detallesmaterial()['reorden'] - $this->detallesmaterial()['cantsol'];
			$valorref=($valorref<0)?0:$valorref; //no permitir valores anegativos
			IF($stock <  $valorref or $valorref=0){ //En estos casso reponer stock, solcitando una solpe automatica de repsicon de mateiales
				$numero=Solpe::solpeautomatica($this);
				MiFactoria::Mensaje('notice','Se ha creado la solicitud automatica para reposicion de stock '.$numero);
			}else{
                            MiFactoria::Mensaje('notice','Condicion no cumplida :  El stock '.$stock.'  es mayor o igual a la difernecia del reorden['.$this->detallesmaterial()["reorden"].'  y la cantidad solicitada  '. $this->detallesmaterial()['cantsol']);
                        }

		}
	}



	public static function create()
	{
		$model = new Alinventario();
		return $model;
	}


	public function getPrimaryKey()
	{
		return $this->id;
	}



	public function haystocklibre(){
		return ($this->{self::CAMPO_STOCK_LIBRE} > 0)?true:false;
	}




	public function stocklibre_a_reserva($cant){
		if($cant >0 ){
			if($this->verificaconsistencia_stock(self::CAMPO_STOCK_LIBRE,$cant)){
				$this->{self::CAMPO_STOCK_LIBRE}-=$cant;
				$this->{self::CAMPO_STOCK__RESERVADO}+=$cant;
				return true;
			} else {
				return false;
			}
			return true;
		} else {
			if($cant==0)
				return true;
			MiFactoria::Mensaje('error',$this->identidada().' :La cantidad que intenta Reservar('.$cant.')  no es positiva ');
			return false;
		}
	}


	public function  stocklibre_a_transito($cant){
		if($cant >0 ){
			if($this->verificaconsistencia_stock(self::CAMPO_STOCK_LIBRE,$cant)){
				$this->{self::CAMPO_STOCK_LIBRE}-=$cant;
				$this->{self::CAMPO_STOCK_TRANSITO}+=$cant;
				return true;
			} else {
				MiFactoria::Mensaje('error',$this->identidada().' La cantidad que intenta trasladar('.$cant.')  es mayor que el  stock libre ('.$this->cantlibre.')  ');
				return false;
			}
			return true;
		} else {
			if($cant==0)
				return true;
			//MiFactoria::Mensaje('error',__CLASS__.'=>'.__FUNCTION__.' Material '.$this->codart.' :La cantidad que intenta trasladar('.$cant.')  es negativa');
			return false;
		}
	}

	public function  stocktransito_a_libre($cant){
		if($cant >0 ){
			if($this->verificaconsistencia_stock(self::CAMPO_STOCK_TRANSITO,$cant)){
				$this->{self::CAMPO_STOCK_TRANSITO}-=$cant;
				$this->{self::CAMPO_STOCK_LIBRE}+=$cant;
				// $this->insertamensaje(InventarioUtil::FLAG_SUCCESS,$this->id." :  Ok,se paso ".$cant."  del stock libre a RESERVA");
				return true;
			} else {
				//$this->insertamensaje(InventarioUtil::FLAG_ERROR,$this->id." :La cantidad que intenta mover es mayo q lo del transito");
				//
				MiFactoria::Mensaje('error',$this->identidada().' No existe suficiente stock ('.$cant.')  de '.$this->getAttributeLabel(self::CAMPO_STOCK_TRANSITO).' :   para mover  al   '.$this->getAttributeLabel(self::CAMPO_STOCK_LIBRE).'       material '.$this->codart );
				return false;
			}

			return true;
		} else {
			if($cant==0)
				return true;
			MiFactoria::Mensaje('error',$this->identidada().' lA CANTIDAD ES NEGATIVA' );

			return false;
		}
	}

	public function  stockreserva_a_libre($cant){
		$cant=abs($cant);
			if($this->verificaconsistencia_stock(self::CAMPO_STOCK_RESERVADO,$cant)){
				$this->{self::CAMPO_STOCK_RESERVADO}-=$cant;
				$this->{self::CAMPO_STOCK_LIBRE}+=$cant;
				return true;



			} else {
				MiFactoria::Mensaje('error',$this->identidada()." La cantidad  ".$cant." de material ".$this->codart." Que piensa devolver al stock libre no se encuentra en reserva " );
					return false;
			}



	}

	public function getStockCamposAfectadosPrecio() {
		///Mucho cuidado aqui , para evitar confusiones , es mejor leer
		// ESTAS CANTIDAES DESDE UN REGISTRO DIFERENTE AL OBJETO,
		//PARA SEGURARNOS QUE SE LENA CANTIDADES ORIGINALES
		$modeloprueba=Alinventario::model()->findByPk($this->id);
		$cantidadafectada=0;
		foreach($modeloprueba->camposstockafectadosporprecio as $clave=> $valor)
		{
			$cantidadafectada+=(is_null($modeloprueba->{$valor}))?0:$modeloprueba->{$valor};
			//echo "  el campo  :  ".$clave."    el valore  : ".
		}
		unset($modeloprueba);
		return $cantidadafectada;
	}

	public function getStockPrecioEstandar() {
		if(!$this->isnewRecord){
			return $this->alinventario_maestrodetalle->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR};

		}	else 	{
			return 0;
		}
	}


	public function actualizaprecio($cant,$punitnuevo,$idkardex=null) {
			$cantidadafectada=$this->getStockCamposAfectadosPrecio();
			///Que pasa si la cantidad afectada es  cero
			if( $cantidadafectada==0 ){
				///Aqui no hay mucho porblema
				if($this->getControlPrecio()==self::FLAG_PRECIO_PROMEDIO_VARIABLE ) {
					$this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}=$punitnuevo;
				}
				if($this->getControlPrecio()==self::FLAG_PRECIO_ESTANDAR ) {
					///sI ES ESTANDAR SOLO BASTA CON COLOCAR EL NUEVO REP
						$this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR}=$this->getStockPrecioEstandar();
					// Se calcula la difrencia unitaria de precio
					$this->{self::NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA}=round(($punitnuevo-$this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR})/$cant,4);
					//MiFactoria::Mensaje('notice',__CLASS__.' => '.__FUNCTION__." ok, SE ACUMULO UNA DIFERENCIA DE PRECIO " );
				}
			} else { //aqui si hay chicha
				if($this->getControlPrecio()==self::FLAG_PRECIO_PROMEDIO_VARIABLE ) {
					//valor ponderado
					$this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}=round(($punitnuevo*$cant+$this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}*$cantidadafectada)/($cant+$cantidadafectada),3);
				}
				if($this->getControlPrecio()==self::FLAG_PRECIO_ESTANDAR ) {
					///sI ES ESTANDAR SOLO BASTA CON COLOCAR EL NUEVO REP
					$this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR}=$this->getStockPrecioEstandar();
					// Se calcula la difrencia unitaria de precio  OJO NO ES PONDERADO
					$this->{self::NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA}=round(($punitnuevo-$this->{self::NOMBRE_CAMPO_PRECIO_ESTANDAR})/$cantidadafectada,3);
				}
			}

		/*  Si se trata de un lifo o FIFO*/
		//var_dump($this->getControlPrecio());die();
		if(in_array($this->getControlPrecio(),array(self::FLAG_PRECIO_FIFO,self::FLAG_PRECIO_LIFO) )) {
			//echo "sale "; die();
			$this->{self::NOMBRE_CAMPO_PRECIO_UNITARIO}=$this->refrescapreciolote();
		}


		return true;
	}


	public function getMensajes(){
		/*echo " ya hoa que caraqjo vas a decir ";
		print_r($this->mensajes);*/

		return $this->mensajes;
	}




	protected function verificaconsistencia_stock($nombrecampostockorigen, $cant){
            Yii::log('Alinventario verificaconsistencia_stock( nombrecampostockorigen='.$nombrecampostockorigen.','.$cant.'  ): ', CLogger::LEVEL_TRACE);      

		$retorno=false;
                if($this->eslifofifo() )
			 if(!$this->verificaconsistencialotes()){
                             return false;
                         }
		foreach ($this->camposstock as $clave=>$valor ) {
			if($clave==$nombrecampostockorigen){
				if( $this->{$valor} >= $cant ) {
					$retorno=true;
				//	echo " jajajaja lo encontramos :    ".$this->{$valor}."  > ".$cant." <br>";
					break;
				}else  {
					//$this->insertamensaje('error',' No existe suficiente stock de  '.$this->getAttributeLabel($nombrecampostockorigen).' para mover  '.$this->cant.' '.$this->maestro->maestro_ums->desum.'(s) del material '.$this->codart);
					//$this->insertamensaje('error',' No existe suficiente stock de  '.$this->getAttributeLabel($nombrecampostockorigen).' :  '.$this->{$nombrecampostockorigen}.'   para mover  '.$cant.'  '.$this->maestro->maestro_ums->desum.'(s) del material '.$this->codart);
					MiFactoria::Mensaje('error',$this->identidada().' No existe suficiente stock de  '.$this->getAttributeLabel($nombrecampostockorigen).' :  '.$this->{$nombrecampostockorigen}.'   para mover  '.$cant.'  '.$this->maestro->maestro_ums->desum.'(s) del material '.$this->codart);
					//echo " ups el stock e smenor <br>";

					$retorno=false;
					break;
				}
			}
			if($retorno)break;
		}

		return $retorno;
	}

	public static function loadModel($id)
	{
		return self::model()->findByPk($id);
	}





 public function actualiza_stock($codmov,$cant,$punitnuevo=null,$idkardex=null)
 {


                 Yii::log('Alinventario actualiza_stock()_: id='.$this->id.'  codmov='.$codmov.' cant='.$cant.' idkardex='.$idkardex, Clogger::LEVEL_INFO);      
                        $mensa="nada";
		   $retorno=false;
	 if($cant > 0){
            
		 $modelomov=Almacenmovimientos::model()->findByPk($codmov);
	   $signo=$modelomov->signo;
		 $campo=$modelomov->campoafectadoinv;
		 $campodestino=$modelomov->campodestino;
		 if($signo < 0){
		 	if($this->verificaconsistencia_stock($campo,$cant))
		     {
				 Yii::log('Alinventario verifico consisitencia stock, signo menor que cero ', CLogger::LEVEL_INFO);      

                            $this->{$campo}+= $signo*$cant;
				 //REPOSICION DE STOCKS
				 $this->reposicionauto();
				 $retorno=true;
		     } else {
				MiFactoria::Mensaje ( 'error' , __CLASS__ . '=>' . __FUNCTION__ . '  INCONSISTENCIA DE STOCK, CANTIDAD A SACRA MAYOR QUE EL STOCK ' );
				$retorno=false;$mensa="primer";
				//echo " verifica osdnsitencioa de sotclk dio  falso <br>  ";YII::APP()->END();
			}
		    } elseif($signo==0){  //// Si es un movimiento entre stocks , no entra ni sale nada
			 		if($this->verificaconsistencia_stock($campo,$cant))
			 		{
						 $this->{$campo}-=$cant;
						 $this->{$campodestino}+=$cant;
						$retorno=true;
			 			}  else {
						MiFactoria::Mensaje ( 'error' , __CLASS__ . '=>' . __FUNCTION__ . '  INCONSISTENCIA DE STOCK, CANTIDAD A SACRA MAYOR QUE EL STOCK ' );
                                                    $mensa="segundo";
						$retorno=false;
					}
		   }  else { /// Si es un ingreso
                       if($this->eslifofifo() ){
			 if(!$this->verificaconsistencialotes()){
			 MiFactoria::Mensaje ( 'error' , __CLASS__ . '=>' . __FUNCTION__ . '    '.__LINE__.'  Se verifico que no hay consistencias con los lotes de este registro de inventario ');
				$retorno=false;
                                $mensa="tercer";
                                   }
                       
                         }else{
                                $this->{$campo}+=$cant;
                                $retorno=true;
                         }
		 }
	 } else {
		 MiFactoria::Mensaje('error',$this->identidada().' La cantidad no es postiva ');
		 $retorno=false;
                 $mensa="curto";
		}
    if(!$this->tratalotes($cant,$codmov,$idkardex)){echo "erro ala tratar lotes ";die();}
	 if($modelomov->actualizaprecio=='1' or  ($this->eslifofifo())  )
	 {
		// echo "salio";die();
		 $this->actualizaprecio($cant*$signo,$punitnuevo,$idkardex);
	 }
	 if($retorno) {
			 	 $this->setScenario ( self::ESCENARIO_ACTUALIZARSTOCK );
						  if ( ! $this->save () ) {
				  					//MiFactoria::Mensaje ( 'error' , __CLASS__ . '=>' . __FUNCTION__ . ' Material ' . $this->codart . ' Hubo un problema al grabar el registro de inventario ' );
							  MiFactoria::Mensaje ( 'error' , __CLASS__ . '=>' . __FUNCTION__ . '  '.yii::app()->mensajes->getErroresItem($this->geterrors()) );
							  $retorno = false;
							          //echo " fallo al grabar <br>";
			  		                } else {
							     $retorno=true;
							  
								   }
		  		} else {
			  MiFactoria::Mensaje ( 'error' , __CLASS__ . '=>' . __FUNCTION__ . ' Hubo un error al intentar actaulizar el inventario  '.$mensa );
			  //  echo "no hay consistencia para actualkziar invnetario";
	 }

   return $retorno;

 }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{alinventario}}';
	}
 	/**
	 * @return array validation rules for model attributes.
	 */

	public function afterFind() {

			$this->cant=$this->getstockregistro();


		return parent::afterfind();
	}




	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$mascaraubic=yii::app()->settings->get('inventario','inventario_mascaraubicaciones');
		//VAR_DUMP($mascaraubic);Yii::app()->end();
		return array(

			///actualizacion masiva de ubicaciones
			array('id,ubicacion','safe','on'=>'BATCH_UBICACIONES_UPD'),
			array('id,ubicacion','safe','on'=>'BATCH_UBICACIONES_STOCK_UPD'),
			//array('cantlibre','numerical' ,'min'=>0, 'message'=>'Debe ser positivo','on'=>'BATCH_UBICACIONES_UPD,BATCH_UBICACIONES_STOCK_UPD'),

			///actualizacion masiva de stock en carga inicial
			array('id,ubicacion,cantlibre,codmon,punit','safe','on'=>'BATCH_CARGA_INICIAL_UPD'),
			array('cantlibre,punit','required','on'=>'BATCH_CARGA_INICIAL_UPD'),
			array('codmon','exist','allowEmpty' => false, 'attributeName' => 'codmoneda', 'className' => 'Monedas','message'=>'Esta moneda no existe','on'=>'BATCH_CARGA_INICIAL_UPD'),

			//array('codmon','required','on'=>'BATCH_CARGA_INICIAL_UPD'),
			array('cantlibre','chkcargainicial','on'=>'BATCH_CARGA_INICIAL_UPD'),


			//array('id,ubicacion','safe','on'=>'BATCH_UBICACIONES_STOCK_UPD'),
			//array('cantlibre','numerical' ,'min'=>0, 'message'=>'Debe ser positivo','on'=>'BATCH_UBICACIONES_UPD,BATCH_UBICACIONES_STOCK_UPD'),
			//array('ubicacion', 'match','allowEmpty'=>true, 'pattern'=>$mascaraubic,'message'=>'Ubicacion Incorrecta, debe de ser de la forma :'.$mascaraubic),
			array('codalm,codcen,fechaini,fechafin', 'required','message'=>'Valores obligatorios', 'on'=>'KPI_ROT'),
			array('fechaini', 'chkfechas','message'=>'Fechas incosistentes para el reporte', 'on'=>'KPI_ROT'),




			array('ubicacion', 'safe','on'=>'cambiaubicaciones'),


			array('ubicacion', 'match','allowEmpty'=>true, 'pattern'=>$mascaraubic,'message'=>'Ubicacion Incorrecta, debe de ser de la forma :'.$mascaraubic),
			array('codalm', 'required','message'=>'Debes de ingresar el almacen', 'on'=>'insert,update'),
				array('codcen', 'required','message'=>'Debes de ingresar el centro', 'on'=>'insert,update'),
				array('codmon', 'required','message'=>'Ingresa la moneda','on'=>'insert,update'),
				array('codart','required','message'=>'Debes de ingresar el material','on'=>'insert,update'),
				//array('codart','unique','message'=>'Este material ya esta registrado','on'=>'insert'),
			array('cantlibre, canttran, cantres', 'numerical','on'=>'insert,update'),
			array('codalm', 'length', 'max'=>3,'on'=>'insert,update'),
			array('periodocontable, codresponsable, codcen', 'length', 'max'=>4,'on'=>'insert,update'),
			array('codart, ubicacion, lote', 'length', 'max'=>10,'on'=>'insert,update'),
			array('ssiduser', 'length', 'max'=>30,'on'=>'insert,update'),
			array('punit, modificadopor, cantlibre, cantres, modificadoel,codmon, fechainicio, fechafin ', 'safe','on'=>'insert,update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codalm, creadopor, creadoel, modificadopor, modificadoel, fechainicio, fechafin, periodocontable, codresponsable, id, codart, codcen, um, cantlibre, canttran, cantres, ubicacion, lote', 'safe', 'on'=>'search'),
		

				//array('cantres,cantlibre,canttran,punit,punitdif','safe','on'=>self::ESCENARIO_ACTUALIZARSTOCK),

					///para carga masiva
			//array('id,cantlibre', 'safe','on'=>'cargamasiva'),
			//array('id,cantlibre', 'required','message'=>'Validacion de carga masiva ha fallado', 'on'=>'cargamasiva'),
						//array('codcen', 'required','message'=>'Debes de ingresar el centro', 'on'=>'insert,update'),


		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'maestro' => array(self::BELONGS_TO, 'Maestrocompo', 'codart'),
			'maestrodetalle'=>array(self::BELONGS_TO, 'Maestrodetalle', array('codart'=>'codart','codalm'=>'codal','codcen'=>'codcentro')),
			'desolpe'=>array(self::BELONGS_TO, 'Desolpe', array('codart'=>'codart','codalm'=>'codal','codcen'=>'centro')),

			//'dlote'=>array(self::HAS_MANY, 'Lotes',
			'almacen' => array(self::BELONGS_TO, 'Almacenes', array('codalm'=>'codalm','codcen'=>'codcen')),
			'loteslifo' => array(self::HAS_MANY, 'Lotes', 'hidinventario','order'=>'orden DESC', 'condition'=>'cant > 0 '),
			'lotesfifo' => array(self::HAS_MANY, 'Lotes', 'hidinventario','order'=>'orden ASC', 'condition'=>'cant > 0 '),
			'lotesvencidos' => array(self::HAS_MANY, 'Lotes', 'hidinventario','order'=>'fechavenc ASC', 'condition'=>'cant > 0 '),
			'lotesfrescos' => array(self::HAS_MANY, 'Lotes', 'hidinventario','order'=>'fechavenc DESC', 'condition'=>'cant > 0 '),
			'tienelotes'=>array(self::HAS_MANY, 'Lotes', 'hidinventario', 'condition'=>'cant > 0 '),
			'numerolotes'=>array(self::STAT, 'Lotes', 'hidinventario', 'condition'=>'cant > 0 '),

			'lotescosteado'=>array(self::STAT,'Lotes','hidinventario','select'=>'SUM(cant*punit)', 'condition'=>'cant > 0 '),
			'totallote'=>array(self::STAT,'Lotes','hidinventario','select'=>'SUM(cant)', 'condition'=>'cant > 0 '),
			'alinventario_maestrodetalle'=> array(self::HAS_ONE, 'Maestrodetalle', array('codal'=>'codalm','codcentro'=>'codcen','codart'=>'codart')),
			'alinventario_centros' => array(self::BELONGS_TO, 'Centros', 'codcen'),
			'alinventario_docompra'=>array(self::BELONGS_TO,'Docompra', array('codalm'=>'codigoalma','codcen'=>'codentro','codart'=>'codart')),
			'alinventario_alkardex_preciomedio'=>array(self::STAT,'Alkardex',array('codart'=>'codart','codalm'=>'alemi','codcen'=>'codcentro'),'select'=>'AVG(preciounit)'),
			'alinventario_alkardex_preciominimo'=>array(self::STAT,'Alkardex',array('codart'=>'codart','codalm'=>'alemi','codcen'=>'codcentro'),'select'=>'MIN(preciounit)'),
			'alinventario_alkardex_preciomaximo'=>array(self::STAT,'Alkardex',array('codart'=>'codart','codalm'=>'alemi','codcen'=>'codcentro'),'select'=>'MAX(preciounit)'),

			'subtotal'=>array(self::STAT, 'Docompra', 'hidguia','select'=>'sum(t.punit*t.cant)'),//el subtotal

		);
	}

	
	
	
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codalm' => 'Almacen',
			'creadopor' => 'Creadopor',
			'creadoel' => 'Creadoel',
			'modificadopor' => 'Modificadopor',
			'modificadoel' => 'Modificadoel',
			'fechainicio' => 'Fechainicio',
			'fechafin' => 'Fechafin',
			'periodocontable' => 'Periodo',
			'codresponsable' => 'Codresponsable',
			'id' => 'ID',
			'codart' => 'Material',
			'codcen' => 'Centro',
		//	'um' => 'Um',
			'punit'=>'Prec Unit',
			'pttotal'=>'Prec Total',
			'cantlibre' => 'Stock Libre',
			'canttran' => 'Stock trans',
			'cantres' => 'Stock Reser',
			'ubicacion' => 'Ubicacion',
			'lote' => 'Lote',
			'siid' => 'Siid',
			'ssiduser' => 'Ssiduser',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codalm',$this->codalm,true);

		$criteria->compare('fechainicio',$this->fechainicio,true);
		$criteria->compare('fechafin',$this->fechafin,true);
		$criteria->compare('periodocontable',$this->periodocontable,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcen',$this->codcen,true);
		//$criteria->compare('um',$this->um,true);
		$criteria->compare('cantlibre',$this->cantlibre);
		$criteria->compare('canttran',$this->canttran);
		$criteria->compare('cantres',$this->cantres);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('siid',$this->siid,true);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('punit',$this->punit,true);
		$criteria->compare('ssiduser',$this->ssiduser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getTotal($provider)
	{
		$total=0;
		foreach($provider->data as $data)
		{
			$t = $data->punit*$data->cantlibre;
			$total += $t;
		}
		return $total;
	}

	public  static function encontrarregistro($centro,$almacen,$codigo)
	{
		$criteria=new CDbCriteria;
		$criteria->addcondition("codcen=:vcodcen",'AND');
		$criteria->addcondition("codalm=:vcodalm",'AND');
		$criteria->addcondition("codart=:vcodart");
		$criteria->params=Array(":vcodcen"=>trim($centro),":vcodalm"=>trim($almacen),":vcodart"=>trim($codigo));
		$registro=self::model()->find($criteria);
		if (is_null($registro))
		throw new CHttpException(500,__CLASS__.'--'. __FUNCTION__.'--'.__LINE__.'   No existe inventario para  '.$centro.'--'.$almacen.'--'.$codigo);

		return $registro;

	}


	/* Esta funcion es de uso general sirve como capa
	para obtener el precio de stock unitario de un material*/
	public static function preciostock($centro,$almacen,$codigo,$um) {
		return self::model()->findByAttributes(array('codalm'=>$almacen,'codcen'=>$centro,'codart'=>$codigo))->punit*Alconversiones::convierte($codigo,$um);
	}

	public static function getTotalcant($provider)
	{
		$total=0;
		foreach($provider->data as $data)
		{
			$t = $data->cantlibre;
			$total += $t;
		}
		return $total;
	}

	public function search_por_codigo($codigo)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codalm',$this->codalm,true);




		$criteria->compare('fechainicio',$this->fechainicio,true);
		$criteria->compare('fechafin',$this->fechafin,true);
		$criteria->compare('periodocontable',$this->periodocontable,true);
		$criteria->compare('codresponsable',$this->codresponsable,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('codart',$this->codart,true);
		$criteria->compare('codcen',$this->codcen,true);
		//$criteria->compare('um',$this->um,true);
		$criteria->compare('cantlibre',$this->cantlibre);
		$criteria->compare('canttran',$this->canttran);
		$criteria->compare('cantres',$this->cantres);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('lote',$this->lote,true);
		$criteria->compare('siid',$this->siid,true);
		$criteria->compare('codmon',$this->codmon,true);
		$criteria->compare('punit',$this->punit,true);
		$criteria->compare('ssiduser',$this->ssiduser,true);
		$criteria->addcondition("codart='".$codigo."'");


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function search_por_almacen($alma)
	{
		$alma=MiFactoria::cleanInput($alma);
		$criteria=new CDBCriteria();
		$criteria->addCondition("codalm=:codalm");
		$criteria->params=array(":codalm"=>$alma);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search_por_almacen_con_stock($alma)
	{
		$alma=MiFactoria::cleanInput($alma);
		$criteria=new CDBCriteria();
		//$criteria->addCondition("codalm=:codalm");
		$criteria->addCondition("(".$this->getcadenacampos('t').") > 0 and codalm=:codalm");
		$criteria->params=array(":codalm"=>$alma);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	public function getcadenacampos($letra=null){
		$cadenacampos="";
		if(is_null($letra))
			$letra='a';
		else
			$letra=substr(MiFactoria::cleanInput($letra),0,1);
		foreach($this->camposstock as $clave=>$valor){
			$cadenacampos.="+".$letra.".".$valor;

		}
		return substr($cadenacampos,1);
	}

	public function getsumas(){
		$cadenasumas="";
		foreach($this->camposstock as $clave=>$valor){
			$cadenasumas.=", sum(a.".$valor.") as ".$valor." , sum((a.".self::NOMBRE_CAMPO_PRECIO_UNITARIO."+".self::NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA.")*(a.".$valor.")*b.venta ) as stock_".$valor;
		           }
		$cadenasumas.=", sum(".$this->getcadenacampos().") as cant_total,sum((a.".self::NOMBRE_CAMPO_PRECIO_UNITARIO."+".self::NOMBRE_CAMPO_PRECIO_DIFERENCIA_UNITARIA.")*(".$this->getcadenacampos().")*b.venta) as stock_total";
		return substr($cadenasumas,1);
	}

	  public function reservar($cantidad){
		 if($this->stocklibre_a_reserva($cantidad))
		 {
			 $this->setScenario(self::ESCENARIO_ACTUALIZARSTOCK);
			 if($this->save())
				 return true;
		 }

		  return false;
	  }

/* ***************************************
		Funcion que devuelve el valor del despacho
   o de lo movido segun la cantidad  $canti
    es un suma y actualiza los estados de los lotes

*******************************************/

public function valorizalotefifo($canti){
	$sumacant=0;
	$sumadetalle=0;
	foreach($this->lotefifo as $fila){
		$sumacant.=$fila->cant;
		if($sumacant < $canti){$sumamonto.=$fila->cant*$fila->punit;$fila->codestado='30';$fila->save();}
		if($sumacant == $canti){$sumamonto.=$fila->cant*$fila->punit;$fila->codestado='30';$fila->save(); break;}
		if($sumacant > $canti){$sumamonto.=($sumacant-$canti)*$fila->punit;$fila->cant=$sumacant+$fila->cant-$canti;$fila->save(); break;}
	}
	return $sumamonto;
}



	/* ***************************************
		Funcion que recorre los lotes hasa completar  la cantidad
	    despchada , descontadno de cada lote segun el orden LIFO FIFO
	*******************************************/

	public function descargalote($cantdespachada,$idkardex,$tipovaloracion){
		//Verificando prmero que es TIPO LIFO FIFO
		switch ($tipovaloracion) {
			case self::FLAG_PRECIO_FIFO:
				$filas=$this->lotesfifo;
				break;
			case self::FLAG_PRECIO_LIFO:
				$filas=$this->loteslifo;
				break;
			case 'VENC':
				$filas=$this->lotesvencidos;
				break;
			case 'FRES':
				$filas=$this->lotesfrescos;
				break;
			default:
				$filas=array();
				break;
		}
		//var_dump($filas);
		$acumulado=0;
		$costo=0;
		foreach($filas as $fila){

				$acumulado+=$fila->cant;
				$fila->setScenario('despacho');
				if($acumulado <= $cantdespachada){ ///
					$fila->registradespacho($fila->cant,$idkardex);
					$costo+=$fila->punit*$fila->cant;
					$fila->cant=0;
					$fila->hidkardex=$idkardex;
					$fila->save();
					if($acumulado == $cantdespachada)
						break; /// romper el bucle para que
				}else{
					$fila->registradespacho($fila->cant-($acumulado-$cantdespachada),$idkardex);
					$costo+=$fila->punit*($acumulado-$cantdespachada);
					$fila->cant=($acumulado-$cantdespachada);
					$fila->hidkardex=$idkardex;
					$fila->save();
					break;
				}


		}
	/*echo "cat despachasda : ".$cantdespachada."<br>";
		//echo "cat despachasda : ".$cantdespachada."<br>";
   echo "costo toal  : ".$costo;
		die();*/

return $costo;

	}




	/* ***************************************
		Funcion que recorre los lotes h
	para calcular el costo total del despacho
	  segun el orden LIFO FIFO
	*******************************************/

	public function costealote($cantdespachada,/*$idkardex,*/$tipovaloracion,$idkardex=null){
		//Verificando prmero que es TIPO LIFO FIFO
		switch ($tipovaloracion) {
			case self::FLAG_PRECIO_FIFO:
				$filas=$this->lotesfifo;
				break;
			case self::FLAG_PRECIO_LIFO:
				$filas=$this->loteslifo;
				break;
			case 'VENC':
				$filas=$this->lotesvencidos;
				break;
			case 'FRES':
				$filas=$this->lotesfrescos;
				break;
			default:
				$filas=array();
				break;
		}
//var_dump($filas);die();
			$acumulado=0;
			$costo=0;
			foreach($filas as $fila){

				$acumulado+=$fila->cant;
				if($acumulado <= $cantdespachada){ ///
					IF($acumulado == $cantdespachada){
						$costo+=$fila->punit*$fila->cant;
						//ECHO "BREAK ARRIBA   CANTIDAD  ".$fila->cant." FILA PUNIT = ".$fila->punit." COSTO = ".$fila->punit*$fila->cant."      COSTO ACUM = ".$costo."<BR>";

						BREAK;
					}ELSE{
						$costo+=$fila->punit*$fila->cant;
					}
				}else{
					$costo+=$fila->punit*($cantdespachada-$acumulado+$fila->cant);
					//ECHO "BREAK ABAJO CANTIDAD  ".$fila->cant." FILA PUNIT = ".$fila->punit." COSTO = ".$fila->punit*$fila->cant."      COSTO ACUM = ".$costo."<BR>";

					break;
				}
				//ECHO "CANTIDAD  ".$fila->cant." FILA PUNIT = ".$fila->punit." COSTO = ".$fila->punit*$fila->cant."      COSTO ACUM = ".$costo."<BR>";
			}


		return $costo;
	}

public function refrescapreciolote(){
	if($this->tienelotes >0){
		//echo " costoe de loste";
		//var_dump($this->lotescosteado);
		//echo " stock toal  old  ";
		//var_dump($this->oldgetstockregistro());
		//echo " stock toal ";
		//var_dump($this->getstockregistro());
		if($this->getstockregistro()==0)
			return 0;
		return round($this->punit=$this->lotescosteado/$this->getstockregistro(),3);
	}else{
		return 0;
	}
}



	private function getcantidad(){

		$total=0;
		foreach($this->camposstock as $clave=>$valor){
			$total+=is_null($this->{$clave})?0:$this->{$clave};
		}
		return $total;
	}


	/* ***************************************
		Funcion que recorre los lotes hasa RECONSTRIUR   la cantidad
	    despchada , descontadno de cada lote segun el orden LIFO FIFO
	*******************************************/

	public function reconstruyelote($hidkardex){
            yii::log('*****funcion reconstruye lotes() ....*** ', CLogger::LEVEL_INFO);
		//verificando la cantida que se despacho
		$regkardex=Alkardex::model()->findByPk($hidkardex);
                yii::log('El kardex en esta funcion es  '.$hidkardex, CLogger::LEVEL_INFO);
		if(!is_null($regkardex)){
			$cantidadareponer=$regkardex->cant;unset($regkardex);
                         yii::log('La cantidad a reponer es   '.$cantidadareponer, CLogger::LEVEL_INFO);
		
			$registros=Dlote::model()->findAll("hidkardex=:vkardex  ",array(":vkardex"=>$hidkardex));
			//var_dump($hidkardex);var_dump($registros);yii::app()->end();
 			 yii::log('Se encontraron   '.count($registros).'    Registros DLOTE', CLogger::LEVEL_INFO);
		
                        foreach($registros as $registro){
                             yii::log('en el for  de DLOTE   '.$registro->cant, CLogger::LEVEL_INFO);
		
				$registro->lote->setScenario('reconstruye');
					$registro->lote->cant+=$registro->cant;
				    $registro->delete();
					IF(!$registro->lote->save()){
						//echo "fallo;";die();
						MiFactoria::Mensaje('error',$this->identidada().'   '.yii::app()->mensajes->getErroresItem($registro->lote->geterrors()));

					}else{
					//	echo " graboi";die();
					}
						}
		}else{
			MiFactoria::Mensaje('error',$this->identidada().'  El valor del id kardex '.$hidkardex.'  No tiene registro');
		}
	}




	/* ***************************************
		Funcion que inserta regisro de lote automatico por compra o ingreso de prod
	*******************************************/
	public function crealote($hidkardex,$numerolote=null){
		//verificando la cantida que se despacho

		$regkardex=Alkardex::model()->findByPk($hidkardex);
		//var_dump($hidkardex);var_dump($regkardex);
		if(!is_null($regkardex)){
			$cantidad=$regkardex->cantidadbase(); //En unidades base porque es un registro de Inventario
			$montomovido=$regkardex->montobase();//En unidades base porque es un registro de Inventario

			$refkardex=Alkardex::model()->findByPk($regkardex->idref);
			if(!is_null($refkardex)){
				if($refkardex->codmov=='77' AND
					in_array($refkardex->alkardex_alinventario->maestrodetalle->controlprecio,
						array('F','V'))
				)  //OJO SI la conTraparte ha sido un INICIO DE TRASALADO Y ESTE MATERIAL TIENE CONTROL DE PRECIOS F,L  , LOS LOTES DEBEN DE MANTENER SU INDENTIDAD
				{ //eN ESTE CASO CREAREMOS LOS LOTES DEACUERDO TAL COMO FIGURAN EN EL RESITRO DE LOS DLOTES(DESPACHOS)  (EN LE KARDEX DEL IICIO DEL TRASALDO)
					$despachos=Dlote::model()->findAll("hidkardex=:vidkardex",array(":vidkardex"=>$refkardex->id));
					foreach($despachos as $filadespacho)
					{

							$lote=New Lotes('automatico');
						$lote->setAttributes(
							array(
								'numlote'=>substr($numerolote,0,32),
								'fechaingreso'=>date('Y-m-d H:i.s'),
								'cant'=>$filadespacho->cant,//Ojo es la misma unidad de invenatrio a ainventario, la unidad base4
								'hidinventario'=>$this->id,
								'hidkardex'=>$hidkardex,
								//'orden'=>microtime(true),
								//'stock'=>$campo,
								'punit'=>$filadespacho->lote->punit*  ///Aqui si los punits pueden ser difernetes por el cambio de moneda
									yii::app()->tipocambio->
									getcambio($refkardex->codmoneda, $regkardex->codmoneda),
							)
						);

						if(!$lote->save())
							MiFactoria::Mensaje('error',$this->identidada().'   '.yii::app()->mensajes->getErroresItem($lote->geterrors()));
					}
					return;

				}

			}

				unset($regkardex);
				$lote=New Lotes('automatico');
				$lote->setAttributes(
					array(
						'numlote'=>substr($numerolote,0,32),
						'fechaingreso'=>date('Y-m-d H:i.s'),
						'cant'=>$cantidad,
						'hidinventario'=>$this->id,
						'hidkardex'=>$hidkardex,
						//'stock'=>$campo,
						'punit'=>$montomovido/$cantidad,
					)
				);
				if(!$lote->save())
					MiFactoria::Mensaje('error',$this->identidada().'     '.yii::app()->mensajes->getErroresItem($lote->geterrors()));

			}else {
			MiFactoria::Mensaje('error', '  El valor del id kardex ' . $hidkardex . '  No tiene registro');
		}
		}






public function lotesporcampo($campostock){
	$criterio=New CDBCriteria();
	$criterio->addCondition("hidinventario=:vid AND stock=:vstock and cant > 0");
	$criterio->params=array(":vid"=>$this->id,":vstock"=>$campostock);
   return  Lotes::model()->findAll($criterio);
}

	public function resumenlote($campostock){
	$rela= Yii::app()->db->createCommand()
		->select(' sum(a.cant) as scant, sum(a.cant*a.punit) as monto, sum(a.cant*a.punit)/sum(a.cant) as punitario ')
		->from('{{lotes}} a ')
		->where("hidinventario=:vid AND stock=:vstock and cant > 0",array(":vid"=>$this->id,":vstock"=>$campostock))
		->queryAll();
		if(is_null($rela[0]['scant']))
			unset($rela[0]);
		return $rela;
	}





	/* ********* Esta funcion verifica la cosnisyencia de los datops del registro del inventario
	conl os datos de los lotes en cantidades y
	tipo de stock ********************/

private function verificaconsistencialotes(){
	$retorno=true;
	/*var_dump($this->oldAttributes);
var_dump($this->attributes);*/
	//var_dump($this->loteslifo);die();
	//VAR_DUMP($this->totallote);VAR_DUMP($this->getstockregistro());
	if($this->totallote > 0){
		$diferenciacantidad=abs($this->totallote-$this->getstockregistro());
                //VAR_DUMP($diferenciacantidad);die();
		if($diferenciacantidad/$this->getstockregistro() > $this->almacen->tolstockres){
			//echo 'La sumatoria del stock ('.$matriz[0]['scant'].') del  lote   no coincide con el stock ('.$valor.'=>'.$this->getstockregistro().') del registro inventario ('.$this->id.')  ';die();
			//VAR_DUMP($this->almacen->tolstockres);VAR_DUMP($diferenciacantidad/$this->getstockregistro());
			MiFactoria::Mensaje('error',$this->identidada().'     La sumatoria del stock ('.$this->totallote.') del  lotes   no coincide con el stock ('.$this->getstockregistro().') del registro inventario ('.$this->id.')  ');
			$retorno=false;
		}
		/*$punitlotes=$this->lotescosteado/$this->totallote;
		$diferenciapunit=abs($this->punit-$punitlotes);
		if($diferenciapunit/$this->punit > 0.001 ){
			//echo 'El precio unitario ('.$preciounitario.')  del inventario,  no coincide con el precio unitario ('.$this->punit.') calculado del lote   del registro inventario ('.$this->id.')  ';die();
			MiFactoria::Mensaje('error','El precio unitario ('.$this->punit.')  del inventario,  no coincide con el precio unitario ('.$punitlotes.') calculado del lote   del registro inventario ('.$this->id.')  ');
			$retorno=false;
		}*/
	} else{
		if( $this->getstockregistro()>0 ){$retorno=false;}
	}
	return $retorno;
}

	public function tratalotes($cant,$codmov,$idkardex,$tipovaloracion=null)
	{
		yii::log('tratando lotes ', CLogger::LEVEL_INFO);
            if (is_null($tipovaloracion))
			$tipovaloracion = $this->maestrodetalle->controlprecio;
		if ($this->eslifofifo()) {
                    yii::log('ohh eS LIFO FIFO ... ', CLogger::LEVEL_INFO);
				/*verificando el signo*/
				$modelomov = Almacenmovimientos::model()->findByPk($codmov);
				$campo = $modelomov->campoafectadoinv;
				$campodestino = $modelomov->campodestino;
				$signo = $modelomov->signo;
                                 yii::log('El movimiento es ['.$codmov.']', CLogger::LEVEL_INFO);
			
				//$lotes = $this->lotesporcampo($campo);
				if ($signo > 0) {
					/*var_dump($modelomov);
					var_dump($modelomov->anticodmov);
					var_dump(Almacenmovimientos::model()->findByPk($modelomov->anticodmov));die();*/
					if (Almacenmovimientos::model()->findByPk($modelomov->anticodmov)->esconsumo == '1') {
						//VAR_DUMP($codmov);VAR_DUMP($modelomov->anticodmov);
                                            yii::log('El movimiento opuesto a ['.$codmov.']  es ['.$modelomov->anticodmov.'] y es CONSUMO    ', Clogger::LEVEL_INFO);
                                            $this->reconstruyelote($idkardex);
                                             yii::log('SE  RECNSTRUYO LE LOTE  ', CLogger::LEVEL_INFO);
                                           
                                                   // ECHO "RECONS "; DIE();
					} else {
						IF($modelomov->idevento=='71'){ //Si es un movimiento de anulacion
                                                    yii::log('Movimiento 71 DE ANUALCION ', CLogger::LEVEL_INFO);
							$this->reconstruyelote($idkardex);
                                                         yii::log('SE  RECNSTRUYO LE LOTE  ', CLogger::LEVEL_INFO);
							//echo " op1k  <b> ".$codmov;die();
						}ELSE{
							 yii::log('SE CREA EL LOTE ', CLogger::LEVEL_INFO);
							$this->crealote($idkardex);
						}

					}
				}
				if ($signo == 0) {
					if (!is_null($campodestino)) {

						//$this->traspasalote($cant,$idkardex,$tipovaloracion, $campo, $campodestino);
						//echo " op66862  <b>";die();
					} else {
						MiFactoria::Mensaje('error',$this->identidada().'  No especifico el campo destino para este movimiento');
						//echo " op3  <b>";die();
					}
				}
				if ($signo < 0) {
					if ($modelomov->esconsumo == '1') {
						$this->descargalote($cant, $idkardex, $tipovaloracion);
						//echo " op4  <b>";die();
					} else {

						IF($modelomov->idevento=='71'){ //Si es un movimiento de anulacion
							$this->borraloteporkardex($idkardex);
						}ELSE{
							$this->descargalote($cant, $idkardex, $tipovaloracion);
						}

						//echo " op5  <b>";die();
					}
				}
				return true;

		}else{
			return true;
		}

	}

	/*funcio que permite borrar el ote de acuerdo a su karedx
	 DE UNO A UNO, SE USA PARA ANULACIONES DE VALE */

	public function borraloteporkardex($id){
		$calv=Alkardex::model()->findByPk($id)->idotrokardex;
	/*	echo " lallaa  ";var_dump($calv);
		echo " dfdfd  ";var_dump(Lotes::model()->findAll("hidkardex=:vkardex ",array(":vkardex"=>$calv)));*/
		foreach(Lotes::model()->findAll("hidkardex=:vkardex ",array(":vkardex"=>$calv)) as $fila){
			if($fila->tienedespachos == 0){  ///Solo si los lotes no se han tocado
				//$calv=Alkardex::model()->find("idotrokardex=:vkardex",array(":vkardex"=>$id))->id;
				//Dlote::model()->deleteAll("hidlote=:vidlote ",array(":vidlote"=>$fila->id,":vkardex"=>$calv));//por si acaso
				//die();
				Lotes::model()->deleteAll("hidkardex=:vkardex",array(":vkardex"=>$calv));
			}else{
				MiFactoria::Mensaje('error',$this->identidada().'   El lote '.$fila->numlote.'   Ya tiene movimientos y no puede anular el documento');
			}
		}


	}

	public function traspasalote($cantidad,$idkardex,$tipoval,$campo,$campodestino){

       $this->descargalote($cantidad,$idkardex,$tipoval,$campo);
		//$this->crealote($cantidad,$idkardex,$campodestino);
	}

	//Funcion que valida la carha iincial de inventariuo soo
	// para materiales del tipo valoracion promedio varaibel
	public function chkcargainicial($attribute,$params)
	{
		//primero validando el tipo de valoracion
		if($this->getControlPrecio()==self::FLAG_PRECIO_PROMEDIO_VARIABLE){
			if(!($this->cantlibre >0 AND $this->punit >0 ))
				$this->adderror('cantlibre','El stock del material  '.$this->codart.'  o la cantidad del material no puede ser cero  ');
			if(!($this->almacen->codmon==$this->codmon ))
				$this->adderror('codmon','La moneda no corresponde a la valorizacion de almacen  ');

		}else{
			$this->adderror('cantlibre','El material  '.$this->codart.'  Tiene un tipo  "'.$this->getControlPrecio().' " de valoracion diferente al promedio variable : "'.FLAG_PRECIO_PROMEDIO_VARIABLE.' " ');
		}
	}

	//Funcion que valida las fechas para los indincadores

	public function chkfechas($attribute,$params)
	{
		if(is_null($this->fechaini) or is_null($this->fechafin))
			$this->adderror('fechaini','Fechas incosistentes');
		if(yii::app()->periodos->verificaFechas($this->fechaini,$this->fechafin))
			$this->adderror('fechaini','Fecha inicial mayor o igual que la fecha final');

	}



	/*Esta funcion verifica si el usuariop ha creado
        un vale de ajuste de nivietario durante la sesion de susuario
        */

	private static function getvaleajuste($movimiento,$fechainisesion){
		$criterio=New CDBcriteria();
		$criterio->addCondition("iduser=:iduser");
		$criterio->addCondition("codmovimiento=:codmov");
		$criterio->addCondition("fechacre >=:fechacre");
		$criterio->params=array(
			":iduser"=>yii::app()->user->id,
			":codmov"=>$movimiento,
			":fechacre"=>$fechainisesion
		);
		return Almacendocs::model()->find($criterio);
	}

	/*Esta funcion crea
        un vale de ajuste de nivietario durante la sesion de susuario
        */
	public static function  creavaleajuste($codmov,$codalm,$codcen){
		$usuario=yii::app()->user->um->loadUserById(yii::app()->user->id);
		$sesion=yii::app()->user->um->findSession($usuario);
		$inicio=date("Y-m-d H:i:s",$sesion->created+0);
		$final=date("Y-m-d H:i:s",$sesion->expire+0);
		$registro=self::getvaleajuste($codmov,$inicio);
		if(is_null($registro)){  ///Si no se ha creado todavia
			//$registro=New Almacendocs();
			$registro=New Almacendocs('clonar');
			$registro->setAttributes(
				array(
					'fechavale'=>date("Y-m-d"),
					'codmovimiento'=>$codmov,
					'codalmacen'=>$codalm,
					'codcentro'=>$codcen,
					'codocu'=>'400',
					'fechacont'=>date("Y-m-d"),
					'idref'=>null,
					//'cestadovale'
					'fechacre'=>date("Y-m-d H:i:s"),
					//'numdocref'=>$this->codart.'-'.$this->codalm,	)
			));
			if(!$registro->save())
			{
				MiFactoria::Mensaje('error',yii::app()->mensajes->getErroresItem($registro->geterrors()));
				return null;
			}else{
				return $registro;
			}

		}else{
			return $registro;
		}

	}




	public function beforeSave(){
		$this->pttotal=round($this->getstockregistro()*$this->punit,2);
		return parent::beforeSave();
	}

	private function identidada(){
		return '[ Objeto :'.__CLASS__.'] [ Funcion :'.__FUNCTION__.']  [ Linea :  '.__LINE__.']      Material : '.$this->codart.'- Almacen : '.$this->codalm.'  ';
	}


	public function rotacionmaterial($fec,$fec2){
		//ubicamos la frecuencia
		$criteria=New CDBCriteria();
		if(preg_match('/^\d{4}-\d{2}-\d{2}$/',$fechaini)>0 and
			preg_match('/^\d{4}-\d{2}-\d{2}$/',$fechafin)>0 ) {
			$criteria->params = array(":codart" => $this->codart, ":codalm" => $this->codalm, ":codcen" => $this->codcen);
			$criteria->addBetweenCondition("a.fecha", $fec, $fec2);
			$criteria->addCondition(" a.codart=:codart and a.alemi=:codalm  AND a.codcentro=:codcen  AND
		                        d.codmov=a.codmov  and d.esconsumo='1' ");
			$rela = Yii::app()->db->createCommand()
				->select(' sum(abs(a.cantbase)) as montorotacion')
				->from('{{alkardex}} a, {{almacenmovimientos}} d ')
				->where($criteria->condition, $criteria->params)
				->queryAll();

			$relax = Yii::app()->db->createCommand()
				->select(' avg(abs(a.saldo)) as promediorotacion')
				->from('{{alkardex}} a,  {{almacenmovimientos}} d ')
				->where($criteria->condition, $criteria->params)
				->queryAll();

			// var_dump($rela);var_dump($relax);

			$numero = (is_null($rela[0]['montorotacion'])) ? 0 : (0 + $rela[0]['montorotacion']);
			$denominador = (is_null($relax[0]['promediorotacion'])) ? 0 : (0 + $relax[0]['promediorotacion']);
			if ($denominador == 0)
				return 0;
			return $numero / $denominador;
		} else{
			return 0;
		}
	}

	public function rotacionalmacen($fec,$fec2){
		//ubicamos la frecuencia
		$criteria=New CDBCriteria();
		if(preg_match('/^\d{4}-\d{2}-\d{2}$/',$fec)>0 and
			preg_match('/^\d{4}-\d{2}-\d{2}$/',$fec2)>0 ) {
			$criteria->params = array(":codalm" => $this->codalm, ":codcen" => $this->codcen);
			$criteria->addBetweenCondition("a.fecha", $fec, $fec2);
			$criteria->addCondition("  a.alemi=:codalm  AND a.codcentro=:codcen  AND
		                        d.codmov=a.codmov  and d.esconsumo='1' ");
			$rela = Yii::app()->db->createCommand()
				->select(' sum(abs(a.montomovido)) as montorotacion  ')
				->from('{{alkardex}} a, {{almacenmovimientos}} d ')
				->where($criteria->condition, $criteria->params)
				->queryAll();

			$relax = $this->getStockValAlmacen();

			// var_dump($rela);var_dump($relax);

			$numero = (is_null($rela[0]['montorotacion'])) ? 0 : (0 + $rela[0]['montorotacion']);
			$denominador = (is_null($relax)) ? 0 : (0 + $relax);
			if ($denominador == 0)
				return 0;
			return $numero / $denominador;

		}else{
			return 0;
		}
	}

	private function eslifofifo(){
		$retorno=false;
		IF(in_array($this->getControlPrecio(),array('L','F')))
			$retorno=true;
		return $retorno;
	}


	/*  funcio que devuelve el rpecio real
	es decir cuando se trata de lores deuwelve el precio inmeDiato a salir si xiste un LIFO O FIFO
	MUY UTIL CUANDO SE QUIERE ESTIMAR UN PRECIO DE UN MATERIAL ANTES DE SACARLO DEL ALAMCEN */

	public function getprecio($cant){
  		//$controlprecio=$this->getControlPrecio();
		if($this->eslifofifo()){
			return $this->costealote($cant,$this->getControlPrecio());
		} else{
			return $this->punit;
		}

     }
     
     public static function getrotacion($codalmacen,$limite=null){
         if($limite===null)
             $limite=10;
         return Yii::app()->db->createCommand()
            ->select(" count(a.codart) as n, a.codart ")
            ->from('{{alkardex}} a ')
            ->where("  a.alemi=:vcodal ", array(':vcodal'=>$codalmacen))
            ->group('a.codart')->limit($limite)
            ->queryAll();
     }
     
     /**************************************
      * 
      *   Esta funcion devuelve la cantida del articulo que esta pendeinte 
      *   de atender, OCOMPRAS abiertas pedneintes de atencion
      *   EXLCUYE AQUELLAS COMPRAS QUE SON DE IMPUTACION DIRECTA POR 
      *   NO ESTAR DESTINADAS AL STOCK,
      * 
      *************************************/
     
     public function ingresoCompraPendiente(){
        $filas= Yii::app()->db->createCommand(
                 "select t.cant-sum(b.cant) as faltan,t.cant 
                from {{docompra}} t,
                {{alentregas}} b  where 
                b.iddetcompra=t.id and
                t.iddesolpe not in 
                (select id  from 
                    {{desolpe}} where idreserva  > 0)  
                    and t.codart='".$this->codart."'  and 
                    t.codentro='".$this->codcen."'  
                    and t.codigoalma='".$this->codalm."' 
                    group by  t.codart
                    having sum(b.cant) < t.cant")->queryAll();
        if(count( $filas)>0)
         return $filas[0]['faltan'];
        return 0;
     }
     
     
     public function actualizaPrecioVenta(){
         if(yii::app()->hasModule('ventas')){
             //mirando si tiene la tabla de precios
         }
         return -1;
     }

}