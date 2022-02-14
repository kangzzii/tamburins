<?php
include "include.php";
$re_no=$_POST["re_no"];
// echo $no;
$star=$_POST["review"];
$date=date("Y-m-d");
$content=$_POST["reviewcontent"];

$sql="update review set star=$star,date='$date',content='$content' where re_no=$re_no";
mysqli_query($conn,$sql);
?>

<script>
    alert("리뷰가 수정되었습니다.");
</script>
    <meta http-equiv="refresh" content="0,url='tap_review.php'">