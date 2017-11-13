<?php
/**
 * Backup
 *
 * Yii module to backup, restore databse
 *
 * @version 1.0
 * @author Shiv Charan Panjeta <shiv@toxsl.com> <shivcharan.panjeta@outlook.com>
 */
class DefaultController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('accessControl',array('CrugeAccessControlFilter'));
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		Yii::app()->user->loginUrl = array("/cruge/ui/login");
		return array(
	 	

		array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('inicio','admin','delete','clean','index','view','create','upload', 'download','restore'),
						'users'=>array('@'),
		),
		array('deny',  // deny all users
						'users'=>array('*'),
		),
		);
	}


	public $tables = array();
	public $fp ;
	public $file_name;
	public $_path = null;
	public $back_temp_file = 'db_backup_';

	protected function getPath()
	{
		if ( isset ($this->module->path )) $this->_path = $this->module->path;
		else $this->_path = Yii::app()->basePath .'/../_backup/';

		if ( !file_exists($this->_path ))
		{
			mkdir($this->_path );
			chmod($this->_path, '777');
		}
		return $this->_path;
	}
	public function execSqlFile($sqlFile)
	{
		$message = "ok";

		if ( file_exists($sqlFile))
		{
			$sqlArray = file_get_contents($sqlFile);

			$cmd = Yii::app()->db->createCommand($sqlArray);
			try	{
				$cmd->execute();
			}
			catch(CDbException $e)
			{
				$message = $e->getMessage();
			}

		}
		return $message;
	}
	public function getColumns($tableName)
	{
		$sql = 'SHOW CREATE TABLE '.$tableName;
		$cmd = Yii::app()->db->createCommand($sql);
		$table = $cmd->queryRow();
               /* echo "tablename : ".$tableName;*/
                echo "<br> incio de ".$tableName;echo "<br>";
                var_dump(ARRAY_KEYS($table));
                echo "<br>fin de ".$tableName;echo "<br>";/*
               // print_r($table['Create Table'] );echo "<br>";
               // var_dump();die();
		$create_query = $table['Create Table'] . ';';

		$create_query  = preg_replace('/^CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $create_query);
		//$create_query = preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/', '', $create_query);
		if ( $this->fp)
		{
			$this->writeComment('TABLE `'. addslashes ($tableName) .'`');
			$final = 'DROP TABLE IF EXISTS `' .addslashes($tableName) . '`;'.PHP_EOL. $create_query .PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		}
		else
		{
			$this->tables[$tableName]['create'] = $create_query;
			return $create_query;
		}*/
	}

	public function getData($tableName)
	{
		$sql = 'SELECT * FROM '.$tableName;
		$cmd = Yii::app()->db->createCommand($sql);
		$dataReader = $cmd->query();

		$data_string = '';

		foreach($dataReader as $data)
		{
			$itemNames = array_keys($data);
			$itemNames = array_map("addslashes", $itemNames);
			$items = join('`,`', $itemNames);
			$itemValues = array_values($data);
			$itemValues = array_map("addslashes", $itemValues);
			$valueString = join("','", $itemValues);
			$valueString = "('" . $valueString . "'),";
			$values ="\n" . $valueString;
			if ($values != "")
			{
				$data_string .= "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";" . PHP_EOL;
			}
		}

		if ( $data_string == '')
		return null;
			
		if ( $this->fp)
		{
			$this->writeComment('TABLE DATA '.$tableName);
			$final = $data_string.PHP_EOL.PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		}
		else
		{
			$this->tables[$tableName]['data'] = $data_string;
			return $data_string;
		}
	}
	public function getTables($dbName = null)
	{
		$sql = 'SHOW TABLES';
		$cmd = Yii::app()->db->createCommand($sql);
		$tables = $cmd->queryColumn();
		return $tables;
	}
	public function StartBackup($addcheck = true)
	{
		//var_dump($this->path ); die();
            $this->file_name =  $this->path . $this->back_temp_file . date('Y.m.d_H.i.s') . '.sql';
               // var_dump($this->path ); die();
		$this->fp = fopen( $this->file_name, 'w+');

		if ( $this->fp == null )
		return false;
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		if ( $addcheck )
		{
			fwrite ( $this->fp,  'SET AUTOCOMMIT=0;' .PHP_EOL );
			fwrite ( $this->fp,  'START TRANSACTION;' .PHP_EOL );
			fwrite ( $this->fp,  'SET SQL_QUOTE_SHOW_CREATE = 1;'  .PHP_EOL );
		}
		fwrite ( $this->fp, 'SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('START BACKUP');
		return true;
	}
	public function EndBackup($addcheck = true)
	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;'.PHP_EOL );
		fwrite ( $this->fp, 'SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;'.PHP_EOL );

		if ( $addcheck )
		{
			fwrite ( $this->fp,  'COMMIT;' .PHP_EOL );
		}
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('END BACKUP');
		fclose($this->fp);
		$this->fp = null;
	}

	public function writeComment($string)
	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, '-- '.$string .PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
	}
	public function actionCreate()
	{
           //var_dump($this->_path);
		$tables = $this->getTables();

		if(!$this->StartBackup())
		{
			
//render error
			$this->render('create');
			return;
		}

		foreach($tables as $tableName)
		{
			$this->getColumns($tableName);
		}
                die();
		foreach($tables as $tableName)
		{
			$this->getData($tableName);
		}
		$this->EndBackup();

		$this->redirect(array('index'));
	}
	public function actionClean($redirect = true)
	{
		
            /*MUY PELIFGROSO DESACTICVADO 
            /*$tables = $this->getTables();

		if(!$this->StartBackup())
		{
			//render error
			return;
		}

		foreach($tables as $tableName)
		{
			fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
			fwrite ( $this->fp, 'DROP TABLE IF EXISTS ' .addslashes($tableName) . ';'.PHP_EOL );
			fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );

		}
		$this->EndBackup();

		// logout so there is no problme later .
		Yii::app()->user->logout();
		
		$this->execSqlFile($this->file_name);
		unlink($this->file_name);
		if ( $redirect == true) $this->redirect(array('index'));
	*/
                 }
                 
	public function actionDelete($file = null)
	{
		$this->updateMenuItems();
		if ( isset($file))
		{
			$sqlFile = $this->path . basename($file);
			if ( file_exists($sqlFile))
			unlink($sqlFile);
		}
		else throw new CHttpException(404, Yii::t('app', 'File not found'));
		$this->actionIndex();
	}

	public function actionDownload($file = null)
	{
		$this->updateMenuItems();
		if ( isset($file))
		{
			$sqlFile = $this->path . basename($file);
			if ( file_exists($sqlFile))
			{
				$request = Yii::app()->getRequest();
				$request->sendFile(basename($sqlFile),file_get_contents($sqlFile));
			}
		}
		throw new CHttpException(404, Yii::t('app', 'File not found'));
	}

	public function actionIndex()
	{
		$this->updateMenuItems();
		$path = $this->path;
		
		$dataArray = array();
		
		$list_files = glob($path .'*.sql');
		if ($list_files )
		{
			$list = array_map('basename',$list_files);
			sort($list);

	
			foreach ( $list as $id=>$filename )
			{
				$columns = array();
				$columns['id'] = $id;
				$columns['name'] = basename ( $filename);
				$columns['size'] = floor(filesize ( $path. $filename)/ 1024) .' KB';
				$columns['create_time'] = date( DATE_RFC822, filectime($path .$filename) );
				$dataArray[] = $columns;
			}
		}
		$dataProvider = new CArrayDataProvider($dataArray);
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	public function actionSyncdown()
	{
		$tables = $this->getTables();

		if(!$this->StartBackup())
		{
			//render error
			$this->render('create');
			return;
		}

		foreach($tables as $tableName)
		{
			$this->getColumns($tableName);
		}
		foreach($tables as $tableName)
		{
			$this->getData($tableName);
		}
		$this->EndBackup();
		$this->actionDownload(basename($this->file_name));
	}

	public function actionRestore($file = null)
	{
		$this->updateMenuItems();
		$message = 'OK. Done';
		$sqlFile = $this->path . 'install.sql';
		if ( isset($file))
		{
			$sqlFile = $this->path . basename($file);
		}

		$this->execSqlFile($sqlFile);
		$this->render('restore',array('error'=>$message));
	}

	public function actionUpload()
	{
		$model= new UploadForm('upload');
		if(isset($_POST['UploadForm']))
		{
			$model->attributes = $_POST['UploadForm'];
			$model->upload_file = CUploadedFile::getInstance($model,'upload_file');
			if($model->upload_file->saveAs($this->path . $model->upload_file))
			{
				// redirect to success page
				$this->redirect(array('index'));
			}
		}

		$this->render('upload',array('model'=>$model));
	}

	protected function updateMenuItems($model = null)
	{
		// create static model if model is null
		if ( $model == null ) $model=new UploadForm('install');

		switch( $this->action->id)
	{
		case 'restore':
		{
			$this->menu[] = array('label'=>Yii::t('app', 'Inicio') , 'url'=>Yii::app()->HomeUrl);
		}
		case 'create':
		{
			$this->menu[] = array('label'=>Yii::t('app', 'Listadode Backups') , 'url'=>array('index'));
		}
			break;
		case 'upload':
		{
			$this->menu[] = array('label'=>Yii::t('app', 'Crear Backup') , 'url'=>array('create'));
		}
			break;
		default:
		{
			$this->menu[] = array('label'=>Yii::t('app', 'Listado Backups') , 'url'=>array('index'));
			$this->menu[] = array('label'=>Yii::t('app', 'Crear Backup'), 'url'=>array('create'));
			$this->menu[] = array('label'=>Yii::t('app', 'Subir Archivo  Backup') , 'url'=>array('upload'));
			$this->menu[] = array('label'=>Yii::t('app', 'Restablecer Backup'), 'url'=>array('restore'));
			$this->menu[] = array('label'=>Yii::t('app', 'Resetear base datos') , 'url'=>array('clean'));
			$this->menu[] = array('label'=>Yii::t('app', 'Inicio') , 'url'=>Yii::app()->HomeUrl);
		}
			break;
	}
	}

	public  function actionInicio()
	{


		foreach(Diccionario::model()->findAll(array("order"=>" orden desc")) as $fila){
			$comandito='table';
			switch( trim($fila->prefijo))
			{

				case 'vw':
				{
					$comandito='view';
					break;
				}
				case 'public':
				{
					$comandito='table';
				}
					break;
				case 'cruge':
				{
					$comandito='table';
				}
					break;
				default:

					break;
			}
				if($fila->prefijo=='cruge')
					continue;
            $command = Yii::app()->db->createCommand('drop '.$comandito.' if exists '.$fila->prefijo.'_'.$fila->nombre);
			if((integer)$fila->orden >=198){
				$command->execute();
				echo "  Orden de borrado  ".$fila->orden." - ".$fila->nombre."<br>";
				echo "  Orden  ".'drop '.$comandito.' if exists '.$fila->prefijo.'_'.$fila->nombre."<br>";
			}

        }



		foreach(Diccionario::model()->findAll(array("order"=>" orden asc")) as $fila){
			if($fila->prefijo=='cruge')
				continue;
			$command = Yii::app()->db->createCommand($fila->rutina);
			echo "  Orden  ".$fila->orden." - ".$fila->nombre."<br>";
			if((integer)$fila->orden >= 198){
				$resul=$command->execute();
				echo "  Orden  (".$resul.")   :   ".$fila->orden." - ".$fila->nombre."<br>";
				echo "  Orden  (".$resul.")   :   ".$fila->rutina."<br><br>";
			}

		}

	}

}