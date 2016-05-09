<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class EGauge extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	public $start=0;
	public $end=0;
	public $value=0;
	public $rStart;
	public $rEnd;
	public $suffix='';
	public $count=5;
		
	public function init()
	{
		//$options=$this->options?CJavaScript::encode($this->options):'';
		$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
    	$cs=Yii::app()->clientScript;
		// publish asset    	
    	$cs->registerCssFile($asset."/css/jgauge.css");
		$cs->registerScriptFile($asset."/js/jQueryRotate.min.js");
		$cs->registerScriptFile($asset."/js/jgauge-0.3.0.a3.js");
		
		$script = 'assetUrl = "' . $asset . '";';
		Yii::app()->getClientScript()->registerScript('_', $script, CClientScript::POS_HEAD);

		$cs=Yii::app()->clientScript;
		$cs->registerScript(__CLASS__.$this->id,'
					e'.$this->id.'.init(); 
					e'.$this->id.'.setValue('.$this->value.');
		',CClientScript::POS_READY);
	}
	
	public function run()
	{
		echo "<div id='gauge{$this->id}' class='jgauge'></div>\r\n";
		echo "<script type='text/javascript'>
				var e{$this->id} = new   jGauge();
				e{$this->id}.id = 'gauge{$this->id}'; 
				e{$this->id}.ticks.start = {$this->start};
                e{$this->id}.ticks.end = {$this->end};
                e{$this->id}.ticks.count = {$this->count};
                e{$this->id}.range.start = {$this->rStart};
                e{$this->id}.range.end = {$this->rEnd};
                e{$this->id}.range.color = 'rgba(255, 0, 0, 1)';
			</script>	
		";	
	}
}
