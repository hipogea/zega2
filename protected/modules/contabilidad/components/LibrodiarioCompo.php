<?php
class LibrodiarioCompo extends CApplicationComponent
{

private $_modelolibro=null;
    private $_modelodeter=null;

    public function __construct() {
        $this->_modelolibro='Librodiario';
        $this->_modelodeter='Detercuentas';

    }

    /*funcionque general uel par de asinroes del debe y haber en la  en la tabla librodiario
    todo esto segun el codigo de la operacion y la categoria de valor
    */

  public function asiento($idref,$codocu,$codop,$catval,$fecha,$docref,$glosa,$monto)
  {
      $modelodere= $this->_modelodeter;
            $reg=new $this->_modelolibro;
     // var_dump( $reg);die();
                 $reg->setAttributes(
                         array(
                            'codcuenta'=> $modelodere::getCuenta($catval,$codop,'D'),
                             'fechacont'=> $fecha,
                             'glosa'=> $glosa,
                             'debe'=> $monto,
                             'docref'=> $docref,
                             'idref'=>$idref,
                             'codocu'=>$codocu
                             )
                         );
              $reg->save();
      unset($reg);
      $reg=new $this->_modelolibro;
      $reg->setAttributes(
          array(
              'codcuenta'=> $modelodere::getCuenta($catval,$codop,'H'),
              'fechacont'=> $fecha,
              'glosa'=> $glosa,
              'haber'=> $monto,
              'docref'=> $docref,
              'idref'=>$idref,
              'codocu'=>$codocu
          )
      );
      $reg->save();
      unset($reg);
  }


    public function asientosimple($cuenta,$cargo,$fecha,$glosa,$monto,$docref,$idref,$codocu)
    {
        $modelodere= $this->_modelodeter;
        $reg=new $this->_modelolibro;
        // var_dump( $reg);die();
        $reg->setAttributes(
            array(
                'codcuenta'=> $cuenta,
                'fechacont'=> $fecha,
                'glosa'=> $glosa,
                ($cargo=='D')?'debe':'haber'=> $monto,
                'docref'=> $docref,
                'idref'=>$idref,
                'codocu'=>$codocu
            )
        );
        $reg->save();
        unset($reg);

    }


}


?>