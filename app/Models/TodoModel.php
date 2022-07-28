<?php

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table = 'todo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title'];
    protected $validationRules = [
        'title' => 'required|min_length[3]|is_unique[todo.title]'
    ];
}