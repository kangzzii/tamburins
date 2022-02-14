<?php
include "include.php";
$name=$_POST["name"];
$id=$_POST["id"];
$sql="select * from memb where name='$name' and id='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
if(isset($row["id"])){
    $pw=$row["pw"];
    ?>
    <script>
    alert("고객님의 계정은 <?php echo $pw?> 입니다.");
    location.href='login.php';
    </script>
<?php
}else{
    ?>
    <script>
    alert("입력이 올바르지 않습니다.");
    history.go(-1);
    </script>
<?php
}
?>