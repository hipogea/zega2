<?php

class DocingresadosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    const CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS = '280';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl',
            array('CrugeAccessControlFilter'),
                /* array(
                  'COutputCache',
                  'duration'=>600,
                  'varyByParam'=>array('id'),
                  ), */
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'filename' => 'Documentos.csv',
                'csvDelimiter' => (Yii::app()->user->isGuest) ? "," : Yii::app()->user->getField('delimitador'), //i.e. Excel friendly csv delimiter
        ));
    }

    public function accessRules() {
        Yii::app()->user->loginUrl = array("/cruge/ui/login");
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('muestrapdf',    'llenaarbol',    'creacertificado', 'alertavencimientos', 'creasub', 'ajaxhereda', 'indicadores', 'detalles', 'ajaxenviacorreoproceso', 'ajaxanulacion', 'certificadosdicapi', 'modificaproceso', 'confirmalectura', 'limpiarcarro', 'borrafilamaletin', 'poneralcarro', 'procesavarios', 'cargatenencias', 'cargatrabajadores', 'cargaprocesos', 'borraarchivo', 'adjuntaarchivo', 'admin', 'ajaxcargaformtenencia', 'view', 'creaproceso', 'relaciona', 'recibevalor', 'create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('confirmalectura'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        //$this->layout = '//layouts/grafico';    
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionRelaciona() {
        $ordencampo = $_GET['ordencampo'];
        $campito = $_GET['campo'];
        $vvalore = $_POST['Guia'][$campito];
        $relaciones = $_GET['relaciones'];
        Yii::app()->explorador->buscavalor($campito, $vvalore, $ordencampo, $relaciones);
        //Fotos::buscavalor($campito,$vvalore,$ordencampo,$relaciones);
    }

    public function actionRecibevalor() {

        $autoIdAll = array();
        if (isset($_GET['checkselected'])) { //If user had posted the form with records selected
            $autoIdAll = $_GET['checkselected']; ///The records selecteds 
        };
        if (count($autoIdAll) > 0) {
            echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');													                    
																		window.parent.$('#cru-frame3').attr('src','');
																		var caja=window.parent.$('#cru-dialog3').data('hilo');	
																		var valoresclave= new Array();
																		var cadenita='{$autoIdAll[0]}';
																		var valoresclave=cadenita.split('_');																		
																		window.parent.$('#'+caja+'').attr('value',valoresclave[0]);
																		window.parent.$('#'+caja+'_99').html(valoresclave[1]);
																		");
            Yii::app()->end();
        } else {

            //echo CHtml::script("window.parent.$('#cru-frame3').attr('src','');														
            //");
            $campo = $_GET['campo'];
            $relaciones = $_GET['relaciones'];
            $nombreclase = Yii::app()->explorador->nombreclase($campo, $relaciones);


            $tipodato = gettype(Yii::app()->explorador->devuelvemodelo($campo, $relaciones));

            $model = Yii::app()->explorador->devuelvemodelo($campo, $relaciones);
            $model->unsetAttributes();  // clear any default values
            //$HFDSF
            //ECHO $SKHFKSFH;
            if (isset($_GET[$nombreclase]))
                $model->attributes = $_GET[$nombreclase];
            $this->layout = '//layouts/iframe';
            $this->render("ext.explorador.views.vw_" . $nombreclase, array('model' => $model));
            //$this->render("ext.explorador.views.vw_pruebitas1",array('tipodato'=>$tipodato,'tablita'=>$nombreclase,'campo'=>$campo,'relaciones'=>$relaciones));
        }
    }

    public function Creasesiones($model) {
        Yii::app()->session['codprov'] = $model->codprov;
        Yii::app()->session['desprov'] = $model->clipro->despro;
        Yii::app()->session['codlocal'] = $model->codlocal;
        Yii::app()->session['desprov'] = $model->clipro->despro;
        Yii::app()->session['fechain'] = $model->fechain;
        Yii::app()->session['tipodoc'] = $model->tipodoc;
        Yii::app()->session['moneda'] = $model->moneda;
        Yii::app()->session['codepv'] = $model->codepv;
        Yii::app()->session['codresponsable'] = $model->codresponsable;
        Yii::app()->session['codtenencia'] = $model->codtenencia;
        Yii::app()->session['codgrupo'] = $model->codgrupo;
        Yii::app()->session['espeabierto'] = $model->espeabierto;
         Yii::app()->session['fecha'] = $model->fecha;
    }

    public function Destruyesesiones() {
        unset(Yii::app()->session['codprov']);
        unset(Yii::app()->session['desprov']);
        unset(Yii::app()->session['codlocal']);
        unset(Yii::app()->session['desprov']);
        unset(Yii::app()->session['fechain']);
        unset(Yii::app()->session['tipodoc']);
        unset(Yii::app()->session['moneda']);
        unset(Yii::app()->session['codepv']);
        unset(Yii::app()->session['codresponsable']);
        unset(Yii::app()->session['espeabierto']);
         unset(Yii::app()->session['fecha']);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actioncreacertificado() {
///var_dump(yii::app()->settings->get('general','general_codempresa'));die();	
        $model = new Docingresados('insert_certi');
        $model->valorespordefecto();
        $model->preparaAuditoria();
        $model->setAttributes(
                array(
                    //$model->codprov=>yii::app()->settings->get('general','general_codempresa'),
                    //yii::app()->settings->get('general','general_codempresa');
                    // $model->fechain=>yii::app()->settings->get('general','general_codempresa'),
                    // $model->codprov=Yii::app()->session['codprov'],
                    // Yii::app()->session['desprov'] = $model->clipro->despro;
                    $model->codlocal = Yii::app()->session['codlocal'],
                    $model->fecha=Yii::app()->session['fecha'],  
                    $model->tipodoc = Yii::app()->session['tipodoc'],
                    $model->moneda = Yii::app()->settings->get('general', 'general_monedadef'),
                    $model->monto = 0,
                    $model->codepv = Yii::app()->session['codepv'],
                    $model->codresponsable = Yii::app()->session['codresponsable'],
                    $model->codgrupo = Yii::app()->session['codgrupo'],
                    $model->codtenencia = Yii::app()->session['codtenencia'],
                //$model->espeabierto=(isset(Yii::app()->session['espeabierto']))?Yii::app()->session['espeabierto']:'0',
                )
        );
        $model->codocu = self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS;
        $model->codprov = yii::app()->settings->get('general', 'general_codempresa');
        // VAR_DUMP($model->codprov);die();
        // Uncomment the following line if AJAX validation is needed
        
            
        $this->performAjaxValidation($model);
        if (isset($_POST['Docingresados'])) {
            $model->attributes = $_POST['Docingresados'];
            if ($model->save()) {
                $model->refresh();
                MiFactoria::Mensaje('success', 'Se cre� un nuevo registro con Id ( ' . $model->id . ' )  Correlativo :  [ ' . $model->correlativo . '  ]');
                // if ($model->conservarvalor==0 ) 
                //$this->enviacorreo($model);
                $this->Creasesiones($model);
                if ($model->conservarvalor == 0)
                    $this->Destruyesesiones();

                $esfinal = false;
                if ($model->procesoactivo[0]->tenenciasproc->final == '1')
                    $esfinal = true;
                $this->redirect(array('update', 'id' => $model->id));
                yii::app()->end();
            } ELSE {
                //PRINT_R($model->geterrors());
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {

        $model = new Docingresados;
        $model->valorespordefecto();
        $model->preparaAuditoria();
        $model->setAttributes(
                array(
                    $model->codprov = Yii::app()->session['codprov'],
                    // Yii::app()->session['desprov'] = $model->clipro->despro;
                    $model->codlocal = Yii::app()->session['codlocal'],
                    $model->fechain = Yii::app()->session['fechain'],
                    $model->tipodoc = Yii::app()->session['tipodoc'],
                    $model->moneda = Yii::app()->session['moneda'],
                    $model->codepv = Yii::app()->session['codepv'],
                    $model->codresponsable = Yii::app()->session['codresponsable'],
                    $model->codgrupo = Yii::app()->session['codgrupo'],
                    $model->codtenencia = Yii::app()->session['codtenencia'],
                    $model->espeabierto = (isset(Yii::app()->session['espeabierto'])) ? Yii::app()->session['espeabierto'] : '0',
                )
        );
        $model->codocu = self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS;
        if (isset($_GET['cert'])) {
            // die();
            $this->redirect('creacertificado');
           // $model->codprov = yii::app()->settings->get('general', 'general_codempresa');
            //$model->setScenario('insert_certi');
            //var_dump(yii::app()->settings->get('general', 'general_codempresa'));
        }
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Docingresados'])) {
            $model->attributes = $_POST['Docingresados'];
            if ($model->save()) {
                $model->refresh();
                MiFactoria::Mensaje('success', 'Se cre� un nuevo registro con Id ( ' . $model->id . ' )  Correlativo :  [ ' . $model->correlativo . '  ]');
                // if ($model->conservarvalor==0 ) 
                //$this->enviacorreo($model);
                $this->Creasesiones($model);
                if ($model->conservarvalor == 0)
                    $this->Destruyesesiones();

                $esfinal = false;
                if ($model->procesoactivo[0]->tenenciasproc->final == '1')
                    $esfinal = true;
                $this->redirect(array('update', 'id' => $model->id));
                yii::app()->end();
            } ELSE {
                //PRINT_R($model->geterrors());
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if ($model->codtenencia == '400')
            $model->setScenario('update_certi');
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Docingresados'])) {
            $model->preparaAuditoria();
            $model->attributes = $_POST['Docingresados'];
            if ($model->save()) {
                //verificando si se slecciono la opcion de conservarlos valores 
                MiFactoria::Mensaje('success', 'Se actualizaron los datos');
                if ($model->conservarvalor == '0')
                    $this->Destruyesesiones();
                if (!empty($_GET['asDialog'])) {
                    //Close the dialog, reset the iframe and update the grid
                    echo CHtml::script("window.parent.$('#cru-dialog1').dialog('close');
													                    window.parent.$('#cru-frame1').attr('src','');
																		window.parent.$.fn.yiiGridView.update('{$_GET['gridId']}');																		
																		
																		");
                    Yii::app()->end();
                }
            }
        }
        //$this->layout = '//layouts/iframe';
        $esfinal = false;
        if ($model->procesoactivo[0]->tenenciasproc->final == '1')
            $esfinal = true;
        $this->render('update', array(
            'model' => $model, 'esfinal' => $esfinal,
        ));
    }

    public function enviacorreo($model) {

        $miusuario = Yii::app()->user->um->loadUserByCustomField('codigotra', $model->codresponsable);
        if (!is_null($miusuario)) {

            $listadirecciones = $miusuario->email;

            //array_push($listacorreos,Yii::app()->user->email);	
            //$listadirecciones=implode (  "," ,  $listacorreos );					
            $titulo = 'INGRESO-' . $model->docus->desdocu . '-' . $model->barcos->nomep . '-' . $model->clipro->despro;
            $contenido = "Se ingreso " . $model->docus->desdocu . "  :" . $model->numero;
            $contenido.="<br>";

            //Los campos que se pintaran em la vista 
            $campos = array('correlativo',
                'barcos.nomep',
                'clipro.despro',
                'descorta',
                'trabajador.ap',
                'trabajador.am',
                'trabajador.nombres',
            );
            //El nombre de 	
            Yii::app()->crugemailer->mail_general($listadirecciones, $titulo, $contenido, $model, $campos);
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {


        $dataProvider = new CActiveDataProvider('Docingresados');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        //$this->alertavencimientos();
        $model = new VwDoci('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VwDoci']))
            $model->attributes = $_GET['VwDoci'];
        if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
            //ECHO "SALIO";DIE();
            $this->exportCSV($model->search(), array(
                'nomep',
                'codep',
                'numdocref',
                'descripcion',
                'ap',
                'despro',
                'codprov',
                'rucpro',
                'textv',
                'codlocal',
                'monto',
                'moneda',
                'descorta',
                'correlativo',
                'id',
                'fecha',
                'fechain',
                'numero',
                    )
            );
        } else {
            $this->render('admin', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Docingresados::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'El enlace o direccion solicitado no existe');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'docingresados-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actioncreasub($id) {
        $id = (integer) MiFactoria::cleanInput($id);
        $modelopadre = $this->loadModel($id);
        if ($modelopadre->procesoactivo[0]->tenenciasproc->final == '1') {
            throw new CHttpException(500, 'No puede procesar mas este documento, el ultimo proceso ha sido marcado como final, consulte con el damisnitrador ');
        } else {

            $model = new Procesosdocu('subproceso');

            $model->hiddoci = $modelopadre->id;
            if (isset($_POST['Procesosdocu'])) {
                // var_dump($_POST['Procesosdocu']);
                $model->attributes = $_POST['Procesosdocu'];
                // var_dump($model->attributes);die();
                //$this->performAjaxValidationdetalle($model);
                if ($model->save()) {
                    if (!empty($_GET['asDialog'])) {
                        //Close the dialog, reset the iframe and update the grid
                        echo CHtml::script("window.parent.$('#cru-dialog31').dialog('close');
							window.parent.$('#cru-frame31').attr('src','');	
                                                        window.parent.location.reload();
					
					");
                    }
                } else {
                    // print_r($model->geterrors());
                    /* MiFactoria::Mensaje('error',
                      yii::app()->mensajes->getErroresItem($model->geterrors())
                      ); */
                }
            }
            // if (!empty($_GET['asDialog']))
            $this->layout = '//layouts/iframe';
            $this->render(
                    'form_subproceso', array('modelopadre' => $modelopadre,
                'model' => $model, 'id' => $id, 'codtenencia' => $codtenencia,
            ));
        }
    }

    public function actioncreaproceso($id) {
        $id = (integer) MiFactoria::cleanInput($id);
        if (isset($_GET['codtenencia'])) {
            $codtenencia = MiFactoria::cleanInput($_GET['codtenencia']);
            //var_dump($codtenencia);die();
            $registro = Tenencias::model()->findByPk($codtenencia);
            if (is_null($registro))
                throw new CHttpException(500, 'El paraqmetro pasado para las tneencias no existe en el sistema ');
        }else {
            $codtenencia = null;
        }

        $modelopadre = $this->loadModel($id);
        if ($modelopadre->procesoactivo[0]->tenenciasproc->final == '1') {
            throw new CHttpException(500, 'No puede procesar mas este documento, el ultimo proceso ha sido marcado como final, consulte con el damisnitrador ');
        } else {

            //$descuento=(is_null($modelopadre->descuento))?0:(1-$modelopadre->descuento/100);
            if (!is_null($codtenencia)) {
                $model = new Procesosdocu('cambiotenencia');
                $model->codte = $codtenencia;
            } else {
                $model = new Procesosdocu();
                $model->codte = null;
            }

            if ($modelopadre->codtenencia == '400') {
                $model->setScenario('ins_certificado');
                //$model->proximovencimiento=;
            }



            $dia = $modelopadre->fechain;
            $hoy = date("Y-m-d");
            $tiempopasado = time() - strtotime($hoy);
            $model->fechanominal = date("Y-m-d H:i:s", strtotime($dia) + $tiempopasado);
            //var_dump($model->attributes);die();
            $model->hiddoci = $modelopadre->id;

            //preparando el escanerio ceritifcado 




            if (isset($_POST['Procesosdocu'])) {
                // var_dump($_POST['Procesosdocu']);
                $model->attributes = $_POST['Procesosdocu'];
                //var_dump($model->attributes);die();
                //$this->performAjaxValidationdetalle($model);
                if ($model->save()) {
                    if (!empty($_GET['asDialog'])) {
                        //Close the dialog, reset the iframe and update the grid
                        echo CHtml::script("window.parent.$('#cru-dialog31').dialog('close');
							window.parent.$('#cru-frame31').attr('src','');	
                                                        window.parent.location.reload();
					
					");
                    }
                } else {
                    // print_r($model->geterrors());
                    /* MiFactoria::Mensaje('error',
                      yii::app()->mensajes->getErroresItem($model->geterrors())
                      ); */
                }
            }
            // if (!empty($_GET['asDialog']))
            $this->layout = '//layouts/iframe';
            $this->render(
                    (is_null($codtenencia)) ?
                            'form_proceso_carcaza' :
                            'form_cambiotenencia', array('modelopadre' => $modelopadre,
                'model' => $model, 'id' => $id, 'codtenencia' => $codtenencia,
            ));
        }
    }

    public function actionajaxcargaformtenencia() {

        if (yii::app()->request->isAjaxRequest) {
            $id = (integer) MiFactoria::cleanInput($_GET['id']);
            $codtenencia = (integer) MiFactoria::cleanInput($_GET['codtenencia']);
            $modelopadre = Docingresados::model()->findByPk($id);
            if (is_null($modelopadre))
            // throw new CHttpException(500,'El paraqmetro pasado para las tneencias no existe en el sistema ');
                die();
            $model = New Procesosdocu();
            $formi = New CActiveForm;
            echo $this->renderpartial('form_proceso', array(
                'modelopadre' => $modelopadre,
                'model' => $model,
                'id' => $id,
                'codtenencia' => $codtenencia,
                'form' => $formi
                    ), false, true);
        }
    }

    public function actionborraarchivo() {
        if (yii::app()->request->isAjaxRequest) {
            if (Isset($_GET['archivoaatratar'])) {
                $ruta = unserialize(base64_decode($_GET['archivoaatratar']));
                //var_dump($ruta);die();
                @unlink($ruta);
            } else {
                
            }
        }
    }

    public function actionadjuntaarchivo() {
        if (yii::app()->request->isAjaxRequest) {
            if (Isset($_GET['archivoaatratar'])) {
                $ruta = unserialize(base64_decode($_GET['archivoaatratar']));
                if (Isset($_GET['idregistro'])) {
                    $registro = $this->loadModel((integer) MiFactoria::cleanInput($_GET['idregistro']));
                    if (count($registro->clipro->contactoses) > 0) {
                        //preparando el titulo del mensaje                    
                        $titulo = $registro->nombrecortado($ruta)[1] . '   ' . Configuracion::valor($registro->codocu, $registro->codlocal, $registro::PARAMETRO_TITULO_CORREO_PEDIDO);
                        if ($registro->codtenencia == '400') {
                            //var_dump($registro->clipro->contactoses[0]);var_dump($registro->tipodoc);die();
                            $destinatarios = Contactos::getListMailContacto($registro->clipro->contactoses[0]->id, $registro->tipodoc);
                        } else {
                            $destinatarios = Contactos::getListMailEmpresa($registro->codprov, $registro->tipodoc);
                        }
                        if (yii::app()->user->id == 1)
                            $destinatarios = 'neotegnia@gmail.com';
//insertadno lo emnejaes primero para obtener el id el mensaje esto para generalun tojken para conifirmar la alectura del correo envciado 
                        $idmensaje = $registro->insertamensajes('M', $destinatarios, $titulo
//Configuracion::valor($registro->codocu, $registro->codlocal, $registro::PARAMETRO_TITULO_CORREO_PEDIDO)                  
                        );
                        //preaprando para enviar el correo            
                        //id contacto                     
                        $resultadocorreo = "";
                       // var_dump($registro->codprov);
                       // var_dump(Configuracion::valor(self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS, $registro->codlocal, '1248'));
                     // die();
                        $resultadocorreo = yii::app()->correo->correo_adjunto(
                                //Contactos::getListMailEmpresa($registro->codprov,$registro->codocu),
                                $destinatarios, 
                                Yii::app()->user->email,
                                $titulo,
                                $registro->getmensajemail($idmensaje),
                                //'hola miaguitos',
                                $ruta,
                             Configuracion::valor(self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS, $registro->codlocal, '1248')  
                        );
                        if (strlen($resultadocorreo) > 0) {   //si hubo erroes //borrar el mensaje 
                            $registro->borramensaje($idmensaje);
                        }
                    } else {
                        echo "NO hay contactos para esta empresa";
                    }
                } else {
                    
                }
            } else {
                
            }
        }
    }

    public function actionprocesavarios() {
        $idsenmaletin = yii::app()->maletin->valoresid(self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS);
        //var_dump($idsenmaletin);die();
        if (count($idsenmaletin)) {
            $registro = New Procesosdocu('masivo');
           Logprocesosdocu::model()->deleteAll("iduser=" . yii::app()->user->id);
            if (isset($_POST['Procesosdocu'])) {
                $registro->attributes = $_POST['Procesosdocu'];
                if ($registro->validate()) {
                    foreach ($idsenmaletin as $valor) {

                        $registrodoc = Docingresados::model()->findByPk($valor);
                        $identificador = '[ ' . $registrodoc->id . '] - [ ' . $registrodoc->correlativo . ' ] - [ ' . $registrodoc->docus->desdocu . '] - [ ' . $registrodoc->clipro->despro . ' ]- [ ' . $registrodoc->numero . ']';

                        $procesoactual = $registrodoc->procesoactivo[0];
                        if ($procesoactual->tenenciasproc->final == '1') { ///si el proceso actual es final
                            $registrodoc->registralog('error', $identificador . ' Este documento ya tiene un proceso marcado ' . $procesoactual->tenenciasproc->eventos->descripcion . 'como final.., no puede procesarlo mas ');
                        } else { //aca si se puede y comenzamos a verificar 
                            $marcador = "";
                            $todook = true;
                            if ($registrodoc->codtenencia == $registro->codte) { //Si esta PROCESANDO EN LA MISMA TENENCIA 
                                $model = new Procesosdocu();
                                $marcador = " Tenencia procesosactual : [" . $registrodoc->codtenencia . "]  Tenencia regsitro [" . $registro->codte . "]";

                                $model->codte = $registrodoc->codtenencia;
                                /* if($registro->hidproc==$procesoactual->hidproc){ 
                                  //Si esta intentando procesar  lo misom DOS VEECES EGUIDAS
                                  ///SE DEBE DE PARAR EL PROCESO CON UN ERROR
                                  $registrodoc->registralog('error','Esta intentando registrar un proceso repetido y consecutivo en la misma tenencia');
                                  } */
                            } else { //SI ES CAMBIOPD  ETENCNIA 
                                $marcador = " Tenencia Anterior : [" . $registrodoc->codtenencia . "]  Tenencia Actual [" . $registro->codte . "]";
                                //verificando que lanueva tenencia tengoa registradpo algun procedimietno con este codigo de docum,ento
                                //siquiera debe de haber uno
                                //ahora veamos si la tenencia actual tiene siquiera �proceso con este codigod edocumetno
                                if (!count(Tenenciasproc::model()->findAll(
                                                        "codte=:vcdote and codocu=:vcodocu", array(":vcdote" => $registro->codte,
                                                    ":vcodocu" => $registrodoc->tipodoc
                                                        )
                                        )) > 0
                                ) {
                                    $marcador = " Tenencia Actual [" . $registro->codte . "]  no tiene registrado ningun documento  del tipo [" . $registrodoc->tipodoc . "]";
                                    $registrodoc->registralog('error', $identificador . '  Proceso con errores  ' . $marcador);
                                    $todook = false;
                                }




                                $model = new Procesosdocu('cambiotenencia');
                                $model->codte = $registro->codte;
                                $registrodoc->codtenencia == $registro->codte;
                            }

                            if ($todook) {


                                $model->hiddoci = $registrodoc->id;
                                $model->fechanominal = $registro->fechanominal;
                                $model->hidtra = $registro->hidtra;
                                $model->hidproc = $registro->hidproc;
                                $model->codocuref = $registro->codocuref;
                                $model->numdocref = $registro->numdocref;
                                if (yii::app()->user->id == 1) {
                                    $registrodoc->registralog('success', $identificador . '  proceso exitoso ' . $marcador);
                                } else {
                                    if ($model->save()) {
                                        $registrodoc->registralog('success', $identificador . '  proceso exitoso ' . $marcador);
                                    } else {
                                        $registrodoc->registralog('error', $identificador . ' ' . yii::app()->mensajes->getErroresItem($model->geterrors()) . '   -   ' . $marcador);
                                    }
                                }
                            }
                        } ///fin de si es final         
                    } //fin del foreach del maletin
                    ///aqui enviar le mail de confirmacion del proceso

                    if (Tenenciasproc::model()->findByPk($registro->hidproc)->esmensaje == '1') {
                        //echo "murio";die();
                        $arrayids = $registro::getIdsLog('success', self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS);
                        $proveedores = Docingresados::clipro_from_ids($arrayids);
                       // var_dump($proveedores);

                        $regview = new VwDoci;
                        foreach ($proveedores as $clave => $valor) {
                            //echo "<br>ddirecciones<br>" ;
                            $direcciones = Contactos::getListMailEmpresa($valor, $registrodoc->tipodoc);
                            if(strlen(trim($direcciones))>0 ){
                                //echo $direcciones;
                            // echo "<br>responder<br>" ;

                            $reply = yii::app()->user->email;
                            //echo $reply;
                            $titulo = Tenenciasproc::model()->findByPk($registro->hidproc)->eventos->descripcion;
                            // echo "<br>Titulo<br>" ;
                            // echo $titulo;
                            // echo "<br>" ;
                            //($regview->search_por_filtro_array($arrayids,$valor));die();
                            $prove = $regview->search_por_filtro_array($arrayids, $valor);
                            $columnas = $regview::array_columnas_proveedores();
                            $mensaje = Tenenciasproc::model()->findByPk($registro->hidproc)->msgexterno .
                                    CHtml::openTag("br") .
                                    $this->renderPartial('listadomail', array(
                                        'proveedor' => $prove,
                                        'arraycolumnas' => $columnas,
                                            ), true, false);
                            // echo "<br>Mensaje<br>" ;
                            // echo $mensaje;
                            //echo "<br>" ;
                            yii::app()->correo->correo_simple(
                                    $direcciones, $reply, $titulo, $mensaje
                            );

                            }
                            
                            //  echo "<br><br><br>Se acabo el bucle  <br><br><br>" ; 
                            $direcciones = "";
                        }
                    }

                    MiFactoria::mensaje('notice', 'Se realizo el proceso masivo , favor revise el log de procesos para verificar los mensajes');
                    $this->render(
                            'logproceso', array(
                        'codigodocu' => self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS,)
                    );
                    yii::app()->maletin->flush();
                    yii::app()->end();
                } else {//si no valido
                    $this->render(
                            'form_proceso_masa', array('model' => $registro, 'codigodocu' => self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS,)
                    );
                    // yii::app()->maletin->flush();
                    yii::app()->end();
                }
            }
            MiFactoria::mensaje('notice', 'Va ha procesar [' . count($idsenmaletin) . ']  Documentos ');
            $this->render(
                    'form_proceso_masa', array('model' => $registro, 'codigodocu' => self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS,)
            );
        } else {
            MiFactoria::mensaje('notice', 'No ha colocado ningun documento en el maletin');
            $this->redirect('admin');
        }
    }

    public function actioncargatenencias() {
        if (yii::app()->request->isAjaxRequest) {
            $centro = $_POST['Procesosdocu']['codprov'];
            $criteria = new CDbCriteria();
            $criteria->addCondition("codcen=:vcodcen");
            $criteria->params = array(":vcodcen" => $centro);
            //$valor=$_POST['Eventos']['codocu'];
            $data = CHtml::listData(Tenencias::model()->findAll($criteria), "codte", "deste");
            echo CHtml::tag('option', array('value' => null), CHtml::encode('--Escoja una Tenencia--'), true);
            foreach ($data as $value => $name) {
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }
        }
    }

    public function actioncargaprocesos() {
        if (yii::app()->request->isAjaxRequest) {
            $codte = $_POST['Procesosdocu']['codte'];
            $criteria = new CDbCriteria();
            $criteria->addCondition("codte=:vcodte");
            $criteria->params = array(":vcodte" => $codte);
            //$valor=$_POST['Eventos']['codocu'];
            $data = CHtml::listData(Tenenciasproc::model()->findAll($criteria), "id", "nombrecompleto");
            echo CHtml::tag('option', array('value' => null), CHtml::encode('--Escoja un proceso--'), true);
            foreach ($data as $value => $name) {
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }
        }
    }

    public function actioncargatrabajadores() {
        if (yii::app()->request->isAjaxRequest) {
            $codte = $_POST['Procesosdocu']['codte'];
            $criteria = new CDbCriteria();
            $criteria->addCondition("codte=:vcodte");
            $criteria->params = array(":vcodte" => $codte);
            //$valor=$_POST['Eventos']['codocu'];
            $data = CHtml::listData(Tenenciastraba::model()->findAll($criteria), "id", "trabajadores.ap");
            echo CHtml::tag('option', array('value' => null), CHtml::encode('--Escoja un responsable--'), true);
            foreach ($data as $value => $name) {
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }
        }
    }

    public function actionponeralcarro() {
        $autoIdAll = $_POST['cajita'];
//VAR_DUMP($_POST['cajita']);
        if (count($autoIdAll) > 0) {
            $arrayvalores = array();
            foreach ($autoIdAll as $autoId) {
                $arrayvalores[$autoId] = $this->id;
            }
            //  print_r($arrayvalores);die();
            yii::app()->maletin->ponervalores($arrayvalores, self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS);
        }

        echo "Se agregaron " . count($autoIdAll) . "  Registros al malet�n";
    }

    public function actionborrafilamaletin() {

        if (yii::app()->request->isAjaxRequest) {
            $id = (integer) MiFactoria::cleanInput($_GET['id']);
            yii::app()->maletin->borrafila($id);
            echo "Se saco el registro del maletin de usuario";
        }
    }

    public function actionlimpiarcarro() {

        if (yii::app()->request->isAjaxRequest) {
            yii::app()->maletin->flush();
            echo "Se limpio del maletin de usuario";
        }
    }

    //Esta function verifica que el destinatario 
    // a presionado el link de "confirmar lectura" del correo encviado 
    // $token: es el id del link 
    private function confirmalecturacorreo($token) {
        $descifrado = base64_decode($token);
        //bscar eln los mensajes enviados */
        $descifrado = (integer) MiFactoria::cleanInput($descifrado);
        //$descifrado=(integer) MiFactoria::cleanInput($token);
        //var_dump($descifrado);die();
        $registro = Mensajes::model()->findByPk($descifrado);
        if (is_null($registro))
            return false;
        $registro->leido = date("Y-m-d H:i:s");
        $registro->setScenario('lectura');
        return $registro->save();
        /* print_r($registro->geterrors());
          return 1; */
    }

    public function actionconfirmalectura() {
        $token = $_GET['token'];
        $this->layout = "//layouts/iframe";
        if ($this->confirmalecturacorreo($token)) {
            echo "se confirmo  la lectura";
        } else {
            echo "no se pudo confirmar";
        }


        //$this->render('//site/confirmalectura');
        yii::app()->end();
    }

    public function actionmodificaproceso($id) {
        $id = (integer) MiFactoria::cleanInput($id);
        $model = Procesosdocu::model()->findByPk($id);
        $model->setScenario('documentosreferencia');
        if ($model->tenenciasproc->final == '1' or strlen($model->fechafin) > 0) {
            throw new CHttpException(500, 'No puede procesar mas este documento, el ultimo proceso ha sido marcado como final, consulte con el damisnitrador ' . $model->fechafin);
        } else {
            if (isset($_POST['Procesosdocu'])) {
                // var_dump($_POST['Procesosdocu']);
                $model->attributes = $_POST['Procesosdocu'];
                //var_dump($model->attributes);die();
                //$this->performAjaxValidationdetalle($model);
                if ($model->save()) {


                    //Close the dialog, reset the iframe and update the grid
                    echo CHtml::script("window.parent.$('#cru-dialog3').dialog('close');
							window.parent.$('#cru-frame3').attr('src','');						
					window.parent.$.fn.yiiGridView.update('procesos-grid');
					");
                } else {
                    // print_r($model->geterrors());
                    /* MiFactoria::Mensaje('error',
                      yii::app()->mensajes->getErroresItem($model->geterrors())
                      ); */
                }
            }
            // if (!empty($_GET['asDialog']))
            $this->layout = '//layouts/iframe';
            $this->render(
                    'form_proceso_docurefs', array(
                'model' => $model,
            ));
        }
    }

    public function actioncertificadosdicapi() {
        $model = new Docingresados('search_por_dicapi');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Docingresados']))
            $model->attributes = $_GET['Docingresados'];
        //print_r($model->attributes);
        if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
            //ECHO "SALIO";DIE();
            $this->exportCSV($model->search(), array(
                'nomep',
                'codep',
                'numdocref',
                'descripcion',
                'ap',
                'despro',
                'codprov',
                'rucpro',
                'textv',
                'codlocal',
                'monto',
                'moneda',
                'descorta',
                'correlativo',
                'id',
                'fecha',
                'fechain',
                'numero',
                    )
            );
        } else {
            $this->render('reportedicapi', array(
                'model' => $model,
            ));
        }
    }

    public function actionajaxanulacion() {
        if (yii::app()->request->isAjaxRequest) {
            if (isset($_POST['id'])) {
                $id = (integer) MiFactoria::cleanInput($_POST['id']);
                $regi = Procesosdocu::model()->findByPk($id);

                if (!is_null($regi)) {
                    if (count($regi->docingresados->procesosdocusinanular) > 1) {

                        ///verificando si se anula el proceso activo, si es asi, se tiene
                        /// que colocar fecha fin=null ene le proc inmediato anterior
                        $idproactivo = $regi->docingresados->procesoactivo[0]->id;
                        // $hayotroanterior=false;
                        if ($id == $idproactivo) {
                            ///buscamos el otor id inemadiato antariro
                            foreach ($regi->docingresados->procesosdocu as $fila) {
                                if ($id <> $fila->id) {
                                    $otroid = $fila->id;
                                    break;
                                }
                            }
                            $otroregistro = Procesosdocu::model()->findByPk($otroid);
                            $otroregistro->setScenario("fechafinal");
                            $otroregistro->fechafin = null; //abrimos la fecha fin 
                            $otroregistro->save();
                        } else {
                            
                        }

                        $regi->setScenario('anulacion');
                        $regi->anulado = "1";
                        if ($regi->save()) {
                            echo "Se anul� este Proceso ";
                        } else {
                            echo "No se pudo anular este proceso : " . yii::app()->mensajes->getErroresItem($regi->errors());
                        }
                    } else { //En este casoHAY UN OSLO PROECSO Y ES LE PROCESO ACTIVO  Y SE QUIER AQNULAR
                        echo " No pUEDE ANUALR ETE PROCESO PORQUE EST� ACTIVO Y ES UNICO";
                    }
                } else {
                    echo " No se encontro registro con ese ID";
                }
            }
        }
    }

    public function actiondetalles() {



        $model = new VwDocuIngresados('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VwDocuIngresados']))
            $model->attributes = $_GET['VwDocuIngresados'];
        if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
            //ECHO "SALIO";DIE();
            $this->exportCSV($model->search(), array(
                'nomep',
                'codep',
                'numdocref',
                'descripcion',
                'ap',
                'despro',
                'codprov',
                'rucpro',
                'textv',
                'codlocal',
                'monto',
                'moneda',
                'descorta',
                'correlativo',
                'id',
                'fecha',
                'fechain',
                'numero',
                    )
            );
        } else {
            $this->render('admindetalle', array('model' => $model,
            ));
        }
    }

    public function actionajaxenviacorreoproceso() {
        if (yii::app()->request->isAjaxRequest) {
            if (Isset($_GET['id'])) {
                $registro = Procesosdocu::Model()->findByPk((integer) MiFactoria::cleanInput($_GET['id']));
                $registropadre = $registro->docingresados;
                if ($registro->tenenciasproc->esmensaje == '1' and strlen(trim($registro->tenenciasproc->msgexterno)) > 0) {
                    $titulo = $registro->tenenciasproc->eventos->descripcion;
                    $titulo.='-' . $registropadre->docus->desdocu . '-' . $registropadre->numero;
                    $mensaje = CHtml::encode($registro->tenenciasproc->msgexterno);

                    $mensaje.=$this->renderPartial('view', array('model' => $registro->docingresados), true, false);

                    $idmensaje = $registro->insertamensajes('M', Contactos::getListMailEmpresa($registropadre->codprov, $registropadre->tipodoc), $titulo
                    );
                    $resultadocorreo = "";
                    $resultadocorreo = yii::app()->correo->correo_simple(
                            Contactos::getListMailEmpresa($registropadre->codprov, $registropadre->tipodoc), Yii::app()->user->email, $titulo, $mensaje
                    );
                    if (strlen($resultadocorreo) > 0) {   //si hubo erroes //borrar el mensaje 
                        $registro->borramensaje($idmensaje);
                        echo " No se pudo enviar el correo por las razones : " . $resultadocorreo;
                    } else {
                        echo " Se envi� el correo con exito  ";
                    }
                } else {
                    echo " No se envi� el mensaje por que este proceso no esta configurado para esto, o no tiene ningun texto de mensaje que mostrar, modifique las configuraciones";
                }
            } else {
                
            }
        } else {
            
        }
    }

    public function actionindicadores() {
        if ($_GET['tipo'] == "reparto") {
            $datospay = MiFactoria::getArrayValColumnas(
                            VwDoci::getcantidadporusuario());
            $arraypay = array();
            foreach ($datospay['ap'] as $clave => $valor) {

                $nombre = $valor;
                $cantidad = $datospay['cantdocus'][$clave];
                $elemento = array('name' => $nombre, 'y' => $cantidad);
                array_push($arraypay, $elemento);
                // $arraypay[][0]=$datospay['ap'][$clave];
                //$arraypay[][1]=$datospay['cantdocus'][$clave];
            }


            $this->render('view_pay', array('datos' => $arraypay));
            var_dump($arraypay);
            die();
        }



        $arrayvalores = VwDoci::kpiprovdocu('145', '100');
        $arrayvalhoras = VwDoci::kpiprovdocuhoras('145', '100');
        $arrayvalnumero = VwDoci::kpiprovdocunumero('145', '100');

        //var_dump($arrayvalnumero);die();
        function ciento($v) {
            return 1000 * $v;
        }

        $horas = array_map("ciento", $arrayvalores['horasprom']);

        //var_dump($arrayvalores['despro']);die();
        $this->render('resumen', array(
            'proveedores' => $arrayvalores['codprov'],
            'montodinero' => $arrayvalores['tiempodinero'],
            'nombresprove' => $arrayvalores['despro'],
            'horas' => $horas,
            'proveedoresabs' => $arrayvalhoras['proveedores'],
            'horas100' => $arrayvalhoras['horas100'],
            'horas200' => $arrayvalhoras['horas200'],
            'cantidades' => $arrayvalnumero['cantidad'],
            'proveedorescanti' => $arrayvalnumero['proveedores'],
                ), false, true);
    }

    public function actionajaxnotificavencimientos() {
        if (yii::app()->request->isAjaxRequest) {
            $reply = yii::app()->user->email;
            $factor = '0.7'; ///70%
            //  echo $reply;
            $titulo = 'Proximo vencimiento de certificados';
            $prove = VwDoci::getCertificadosVencidos($factor);
            $columnas = $regview::array_columnas_proveedores();
            $mensaje = Tenenciasproc::model()->findByPk($registro->hidproc)->msgexterno .
                    CHtml::openTag("br") .
                    $this->renderPartial('listadomail', array(
                        'proveedor' => $prove,
                        'arraycolumnas' => $columnas,
                            ), true, false);
            // echo "<br>Mensaje<br>" ;
            // echo $mensaje;
            /// echo "<br>" ;
            yii::app()->correo->correo_simple(
                    $direcciones, $reply, $titulo, $mensaje
            );
        }
    }

    public function actionajaxhereda() {
        if (yii::app()->request->isAjaxRequest) {
            if (isset($_POST['idpadre'])) {
                $id = (integer) MiFactoria::cleanInput($_POST['idpadre']);
                $registro = Docingresados::model()->findByPk($id);
                if (!is_null($registro)) {
                    header("Content-Type: application/json");
                    echo CJSON::encode(
                            array(
                                'codigo' => $registro->tipodoc,
                                'numero' => $registro->numero
                    ));
                } else {
                    echo " No se encontro nngun registro para este id " . $id;
                }
            } else {
                //var_dump($_POST);
            }
        }
    }

    ///funcioque usa el correo electronicao para alertar de vencmientos d edocumentos 
    public function alertavencimientos() {
        //prmero verifica r que no se hay enviado un mensajer con epriodo anterior
        //recueprando el mensaje
        $registro = New Docingresados();
        $tipo = 'A';
        $tenencias = Tenencias::model()->findAll();
        $direcciones = yii::app()->user->email;
        $reply = yii::app()->user->email;
        $titulo = 'Vencimiento de documentos';
        foreach ($tenencias as $tenencia) {
            if ($tenencia->alerta == '1') {
                $direcciones = $tenencia->listamail;
                $reply = yii::app()->user->email;
                $titulo = 'Vencimiento de documentos - Tenencia  ' . $tenencia->codte;
                // ECHO "RECIRRINDO LAS TENMENCIAS <BR><BR>";
                $ultimomensaje = $registro->recuperamensaje($tipo, self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS);
                if (!is_null($ultimomensaje)) {
                    //ahora verificando la fecha del ultimo mensaje para no generar correos inndecesarios 
                    $fechaultimomensaje = $ultimomensaje->cuando;
                    $horaspasadasdeultimomensaje = time() / 3600 - strtotime($fechaultimomensaje) / 3600;
                    if ($horaspasadasdeultimomensaje >= $tenencia->horasfrecuencialerta) { //Si ha pasodf mas horas de la frecuencia de la tenencia
                        $this->enviadatosvencimiento($tenencia->codte, $tenencia->horaspreviasalerta, $direcciones, $reply, $titulo);
                        // $registro->insertamensajes('A',$direcciones,$titulo);
                    }
                } else {
                    $this->enviadatosvencimiento($tenencia->codte, $tenencia->horaspreviasalerta, $direcciones, $reply, $titulo);
                } //fin de si ultimomensaje==null
            } //fin de si es alerta checked==1
        }
        $registro->insertamensajes('A', $direcciones, $titulo);
    }

    private function enviadatosvencimiento($codte, $previasalerta, $direcciones, $reply, $titulo) {
        $datos = VwDoci::vencimientocertificados($codte, $previasalerta);

        $dataProvider = new CArrayDataProvider($datos, array(
            'id' => 'user',
            'sort' => array(
                'attributes' => array(
                    'porcentaje',
                ),
            ),
            'pagination' => array(
                'pageSize' => 10000,
            ),
        ));



        $columnas = VwDoci::array_columnas_interno();
        $tenor = Tenores::buscatenor(self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS, 'G', 'A');
        // $tenor->estiliza();
        $mensaje = $tenor->estiliza();

        //  var_dump($mensaje);die();
        $datacadena = $this->renderPartial('listadomail', array(
            'proveedor' => $dataProvider,
            'arraycolumnas' => $columnas,
                ), true, false);
        $datacadena = $tenor->estiliza($datacadena);
        $mensaje.=CHtml::openTag("br") . $datacadena;
        yii::app()->correo->correo_simple(
                $direcciones, $reply, $titulo, $mensaje, Configuracion::valor(self::CODIGO_DOC_REGISTRO_INGRESO_DOCUMENTOS, '1203', '1248')
        );
    }
    
    
    //lna el arbol de cerificados 
    public function actionllenaarbol(){
        Arbolcerti::model()->deleteAll();
        $ramaroot=New Arbolcerti();
            $ramaroot->setAttributes(array(
                'parent_id'=>0,
                'titulo'=>'Embarcaciones',
            ));$ramaroot->save();
            $ramaroot->refresh();
        
        $barcos=Embarcaciones::model()->findAll("activa='1'");
        foreach($barcos as $barco){
            $rama=New Arbolcerti();
            $rama->setAttributes(array(
                'parent_id'=>$ramaroot->id,
                'titulo'=>$barco->nomep,
            ));$rama->save();//unset($ramaroot);
            $rama->refresh();
            
             $certificados=Docingresados::model()->findAll("codtenencia='400' and codepv='".$barco->codep."'");
                foreach($certificados as $certificado){
                    $procesoactivo=$certificado->procesoactivo[0];
                    if(is_null( $procesoactivo)){
                        $porcentaje=0;
                    }else{
                        $porcentaje=$certificado->procesoactivo[0]->porcavance();
                    }
                   
             $nuevorama=New Arbolcerti();
            $nuevorama->setAttributes(array(
                'parent_id'=>$rama->id,
                'porcentaje'=>$porcentaje,
                'identidad'=>$certificado->id,
                'tipodoc'=>$certificado->tipodoc,
                'color'=>$certificado->getcolor(),
                'enlaces'=>$certificado->enlacesarchivos(Yii::app()->getTheme()->baseUrl.'/img/doc_pdf.png'),
                'fechavenc'=>$certificado->fechavencimiento,
                'nivel'=>2,
                'titulo'=>$certificado->docus->desdocu,
            ));
            $nuevorama->save();unset($nuevorama);
                }
                
                unset($rama);
            
        }
        unset($barcos);
        
       
        $this->render('arbolcertificados');
        
    }
    
   public function eschimbotano(){
      return in_array(yii::app()->user->id,array(14,15));
   } 

   
   public function actionmuestrapdf(){
      
           if(isset($_GET['id'])){   
               $id= (integer)MiFactoria::cleanInput($_GET['id']); 
               $registro= Docingresados::model()->findByPk($id);  
               if(is_null($registro))          
                   throw new CHttpException(500,'NO se encontro el registro con el id '.$id);     
               echo  $this->renderpartial('certificadopdf',array('model'=>$registro),false,true);   
            //yii::app()->request->redirect(yii::app()->getBaseUrl(true).$archivo['rutacorta'].$archivo['nombre'].'.'.$archivo['extension']);  
               
           }         
              
           
   }
   
}
