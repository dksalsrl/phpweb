<?php
    $id = $_GET['choice'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $real_answer = $row['answer'];
    mysqli_close($con);

    if($real_answer === $answer)
    {   
        $code = "
        <script>
            alert('비밀번호는 ".$row['pass']."입니다.');
            window.close();
        </script>";
        echo $code;
    }
    else
    {
        
        echo"
            <script>
                alert('답변이 맞지 않습니다.');
                history.go(-1);
            </script>
        ";

    }
?>