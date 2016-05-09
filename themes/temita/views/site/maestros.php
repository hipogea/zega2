<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Inicio'),
            'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?>

<h1> Datos maestros  </h1>



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

    <div class="tabla">
        <div class="span3">
            <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-picture"></span>Organizativas',
            'titleCssClass'=>''
        ));
        ?>
        <div class="summary">
          <ul>
            
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/sociedad.png" width="25" height="25" alt="Sociedades">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Sociedades",Yii::app()->baseUrl."/sociedades/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/credit.png" width="20" height="20" alt="Moneda">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Moneda",Yii::app()->baseUrl."/TMoneda/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/edificio.png" width="25" height="25" alt="Centros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Centros Logisticos",Yii::app()->baseUrl."/Centros/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/areas.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Areas",Yii::app()->baseUrl."/areas/admin");  ?></span>
            </li>
             <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/group.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Puestos",Yii::app()->baseUrl."/Oficios/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/clipro.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Proveedores",Yii::app()->baseUrl."/clipro/admin");  ?></span>
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
    
	<div class="span3">
            <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-picture"></span>Comerciales',
            'titleCssClass'=>''
        ));
        ?>
        <div class="summary">
          <ul>
            
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/contactos.png" width="25" height="25" alt="">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Contactos",Yii::app()->baseUrl."/contactos/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/dinero.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Tipos de facturacion",Yii::app()->baseUrl."/tipofacturacion/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/dinero.png" width="25" height="25" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Tarifarios",Yii::app()->baseUrl."/maestroclipro/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/bolsa.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Grupos de compras",Yii::app()->baseUrl."/grupocompras/admin");  ?></span>
            </li>
             <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/fabrica.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Objetos externos",Yii::app()->baseUrl."/objetoscliente/admin");  ?></span>
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
    </div>

    <div class="span3">
            <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-picture"></span>Logistica',
            'titleCssClass'=>''
        ));
        ?>
        <div class="summary">
          <ul>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/tipos.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Tipos de materiales",Yii::app()->baseUrl."/maestrotipos/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/logi.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Materiales",Yii::app()->baseUrl."/maestrocompo/admin");  ?></span>
            </li>
            
            <li>
                <span class="summary-icon2">
                     <img src="<?php echo $baseUrl ;?>/img/almacen.png" width="25" height="25" alt="Almacen">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Almacenes",Yii::app()->baseUrl."/almacenes/admin");  ?></span>
            </li>
            
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/ingreso.png" width="25" height="25" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Tipos de movimientos",Yii::app()->baseUrl."/almacenmovimientos/admin");  ?></span>
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
<div class="span3">
            <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-picture"></span>Transporte',
            'titleCssClass'=>''
        ));
        ?>
        <div class="summary">
          <ul>
            
            
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/camion1.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Vehiculos",Yii::app()->baseUrl."/embarcaciones/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/chofer.png" width="25" height="25" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Conductores",Yii::app()->baseUrl."/choferes/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/movimientos.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Tipos de movimientos",Yii::app()->baseUrl."/paraqueva/admin");  ?></span>
            </li>
             <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/lugares.png" width="20" height="20" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Puntos de transporte",Yii::app()->baseUrl."/direcciones/admin");  ?></span>
            </li>
            <li>
                <span class="summary-icon2">
                    <img src="<?php echo $baseUrl ;?>/img/lugares.png" width="25" height="25" alt="Datos maestros">
                </span>
                
                <span class="summary-title"> <?php echo CHtml::link("Lugares",Yii::app()->baseUrl."/lugares/admin");  ?></span>
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
