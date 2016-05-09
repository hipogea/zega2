
<?php
$datos=Montoinventario::datosgrafo('mes',6);

?>


<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            'theme'=>'grid-light',
            'chart'=>array(
                'type'=>'area',
            ),
            'title'=>array('text'=>'',),
            'xAxis'=>array(
                'categories'=>$datos['absisas'],
                'labels'=>array(
                    'style'=>array(
                        //'color'=>'#6D869F',
                        // 'fontWeight'=> 'bold',
                        'fontSize'=>'7px',
                    ),

                ),
            ),
            'yAxis'=>array(
                'title'=>array(
                    'text'=> ' Valorizado en S/.',
                ),
                'stackLabels'=>array('formatter'=>'js:function() {
                                            return Highcharts.numberFormat(this.total,0,".",",");
                                                 }'),

            ),

            'tooltip'=>ARRAY(
                'pointFormat'=>'<span style="color:{series.color}">
								   {series.name}</span>: <b>{point.y}</b>
								   <br/>',
                'shared'=> true,
                'valueDecimals'=>0),
            'plotOptions'=> array(
                'area'=>array(
                    'stacking'=> 'normal',
                    'lineColor'=> '#666666',
                    'lineWidth'=> 1,
                    ' marker'=> array(
                        'lineWidth'=> 1,
                        'lineColor'=>'#666666',
                    ),

                    'dataLabels'=>array(
                        'formatter'=>'js:function() {
                                            return Highcharts.numberFormat(this.y,0,".",",");
                                                 }',
                        'enabled'=> true,
                        'style'=>array(
                            //'color'=>'#6D869F',
                            // 'fontWeight'=> 'bold',
                            'fontSize'=>'10px',
                        ),

                    )
                ),
            ),
            'series'=>$datos['ordenadas'],
        )
    )
);
?>
