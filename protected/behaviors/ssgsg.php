<?php
class MyBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();


    public function afterFind($event)
    {

        $this->setOldAttributes($this->Owner->getAttributes());
    }

    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }

    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }


    ///Detecta si hubo cambios ene le modelo

    public function hubocambio()
    {
        $retorno=false;
        if (!$this->Owner->isNewRecord) {
            $newattributes = $this->Owner->getAttributes();
            $oldattributes = $this->getOldAttributes();

            foreach ($newattributes as $name => $value) {
                if (!empty($oldattributes)) {
                    $old = $oldattributes[$name];
                } else {
                    $old = '';
                }
                if ($value != $old) {
                    $retorno= true;
                    break;
                }
            }


        } else {
            $retorno= true;
        }
        return $retorno;
    }


    ///retorna un array con los campso s modificadsos, esto ayuda
    //mas que la funcion hubocambio, porque te devuelve un array asociativo con solo los nombres de los campos
    //modificados
    public function cambios()
    {
        $camposmodificados=array();
        $newattributes = $this->Owner->getAttributes();
        $oldattributes = $this->getOldAttributes();
        foreach ($newattributes as $name => $value) {
            if (!empty($oldattributes)) {
                $old = $oldattributes[$name];
            } else {
                $old = '';
            }
            if ($value != $old) {
                if ($value != $old ) {
                    array_push($camposmodificados,$name);

                }
            }
        }

        return $camposmodificados;
    }



}