<?php
class ImpuestosCompo extends CApplicationComponent
{
private $_valor;

public function getIgv()
{
    $this->_valor= Igv::model()->findByAttributes(array('activo'=>'1','tipo'=>'01'));
    if(is_null($this->_valor)){
        throw new CHttpException(500,'No se ha definido el impuesto general a las ventas ');

} else {
        if($this->_valor > 1)
            $this->_valor= round($this->_valor/100,2);
    }
        return $this->_valor;

    }


}
?>