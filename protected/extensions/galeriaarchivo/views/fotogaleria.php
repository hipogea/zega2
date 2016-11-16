<?php
$nombrecompleto=$foto['archivo'];
//$extension=strtolower(trim(strrev(substr(strrev($nombrecompleto),0,3))));
?>
<li class="<?php echo $this->tema_li;?>"   
  data-sub-html="<h4>
      <?php echo $this->titulo;?>
  </h4>
  <p>
  <?php 
  echo $this->mensajegeneral."<br>";
  echo $foto['metadatos'];
  ?>
  </p>"     
  <?php
    if($this->esimagen()){
    ?>    
   <a href=<?php echo "";   ?> >
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