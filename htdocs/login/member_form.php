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
        function check_id()
        {
            window.open("member_check_id.php?id="+document.getElementById("id").value, 
            "IDCHECK", "left=700, top=300, width=350, height=200, scrollbars=no, resizable=yes");     
        }
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
        <div id="main_content">
            <div id="tab1">
                <b>회원 가입</b>
            </div>

            <div id="tab2">
                <form action="member_insert.php" method="post" onsubmit="return check_pass()">
                    <ul>
                        <li><input type="text" name="id" id="id" class="frm4" required placeholder="아이디"> <input type="button" class="frm5" id="chk_id" value="중복검사" onclick="check_id()"></li> 
                        <li><input type="password" name="pw" id="pw" class="frm3" required placeholder="비밀번호"></li>
                        <li><input type="password" name="" id="pwc" class="frm3" required placeholder="비밀번호 확인"></li>
                        <li><input type="text" name="name" id="name" class="frm3" required placeholder="이름"></li>             
                        <li><input type="text" name="question" id="question" class="frm6" placeholder="계정찾기용 질문" required>▶<input type="text" name="answer" id="answer" class="frm6" placeholder="답변" required></li>
                        
                        <br>
                        <li id="tab2"><button id="sbt" class="frm5" type="submit">제출</button><button id="rbt" class="frm5" type="reset">취소</button></li>
                    </ul>
                </form>
            </div>
        </div>
</body>
</html>

