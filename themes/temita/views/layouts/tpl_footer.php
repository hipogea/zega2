<?php $logh= is_array(Yii::app()->user->loginUrl)?Yii::app()->user->loginUrl[0]:Yii::app()->user->loginUrl;

if(!stripos(Yii::app()->request->getUrl() ,$logh)!==false)
{
    ?>




<footer>
        <div class="subnav navbar navbar-fixed-bottom">
            <div class="navbar-inner">
                <div class="container">
                    Desarrollado por Neotegnia Consultores SAC ®  <a href="http://www.neotegnia.com" target="_new">www.neotegnia.com</a>. Derechos reservados.<br /><small> El diseño y las fuentes son Propiedad Intelectual
                    de Neotegnia, según registro INDECOPI : RPI3455678 </small>
                </div>
            </div>
        </div>      
	</footer>

<?php }?>