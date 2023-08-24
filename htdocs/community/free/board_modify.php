<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";   
        
    $num = $_GET["num"];
    $page = $_GET["page"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board_free where num=$num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if($row['id'] === $userid)
    {
        $sql = "update board_free set content='$content', subject='$subject' where num=$num";
        mysqli_query($con, $sql);
        
    }
    else
    {
        echo"
            <script>
                alert('글을 쓴 유저만 수정 가능합니다!');
            </script>
        ";
    }

    mysqli_close($con);

    echo "
        <script>
            location.href = 'board_list.php?page=$page';
        </script>
    "
?>