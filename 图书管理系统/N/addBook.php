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
            padding:15px;
            margin-top:25px;
            margin-left: 200px;
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
        #add
        {
            margin: 5px auto;
            padding: 15px;
            width: 200px;
            height: 360px;
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
        <h1>添加图书</h1>

    </div>

    <table width="1180" height="30" border="0px" cellspacing="0" cellpadding="0">
        <hr />
    </table>

<?php
if(isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $book_name=$_POST['book_name'];
    $book_type=$_POST['book_type'];
    $book_price = $_POST['book_price'];
    $book_author=$_POST['book_author'];
    $book_num=$_POST['book_num'];
    require_once 'db_connect.php';

    $sql="insert into book (book_id,book_name,book_type,book_price,book_author,book_num) values 
    ('{$book_id}','{$book_name}','{$book_type}','{$book_price}','{$book_author}','{$book_num}')";
    echo $sql;

    if (mysql_query($sql)){
        echo "111";
        if(mysql_affected_rows() == 1){
            echo "222";
            echo <<<STR
  	<script type="text/javascript">
  	alert('添加成功!');
  	window.location.href='book.php';
  	</script>
STR;
        }

    }else{
        echo mysql_error();
    }
    mysql_close();
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post">
    <div id="add">
        书本编号<input type ="text" name ="book_id"/><br/>
        <input type="hidden" name="authorid" value="1" /><br/>
        书&emsp;&emsp;名<input type ="text" name ="book_name"/><br/>
        <input type="hidden" name="authorid" value="1" /><br/>
        书本类型<input type ="text" name ="book_type"/><br/>
        <input type="hidden" name="authorid" value="1" /><br/>
        价格 /元<input type ="text" name ="book_price"/><br/>
        <input type="hidden" name="authorid" value="1" /><br/>
        作&emsp;&emsp;者<input type ="text" name ="book_author"/><br/>
        <input type="hidden" name="authorid" value="1" /><br/>
        库&emsp;&emsp;存<input type ="text" name ="book_num"/><br/>
        <input type="hidden" name="authorid" value="1" /><br/>

<!--            留言内容：<textarea name ="content"></textarea><br/>-->
        <input type="submit" name ="submit" value ="确定添加" />
        <a href="book.php"><input type="button"  name ="exit"  value ="取消" ></a>
    </div>

</form>
</body>
</html>