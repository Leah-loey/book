
<html>
<head lang="zh">
    <meta charset="utf-8">
    <title>图书管理系统</title>
    <style type="text/css">
        body
        {
            background-image: url("image/index.jpg");
            background-size: 100% 100%;

        }
        #top
        {
            border-radius: 15px;
            width:1200px;
            height:65px;
            margin:5px auto;
            font-size:14px;
            font-weight: bold;
            background: rgba(74,104,114,0.7);
        }
        #top img
        {
            float:left;
            margin-left:20px;
            margin-top:8px;
            margin-right:30px;
        }
        #top1,#top1 li ul{
            list-style-type:none;
        }
        #top1 li{
            float: left;
            text-align:center;
            position: relative;
        }
        #top1 li a:link,#top1 li a:visited
        {
            display:block;
            text-decoration:none;
            color:#000;
            width:56px;
            height:5px;
            line-height:5px;
            /*border:1px solid #FFF;*/
            padding:7px;
            margin-top:25px;
            margin-left: 150px;
        }
        #top1 li a:hover
        {
            border-radius: 20px;
            color: #f1fff5;
            background: #77a7fe;
        }
        #table
        {

            float: left;
            text-align:center;
            position: relative;
            margin:5px 30px;
            font-size:14px;
            border-radius: 20px;
            padding:10px;
            background: rgba(251, 255, 252, 0.5);
        }

        #table h1
        {
            font-size: 30px;
            color: #050629;
            letter-spacing: 50px;
            /*background: rgba(60, 223, 255, 0.5);*/
        }
        #table td
        {
            text-align:center;


        }
        #table_head
        {
            font-weight: bold;
            font-size: 18px;
            background: rgba(5, 89, 156, 0.3);
        }
        h2{
            color: #050629;
            letter-spacing: 20px;
        }
        #exit
        {
            float: right;
            background: rgba(251, 255, 252, 0.4);
            border-radius: 5px 5px 5px 5px;
            margin-right: 10px;
            margin-top: 30px;
            width: 90px;
            height:30px;
        }

    </style>
</head>
<body>
<div id="top">
    <img src="image/logo.png">
    <ul id="top1">
        <li>
            <a href="book.php">图书浏览</a>
        </li>
        <li>
            <a href="reader.php">个人中心</a>
        </li>
        <li>
            <a href="inquireBook.php">图书查询</a>
        </li>
    </ul>
    <input type="button" name="exit"  id="exit" value="退出登录" onclick="window.location.href='index.php'" />
</div>
<div id="table">
    <div>
        <h1>个人中心</h1>

    </div>
    <table width="1180" height="30" border="1px" cellspacing="0" cellpadding="0">
        <hr />
        <h2>基本信息</h2>
        <tr id="table_head">
            <td>学号</td>
            <td>姓名</td>
            <td>性别</td>
            <td>专业</td>
            <td>操作</td>
        </tr>
        <?php
        session_start();
//        error_reporting(0);
        require_once 'db_connect.php';
        $username=$_SESSION['reader_username'];

        $sql="select reader.reader_id,reader.reader_username,reader.reader_gender,
                reader.reader_profession from reader where reader_username='{$username}'";
        $results=mysql_query($sql);
        while ($row=mysql_fetch_assoc($results)){
            echo <<<STR
            <tr>
                <td>{$row['reader_id']}</td>
                <td>{$row['reader_username']}</a></td>
                <td>{$row['reader_gender']}</td>
                <td>{$row['reader_profession']}</td>
                <td>
                    <a href="upReader.php?reader_id={$row['reader_id']}">修改</a>
                </td>

STR;

        }
        ?>
    </table>

    <table width="1180" height="30" border="1px" cellspacing="0" cellpadding="0">
        <h2>图书借阅情况</h2>
        <tr id="table_head">
            <td>书本编号</td>
            <td>书名</td>
            <td>书本类型</td>
            <td>价格 /元</td>
            <td>作者</td>
            <td>操作</td>
        </tr>
        <?php

        require_once 'db_connect.php';


        $sql1="select book.book_id,book.book_name,book.book_type,
                book.book_price,book.book_author,book.book_num,reader.reader_id from reader,book 
                where reader.book_id=book.book_id and reader.reader_username='{$username}'";
        $result=mysql_query($sql1);
        while ($bok=mysql_fetch_assoc($result)){
            echo <<<STR
            <tr>
                <td>{$bok['book_id']}</td>
                <td>{$bok['book_name']}</a></td>
                <td>{$bok['book_type']}</td>
                <td>{$bok['book_price']}</td>
                <td>{$bok['book_author']}</td>
                <td>
                    <a href="retBook.php?reader_id={$bok['reader_id']}">还书</a>
                </td>

STR;

        }

        ?>
    </table>

</body>
</html>

