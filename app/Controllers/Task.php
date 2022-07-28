<?php

namespace app\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Task extends ResourceController
{
    public function findAllTasks()
    {
        $taskModel = new \App\Models\TasksModel();

        try{
            $data = $taskModel->findAll();
            if(sizeof($data) > 0){
                $response = [
                    'response' => 'success',
                    'tasks' => $data,
                ];
            }else{
                $response = [
                    'response' => 'not found tasks',
                    'tasks' => $data
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function findByIdTask($id)
    {
        $taskModel = new \App\Models\TasksModel();

        try{
            $data = $taskModel->find($id);
            if(sizeof($data) > 0){
                $response = [
                    'response' => 'success',
                    'tasks' => $data,
                ];
            }else{
                $response = [
                    'response' => 'error',
                    'error' => $taskModel->errors()
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function findByIdTodo($idTodo){
        $taskModel = new \App\Models\TasksModel();

        try{
            $data = $taskModel->findAllByIdTodo($idTodo);
            if(sizeof($data) > 0){
                $response = [
                    'response' => 'success',
                    'tasks' => $data,
                ];
            }else{
                $response = [
                    'response' => 'not found tasks',
                    'tasks' => $data
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function saveTask()
    {
        $taskModel = new \App\Models\TasksModel();

        try{
            $newTask = [
                'content' => $this->request->getVar('content'),
                'idTodo' => $this->request->getVar('idTodo')
            ];

            if($taskModel->insert($newTask)){
                $response = [
                    'response' => 'success',
                    'msg' => 'task created with success'
                ];
            }else{
                $response = [
                    'response' => 'error',
                    'msg' => 'error create task',
                    'error' => $taskModel->errors()
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error create task',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }
        return $this->response->setJSON($response);
    }

    public function updateTask()
    {
        $taskModel = new \App\Models\TasksModel();

        try{
            $id = $this->request->getVar('id');

            $newTask = [
                'content' => $this->request->getVar('content'),
            ];

            if($taskModel->update($id, $newTask)){
                $response = [
                    'response' => 'success',
                    'msg' => 'task updated with success'
                ];
            }else {
                $response = [
                    'response' => 'error',
                    'msg' => 'error on update task',
                    'error' => $taskModel->errors()
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error on update task',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function deleteTask($id){
        $taskModel = new \App\Models\TasksModel();

        try{
            if($taskModel->delete($id)){
                $response = [
                    'response' => 'success',
                    'msg' => 'task deleted with success'
                ];
            }else {
                $response = [
                    'response' => 'error',
                    'msg' => 'error on deleted task',
                    'error' => $taskModel->errors()
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error on deleted task',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function concludedTasks()
    {
        $taskModel = new \App\Models\TasksModel();

        $id = $this->request->getVar('id');

        try{
            if($taskModel->concludeTask($id)){
                $response = [
                    'response' => 'success',
                    'msg' => 'task concluded with success'
                ];
            }else {
                $response = [
                    'response' => 'error',
                    'msg' => 'error on concluded task',
                    'error' => $taskModel->errors()
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error on concluded task',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function unConcludeTask()
    {
        $taskModel = new \App\Models\TasksModel();

        $id = $this->request->getVar('id');

        try{
            if($taskModel->unConcludeTask($id)){
                $response = [
                    'response' => 'success',
                    'msg' => 'task unconclude with success'
                ];
            }else {
                $response = [
                    'response' => 'error',
                    'msg' => 'error on unconclude task',
                    'error' => $taskModel->errors()
                ];
            }
        }catch (\Exception $e){
            $response = [
                'response' => 'error',
                'msg' => 'error on unconclude task',
                'errors' => [
                    'exception' => $e->getMessage()
                ]
            ];
        }

        return $this->response->setJSON($response);
    }
}