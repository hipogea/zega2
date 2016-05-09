<?php
/** IColectores
ESTAS INTERFAZ
 * SE USA PARA QUE LOS MODELOS QUYE ASE COMPORTAN COMO COLECTORES
 * COMO PETICION, CECOS, ORDEENS DE TRABAJO, INVERSIONES
 * SE COMPORTEN Y VALIDEN COMO TAL
 * CON LAS FUNCIONES
 * QUIENES CONSUMEN:

@author: Julian Ramirez <hipogea@hotmail.com>

 */


/***
 * Interface IColectores
 * $imputacion = paramero es el valor del colecto r sea un ceco o u nnmeor de orden o
 *
 */


interface IColectores
{
 public  function esvalidocolector($imputacion);




}
