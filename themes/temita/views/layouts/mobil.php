<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="de" />
    
  <?php
  $urltema = Yii::app()->theme->baseUrl;
  //var_dump($urltema);die();
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($urltema.'/css/gatito.min.css');
     $cs->registerCssFile($urltema.'/css/jquery.mobile.icons.min.css');
    ?>
  
  
  
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
    
</head>
<body>
   <?php
   $this->widget('ext.multilevelverticalmenu.MultilevelVerticalMenu',
array(
"menu"=>array(
  array("url"=>"",
               "label"=>"Mantto Aut",
          array("url"=>array(
                       "route"=>"/operadores/operaPlanes/revisaPendientes"),
                       "label"=>"Ver Pendientes",),
          array("url"=>array(
                      "route"=>"/operadores/operaPlanes/checkPlanMot"),
                      "label"=>"Ver plan",),
          array("url"=>"",
                       "label"=>"View Products",
                                array("url"=>array(
                                        "route"=>"/product/show",
                                        "params"=>array("id"=>3),
                                        "htmlOptions"=>array("title"=>"title")),
                                        "label"=>"Product 3"
                                    ),
                                    array("url"=>"",
                                        "label"=>"Product 4",
                                         array("url"=>array(
                                         "route"=>"/product/show",
                                        "params"=>array("id"=>5)),
                                        "label"=>"Product 5")
                                        )
                 )
      ),
     array("url"=>array(
                       "route"=>"/event/create"),
                       "label"=>"Sales"
       ),
      array("url"=>array(
                       "route"=>"/event/create"),
                       "label"=>"Extensions",
                       "visible"=>false
        ),
      array("url"=>array(),
                       "label"=>"Documentation",
                    array("url"=>array(
                           "link"=>"http://www.yiiframework.com",
                           "htmlOptions"=>array("target"=>"_BLANK")),
                           "label"=>"Yii Framework"
                        ),
                    array("url"=>"",
                             "label"=>"Clothes",
                                array("url"=>array(
                                            "route"=>"/product/men",
                                            "params"=>array("id"=>3),
                                            "htmlOptions"=>array("title"=>"title")),
                                            "label"=>"Men"
                                    ),
                                array("url"=>"",
                                            "label"=>"Women",
                                            array("url"=>array(
                                                 "route"=>"/product/scarves",
                                                "params"=>array("id"=>5)),
                                                   "label"=>"Scarves")
                                    )
                        ),
                      array("url"=>array(
                           "route"=>"site/menuDoc"),
                           "label"=>"Disabled Link",
                           "disabled"=>true),
                            )
          ),
    "transition" => 1 // To choose between 1,2,3,4 and 5. 
)
);
?>
 

<div id="page">
   
    <?php echo $content; ?>
</body>
</html>