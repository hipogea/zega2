body {
font-family:Arial, Helvetica, sans-serif;
font-size:0.75em;
margin: 0;
padding: 0;
color:#777;
}

body.landing {background-color: #FFFFFF;}

UL,LI{margin: 0;padding: 0;list-style: none;}
UL LI{padding: 0 0 10px 0;}
P{margin: 0; padding: 10px 0 5px 0;line-height:1.4;}
A{text-decoration: none;}
P A{
text-decoration: underline;
color: #507990;
}

P A:hover{
color: #c9c9c9;
}

H1{font-size:100%;color: #8BA920;margin: 0;padding: 0 0 5px 0;}
H2{font-size:170%;color: #507990;margin: 0;padding: 0 0 5px 0;font-weight: normal;clear: both;}
H3{font-size:140%;color: #507990;margin: 0;padding: 0 0 5px 0;font-weight: bold;clear: both;}
H4{font-size:100%;color: #507990;margin: 0;padding: 0;font-weight: bold;clear: both;}



.itemcasoexito H2{font-size:140%;color: #507990;margin: 0;padding: 0 0 5px 0;font-weight: bold;clear: both;}
.datoscliente H2{font-size:140%;color: #507990;margin: 0;padding: 0 0 5px 0;font-weight: bold;clear: both;}

IMG{border:none;}

CITE{
background:url(images/comillascita.gif) no-repeat 0 0;
padding-left:34px;
display:block;
color:#777;
}

CITE STRONG{
color:#507990;
}

.volver A{
background: url(images/flechaazulatras.gif) no-repeat 0 5px;
clear: both;
margin:0;
float:right;
color:#507990;
text-decoration:underline;
font-size:90%;
padding:0 5px 0 6px;
font-weight:bold;
}

.volver A:hover{
color:#8AB100;
}
.contenidoprincipalhome H1{color: #464745;}
.contenidoprincipalhome H2{color: #FFFFFF;}


/******************DESPLEGABLES**********************************/


UL.seleccion{
float:right;
list-style: none !important;
list-style-image:none !important;
}
UL.seleccion li{

list-style: none !important;
list-style-image:none !important;
}
UL.seleccion LI A{

color:#FFF;
padding-right:12px;
bottom:12px;
left:10px;
font-size: 90%;

}

UL.seleccion LI A:hover{
color:#FFB300;
}

UL.listaidiomas{
margin-top:0;
float:left;
width:140px;
border:1px solid #ededed;
background-color:#fafaf7;
display:none;
z-index:100;
position:absolute;
right:0;
top:20px;
padding-bottom:10px;

}

UL.listaidiomas LI{
padding: 0 10px 2px 5px;
text-align:right;
}
UL.listaidiomas LI.primero{padding-top:5px;}
UL.listaidiomas LI.ultimo{padding-bottom:5px;}

UL.listaidiomas LI A{
width:100%;
color:#507990;
font-size:11px;
padding-left:5px;
margin:2px 0 2px 0;
}

UL.listaidiomas LI A:hover{
color:#666;
}





UL.listapaisesD{
margin-top:16px;
float:left;
width:130px;
background-color:#fafaf7;
border:1px solid #ededed;
display:none;
z-index:100;
position:absolute;
left:245px;
top:10px;
padding:5px 0 10px 0;
border:1px solid #ddd;
}

UL.listapaisesD LI{
padding: 0 12px 2px 5px;
text-align:left;
}

UL.listapaisesD LI.primero{padding-top:5px;}
UL.listapaisesD LI.ultimo{padding-bottom:5px;}

UL.listapaisesD LI A{
width:100%;
color:#507990;
font-size:11px;
padding-left:5px;
}

UL.listapaisesD LI A:hover{
color:#666;
}


/*PREHOME------------------------------------------*/


.premarcoprehome{
background: url(images/fondo_prehome_repeater.jpg) repeat-x 0 0;
width: 100%;
height: 831px;
}

.marcoprehome{
background: url(images/fondo_prehome.jpg) no-repeat 50% 0;
width: 100%;
height: 831px;
}

.marcoprehome .contenidoprincipal{
width: 980px;
height: 831px;
margin: 0 auto;
position: relative;
}

.marcoprehome .contenidoprincipal .listapaises{
background: url(images/fondo_listapaises.png);
position: absolute;
width: 150px;
top: 200px;
left: 660px;
padding: 30px 20px;
}

.marcoprehome .contenidoprincipal .listapaises STRONG{
color: #ccd7d8;
font-size: 90%;
}

.marcoprehome .contenidoprincipal .listapaises UL,
.marcoprehome .contenidoprincipal .listapaises UL LI{
width: 150px;
overflow: hidden;
padding-bottom: 5px;
}


.marcoprehome .contenidoprincipal .listapaises UL LI A{
color: #f7faf4;
border-bottom: 1px solid #85929b;
display: block;
float: left;
}

.marcoprehome .contenidoprincipal .listapaises UL LI A:hover{
color: #ccc;
}

.marcopieprehome{
background: url(images/fondo_prehome_repeater_footer.jpg) repeat-x 0 0;
width: 100%;
height: 248px;
}

.marcopieprehome .pieprehome{
height: 248px;
margin: 0 auto;
position: relative;
padding: 0 20px;
overflow: hidden;
width: 960px;
}

.marcopieprehome .pieprehome .direccion{
padding-top: 20px;
width: 500px;
float: left;
}

.marcopieprehome .pieprehome .direccion SPAN{
font-size: 160%;
}

.marcopieprehome .pieprehome .direccion A{
border-bottom: 1px solid #b5bbbb;
color: #464745;
}

.marcopieprehome .pieprehome .direccion A:hover{
color: #666;
}

.marcopieprehome .pieprehome A.vinculoedicom{
color: #464745;
font-size: 180%;
position: relative;
top: 100px;
background: url(images/flecha01.gif) no-repeat 100% 50%;
padding-right: 15px;
border-bottom: 1px solid #b5bbbb;
}

.marcopieprehome .pieprehome A.vinculoedicom:hover{
color: #666;
}



/*CABECERA------------------------------------------*/

.marcoheader{
width: 100%;
height: 110px;
/*background: #fafaf7 url(images/fondo_cabecerasuperiorheader.gif) repeat-x 0 0;*/
position:relative;
z-index:100;
background:#FAFAF7;
}

.marcoheader .header{
width: 980px;
height: 168px;
/*overflow: hidden;*/
margin: 0 auto;
position:relative;
}

.marcoheader .header .superiorheader{
height: 40px;
position:relative;
top:0;
/*overflow: hidden;*/
}

.marcoheader .header .superiorheader UL.accesosdirectos{
float: left;
overflow: hidden;
padding-top: 5px;
}

.marcoheader .header .superiorheader UL.accesosdirectos LI{
float: left;
margin-right: 10px;
padding-right: 10px;
/* border-right: 1px solid #fff;*/

}

.marcoheader .header .superiorheader UL.accesosdirectos LI.ultimo{
border-right: none;
}

.marcoheader .header .superiorheader UL.accesosdirectos LI A{
color:#9c9c9c;
font-size: 90%;
display: block;
float: left;
text-decoration:none !important;

}

.marcoheader .header .superiorheader .buscador{
float: right;
background: url(images/fondo_buscadorsuperior.gif) no-repeat 0 3px;
padding-top: 5px;
position:relative;
}

.marcoheader .header .superiorheader .buscador LABEL{
display: none;
}


.marcoheader .header .superiorheader .buscador .cajabuscador{
width: 150px;
background-color: transparent;
border: 0;
color: #b3b4b0;
padding: 0 0 0 10px;
font-family:Arial, Helvetica, sans-serif;
font-size:11px;
}

.marcoheader .header .superiorheader .buscador .cajabuscador,
.marcoheader .header .superiorheader .buscador IMG,
.marcoheader .header .superiorheader .buscador A{
float: left;

}

.marcoheader .header .superiorheader .buscador IMG{
position:relative;
top:-2px;
}

.marcoheader .header .superiorheader .buscador A.busquedas{
color: #9c9c9c;
background: url(images/flecha02.gif) no-repeat 100% 50%;
font-size:90%;
padding: 0 10px 0 0;
margin-left: 20px;
text-decoration: none;
}

.marcoheader .header .superiorheader .buscador A.busquedas:hover{
color: #666;
}

.marcoheader .header .principalheader{
height: 80px;
/*overflow: hidden;*/
position:relative;
float:right;
}

.marcoheader .header .logo{
float: left;
margin-top:55px;
position:absolute;
}

.marcoheader .header .logo IMG,
.marcoheader .header .logo .pais{
float: left;
overflow: hidden;

}
.marcoheader .header .logo IMG{
position: relative;
top: -40px;

}
.marcoheader .header .logo .pais{
position: relative;
left: 5px;
top: 5px;
background-color: #5086a2;
}

.marcoheader .header .logo .pais IMG,
.marcoheader .header .logo .pais A{
float: left;
}

.marcoheader .header .logo .pais A{
color:#fff;
background: url(images/flecha03.gif) no-repeat 100% 50%;
padding: 3px 20px 0 10px;
font-family: eurostyle;
font-size: 16px;
}

.marcoheader .header .principalheader UL.level0{
float: right;
position: relative;
top: 35px;
*z-index:-1;
}

.marcoheader .header .principalheader UL.level0 LI{
float:left;
margin-left: 0;
padding-top: 3px;

}

.marcoheader .header .principalheader UL.level0 A{
font-family: eurostyle;
color: #808080;
text-decoration: underline;
font-size: 16px;
padding: 3px 12px 3px 8px;
margin-left: 7px;

}

.marcoheader .header .principalheader UL.level0 li.active A,
.marcoheader .header .principalheader UL.level0 li.trail A{

/*font-weight:bold;*/
background:  url(images/fondo_botonmenu_il.gif) no-repeat 100% 0;
text-decoration: none;
color: #FFF;
}

.marcoheader .header .principalheader UL.level0 li.active,
.marcoheader .header .principalheader UL.level0 li.trail{
background:  url(images/tapa_botonmenu_il.gif) no-repeat 0 0;
padding-top: 3px;
}

/*INDEX------------------------------------------------*/


/*---------------------------------------CARRUSEL HOME*/


.contenedorcarrusel
{
width:100%;
height:212px;
position: relative;
/*background:url(images/cabeceramundo.jpg) no-repeat center center;*/
}

.america
{
/*background:url(images/cabeceramundo2.jpg) no-repeat center center !important;*/
}


.contenedorcarrusel #laimagen
{
width:100%;
height:212px;

}

.contenedorcarrusel #laimagen #elenlace
{
width:980px;
height:212px;
margin:0 auto;
position:relative;
}

.contenedorcarrusel #laimagen #elenlace #url
{
width:600px;
height:140px;
position:absolute;
top:70px;
left:20px;
}

/*
.contenedorcarrusel #laimagen #elenlace #url:hover
{
border:1px solid #507990;
}
*/

.contenedorcarrusel A{
width:31px;
height:212px;
display:block;
}

.contenedorcarrusel A SPAN{
display:none;
}

.contenedorcarrusel A.flechaizquierda{
background:url(images/flechaizda.png) no-repeat center center;
position: absolute;
left: 0;
top: 0;
}

.contenedorcarrusel A.flechaderecha{
background:url(images/flechadcha.png) no-repeat center center;
position: absolute;
right: 0;
top: 0;
}

#script{
/*background:  url(images/cabecerahome.jpg) no-repeat center center;*/
width: 100%;
height: 212px;
text-align:center;
/*z-index: 2;
position: relative;*/
}
#diapo{
background: #fafaf7 url(images/fondo_motivohome.jpg) repeat-x 0 100%;
width: 100%;
height: 212px;
/*z-index: 2;
position: relative;*/
}

/***************/
.marcocontenidoprincipalhome{
/*background: #06315a url(images/fondo_home.jpg) repeat-x left top;*/
width: 100%;
/*margin-top: -9px;
z-index: 1;
position: relative;*/
}

.marcocontenidoprincipalhome .contenidoprincipalhome{
width: 940px;
padding: 20px 0 20px 20px;
margin: 0 auto;
color: #666666;
overflow: hidden;
}

.marcocontenidoprincipalhome .contenidoprincipalhome h1{display:none;}

.marcocontenidoprincipalhome .contenidoprincipalhome IMG.imagenindex{margin-bottom: 15px;}



.marcocontenidoprincipalhome .contenidoprincipalhome .columna01{
width: 239px;
float:left;
border-right: 1px solid #b8c3c6;
position: relative;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 P{
/*padding:0 20px 0 0;*/
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .tapasuperior{
background: url(images/fondo_separadorlateral01superior.jpg) no-repeat 0 0;
width: 2px;
height: 128px;
position: absolute;
top: 0;
right: -1px;
display: none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .tapainferior{
background: url(images/fondo_separadorlateral01inferior.jpg) no-repeat 0 0;
width: 2px;
height: 128px;
position: absolute;
bottom: 0;
right: -1px;
display: none;
}



.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 A{
color: #507990;
display: block;
float: left;
text-decoration:underline;
}

.marcocontenidoprincipalhome .contenidoprincipalhome H2,
.marcocontenidoprincipalhome .contenidoprincipalhome H2 A,
.marcocontenidoprincipalhome .contenidoprincipalhome H3 {
color: #507990;
border-bottom: none !important;
float: none;
display: block;
font-size: 160%;
font-style: normal !important;
font-family:'Lato',sans-serif;
clear: both;
margin-bottom: 5px;
font-weight: normal;
}

.marcocontenidoprincipalhome .contenidoprincipalhome  A{
color: #507990;
text-decoration: underline;

}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 P{
padding-top: 0;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 P A{
color: #507990;
float: none;
text-decoration:underline;
display: inline;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .separador01{
width: 239px;
height: 2px;
border-bottom:1px solid #CCCCCC;
margin-bottom: 15px;
clear: both;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .separadortelefono{
width: 239px;
height: 2px;
background: url(images/fondo_separadortelefono.jpg) no-repeat left center;
clear: both;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .telefono{
text-align: center;
font-size: 120%;
color:#c7d2df;
font-family: 'Lato';
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .telefono SPAN{
font-size: 180%;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .telefono P{
padding:5px 0;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 A.vinculoformulario{
float:none;
display: inline;

}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna02{
width: 420px;
float:left;
padding: 0 20px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna02 H2{
display: block;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna02 UL{
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna02 UL LI{
margin-bottom: 5px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna02 UL LI A{
color: #507990;
text-decoration: underline;

}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03{
width: 215px;
float:left;
position: relative;
border-left: 1px solid #b8c3c6;
padding-left:20px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 .tapasuperior{
background: url(images/fondo_separadorlateral01superior.jpg) no-repeat 0 0;
width: 2px;
height: 128px;
position: absolute;
top: 0;
left: -2px;
display:none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 .tapainferior{
background: url(images/fondo_separadorlateral01inferior.jpg) no-repeat 0 0;
width: 2px;
height: 128px;
position: absolute;
bottom: 0;
left: -2px;
display:none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 A.vinculotodasnoticias{
color: #fff;
text-decoration: underline;
}


.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 P.fecha{
color: #fff;
font-size: 90%;
padding-bottom: 5px;
padding-top: 0;
}
.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 .separadorvacio{
height: 5px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 A.vinculotitulonoticia{
color: #FFF;
border-bottom: 1px solid #96a4ad;
font-weight: bold;
clear: both;
display: block;
float: left;
}


.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 .separador02{
width: 215px;
height: 2px;
background: url(images/fondo_separador02.jpg) no-repeat right center;
margin-bottom: 15px;
clear: both;
position:relative;
left:-20px;
display:none;
}
/**********/

/*****FORMULARIO NEWSLETTER HOME*****/
.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform{
width: 215px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 .formulariosuscripcion P{
padding-top: 0;
width: 215px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform LABEL{
display: none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .cajasuscripcion{
/*background: url(images/fondo_buscadorinferior.png) no-repeat 0 0;*/
width: 209px;
height: 22px;
border:1px solid #9badb7;
background-color: #fff;
color: #507990;
padding: 0 3px;
}
.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .elijapais{
background-color: #9badb7;
width: 215px;
height: 22px;
border:none;
margin-bottom: 10px;
border:1px solid #9badb7;
background-color: #fff;
color: #507990;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .lineaacepto{
margin-top: 10px;
font-size: 85%;
overflow: hidden;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .lineaacepto LABEL{
display: block;
float: left;
position:relative;
top:2px;
}
.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .lineaacepto INPUT{
float: left;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .lineaacepto A{
color: #507990;
text-decoration: underline;
}


.marcocontenidoprincipalhome .contenidoprincipalhome .columna03 FORM#frontendform .lineaacepto A.botonenviar{
color: #fff;
font-weight: bold;
border-bottom: none;
background: url(images/fondo_botonenviar.png) no-repeat 0 0;
width: 70px;
height: 18px;
display: block;
float: left;
text-align: center;
margin-left: 10px;
padding-top: 2px;
}

/*****FORMULARIO NEWSLETTER COLUMNA*****/
.columnadestacada FORM#frontendform{
width: 215px;
}

.columnadestacada .formulariosuscripcion P{
padding-top: 0;
width: 215px;
}

.columnadestacada FORM#frontendform LABEL{
display: none;
}

.columnadestacada FORM#frontendform .cajasuscripcion{
/*background: url(images/fondo_buscadorinferior.png) no-repeat 0 0;*/
width: 209px;
height: 22px;
border:1px solid #9badb7;
background-color: #fff;
color: #507990;
padding: 0 3px;
}
.columnadestacada FORM#frontendform .elijapais{
background-color: #9badb7;
width: 215px;
height: 22px;
border:none;
margin-bottom: 10px;
border:1px solid #9badb7;
background-color: #fff;
color: #507990;
}

.columnadestacada FORM#frontendform .lineaacepto{
margin-top: 10px;
font-size: 85%;
overflow: hidden;
}

.columnadestacada FORM#frontendform .lineaacepto LABEL{
display: block;
float: left;
position:relative;
top:2px;
}
.columnadestacada FORM#frontendform .lineaacepto INPUT{
float: left;
}

.columnadestacada FORM#frontendform .lineaacepto A{
color: #507990;
text-decoration: underline;
}


.columnadestacada FORM#frontendform .lineaacepto A.botonenviar{
color: #fff;
font-weight: bold;
border-bottom: none;
background: url(images/fondo_botonenviar.png) no-repeat 0 0;
width: 70px;
height: 18px;
display: block;
float: left;
text-align: center;
margin-left: 10px;
padding-top: 2px;
}



/***********************/

.separadorvacio{
width: 100%;
height: 15px;
float: none;
clear: both;
}

.separadorvacio2{
width: 100%;
height: 20px;
float: none;
clear: both;
}


.soluciones_sectores{
width: 420px;
overflow: hidden;
position: relative;
}

.soluciones_sectores .soluciones,
.soluciones_sectores .sectores
{
width: 190px;
float: left;
position: relative;
}


.soluciones_sectores .soluciones
{
padding-right: 10px;
}

.soluciones_sectores .sectores
{
border-left: 1px solid #B8C3C6;
padding-left: 10px;
}

.soluciones_sectores .sectores .tapasuperior {
background: url("images/_fondo_separadorlateral01superior.jpg") no-repeat scroll 0 0 transparent;
height: 108px;
left: -2px;
position: absolute;
top: 0;
width: 2px;
display:none;
}

.soluciones_sectores .sectores .tapainferior {
background: url("images/fondo_separadorlateral01inferior.jpg") no-repeat scroll 0 0 transparent;
bottom: 0;
height: 128px;
left: -2px;
position: absolute;
width: 2px;
display:none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .separadorredes{
width: 239px;
height: 2px;
background: url(images/fondo_separadortelefono.jpg) no-repeat left center;
clear: both;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .redes,
.parrafo_columnadestacada  .redes
{
font-size: 120%;
color:#c7d2df;
margin-top: 10px;
}

.parrafo_columnadestacada  .redes
{
margin-top: 20px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .redes SPAN,
.parrafo_columnadestacada  .redes SPAN{
font-size: 160%;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .redes P,
.parrafo_columnadestacada  .redes P{
padding-top:15px;
float: left;
font-size:11px;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .redes UL,
.parrafo_columnadestacada  .redes UL{
float: left;
list-style: none;
list-style-image:none;
background:none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .redes UL LI,
.parrafo_columnadestacada  .redes UL LI{
float: left;
margin: 0 0 0 5px;
padding-top: 5px;
list-style: none;
list-style-image:none;
background:none;
}

.marcocontenidoprincipalhome .contenidoprincipalhome .columna01 .redes UL LI A,
.parrafo_columnadestacada  .redes UL LI A{
border-bottom: none;
border-bottom: 0px;
}

/*PIE------------------------------------------------*/

.marcopiegeneral{
width: 100%;
height: 100%;
}

.marcopiegeneral .marcopiesuperior{
width: 100%;
height: 100%;
background: #f8f8f0 url(images/fondo_mapaweb.jpg) repeat-x 0 0;
}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion{
width: 960px;
padding: 20px 0 20px 20px;
margin: 0 auto;
overflow: hidden;
font-size: 85%;
}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI{
float: left;
width: 147px;
margin-right: 10px;
}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI.ultimo{padding-right: 0}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI A{
/*background: url(images/fondo_principalmapaweb.jpg) no-repeat 0 0;*/
width: 137px;
display: block;
float: left;
color: #9C9C9C;
padding: 3px 5px;
font-weight:bold;
font-size:105%;
}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI.ultimo A{display: none;}


.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI UL LI{
width: 147px;
margin-right: 0;
padding-bottom:0;
}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI UL LI A{
background: none;
font-weight:normal;

}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI UL LI A:hover{color: #AAA;}

.marcopiegeneral .marcopiesuperior UL.mapanavegacion LI.ultimo UL LI A{
display: block;
}



.marcopieinferior{
width: 100%;
height: 101px;
background: url(images/fondo_inferiorpie.jpg) repeat-x 0 0;
}

.marcopieinferior .pieinferior{
height: 61px;
width: 980px;
margin: 0 auto;
color: #758da1;
overflow: hidden;
padding-top: 40px;
font-size: 85%;
}

.marcopieinferior .pieinferior A{
color: #bfcad4;
border-bottom: 1px solid #96a4ad;
display: block;
float: left;
}

.marcopieinferior .pieinferior A:hover{
color: #aaa;
}



.marcopieinferior .pieinferior UL.datosweb{
float: left;
overflow: hidden;
}

.marcopieinferior .pieinferior UL.datosweb LI{
float: left;
/* margin-right: 5px;
border-right: 1px solid #96a4ad;
padding-right: 5px;*/
}

.marcopieinferior .pieinferior UL.paises LI.primero,
.marcopieinferior .pieinferior UL.paises LI.ultimo,
.marcopieinferior .pieinferior UL.datosweb LI.primero,
.marcopieinferior .pieinferior UL.datosweb LI.ultimo{border-right: none;}


.marcopieinferior .pieinferior UL.paises{
float: right;
overflow: hidden;
}

.marcopieinferior .pieinferior UL.paises LI{
float: left;
/*margin-right: 5px;
border-right: 1px solid #96a4ad;
padding-right: 5px;*/
}

.marcopieinferior .pieinferior UL.paises LI.primero,
.marcopieinferior .pieinferior UL.datosweb LI.primero{
margin-right:10px;
}

.marcopieinferior .pieinferior UL.paises LI A,
.marcopieinferior .pieinferior UL.datosweb LI A{
float: left;
margin-right: 5px;
border-right: 1px solid #96a4ad;
padding-right: 5px;
border-bottom:none;
text-decoration:underline;
}

/*RECURSOS COMUNES------------------------------------------------*/

H3 A{color:#464745;text-decoration:underline;padding-right:10px;}

H3 A:hover{color:#666;}

.parrafo_columnadestacada,
.fijadorpaginatexto2 .parrafo_columnadestacada,
.fijadorpaginatexto3 .parrafo_columnadestacada{
width:760px;
overflow:hidden;
margin-bottom:20px;
margin-top:10px;
/*border:1px solid red;*/
}

.fijadorpaginatexto2 .parrafo_columnadestacada{margin-bottom:0;}

.parrafo_columnadestacada A{
text-decoration: underline;
color: #507990;
}

.parrafo_columnadestacada A:hover{
color: #c9c9c9;
}


#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .fijadorpaginatexto2 .parrafo_columnadestacada{width:980px;}
#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .fijadorpaginatexto3 .parrafo_columnadestacada{width:980px;}

.parrafo_columnadestacada .parrafo{
width:490px;
float:left;
margin-bottom:-2000px;
padding:0 20px 2000px 0;
}

#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .fijadorpaginatexto2 .parrafo_columnadestacada .parrafo{
width:710px;
float:left;
margin-bottom:-2000px;
padding:0 20px 2000px 0;
}

#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .fijadorpaginatexto3 .parrafo_columnadestacada .parrafo{
width:710px;
float:left;
margin-bottom:0;
padding-bottom:0;
}


.parrafo_columnadestacada .marcocolumnadestacada{
width:200px;
float:left;
margin-bottom:-2000px;
padding: 20px 0 2000px 0px;
color:#507990;
}


/*.fijadorpaginatexto3 .columnadestacada{
width:220px;
float:left;
margin-bottom:0;
padding: 20px 15px 0 15px;
background-color:#e5e9ea;
color:#3a454d;
}*/

.columnadestacada {
width:250px;
float:left;
}

.columnadestacada .logo{
width: 230px;
padding-left:10px;
}

.columnadestacada .otros{
/*background-color: #EFF1F1;*/
color: #507990;
float: right;
margin: 0 0 10px;
padding: 5px 15px 0 20px;
width: 205px;
}

.columnadestacada .otrosLogos{
background-color: #FFF;
color: #507990;
float: right;
margin: 0 0 10px;
padding: 5px 15px 0 20px;
width: 205px;
}

.columnadestacada .otros .logo {
text-align:left;
padding:0;
}


.parrafodestacado{
background-color:#EFF1F1;
width:720px;
padding:5px 20px 20px 20px;
margin-bottom:20px;
}

.textoColumna .parrafodestacado{
width:455px;
}

.parrafodestacado.remarcado{
background-color:#EAF0F4;
}

.parrafo .parrafodestacado{
width:455px;
}

.parrafodestacado A{
color:#3A454D;
text-decoration:underline;
}

.parrafodestacado UL{
padding-top:10px;
}

.columnadestacada UL,
.parrafodestacado UL{
border-bottom:none;
padding-bottom:0;
padding-left:5px;
padding-bottom:10px;
}

.contacto .columnadestacada li {
background: url(images/check.gif) no-repeat 0 0;
padding-left:20px;
color:#507990;
}

.columnadestacada UL LI,
.parrafodestacado UL LI,
.masinfo UL LI{
background: url(images/flechaazul.gif) no-repeat 0 5px;
padding-left:8px;
}

.columnadestacada UL LI A,
.parrafodestacado UL LI A{
color:#507990;
text-decoration:underline;
}

.columnadestacada UL LI A:hover,
.parrafodestacado UL LI A:hover{
color:#3a454d;
}

UL.listamiembros{
width:760px;
overflow:hidden;
margin-bottom:20px;
}

UL.listamiembros LI{
width:220px;
float:left;
overflow:hidden;
margin:0 40px 20px 0;
}

UL.listamiembros LI.ultimo{
margin:0 0 20px 0;

}

UL.listamiembros LI SPAN.nombre{
font-size:110%;
color: #666666;
margin: 0;
font-weight: bold;
clear: both;
display:block;
}

UL.listamiembros LI SPAN.cargo{
font-size:90%;
color: #50859F;
margin: 0;
text-transform: uppercase;
font-weight: bold;
clear: both;
display:block;
}

UL.listamiembros LI SPAN.cargo.equipo{
font-size:90%;
color: #777;
margin: 0;
clear: both;
display:block;
}

UL.listamiembros LI P{
padding:0 0 3px 0;
}


UL.listamiembros LI UL{
width:380px;
overflow:hidden;
margin-top: 5px;
}

UL.listamiembros LI UL LI{
border-bottom:none;
width:auto;
margin:0 10px 0 0;
}

UL.listamiembros LI A{
color:#507990;
text-decoration: underline;
}

UL.listamiembros LI A:hover{
color:#999;
}

.paginadomiembros{
width:688px;
height:18px;
background-color:#245776;
color:#FFF;
font-weight:bold;
text-align:center;
padding: 4px 4px 3px 4px;
}

.paginadomiembros A{
color:#FFF;
border:1px solid #245776;
padding:0 2px 0 2px;
}

.paginadomiembros A.selec,
.paginadomiembros A:hover{
border:1px solid #FFF;
}

/**************/

UL.listadelegaciones{
width:760px;
overflow:hidden;
margin-bottom:20px;
}

UL.listadelegaciones LI{
width:340px;
float:left;
overflow:hidden;
margin:0 20px 20px 0;
}

UL.listadelegaciones LI.ultimo{
margin:0 0 20px 0;

}

UL.listadelegaciones LI SPAN.nombre{
font-size:110%;
color: #666666;
margin: 0;
font-weight: bold;
clear: both;
display:block;
}

UL.listadelegaciones LI SPAN.cargo{
font-size:90%;
color: #50859F;
margin: 0;
text-transform: uppercase;
font-weight: bold;
clear: both;
display:block;
}

UL.listadelegaciones LI SPAN.cargo.equipo{
font-size:90%;
color: #777;
margin: 0;
clear: both;
display:block;
}

UL.listadelegaciones LI P{
padding:0 0 3px 0;
}


UL.listadelegaciones LI UL{
width:380px;
overflow:hidden;
margin-top: 5px;
}

UL.listadelegaciones LI UL LI{
border-bottom:none;
width:auto;
margin:0 10px 0 0;
}

UL.listadelegaciones LI A{
color:#507990;
text-decoration: underline;
}

UL.listadelegaciones LI A:hover{
color:#999;
}




/**************/

.mapaubicacion{
text-align:center;
margin-bottom:15px;
}

.mapaubicacion A.vergoogle{
padding-right:0;
}


.parrafo_masinfo{
width:760px;
overflow:hidden;
margin-bottom:20px;
float:left;
}

.parrafo_masinfo  h1{
font-size:100%;
color: #8BA920;
margin: 0;
padding: 0 0 5px 0;
width:480px;
}

/*.parrafo_masinfo .h2simulado{
font-size:170%;color: #8ab100;margin: 0;padding: 0 0 0 0;font-weight: normal;
}	*/

.parrafo_masinfo h2{

font-size:170%;
color: #507990;
font-weight: normal;
width:480px;
clear:none;
}



.parrafo_masinfo .masinfo{
width:210px;
padding:0 20px 20px 20px;
margin:0 0 10px 0 !important;
/*background-color:#eff1f1;*/
color:#507990;
float:right;
}

.parrafo_masinfo .masinfo.simple P{
padding-bottom:0;
}

.parrafo_masinfo  A{
color:#507990;
text-decoration: underline;
}

.parrafo_masinfo  A:hover{
color:#999;
}

/*-----------------------*/
/*                       */
/* PARRAFO TEXTOIMAGEN   */
/*                       */
/*-----------------------*/

.parrafoimg {

font-size:13px;

position: relative;
text-align: left;
font-weight: normal;
text-decoration: none;
width:100% ;
padding-right:1px;
overflow:hidden;
overflow:hidden;
padding-bottom:10px;
line-height:18px !important;
*z-index: -1!important;

}
.parrafoimg H3  {
font-size: 16px;
color:#000;
font-weight:bold;
}

.parrafoimg  STRONG  {
color:#333;
}

.parrafoimg .contentImageGeneral  {

height:auto;
}

.parrafoimg .imagen_izquierda  {
float:left ;
margin-right: 10px;
margin-bottom: 4px;
padding-right: 7px;
height:100%;
text-align: left;
}

.parrafoimg .imagen_derecha  {
float:right;
padding: 0 0 7px 15px;
margin-bottom:-10px;
text-align: right;
}

.parrafoimg .imagen_centro  {
float:none;
clear: both;
padding: 15px;
margin-bottom:-10px;
text-align: center;
width: auto !important;
}


.parrafoimg .imagen_derecha  IMG{
margin:0!important;
padding:0!important;
}



.parrafoimg .imagen_derecha  IMG,
.parrafoimg .imagen_izquierda IMG{
/*border:4px solid #000;*/
}

.parrafoimg .imagen_izquierda  Img{
text-align:left;
}

.parrafoimg P {
/*text-align: justify;*/
margin: 15px 0 5px 0 !important;
padding : 0 !important;
}

.parrafoimg  Span.piefoto{
display: block;
text-align: justify;
margin: 0!Important;
padding:0!important;
color: #000;
font-size:9px;
line-height:12px !important;
}
.parrafoimg .imagen_centro Span.piefoto{
text-align: center;
}


.parrafoimg  .nada {
background: white;
}

.parrafoimg  .subir  {
color: #aaaaaa !important;
background: white;
padding-right: 15px;
float:right;
}


.parrafoimg .parrafoimgLink  {
color: black !important;
margin-left: 1px;
padding-left: 10px;
padding-right: 15px;
text-decoration:none;
}

.parrafoimg .parrafoimgLink:hover  {
color: #9E1922 !important;
}

.parrafoimg .parrafoimgLink a:hover {
color: #800000 !important;
}


.parrafoimg UL{
border-bottom:none;
padding-bottom:0;
padding-left:10px;
padding-bottom:10px;

}


.parrafoimg UL LI{
background: url("images/flechaazul.gif") no-repeat scroll 0 5px transparent;
padding-left: 8px;

}


.parrafoimg UL LI A{
color: #777;
text-decoration:underline;
}


.parrafoimg UL LI A:hover{
color:#AAA;
}


/*
.parrafoimg  li {
margin:0;
padding:0;
list-style-image:url(../images/estructura/li01.gif) !important;
margin-left:40px !important;
list-style-position:outside !important;
}

.parrafoimg li strong{
color:#333333;
}
*/
.parrafoimg b{
color:#333333;
}

.parrafoimg UL{
margin-bottom:10px !important;
}


.parrafoimg TABLE.certificaciones{
border-collapse: collapse;
border-top: 1px solid #DCDFDF;
margin-top: 10px;
}
.parrafoimg TABLE.certificaciones TD{
border-bottom: 1px solid #DCDFDF;
border-collapse: collapse;
padding: 15px 0;
}

.parrafoimg TABLE.certificaciones.sinlineas{
border-top:none;

}

.parrafoimg TABLE.certificaciones.sinlineas TD{
border-bottom: none;
}

.parrafoimg TABLE.certificaciones TD A{
color:#777;
text-decoration: underline;
}
.parrafoimg TABLE.certificaciones TD A:hover{
color:#AAA;
}

.actualidad TABLE.certificaciones TD H2{
clear: both;
color: #507990;
font-size: 140%;
font-weight: bold;
margin: 0;
padding: 0 0 5px;

}


.actualidad .siestasinteresado{
text-align:center;
font-weight:bold;
color:#507990;
margin-bottom:30px;
height: 100px;
}

.fb_iframe_widget span {
display:block;
}

.actualidad .siestasinteresado A{
text-decoration:none;
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
color: #ffffff;
padding: 20px 30px;
background: -moz-linear-gradient(
top,
#9ccb00 0%,
#9ccb00);
background: -webkit-gradient(
linear, left top, left bottom,
from(#9ccb00),
to(#9ccb00));
-moz-border-radius: 14px;
-webkit-border-radius: 14px;
border-radius: 14px;
border: 0px solid #6d8000;
-moz-box-shadow:
0px 0px 0px rgba(000,000,000,0),
inset 0px 0px 0px rgba(255,255,255,0);
-webkit-box-shadow:
0px 0px 0px rgba(000,000,000,0),
inset 0px 0px 0px rgba(255,255,255,0);
box-shadow:
0px 0px 0px rgba(000,000,000,0),
inset 0px 0px 0px rgba(255,255,255,0);
text-shadow:
0px 0px 0px rgba(000,000,000,0),
0px 0px 0px rgba(255,255,255,0);
}



/***/

/*****MAS PAGINAS******/

UL.maspaginas{
border-bottom:none;
padding-bottom:0;
padding-left:10px;
padding-bottom:10px;

}

UL.maspaginas LI{
background: url("images/flechaazul.gif") no-repeat scroll 0 5px transparent;
padding-left: 8px;

}


UL.maspaginas LI A{
color: #777777;
text-decoration: underline
}


UL.maspaginas  LI A:hover{
color:#AAA;
}

.imagenseccion{
width:100%;
height:137px;
position:relative;

/*background: url(images/fondo_imagenseccion.jpg) no-repeat center center;*/

}

.imagenseccionNoImagen{
width:100%;
height:35px !important;

/*background: url(images/fondo_imagenseccion.jpg) no-repeat center center;*/
}



.prueba{
width:100%;
height:132px;


}


.prueba .contenidoprueba{
width:960px;
height:132px;
margin:0 auto;
line-height:24px;
color:#f1f2ea;
font-size:16px;
font-family: 'Lato', sans-serif;
}

.prueba .contenidoprueba  B,
.prueba .contenidoprueba  STRONG{

font-weight:normal;
color:#c9eb3c;

}

.prueba .contenidoprueba .textoContenidoprueba{
width: 380px;
height: 80px;
padding-top:35px;
}

.prueba .contenidoprueba .textoContenidoprueba P{
display: inline;
}

.prueba .contenidoprueba .textoContenidoprueba A{
color:#c9eb3c;
display: inline;
float: none;
}

.prueba .contenidoprueba .textoContenidoprueba A:hover{
text-decoration: underline;
}

.prueba .pruebainf{
/*background: url(images/cabeceraInf.jpg) repeat-x 4px 1px;*/
background:  #fff url(images/cabeceraInf.jpg) repeat-x 0 0;
height:5px;
width:100%;

}


#contenido{
width:100%;
position:relative;
}

#contenido #contenidoprincipal{
width:980px;
margin:0 auto;
overflow:hidden;
position:relative;
padding-top:5px;
}

body.ampliaactualidad #contenido #contenidoprincipal{
overflow:visible;
}

body.ampliaactualidad #contenido #contenidoprincipal{
overflow:visible;
}

body.ampliaactualidad #contenido #contenidoprincipal .desarrollocontenido{
margin-bottom: 0;
padding-bottom:0;
}

body.ampliaactualidad #contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .fijadorpaginatexto2 .parrafo_columnadestacada .parrafo{margin-bottom:0;padding-bottom:0;}

#contenido #contenidoprincipal .desarrollocontenido{
width:780px;
float:left;
margin-bottom: -30000px;
padding-bottom:30000px;
}


#contenido #contenidoprincipal .desarrollocontenido STRONG{
color:#507990;
}



#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu{width:980px;overflow:hidden;float:none;}

#contenido #contenidoprincipal .desarrollocontenido .fijador,
#contenido #contenidoprincipal .desarrollocontenido .fijadorpaginatexto2,
#contenido #contenidoprincipal .desarrollocontenido .fijadorpaginatexto3{
width:760px;
padding: 0 0 40px 20px;
}


/*#contenido #contenidoprincipal .desarrollocontenido .fijadorpaginatexto2{padding: 0 0 0 20px;}*/

#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .fijadorpaginatexto2{padding-left:0;}

.migapan{
width:760px;
overflow:hidden;
padding:5px 0 5px 20px;
color:#afb1ae;
font-size:85%;
}

#contenido #contenidoprincipal .desarrollocontenido.sinsubmenu .migapan{width:980px}

.migapan SPAN,
.migapan A{
float:left;
font-size:85%;
}

.migapan SPAN{
padding-right:10px;
}

.migapan A{
background: url(images/separadormigapan.gif) no-repeat 100% 50%;
margin-right:5px;
padding-right:5px;
color:#9c9c9c;
text-decoration:underline;
}

.migapan A.on{
background: none;
text-decoration:none;
color:#afb1ae;
}


.parrafoseparado{
padding:10px 0;
}


A.vinculocomun{
text-decoration:underline;
color:#507990;
}

A.vinculotag{
text-decoration:underline;
color:#507990;
font-size:15px;
margin-left:5px;
}

.contenidoprincipalhome  A.vinculocomun{
color:#507990;
}


A.vergoogle{
padding:0 40px 0 20px;
background: url(images/fondo_vinculogooglemaps.jpg) no-repeat 0 50%;
color:#507990;
text-decoration:underline;
}

A.vergoogle.sinicono{
background: none;
}

A.vinculocomun:hover,
A.vergoogle:hover{
color:#aaa;
}

.telefono{
padding: 5px 0 0 25px;
font-size:140%;
font-weight:bold;
color:#507990;
background: url(images/telefono.gif) no-repeat 0 10px;
}



.telefono SPAN{
font-size:150%;
}

.parrafo_masinfo SPAN.destacado{
font-size:115%;
font-weight:bold;
font-style: italic;
}

SPAN.titulo{
font-size:170%;color: #507990;margin: 0;padding: 0 0 0 0;font-weight: normal;
}




.separadorlateral_columnadestacada{

background: url(images/fondo_separadorlateral.gif) repeat-x 0 0;
width:100%;
height:2px;
margin: 15px 0;
}

.columnadestacada A{
text-decoration:underline;
color:#507990;
}

.columnadestacada A:hover{
color: #999999;
}



.separadorcontenido01{
width:100%;
height:20px;
}

H3.conicono{
min-height:30px;
}

H3.conicono.casosexito{background: url(images/ico_casosexito.gif) no-repeat top right;}
H3.conicono.documentacion{background: url(images/ico_documentacionrelacionada.gif) no-repeat top right;}
H3.conicono.noticias{background: url(images/ico_noticias.gif) no-repeat top right;}


H3.conicono.ventajas{background: url(images/ico_principalesventajas.jpg) no-repeat top right; }
H3.conicono.clientesopinan{background: url(images/ico_nuestrosclientesopinan.jpg) no-repeat top right;}
H3.conicono.newsletter{background: url(images/ico_newsletter.jpg) no-repeat top right;}
H3.conicono.procesoseleccion{background: url(images/ico_procesosseleccion.jpg) no-repeat top right;}
H3.conicono.sedes{background: url(images/ico_sedes.jpg) no-repeat top right;}
H3.conicono.cau{background: url(images/ico_cau.jpg) no-repeat top right;}


.parrafo_columnadestacada .marcocolumnadestacada .columnadestacada H3.conicono.ventajas{background: url(images/ico_principalesventajas2.jpg) no-repeat top right;}
.parrafo_columnadestacada .marcocolumnadestacada .columnadestacada H3.conicono.clientesopinan{background: url(images/ico_nuestrosclientesopinan2.jpg) no-repeat top right;}
.parrafo_columnadestacada .marcocolumnadestacada .columnadestacada H3.conicono.casosexito{background: url(images/ico_casosexito2.jpg) no-repeat top right;}
.parrafo_columnadestacada .marcocolumnadestacada .columnadestacada H3.conicono.documentacion{background: url(images/ico_documentacionrelacionada2.jpg) no-repeat top right;}


UL.menuinterior{
width:100%;
overflow:hidden;
border-bottom:1px solid #a6d400;
margin-bottom:20px;
}

UL.menuinterior LI{
float:left;
padding-bottom:0;
margin-right:50px;
}

UL.menuinterior LI A{
float:left;
display:block;
color:#507990;
padding:5px;
}

UL.menuinterior LI A:hover{
color:#aaa;
}

UL.menuinterior LI.on A{
background-color:#a6d400;
color:#FFF;
}

UL.menuinterior LI.ultimo{
float:right;
margin-right:0;
}



H3.conicono{
padding-right:40px;
}


.itemobjetivo{
width:490px;
overflow:hidden;
margin-top:5px;
margin-bottom:15px;
color:#3a454d;
}

.itemobjetivo .encabezado{
/*background-color:#a6d400;*/
background-color:#507990;
width:470px;
padding:15px 10px 5px 10px;
color:#FFF;
}

.itemobjetivo .encabezado STRONG{
color:#FFF !important;
}



.itemobjetivo .encabezado P{
padding-bottom:10px;
padding-top:5px;
color:#FFF;
}

.itemobjetivo .columnas{
width:490px;
overflow:hidden;
background-color:#eff1f1;
}


.itemobjetivo .columnas .columnaizquierda{
width:220px;
float:left;
border-right:1px solid #FFF;
margin-bottom:-20000px;
padding:10px 10px 20000px 10px;
}



.itemobjetivo .columnas	{
font-weight:11px;
color:#777;
}
.itemobjetivo .columnas UL	{
padding-left:8px;
padding-top:5px;
}
.itemobjetivo .columnas LI	{
font-weight:11px;
color:#777;
background: url(images/flechaazul.gif) no-repeat 0 5px;
padding-left:8px;
}
.itemobjetivo .columnas .columnaderecha{
width:220px;
border-left:1px solid #bdbdb7;
float:left;
margin-bottom: -20000px;
padding:10px 10px 20000px 10px;
}

.itemobjetivo .columnas A{
color:#507990;
text-decoration:underline;
}

.itemobjetivo .columnas A:hover{
color:#aaa;
}

.itemlogocliente{
background-color:#FFF;
text-align:center;
margin-bottom:20px;

}



.parrafonoticias{
margin-top:10px;
}

.parrafonoticias P{
padding:0 0 10px 0;
}

.parrafonoticias P.fecha{
font-size:85%;
color:#8ab100;
padding:0;
margin-top:4px;

}

.imgnoticia{
float:left;
margin: 0 20px 8px 0;

}

.parrafo TABLE.certificaciones{
border-collapse: collapse;
margin-top: 10px;
}
.parrafo TABLE.certificaciones TD{
border-bottom: 1px solid #DCDFDF;
border-collapse: collapse;
padding: 15px 15px 15px 15px;
}

.parrafo TABLE.certificaciones TD P{
margin:5px 0 10px 0;
padding:0;
}

.parrafo TABLE TD.sinlineas{
border:none;
margin:0;
padding:15px 0 0 15px;
}

.parrafo TABLE.certificaciones.sinlineas TD{
border-bottom: none;
}

.parrafo TABLE.certificaciones TD A{
color:#507990;
text-decoration: underline;
}
.parrafo TABLE.certificaciones TD A:hover{
color:#AAA;
}

.parrafo.actualidad UL{
border-bottom:none;
padding-bottom:0;
padding-left:10px;
padding-bottom:10px;

}


.parrafo.actualidad UL LI{
background: url("images/flechaazul.gif") no-repeat scroll 0 5px transparent;
padding-left: 8px;

}


.parrafo.actualidad UL LI A{
color: #777;
text-decoration:underline;
}


.parrafo.actualidad UL LI A:hover{
color:#AAA;
}


FORM#buscarclientes{
background-color:#e9e9e0;
padding:20px;
width:720px;
overflow:hidden;
margin-bottom:20px;
}

FORM#buscarclientes LABEL{
display:none;
}

FORM#buscarclientes .caja01,
FORM#buscarclientes .caja02,
FORM#buscarclientes .caja03{
border:none;
background-color:#f8f8f0;
font-family:Arial, Helvetica, sans-serif;
font-size:100%;
background-color: #f9faf8;
color:#808080;
margin-right:20px;
width:190px;
padding:1px 0 1px 5px;
float:left;
}


FORM#buscarclientes A.botonenviar{
color: #fff;
font-weight: bold;
border-bottom: none;
background: url(images/fondo_botonenviar.png) no-repeat 0 0;
width: 70px;
height: 18px;
display: block;
float: left;
text-align: center;
}

UL.listaclientes{
width:760px;
overflow:hidden;
margin-bottom:20px;
}

UL.listaclientes LI{
width:230px;
float:left;
margin-right:20px;
}



UL.listaclientes LI.ultimo{
margin-right:none;
}

UL.listaclientes LI UL LI.categoria{
color:#FFF;
background-color:#a6d400;
padding:3px 10px;
margin-bottom:5px;
width:200px;
}

UL.listaclientes LI UL{
width:210px;
}

UL.listaclientes LI UL LI{
width:210px;
margin-right:0;
padding-bottom:5px;
padding:0 10px;
}


UL.listaclientes LI UL LI A{
color:#507990;
text-decoration:underline;
display:block;
padding-bottom:5px;
}

UL.listaclientes LI UL LI A:hover{
color:#999;
}


/************/


TABLE.listaclientesBusqueda{
width:760px;
overflow:hidden;
margin-bottom:20px;
}



TABLE.listaclientesBusqueda   A{
margin-left:10px;
color:#3a454d;
text-decoration:underline;
display:block;
padding-bottom:5px;
}

TABLE.listaclientesBusqueda  A:hover{
color:#999;
}



/***************/

.datoscliente{
width:100%;

position:relative;
margin:25px 0 20px 0;
padding-left:180px;
}



.datoscliente .logocliente{
position:absolute;
top:15px;
left:0;
}

.datoscliente .textocliente{

width:550px;
padding: 0 15px 15px 15px;
background-color:#EFF1F1;
}

A.vinculopdf{
text-decoration:underline;
color:#3a454d;
background: url(images/ico_pdf.jpg) no-repeat 0 0;
padding-left:35px;
}

A.vinculopdf:hover{
color:#999;
}

SPAN.mitigado{
color:#aaaaa6;
}

.itemcasoexito{
width:740px;
padding:15px 0;
border-top:1px solid #DCDFDF;
}

.itemcasoexito.ultimo{
border-bottom:1px solid #DCDFDF;
}

.itemcasoexito .logo_datos{
overflow:hidden;
width:740px;
}

.itemcasoexito .logo_datos H3{
padding-bottom:5px;
}

.itemcasoexito .logo_datos .logo{
float:left;
width:180px;
background-color:#FFF;
padding: 10px 0 10px 10px;
}

.itemcasoexito .logo_datos .datos{
float:left;
width:510px;
padding:20px;
background-color: #EFF1F1;
}

.separador03{
width:100%;
height:20px;
border-top:1px dotted #999;
}

A.vinculoyoutube{
background: url(images/ico_youtube_gr.jpg) no-repeat 0 50%;
color:#3a454d;
padding:20px 0 20px 50px;
display:block;
}

FORM#acceso_newsletter{
width:100%;
overflow:hidden;
}


FORM#acceso_newsletter LABEL{
display: none;
}

FORM#acceso_newsletter INPUT{
width: 215px;
height: 22px;
border:none;
background-color:#FFF;
}

FORM#acceso_newsletter .lineaacepto{
margin: 10px 0;
font-size: 85%;
overflow: hidden;
width:100%;
}

FORM#acceso_newsletter .lineaacepto LABEL{
display: block;
float: left;
position:relative;
top:4px;
}

FORM#acceso_newsletter  .lineaacepto INPUT#acepto{
width:auto;
float: left;
margin-right:5px;
}

FORM#acceso_newsletter  .lineaacepto A{
color: #fff;
text-decoration: underline;
}


FORM#acceso_newsletter A.botonenviar{
color: #fff;
font-weight: bold;
border-bottom: none;
background: url(images/fondo_botonenviar.png) no-repeat 0 0;
width: 70px;
height: 18px;
display: block;
float: left;
text-align: center;
padding-top: 2px;
}

.ocultaelementos{display:none;}

IMG.apoyo{
float:left;
margin:0 10px 10px 0;
}

.paginado{
width:100%;
overflow:hidden;
text-align:center;
margin-bottom:20px;
}

.paginado UL{
overflow:hidden;
}

.paginado UL LI{
display:inline;
}


.paginado UL LI A{
color:#507990;
text-decoration:underline;
border-right:1px solid #CCC;
padding-right:5px;
}

.paginado UL LI A:hover,
.paginado UL LI A.on{
text-decoration:none;
}


.paginado UL LI.ultimo A{
border-right:none;
}

.itemprocesoseleccion{
width:720px;
padding:20px;
background-color:#e9e9e0;
overflow:hidden;
margin-bottom:20px;
}

.itemprocesoseleccion P.lugar{
color:#55819a;
font-weight:bold;
}

.itemprocesoseleccion P SPAN{
color:#808788;
}

.itemprocesoseleccion .acciones{
width:720px;
overflow:hidden;
}

.itemprocesoseleccion .acciones UL.compartir{
float:left;
overflow:hidden;
}

.itemprocesoseleccion .acciones UL.ofertas{
float:right;
overflow:hidden;
}

.itemprocesoseleccion .acciones UL LI{
float:left;
}

.itemprocesoseleccion .acciones UL.compartir LI{
margin-right:10px;
}

.itemprocesoseleccion .acciones UL.ofertas LI{
margin-left:10px;
}

.itemprocesoseleccion .acciones UL.ofertas LI A{
margin-left:10px;
color: #fff;
font-weight: bold;
border-bottom: none;
background: url(images/fondo_botondestacado.jpg) repeat-x 0 0;
display: block;
float: left;
text-align: center;
padding:2px 10px;
}

.itemprocesoseleccion .acciones UL.ofertas LI A:hover{
color: #f5f5f5;
}

#formulariocontacto{
width:710px;
overflow:hidden;
margin-bottom:20px;
}

#formulariocontacto LABEL{
width:130px;
float:left;
padding-left:20px;
clear:left;
margin-bottom:10px;
color:#757c82;
}

#formulariocontacto INPUT{
width:380px;
float:left;
background-color:#eeeeee;
border:none;
clear:rignt;
margin-bottom:10px;
color:#3a454d;
padding:2px 10px;
font-family:Arial, Helvetica, sans-serif;
font-size:100%;
}

#formulariocontacto SELECT{
width:400px;
float:left;
background-color:#eeeeee;
border:none;
clear:rignt;
margin-bottom:10px;
color:#3a454d;
padding:2px 0 2px 8px;
font-family:Arial, Helvetica, sans-serif;
font-size:100%;
}

#formulariocontacto LABEL.labelobservaciones{
float:none;
display:block;
}

#formulariocontacto TEXTAREA{
width:510px;
height:150px;
float:left;
background-color:#eeeeee;
border:none;
clear:rignt;
margin-bottom:10px;
color:#3a454d;
padding:2px 10px;
margin-left:20px;
font-family:Arial, Helvetica, sans-serif;
font-size:100%;
}



#formulariocontacto  .lineaacepto{
margin-top: 10px;
font-size: 85%;
overflow: hidden;
width:530px;
padding-left:20px;
}

#formulariocontacto  .lineaacepto LABEL{
display: block;
float: left;
position:relative;
top:2px;
clear:none;
padding-left:0;
width:auto;
color: #3a454d;
}
#formulariocontacto  .lineaacepto INPUT{
float: left;
width:auto;
}

#formulariocontacto .lineaacepto A{
color: #3a454d;
text-decoration: underline;
}


#formulariocontacto .lineaacepto A.botonenviarContacto{
color: #fff;
font-weight: bold;
border-bottom: none;
background: url(images/fondo_botonenviar.png) no-repeat 0 0;
width: 70px;
height: 18px;
display: block;
float: left;
text-align: center;
margin-left: 10px;
padding-top: 2px;
float:right;
}

