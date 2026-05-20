<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
</head>

<body>

<h1>To Do List</h1>

<form action="" method="post">

    <input
        type="text"
        name="todo"
        placeholder="Enter todo..."
        value="<?php echo $todoToEdit ?? ''; ?>"
    >

    <input type="submit" name="submit_todo" value="ADD">

</form>

<?php foreach ($todos as $todo): ?>


        <div>

            <b><?php echo $todo['todoName']; ?></b>

            <br><a href="index.php?updateid=<?php echo $todo['id']; ?>">
                Update
            </a>
             &#8209;    
            <a href="index.php?deleteid=<?php echo $todo['id']; ?>">
                Done Tast 
            </a><br><br><br>

        </div>


<?php endforeach; ?>

</body>
</html>