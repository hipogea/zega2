<?php
$this->widget('application.extensions.gallery.EGallery',
        array('path' => yii::app()->baseUrl.'/carpeta',
            'createThumbnails'=>false
            )
    );

?>