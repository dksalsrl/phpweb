<?php
    $id = $_POST['id'];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from members where id='$id'";
    
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($con);

    if(!$row)
    {
        
        echo"
            <script>
                alert('존재하지 않는 아이디입니다.');
                history.go(-1);
            </script>
        ";
    }
    else
    {
        $que = $row['question'];
        $add = "member_find_form.php?find=".$que."&choice=".$id;
        $code = "<script>location.href='".$add."';</script>";
        echo $code;


    }
?>