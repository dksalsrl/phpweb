<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";    
    
    if($userlevel < 5)
    {
        echo("
            <script>
                alert('공지사항 삭제는 관리자만 가능합니다!');
                history.go(-1)
            </script>
        ");
        exit;
    }
    $num = $_GET["num"];
    $page = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board_notice where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    

    if(isset($row["file_copied"]))
    {
        $copied_name = $row["file_copied"];
        $file_path = "./data/".$copied_name;
        unlink($file_path);
    }

    $sql = "delete from board_notice where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
        <script>
            location.href = './board_list.php?page=$page'
        </script>
    "
?>