#formulariocontacto .condicionesLegales{
width:520px;
height:80px;
overflow-y:auto;
border:1px solid #ccc;
background-color:white;
font-size:10px;
color:#666;
padding:5px;
margin:10px 0 0 20px;
}

#formulariocontacto .error{
color:red;
width:380px;
}


/*MENU LATERAL------------------------------------------------*/

.menulateral{
width:200px;
float:left;
margin-bottom: -29950px;
padding: 0 0 30000px 0;
font-weight:bold;
margin-top: 25px;

}

.menulateral UL{
width:200px;
overflow:hidden;
border-top:1px solid #4F87A0;
}

.menulateral UL LI{
padding-bottom:0;
}

.menulateral UL LI A{
color:#49728a;
padding:3px 20px 3px 10px;
}


/*primer nivel*/

.menulateral UL.level1 LI{
width:200px;
float:left;


border-bottom:1px solid #4F87A0;
}

.menulateral UL.level1 LI A{
width:170px;
float:left;
color:#507990;
padding:8px 20px 8px 10px;
display:block;
}

.menulateral UL.level1 LI A:hover{
text-decoration:none;
}

.menulateral UL.level1 LI.on A,
.menulateral UL.level1 LI.active.leaf A,
.menulateral UL.level1 LI.active.open A,
.menulateral UL.level1 LI.trail A{
text-decoration:none;
/*background: #d2e97f url(images/flechamenulateral.gif) no-repeat 190px 50%;*/
background-color:#4D86A1;
color:#FFF;
}



