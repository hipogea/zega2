<?php
/**
 * InventarioModule
 * 
 * @uses CWebModule
 * @author Julian Ramirez Tenorio <christiansalazarh@gmail.com>
 * @license Libre usalo como chucha quieras
 */
class InventarioModule extends CWebModule
{





	public $debug = false;					// poner a true para ayudar en la instalacion
	public $tableprefix = 'cruge_';			// agrega un prefijo para buscar las tablas en db
	public $maptables = array();			// permite cambiar los nombres de las tablas

	public $baseUrl = "";					// usada para enviar los links de activacion de la cuenta de usuario
											// se usa mediante CrugeUtil::config()->baseUrl
											// para principalmente en CrugeUserManagement::getActivationUrl()

	public $superuserName = 'admin';		// username del super usuario. cualquier llamada
											// a Yii::app()->user->checkAccess retornara true
											// si el superuserName coincide con este valor

	// permite que se puedan configurar los campos (incluso personalizados)
	//	a la hora de consultar a:  $usuario->getUserDescription()  (CrugeStoredUser)
	//
	//	se debe retornar un array con "username" o "email" o cualquier nombre de campo personalizado
	//  ejemplos: array("firstname","lastname","chipnumber","address")
	//	lo cual concatenara una lista separada por comas con los valores de estos
	//	campos.
	//

	public $useCGridViewClass = 'zii.widgets.grid.CGridView';

	// el estilo del boton que la UI usara:
	//	normal, jui, bootstrap
	//  por defecto: normal
	public $buttonStyle = 'normal';
	public $buttonConf = 'small';// large, small o mini

	// ponerla a true para que se creen de forma automatica las operaciones en el sistema de Rbac
	// cuando se haga una llamada a Yii::app()->user->checkAccess() y esta retorne false.
	//
	// public function actionCreatePost(){
	//    if(Yii::app()->user->checkAccess('createpost_get')==false)
	//    		throw new CrugeException('acceso denegado');
	// }
	//
	// en este action de ejemplo (arriba), se solicita una operacion llamada: 'createpost_get'
	// que quiza no haya sido insertada en la lista de operaciones del sistema de rbac. entonces,
	// cuando rbacSetupEnabled es true esta operacion sera insertada para que podamos usarla
	// para ser asignada a los diferentes roles o tareas.
	//
	public $rbacSetupEnabled=false;
	// cuando esta en true y el modo de setup de rbac tambien lo esta (rbacSetupEnabled=true)
	// entonces permitira al usuario acecder a la funcion denegada aunque no tenga el permiso
	//
	public $allowUserAlways=false;


	// el iduser del usuario invitado. por defecto es 2. (admin es 1)
	//
	public $guestUserId=2;

	// los nombres de los modulos de autenticacion habilitados para reconocer usuarios:
	// cada nombre debe coincidir con el valor devuelto por ICrugeAuth::authName()
	//
	// en UiController::actionLogin se lee esta variable para saber con que filtro de autenticacion se procesara
	// el request de login del usuario, por defecto 'default' el cual usa a models.auth.CrugeAuthDefault
	//
	// para leer este valor usar:
	//	$valor = CrugeFactory::get()->getConfiguredAuthMethodName();
	//
	public $availableAuthMethods = array('default');

	// los campos por los cuales se puede buscar a un usuario cuando hace login
	public $availableAuthModes	 = array('email','username');

	// ruta de la clase que implementa a ICrugeSessionFilter.
	// si es null se usa a defaultSessionFilter
	// son usados en: CrugeFactory::getICrugeSessionFilter para determinar con que conceder la sesion
	public $sessionfilter=null;
	public $defaultSessionFilter = 'cruge.models.filters.DefaultSessionFilter';

	// este filtro permite o niega la creacion o actualizacion de un usuario.
	//
	// aqui se espera una clase que implemente a: ICrugeUserFilter
	//
	public $userFilter='cruge.models.filters.DefaultUserFilter';

	// indica si una clave es almacenada con hash o no.
	//
	public $useEncryptedPassword = false;

    // Indica el algoritmo de hash a usarse

    public $hash = 'md5';


	public $postNameMappings = array(
		'CrugeLogon'=>'CrugeLogon',
		'CrugeStoredUser'=>'CrugeStoredUser',
		'CrugeField'=>'CrugeField',
		'CrugeSystem'=>'CrugeSystem',
		'CrugeSession'=>'CrugeSession',
	);

	// estos parametros no deben manipularse
	public $defaultController = 'ui';
	public $uicontroller='ui';
	public $_lazyAuthModes = null;
	private $_factory;





	public function init()
	{
		$this->setImport(array(
			'cruge.models.*',
			'cruge.models.data.*',	// clases del modelo de datos
			'cruge.models.auth.*',	// clases de autenticacion
			'cruge.models.filters.*',// clases de filtros de sesion
			'cruge.models.ui.*',// clases de interfaz de usuario
			'cruge.components.*',	// clases del modelo
			'cruge.interfaces.*',	// interfaces
			'cruge.extensions.crugemailer.*',	// extensiones consumidas por el modulo

		));

	}





}
