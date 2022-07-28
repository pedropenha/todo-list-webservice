<?php

namespace app\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Todo extends ResourceController
{
    public function findAllTodo()
    {
        $todoModel = new \App\Models\TodoModel();

        $data = $todoModel->findAll();

        return $this->response->setJSON($data);
    }

    public function findByIdTodo($id)
    {
        $todoModel = new \App\Models\TodoModel();

        $data = $todoModel->find($id);

        return $this->response->setJSON($data);
    }

    public function saveTodo()
    {
        $todoModel = new \App\Models\TodoModel();

        try{
            $newTodo = [
                'title' => $this->request->getVar('title')
            ];

            if($todoModel->save($newTodo)){
                $response = [
                    'response' => 'success',
                    'msg' => 'todo list created with success'
                ];
            }else{
                $response = [
                    'response' => 'error',
                    'msg' => 'error create todo list',
                    'error' => $todoModel->errors()
                ];
            }
        }catch (Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error create todo list',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }
        return $this->response->setJSON($response);
    }

    public function updateTodo()
    {
        $todoModel = new \App\Models\TodoModel();

        try{
            $id = $this->request->getVar('id');

            $newTodo = [
                'title' => $this->request->getVar('title'),
            ];

            if($todoModel->update($id, $newTodo)){
                $response = [
                    'response' => 'success',
                    'msg' => 'todo list updated with success'
                ];
            }else {
                $response = [
                    'response' => 'error',
                    'msg' => 'error on update todo list',
                    'error' => $todoModel->errors()
                ];
            }
        }catch (Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error on update todo list',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function deleteTodo($id){
        $todoModel = new \App\Models\TodoModel();

        try{
            if($todoModel->delete($id)){
                $response = [
                    'response' => 'success',
                    'msg' => 'todo list deleted with success'
                ];
            }else {
                $response = [
                    'response' => 'error',
                    'msg' => 'error on deleted todo list',
                    'error' => $todoModel->errors()
                ];
            }
        }catch (Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error on deleted todo list',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }
}