.menulateral UL.level1 LI A:hover,
.menulateral UL.level1 LI.open A,
.menulateral UL.level1 LI.active.open A{
text-decoration:none;
/*background: #d2e97f url(images/flechamenulateral.gif) no-repeat 190px 50%!important;*/
background-color:#4D86A1;
color:#FFF;
}


/*segundo nivel*/


.menulateral UL LI UL.level2{
background-color:#EAF0F4;
}

.menulateral UL LI UL.level2 LI{
width:200px;
float:left;
padding-bottom:0;
border-bottom:1px solid #CCC;
}

.menulateral UL LI UL.level2 LI A{
width:160px;
float:left;
color:#507990;
text-decoration:underline;
padding:8px 20px 8px 20px;
display:block;
background:none;
font-weight:normal;
}

.menulateral UL LI UL.level2 LI A:hover{
text-decoration:none;
}

.menulateral UL LI UL.level2 LI.on A,
.menulateral UL LI UL.level2 LI.active A,
.menulateral UL LI UL.level2 LI.active.open A,
.menulateral UL LI UL.level2 LI.open A{
text-decoration:none;
background: url(images/li02_menulat.gif) no-repeat 10px 8px ;
color:#245C7A;
background-color:#FFF;
font-weight:normal!important;
}




.menulateral UL.level2 LI.closed A,
.menulateral UL.level2 LI.leaf A,
.menulateral UL.level2 LI.open A{
background: none!important;
text-decoration:none!important;
color:#245776;
}
.menulateral UL LI UL.level2 LI.active A{
/*background: #d2e97f url(images/flechamenulateral.gif) no-repeat 190px 50%!important;*/
color: #245776;
font-weight: bold!important;
}


