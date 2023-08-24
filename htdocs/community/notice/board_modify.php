<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";    
    
    if($userlevel < 5)
    {
        echo("
            <script>
                alert('공지사항 수정은 관리자만 가능합니다!');
                history.go(-1)
            </script>
        ");
        exit;
    }
        
    $num = $_GET["num"];
    $page = $_GET["page"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update board_notice set content='$content', subject='$subject' where num=$num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
        <script>
            location.href = 'board_list.php?page=$page';
        </script>
    "
?>