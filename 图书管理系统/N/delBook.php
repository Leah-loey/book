<head lang="zh">
    <meta charset="utf-8">

<?php
if(isset($_GET['book_id']) && !empty($_GET['book_id'])){
    $id =$_GET['book_id'];
}else{
    header("location:reader.php");
}

require_once "db_connect.php";
$sql="delete from  book  where book_id =($id)";
$result =mysql_query($sql);
if($result ==true){
    echo <<<STR
    <script type="text/javascript">
    alert("删除成功!");
    window.location.href="book.php";
    </script>
STR;
    exit;
}else{
    echo <<<STR
    <script type="text/javascript">
    alert("删除失败!");
    window.location.href="book.php";
    </script>
STR;
    exit;
}
mysql_close();

?>

</head>
