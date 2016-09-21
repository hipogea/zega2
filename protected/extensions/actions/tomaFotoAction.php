<?php

class tomaFotoAction extends CAction
{
   
  public function run() {
    $controller = $this->getController();
 $foto=New Directoriofotos($this->documentohijo,$this->id,100,'/images','.jpg');
    if (property_exists($controller,'documentohijo')){ //Si es un controlador base
        
    }else{
        
    }
    
    
    // get the Model Name
    $model_class = ucfirst($controller->getId());
 
    // create the Model
    $model = new $model_class();
 
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    if (isset($_POST[$model_class])) {
        $model->attributes = $_POST[$model_class];
 
        if ($model->save())
        $controller->redirect(array('view', 'id' => $model->id));
    }
    
    $controller->render('create', array(
        'model' => $model,
    ));
    
    
     $foto=New Directoriofotos($this->documentohijo,$this->id,100,'/images','.jpg');
            move_uploaded_file($_FILES['webcam']['tmp_name'],Yii::getPathOfAlias('webroot').'/images/webcam.jpg');
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * @var string name of the model class.
     */
    public $modelName;
    /**
     * @var string name of the method of model class that returns data.
     */
    public $methodName='fillTree';
    /**
     * @var int id of the node that is taken as root node.
     */
    public $rootId=null;
    /**
     * @var bool wether the root node should be displayed.
     */
    public $showRoot=true;
    /**
     * Fills treeview based on the current user input.
     */
    public function run()
    {
        //ECHO "5656cvcvcv"; yii::app()->end();
        if(!isset($_GET['root'])||$_GET['root']=='source')
        {
           // ECHO "cvcvcv"; yii::app()->end();
            $rootId=$this->rootId;
            $showRoot=$this->showRoot;
        }
        else
        {
          // ECHO "ADADAD"; yii::app()->end();
            $rootId=$_GET['root'];
            $showRoot=false;
        }
        $dataTree=$this->getModel()->{$this->methodName}($rootId,$showRoot);
        echo CTreeView::saveDataAsJson($dataTree);
    }
    /**
     * @return CActiveRecord
     */
    protected function getModel()
    {
        return CActiveRecord::model($this->modelName);
    }
}