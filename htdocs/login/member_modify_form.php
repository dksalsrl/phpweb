<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
    <link rel="stylesheet" href="../css/common.css?ver=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
    
    <script>
        function check_pass()
        {
            pw=document.getElementById("pw").value;
            pwc=document.getElementById("pwc").value;
            if(pw != pwc)
            {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
                return false;
            }
            else
            {
                return true;
            }
        } 
    </script>
</head>

<body>
    <div id="wrap">
        <?php
            $id = $_GET["id"];
            $con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from members where id='$id'";
            mysqli_query($con, $sql);
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $pass = $row["pass"];
            $name = $row["name"];
            $question = $row['question'];
            $answer = $row['answer'];
            mysqli_close($con);
        ?>
        <div id="main_content">
            <div id="tab1">
                <b>회원 정보 수정</b>
            </div>

            <div id="tab2">
                <form action="member_modify.php?id=<?=$id?>" method="post" onsubmit="return check_pass()">
                    <ul>
                        <li><input type="text" name="id" id="id" value=<?=$id?> class="frm3" disabled></li> 
                        <li><input type="password" name="pw" id="pw" class="frm3" required value="<?=$pass?>"></li>
                        <li><input type="password" name="" id="pwc" class="frm3" required value="<?=$pass?>"></li>
                        <li><input type="text" name="name" id="name" class="frm3" required value="<?=$name?>"></li>             
                        <li><input type="text" name="question" class="frm6" required value="<?=$question?>">▶<input type="text" name="answer" class="frm6" required value="<?=$answer?>"></li>
                        <br>
                        <li id="tab2"><button id="sbt" class="frm5" type="submit">제출</button><button id="rbt" class="frm5" type="reset">취소</button></li>
                    </ul>
                </form>
            </div>
        </div>
</body>
</html>

