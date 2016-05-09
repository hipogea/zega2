<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class Leyenda extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	public $ruta='';
	public $documento='';
		
	public function init()
	{
		//$options=$this->options?CJavaScript::encode($this->options):'';
		$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
		$this->ruta=$asset;
    	$cs=Yii::app()->clientScript;
		// publish asset    	
    	$cs->registerCssFile($asset."/css/jgauge.css");

		
		$script = 'assetUrl = "' . $asset . '";';
		Yii::app()->getClientScript()->registerScript('_', $script, CClientScript::POS_HEAD);


	}
	
	public function run()
	{
			//echo 'www.neologys.com'.$this->ruta.'/css/jgauge.css';
		echo '<div style="width::200px; float:left;" >';
		$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'leyenda',
					'dataProvider'=>Estado::model()->search_por_docu($this->documento),
					//'filter'=>$model,
					//'cssFile'=>$this->ruta.'/css/jgauge.css',  // your version of css file
						'itemsCssClass'=>'.grid-views',
				     'hideHeader'=>true,
					'summaryText'=>'',
						'columns'=>array(
									'estado',
									array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->codocu.$data->codestado.".png")'),

										),
								)
			    );
		echo "</div>";
	}
}
