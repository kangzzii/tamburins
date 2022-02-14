<?php
include "include.php";
$id = $_POST["id"];
$pw = $_POST["pw"];
$sql="select * from memb where id='$id' and pw='$pw'";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($rs);
if(isset($row["id"])){
    $_SESSION["id"]=$row["id"];
    $name=$row["name"];
    ?>
    <script>
        alert("<?php echo $name?>님 환영합니다.");
        location.href='index.php';
    </script>
    <?php
}else{
    ?>
    <script>
        alert("계정 혹은 비밀번호를 확인해주세요.");
        history.go(-1);
    </script>
    <?php
}
?>