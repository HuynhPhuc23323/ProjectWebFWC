<?php

class BaseController{
    const VIEW_FOLDER_NAME = 'Views/';
    
    const MODEL_FOLDER_NAME = 'Models/';

    protected function view($viewpath, array $data = []){
        foreach($data as $key => $value){
            $$key = $value;
        }
        // $data ở đây chưa sd
        $viewpath=self::VIEW_FOLDER_NAME.$viewpath.".php";
        require($viewpath);
    }

    protected function loadModel($modelPath){
        $modelPath=self::MODEL_FOLDER_NAME.$modelPath.".php";
        require($modelPath);
    }

}

?>