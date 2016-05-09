
<?php
echo "skaskaskakskaskask";

?>

<?php

$this->Widget('ext.highcharts.HighchartsWidget',
	array(
		'options'=>array(
			'chart'=>array(
				'type'=>'line',
				'backgroundColor'=>"#F5F6CE",
				'borderColor'=>"#F7BE81",
				'borderWidth'=>1,
				'height'=>300,
				'plotBackgroundColor'=>'#D0F5A9',
				'plotBorderColor'=>'#86B404',
				'plotBorderWidth'=>1,
				//'margin'=>10,
				//'width'=>900,
			),
			'title'=>array('text'=>'Pronostico stock Libre',),
			'xAxis'=>array(
				'categories'=>$datosparagrafico[2],
				'text'=>'Dias Calendario',
				'labels'=>array(
					'style'=>array(
						//'color'=>'#6D869F',
						// 'fontWeight'=> 'bold',
						'fontSize'=>'14px',
					),
				),
			),
			'yAxis'=>array(
				'title'=>array(
					'text'=> ' Stock libre',
					'min'=>0,
				),
				/*'label'=>'formatter: function() {
                return this.value / 1000;}',*/
			),

			'tooltip'=>array(
				'shared'=> true,
				'valuePrefix'=>' S/. ',
			),
			'plotOptions'=> array(
				'line'=>array(
					'stacking'=> 'normal',
					'lineColor'=> '#666666',
					'lineWidth'=> 1,
					' marker'=> array(
						'lineWidth'=> 1,
						'lineColor'=>'#666666',
					),

					'dataLabels'=>array(
						'enabled'=> true,
						'style'=>array(
							//'color'=>'#6D869F',
							// 'fontWeight'=> 'bold',
							'fontSize'=>'
																				10px',
						),
					)
				),
			),
			'series'=>array(
				array('name'=>'Libre','data'=>$datosparagrafico[3]),

			)
		)
	)
);

?>








