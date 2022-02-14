<?php
include "include.php";
$id=$_POST["id"];
$sql="select * from memb where id='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if(isset($row["id"])){
    $_SESSION["id"]=$row["id"];
    ?>
    <script>
        opener.location.href="mypage.php";
        self.close();
    </script>
    <?php
}else{
    ?>
    <script>
        alert("주문번호를 확인해주세요.");
        history.go(-1);
    </script>
    <?php
}
?>