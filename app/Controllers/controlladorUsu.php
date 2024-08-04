<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\modelUsu;

class controlladorUsu extends ResourceController
{
    protected $modelName = modelUsu::class;
    protected $format = 'json';

    public function index()
    {
        $modelUsu = new modelUsu();
        $users = $modelUsu->select(['usu_apellido', 'usu_correo'])->findAll();

        return $this->respond($users);
    }

    public function create()
    {
        //funcion para insertar usuarios OuO
        $data = $this->request->getJSON();
        if ($this->validateUser($data)) {
            $modelUsu = new modelUsu();
            $inserted = $modelUsu->insert($data);
            if ($inserted) {
                $data->usu_id = $modelUsu->insertID();
                return $this->respondCreated($data);
            }
        }

        return $this->failServerError('Usuario no puede ser creado');
    }

    private function validateUser($data)
    {
        //Valida las credenciales del usuario pues chico
        if (isset($data->usu_apellido) && isset($data->usu_correo)) {
            return true;
        }
        return false;
    }
}