.menulateral UL.level2 LI.open.trail A{
background-color: #eaf0f4 !important;
color:#245c7a;
}

.menulateral UL.level2 LI.active.leaf A{
/* background: #d2e97f url(images/flechamenulateral.gif) no-repeat 190px 50%!important;*/
color: #245C7A;
font-weight: bold!important;
}

.menulateral UL LI UL.level2 LI  A:hover,
.menulateral UL LI UL.level2 LI.active.open A,
.menulateral UL LI UL.level2 LI.open.trail A{
font-weight:bold!important;

}


.menulateral UL.level1 LI.active.open UL.level2 LI.leaf A,
.menulateral UL.level1 LI.active.open UL.level2 LI.closed A{
text-decoration:none;
background-color: #fff!important;
background: none!important;
color:#507990!important;
}


.menulateral UL.level2 LI.last {
border-bottom:0 !important;

}

/*tercer nivel*/




.menulateral UL LI UL LI UL,
.menulateral UL.level3{
padding: 0 0 5px 0;

}

.menulateral UL LI UL LI UL LI,
.menulateral UL.level3 LI,
.menulateral UL.level3 LI.leaf{
width:200px;
float:left;
padding-bottom:0;
border:0;
}

.menulateral UL.level1 LI UL.level2 LI UL.level3 LI A,
.menulateral UL.level1 LI UL.level2 LI UL.level3 LI.leaf A
{
width:150px;
float:left;
color:#507990;
padding:5px 20px 5px 40px;
display:block;
font-weight:normal!important;
text-decoration:none!important;
background: #EAF0F4 url(images/flechaadelantemenu.gif) no-repeat 28px 8px !important;
}

