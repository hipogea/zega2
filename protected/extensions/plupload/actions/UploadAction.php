<?php
defined('PATH') or define('PATH', Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

/**
 * The following container integrates the Plupload (http://www.plupload.com)
 * component, allowing you to add multiple images interactively.
 * If you want to change settings, first check the documentation component
 * (http://www.plupload.com/documentation.php)
 * Usage:
 * Embed the action in the controller that makes the call:
 * public function actions() {
 * ...
 * 'upload' => 'ext.plupload.actions.UploadAction',
 * ...
 * }
 * @version 1.0
 * @author Rafael J Torres <rafaelt88@gmail.com>
 * @copyright (c) 2014 Rafael J Torres
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 */
class UploadAction extends CAction {
    /**
     *
     * @var string
     */
    public $basePath = 'uploads/';
    /**
     *
     * @var string
     */
    public $baseUrl = 'uploads/';

    public function run() {
        $this->prepare();
        if ($file = new CUploadedFile($this->md5($_FILES['file']['name']), $_FILES['file']['tmp_name'],
            $_FILES['file']['type'], $_FILES['file']['size'], $_FILES['file']['error'])) {
            if ($file->saveAs($this->basePath . $file->getName())) {
                $this->append($file->getName());
            }
        }
    }

    public function prepare() {
        @set_time_limit(5 * 60);
        $this->basePath .= date('Y') .
             DIRECTORY_SEPARATOR .
             date('m') .
             DIRECTORY_SEPARATOR .
             date('d') .
             DIRECTORY_SEPARATOR;
        if (! file_exists($this->basePath)) {
            @mkdir($this->basePath, 0775, true);
        }
        $this->baseUrl .= date('Y/m/d/');
    }

    /**
     *
     * @return string
     */
    public function md5($name) {
        $temp = explode('.', strtolower($name));
        return substr(md5(Yii::app()->user->getStateKeyPrefix()), 0, 8) . substr(md5($temp[0]), 0, 8) . ".{$temp[1]}";
    }

    /**
     *
     * @param string $file
     */
    public function append($file) {
        $plupload = json_decode(Yii::app()->user->getState('plupload'), true);
        $plupload[$file] = $this->basePath;
        Yii::app()->user->setState('plupload', json_encode($plupload));
    }

}
