<?php

/**
 * LoginForm class.
 * LoginForm is the data strmaestrooucture for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Configuraciongeneral extends CFormModel
{

	/*****general****/
	public $general_monedadef;
        public $general_esmovil; ///PRPIEDA QUE SIRVE PARA SABER SI ES UN DISPSITIVO MOVIL : CEL , TABLET, IPOD ='1'
	public $general_rutatemaimagenes;
	public $general_horaspasadastipocambio;
	public $general_porcexcesocaja; ///porcenytaje de exceso para la caja chica
	public $general_userauto; ///porcenytaje de exceso para la caja chica
        public $general_directorioimg; ///porcenytaje de exceso para la caja chica
         public $general_nregistrosporcarpeta; ///porcenytaje de exceso para la caja chica
          public $general_codigomanualempresa; ///indinca si el codigo proveedor es manual o automatico
            public $general_codempresa;
             public $general_zonahoraria;
             public $general_cambiofindesemana;
             public $general_formatofechasalida;
              public $general_formatofechaingreso;
               public $general_dni; //expresion regualr de DNI
             public $general_ruc;//expresion regualr de RUC
              public $general_pasaporte;//expresion regualr de PASAPORTE
               public $general_extranjeria;//expresion regualr de DNI
              
              
	/*****documentos***/
	public $documentos_numeromaxbloqueos;
	public $documentos_docmascara;
	public $documentos_selloagua;
	public $documentos_archivo_sello_agua=null;
	public $documentos_controlrecepcion=null;
public $documentos_tolerecepfacturaendias=null;


	/*****transporte***/
	public $transporte_tiempopermitidohastaentrega;
	public $transporte_trancheck;
    public $transporte_lugares;
	public $transporte_objenguia; //permite tener objbetos de referncia en los detalle sde la guia de remision
       public $transporte_objinterno; //permite tener objbetos de referncia en los detalle sde la guia de remision
     
        public $transporte_rutafotos ;///directorio donde se almacenaran las imagenes de l
      public $transporte_motivoot ;///directorio donde se almacenaran las imagenes de l
       public $transporte_umdefault ;///unidad de medida por default 
     


	/*****inventario***/
	public $inventario_periodocontrol;
	public $inventario_mascaraubicaciones;
	public $inventario_bloqueado;
	public $inventario_auto;//reposiciones automarticas en el modelo deterministico
	//public $adminnoticias;

	/*****compras***/
	public $compras_restringircantidades;

	/*****Activo fijo***/
	public $af_afmascara;
	public $af_rutafotosinventario;


	/*****Colectores***/
	public $colectores_ccmascara;

	/*****Materiales***/
	public $materiales_rutaimagenesmateriales;
	public $materiales_codigoservicio;
	public $materiales_contabilidad;
