<html>
<head lang="zh">
    <meta charset="UTF-8">
    <title>图书管理系统</title>
    <title>index</title>
    <style>
        body{
            background-image: url("image/index.jpg");
            background-size: 100% 100%;
        }
        #top{
            color: #ffffff;
            font-weight: bold;
            width: 100%;
        }
        #forward{
            margin:0px auto;
            height: 500px;
            padding-top: 30px;
            text-align: center;
            vertical-align: middle;
            /*background: #0F0;*/
        }
        #welcome{
            width: 100%;
            display: inline-block;
            text-align: center;
            /*background: #f00;*/
        }
        #welcome p {
            font-size: 32px;
            font-family: serif;
            font-weight: bold;
            opacity: 0.6;
        }
        a {
            position: relative;
            top: 160px;
            background-color: #0AA1ED;
            border: none;
            width: 180px;
            color: white;
            padding: 20px 15px;
            text-align: center;
            font-size: 20px;
            border-radius: 8px;
            display: inline-block;
        }
        a span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        a span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        a:hover span {
            padding-right: 25px;
        }

        a:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>
<body >
<!-- 页面顶部-->
<header id="top">
    <div id="welcome">
        <p>欢迎使用!</p>
    </div>
</header>
<!--选择跳转部分-->
<div id="forward">
    <a href="indexs.php"><span>我要登录</span></a>&nbsp;
    <a href="zhuce.php"><span>我要注册</span></a>
</div>
</body>
</html>
