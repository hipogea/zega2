<?php$this->pageTitle=Yii::app()->name;$baseUrl = Yii::app()->theme->baseUrl;$this->menu=array(//array('label'=>'List Solpe', 'url'=>array('index')),    array('label'=>'Crear solicitud', 'url'=>array('create')),    array('label'=>'Valores por defecto', 'url'=>array('update')),);?><?phpif(!Yii::app()->user->isGuest)if(!(Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'externo')=='1')){?> <div style="display: table; width:100%;">     <div style="display:table-cell;width:200px;">            <?php        $this->beginWidget('zii.widgets.CPortlet', array(            'title'=>'<span class="icon-picture"></span>Panel de administracion',            'titleCssClass'=>''        ));        ?>        <div class="summary">          <ul>            <li>                <span class="summary-icon2">                    <img src="<?php echo $baseUrl ;?>/img/Explain.png" width="25" height="25" alt="Datos maestros">                </span>                <span class="summary-title"> <?php echo CHtml::link("Datos maestros",Yii::app()->baseUrl."/site/maestros");  ?></span>            </li>            <li>                <span class="summary-icon2">                    <img src="<?php echo $baseUrl ;?>/img/cog.png" width="20" height="20" alt="Datos maestros">                </span>                <span class="summary-title"> <?php echo CHtml::link("Configuracion",Yii::app()->baseUrl."/configuracion");  ?></span>            </li>            <li>                <span class="summary-icon2">                    <img src="<?php echo $baseUrl ;?>/img/lock.png" width="25" height="25" alt="Datos maestros">                </span>                <span class="summary-title"> <?php echo CHtml::link("Seguridad",Yii::app()->user->ui->userManagementAdminUrl);  ?></span>            </li>            <li>                <span class="summary-icon2">                                        <img src="<?php echo $baseUrl ;?>/img/Cluster.png" width="20" height="20" alt="Datos maestros">                </span>                <span class="summary-title"> <?php echo CHtml::link("Base de datos",Yii::app()->baseUrl."/backup");  ?></span>            </li>             <li>                <span class="summary-icon2">                    <img src="<?php echo $baseUrl ;?>/img/check.png" width="20" height="20" alt="Datos maestros">                </span>                <span class="summary-title"> <?php echo CHtml::link("liberaciones","");  ?></span>            </li>          </ul>        </div>             <?php $this->endWidget(); ?>      </div>     <div style="display:table-cell">      <?php		$this->beginWidget('zii.widgets.CPortlet', array(			'title'=>'<span class="icon-picture"></span>Tablon publico',			'titleCssClass'=>''		));		?>         <?php MiFactoria::InsertaCumple();   ?>        <?php $this->widget('zii.widgets.grid.CGridView', array(                                         'id'=>'noticias-grid',                                                'dataProvider'=>Noticias::model()->searchtablon(),                                                    'summaryText'=>'',                                                     'itemsCssClass'=>'table table-striped table-bordered table-hover',                                                         'hideHeader'=>true,                                                        'columns'=>array(                                                             array('name'=>'st.','header'=>'st', 'type'=>'html',                                                                 'value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."noti".$data->tiponoticia.".png","",array("width"=>15,"height"=>15))',                                                                 'htmlOptions'=>array('width'=>30)                                                                 ),                                                            array('name'=>'dst.','header'=>'dst', 'type'=>'html','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business.png","",array("width"=>15,"height"=>15))',                                                                'htmlOptions'=>array('width'=>30)                                                            ),                                                            'autor',                                                            array('name'=>'txtnoticia','type'=>'html','value'=>'CHTml::openTag("span",array("style"=>"font-size:11px;")).$data->txtnoticia.CHTml::closeTag("span")'),                                                           array('name'=>'fec','value'=>'MiFactoria::tiempopasado($data->fecha)','htmlOptions'=>array('width'=>100)),                                                             ),                                                                        )); ?>        <?php        echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'sound.png');        echo CHtml::link("     Solicitar publicacion ",Yii::app()->baseUrl."/noticias/solicita");        http://www.neologys.com/recurso/noticias/adminusuariopendientes.jsp        echo "  ----    ";        echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'Records.png');        echo CHtml::link(" Ver mis solicitudes ",Yii::app()->baseUrl."/noticias/adminusuariopendientes");        echo "  ----  ";        echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'Processes.png');        echo CHtml::link(" Configurar   ",Yii::app()->baseUrl."/noticias/configura");        ?>        <?php $this->endWidget(); ?>     </div>     </div><div style="display: table; width:100%;">    <div style="display:table-cell;width:40%;">        <?php        $this->beginWidget('zii.widgets.CPortlet', array(            'title'=>'<span class="icon-th-list"></span> Evolucion de inventario valorizado ',            'titleCssClass'=>''        ));        ?>        <?php        $datos=Montoinventario::datosgrafo('dia',6);        ?>        <?php        $this->Widget('ext.highcharts.HighchartsWidget', array(                'options'=>array(                    'theme'=>'grid-light',                    'chart'=>array(                        'type'=>'area',                    ),                    'title'=>array('text'=>'',),                    'xAxis'=>array(                        'categories'=>$datos['absisas'],                        'labels'=>array(                            'style'=>array(                                //'color'=>'#6D869F',                                // 'fontWeight'=> 'bold',                                'fontSize'=>'7px',                            ),                        ),                    ),                    'yAxis'=>array(                        'title'=>array(                            'text'=> ' Valorizado en S/.',                                    ),                        'stackLabels'=>array('formatter'=>'js:function() {                                            return Highcharts.numberFormat(this.total,0,".",",");                                                 }'),                    ),                    'tooltip'=>ARRAY(                        'pointFormat'=>'<span style="color:{series.color}">								   {series.name}</span>: <b>{point.y}</b>								   <br/>',                        'shared'=> true,                        'valueDecimals'=>0),                    'plotOptions'=> array(                        'area'=>array(                            'stacking'=> 'normal',                            'lineColor'=> '#666666',                            'lineWidth'=> 1,                            ' marker'=> array(                                'lineWidth'=> 1,                                'lineColor'=>'#666666',                            ),                            'dataLabels'=>array(                                'formatter'=>'js:function() {                                            return Highcharts.numberFormat(this.y,0,".",",");                                                 }',                                'enabled'=> true,                                'style'=>array(                                    //'color'=>'#6D869F',                                    // 'fontWeight'=> 'bold',                                    'fontSize'=>'10px',                                ),                            )                        ),                    ),                    'series'=>$datos['ordenadas'],                )            )        );        ?>        <?php /*        $this->beginWidget('zii.widgets.CPortlet', array(            'title'=>'<span class="icon-th-list"></span> Inventario',            'titleCssClass'=>''        ));        ?>                   <?php            $this->Widget('ext.highcharts.HighchartsWidget', array(                    'options'=>array(                        'theme'=>'grid-light',                        'chart'=>array(                            'type'=>'column',                        ),                        'title'=>array(                            'text'=>'',                        ),                        'xAxis'=> ARRAY(                            'categories'=>ARRAY('Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas'),                            //'categories'=>$barcos,                            'labels'=>array('rotation'=>-40,                                'style'=>array(                                    //'color'=>'#6D869F',                                    // 'fontWeight'=> 'bold',                                    'fontSize'=>'10px',                                ),                            ),                        ),                        'yAxis'=>array(                            'min'=> 0,                            'title'=>array(                                'text'=> 'Monto Inventario (S/.)',                            ),                            'stackLabels'=>array(                                'enabled'=> true,                                'rotation'=>-60,                                'style'=>array(                                    'color'=> 'gray',                                ),                                'formatter'=>'js:function() {																		return Highcharts.numberFormat(this.total,1,".",",");																	}',                            ),                        ),                        'legend'=> array(                            'align'=>'right',                            'x'=> -100,                            'verticalAlign' =>'top',                            'y'=> 20,                            'floating'=> true,                            'backgroundColor'=> 'white',                            'borderColor'=> '#CCC',                            'borderWidth'=> 1,                            'shadow'=>false,                        ),                        'tooltip'=>ARRAY(                            'pointFormat'=>'<span style="color:{series.color}">								   {series.name}</span>: <b>{point.y}</b>								   <br/>',                            'shared'=> true,                            'valueDecimals'=>2,                            //'formatter'=>' function() {                            ///return "<b>"+ this.x +"</b><br/>"+                            ///	this.series.name +": "+ this.y +"<br/>"+                            //	"Total: "+ this.point.stackTotal;                            //}',                        ),                        'plotOptions'=> array(                            'column'=>array(                                'stacking'=> 'normal',                                'pointPadding'=>0.4,                                'groupPadding'=>0,                                '						dataLabels'=>array(                                    'enabled'=> true,                                    'color'=> 'white',                                ),                            )                        ),                        'series'=>array(                            array(                                'name'=>'Remanente',                                'data'=>array(10874.213,7458.25,3158.23,5556.94,6789.60),                                'color'=>'#FFB13D',                            ) ,                            /*array(                                    'name'=> 'Usada(Pesca acumulada)',                                    'data'=>$descargada,                                    'color'=>'#666699',                                    ),*/                      /*  ),                    )                )            );            */ ?>        <?php $this->endWidget(); ?>        </div>    <div style="display:table-cell;width:40%;">    	<?php		$this->beginWidget('zii.widgets.CPortlet', array(			'title'=>'<span class="icon-th-list"></span> Distribución de Gastos ',			'titleCssClass'=>''		));		?>        <?php        $this->Widget('ext.highcharts.HighchartsWidget', array(            'options'=>array(                'chart'=>array(                    'plotBackgroundColor'=> null,                    'plotBorderWidth'=> null,                    'plotShadow'=> false                ),               'title'=>array('text'=>'',),                'plotOptions'=>array(                    'pie'=>array(                        'allowPointSelect'=> true,                        'cursor'=> 'pointer',                        'dataLabels'=>array(                            'enabled'=> true,                            'color'=>'#234',                            'connectorColor'=> '#ccc',                            'formatter'=> 'js:function() {	return " "+ Highcharts.numberFormat(this.percentage,1) +" % ";}',                        ),                    ),                ),                'series'=> array(                    array(                        'type'=> 'pie',                        'data'=> array(                            array('904035 : Movilidades', 14),                            array('904025: Viaticos ',23),                            array('90235866: Compras rep',32),                            array('90205866: Energia',31)                        )                    ),                ),            )        ));        ?>        <?php $this->endWidget(); ?>    </div></div>    <?php}  else   {  // EN CAOS QUE SE AUN PEOVEEDOR        ?><a><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'fondoprov.png',"Helius"); ?></a><?php}?>