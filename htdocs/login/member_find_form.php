<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
    <link rel="stylesheet" href="../css/common.css?ver=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css?ver=2">
</head>

<body>
    <div id="wrap">
        <div id="main_content">
            <div id="tab1">
                <b>비밀번호 찾기</b>
            </div>

            <?php
                if(isset($_GET['find']))
                    $finding = $_GET['find'];
                else
                    $finding = "";
            
                if(isset($_GET['choice']))
                    $choice = $_GET['choice'];
                else
                    $choice = "";
            ?>

            <div id="tab2">
                <form action="find_id.php" method="post">
                    <?php if(!$choice) { ?>
                    <input type="text" name="id" class="frm4" placeholder="아이디" required>
                    <input type="submit" class="frm5" id="chk_id" value="검색" onclick="check_id()">
                    <?php } else { ?>
                    <input type="text" name="id" id="frm1" placeholder="아이디" value="<?=$choice?>" disabled>
                    <?php }?>
                </form>



                <form action="find_pass.php?choice=<?=$choice?>" method="post">
                    <?php if($finding){ ?>
                        <input type="text" name="question" id="frm1" value="<?=$finding?>" readonly>
                        <input type="text" name="answer" id="frm1" placeholder="답변" required>
                        <input type="submit" value="비밀번호 찾기" id="frm2">
                    <?php } ?>
                </form>
            </div>

        </div>
</body>
</html>

