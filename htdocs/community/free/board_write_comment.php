<?php
    $id = $_GET['id'];
    $num = $_GET['comnum'];
    $name = $_GET['comname'];
    $content = $_POST['comcon'];

    $ret_num = $_GET['num'];
    $ret_page = $_GET['page'];

    if(!$id)
    {
        echo"
            <script>
                alert('댓글은 로그인 후 입력할 수 있습니다!');
            </script>
        ";
    }
    else
    {
        $con = mysqli_connect("localhost", "user1", "12345", "sample");
        $sql = "insert into comment_free(post_num, post_id, post_name, content) values('$num', '$id', '$name', '$content')";
        mysqli_query($con, $sql);
    
        mysqli_close($con);
    
    }

    $ret = "board_view.php?num=".$ret_num."&page=".$ret_page;
    $code = "<script>location.href='".$ret."';</script>";

    echo $code;
?>