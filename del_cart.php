<?php
include "include.php";
$no=$_GET["no"];

$id=$_SESSION["id"];
$sql="select * from memb where id='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$m_no=$row["m_no"];

$sql="delete from cart where m_no=$m_no and c_no=$no";
mysqli_query($conn,$sql);

?>
    <script>
        alert("장바구니에서 삭제 되었습니다.");
        location.href = document.referrer;
    </script>
