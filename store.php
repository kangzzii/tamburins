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
        <div id="store_wrap">
            <!-- 스토어 네비 -->
            <ul class="store_nav">
                <li>
                    <img src="img/hanguo.webp">
                    대한민국
                </li>
                <li>
                    <img src="img/shanghi.webp">
                    상해
                </li>
                <li>
                    <img src="img/exhibition.webp">
                    전시
                </li>
            </ul>
            <!-- 스토어 네비 끝 -->
            <!-- 전시슬라이드 -->
            <ul class="store_content">
                <!-- 대한민국 -->
                <li>
                    <div style="margin-bottom: 50px;">
                        <div id="store_slide2">
                            <div id="store_img2">
                                <img src="img/Dosan2.png">
                                <img src="img/Dosan3.webp">
                                <img src="img/Dosan4.webp">
                                <img src="img/Dosan5.webp">
                                <video src="img/Dosan1.mp4" muted autoplay loop>
                            </div>
                            <div class="store_prev2"><</div>
                            <div class="store_next2">></div>
                        </div>
                        <div id="store_introduce">
                            <span>
                            하우스 도산
                            </span>
                            <br>서울 강남구 압구정로46길 50
                            <br>+82 70 4128 2124
                            <br>월-일 11:00am-9:00pm
                            <br>설 연휴 휴무 일정: 2.1(화) ~ 2.2(수)
                            <a href="https://www.google.co.kr/maps/place/%ED%95%98%EC%9A%B0%EC%8A%A4%EB%8F%84%EC%82%B0+HAUS+DOSAN/@37.5253221,127.0334898,17z/data=!3m1!4b1!4m5!3m4!1s0x357ca3b907673741:0x5435f1f3bddb11da!8m2!3d37.5253221!4d127.0356785">지도보기</a>
                        </div>
                    </div>
                    <div>
                        <div id="store_slide">
                            <div id="store_img">
                                <img src="img/store1.webp">
                                <img src="img/store1_2.webp">
                                <img src="img/store1_3.webp">
                                <img src="img/store1_4.webp">
                                <img src="img/store1_5.webp">
                                <img src="img/store1_6.webp">
                                <img src="img/store1_7.webp">
                            </div>
                            <div class="store_prev"><</div>
                            <div class="store_next">></div>
                        </div>
                        <div id="store_introduce">
                            <span>
                                플래그십스토어 신사<br>
                            </span>
                            서울 강남구 압구정로10길 44<br>
                            +82 02 511 1246<br>
                            월-일 12:00pm-9:00pm<br>
                            <a href="https://www.google.com/maps/place/%ED%83%AC%EB%B2%84%EB%A6%B0%EC%A6%88+%ED%94%8C%EB%9E%98%EA%B7%B8%EC%8B%AD%EC%8A%A4%ED%86%A0%EC%96%B4+(Tamburins)/@37.5206052,127.0214472,19z/data=!3m1!4b1!4m5!3m4!1s0x357ca3eb0892eca7:0x317ff33e31a18c5a!8m2!3d37.5206052!4d127.0219944">지도보기</a>
                        </div>
                    </div>
                    <div id="stock_title">스톡키스트</div>
                    <ul class="stock">
                        <li>
                            <span>
                            스타필드 하남점<br>
                            </span><br>
                            <br>경기도 하남시 미사대로 750 스타필드 하남 1F
                            <br>+82 031 8072 8499
                            <br>월-일 10:00am-9:00pm
                            <br><p>설 연휴 휴무 일정: 정상영업</p>
                        </li>
                        <li>
                            <span>신세계 면세점 명동점</span>
                            <br><br>서울 중구 퇴계로 77 신세계백화점 본점 04583 10F
                            <br>+82 02 6370 4182
                            <br>월-일 11:00am-6:00pm
                            <br><p>설 연휴 휴무 일정: 정상영업</p>
                        </li>
                        <li>
                            <span>10 꼬르소꼬모 에비뉴엘점</span>
                            <br><br>서울 중구 남대문로 73 5층 10 꼬르소꼬모
                            <br>+82 02 2118 6095
                            <br>월-일 10:30am-8:00pm
                        </li>
                        <li>
                            <span>10 꼬르소꼬모 청담점</span>
                            <br><br>서울 강남구 압구정로 416
                            <br>+82 02 3018 1010
                            <br>월-일 11:00am-8:00pm
                        </li>
                    </ul>
                </li>
                <!-- 상해 -->
                <li>
                    <div style="margin-bottom: 50px;">
                        <div id="store_slide3">
                            <div id="store_img3">
                                <img src="img/Shanghai9.webp">
                                <img src="img/Shanghai2.webp">
                                <img src="img/Shanghai3.webp">
                                <img src="img/Shanghai4.webp">
                                <img src="img/Shanghai5.webp">
                                <img src="img/Shanghai6.webp">
                                <img src="img/Shanghai7.webp">
                                <img src="img/Shanghai8.webp">
                                <video src="img/Shanghai1.mp4" autoplay loop muted>
                            </div>
                            <div class="store_prev3"><</div>
                            <div class="store_next3">></div>
                        </div>
                        <div id="store_introduce">
                            <span>하우스 상해</span>
                            <br>4F, No.798-812, Middle Huaihai Road, Huangpu District,
                            <br>Shanghai, China
                            <br>+86 21-64220858
                            <br>월-일 10:00am-10:00pm
                        </div>
                    </div>
                </li>
                <!-- 전시 -->
                <li>
                    <div>
                        <div id="store_slide4">
                            <div id="store_img4">
                                <img src="img/exhibition2.webp">
                                <img src="img/exhibition3.jpeg">
                                <img src="img/exhibition4.webp">
                                <img src="img/exhibition5.jpeg">
                                <video autoplay loop muted src="img/exhibition.mp4">
                            </div>
                            <div class="store_prev4"><</div>
                            <div class="store_next4">></div>
                        </div>
                        <div id="store_introduce" style="font-size: .9em;">
                            <span>코쿤 컬렉션</span>
                            <br>코쿤 컬렉션 전시는 탬버린즈의 세 번째 핸드크림 컬렉션 ‘올팩티브 아카이브 (OLFACTIVE ARCHIVE)’의 런칭
                            <br>을 기념하여 새롭게 공개하는 향의 스토리를 담은 프로젝트입니다.
                            <br>올팩티브 아카이브에 영감을 준 *OLFACTION은 향을 주관적인 경험이나 이미지와 결합해 기억하는 방식으로,<br>
                            올팩티브 아카이브의 첫 번째 컬렉션인 코쿤 컬렉션은 어린 시절 들었던 누에고치가 뽕잎을 갉아먹는 소리의 경험을 향으로 형상화하고 
                            <br>탬버린즈의 언어로 재구성한 기록입니다.
                            <br>전시장 내부의 공간을 압도하는 대형 누에 키네틱을 비롯한 다양한 아트피스는 향이 내포하고 있는 다양한 스토리를 탬버린즈의 시각으로 마주하게 합니다.
                                <br>
                            <br>표면적으로 지나쳐가는 향이 아닌, 그 시간의, 그 순간의, 그 상황을 그리는[MISS] 애틋함에서 풍겨져 나오는 내면의 향에 집중하기 위해
                            <br> 각 향의 OLFACTIVE ARCHIVE(올팩티브 아카이브)를 예측 불가능한 방식으로 경험할 수 있습니다.
                            <br>
                            <br>2021.10. 20 – 2021.11.21
                            <br>서울특별시 성동구 성수이로 20길 57
                        </div>
                    </div>
                </li>
            </ul>
            <!-- 전시슬라이드 끝 -->
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