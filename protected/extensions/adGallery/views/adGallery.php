<div class="<?php echo $this->cssClass; ?>" id="<?php echo $this->cssId; ?>">
   hola 1
    <div class="ad-gallery">
         hola 2
       <div class="ad-image-wrapper">
           hola 3
	</div>
               <div class="ad-controls">
                   
                 hola 4
		</div>
		<div class="ad-nav">
                    hola 5
                  <div class="ad-thumbs">
                      hola 6
                    <ul class="ad-thumb-list">
                         <?php
                             foreach ($imageList as $image) :
                                        if(is_array($image)) {
                                                            //Make sure we have at least an image_url if detailed setup was used
                                             if(!isset($image['image_url'])) {
                                                                                throw new Exception("If you use the detailed image format, you must at least set the 'image_url' for each image.");
                                                                            }		
			
			//Set info according to what was passed
                                                              $agTitle = isset($image['title']) ? $image['title'] : '' ;
                                                               $agAlt = isset($image['alt']) ? $image['alt'] : '' ;
                                                                $agLink = isset($image['link']) ? $image['link'] : '' ;
                                                                 $agImageUrl = $image['image_url'];
                                                                  $agThumbUrl = isset($image['thumb_url']) ? $image['thumb_url'] : $agImageUrl ;
                                                  } else {
			//Set up gallery with just image urls
                                                               $agTitle = '';
                                                                 $agLink = '';
                                                                  $agAlt = '';
                                                                   $agImageUrl = $image;
                                                                   $agThumbUrl = $image;
                                                           }
                                                                                ?>
				<li>
                                    <a href="<?php echo $agImageUrl; ?>">
                                        <img src="<?php echo $agThumbUrl; ?>" 
                                             longdesc="<?php echo $agLink; ?>" 
                                             alt="<?php echo $agAlt; ?>" 
                                             title="<?php echo $agTitle; ?>" />
                                    </a>
                                </li>
                            <?php
                            endforeach;
                            ?>
			</ul>
                    </div>
		</div>
	</div>
</div>