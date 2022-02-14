<?php
include "include.php";
$name = $_POST["name"];
$price = $_POST["price"];
$kinds = $_POST["kinds"];
if(isset($_POST["size"])){
    $size = $_POST["size"];
}else{
    $size=null;
}
$content = $_POST["content"];
if(isset($_POST["howtouse"])){   
    $howtouse=$_POST["howtouse"];
}
if(isset($_POST["madeby"])){   
    $madeby=$_POST["madeby"];
}
if(isset($_POST["smell"])){   
    $smell=$_POST["smell"];
}else{
    $smell=null;
}
$keyword =$_POST["keyword"];
$upload=$_SERVER["DOCUMENT_ROOT"]."/file/";
$usfile=basename($_FILES["img"]["name"]);
$uploadfile=$upload.$usfile;
move_uploaded_file($_FILES["img"]["tmp_name"],$uploadfile);
//포스터
if(isset($_POST["poster"])){
    $poster=$_POST["poster"];
$sql="insert into prod (name,kinds,img,poster) values ('$name','$kinds','$usfile',1)";
}else{
$sql="insert into prod (name,price,kinds,smell,howtouse,madeby,size,content,img,keyword) values ('$name',$price,'$kinds','$smell','$howtouse','$madeby','$size','$content','$usfile','$keyword') ";
}
mysqli_query($conn,$sql);
//
$sql3="select * from prod order by no desc limit 0,1";
$rs=mysqli_query($conn,$sql3);
$row=mysqli_fetch_array($rs);
$p_no=$row["no"];
//여러개 파일 업로드
if (isset($_FILES["subimg"])){
$subimg=$_FILES["subimg"];
$count = count($subimg["name"]);
for($i=0;$i<$count;$i++){
    $filename=$_FILES["subimg"]["name"][$i];
    $sql="insert into subimg (p_no,subimg) values($p_no,'$filename')";
    mysqli_query($conn,$sql);
    move_uploaded_file($_FILES["subimg"]["tmp_name"][$i],$upload.$filename);
}
}
?>