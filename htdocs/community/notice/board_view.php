<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>녹차 이야기</title>
    <link rel="stylesheet" href="/css/common.css?ver=1">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/board.css?ver=3">
</head>

<body>
    <div id="wrap">
        <header>
            <?php include "../../header.php"?>
        </header>

        <div id="main_content">
            <div id="tab1">
                <b id="highlight1">공지사항</b><br>
                <span id="root">Home>커뮤니티>공지사항</span>
            </div>

            <div id="tab2">
                <?php
                    $num = $_GET["num"];
                    $page = $_GET["page"];

                    $con = mysqli_connect("localhost", "user1", "12345", "sample");
                    $sql = "select * from board_notice where num=$num";
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
                    $sql = "update board_notice set hit=$new_hit where num=$num";
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

                <div id="pn">
                    <?php
                        $con = mysqli_connect("localhost", "user1", "12345", "sample");
                        $sql = "select * from board_notice order by num desc";
                        $prev_sql = "select * from board_notice where num<'$num' order by num desc";
                        $next_sql = "select * from board_notice where num>'$num' order by num asc";
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

                 

                        if($i % 10 == 0 + $total%10)
                            $next_page = $page - 1;
                        else
                            $next_page = $page;

                        if($i % 10 == 1 + $total%10)
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
                    
                <ul>
                        
                </ul>


            </div>

        <footer>
            <?php include "../../footer.php"?>
        </footer>
    </div>    

</body>
</html>

