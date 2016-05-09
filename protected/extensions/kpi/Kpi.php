<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class KPi extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
public $startAngle;
public $endAngle;
public $step;
public $texto;
public $rangocolores; //=array(array('from'=>0,'to'=>20,'color'=>"fff"),array(...)
public $valor;  
public $sufix;
public $min;  
public $max;
public $titulo;
public $ancholinea;
		
	public function init()
	{
	 // $this->titulo="";
		//$options=$this->options?CJavaScript::encode($this->options):'';
		/*$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
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
		',CClientScript::POS_READY);*/
		
	}
	
	public function run()
	{
		$this->Widget('ext.highcharts.HighchartsWidget', array(  
						'options'=>array(     
									'chart'=>array(
												'type'=>'gauge',
												'plotBackgroundColor'=> null,
												'plotBackgroundImage'=> null,
												'plotBorderWidth'=>0,
												'plotShadow'=> false,
												),
									
									'title'=> array(
												'text'=> $this->titulo
											),	
									'pane'=> array (
												'startAngle'=> $this->startAngle,
												'endAngle'=> $this->endAngle,
														'background'=>array(	array(
																			'backgroundColor'=>array( 
																										'linearGradient'=>array( 'x1'=> 0, 'y1'=> 0, 'x2'=> 0, 'y2'=> 1 ),
																										'stops'=>array(
																													array(0, '#FFF'),
																													array(1, '#444')
																													)
																										),
																			'borderWidth'=> 0,
																			'outerRadius'=> '109%'
																					), 
																					array(
																			'backgroundColor'=> array(
																							'linearGradient'=> array( 'x1'=> 0, 'y1'=> 0, 'x2'=> 0, 'y2'=> 1),
																							'stops'=>array(
																												array(0, '#333'),
																												array(1, '#FFF')
																											)
																									),
																			'borderWidth'=> 1,
																			'outerRadius'=>  '107%'
																						), 
																					array(),
	            // default background
																
																	ARRAY(
																			'backgroundColor'=> '#DDD',
																'borderWidth'=> 0,
																'outerRadius'=> '105%',
																'innerRadius'=> '103%'
																			))
																),	
									
														 // the value axis
									'yAxis'=>ARRAY(
												'min'=> $this->min,
												'max'=> $this->max,
	        
												'minorTickInterval'=> 'auto',
												'minorTickWidth'=> 0,
												'minorTickLength'=> 10,
												'minorTickPosition'=> 'inside',
												'minorTickColor'=> '#666',
	
												'tickPixelInterval'=> 30,
												'tickWidth'=> $this->ancholinea,
												'tickPosition'=> 'inside',
												'tickLength'=> 10,
												'tickColor'=> '#666',
												'labels'=> ARRAY(
														'step'=> $this->step,
														'rotation'=> 'auto'
														),
												'title'=> array(
													'text'=> $this->texto
														),
												'plotBands'=> $this->rangocolores      
											),
									
									'series'=>array(
												array(
														'name'=> 'Speed',
														'data'=> array($this->valor),
											'tooltip'=> array(
															'valueSuffix'=> $this->sufix
														)
													))
									)
									)
									);

Yii::app()->clientScript->registerScript('test', "
    function (chart) {};
", 1 );

	}
}