.menulateral UL.level1 LI UL.level2 LI UL.level3 LI A:hover,
.menulateral UL.level1 LI UL.level2 LI UL.level3 LI.active.leaf A
{
color:#245C7A;
font-weight:bold!important;
}

.menulateral UL LI UL LI UL LI A:hover,
.menulateral UL.level3 LI A:hover
{
color:#245C7A;
text-decoration:none;
}
/*
.menulateral UL LI UL LI UL LI.on A,
.menulateral UL LI UL LI UL.level3 LI.active A,
.menulateral UL LI UL LI UL.level3 LI.active.open A,
.menulateral UL LI UL LI UL.level3 LI.active.leaf A
{
text-decoration:none;
color:#245C7A !important;
text-decoration: none!important;
background-color:#EAF0F4 !important;
}
*/
.menulateral UL LI UL LI UL.level3 LI A
{
background-color:transparent!important;
}

.menulateral UL LI UL LI UL.level3 LI.active.leaf A
{
background: #d2e97f url(images/flechamenulateral.gif) no-repeat 190px 50%!important;
}



.menulateral UL.level3 LI.closed A{
background: none!important;
color:#507990;
}


.menulateral UL.level2 UL.level3 LI.leaf A{
background-color: transparent;
color:#245c7a;
background: none!important;
font-weight: normal!important;
}

