<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['content', 'idTodo', 'concluded'];
    protected $validationRules = [
        'content' => 'required|min_length[3]'
    ];

    public function findAllByIdTodo($idTodo)
    {
        return $this->db->table('tasks')->where('idTodo', $idTodo)->get()->getResult();

    }

    public function concludeTask($idTask)
    {
        $data = [
          'concluded' => 1
        ];
        return $this->db->table('tasks')->where('id', $idTask)->update($data);
    }

    public function unConcludeTask($idTask){
        $data = [
          'concluded' => 0
        ];

        return $this->db->table('tasks')->where('id', $idTask)->update($data);
    }
}