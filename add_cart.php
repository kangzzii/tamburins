<?php
include "include.php";
if(!isset($_SESSION["id"])){
    ?>
    <script>
        alert("로그인 후 이용 해 주세요.");
        history.go(-1);
    </script>
    <?php
}else{
$id=$_SESSION["id"];
$sql="select * from memb where id='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$m_no=$row["m_no"];
$p_no=$_POST["p_no"];
$numb=$_POST["num"];
$price=$_POST["price"];
$sql2="insert into cart (m_no,p_no,numb,price) values ($m_no,$p_no,$numb,$price)";
mysqli_query($conn,$sql2);
?>
    <script>
        alert("장바구니에 추가 되었습니다.");
        location.href = document.referrer;
    </script>
<?php
}
?>
