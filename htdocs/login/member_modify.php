<?php
    $id = $_GET["id"];
    $pass = $_POST["pw"];
    $name = $_POST["name"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update members set pass='$pass', name='$name', question='$question', answer='$answer' where id='$id'";


    mysqli_query($con, $sql);
    mysqli_close($con);

    session_start();
    $_SESSION["username"] = $name;

    echo("
    <script> 
    opener.location.href = '/index.php';
    window.close(); </script>
    ");
?>