<html lang="zh_CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>登录</title>
    <style type="text/css">
        body{
            background-image: url("image/index.jpg");
            background-size: 100% 100%;

        }
        .cm-container{
            margin-top: 160px;

        }
        .login {
            position: relative;
            width: 360px;
            height: 300px;

            margin: 10px auto;


        }
        .login span{

            font-weight: bold;
            width: 360px;
            height: 30px;
            margin-left: 85px;
            display: block;
            font-size: 18px;
        }
        .input-group{

            height:auto;
            line-height: 15px;
            font-weight: bold;
            margin-left: 20px;


        }
        .input-group-addon{
            margin: 10px;
        }

        #btn_submit{
             background-color: #afc0b3;
             border-radius: 5px 5px 5px 5px;
             margin-left: 20px;
             width: 60px;
             height:30px;
         }
        #exit{
            background-color: #afc0b3;
            border-radius: 5px 5px 5px 5px;
            margin-left: 20px;
            width: 60px;
            height:30px;
        }

    </style>
    <script type="text/javascript">
        function checkit() {
            if(form.reader_username.value=="")
            {
                alert("请输入用户名");
                form.reader_username.select();
                return false;
            }
            if(form.reader_password.value=="")
            {
                alert("请输入密码");
                form.reader_password.select();
                return false;
            }
            return true;
        }
    </script>


</head>
<body>
<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['reader_username']) and isset($_POST['reader_password']))
{
    $username=$_POST['reader_username'];
    $password=$_POST['reader_password'];
    $sqls="select * from reader";
    $result=mysql_query($sqls);
    $msgs=mysql_fetch_assoc($result);
    $_SESSION['reader_username']=$username;

    $sql="select * from reader where reader_username='{$username}' and reader_password='{$password}'";
    $results=mysql_query($sql);
    $msg=mysql_fetch_assoc($results);

    if($username==$msg['reader_username'] && $password==$msg['reader_password'])
    {
        echo <<<STR
        <script type="text/javascript">
        alert("登录成功！");
        window.location.href="book.php";
     </script>
STR;

    }
    else
    {
        echo <<<STR
        <script type="text/javascript">
        alert("登录失败");
        window.location.href="indexs.php";
        </script>
STR;

    }
}

?>


<div class="container cm-container">
    <h3 class="text-center"><label style="color: #050629; margin-left: 30px; font-size: larger">图书管理系统</label></h3>
    <hr />
    <div class="login">
        <span style="color:#050629;">登&emsp;&emsp;录</span>

        <form action="#" name="form" method="post">
<!--            <div class="form-group form-group-lg">-->
                <div class="input-group">
                        <div class="input-group-addon">昵&emsp;&emsp;称</div>
<!--                    <input class="form-control" name="username"  value="admin" placeholder="请输入账号"/>-->
                    <input name="reader_username"   placeholder="请输入昵称"/>
                </div>
<!--            </div>-->
            <br />

<!--            <div class="form-group form-group-lg">-->
                <div class="input-group">
                    <div class="input-group-addon">密&emsp;&emsp;码</div>
<!--                    <input class="form-control" name="password" type="password" value="1" placeholder="请输入密码"/>-->
                    <input name="reader_password" type="password" placeholder="请输入密码"/>
                </div>
<!--            </div>-->
            <br />
<!--            <div class="form-group">-->
<!--                <button type="button" class="btn btn-lg btn-primary btn-block" id="btn_submit" >登录</button>-->
                <input type="submit" id="btn_submit" onclick="return checkit();" value="登录" />
                <a href="zhuce.php"><input type="button"  id ="exit"  value ="注册" ></a>
<!--            </div>-->
        </form>
    </div>
</div>
</body>
</html>