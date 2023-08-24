<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>녹차 이야기</title>
    <link rel="stylesheet" href="/css/common.css?ver=1">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/board.css?ver=2">
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
                    $name = $row['name'];
                    $subject = $row['subject'];
                    $content = $row['content'];
                    $file_name = $row['file_name'];
                ?>
        
                <div id="wrm">
                    <form action="board_modify.php?num=<?=$num?>&page=<?=$page?>" method="post" enctype="multipart/form-data">
                        <table id="wrf">
                            <tr class="row1">
                                <td class="col1">
                                    이름
                                </td>
                                <td class="col2">
                                    <?=$username?>
                                </td>
                            </tr>

                            <tr class="row1">
                                <td class="col1">
                                    제목
                                </td>
                                <td class="col2">
                                    <input type="text" name="subject" id="tx" value="<?=$subject?>" required>
                                </td>
                            </tr>

                            <tr class="row1">
                                <td class="col1">
                                    내용
                                </td>
                                <td class="col2">
                                    <textarea name="content" id="tx" cols="45" rows="20" required><?=$content?></textarea>
                                </td>
                            </tr>

                            <tr class="row1">
                                <td class="col1">
                                    첨부 파일
                                </td>
                                <td class="col2">
                                    <?=$file_name?>
                                </td>                               
                            </tr>
                        
                        </table>
                        
                        <ul id="btl">
                            <button type="submit" id="bt2">완료</button>
                            <input type="button" onclick="location.href='./board_list.php'" id="bt2" value="목록">
                        </ul>
                    </form>

                </div>
            </div>
        </div>

        <footer>
            <?php include "../../footer.php"?>
        </footer>
    </div>    

</body>
</html>