.menulateral UL.level2 UL.level3 LI.active A{
font-weight: bold!important;
}
/************/

.textoColumna{
width:490px;
float:left;
padding-right:20px
}

.textoColumna UL {
margin-top: 10px;
}

.textoColumna UL LI {
background: url("images/flechaazul.gif") no-repeat scroll 0 5px transparent;
padding-left: 8px;
}

.textoColumna UL LI A{
color: #777777;
text-decoration: underline;
}

.textoColumna UL LI A:hover{
color: #aaa;
}

.desarrollocontenido  .parrafoimg P{
/*width:730px;*/
width: 97%;
}



.desarrollocontenido P.tituloparrafodestacado{
/*width:730px;*/
width: 100%;
background-color:#507990;
padding: 3px 15px;
}




.parrafo P.tituloparrafodestacado{
width: 465px;
}

.textoColumna  P.tituloparrafodestacado{
width:465px;
}

.desarrollocontenido P.tituloparrafodestacado STRONG{
color:#FFF!important;
}

.masinfo EM{
font-size:110%;
font-weight:bold;
}

.masinfo P{
padding-top:0;
}


/***presentacion sectores***/
.presentacionSectores{
width:490px;
color: #507990;
padding-bottom:10px;
}

.presentacionSectores A{
color: #507990;
font-weight:bold;
}

