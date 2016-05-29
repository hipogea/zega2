
<div class="subtitulo">
   3.1 Widgets
</div>
<p>Son objetos del sisitema que permiten efectuar una determinada operación y aparecen de menra recurrente
    en todas las interfaces de usuario como ventanas de diálogo y formularios : <br><br>
<div class='margenimg-right'><?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/pantallazo.png','',array('width'=>400,'height'=>300));
    ?></div><div class='margenimg-left'><?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/login.png','',array('width'=>400,'height'=>300));
    ?></div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<li>
    <div class="subtitulo">
         Barra de Menú
    </div>
    Contiene las opciones generales para acceder a las funciones del sistema
    <br>
    <?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/menuprincipal.png','',array('width'=>600,'height'=>300));
    ?>
</li>


<li>
    <div class="subtitulo">
        Menú de sub opciones
    </div>
    Es una zona que contiene la lista de enlaces con diversas sub opciones para cada opción del Menú de la barra principal, es una buena costumbre como usuario inicial explorar
    estas opciones que ofrece el sistema.<br>
   <?php
        echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/opciones.png','',array('width'=>200,'height'=>200));
        ?>
    <br>
</li>


<li>
    <div class="subtitulo">
        Panel de usuario
    </div>

    Ofrece las opciones para la sesión de usuario iniciada. Encontramos la lista de enlaces favoritos (Atajos),
    el repositorio maletín para almacenar documentos durante la sesión, definicion de listados de materiales, una lista
    de bloqueos realizadas por la sesión actual,  personalización de documentos, mensajes en el tablón y un timer para
    el tiempo de expiración de sesión.
    <br>
    <?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/panelusuario.png','',array('width'=>200,'height'=>500));
    ?>
    <br><br><br>
</li>


<li>
    <div "id"="3.1",class="subtitulo">
        Panel de control
    </div>

    Son las opciones más sensibles del sistema y de acuerdo a configuración pueden o no estar disponibles para
    todos los usuarios, según los roles  que se definan. Dentro de esta opción encontramos los datos base del sistema
    y las opciones de configuración general, además de la administración de las cuentas de usuario y la gestión de acceso
    definiendo los roles y perfiles de determinados grupos de usuario.  POr último la opción de gestionar la base de datos: Backups,
    mantenimiento y restablecimieto de la misma.
    <br>
    <?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/paneladmin.png','',array('width'=>200,'height'=>500));
    ?>
    <br><br><br>
</li>



<li>
    <div class="subtitulo">
        Tablón público
    </div>

  Es un pizarrón de avisos en general, almacena información útil y de interés general. Su administración se realiza  mediante
    un usuario registrado (Elegido por configuración), quien se hará cargo de larevisión y posteriro publicación de los mismos.
    <br>
    <?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/tablon.png','',array('width'=>700,'height'=>500));
    ?>
    <br><br><br>
</li>

<li>
    <div class="subtitulo">
        Indicadores
    </div>

    En esta zona aparecen gráfios de los indincadores predefinidos
    <br>
    <?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/kpis.png','',array('width'=>450,'height'=>200));
    ?>
    <br><br><br>
</li>






