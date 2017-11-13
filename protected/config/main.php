<?php
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//Yii::setPathOfAlias('ecalendarview', dirname(__FILE__) . '/../extensions/ecalendarview');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
   
      'charset' => 'ISO-8859-1',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'',
	'language'=>'en',
    'theme'=>'temita',

	//'theme'=>'super',
	// preloading 'log' component
	'preload'=>array('log',
    'booster'
	   ),
    
    'aliases' => array(
        
       // 'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),
    
     
    

	// autoloading model and component classes
	'import'=>array(
            'application.extensions.jquerymobile.JQueryMobileComponent',
           // 'application.extensions.bootstrap.components.*',
             
            
           'application.components.booster.components.Booster',
            
            
            
            'application.components.*',         
		'application.extensions.phpmailer.*',
            'application.extensions.behaviors.TomaFotosBehavior',
		'application.models.*',
		'application.interfaces.*',
		'application.modules.contabilidad.models.*',
            'application.modules.mantto.models.*',
            'application.modules.ventas.models.*',
		'application.modules.cruge.components.*',
		'application.modules.cruge.extensions.crugemailer.*',
		'application.modules.cruge.extensions.crugemailer.*',
         'application.extensions.coco.*',
             'application.extensions.matchcode.MatchCode',
            'application.extensions.CFile',
		  'application.helpers.*',
		),
	
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
          'ventas'=>array(),   
            'operadores'=>array(),
            'mantto'=>array(
              
                    ),
        'facturacion'=>array(),
    
		//'backup'=> array('path' => __DIR__.'/../_backup/'  ),
		'backup'=> array('path' =>'backup/' ),
		'ayuda'=>array(),
            'clientes'=> array(),
		'contabilidad'=> array(
                   
                ),
		'cruge'=>array(
				'tableprefix'=>'cruge_',

				'availableAuthMethods'=>array('default'),
				'availableAuthModes'=>array('username','email'),
                                // url base para los links de activacion de cuenta de usuario
				'baseUrl'=>'',

				 // NO OLVIDES PONER EN FALSE TRAS INSTALAR
				 'debug'=>false,
				 'rbacSetupEnabled'=>true,
				 'allowUserAlways'=>false,

				// MIENTRAS INSTALAS..PONLO EN: false
				// lee mas abajo respecto a 'Encriptando las claves'
				//
				//'useEncryptedPassword' => true,

				// Algoritmo de la funci�n hash que deseas usar
				// Los valores admitidos est�n en: http://www.php.net/manual/en/function.hash-algos.php
				//'hash' => 'md5',

				// a donde enviar al usuario tras iniciar sesion, cerrar sesion o al expirar la sesion.
				//
				// esto va a forzar a Yii::app()->user->returnUrl cambiando el comportamiento estandar de Yii
				// en los casos en que se usa CAccessControl como controlador
				//
				// ejemplo:
				//		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
				//		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
				//
				'afterLoginUrl'=>null,
				'afterLogoutUrl'=>null,
				'afterSessionExpiredUrl'=>null,

				// manejo del layout con cruge.
				//
				'loginLayout'=>'//layouts/inicio',
				'registrationLayout'=>'//layouts/column1',
				'activateAccountLayout'=>'//layouts/column1',
				'editProfileLayout'=>'//layouts/column1',
				// en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
				// de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
				// requerir� de un portlet para desplegar un menu con las opciones de administrador.
				//
				'generalUserManagementLayout'=>'ui',

				// permite indicar un array con los nombres de campos personalizados, 
				// incluyendo username y/o email para personalizar la respuesta de una consulta a: 
				// $usuario->getUserDescription(); 
				'userDescriptionFieldsArray'=>array('email'), 

			),

			'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'grecita',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('179.7.*'),
		),



		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),






	// application components
	'components'=>array(
           /* 'jquerymobile'=>array(
			'class'=>'ext.jquerymobile.JQueryMobileComponent',
			// any available in extensions/jquerymobile/themes
			'theme'=>'default',  
			'autoload'=>true,  // the script insertion modality.
		),*/
               /* 'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',   
                        ),*/
		'cache'=>array(
			'class'=>'system.caching.CFileCache',
		),
		'settings'=>array(
			'class' => 'CmsSettings',
			'cacheComponentId'  => 'cache',
			'cacheId'           => 'global_website_settings',
			'cacheTime'         => 84000,
			'tableName'     => '{{settings}}',
			'dbComponentId'     => 'db',
			'createTable'       => false,
			'dbEngine'      => 'InnoDB',
		),

		'correo'=>array(
			'class'=>'application.components.Correo',
		),

		'librodiario'=>ARRAY(
			'class'=>'application.modules.contabilidad.components.LibrodiarioCompo',
		),

'booster' => array(
    'class' => 'application.components.booster.components.Booster',
),
                            'session' => array (
                                                     'autoStart' => 'true',
                                              ),
							'impuestos' => array (
								'class'=>'application.components.ImpuestosCompo',
							),
		'periodo' => array (
			'class'=>'application.components.PeriodosCompo',
		),
		'tipocambio' => array (
			'class'=>'application.components.TipocambioCompo',
		),

		'mensajes' => array (
			'class'=>'application.components.MensajesCompo',
		),
		'maletin' => array (
			'class'=>'application.components.MaletinCompo',
		),
		'estadisticas' => array (
			'class'=>'application.components.EstadisticasCompo',
		),
							'image'=>array(
            							'class'=>'application.extensions.image.CImageComponent',
            							 'driver'=>'GD',
           								 // ImageMagick setup path
										   'params'=>array('directory'=>'/recurso/extensions/image/drivers'),
							               ),
							'excel'=>array(
													'class' => 'application.extensions.phpexcel.Classes.PHPExcel',				
							               ),
							'file'=>array(
													'class'=>'application.extensions.file.CFile',
							               ),
												
										'explorador'=>array(
													'class'=>'application.extensions.explorador.Explorador',
												),		
				 'ePdf' => array(
						'class' => 'ext.yii-pdf.EYiiPdf',
						'params'        => array(
							'mpdf'     => array(
							'librarySourcePath' => 'application.vendors.mpdf.*',
							'constants'         => array(
										'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
										),
									'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifie*0s the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                )*/
								),
						'HTML2PDF' => array(
							'librarySourcePath' => 'application.vendors.html2pdf.*',
							'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
              
			  /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                )*/
																			)
															),
										),
	
	   'simpleImage'=>array(
                        'class' => 'application.extensions.CSimpleImage',
                ),
	//  IMPORTANTE:  asegurate de que la entrada 'user' (y format) que por defecto trae Yii
			//               sea sustituida por estas a continuaci�n:
			//
		'user'=>array(
				'allowAutoLogin'=>true,
				'class' => 'application.modules.cruge.components.CrugeWebUser',
				'loginUrl' => array('/cruge/ui/login'),
			),
			
			
			
			'authManager' => array(
				 'class' => 'application.modules.cruge.components.CrugeAuthManager',
				//'class' => 'application.components.MyCrugeAuthManager',
			),
			'crugemailer'=>array(
				//'class' => 'application.modules.cruge.components.CrugeMailer', ///esta es la original 
				'class' => 'application.components.MiClaseCrugeMailer', //le pongo una extension del la clase cruge mailer basada en la original 
				'mailfrom' => 'Administrador Web <hipogea@hotmail.com>',
				'subjectprefix' => '',
				'debug' => false,
			),
			'format' => array(
				'datetimeFormat'=>"d M, Y h:m:s a",
			),

		'clientScript'=>array(
					///sobrescribo el estilo de jquery-ui con mi propio estilo en una carpeta aparte


			/*'packages'=>array(
				'jquery'=>array(
					'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/2.0.3/',
					'js'=>array('jquery.min.js'),
				),
				'jquery.ui'=>array(
					'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/',
					'js'=>array('jquery-ui.min.js'),
				),
			),*/
		),
	
	
	
	
	
	
	/*	'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),*/
		
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>true,
            'urlSuffix'=>'.jsp',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
		),

		'widgetFactory' => array(
			'widgets' => array(
                                            'JTimePicker'=>array(
                                                             'theme'=>'temita',
                                                            'cssFile'=>dirname(__FILE__).'/themes/temita/jquery.ui.timepicker.css',
                                                                ),
				'CCGridView' => array(
					'cssFile'=>dirname(__FILE__).'/css/estilogrid.css',
				),
			),
		),




		
		/*'db'=>array(
        'connectionString' => 'pgsql:host=localhost;port=5432;dbname=pruebas ',
        'username' => 'tomasito',
        'password' => 'tomasito',
		 'tablePrefix' => 'public_',
        'charset' => 'utf8',
        ),*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=redtek_crc',
			'emulatePrepare' => true,
			'username' => 'redtek_julian',
			'password' => 'geronimo',
			'tablePrefix' => 'public_',
			'charset' => 'utf8',
                    // 'enableParamLogging'=>true,//desactivarlo en produccion
		),
		
		
		
		
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',

			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					//'levels'=>'error, info, rbac', // <--- agregar 'rbac'
					'levels'=>'error,warning', //agreagamos aqui el mail para probar los correos en modo DEBUG 
					//'enabledParamLogging'=>true,
				),
                            array(
                   'class'=>'CEmailLogRoute',
                   'levels'=>'info',
                   'emails'=>'neotegnia@gmail.com',
                                
                                ),
                            
                           
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
            'init'=>array('jquerymobile'),
	),

	
	
	
	
	
	
	
	
	
	
	
	
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact pageoel
		//'webRoot' => dirname(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'),
		'nombrecamposlog'=>array('creadopor','creadoel','modificadopor','modificadoel'), //la matriz con le nombre delos campos de auditoria de cualquier tabla
		
		
		'adminEmail'=>'Julian Ramirez Tenorio <hipogea@hotmail.com>',
        'prefijo'=>'public_',
		'rutainternafotos'=>'webroot.assets.FOTOS',
		'aliasfotosinventario'=>'webroot.assets.FOTOS',
		'aliastema'=>'webroot.themes',
		'rutatemagrid'=>DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR,
		'rutatemadetalle'=>DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'detailview'.DIRECTORY_SEPARATOR,
		'rutatemaimagenes'=>'/img/',
		'rutadescargas'=>'/descargas/',
		'rutadescargas2'=>'/recurso/assets/DESCARGAS/',
		//'rutafotosinventario'=>DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'192.168.26.100'.DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.'motoristas'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'FOTOS'.DIRECTORY_SEPARATOR,
		'rutafotosinventario'=>'recurso/fotosinv/',
		//'rutafotosinventario_'=> DIRECTORY_SEPARATOR.'motoristas'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'FOTOS'.DIRECTORY_SEPARATOR,
		'rutaabsfotosinventario'=> '/srv/www/htdocs/recurso/yo/',
		'rutageneral'=>'/recurso/',
		'monedaalternativa'=>'USD',
		'monedabase'=>'PEN',
		'rutacorta'=>'/yo/',
		'rutaraiz'=>'/home/neologys/public_html/',
		'rutaimagenes'=>'/motoristas/images/',
		'rutaimagenesmateriales'=>'/materiales/',
		'rutaabsoluta'=>'http://192.168.26.100/web/motoristas/',
		'ipservidor'=>'192.168.26.100',
		'restriccionguia'=>'1',
		'mascaraactivo'=>'/90-3[0-5]{1}00-[0-9]{5}/',
		'mascaradocs'=>'/[1-9]{2}[0-9]{0,20}/',
		'mascaracodigo'=>'/[1-9]{1}[0-9]{0,20}/',
		'mascaraceco'=>'/90[0-9]{4}/',
		'monedadef'=>'SOL',
		'guia_tmp_rever_entrega'=>24*60*60*1000 , ///tiempo de espera (s) para poder revertir las entregas de guias de remision 
		'trancheck'=>'0',  ///permite omver los activos libremente
		'imagenes'=>'/recurso/images/',
		'veranulados'=>'1', // '1' permite ver los items de docuemntos anulados  si nolos qiere ver colcoarle '0'
		'esmensajero'=>'admin', ///indica que usuario administra el tablon de mensajes
		'imgreportes'=>'/imgreportes/',
		'nombresesion_doblepost'=>'_idsesion_evita_doble_post',
		'email_adminemail'=>'neotegnia@gmail.com',
	'email_usamaildeusuario'=>'0',
	'email_rutaficherosdeplantillas'=>'/mail/',
	'email_tiempodeespera'=>'30',
		'email_nombrewebmaster'=>'Julian RAMIREZ TENORIO',
		'compras_titulomensaje'=>'NEOTEGNIA -NUEVA ORDEN DE COMPRA',
		
	),
);