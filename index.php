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
    <style>
        header{
            box-shadow:none;
            color:white;
            position: absolute;top:0px;left:0px
        }
        body{
            overflow-x: hidden;
            }
        </style>
</head>
<body>
    <!-- 메인 슬라이드 -->
    <div id="main_slide">
        <div id="main_slide_wrap">
            <div id="main_slide_img">
                <div class="candle_main">
                    <img src="img/candle_main.webp">
                    <video src="img/candle_main.mp4" muted autoplay loop></video>
                    <div class="candle_bt">
                        <b>OLFACTIVE ARCHIVE<br>
                            <span style="font-size:.7em">with<span> CANDLE
                        </b>
                        <div class="candle_bt2" onclick="location.href='prod.php?kinds=5&title=Scent Object'">캔들 보기</div>
                    </div>
                </div>
            </div>
        </div>
        
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
                <li><img src="img/searchicon_w.png">
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
                <img src="img/logo_small_white.png">
            </div>
            <!-- 로고 끝 -->
        </div>
    </header>
    <!-- 헤더 끝 -->
    </div>
    <!-- 메인 슬라이드 끝 -->
    <!-- 컨텐츠 시작 -->
    <div id="wrap">
        <div id="main_padding_top"></div>
        <!-- best-seller시작 -->
        <div id="index_title">
            - Best Seller - 
        </div>
        <div id="bt_wrap">
            <ul class="best_seller_bt">
                <li><</li>
                <li>></li>
            </ul>
        </div>
        <div id="best_seller">
            <div id="best_seller_prod">
                <ul class="best_seller_prod_list">
                    <!-- best seller db -->
                    <?php
                    $bestsql="select sum(numb) as sum,p_no from order_detail GROUP BY p_no order by sum desc limit 0,6";
                    $bestrs=mysqli_query($conn,$bestsql);
                    while($bestrow=mysqli_fetch_array($bestrs)){
                        $ppp_no=$bestrow["p_no"];
                        $bssql="select * from prod where no=$ppp_no";
                        $bsrs=mysqli_query($conn,$bssql);
                        $bsrow=mysqli_fetch_array($bsrs);
                        $no=$bsrow["no"];
                        $ffname="/file/".$bsrow["img"];
                    ?>
                    <li onclick="location.href='prod_detail.php?no=<?php echo $no?>'">
                        <div class="bs_prod_img">
                            <img src="<?php echo $ffname?>">
                        </div>
                        <table class="bs_prod_text">
                            <tr>
                                <td>
                                    <?php echo $bsrow["size"]?><br>
                                    <span style="font-size:.8em"><?php echo $bsrow["smell"]?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $bsrow["name"]?></th>
                            </tr>
                            <tr>
                                <td>₩ <?php echo $bsrow["price"]?></td>
                            </tr>
                        </table>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- best-seller끝 -->
        <!-- gift 시작 -->
        <div id="index_gift">
            <div id="index_gift_banner">
                <div id="index_gift_text">
                    <span>마음을 전하는 특별한 기프트</span><br>
                    소중한 순간을 더욱 특별하게 만들어줄<br>
                    탬버린즈만의 기프트로 따뜻한 마음을 전해보세요.<br>
                </div>
            </div>
            <div id="gift_prod_wrap">
                <div id="bt_wrap">
                    <ul class="gift_move_bt">
                        <li><</li>
                        <li>></li>
                    </ul>
                </div>
                <div id="gift_prod">
                    <div id="gift_prod2">
                        <ul class="best_seller_prod_list">
                            <!-- 선물하기 db -->
                            <?php 
                            $giftsql="select * from prod where kinds='10' order by no desc limit 0,6";
                            $giftrs=mysqli_query($conn,$giftsql);
                            while($giftrow=mysqli_fetch_array($giftrs)){
                                $fname="/file/".$giftrow["img"];
                                $no=$giftrow["no"];
                            ?>
                            <li  onclick="location.href='prod_detail.php?no=<?php echo $no?>'">
                                <div class="bs_prod_img">
                                    <img src="<?php echo $fname?>">
                                </div>
                                <table class="bs_prod_text">
                                    <tr>
                                        <td>
                                            <span style="font-size:.8em"><?php echo $giftrow["size"]?></span><br>
                                            <?php echo $giftrow["smell"]?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo $giftrow["name"]?></th>
                                    </tr>
                                    <tr>
                                        <td>₩ <?php echo $giftrow["price"]?></td>
                                    </tr>
                                </table>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- gift 끝 -->
        <!-- sample 시작 -->
        <div id="index_sample">
            <br><br>
            <div id="index_title">
                - Sample - 
            </div>
            <div class="index_sample_text">
                <div class="index_sample_more_bt">
                    <img src="img/bt_black.png"  onclick="location.href='gift_sample.php?kinds=11'">
                </div>
                <ul id="index_sample_prod">
                    <!-- sample db 시작 -->
                    <?php
                    $samplesql="select * from prod where kinds='11' order by no desc limit 0,2";
                    $samplers=mysqli_query($conn,$samplesql);
                    while($samplerow=mysqli_fetch_array($samplers)){
                        $fname="/file/".$samplerow["img"];
                        $no=$samplerow["no"];
                    ?>
                    <li onclick="location.href='prod_detail.php?no=<?php echo $no?>'">
                        <div class="index_sample_img">
                            <img src="<?php echo $fname?>">
                        </div>
                        <table class="index_sp_text">
                            <tr>
                                <td>
                                    <span style="font-size:.8em"><?php echo $samplerow["size"]?></span><br>
                                    <?php echo $samplerow["smell"]?>
                                </td>
                            </tr>
                            <tr>
                                <th> <?php echo $samplerow["name"]?></th>
                            </tr>
                            <tr>
                                <td>₩ <?php echo $samplerow["price"]?></td>
                            </tr>
                        </table>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- sample 끝 -->
        <!-- 스토어 -->
        <div id="index_store">
            <div id="index_title">
               - Store -
            </div>
            <ul class="store_list">
                <li>
                    <div class="store_text">
                        <br>
                        <span>플래그십스토어 신사<br></span>
                        서울 강남구 압구정로10길 44<br>
                        +82 02 511 1246<br>
                        월-일 12:00pm-9:00pm<br>
                        <div class="store_map"><a target="_blank"
                                href="https://www.google.com/maps/place/%ED%83%AC%EB%B2%84%EB%A6%B0%EC%A6%88+%ED%94%8C%EB%9E%98%EA%B7%B8%EC%8B%AD%EC%8A%A4%ED%86%A0%EC%96%B4+(Tamburins)/@37.5206052,127.0214472,19z/data=!3m1!4b1!4m5!3m4!1s0x357ca3eb0892eca7:0x317ff33e31a18c5a!8m2!3d37.5206052!4d127.0219944">지도보기</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="store_text2">
                        <br>
                        <span>하우스 도산<br></span>
                        서울 강남구 압구정로46길 50<br>
                        +82 70 4128 2124<br>
                        월-일 11:00am-9:00pm<br>
                        <div class="store_map2"><a target="_blank"
                                href="https://www.google.co.kr/maps/place/%ED%95%98%EC%9A%B0%EC%8A%A4%EB%8F%84%EC%82%B0+HAUS+DOSAN/@37.5253221,127.0334898,17z/data=!3m1!4b1!4m5!3m4!1s0x357ca3b907673741:0x5435f1f3bddb11da!8m2!3d37.5253221!4d127.0356785">지도보기</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- 스토어 끝 -->
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