<?php




?>
<div class="subtitulo">
    Presentación
</div>
<p><div class='margenimg-left'><?php
    echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/helpimg/nube.png','',array('width'=>100,'height'=>100));
    ?></div>Gracias por usar Nautilus Solver; un software pensado para la mediana Industria. Al usar Nautilus, descubrirá
pronto su filosofía:  Una alta personalización y  reglas de negocio compatibles con modelos de procesos diseñados
bajo las mejores prácticas.  Al ser una aplicación de tecnología web, integra con mucha facilidad los servicios
estándar de la Internet como el correo electrónico, administración de archivos e imágenes. Asimismo el mantenimiento y
las actualizaciones son una tarea extremadamente sencillas puesto que no necesita instalar nada en las PCs usuarias; ya no debe de preocuparnos el sistema operativo que usemos y tampoco los dispositivos
con los que acccedemos al sistema: Desde Servidores a celulares; donde enecuntre un navegador conectado; usted podrá
acceder a Nautilus.<br>

<div class="subtitulo">
    ¿Porqué Nautilus?
</div>
Está inspirado en el Nautilo, una especie marina con un diseño de vida y adaptabilidad  extraordinarios; desde el rigurosos y profundo diseño
matemático de su involuta, hasta la compleja forma de navegar, adaptándose a las diversas presiones de las profundidades marinas, es entonces
una de las mejores alegorías para representar a la aplicación.
<br>
</p>

<div class="subtitulo">
    Arquitectura y diseño
</div>
La aplicación sigue la filosofía del diseño de capas; separando para  ello los datos, las operaciones y comandos, las vistas y el diseño y por último
las reglas del negocio.
<br>

En la <I><B>capa de datos</B></I> nos encontramos con el motor de datos; usando para esto cualquiera de los productos del mercado, sea de software libre o
bajo licencia. De este modo se puede migarar entre unao y otro proucto según elección:

<li>
    PostgreSql
</li>
<li>
    MySql
</li>
<li>
    Oracle
</li>
<li>
    DB2
</li>





La  <I><B>capa de diseño</B></I> integra  los recursos de presentación y el aspecto visual de toda la aplicación, estos recursos
son administrados por hojas de estilo y repositorios de imágenes e íconos. Aunque el sistema trae un tema por defecto, si los ususarios
lo desean pueden construir su propio tema.


En la<I><B>capa de operaciones</B></I> Nautilus administra las distintas solicitudes y URLs que los usuarios efectúan siguiendo las
opciones dentro del sistema y ejecutando la lógica de las diversas funciones del código fuente. De igual manera la <I><B>capa de
       reglas de negocio </B></I> garantizan la consistencia de la información almacenada y las restricciones que se deben de tomar
en cuenta al ejecutar los comandos en la capa de operaciones.<br>

Nautilus cuenta con  2 módulos funcionales :
<LI><I><B>Gestión de Materiales  e Inventarios</B></I></LI>

<LI><I><B>Gestión de Ventas de servicios</B></I></LI>









</p>




