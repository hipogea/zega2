<?php

class VerificaDoblePostBehavior extends CBehavior {

    public $nombremodelo;



    function postBlock($postID) {
  $retorno=false;

        if(isset(Yii::app()->session['postID'])) {
            if ($postID == Yii::app()->session['postID']) {
                $retorno= false;
            } else {
                Yii::app()->session['postID'] = $postID;
                $retorno= true;
            }
        } else {
            Yii::app()->session['postID'] = $postID;
            $retorno= true;
        }
        var_dump($postID);
        //var_dump(Yii::app()->session['postID']);
        yii::app()->end();
        return $retorno;
    }



}

?>
