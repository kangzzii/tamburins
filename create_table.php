<?php
include "include.php";
$sql1="
create table memb (
    m_no int PRIMARY KEY AUTO_INCREMENT
    ,id varchar(20)
    ,pw varchar(20)
    ,name varchar(20)
    ,tel varchar(20)
    ,birthday varchar(20)
    ,addr varchar(100)
    ,opt1 int 
    ,opt2 int 
    ,opt3 int 
    )";
$sql2="create table point (
    no int AUTO_INCREMENT PRIMARY KEY
    ,m_no int 
    ,content varchar(100)
    ,usePoint INT
    ,point int 
    ,date varchar(20) 
    ,opt2 int 
    )";
$sql3="create table prod(
    no int AUTO_INCREMENT PRIMARY KEY
    ,name varchar(100)
    ,price int 
    ,kinds varchar(20)
    ,img varchar(100)
    ,content text 
    ,smell varchar(100)
    ,size varchar(20)
    ,keyword varchar(100)
 	,poster int default 0
    ,howtouse text
    ,madeby text 
    ,opt1 int 
    ,opt2 int 
    ,opt3 int
)";
$sql4="create table subimg(
	no int PRIMARY KEY AUTO_INCREMENT
    ,p_no int 
    ,subimg text
)";
$sql5="create table cart(
    c_no int AUTO_INCREMENT PRIMARY KEY
        ,m_no int 
        ,p_no INT
        ,numb int 
        ,price int 
        ,opt1 int 
        ,opt2 int 
        ,opt3 int
    )";
$sql6="create table shop_order(
	o_no int AUTO_INCREMENT PRIMARY KEY
    ,m_no int 
    ,date varchar(20)
    ,pay varchar(20)
    ,addr varchar(100)
    ,name varchar(20)
    ,tel varchar(20)
    ,opt1 int 
    ,opt2 int 
    ,opt3 int 
)";
$sql7="create table order_detail(
	no int AUTO_INCREMENT PRIMARY KEY
    ,c_no int 
    ,p_no INT
    ,m_no int 
    ,numb int 
    ,price int 
    ,opt1 int 
    ,opt2 int 
    ,opt3 int 
)";
$sql8="create table review(
    re_no int AUTO_INCREMENT PRIMARY KEY
    ,p_no int 
    ,m_no int 
    ,star int 
    ,o_no int 
    ,date varchar(20)
    ,content text
    ,opt1 int 
    ,opt2 int 
    ,opt3 int 
)";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql4);
mysqli_query($conn,$sql5);
mysqli_query($conn,$sql6);
mysqli_query($conn,$sql7);
mysqli_query($conn,$sql8);
echo "테이블 생성완료~"
?>