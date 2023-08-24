<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";    
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";    

    $num = $_GET['num'];
    $post_id = $_GET['post_id'];

    if($post_id === $userid || $level == 9)
    {
        $con = mysqli_connect("localhost", "user1", "12345", "sample");
        $sql = "delete from comment_free where num='$num'";
        mysqli_query($con, $sql);
        mysqli_close($con);     
    }
    else
    {
        echo"
            <script>
                alert('댓글을 쓴 유저만 삭제 가능합니다!');
            </script>
        ";
    }
    
    echo
    "
        <script>
            history.go(-1);
        </script>
    ";
?>