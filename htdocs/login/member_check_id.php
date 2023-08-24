<!DOCTYPE html>
<head>
    <title>아이디 중복체크</title>
    <style>
        h3{margin-bottom:5px; text-align:center;}
        li{margin-bottom:5px; text-align:center; list-style-type: none;}
        #close{text-align:center;}
        button{width: 100px; color: white; background-color: #4B8A08; border: none;}
    </style>
</head>

<body>
    <h3>아이디 중복체크</h3>
    <p>
        <?php
            $id = $_GET["id"];
            if(!$id)
            {
                echo "<li>아이디를 입력해 주세요!</li>";
            }
            else
            {
                $con = mysqli_connect("localhost", "user1", "12345", "sample");
                $sql = "select * from members where id='$id'";  
                $result = mysqli_query($con, $sql);
                $num_record = mysqli_num_rows($result);
                if($num_record)
                {
                    echo "<li>".$id." 아이디는 중복됩니다.</li>";
                    echo "<li>다른 아이디를 사용해주세요!</li>";
                }
                else
                {
                    echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
                }
                mysqli_close($con);
            }
        ?>
    </p>
    <div id="close">
        <button onclick="javascript:self.close()">확인</button>  
    </div>
    
</body>
