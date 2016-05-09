<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class registraidsession extends CWidget
{
	public $model=NULL;


		
	public function init()
	{

	}



	public function run()
	{

          $nombreclase=get_class($this->model);
		  // echo $this->form->hiddenField($this->model,$nombreclase.self::PREFIJO_ID_SESION);
		echo CHtml::tag('imput',array('value'=>md5(uniqid(rand(), true)),'type'=>'hidden','name='=>$nombreclase."[".yii::app()->params['nombresesion_doblepost']."]"),false,true);


	}


}
