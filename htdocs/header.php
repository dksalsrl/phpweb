<script>
    <?php
        session_start();
        if(isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
        else $userid = "";
        if(isset($_SESSION["username"])) $username = $_SESSION["username"];
        else $username = "";
        if(isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
        else $userlevel = "";
    ?>

    function login()
    {
        var x = window.screen.width/2 - 300;
        var y = window.screen.height/2 - 250;
        window.open('/login/login_form.php','_blank','resizable=no width=600 height=500 top=' + y + ', left=' + x);
    }
    function join()
    {
        var x = window.screen.width/2 - 300;
        var y = window.screen.height/2 - 250;
        window.open('/login/member_form.php','_blank','resizable=no width=600 height=500 top=' + y + ', left=' + x);
    }
    function edit()
    {
        var x = window.screen.width/2 - 300;
        var y = window.screen.height/2 - 250;
        window.open('/login/member_modify_form.php?id=<?=$userid?>','_blank','resizable=no width=600 height=500 top=' + y + ', left=' + x);
    }
</script>

<div id="head">

    <ul id="bar">
        <?php if(!$userid){ ?>
            <li><a href="#" onclick="login();">Login</a></li>
            <li><a href="#" onclick="join();">Join</a></li>
        <?php } else { ?>
            <li> <a href="#" onclick="edit();"><?=$username."(".$userid.")"?>님</a></li>
            <li><a href="/login/logout.php">Logout</a></li>
        <?php } ?>
    </ul>

    <ul class="menu">
        <li id="logo">
            <a href="/index.php" id="lg">녹차 이야기클릭용</a>
        </li>

        <li>
            <a href="/about/efficancy.php">녹차의 효능</a>
        </li>

        <li>
            <a href="">녹차 정보</a>
            <ul class="sub">
                <li><a href="/info/history.php">녹차의 역사</a></li>
                <li><a href="/info/grade.php">녹차의 등급</a></li>
                <li><a href="/info/how.php">녹차 끓이기</a></li>
                <li><a href="/info/usage.php">활용법</a></li>
            </ul>
        </li>

        <li>
            <a href="">커뮤니티</a>
            <ul class="sub">
                <li><a href="/community/notice/board_list.php">공지사항</a></li>
                <li><a href="/community/free/board_list.php">의견나눔</a></li>
            </ul>
        </li>
    </ul>

</div>