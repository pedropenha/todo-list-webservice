<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['content', 'idTodo'];
    protected $validationRules = [
        'content' => 'required|min_length[3]'
    ];

    public function findAllByIdTodo($idTodo)
    {
        return $this->db->table('tasks')->where('idTodo', $idTodo)->get()->getResult();

    }
}