.presentacionSectores ul{
width:490px;

margin:0;
padding:0;
}

.presentacionSectores ul li{
width:230px;
display:inline;
margin:0;
padding:10px 0 0 10px;
}

.presentacionSectores TABLE.presentacionTabla{
border-collapse: collapse;
width:90%;
height:70px;
}

.presentacionSectores TABLE.presentacionTabla TD{
border-bottom: 1px solid #DCDFDF;
border-collapse: collapse;
text-align:left !important;
padding-left:10px;
}
.presentacionSectores TABLE.presentacionTabla TD.conlogo{
width:70px;
padding:0;
}



/** sector **/

.presentacionSector {
color: #507990;
font-size:16px;
font-weight:bold;
padding:15px;
}

.presentacionSector TABLE.presentacionTabla{
border-collapse: collapse;
width:100%;
height:70px;
}

.presentacionSector TABLE.presentacionTabla TD{
text-align:left !important;
padding-left:10px;
}
.presentacionSector TABLE.presentacionTabla TD.conlogo{
width:70px;
padding:0;
}

.fijador .vinculosuperiorderecho{
position: absolute;
top: 30px;
right: 0;
background-color: #E4EBF0;
padding: 5px;
}

.fijador .vinculosuperiorderecho A{
color: #245776;
background:url(images/flechaadelante.gif) no-repeat 100% 50%;
padding-right: 10px;
font-weight: bold;
}

