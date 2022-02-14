<?php
include "include.php";
// 회원가입 sql
$id = $_POST["id"];
$pw = $_POST["pw"];
$name = $_POST["name"];
$tel = $_POST["tel"];
$birthday =$_POST["birthday"];
$addr=$_POST["addr"];
$sql = "update memb set pw='$pw',name='$name',tel='$tel',birthday='$birthday',addr='$addr' where id='$id'";
mysqli_query($conn,$sql);

session_destroy();
?>
<script>
    alert("회원 정보가 수정 되었습니다.자동 로그아웃 됩니다.다시 로그인 해주세요.");
</script>
    <meta http-equiv="refresh" content="0,url='login.php'">