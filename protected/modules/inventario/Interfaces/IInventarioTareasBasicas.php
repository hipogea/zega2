<?php
/** ICrugeSession

interfaz para inyectarle al ORDBM seleccionado los metodos a implementar

@author: Christian Salazar H. <christiansalazarh@gmail.com> @salazarchris74
@license protected/modules/cruge/LICENSE
 */
interface IInventarioTareasBasicas
{

    public static function loadModel($id);
    public  function stocklibre_a_reserva($id);
    public  function stocklibre_a_transito($id);
    public  function stockreserva_a_libre($id);
    public  function stocktransito_a_libre($id);
    public static function create();
    public function grabar();
    public function haystocklibre();
   public  function getPrimaryKey();



}
