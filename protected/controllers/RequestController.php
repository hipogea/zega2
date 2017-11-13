<?php
class RequestController extends Controller
{
	/**
	 * @return array actions
	 */
   
  public function filters()
{
return array(
'accessControl',
'ajaxOnly'
);
}

  
	public function actions()
	{
		return array(
                    'prueba',
			'suggestMaestrocompo'=>array(
				'class'=>'application.extensions.actions.XSuggestAction',
				'modelName'=>'Maestrocompo',
				'methodName'=>'suggest',
			),
                    
                    
                    
	
'suggestCountry'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'Country',
'methodName'=>'suggest',
),
'legacySuggestCountry'=>array(
'class'=>'ext.actions.XLegacySuggestAction',
'modelName'=>'Country',
'methodName'=>'legacySuggest',
),



'fillTree'=>array(
'class'=>'ext.actions.XFillTreeAction',
'modelName'=>'Menu',
   // 'rootId'=>$_GET['rootId'],
'showRoot'=>TRUE
),

   'llenahijos'=>array(
'class'=>'ext.actions.XFillTreeAction',
'modelName'=>'Objetosmaster',
   // 'rootId'=>$_GET['rootId'],
'showRoot'=>TRUE
),                 
                    
                    
                    
                    
'llenaEquipos'=>array(
                'class'=>'ext.actions.XFillTreeAction',
                'modelName'=>'Menu',
	'rootId'=>1,
	            'showRoot'=>false

 ),
'llenaCertificados'=>array(
                'class'=>'ext.actions.XFillTreeAction',
                'modelName'=>'Arbolcerti',
	//'rootId'=>1,
	            'showRoot'=>true

 ),

'treePath'=>array(
'class'=>'ext.actions.XAjaxEchoAction',
'modelName'=>'Menu',
'attributeName'=>'pathText',
),
'uploadFile'=>array(
'class'=>'ext.actions.XHEditorUpload',
),
'suggestAuPlaces'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'AdminUnit',
'methodName'=>'suggestPlaces',
'limit'=>30
),
'suggestAuHierarchy'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'AdminUnit',
'methodName'=>'suggestHierarchy',
'limit'=>30
),
'suggestLastname'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'Person',
'methodName'=>'suggestLastname',
'limit'=>30
),
'fillAuTree'=>array(
'class'=>'ext.actions.XFillTreeAction',
'modelName'=>'AdminUnit',
'showRoot'=>false,
),
'viewUnitPath'=>array(
'class'=>'ext.actions.XAjaxEchoAction',
'modelName'=>'AdminUnit',
'attributeName'=>'rootlessPath',
),
'viewUnitLabel'=>array(
'class'=>'ext.actions.XAjaxEchoAction',
'modelName'=>'AdminUnit',
'attributeName'=>'label',
),
'initPerson'=>array(
'class'=>'ext.actions.XSelect2InitAction',
'modelName'=>'Person',
'textField'=>'fullname',
),
'suggestPerson'=>array(
'class'=>'ext.actions.XSelect2SuggestAction',
'modelName'=>'Person',
'methodName'=>'suggestPerson',
'limit'=>30
),
                    
'suggestcompo'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'Masterequipo',
'methodName'=>'suggestcompo',
'limit'=>30
),
                    
   'suggestMaterial'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'Maestrocompo',
'methodName'=>'suggest',
'limit'=>10
),                 
      
                    
                    
   'suggestceco'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'Cc',
'methodName'=>'suggestceco',
'limit'=>10
),  
                    
        'suggestNe'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'VwGuia',
'methodName'=>'suggestNe',
'limit'=>20
),                
   'suggestot'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'VwOtdetalle',
'methodName'=>'suggestot',
'limit'=>10
),                   
     'suggestotsimple'=>array(
'class'=>'ext.actions.XSuggestAction',
'modelName'=>'Ot',
'methodName'=>'suggestotsimple',
'limit'=>10
),                 
                    
'suggestPersonGroupCountry'=>array(
'class'=>'ext.actions.XSelect2SuggestAction',
'modelName'=>'Person',
'methodName'=>'suggestPersonGroupCountry',
'limit'=>30
),
'addTabularInputs'=>array(
'class'=>'ext.actions.XTabularInputAction',
'modelName'=>'Person',
'viewName'=>'/site/extensions/_tabularInput',
),
'addTabularInputsAsTable'=>array(
'class'=>'ext.actions.XTabularInputAction',
'modelName'=>'Person',
'viewName'=>'/site/extensions/_tabularInputAsTable',
),
);
}



public function actionprueba(){
    echo "este ees el nodo ";
  yii::app()->maletin->insertafila(3,'Clipro', null);
  
}


	
        
        
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('suggestotsimple','suggestcompo','suggestNe',  'suggestot','suggestceco','llenahijos',   'llenaCertificados', 'prueba',  'otroMaestrocompo','suggestMaterial',
'suggestCountry','legacySuggestCountry','fillTree','treePath','llenaEquipos','loadContent','suggestAuPlaces',
'suggestAuHierarchy','suggestLastname','fillAuTree','viewUnitPath','viewUnitLabel','initPerson',
'suggestPerson','suggestPersonGroupCountry','listPersonsWithSameFirstname',
'addTabularInputs','addTabularInputsAsTable'
				),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('saveTitle','saveContent','uploadFile'),
				//'ips'=>$this->ips,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}