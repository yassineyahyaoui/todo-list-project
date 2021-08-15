<?php
$connection = mysqli_connect("localhost", "root", "", "todo");
if (isset($_POST["delete"])) {
    $delete = $_POST["delete"];
    $query3 = "DELETE FROM tasks WHERE id = '$delete' ";
    $result3 = mysqli_query($connection, $query3);
    if(!$result3){
        die("failed3!");
    }
}
if (isset($_POST["newTask"])) {
    $newTask = $_POST['newTask'];
    $query2 = "INSERT INTO tasks(task)";
    $query2 .= "VALUES ('$newTask')";
    $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
        die("query failed2!");
    }
}
$query = "SELECT * FROM tasks";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("failed1");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="section">
        <div class="header">
            <img class="coffee" src="./img/coffee.png" alt="coffee image">
            <h1>Good morning,<br>Yassine.</h1>
        </div>
        <div class="tasks">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                echo "<div class='task'><p>{$row['task']}</p><form class='x' action='index.php' method='POST'><button value='{$id}' name='delete'><i class='fa fa-close'></i></button></form></div>";
            }
            ?>
        </div>
        <form class="add" action="index.php" method="POST">
            <input type="text" name="newTask" placeholder="Add new task...">
        </form>
    </section>
</body>

</html>