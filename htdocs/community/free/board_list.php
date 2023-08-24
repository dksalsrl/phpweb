<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>녹차 이야기</title>
    <link rel="stylesheet" href="/css/common.css?ver=1">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/board.css?ver=4">

</head>

<body>
    <div id="wrap">
        <header>
            <?php include "../../header.php"?>
        </header>

        <div id="main_content">
            <div id="tab1">
                <b id="highlight1">의견나눔</b><br>
                <span id="root">Home>커뮤니티>의견나눔</span>
            </div>

            <div id="tab2">
                <table id="board">
                    <th>NO</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>파일</th>
                    <th>등록일</th>
                    <th>조회수</th>
                    <?php
                        if(isset($_GET["page"]))
                            $page = $_GET["page"];
                        else
                            $page = 1;
                        $con = mysqli_connect("localhost", "user1", "12345", "sample");
                        $sql = "select * from board_free order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result);

                        $scale = 10;
                        if($total_record % $scale == 0)
                            $total_page = floor($total_record/$scale);
                        else   
                            $total_page = floor($total_record/$scale) + 1;

                        $start = ($page - 1) * $scale;
                        $number = $total_record - $start;

                        for($i=$start; $i<$start+$scale && $i < $total_record; $i++)
                        {
                            mysqli_data_seek($result, $i);
                            $row = mysqli_fetch_array($result);
                            $num = $row['num'];
                            if($row['file_name'])
                                echo "<tr id=\"boardtr\"><td>".$row['num']."</td><td id = \"title\"><a href='./board_view.php?num=".$num."&page=".$page."'>".$row['subject']."</a></td><td>".$row['name']."</td><td>O</td><td>".$row['regist_day']."</td><td>".$row['hit']."</td></tr>";
                            else
                                echo "<tr id=\"boardtr\"><td>".$row['num']."</td><td id = \"title\"><a href='./board_view.php?num=".$num."&page=".$page."'>".$row['subject']."</a></td><td>".$row['name']."</td><td>X</td><td>".$row['regist_day']."</td><td>".$row['hit']."</td></tr>";
                            $number--;
                        }
                        mysqli_close($con);
                    ?>
                </table>
                        <ul id="pagebar">
                            <?php
                                if($total_page >= 2 && $page >=2)
                                {
                                    $new_page = $page-1;
                                    echo "<span id='pbt'><a href='board_list.php?page=$new_page'> ◀ 이전</a></span>";
                                }
                                else
                                    echo "<span>&nbsp;</span>";

                                for($i=1; $i<=$total_page; $i++)
                                {
                                    if($page == $i)
                                    {
                                        echo "<span><b> $i </b></span>";

                                    }
                                    else
                                    {
                                        echo "<span> <a href='./board_list.php?page=$i'> $i </a></span>";

                                    }
                                }
                                if($total_page >= 2 && $page != $total_page)
                                {
                                    $new_page = $page+1;
                                    echo "<span id='pbt'><a href='./board_list.php?page=$new_page'>다음 ▶</a></span>";
                                }
                                else
                                    echo "<span>&nbsp;</span>";
                                
                            ?>
                        </ul>
                    
                    <input type="button" id="bt2" onclick="location.href = './board_write_form.php'" value="글쓰기">
                </div>
            </div>

        </div>

        <footer>
            <?php include "../../footer.php"?>
        </footer>
    </div>    

</body>
</html>

