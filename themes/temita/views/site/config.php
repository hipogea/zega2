<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Inicio'),
            'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?>

<h1> <?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'config.png',"hola",array('width'=>'60','height'=>'60')); ?>CONFIGURACION  </h1>



<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
	array('id'=>4, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>5, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
));
?>
<!--
<div class="row-fluid">
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="weekly-visit">8,4,6,5,9,10</li>
		<li class="stat-count"><span>$23,000</span><span>Weekly Sales</span></li>
		<li class="stat-percent"><span class="text-success stat-percent">20%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="new-visits">2,4,9,1,5,7,6</li>
		<li class="stat-count"><span>$123,780</span><span>Monthly Sales</span></li>
		<li class="stat-percent"><span class="text-error stat-percent">-15%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="unique-visits">200,300,500,200,300,500,1000</li>
		<li class="stat-count"><span>$12,456</span><span>Open Invoices</span></li>
		<li class="stat-percent"><span class="text-success stat-percent">10%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="">1000,3000,6000,8000,3000,8000,10000</li>
		<li class="stat-count"><span>$25,000</span><span>Overdue</span></li>
		<li class="stat-percent"><span><span class="text-success stat-percent">20%</span></li>
	  </ul>
	</div>
  </div>
</div>
!-->

        <div >
            <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-picture"></span>General',
            'titleCssClass'=>''
        ));
        ?>
        <div >
          <ul>
            
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/documentos.png" width="25" height="25" alt="Definir documentos">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Definir documentos","/recurso/documentos/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/reloj.png" width="25" height="25" alt="Definir estados">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Definir estados","/recurso/estado/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/rayo.png" width="25" height="25" alt="Definir eventos">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Definir eventos","/recurso/eventos/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/igv.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Impuestos","/recurso/impuestos/admin");  ?></span>
            </li>
             <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/vernier.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Unidades de medida","/recurso/ums/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/dinero.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Tipo de cambio","/recurso/tmoneda/admin");  ?></span>
            </li>

            <!--
            <li>
                <span class="summary-icon">
                    <img src="</img/folder_page.png" width="36" height="36" alt="Recent Conversions">
                </span>
                <span class="summary-number">630</span>
                <span class="summary-title"> Recent Conversions</span>

            </li>
             !-->
        
          </ul>
        </div>
             <?php $this->endWidget(); ?>
    </div>
    
	

<!--
<div class="row-fluid">
	<div class="span6">
	  <?php  /*$this->widget('zii.widgets.grid.CGridView', array(
			
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProvider,
			'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'firstName', 'header'=>'First name'),
				array('name'=>'lastName', 'header'=>'Last name'),
				array('name'=>'language', 'header'=>'Language'),
				array('name'=>'usage', 'header'=>'Usage', 'type'=>'raw'),
				
			),
		)); */?>
	</div>
	<div class="span6">
		 <?php /*$this->widget('zii.widgets.grid.CGridView', array(
			
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProvider,
			'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#'),
				array('name'=>'firstName', 'header'=>'First name'),
				array('name'=>'lastName', 'header'=>'Last name'),
				array('name'=>'language', 'header'=>'Language'),
				array('name'=>'usage', 'header'=>'Usage', 'type'=>'raw'),
				
			),
		)); */?>
        	
	</div>
</div>
!-->
