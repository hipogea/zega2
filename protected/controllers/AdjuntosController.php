<?php
        

class AdjuntosController extends Controller
{
	
        

	public $layout='//layouts/column2';


	
	public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('Edita','Borra','Editatarifas','updatecuadrilla','ajaxborratrabajadores',  'AjaxAgregaTrabajadores','ajaxcompo','AgregaDetalleOtCompo','muestrakardex', 'modificadetalleconsignacion',   'Borraitemsconsignaciones',   'JalaMaterialesExt',   'ajaxobjetosporclipro',    'ajaxmuestralistamateriales','JalaMateriales','view','imputa','cargagaleria','tomafoto','creaconsignacion','borraitemsdesolpe','nadax','creaservicio','modificadetallerecurso','creadetallerecurso','verprecios','crearpdf','verDetoc','firmar','aprobar','cargaprecios','enviarpdf','admin','borrarimpuesto','reporte','agregarmasivamente','cargadirecciones','borraitems','sacaitem','sacaum','salir','agregaimpuesto','agregaritemsolpe','procesardocumento','refrescadescuento','VerDocumento','EditaDocumento','creadocumento','Agregardelmaletin','borraitem','imprimirsolo','cargaentregas','agregarsolpe','agregarsolpetotal','pasaatemporal','create','imprimirsolo','imprimir','imprimir2','enviarmail',
					'procesaroc','hijo','Aprobaroc','Reporteoc','Anularoc','Configuraop','Revertiroc', ///acciones de proceso
					'libmasiva','creadetalle','Verdetalle','muestraimput','update','nada','Modificadetalle'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	
	public function actionEdita($id){
            $id=(integer) MiFactoria::cleanInput($id);
            $model= Adjuntos::model()->findByPk($id);
          $model->setScenario('textos');           
		if(isset($_POST[get_class($model)])){
			$model->attributes=$_POST[get_class($model)];
			if($model->save()){
				
					//Close the dialog, reset the iframe and update the grid
					echo CHtml::script("window.parent.$('#cru-dialog4').dialog('close');
                                        window.parent.$('#cru-detalle4').attr('src','');
					window.parent.$.fn.yiiGridView.update('detalle-imggrilla-grid');
								
										");

				
			}

		}
		// if (!empty($_GET['asDialog']))
		$this->layout = '//layouts/iframe';
                
		$this->render('_form_detalle',array(
			'model'=>$model
		));
	}

public function actionBorra($id){
            $id=(integer) MiFactoria::cleanInput($id);
            $model= Adjuntos::model()->findByPk($id);
            @unlink($model->enlace);
          $model->delete();
	}
        

	/****************************************************
	 *  muestra la vista de configuracion de los eventos
	 *+++++++++++++++++++++++++++++++++++++++++++++++++*/

	
public function actionAjaxUpadteTextosImg(){
        
        if(yii::app()->request->isAjaxRequest){ 
            $titulo=unserialize(base64_decode($_GET['titulo']));
             $mensajegeneral=unserialize(base64_decode($_GET['texto']));  
            
                //$id= (integer)MiFactoria::cleanInput($_GET['id']);  
                $id= (integer)MiFactoria::cleanInput($_GET['id']); 
                $registro= Adjuntos::model()->findByPk($id);        
                if(is_null($registro))                 
                    throw new CHttpException(500,'NO se encontro el registro con el id '.$id);       
                 $registro->actualizaTextos($id,$titulo,$mensajegeneral);   
                
         }
    }
     
} 
    

/**
	 * Manages all models.
	 */
	


?>
