<?php

include_once('TodoModel.php');

class TodoController
{

    private $model;

    public function __construct()
    {
        $this->model = new TodoModel();
    }

    public function handleRequest()
    {

        // DELETE
        if (isset($_GET['deleteid'])) {

            $this->model->deleteTodo($_GET['deleteid']);

            header("Location: index.php");
            exit();
        }

        // UPDATE MODE
        $todoToEdit = '';

        if (isset($_GET['updateid'])) {

            $todo = $this->model->getTodoById($_GET['updateid']);

            $todoToEdit = $todo['todoName'];
        }

        // INSERT OR UPDATE SUBMIT
        if (isset($_POST['submit_todo'])) {

            $todoName = $_POST['todo'];

            // UPDATE
            if (isset($_GET['updateid'])) {

                $this->model->updateTask(
                    $_GET['updateid'],
                    $todoName
                    
                );
                header("Location: index.php");
                exit();
            } else {

                // INSERT
                $this->model->addTodo($todoName);
            }
        }

        // SHOW TODOS
        $todos = $this->model->getTodos();

        include('views/home.php');
    }
}
