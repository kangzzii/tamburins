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
        <div id="mypage">
            <!-- 마이페이지 메뉴 -->
            <?php
            $id=$_SESSION["id"];
            $navsql="select * from memb where id='$id'";
            $navrs=mysqli_query($conn,$navsql);
            $navrow=mysqli_fetch_array($navrs);
            $navm_no=$navrow["m_no"];
            $noncheck="select * from memb where id='$id'";
                        $noncheckrs=mysqli_query($conn,$noncheck);
                        $noncheckrow=mysqli_fetch_array($noncheckrs);
                        if($noncheckrow["birthday"]!=""){
            //point sql
            $navpointsql="select * from point where m_no=$navm_no order by no desc limit 0,1";
            $navpointrs=mysqli_query($conn,$navpointsql);
            $navpointrow=mysqli_fetch_array($navpointrs);
            ?>
            <ul class="mypage_nav">
                <li>
                    Mypage<br>
                    <?php echo $navrow["name"]?> 님<span><?php echo $navpointrow["point"]?>P</span>
                </li>
                <li>계정 설정
                    <ul class="mypage_nav_sub">
                        <li onclick="location.href='edit_memb.php'">회원 정보 수정</li>
                        <li onclick="location.href='mypage_point.php'">적립금 현황</li>
                    </ul>
                </li>
                <li>쇼핑정보
                    <ul class="mypage_nav_sub">
                        <li onclick="location.href='mypage.php'">주문 / 배송 </li>
                        <li onclick="location.href='tap_review.php'">상품 리뷰</li>
                    </ul>
                </li>
                <li>고객센터
                    <ul class="mypage_nav_sub">
                        <li onclick="location.href='mypage_point_notice.php'">고객서비스</li>
                        <li onclick="location.href='mypage_faq.php'">자주 묻는 질문</li>
                        <li onclick="location.href='qna.php'">1:1문의하기</li>
                    </ul>
                </li>
            </ul>
            <?php } ?>
            <!-- 마이페이지 메뉴 끝 -->
            <!-- 마이페이지 컨텐츠 시작 -->
            <div id="mypage_content">
                <?php
                if($noncheckrow["birthday"]==""){
                    ?>
                    <div id="nonmemb_side">
                        <h3>회원님의 주문 조회 번호는 <span><?php echo $id?></span>입니다.</h3>
                        주문 조회 번호를 기억하고 있으셔야 이후 주문 조회가 가능합니다.
                    </div>
                        <br><br>
                <?php } ?>
                <?php
                $oo_no=$_GET["o_no"];
                $detailsql="select * from prod,order_detail where c_no=$oo_no and order_detail.p_no=prod.no";
                $detailrs=mysqli_query($conn,$detailsql);
                $datesql="select * from shop_order where o_no=$oo_no";
                $daters=mysqli_query($conn,$datesql);
                $daterow=mysqli_fetch_array($daters);
                ?>
                <fieldset>
                   <legend><?php echo $daterow["date"]?> 구매</legend> 
                    <ul class="review_list">
                        <?php
                        while($detailrow=mysqli_fetch_array($detailrs)){
                            $faname="/file/".$detailrow["img"];
                            $p_no=$detailrow["p_no"];
                            $reviewno=$detailrow["no"];
                        ?>
                        <li>
                            <div class="order_img" onclick="location.href='prod_detail.php?no=<?php echo $p_no?>'">
                                <img src="<?php echo $faname?>">
                            </div>
                            <table class="order_detail" style="width: 80%;">
                                <tr>
                                    <td style="font-size:1.1em;text-align:center" onclick="location.href='prod_detail.php?no=<?php echo $p_no?>'">
                                        <?php echo $detailrow["name"]?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="font-size:.9em">
                                    <?php
                                        $kinds=$detailrow["kinds"];
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
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo $detailrow["size"]?>
                                        <span style="float:right"><?php echo $detailrow["smell"]?></span>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo $detailrow["numb"]?>개
                                        <span style="float:right"><?php echo $detailrow["price"]?>원</span>
                                    </th>
                                </tr>
                            </table>
                                <?php
                                if($noncheckrow["birthday"]!=""){
                                $reviewsql="select * from review where o_no=$oo_no and p_no=$p_no";
                                $reviewrs=mysqli_query($conn,$reviewsql);
                                $reviewrow=mysqli_fetch_array($reviewrs);
                                if(!isset($reviewrow["re_no"])){
                                ?>
                                <a href="write_review.php?no=<?php echo $reviewno?>"><h3 class="write_review">리뷰 작성하기</h3></a>
                                <?php } }?>
                        </li>
                        <?php } ?>
                    </ul>
                </fieldset>
            </div>
            <!-- 마이페이지 컨텐츠 끝 -->
        </div>
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