.fijador .vinculosuperiorderecho A:hover{
color: #666;
}


.fijador .vinculosuperiorderecho.atras A{
background:url(images/flechaatras.gif) no-repeat 0 50%;
padding-left: 10px;
}


.fijador .vinculoinferiorderecho{
position: absolute;
bottom: 40px;
right: 0;
background-color: #E4EBF0;
padding: 5px;
}

.fijador .vinculoinferiorderecho A{
color: #245776;
background:url(images/flechaadelante.gif) no-repeat 100% 50%;
padding-right: 10px;
font-weight: bold;
}

.fijador .vinculoinferiorderecho A:hover{
color: #666;
}


.fijador .vinculoinferiorderecho.atras A{
background:url(images/flechaatras.gif) no-repeat 0 50%;
padding-left: 10px;
}

UL.listaaccesos{
width: 100%;
overflow: hidden;
}

UL.listaaccesos LI{
float: left;
margin-right: 20px;
background-color:#245776;
}

UL.listaaccesos LI IMG{
margin: 0;
padding: 0;
}

UL.listaaccesos LI .texto{

margin: 0;
padding: 5px 0 0 10px;
color: #FFF;
background:#245776 url(images/flecha06.gif) no-repeat 97% 50%;
}

/*******BUSCADOR*********/
#buscador ul
{
margin:10px 0 0 10px;
}

#buscador ul, #buscador ul li
{
list-style-type: none;
list-style-position: outside;
list-style-image: none;
}

#buscador .bloquebusqueda ul li
{
padding: 0 0 3px 15px;
list-style-type: none;
list-style-position: outside;
list-style-image: none;
}

/**********MAPA WEB***************/

UL.mapaweb{
width: 960px;
padding: 20px 0 20px 20px;
margin: 0 auto;
overflow: hidden;
font-size: 85%;

}

UL.mapaweb LI{
float: left;
width: 225px;
margin-right: 15px;
}

UL.mapaweb LI.ultimo{padding-right: 0}

UL.mapaweb LI A{
/*background: url(images/fondo_principalmapaweb.jpg) no-repeat 0 0;*/
display: block;
float: left;
color:#245c7a;
padding: 3px 5px;
font-weight:bold;
font-size:15px;
}

UL.mapaweb LI.ultimo A{display: none;}


UL.mapaweb LI UL LI{
width: 100%;
margin-right: 0;
padding-bottom:0;
}

UL.mapaweb LI UL LI A{
background: none;
font-weight:normal;

}

UL.mapaweb LI UL LI A:hover{color: #AAA;}


UL.mapaweb  UL.level1{
margin-left: 10px;
padding-bottom:0;

}

UL.mapaweb  UL.level1 A{
color: #9C9C9C;
font-weight:bold;
font-size:12px;
}

UL.mapaweb  UL.level1 A:hover{
color: #245c7a;
}

UL.mapaweb  UL.level2{
margin-left: 20px;
padding-bottom:0;
}

UL.mapaweb  UL.level2 A{
color: #9C9C9C;
font-weight:normal;
font-size:11px;
}

UL.mapaweb  UL.level3{
margin-left: 15px;
padding-bottom:0;
}

UL.mapaweb  UL.level3 A{
color: #9C9C9C;
font-weight:normal;
font-size:10px;
}

UL.mapaweb UL.ultimo LI{
margin-top:20px;
}

UL.mapaweb UL.ultimo A{
/*background: url(images/fondo_principalmapaweb.jpg) no-repeat 0 0;*/
display: block;
float: left;
color:#245c7a;
padding: 3px 5px;
font-weight:bold;
font-size:15px;
}

.centratexto P,
.centratexto{text-align: center;}

.titulodestacado{
color:#4f859f;
font-size:180%;
}

body.errorpage .marcopieinferior{
background: none;
}

body.errorpage .marcopieinferior .pieinferior{
padding-top: 0;
}

body.errorpage .marcopieinferior UL.paises{
width: auto;
padding-left: 200px;
float: none;
}


body.errorpage .marcopieinferior .pieinferior A {
color: #8c8c8c;
}

/**captcha**/
.captcha {
width:550px;
line-height:20px;
text-align:left;
float:left;
margin:0 0 20px 0;

}

.captcha LABEL{
width:5500px !important;
}

.captcha IMG{
vertical-align:middle;
float:left;
margin:0 55px 0 20px;
}

.captcha INPUT#human{
margin-top:0;
width:210px !important;
}

/****landing page*******/

.landing  #contenido #contenidoprincipal .desarrollocontenido .fijador {
width: 950px;
}

.landing .desarrollocontenido P.tituloparrafodestacado{
/*width:730px;*/
width: 910px;
}


.landing .parrafodestacado {
width: 900px;
}

.landing  .desarrollocontenido  .parrafoimg P{
width: 940px;
}

.landing .parrafo_masinfo {
width: 960px;
}

.landing .parrafo_masinfo .textoColumna {
width: 690px;
}

.addthis_toolbox{position:absolute;z-index:50;}