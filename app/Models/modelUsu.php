<?php

namespace App\Models;

use CodeIgniter\Model;

class controlladorUsu extends Model
{
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'usu_id';
    protected $returnType = 'array';
    protected $allowedFields = ['usu_nombre', 'usu_apellido', 'usu_correo', 'usu_password'];

    //no todo fue hecho con gpt, (solo la mayoria) ayude un 10 a todo ing, plox
}
