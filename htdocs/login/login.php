<?php
            $id = $_POST['id'];
            $pw = $_POST['pw'];

            $con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from members where id='".$id."'";
            $result = mysqli_query($con, $sql);
            
            $num_match = mysqli_num_rows($result);

            if(!$num_match)
            {
                echo("
                    <script>
                        alert('등록되지 않은 아이디입니다!');
                        history.go(-1);
                    </script>
                ");
            }
            else
            {
                $row = mysqli_fetch_array($result);
                $db_pass = $row["pass"];
                mysqli_close($con);

                if($pw != $db_pass)
                {
                    echo("
                        <script>
                            alert('비밀번호가 틀립니다!');
                            history.go(-1);
                        </script>
                    ");
                    exit;
                }
                else
                {
                    session_start();
                    $_SESSION["userid"] = $row["id"];
                    $_SESSION["username"] = $row["name"];
                    $_SESSION["userlevel"] = $row["level"];
                    
                    echo("
                        <script> 
                        opener.location.href = '/index.php';
                        window.close(); </script>
                    ");
                }
            }
        ?>