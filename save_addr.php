<?php
include "include.php";
$id=$_GET["id"];
$addr=$_GET["addr"];
$sql="update memb set addr='$addr' where id='$id'";
mysqli_query($conn,$sql);
?>
    <script>
        alert("기본 배송지로 설정되었습니다.");
        location.href = document.referrer;
    </script>