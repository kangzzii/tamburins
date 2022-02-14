<?php
include "include.php";
// 비회원 sql
$sql="select * from memb order by m_no desc limit 0,1";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$m_no=$row["m_no"]+1;
$date=date("Ymd");
$id="$date$m_no";
$sql2="insert into memb (id) values ($id)";
mysqli_query($conn,$sql2);

$_SESSION["id"]=$id;
?>
<meta http-equiv="refresh" content="0,url='index.php'">