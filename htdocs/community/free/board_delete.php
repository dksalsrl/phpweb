<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";    
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";    

    $num = $_GET["num"];
    $page = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board_free where num = $num";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if($row['id'] === $userid || $userlevel == 9)
    {
        if(isset($row["file_copied"]))
        {
            $copied_name = $row["file_copied"];
            $file_path = "./data/".$copied_name;
            unlink($file_path);
        }

        $sql = "delete from board_free where num = $num";
        mysqli_query($con, $sql);

        $sql = "delete from comment_free where post_num = $num";
        mysqli_query($con, $sql);
    }
    else
    {
        echo"
            <script>
                alert('글을 쓴 유저만 삭제 가능합니다!');
            </script>
        ";
    }

    mysqli_close($con);

    echo "
        <script>
            location.href = './board_list.php?page=$page'
        </script>
    "
?>

