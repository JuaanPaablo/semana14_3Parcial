<?php

namespace App\Controllers\API;

use App\Models\modelUsu;
use CodeIgniter\RESTful\ResourceController;

class controlladorUsu extends ResourceController
{
    protected $modelName = modelUsu::class;
    protected $format = 'json';

    public function __construct()
    {
        $this->model = new modelUsu();
    }

    public function index()
    {
        $users = $this->model->findAll();
        return $this->respond($users);
    }

    public function create()
    {
        try {
            $newUser = $this->request->getJSON();
            if ($this->model->insert($newUser)) {
                $newUser->usu_id = $this->model->insertID();
                return $this->respondCreated($newUser);
            } else {
                return $this->failServerError('No se puede chamo');
            }
        } catch (\Throwable $e) {
            return $this->failServerError($e->getMessage());
        }
    }
}