public $materiales_verpresolpe;

	/*****correo***/
	public $email_adminemail;
	public $email_usamaildeusuario;
	public $email_rutaficherosdeplantillas;
	public $email_tiempodeespera;
	public $email_smtpdebug; //=2
	public $email_servemail; ///mail.neotegnia.com
	public $email_smtpauth;  //=true
	public $email_cuentahost;//jramirez@neotegnia.com
	public $email_passwordhost;//pawd
         public $email_nombrewebmaster;//pawd


         /*****CONTABILIDAD***/
	public $conta_patroncuentas; ///La expresion regular que determina las cuentas
        public $conta_montodetraccion;/// monto de la detraccion en m,openda nacional
         public $conta_nperiodosabiertos; /// num,ero maximo de periodos abiertos
	public $conta_formatonumerocomprobantes; ///formato XXXX-XXXXXXXX para facturas boletas
        public $conta_multisociedad; // Permitre trabajar varioas soceidades contab lemente  en una mis a sesion 
       public $conta_cajachicadevuelvefondo; // Define si el pafgoi de una deuda de caja chica de un trabajador puede convertirse nuevamente en fondo 
    public $conta_abrecajasinrequisitos; // Define si se peude aperturar caja sin nates haber cerrado la anteriori 



	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(

			array('general_esmovil,general_monedadef,
				   general_rutatemaimagenes,
				   general_horaspasadastipocambio,
				   general_porcexcesocaja,
                                   general_directorioimg,
				   general_userauto,
                                   general_nregistrosporcarpeta,
                                   general_codempresa,
                                   general_zonahoraria,
                                   general_cambiofindesemana,
                                   transporte_motivoot,
					documentos_numeromaxbloqueos,
					documentos_docmascara,
					documentos_archivo_sello_agua,
					documentos_tolerecepfacturaendias,
					transporte_tiempopermitidohastaentrega,					
                                        transporte_umdefault,
					inventario_periodocontrol,
					compras_restringircantidades,
					af_afmascara,
					af_rutafotosinventario,
					colectores_ccmascara,
					materiales_rutaimagenesmateriales,
					materiales_codigoservicio,
					email_adminemail,
					email_rutaficherosdeplantillas,
					email_tiempodeespera,


					email_smtpdebug,
					email_servemail,
					email_cuentahost,email_nombrewebmaster',
				'required','message'=>'Este dato es obligatorio'
			),
			array(''
                            .'general_formatofechaingreso,general_formatofechasalida,conta_cajachicadevuelvefondo,conta_patroncuentas,conta_montodetraccion,conta_nperiodosabiertos,'
                             .' conta_formatonumerocomprobantes,conta_multisociedad,'
                            . 'general_codempresa,general_codigomanualempresa,general_cambiofindesemana,general_dni,general_ruc, general_pasaporte,general_extranjeria,email_smptauth,email_usamaildeusuario,email_passwordhost,email_nombrewebmaster,general_codigomanualempresa,transporte_umdefault,'
                            . 'transporte_motivoot,transporte_objinterno,general_nregistrosporcarpeta,transporte_rutafotos,'
                            . 'general_directorioimg,transporte_objenguia,general_userauto,inventario_auto,'
                            . 'inventario_bloqueado,inventario_mascaraubicaciones,materiales_contabilidad,'
                            . 'materiales_verpresolpe,documentos_selloagua,documentos_controlrecepcion,'
                            . 'transporte_lugares,conta_abrecajasinrequisitos,general_zonahoraria','safe'),
			array(
				// array('transporte_tiempopermitidohastaentrega','numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>100),
				'general_nregistrosporcarpeta,transporte_tiempopermitidohastaentrega', 'numerical', 'integerOnly'=>true,
			),


			//array(
			array('inventario_periodocontrol','numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>30),

			//),
			array(
				'af_rutafotosinventario,general_rutatemaimagenes,	materiales_rutaimagenesmateriales,email_rutaficherosdeplantillas','chkdirectorio',
			),


		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(

                        'general_dni'=>'F. DNI',
                    'general_ruc'=>'F. RUC',
                    'general_pasaporte'=>'F. PASAPORTE',
                    'general_extranjeria'=>'F. C. Extranj',
			'general_monedadef'=>'Moneda base',
			'general_porcexcesocaja'=>'Exceso cajachica (%)',
			'general_userauto'=>'Uusario para operaciones automaticas',
                    'general_directorioimg'=>'Directorio de almacenamiento de Imagenes',
                    'general_nregistrosporcarpeta'=>'Cantidad registros por carpeta',
                   'general_codigomanualempresa'=>'Cod manual Empresas',
                    'general_zonahoraria'=>'Zona Horaria',
                    'general_codempresa'=>'Codigo empresa',
                    'general_cambiofindesemana'=>'Ajustar Tip Cambio por fin de Semana',
	'documentos_numeromaxbloqueos'=>'Cant Max Documentos abiertos por usuario',
			'documentos_selloagua'=>'Sello de agua',
			'documentos_archivo_sello_agua'=>'Archivo sello agua',
			'documentos_tolerecepfacturaendias'=>'Tolerancia recep facturas (dias)',
	'transporte_tiempopermitidohastaentrega'=>'Dias permitidos para anular despacho ',
	'transporte_trancheck'=>'Restringir Mov Af por lugar',
                    'transporte_objinterno'=>'Referencia a Objetos internos en el detalle ',
           ' transporte_lugares'=>'Exigir lugares para direccion',
			'transporte_objenguia'=>'	Referencias a objetos en  el detalle ',
                    'transporte_rutafotos'=>'Directorio de footografias',
                    'transporte_motivoot'=>'Movimiento de ordenes de trabajo',
                    'transporte_umdefault'=>'Unidad de medida por default',
	'inventario_periodocontrol'=>'Periodo Dias control de inventario',
			'inventario_mascaraubicaciones'=>'Mascara ubicaciones',
			'inventario_auto'=>'Reposic stock Automa.',
	//public $adminnoticias;
	'compras_restringircantidades'=>'Restringir cant en compras',
	'af_afmascara'=>'Mascara cod AF',
	'documentos_docmascara'=>'Mascara Doc',
	'colectores_ccmascara'=>'Mascara Ceco',
	'af_rutafotosinventario'=>'Direc Fotos AF',
	'general_rutatemaimagenes'=>'Direc imagenes del tema actual',
	'materiales_rutaimagenesmateriales'=>'Direc imagenes materiales',
			'materiales_codigoservicio'=>'Codigo servicio',
			'materiales_contabilidad'=>'Int. Contable',
			'materiales_verpresolpe'=>'Ver precios Solicitud',
	'email_adminemail'=>'Email del webmaster',
	'email_usamaildeusuario'=>'Usar mail de usuario al enviar',
	'email_rutaficherosdeplantillas'=>'Directorio plantillas mensajes',
	'email_tiempodeespera'=>'Tiempo (s) antes de enviar mensaje',
			'email_smtpdebug'=>'Modo depuracion SMTP',
			'email_servemail'=>'Servidor de correo',
			'email_cuentahost'=>'Cuenta de correo motor',
			'email_passwordhost'=>'Password de la cuenta',
                    'email_nombrewebmaster'=>'Nombre Webmaster',
			'inventario_bloqueado'=>'Bloquear en Conteo',
                    'conta_patroncuentas'=>'Forma Cuent',
                    'conta_montodetraccion'=>'Mont Detr',
                   'conta_nperiodosabiertos'=>'N max Period',
	           'conta_formatonumerocomprobantes'=>'Form Numero',
                  'conta_multisociedad'=>'MultiSocie',
                    'conta_cajachicadevuelvefondo'=>'Permite convertir deudas cobradas en fondo caja chica?',
'general_formatofechasalida'=>'Formato Fecha para mostrar',
                    'conta_abrecajasinrequisitos'=>'Abrir caja con requisito previo',
                    'general_formatofechaingreso'=>'Formato Fecha para almacenar en BD',
		);
	}



	public function chkdirectorio($attribute,$params) {
	///	$ruta=yii::app()->basePath : /home/neologys/public_html/recurso/protected;


		if (!is_dir(Yii::getPathOfAlias('webroot').$this->af_rutafotosinventario));
		$this->adderror('af_rutafotosinventario','El directorio de la ruta fotos inventario no existe');
		if (!is_dir(Yii::getPathOfAlias('webroot').$this->general_rutatemaimagenes));
		$this->adderror('general_rutatemaimagenes','El directorio de la ruta imagenes del tema no existe');
		if (is_dir(Yii::getPathOfAlias('webroot').$this->materiales_rutaimagenesmateriales));
		$this->adderror('materiales_rutaimagenesmateriales','El directorio de la ruta fotos de materiales no existe');
		if (!is_dir(Yii::getPathOfAlias('webroot').$this->email_rutaficherosdeplantillas));
		$this->adderror('email_rutaficherosdeplantillas','El directorio de la ruta de ficheros de plantillas no existe');
		//if (!is_file(Yii::getPathOfAlias('webroot').$this->documentos_archivo_sello_agua));
		//$this->adderror('documentos_archivo_sello_agua','El directorio de la ruta de ficheros de plantillas no existe');

	}


}
