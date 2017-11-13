<?php
$nombrecompleto=$foto['archivo'];
//$extension=strtolower(trim(strrev(substr(strrev($nombrecompleto),0,3))));
?>
<li class="<?php echo $this->tema_li;?>" 
  data-responsive="
  <?php echo $nombrecompleto;?> 375,
  <?php echo $nombrecompleto;?> 480,
  <?php echo $nombrecompleto;?> 800" 

   data-src="<?php echo $nombrecompleto;?>"
  data-sub-html="<h4><?php echo $this->titulo;?></h4><p>
  <?php 
  echo $this->mensajegeneral." <br><form>";
   echo CHtml::textField("sw", "sw3",array("size"=>34));
   echo "</form>";
  echo $foto['metadatos'];
  //VAR_DUMP($foto['metadatos']);
 
  ?>
  </p>" 
data-pinterest-text="Pin it1" 
 data-tweet-text="share on twitter 1">
    
  <?php
    if($this->esimagen()){
    ?>
    
   <a href=<?php echo($this->modo==3)?
   yii::app()->createUrl($this->rutadefault,
           array('fotos'=>base64_encode(serialize($this->fotos)),
               'titulo'=>$this->titulo,
               'mensajegeneral'=>$this->mensajegeneral)           
           ) :"";?>  
      <?php echo($this->modo==3)?"target=\"_blank\"":""; ?>
      >
      <img class="img-responsive" src="<?php echo $nombrecompleto;?>" alt="Thumb-1">
   </a>
   <?php
    }else{
    ?>
     <a href=<?php 
   echo $nombrecompleto ;?>  
      <?php echo "target=\"_blank\""; ?>
      >
      <img class="img-responsive" src="<?php echo $this->ruta.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$extension.".png";?>" alt="Thumb-1">
   </a>
    <?php
    }
    ?>
    
</li>