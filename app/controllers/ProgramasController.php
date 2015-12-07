<?php

class ProgramasController extends BaseController {

    public function getProgramas()
    {
        return View::make('programas.programas');
    }
    public function postProgramas()
    {
        $path="upload/1/";
        $programa="python ".$path."programa/pyt.py";

        exec($programa,$output);
        return View::make('programas.result',array('exec'=>$output));
    }
    public function getListarfilesangular()
    {
        $id_user = 1;//;Auth::user()->id;
        $userName = 'juan';//Auth::user()->username;
        $model = new Archivo;
        $files=$model->where('user_id','=',$id_user)
                    ->where('estado','=',0)
                    ->get();
        return Response::json(array(
            'files'=>$files,
            'userName'=>$userName,
            ));
    }
    public function postRunfileangular()
    {
        $fileId=Input::get('fileId');
        $file = Archivo::find($fileId);
        $path="";
        if ($file->clientOriginalExtension=='py') {
            $path="python ".$file->rutaNormal;
        } else {
            $path=$file->rutaNormal;
        }
        exec($path,$output,$return_var);
        return Response::json(
            array(
                'resultado' =>$output,
                'msg' =>"se completo: ".$file->nombreNormal,
                'status' =>$return_var,
                'path' =>$path
            )
        );
    }
}
