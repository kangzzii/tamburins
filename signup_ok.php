<?php
include "include.php";
// 회원가입 sql
$id = $_POST["id"];
$pw = $_POST["pw"];
$name = $_POST["name"];
$tel = $_POST["tel"];
$birthday =$_POST["birthday"];
$point = 3000;
$sql = "insert into memb (id,pw,name,tel,birthday) values ('$id','$pw','$name','$tel','$birthday')";
mysqli_query($conn,$sql);

// 포인트 추가 sql
$sql2="select m_no from memb where id='$id'";
$rs2=mysqli_query($conn,$sql2);
$row=mysqli_fetch_array($rs2);
$m_no=$row["m_no"];
$date=date("Y-m-d");
$sql3="insert into point (m_no,content,usePoint,point,date) values($m_no,'회원 가입 축하 포인트',$point,$point,'$date')";
mysqli_query($conn,$sql3);

?>
<script>
    alert("회원가입을 환영합니다.즉시 사용가능한 3000포인트가 적립되었습니다.");
</script>
    <meta http-equiv="refresh" content="0,url='login.php'">