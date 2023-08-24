<?php
    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    
    $sql = "select * from members where id='$id'";  
    $result = mysqli_query($con, $sql);
    $num_record = mysqli_num_rows($result);
    
    if($num_record)
    {
        echo("
        <script>
            alert('아이디 중복체크를 해주세요!');
            history.go(-1);
        </script>
        ");
    }
    else
    {
        $sql = "insert into members(id, pass, name, question, answer, regist_day, level) 
        values ('$id', '$pw', '$name', '$question', '$answer', '$regist_day', 0)";
        mysqli_query($con, $sql);
        mysqli_close($con);
    
        echo("
        <script> 
        opener.location.href = '/index.php';
        window.close(); </script>
        ");
    }


?>