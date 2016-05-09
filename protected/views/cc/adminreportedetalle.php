<?php

 $this->Widget('ext.highcharts.HighchartsWidget', array(
    'options'=>array(
        'chart'=>array(
            'type'=>'column',
                        ),
        'title'=>array('text'=>'Distribución mensual de costos',),

        'xAxis'=>array(
              'categories'=>array_values($absisas),
            // 'categories'=>ARRAY('01','02'),
            'tickmarkPlacement'=>'on',
            'title'=>array(
                'text'=> 'costos por mes',
                        ),
                    ),

        'yAxis'=>array(
                   'title'=>array(
                      'text'=> ' Valores de gastos por mes ',
                            ),
            'min'=>0,
             ),

        'tooltip'=>array(
            'shared'=> true,
            'valueSuffix'=>'',
        ),

         'plotOptions'=>array(
                'column'=>array(
                 'pointPadding'=>0.2,
                  'borderWidth'=> 2,
                    'borderColor'=>'#FF4466',
                    'Color'=>'#FF44FF',
                      )
                        ),

                    'series'=>array(
                array('name'=>'Costos','data'=>array_values($ordenadas),
                        ),
            ))

          ));
?>





