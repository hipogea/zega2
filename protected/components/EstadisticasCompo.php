<?php
class EstadisticasCompo extends CApplicationComponent
{


    /**
     * linear regression function
     * @param $x array x-coords
     * @param $y array y-coords
     * @returns array() m=>slope, b=>intercept
     */
    function linear_regression($x, $y) {
        /*print_r($x);
        echo "<br>";
        print_r($y);
        yii::app()->end();*/


        // calculate number points
        $n = count($x);

        // ensure both arrays of points are the same size
        if ($n != count($y)) {

            throw new CHttpException(500,__CLASS__.'  Las coordenas no coinciden con las abcisas, revise los array de entrada');

        }

        // calculate sums
        $x_sum = array_sum($x);
        $y_sum = array_sum($y);

        $xx_sum = 0;
        $xy_sum = 0;

        for($i = 0; $i < $n; $i++) {

            $xy_sum+=($x[$i]*$y[$i]);
            $xx_sum+=($x[$i]*$x[$i]);

        }

        // calculate slope
        $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));

        // calculate intercept
        $b = ($y_sum - ($m * $x_sum)) / $n;

        // return result
        return array("m"=>$m, "b"=>$b);

    }



    public function DesviacionMedia($arr, $item)
    {
        return $arr[$item] - Promedio($arr);
    }

    public function DesviacionEstandar($arr, $item)
    {
        return pow($arr[$item] - Promedio($arr),2);
    }

    public function Promedio($arr)
    {
        $sum = Sumatorio($arr);
        $num = count($arr);

        if($num>0):
            return $sum/$num;
        else:
            return NULL;
        endif;
    }

    public function Sumatorio($arr)
    {
        if(in_array('N/D',$arr)):
            for($i=0;$i<count($arr);$i++):
                if($arr[$i]=='N/D'):
                    $arr[$i]=0;
                endif;
            endfor;
        endif;


        return array_sum($arr);
    }

    public function CorrelacionPearson($arr1, $arr2)
    {
        $k = SumatorioProductoDesviacionMedia($arr1, $arr2);
        $ssmd1 = SumatorioDesviacionMediaAlCuadrado($arr1);
        $ssmd2 = SumatorioDesviacionMediaAlCuadrado($arr2);

        $producto = $ssmd1 * $ssmd2;

        $res = sqrt($producto);

        if($res!=0):
            return $k/$res;
        else:
            return 0;
        endif;
    }


    public function CorrelacionSpearman($arr1, $arr2)
    {
        asort($arr1);
        asort($arr2);

        $tmp = array();
        $lastvalue = null;
        $posicion = 0;

        foreach ($arr1 as $key => $val):
            $tmp[$key] = substr_count(implode('|', array_values($arr1)), $val);
        endforeach;

        foreach ($arr1 as $key => $val):
            if($val!=$lastvalue):
                $valor=0;
                for($s=1;$s<=$tmp[$key];$s++):
                    $valor = $valor + ($posicion+$val+$s);
                endfor;
                $posicion = $posicion + $s;
                $lastvalue = $val;
            endif;
            $arr1[$key] = ($valor/$tmp[$key]);
        endforeach;

        unset($tmp);
        $lastvalue = null;
        $posicion = 0;

        foreach ($arr2 as $key => $val):
            $tmp[$key] = substr_count(implode('|', array_values($arr2)), $val);
        endforeach;

        foreach ($arr2 as $key => $val):
            if($val!=$lastvalue):
                $valor=0;
                for($s=1;$s<=$tmp[$key];$s++):
                    $valor = $valor + ($posicion+$val+$s);
                endfor;
                $posicion = $posicion + $s;
                $lastvalue = $val;
            endif;
            $arr2[$key] = ($valor/$tmp[$key]);
        endforeach;


        ksort($arr1);
        ksort($arr2);

        $k = SumatorioProductoDesviacionMedia($arr1, $arr2);
        $ssmd1 = SumatorioDesviacionMediaAlCuadrado($arr1);
        $ssmd2 = SumatorioDesviacionMediaAlCuadrado($arr2);

        $producto = $ssmd1 * $ssmd2;

        $res = sqrt($producto);

        if($res!=0):
            return $k/$res;
        else:
            return 0;
        endif;
    }



    public function SumatorioProductoDesviacionMedia($arr1, $arr2)
    {
        $sum = 0;
        $num = count($arr1);

        for($i=0; $i<$num; $i++):
            $sum = $sum + ProductoDesviacionMedia($arr1, $arr2, $i);
        endfor;

        return $sum;
    }




   public  function ProductoDesviacionMedia($arr1, $arr2, $item)
    {
        return (DesviacionMedia($arr1, $item) * DesviacionMedia($arr2, $item));
    }

   public  function SumatorioDesviacionMediaAlCuadrado($arr)
    {
        $sum = 0;
        $num = count($arr);

        for($i=0; $i<$num; $i++):
            $sum = $sum + DesviacionMediaAlCuadrado($arr, $i);
        endfor;

        return $sum;
    }

    public function DesviacionMediaAlCuadrado($arr, $item)
    {
        return DesviacionMedia($arr, $item) * DesviacionMedia($arr, $item);
    }

   public  function SumatorioDesviacionMedia($arr)
    {
        $sum = 0;

        $num = count($arr);

        for($i=0; $i<$num; $i++):
            $sum = $sum + DesviacionMedia($arr, $i);
        endfor;

        return $sum;
    }

  public   function SumatorioDesviacionEstandar($arr)
    {
        $sum = 0;

        $num = count($arr);

        for($i=0; $i<$num; $i++):
            $sum = $sum + DesviacionEstandar($arr, $i);
        endfor;

        return sqrt($sum/$num);
    }



}




















