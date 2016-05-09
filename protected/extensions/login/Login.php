<?php

/**
 * JuiButtonSet is a widget displaying menu items in a JuiToolbar.
 *
 * @author JUlian ramirez Tenorio
 * @website http://obregon.co/
 */


class Login extends CWidget{

  
    public $items = array();
    public $actionPrefix = '';
    public $itemTemplate;
    //public $encodeLabel = true;
    public $activeCssClass = 'active';
    public $activateItems = true;
    public $activateParents = false;
    public $hideEmptyItems = true;
    public $htmlOptions = array();
    public $submenuHtmlOptions = array();
    public $linkLabelWrapper;
    public $firstItemCssClass;
    public $lastItemCssClass;
    public $ruta="";
    /**
     * Whether to hide any active/open menu items
     */
    public $hideActive = false;
    /**
     * The view to use
     */
    public $view = 'default';
    private $menu;

    public function init()
    {
        //$options=$this->options?CJavaScript::encode($this->options):'';
        $asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
        $cs=Yii::app()->clientScript;
        // publish asset        
        $cs->registerCssFile($asset."/estilo.css");
        $cs->registerScriptFile($asset."/js/jQueryRotate.min.js");
        $cs->registerScriptFile($asset."/js/jgauge-0.3.0.a3.js");
        
        $script = 'assetUrl = "' . $asset . '";';
        $this->ruta=$asset;
       
    }
    



    public function run() {

        if (!Yii::app()->user->isGuest) {
      

        echo '<div class="division3">';     
                            echo '<div class="horizontal">'   ;
                                            echo '<div class="pedazito"> ';
                                                         echo CHtml::image($this->ruta."/user.png",'',array('width'=>15,'height'=>18));       
                                            echo '</div>';

                                            echo '<div class="pedazo"> ';
                                                                 echo '          '.Yii::app()->user->name.'           ';       
                                            echo '</div>';
                            echo '</div>';

                            echo '<div class="horizontal">';
                                            echo '<div class="pedazito"> ';
                                                        echo CHtml::image($this->ruta."/Processes.png",'',array('width'=>15,'height'=>18)); 
                                            echo '</div>';
                                            echo '<div class="pedazo"> ';
                                                        echo ' Panel';       
                                             echo '</div>';
                            echo '</div>';
                          /*  echo '<div class="horizontal">';
                                            echo '<div class="pedazito"> ';
                                                        echo CHtml::image($this->ruta."/file.png",'',array('width'=>15,'height'=>11)); 
                                            echo '</div>';
                                            echo '<div class="pedazo"> ';
                                                        echo ' (0) Documentos';       
                                             echo '</div>';
                            echo '</div>';
                            echo '<div class="horizontal">';
                                            echo '<div class="pedazito"> ';
                                                        echo CHtml::image($this->ruta."/file.png",'',array('width'=>15,'height'=>11)); 
                                            echo '</div>';
                                            echo '<div class="pedazo"> ';
                                                        echo CHtml::link('Salir',Yii::app()->user->ui->logoutUrl);          
                                             echo '</div>';
                            echo '</div>';*/




                            
        echo '</div>';
                                    } else { //EN CASO DE QUE NO ESTE LOGUEADO



                     echo '<div class="division3">';   

                     echo '<div class="horizontal">'   ;
                                            echo '<div class="pedazito"> ';
                                                         echo CHtml::image($this->ruta."/llave.png",'',array('width'=>20,'height'=>15));       
                                            echo '</div>';

                                            echo '<div class="pedazo"> ';
                                                                  echo CHtml::link('Ingresar',Yii::app()->user->ui->loginUrl);       
                                            echo '</div>';
                            echo '</div>';  
                       
                     echo '</div>';



                                    }


    }



}