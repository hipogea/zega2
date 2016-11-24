<?php


$this->menu=array(

	array('label'=>'Crear Area', 'url'=>array('create')),
	
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo("Configuración de la aplicación", 'Restore'); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'general_monedadef',
	'general_rutatemaimagenes',
	'general_horaspasadastipocambio',
	'general_porcexcesocaja', ///porcenytaje de exceso para la caja chica
	'general_userauto', ///porcenytaje de exceso para la caja chica
        'general_directorioimg', ///porcenytaje de exceso para la caja chica
         'general_nregistrosporcarpeta', ///porcenytaje de exceso para la caja chica
            'general_codigomanualempresa',
'documentos_numeromaxbloqueos',
	'documentos_docmascara',
	'documentos_selloagua',
	'documentos_archivo_sello_agua',
	'documentos_controlrecepcion',
'documentos_tolerecepfacturaendias',
	'transporte_tiempopermitidohastaentrega',
	'transporte_trancheck',
    'transporte_lugares',
	'transporte_objenguia', //permite tener objbetos de referncia en los detalle sde la guia de remision
       'transporte_rutafotos',///directorio donde se almacenaran las imagenes de l
      'transporte_motivoot',///directorio donde se almacenaran las imagenes de l
       'transporte_umdefault',
            'inventario_periodocontrol',
	'inventario_mascaraubicaciones',
	'inventario_bloqueado',
	'inventario_auto',
	'compras_restringircantidades',
	'af_afmascara',
	'af_rutafotosinventario',
	'colectores_ccmascara',
	'materiales_rutaimagenesmateriales',
	'materiales_codigoservicio',
	'materiales_contabilidad',
'materiales_verpresolpe',
	'email_adminemail',
	'email_usamaildeusuario',
	'email_rutaficherosdeplantillas',
	'email_tiempodeespera',
	'email_smtpdebug', //=2
	'email_servemail',///mail.neotegnia.com
	'email_smtpauth',  //=true
	'email_cuentahost',//jramirez@neotegnia.com
	'email_nombrewebmaster',
            'email_passwordhost',
            

	),
)); ?>
