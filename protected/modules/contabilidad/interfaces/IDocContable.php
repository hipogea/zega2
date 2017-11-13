<?php
/**
ICrugeAuth

Esta interfaz es consumida por los CACTIVE RECORD DE ODCUMETNOS CONTABLES 
Para tener un compaortamiento con las cuentas del libro diario




@author: Julian ramirez
@license protected/modules/cruge/LICENSE
 */
interface IDocContable
{

    /*
        es un nombre clave para el metodo de autenticacion, usado en el config
        para hacer saber que metodos de autenticacion se van a implementar
    */
    public function authName();

 
}
