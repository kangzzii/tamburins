<?php
include "include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tamburins</title>
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="script.js" defer></script>
    <script src="index_script.js" defer></script>
    <!-- font -->
    <link href="https://fonts.cdnfonts.com/css/butler-stencil" rel="stylesheet">
    <!-- 한글 font(일반 바탕체는 맥북에서는 안먹음) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang&display=swap" rel="stylesheet">
    <!-- 파비콘 -->
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
 <!-- 헤더 시작 -->
    <header>
        <div id="submenu_back"></div>
        <div id="header_wrap">
            <!-- 메뉴 시작 -->
            <ul id = "menu">
                <li>Shop
                    <ul class="submenu">
                        <li><p onclick="location.href='prod.php?kinds=1&title=Hand'">Hand</p>
                            <ul class="submenu_sub">
                                <li onclick="location.href='prod.php?kinds=2&title=Tube Hand'">Tube Hand</li>
                                <li onclick="location.href='prod.php?kinds=3&title=Perfume Hand'">Perfume Hand</li>
                                <li onclick="location.href='prod.php?kinds=4&title=Handcream'">Handcream</li>
                            </ul>
                        </li>
                        <li onclick="location.href='prod.php?kinds=5&title=Scent Object'">Scent Object</li>
                        <li onclick="location.href='prod.php?kinds=6&title=Multi Fragrance'">Multi Fragrance</li>
                        <li onclick="location.href='prod.php?kinds=7&title=Hand sanitizer'">Hand sanitizer</li>
                        <li onclick="location.href='prod.php?kinds=8&title=Body Hand'">Body & Hand</li>
                    </ul>
                </li>
                <li onclick="location.href='gift_sample.php?kinds=10'">Gift</li>
                <li onclick="location.href='gift_sample.php?kinds=11'">Sample</li>
                <li onclick="location.href='store.php'">Store</li>
            </ul>
            <!-- 메뉴 끝 -->
            <!-- 유저 메뉴 시작 -->
            <ul id = "usmenu">
                <?php
                if(!isset($_SESSION["id"])){
                ?>
                <li onclick="location.href='login.php'">Acount</li>
                <?php } else{ ?>
                <li onclick="location.href='logout.php'">Logout</li>
                <?php } ?>
                <li>Cart
                    <div id="cart_wrap">
                        <!-- 카트 db -->
                        <?php
                        if(isset($_SESSION["id"])){
                            $id=$_SESSION["id"];
                            $sql="select * from memb where id='$id'";
                            $rs=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_array($rs);
                            $m_no=$row["m_no"];
                            $sql2="select * from cart,prod where cart.m_no=$m_no and cart.p_no=prod.no";
                            $rs2=mysqli_query($conn,$sql2);
                            while($row=mysqli_fetch_array($rs2)){
                                $fname="/file/".$row["img"];
                                $p_no=$row["p_no"];
                                $c_no=$row["c_no"];
                        ?>
                        <ul id="cart_prod">
                            <li>
                                <img src="<?php echo $fname?>">
                            </li>
                            <li>
                                <table class="cart_text">
                                    <tr>
                                        <th><?php echo $row["name"]?></th>
                                    </tr>
                                    <tr>
                                        <td style="line-height:20px">
                                            <?php echo $row["size"]?><br>
                                            <span style="font-size:.8em"><?php echo $row["smell"]?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="del_cart.php?no=<?php echo $c_no?>">삭제</a>
                                            <?php echo $row["numb"]?>개,
                                            ₩ <?php echo $row["price"]*$row["numb"]?>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                        <?php } ?>
                        <input type="button" value="Check out" class="cart_bt" onclick="location.href='cart.php'">
                        <?php }else{ ?>
                            <a href="nonmemb.php">비회원으로 주문 하기</a>
                        <?php } ?>
                    </div>
                </li>
                <?php if(isset($_SESSION["id"])){
                    $id=$_SESSION["id"];
                    $noncheck="select * from memb where id='$id'";
                    $noncheckrs=mysqli_query($conn,$noncheck);
                    $noncheckrow=mysqli_fetch_array($noncheckrs);
                    if($noncheckrow["birthday"]!=""){
                    ?>
                <li onclick="location.href='mypage.php'">Mypage</li>
                <?php } }?>
                <li><img src="img/searchicon.png">
                    <div id="search_wrap">
                        <form name="searchfrm" method="post" action="search.php">
                            <input type="text" name="search" placeholder="검색어를 입력하세요" class="search_bar">
                            <input type="button" value="search" class="search_bt" onclick="searchh()">
                            <script>
                                function searchh(){
                                    if(searchfrm.search.value==""){
                                        alert("검색어를 입력하세요.");
                                        searchfrm.search.focus();return false;
                                    }else{
                                        document.searchfrm.submit();
                                    }
                                }
                            </script>
                        </form>
                    </div>
                </li>
            </ul>
            <!-- 유저 메뉴 끝 -->
            <!-- 로고 시작 -->
            <div id="logo" onclick="location.href='index.php'">
                <img src="img/logo_small.png">
            </div>
            <!-- 로고 끝 -->
        </div>
    </header>
    <!-- 헤더 끝 -->
    <!-- 컨텐츠 시작 -->
    <div id="wrap">
        <form name="orderfrm">
            <div id="buy">
                <div id ="cart_buy">
                    <!-- cart db 시작 -->
                    <?php
                    $id=$_SESSION["id"];
                    $cartsql="select * from memb where id='$id'";
                    $cartrs=mysqli_query($conn,$cartsql);
                    $cartrow=mysqli_fetch_array($cartrs);
                    $m_no=$cartrow["m_no"];
                    $cartsql2="select * from cart,prod where cart.m_no=$m_no and cart.p_no=prod.no";
                    $cartrs2=mysqli_query($conn,$cartsql2);
                    $cartCntSql="select count(*)as cnt from cart where m_no=$m_no";
                    $cartCntrs=mysqli_query($conn,$cartCntSql);
                    $cartCntrow=mysqli_fetch_array($cartCntrs);
                    ?>
                    <h1>
                        Item (<?php echo $cartCntrow["cnt"]?>)
                    </h1>
                    <ul class="order_list">
                        <?php
                        while($cartrow2=mysqli_fetch_array($cartrs2)){
                            $fname="/file/".$cartrow2["img"];
                            $p_no=$cartrow2["p_no"];
                            $c_no=$cartrow2["c_no"];
                            $numbb=$cartrow2['numb']
                        ?>
                        <li>
                            <div class="order_img" onclick="location.href='prod_detail.php?no=<?php echo $p_no?>'">
                                <img src="<?php echo $fname?>">
                            </div>
                            <table class="order_detail">
                                <tr>
                                    <th style="cursor:pointer"onclick="location.href='prod_detail.php?no=<?php echo $p_no?>'"><?php echo $cartrow2["name"]?></th>
                                    <th><?php echo $cartrow2["price"]?>원</th>
                                </tr>
                                <tr>
                                    <th>
                                        <?php
                                        $kinds=$cartrow2["kinds"];
                                        if($kinds==2){echo"튜브핸드";}
                                        else if($kinds==3){echo"퍼퓸핸드";}
                                        else if($kinds==4){echo"체인핸드";}
                                        else if($kinds==5){echo"손소독제";}
                                        else if($kinds==6){echo"향오브젝트";}
                                        else if($kinds==7){echo"바디 핸드대용량";}
                                        else if($kinds==8){echo"룸스프레이";}
                                        else if($kinds==10){echo"선물";}
                                        else if($kinds==11){echo"샘플키트";}
                                        ?>
                                    </th>
                                    <th>
                                        <?php echo $cartrow2["smell"]?>
                                    </th>
                                </tr>
                                <tr>
                                    <th><?php echo $cartrow2["size"]?></th>
                                    <td><a href="del_cart.php?no=<?php echo $c_no?>">삭제</a></td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="button" value="-" class="order_numb_bt" onclick="del<?php echo $c_no?>()">
                                        <input type="text" name="numb<?php echo $c_no?>" value="<?php echo $numbb?>" class="order_text" >
                                        <input type="button"value="+"class="order_numb_bt"onclick="plus<?php echo $c_no?>()">
                                        <script>
                                        var numm<?php echo $c_no?> = parseInt(orderfrm.numb<?php echo $c_no?>.value);
                                        function plus<?php echo $c_no?>() {
                                            numm<?php echo $c_no?> = numm<?php echo $c_no?> + 1;
                                            // alert(numm)
                                            orderfrm.numb<?php echo $c_no?>.value = numm<?php echo $c_no?>;
                                        }
                                        function del<?php echo $c_no?>() {
                                            if (orderfrm.numb<?php echo $c_no?>.value != 1) {
                                            numm<?php echo $c_no?> = numm<?php echo $c_no?> - 1;
                                            // alert(numm)
                                            orderfrm.numb<?php echo $c_no?>.value = numm<?php echo $c_no?>;
                                            } else {
                                            alert("1개 이상부터 구매 가능합니다.");
                                            numm<?php echo $c_no?> = 1;
                                            orderfrm.numb<?php echo $c_no?>.value = numm<?php echo $c_no?>;
                                            }
                                        }
                                        </script>
                                    </th>
                                    <td>
                                        <input type="button" value="수량 수정하기" class="numb_edit_bt" onclick="numbEdit<?php echo $c_no?>(orderfrm.numb<?php echo $c_no?>.value)">
                                        <script>
                                            function numbEdit<?php echo $c_no?>(numm){
                                                location.href="cart_numb_update.php?numb="+numm+"&c_no=<?php echo $c_no?>&m_no=<?php echo $m_no?>";
                                            }
                                        </script>
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div id="buyer">
                    <h1>Summary</h1>
                    <table class="buyer_table">
                        <!-- 금액 sql -->
                        <?php
                        $costsql="select sum(price*numb)as sum from cart where m_no=$m_no";
                        $costrs=mysqli_query($conn,$costsql);
                        $costrow=mysqli_fetch_array($costrs);
                        ?>
                        <tr>
                            <th>주문금액</th>
                            <td><?php echo $costrow["sum"]?>원</td>
                        </tr>
                        <tr>
                            <th>배송비</th>
                            <td>
                                <?php
                                if($costrow["sum"]>=30000){?>
                                0원
                                <?php }else{ ?>
                                    2,500원
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                30,000원 이상은 무료배송입니다.
                            </td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>
                                <?php
                                if($costrow["sum"]>=30000){?>
                                    <?php echo $costrow["sum"];?>원
                                
                                <?php }else{ ?>
                                    <?php echo ($costrow["sum"]+2500); ?>원
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <div class="order_notice">
                                    [설 연휴 배송 및 반품]<br>
                                    1.26(수) 오전 주문건까지 정상 배송 가능하며, 이후 주문 건은 2.3(목)부터 순차 배송됩니다.
                                    <br>
                                    [CJ대한통운 파업지역 배송]<br>
                                    일부 지역에 한하여 배송이 불가합니다. 해당 지역 주문건은 타 택배사로 출고 진행될 예정이나, 출고 지연될 수 있습니다.
                                    <br>
                                    주문일로부터 2~3영업일 이내 출고됩니다.<br>
                                    제품 구매 시 쇼핑백에 제공됩니다. (상품갯수와 관계없이 주문 건당 1개 제공
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" value="Check Out" class="buyer_bt" onclick="location.href='order.php'">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <!-- 컨텐츠 끝 -->
<!-- 푸터시작 -->
    <footer>
        <div id="footer_top">    
            <div id="footer_wrap">
                <ul class="footer_menu">
                    <li>Shop</li>
                    <li onclick="location.href='gift_sample.php?kinds=10'">Gift</li>
                    <li onclick="location.href='gift_sample.php?kinds=11'">Sample</li>
                    <li onclick="location.href='store.php'">Store</li>
                    <?php
                    if(!isset($_SESSION["id"])){
                    ?>
                    <li onclick="location.href='login.php'">Acount</li>
                    <?php } else{ ?>
                    <li onclick="location.href='logout.php'">Logout</li>
                    <?php } ?>
                </ul>
                <ul class="footer_menu2">
                    <li>고객센터</li>
                    <li onclick="location.href='mypage_point_notice.php'">적립금 관련 안내</li>
                    <li onclick="location.href='mypage_faq.php'">자주 묻는 질문</li>
                    <li onclick="location.href='qna.php'">1:1 문의하기</li>
                </ul>
                <ul class="footer_menu2">
                    <li>SNS</li>
                    <li><a href="https://www.instagram.com/tamburinsofficial" target="_blank">Instagram</a></li>
                    <li><a href="https://pf.kakao.com/_RkqIj" target="_blank">KaKaotal</a></li>
                    <li><a href="https://weibo.com/tamburinsofficial" target="_blank">Weibo</a></li>
                    <li><a href="https://www.facebook.com/tamburinsofficial/" target="_blank">Facebook</a></li>
                    <li><a href="https://www.youtube.com/channel/UCih4HS7LsA5e7W54H3A3hUA" target="_blank">Youtube</a></li>
                </ul>
            </div>
            <div id="footer_modal">
                <div id="footer_modal_contet">
                    <div class="footer_modal_close">X</div>
                    <div id="index_title">Shop</div>
                    <ul class="footer_submenu">
                        <li><p onclick="location.href='prod.php?kinds=1&title=Hand'">핸드크림</p>
                            <ul class="footer_submenu_sub">
                                <li onclick="location.href='prod.php?kinds=2&title=Tube Hand'">튜브핸드</li>
                                <li onclick="location.href='prod.php?kinds=3&title=Perfume Hand'">퍼퓸핸드</li>
                                <li onclick="location.href='prod.php?kinds=4&title=Handcream'">체인핸드</li>
                            </ul>
                        </li>
                        <li onclick="location.href='prod.php?kinds=5&title=Scent Object'">향오브젝트</li>
                        <li onclick="location.href='prod.php?kinds=6&title=Multi Fragrance'">룸스프레이</li>
                        <li onclick="location.href='prod.php?kinds=7&title=Hand sanitizer'">손소독제</li>
                        <li onclick="location.href='prod.php?kinds=8&title=Body Hand'">바디&핸드크림대용량</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="footer_buttom">
            <ul class="footer_buttom">
                <li>주)아이아이컴바인드</li>
                <li>사업자등록번호: 119-86-38589</li>
                <li>대표자: 김한국</li>
                <li>서울특별시 마포구 어울마당로5길 41 </li>
                <li>대표번호: 1644-1246</li>
                <li>이메일: cs@tamburins.com</li>
                <li>개인정보 보호 책임자: 박세진</li>
                <li>호스팅 서비스 사업자: Aws</li>
                <li>통신판매업신고: 제 2014-서울마포-1050 호 (<a href="https://www.ftc.go.kr/www/bizCommList.do?key=232">사업자정보확인</a>)</li>
                <li><a href="https://www.tamburins.com/legals/privacy-policy/">개인정보처리방침</a></li>
                <li><a href="https://www.tamburins.com/legals/terms-and-conditions/">이용약관</a></li>
            </ul>
        </div>
            <div class="tamburins">
                © 탬버린즈 &emsp;대한민국
            </div>
        </div>
    </footer>
    <!-- 푸터 끝 -->
</body>
</html>