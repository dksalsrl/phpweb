<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>녹차 이야기</title>
    <link rel="stylesheet" href="/css/common.css?ver=1">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/board.css?ver=5">
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
                <?php
                    $num = $_GET["num"];
                    $page = $_GET["page"];

                    $con = mysqli_connect("localhost", "user1", "12345", "sample");
                    $sql = "select * from board_free where num=$num";
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_array($result);
                    
                    $id = $row['id'];
                    $name = $row['name'];
                    $regist_day = $row['regist_day'];
                    $subject = $row['subject'];
                    $content = $row['content'];
                    $file_name = $row['file_name'];
                    $file_type = $row['file_type'];
                    $file_copied = $row['file_copied'];
                    $hit = $row['hit'];

                    $content = str_replace(" ", "&nbsp;", $content);
                    $content = str_replace("\n", "<br>", $content);
                        
                    $new_hit = $hit + 1;
                    $sql = "update board_free set hit=$new_hit where num=$num";
                    mysqli_query($con, $sql);
                    
                ?>
                
                <div id="viewtitle"> 
                    <span id="lt"><b>제목</b></span>
                    <span><?=$subject?></span>
                        
                    <span id="rt">
                        <span> <?=$name?></span>
                        <span> <?=$regist_day?></span>
                    </span>
                </div>
                
                    
                <div id="viewcontent">
                    
                    <span id="viewfile">
                        <?php
                            if($file_name)
                            {
                                $real_name = $file_copied;
                                $file_path = "./data/".$real_name;
                                $file_size = filesize($file_path);
                                echo "<b>첨부파일</b> <a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>$file_name</a>($file_size Byte)&nbsp;&nbsp;&nbsp;&nbsp;";
                            }
                            else
                            {
                                echo "<b>첨부파일</b> 등록된 첨부파일이 없습니다.";
                            }
                        ?>
                    </span>
                    <span id="rt"><b>조회수</b> <?=$hit?></span><br>
                    <div id="cont"><?=$content?></div>
                </div>

                
                <div id="comwrap">
                    <?php
                        if(isset($_GET["com_page"]))
                            $com_page = $_GET["com_page"];
                        else
                            $com_page = 1;
                        $con = mysqli_connect("localhost", "user1", "12345", "sample");
                        $sql = "select * from comment_free where post_num = '$num' order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_com_record = mysqli_num_rows($result);

                        $com_scale = 10;

                        if($total_com_record % $com_scale == 0)
                            $total_com_page = floor($total_com_record/$com_scale);
                        else   
                            $total_com_page = floor($total_com_record/$com_scale) + 1;

                        $com_start = ($com_page - 1) * $com_scale;
                        $com_number = $total_com_record - $com_start;

                        for($i=$com_start; $i<$com_start+$com_scale && $i < $total_com_record; $i++)
                        {
                            mysqli_data_seek($result, $i);
                            $row = mysqli_fetch_array($result);
                            echo"
                                <div id='comments'>
                                <b id='commentname'>".$row['post_name']."</b><div id='commentcon'>".$row['content']."</div>
                                <div><a id='commentdel' href='board_delete_comment.php?num=".$row['num']."&post_id=".$row['post_id']."'>X</a></div>
                                </div>
                            ";
                            $com_number--;
                        }
                        mysqli_close($con);
                    ?>

                    <ul id="pagebar">
                        <?php
                            if($total_com_page >= 2 && $com_page >=2)
                            {
                                $new_com_page = $com_page-1;
                                echo "<span id='pbt'><a href='board_view.php?num=$num&page=$page&com_page=$new_com_page'> ◀ 이전</a></span>";
                            }
                            else
                                echo "<span>&nbsp;</span>";

                            for($i=1; $i<=$total_com_page; $i++)
                            {
                                if($com_page == $i)
                                {
                                    echo "<span><b> $i </b></span>";

                                }
                                else
                                {
                                    $new_com_page = $i;
                                    echo "<span> <a href='board_view.php?num=$num&page=$page&com_page=$new_com_page'> $i </a></span>";

                                }
                            }
                            if($total_com_page >= 2 && $com_page != $total_com_page)
                            {
                                $new_com_page = $com_page+1;
                                echo "<span id='pbt'><a href='board_view.php?num=$num&page=$page&com_page=$new_com_page'> 다음 ▶</a></span>";
                            }
                            else
                                echo "<span>&nbsp;</span>";
                        ?>
                    </ul>
                </div>

                <div id="commarea">
                    <div id="comarea2">
                        <form action="board_write_comment.php?id=<?=$userid?>&comnum=<?=$num?>&comname=<?=$username?>&num=<?=$num?>&page=<?=$page?>" method="POST">
                            <input type="text" name="" id="comname" value="<?=$username?>" disabled><br>
                            <textarea name="comcon" id="comcon" placeholder="댓글 쓰기" required></textarea><br>
                            
                            <button type="submit" onclick="document.location.reload();return true;" id="bt3">완료</button><br>
                            
                        </form>
                    </div>
                </div>
                
                <div id="pn">
                    <?php
                        $con = mysqli_connect("localhost", "user1", "12345", "sample");
                        $sql = "select * from board_free order by num desc";
                        $prev_sql = "select * from board_free where num<'$num' order by num desc";
                        $next_sql = "select * from board_free where num>'$num' order by num asc";
                        $result = mysqli_query($con, $prev_sql);
                        $prev = mysqli_fetch_array($result);
                        $result = mysqli_query($con, $next_sql);
                        $next = mysqli_fetch_array($result);
                        
                        $result = mysqli_query($con, $sql);
                        $total = 0;
                        
                        while($calc = mysqli_fetch_array($result))
                        {
                            $total++;
                            if(!$calc)
                                break;
                        }

                        $result = mysqli_query($con, $prev_sql);
                        $i = 1;
                        
                        while($calc = mysqli_fetch_array($result))
                        {
                            $i++;
                            if(!$calc)
                                break;
                        }

                        $scale = 10;

                        if($i % 10 == 0 + $total%$scale)
                            $next_page = $page - 1;
                        else
                            $next_page = $page;

                        if($i % 10 == 1 + $total%$scale)
                            $prev_page = $page + 1;
                        else
                            $prev_page = $page;
                            
            

                        if(!$next)
                        {
                            echo"<div id='pnlist'>다음 글 > 글이 없습니다.</div>";
                        }
                        else
                        {
                            echo"<div id='pnlist'>다음 글 > <a href='board_view.php?num=".$next['num']."&page=".$next_page."'>".$next['subject']."</a></div>";
                        }
                        if(!$prev)
                        {
                            echo"<div id='pnlist'>이전 글 > 글이 없습니다.</div>";
                        }
                        else
                        {
                            echo"<div id='pnlist'>이전 글 > <a href='board_view.php?num=".$prev['num']."&page=".$prev_page."'>".$prev['subject']."</a></div>";
                        }
                    ?>
                </div>

                    
                
                <ul id="wrb">
                    <li>
                    <button id="bt2" onclick="location.href='./board_list.php?num=<?=$num?>&page=<?=$page?>'">목록</button>
                    <button id="bt2" onclick="location.href='./board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button>
                    <button id="bt2" onclick="location.href='./board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button>
                    <button id="bt2" onclick="location.href='./board_write_form.php'">글쓰기</button>
                    </li>

                </ul>
            </div>

        <footer>
            <?php include "../../footer.php"?>
        </footer>
    </div>    

</body>
</html>

