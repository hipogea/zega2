<!--iNSERTA UN CAMPO OCULTO EN CUALQUIER FORMULARIO
PARA GUARDAR UN IDENTIIFCADOR Y EVITAR DOBLE POST !-->



<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class identificador extends CWidget
{


    public $form;
    public $model;
    public $nombrecampo;



    public function init()
    {


    }

    public function run()
    {
        echo $this->form->hiddenField($this->model,$this->nombrecampo,array("value"=>md5(uniqid(rand(), true))));

    }

}
