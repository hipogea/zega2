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
	public $defol=NULL;
	public $defol2='';
	private $caden='';
	//public $campo2=null;
	public function init()
	{
		$this->controlador=ucwords(strtolower(trim($this->controlador)));
		$this->nombreclase=Yii::app()->explorador->nombreclase($this->nombrecampo,$this->relaciones);
			if( !empty($this->defol) or !is_null($this->defol) )
		      if 	($this->model->isNewRecord	)	
                   $this->model->codprov= $this->defol; 			
	}
	
	public function run()
	{
		$this->caden= ($this->model->isNewRecord)?"value=".$this->defol." ":"";
		
		//if (!is_null($this->campo2))
		//$redo=$this->model
		echo "<div style='float: left; '>";
		   echo $this->form->textField($this->model,$this->nombrecampo,array('size'=>$this->tamano,
		        //$this->caden,
                'ajax'=>array( 
                    'type'=>'POST', 
					'url'=>Yii::app()->createUrl($this->urlinputbox,
													ARRAY('campo'=>$this->nombrecampo,
														  //'miclase'=>'Inventario',
														  'ordencampo'=>$this->ordencampo,
														  'relaciones'=>$this->relaciones,
														)				
													),					//
                    'update'=>'#'.$this->controlador.'_'.$this->nombrecampo.'_99',
                ) 
                  )); 
			  
			  
			 echo " </div>";
			 echo " <div style='float: left;'>";
			   echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.gif"),'#' ,array('onclick'=>'$("#'.$this->nombreframe.'").attr(
																					"src",
																					"'.Yii::app()->createurl(
																											$this->urllink, 
																												array("campo"=> $this->nombrecampo, "relaciones"=> $this->relaciones ) 
																											)
																					.'"); $("#'.$this->nombredialogo.'").data("hilo","'.$this->controlador.'_'.$this->nombrecampo.'").dialog("open"); return false',
												)
				);	
			 echo " </div>";
				
	}
}
