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
        #addBook{
            margin: auto auto;
            background: rgba(112, 148, 171, 1);
            border-radius: 5px 5px 5px 5px;
            width: 55px;
            height:25px;
            text-align: center;
            font-size: 18px;
        }
        #inquire input,img
        {
            vertical-align:middle;
            margin:6px 5px;
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
<!--    <script type="text/javascript">-->
<!--        function chaxun() {-->
<!--            if(form1.inquire.value=="")-->
<!--            {-->
<!--                alert("请输入要查询的书名！");-->
<!--                form1.inquire.select();-->
<!--                return false;-->
<!--            }-->
<!--            return true;-->
<!--        }-->
<!--    </script>-->
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
                <h1>图书浏览</h1>
<!--                <form action="#" method="post" name="form1" enctype="multipart/form-data">-->
<!--                    <div id="inquire">-->
<!--                        <input type="text" name="inquire" placeholder="请输入要查找的书名">-->
<!--                        <img src="image/chaxun%20.png"  onclick="return chaxun();">-->
<!--                    </div>-->
<!--                </form>-->
            </div>

            <table width="1180" height="30" border="1px" cellspacing="0" cellpadding="0">

                <tr id="table_head">
                    <td>书本编号</td>
                    <td>书名</td>
                    <td>书本类型</td>
                    <td>价格 /元</td>
                    <td>作者</td>
                    <td>库存</td>
                    <td>操作</td>
                </tr>

                <?php
                require_once 'db_connect.php';
                $pageSize=10;
                $sql="select * from book";
                $results=mysql_query($sql);
                $pageMaxNumber=ceil((float)mysql_num_rows($results)/$pageSize);
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }else{
                    $page=1;
                }
                $lastPage=$page-1;
                $nextPage=$page+1;
                mysql_free_result($results);
                $pageBegin =($page-1)* $pageSize;
                $sql="select book.book_id,book.book_name,book.book_type,
                book.book_price,book.book_author,book.book_num from book order by book_id ASC  limit 
                {$pageBegin},{$pageSize}";
                $results=mysql_query($sql);
                while ($row=mysql_fetch_assoc($results)){
                    echo <<<STR
            <tr>
                <td>{$row['book_id']}</td>
                <td>{$row['book_name']}</a></td>
                <td>{$row['book_type']}</td>
                <td>{$row['book_price']}</td>
                <td>{$row['book_author']}</td>
                <td>{$row['book_num']}</td>
                <td>
                    <a href="delBook.php?book_id={$row['book_id']}">删除</a>
                    <a href="borrowBook.php?book_id={$row['book_id']}">借阅</a>
                </td>

STR;

                }

                ?>
            </table>
            <div id="paging">
                <?php
                if($page>1){
                    echo <<<STR
            <a href="book.php?page={$lastPage}">上一页</a>
STR;

                }
                if($page<$pageMaxNumber){
                    echo <<<STR
            <a href=book.php?page={$nextPage}>下一页</a>
STR;

                }
                ?>
            </div>
            <br/>
            <div id="addBook">
                <a href="addBook.php">添加</a>
            </div>
    </div>

</body>
</html>

