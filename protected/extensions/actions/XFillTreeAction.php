<?php
/**
 * XFillTreeAction action
 *
 * This action returns data for CTreeView widget
 *
 * The following shows how to use XFillTreeAction action
 *
 * First set up the action on RequestController actions() method:
 * <pre>
 * return array(
 *     'fillTree'=>array(
 *         'class'=>'ext.actions.XFillTreeAction',
 *         'modelName'=>'Menu',
 *         'rootId'=>1,
 *         'showRoot'=>false
 *     ),
 * );
 * </pre>
 *
 * And then set up widget:
 * <pre>
 * $this->widget('CTreeView',array(
 *     'url'=>array('request/fillTree')
 * ));
 * </pre>
 *
 * Note: Best practice is to use this action together
 * with protected/extensions/behaviors/XTreeBehvior.php
 *
 * @author Erik Uus <erik.uus@gmail.com>
 * @version 1.0.0
 */
class XFillTreeAction extends CAction
{
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
           // ECHO "cvcvcv"; yii::app()->end();die();
            $rootId=$this->rootId;
            $showRoot=$this->showRoot;
               // yii::log('  hola  Mundo sin root  ','error');
        }
        else
        {
           //ECHO "ADADtAD"; yii::app()->end();die();
                //yii::log('  hola  con  root  ','error');
            $rootId=$_GET['root'];
            $showRoot=false;
        }
        
        //$rootId=1;
        //echo "salio";die();
      // var_dump( $this->methodName);die();
        // var_dump($_GET['root']);var_dump($rootId);die();
        $dataTree=$this->getModel()->{$this->methodName}($rootId,$showRoot);
         
       // echo "arbiendo   ";
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