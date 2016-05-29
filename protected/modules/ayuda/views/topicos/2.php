
<div class="subtitulo">
   2 Conceptos preliminares
</div>
<p>Nautilus Solver, como muchas otras soluciones, maneja ciertos objetos simulando funciones reales, antes de
    usar la aplicación y sin tener experiencia previa es importante repasar este tópico, pues a partir de estas definiciones
    se explicarán la totalidad de las funciones:

    <br>

<div class="subtitulo">
    2.1 Documentos y estados
</div>
Cualquier registro de datos de importancia se denomina documento, por ejemplo una solicitud de materiales, una factura
o una boleta de pago. De lamisma manera a través de la plaicación se define estos estados para cada uno de estos documentos;
a partir de estos cambios  se establecen reglas y restricciones; estos cambios de estados el sistema los realiza de manera automática o
permite al usuario colocarlos en ciertos casos, siempre preservando la consistencia de las opercaiones.

<br><br>
El sistema permite crear, editar y modificar documentos sin embargo protege el proceso de edición mediante bloqueos
evitando de este modo la edición simultánea del mismo. Esto se verá en detalle en el tópico
<?php
eCHO CHtml::link("Seguridad y gestíon de usuarios",yii::app()->createUrl("site/cargayuda/7"));
?>



