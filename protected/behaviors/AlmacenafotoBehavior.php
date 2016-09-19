<?php
class AlmacenafotoBehavior extends CBehavior
{
	
    
    private $_oldattributes = array();

	public function afterSave($event)
	{
		if (!$this->Owner->isNewRecord) {

			// new attributes
			$newattributes = $this->Owner->getAttributes();
			$oldattributes = $this->getOldAttributes();

			// compare old and new
			foreach ($newattributes as $name => $value) {
				if (!empty($oldattributes)) {
					$old = $oldattributes[$name];
				} else {
					$old = '';
				}

				if ($value != $old) {
					//$changes = $name . ' ('.$old.') => ('.$value.'), ';

					$log=new ActiveRecordLog;
					$log->description=  'El usuario ' . Yii::app()->user->Name
						. ' Cambio ' . $name . ' en '
						. get_class($this->Owner)
						. '[' .$this->clave().'].';
					$log->action=       'CAMBIO';
					$log->model=        get_class($this->Owner);
					$log->idModel=      $this->clave();
					$log->idModelReal=      $this->clave().'';
					$log->field=        $name;
					$log->nombrecampo= $this->Owner->getAttributeLabel($name);
					$log->creationdate= new CDbExpression('NOW()');
					$log->userid=       Yii::app()->user->id;

					//Debemos de evitar loggear campos del tipo memo
					if(strlen($old) >=16) {
						$log->oldvalue= substr($old, 0, 16)."...";
						$log->newvalue= substr($new, 0, 16)."...";
					} else {
						$log->oldvalue= $old;
						$log->newvalue= $value;
					}
					$log->asignacamposclave($this->Owner->getPrimaryKey());
					$log->save();
				}
			}
		} else {
			$log=new ActiveRecordLog;
			$log->description=  'El usuario ' . Yii::app()->user->Name
				. ' creo ' . get_class($this->Owner)
				. '[' . $this->clave() .'].';
			$log->action=       'CREACION';
			$log->model=        get_class($this->Owner);
			$log->idModel=      $this->clave();
			$log->idModelReal=      $this->clave().'';
			$log->field=        '';
			$log->creationdate= new CDbExpression('NOW()');
			$log->userid=       Yii::app()->user->id;
			$log->asignacamposclave($this->Owner->getPrimaryKey());
			$log->save();
		}
	}

	public function afterDelete($event)
	{
		$log=new ActiveRecordLog;
		$log->description=  'EL usuario ' . Yii::app()->user->Name . ' ha borrado '
			. get_class($this->Owner)
			. '[' . $this->clave() .'].';
		$log->action=       'BORRADO';
		$log->model=        get_class($this->Owner);
		$log->idModel=      $this->clave();
		$log->idModelReal=      $this->clave().'';
		$log->field=        '';
		$log->creationdate= new CDbExpression('NOW()');
		$log->userid=       Yii::app()->user->id;
		$log->asignacamposclave($this->Owner->getPrimaryKey());
		$log->save();

	}

	public function afterFind($event)
	{
		// Save old values
		$this->setOldAttributes($this->Owner->getAttributes());
	}

	public function getOldAttributes()
	{
		return $this->_oldattributes;
	}

	public function setOldAttributes($value)
	{
		$this->_oldattributes=$value;
	}

	public function cambio($attribute){
		$this->_oldattributes=$value;
	}


	public function hubocambio()
	{
		$retorno=false;
		if (!$this->Owner->isNewRecord) {
			$newattributes = $this->Owner->getAttributes();
			$oldattributes = $this->getOldAttributes();

			foreach ($newattributes as $name => $value) {
				if (!empty($oldattributes)) {
					$old = $oldattributes[$name];
				} else {
					$old = '';
				}
				if ($value != $old) {
				$retorno= true;
					break;
				}
			}


		} else {
			$retorno= true;
		}
		return $retorno;
	}


	///retorna un array con los campso s modificadsos, esto ayuda
	//mas que la funcion hubocambio, porque te devuelve un array asociativo con solo los nombres de los campos
	//modificados
	public function cambios()
	{
		$camposmodificados=array();
		$newattributes = $this->Owner->getAttributes();
		$oldattributes = $this->getOldAttributes();
			foreach ($newattributes as $name => $value) {
				if (!empty($oldattributes)) {
					$old = $oldattributes[$name];
				} else {
					$old = '';
				}
				if ($value != $old) {
					if ($value != $old ) {
						array_push($camposmodificados,$name);

					}
				}
			}

		return $camposmodificados;
	}

private function clave(){
	//$this->Owner->refresh();
	$vaL=$this->Owner->getPrimaryKey();
	IF(IS_ARRAY($vaL))
	{return $vaL[0];}ELSE{
		return $vaL;
	}
}


}