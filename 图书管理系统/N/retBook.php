<head lang="zh">
    <meta charset="utf-8">

    <?php
    if(isset($_GET['reader_id']) && !empty($_GET['reader_id'])){
        $id =$_GET['reader_id'];
    }else{
        header("location:reader.php");
    }

    require_once "db_connect.php";
    $sql="update reader set book_id='' where reader_id ='{$id}'";
    $result =mysql_query($sql);
    if($result ==true){
        echo <<<STR
    <script type="text/javascript">
    alert("还书成功!");
    window.location.href="reader.php";
    </script>
STR;
        exit;
    }else{
        echo <<<STR
    <script type="text/javascript">
    alert("还书失败!");
    window.location.href="reader.php";
    </script>
STR;
        exit;
    }
    mysql_close();

    ?>

</head>
