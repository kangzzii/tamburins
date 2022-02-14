<?php
include "include.php";
$m_no=$_GET["m_no"];
$c_no=$_GET["c_no"];
$numb=$_GET["numb"];
$sql="update cart set numb=$numb where m_no=$m_no and c_no=$c_no";
mysqli_query($conn,$sql);

?>
    <script>
        alert("수량이 변경 되었습니다.");
        location.href = document.referrer;
    </script>