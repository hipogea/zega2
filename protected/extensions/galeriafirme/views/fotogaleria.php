<?php
$nombrecompleto=$foto['archivo'];
?>
<li class="<?php echo $this->tema_li;?>" 
  data-responsive="
  <?php echo $nombrecompleto;?> 375,
  <?php echo $nombrecompleto;?> 480,
  <?php echo $nombrecompleto;?> 800" 

   data-src="<?php echo $nombrecompleto;?>"
  data-sub-html="<h4><?php echo $this->titulo;?></h4><p>
  <?php 
  echo $this->mensajegeneral."<br>";
  echo $foto['metadatos'];
  ?>
  </p>" 
data-pinterest-text="Pin it1" 
 data-tweet-text="share on twitter 1">
    
    
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
   
    
</li>