<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改基本信息</title>
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
        hr
        {
            display: block;
            unicode-bidi: isolate;
            margin-block-start: 0.5em;
            margin-block-end: 0.5em;
            margin-inline-start: auto;
            margin-inline-end: auto;
            overflow: hidden;
            border-style: inset ;
            border-width: 2px;
        }
        #upReader
        {
            margin: 5px auto;
            padding: 15px;
            width: 200px;
            height: 260px;
            border-radius: 10px;
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

<?php

require_once "db_connect.php";
error_reporting(0);
$id=$_GET['reader_id'];
$sql="select * from reader where reader_id ={$id}";
$results =mysql_query($sql);
$row =mysql_fetch_assoc($results);

mysql_free_result($results);


if(isset($_POST['submit'])){
    $id =$_POST['reader_id'];
    $name =$_POST['reader_username'];
    $gender =$_POST['reader_gender'];
    $profession =$_POST['reader_profession'];

    $sql ="update reader set reader_id ='{$id}',reader_username ='{$name}',reader_gender ='{$gender}',
          reader_profession ='{$profession}'where reader_id ={$id}";
    if(mysql_query($sql) && mysql_affected_rows() ==1 ){
        echo <<<STR
		<script type ="text/javascript">
		alert('修改成功!');
		window.location.href='reader.php';

		</script>
STR;
    }else{
        echo mysql_error();

    }

}
//关闭数据库连接
mysql_close();
?>

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
        <h1>修改基本信息</h1>

    </div>

    <table width="1180" height="30" border="0px" cellspacing="0" cellpadding="0">
        <hr />
    </table>
<form action="" method ="post">
    <div id="upReader">
        编&emsp;&emsp;号<input type ="text" name ="reader_id" value="<?php echo $row['reader_id']; ?>"/><br/>
        姓&emsp;&emsp;名<input type ="text" name ="reader_username" value="<?php echo $row['reader_username']; ?>"/><br/>
        性&emsp;&emsp;别<input type ="text" name ="reader_gender" value="<?php echo $row['reader_gender']; ?>"/><br/>
        专&emsp;&emsp;业<input type ="text" name ="reader_profession" value="<?php echo $row['reader_profession']; ?>"/><br/>
    <br/>
        <input type="submit" name ="submit" value ="更新"/>
        <a href="reader.php"><input type="button"  name ="exit"  value ="取消" ></a>
    </div>

</form>
</body>
</html>
