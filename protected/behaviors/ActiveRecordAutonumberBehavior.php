<?php
class ActiveRecordLogableBehavior extends CActiveRecordBehavior
{
	//private $_oldattributes = array();
	private $_camponumero;
	private $_
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
						. '[' . $this->Owner->getPrimaryKey() .'].';
					$log->action=       'CAMBIO';
					$log->model=        get_class($this->Owner);
					$log->idModel=      $this->Owner->getPrimaryKey();
					$log->idModelReal=      $this->Owner->getPrimaryKey().'';
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
					$log->save();
				}
			}
		} else {
			$log=new ActiveRecordLog;
			$log->description=  'El usuario ' . Yii::app()->user->Name
				. ' creo ' . get_class($this->Owner)
				. '[' . $this->Owner->getPrimaryKey() .'].';
			$log->action=       'CREACION';
			$log->model=        get_class($this->Owner);
			$log->idModel=      $this->Owner->getPrimaryKey();
			$log->idModelReal=      $this->Owner->getPrimaryKey().'';
			$log->field=        '';
			$log->creationdate= new CDbExpression('NOW()');
			$log->userid=       Yii::app()->user->id;
			$log->save();
		}
	}

	public function afterDelete($event)
	{
		$log=new ActiveRecordLog;
		$log->description=  'EL usuario ' . Yii::app()->user->Name . ' ha borrado '
			. get_class($this->Owner)
			. '[' . $this->Owner->getPrimaryKey() .'].';
		$log->action=       'BORRADO';
		$log->model=        get_class($this->Owner);
		$log->idModel=      $this->Owner->getPrimaryKey();
		$log->idModelReal=      $this->Owner->getPrimaryKey().'';
		$log->field=        '';
		$log->creationdate= new CDbExpression('NOW()');
		$log->userid=       Yii::app()->user->id;
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




}