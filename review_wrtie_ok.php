<?php
include "include.php";
$p_no=$_POST["p_no"];
$o_no=$_POST["c_no"];
$m_no=$_POST["m_no"];
$star=$_POST["review"];
$date=date("Y-m-d");
$content=$_POST["reviewcontent"];

$sql="insert into review (p_no,o_no,m_no,star,date,content) values ($p_no,$o_no,$m_no,$star,'$date','$content')";
mysqli_query($conn,$sql);
//point 추가
$sql2="select * from point where m_no=$m_no order by no desc limit 0,1";
$rs2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($rs2);
$point=$row2["point"]+100;
$sql3="insert into point (m_no,content,usePoint,point,date) values($m_no,'리뷰 작성 포인트',100,$point,'$date')";
mysqli_query($conn,$sql3);
?>

<script>
    alert("리뷰작성이 완료되었습니다. 100포인트가 추가 되었습니다.");
</script>
    <meta http-equiv="refresh" content="0,url='tap_review.php'">