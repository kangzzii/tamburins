<?php
include "include.php";
$name=$_POST["name"];
$tel=$_POST["tel"];
$addr=$_POST["addr"];
$id=$_SESSION["id"];
                        $noncheck="select * from memb where id='$id'";
                        $noncheckrs=mysqli_query($conn,$noncheck);
                        $noncheckrow=mysqli_fetch_array($noncheckrs);
                        if($noncheckrow["birthday"]!=""){
$point=$_POST["point"];
                        }
$pay=$_POST["pay"];
$date=date("Y-m-d");
// echo $point;
$sql="select * from memb where id='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$m_no=$row["m_no"];
$sql2="select * from cart where m_no=$m_no";
$rs2=mysqli_query($conn,$sql2);

//shop_order insert
$ordersql="insert into shop_order (m_no,date,name,pay,tel,addr) values ($m_no,'$date','$name','$pay','$tel','$addr')";
mysqli_query($conn,$ordersql);

//order_detail insert
$findsql="select * from shop_order where m_no=$m_no order by o_no desc limit 0,1";
$findrs=mysqli_query($conn,$findsql);
$findrow=mysqli_fetch_array($findrs);

$c_no=$findrow["o_no"];

$findPsql="select * from cart where m_no=$m_no";
$findPrs=mysqli_query($conn,$findPsql);
while($findProw=mysqli_fetch_array($findPrs)){
    $p_no=$findProw["p_no"];
    $numb=$findProw["numb"];
    $price=$findProw["price"];
    $orderDsql="insert into order_detail (c_no,p_no,m_no,numb,price) values ($c_no,$p_no,$m_no,$numb,$price)";
    mysqli_query($conn,$orderDsql);
}
if($noncheckrow["birthday"]!=""){
//point!
$pointsql="select * from point where m_no=$m_no order by no desc limit 0,1";
$pointrs=mysqli_query($conn,$pointsql);
$pointrow=mysqli_fetch_array($pointrs);
$endpoint=$pointrow["point"];
//update point
if($point!=0){
    $lastpoint=$endpoint-$point;
    $endsql="insert into point (m_no,content,usePoint,point,date) values ($m_no,'포인트 사용',$point,$lastpoint,'$date')";
    mysqli_query($conn,$endsql);
}
                    }
//cart 없애기
$delcart="delete from cart where m_no=$m_no";
mysqli_query($conn,$delcart);
if($noncheckrow["birthday"]!=""){
?>
<script>
    alert("결제가 완료되었습니다.");
    location.href='mypage.php';
</script>
<?php }else{ ?>
    <script>
    alert("결제가 완료되었습니다.");
    location.href='mypage.php';
    </script> 
<?php
} ?>