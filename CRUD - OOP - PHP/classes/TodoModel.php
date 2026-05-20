<?php

include_once('Database.php');

class TodoModel extends Database {

    public function getTodos() {

        $query = "SELECT * FROM todos";

        $stmt = $this->connect()->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTodo($todo) { 

        $query = "INSERT INTO todos(todoName,createDate)
                  VALUES(?,?)";


        $date  = date('y-m-d H-m-sa');

        $stmt = $this->connect()->prepare($query);

        $stmt->execute([$todo,$date]);
    }

    public function deleteTodo($id) {

        $query = "DELETE FROM todos WHERE id=?";

        $stmt = $this->connect()->prepare($query);

        $stmt->execute([$id]);
    }

    public function updateTask($id, $name) {

        $query = "UPDATE todos
                  SET todoName=?,createDate=?
                  WHERE id=?";

        $stmt = $this->connect()->prepare($query);
        $date  = date('y-m-d H-m-sa');

        $stmt->execute([$name,$date,$id]);
    }

    public function getTodoById($id) {

        $query = "SELECT * FROM todos WHERE id=?";

        $stmt = $this->connect()->prepare($query);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}