<html lang="zh_CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>注册</title>
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

        #btn_submit {
            background-color: #afc0b3;
            border-radius: 5px 5px 5px 5px;
            margin-left: 20px;
            width: 60px;
            height:30px;
        }

    </style>
    <script type="text/javascript">
        function checkit(form) {
            if(form.reader_id.value=="")
            {
                alert("请输入学号");
                form.reader_username.select();
                return false;
            }
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
            if(form.reader_againPassword.value=="")
            {
                alert("请再次输入密码");
                form.reader_againPassword.select();
                return false;
            }
            if(form.reader_password.value !== form.reader_againPassword.value )
            {
                alert("输入的两次密码不相同！");
                return false;
            }

            return true;
        }
    </script>


</head>
<body>
<?php
require_once  'db_connect.php';
if(isset($_POST['submit'])) {

    $id=$_POST['reader_id'];
    $username=$_POST['reader_username'];
    $password=$_POST['reader_password'];

    $sql="insert into reader(reader_id,reader_username,reader_password) VALUES ('$id','$username','$password')";
    $result=mysql_query($sql);
    if($result){
        if(mysql_affected_rows()==1)
        ?>
        <script type="text/javascript">
            alert("注册成功！快去登录吧！！");
            window.location.href="indexs.php";
        </script>
    <?php
    }
    else
    {
    ?>
        <script type="text/javascript">
            alert("注册失败！");
            history.back();
        </script>
        <?php
    }
}


?>


<div class="container cm-container">
    <h3 class="text-center"><label style="color: #050629; margin-left: 30px; font-size: larger">图书管理系统</label></h3>
    <hr />
    <div class="login">
        <span style="color:#050629;">注&emsp;&emsp;册</span>

        <form action="#" name="form" method="post">
            <div class="input-group">
                <div class="input-group-addon">学&emsp;&emsp;号</div>
                <input name="reader_id"   placeholder="请输入学号"/>
            </div>
            <br />
            <div class="input-group">
                <div class="input-group-addon">昵&emsp;&emsp;称</div>
                <input name="reader_username"   placeholder="请输入昵称"/>
            </div>
            <br />

            <div class="input-group">
                <div class="input-group-addon">密&emsp;&emsp;码</div>
                <input name="reader_password" type="password" placeholder="请输入密码"/>
            </div>
            <br />
            <div class="input-group">
                <div class="input-group-addon">确认密码</div>
                <input name="reader_againPassword" type="password" placeholder="请再次输入密码"/>
            </div>
            <br />
            <input type="submit" id="btn_submit" name="submit" onclick="return checkit(form);" value="注册" >

        </form>
    </div>
</div>
</body>
</html>