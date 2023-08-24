<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="../css/common.css?ver=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css?ver=3">
</head>

<body>
    <div id="wrap">
        <div id="main_content">
            <div id="tab1">
                <b>로그인</b>
            </div>

            <div id="tab2">
                <form action="login.php" method="post">
                    <input type="text" name="id" id="frm1" placeholder="아이디" required>
                    <input type="password" name="pw" id="frm1" placeholder="비밀번호" required>
                    <input type="submit" value="로그인" id="frm2">
                </form>
            </div>

            <div id="lglists">
                <span id="lglist"> <a href="member_form.php">회원 가입</a></span>
                <span id="lglist"> <a href="member_find_form.php">비밀번호 찾기</a></span>
            </div>

        </div>
</body>
</html>

