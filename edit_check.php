<?php
include "include.php";
$id=$_SESSION["id"];
$pw=$_POST["pw"];
$sql="select * from memb where id='$id' and pw='$pw'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if(isset($row["id"])){
    ?>
    <script>
        location.href='edit_memb.php?pwchk=ok'
    </script>
    <?php
}else{
    ?>
    <script>
        alert("비밀번호가 틀렸습니다.");
        history.go(-1);
    </script>
    <?php
}
?>