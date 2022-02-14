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
                        <li>Hand
                            <ul class="submenu_sub">
                                <li>Tube Hand</li>
                                <li>Perfume Hand</li>
                                <li>Handcream</li>
                            </ul>
                        </li>
                        <li>Scent Object</li>
                        <li>Multi Fragrance</li>
                        <li>Hand sanitizer</li>
                        <li>Body & Hand</li>
                    </ul>
                </li>
                <li>Gift</li>
                <li>Sample</li>
                <li>Store</li>
            </ul>
            <!-- 메뉴 끝 -->
            <!-- 유저 메뉴 시작 -->
            <ul id = "usmenu">
                <li>Acount</li>
                <li>Cart
                    <div id="cart_wrap">
                        <ul id="cart_prod">
                            <li>
                                <img src="img/testimg.webp">
                            </li>
                            <li>
                                <table class="cart_text">
                                    <tr>
                                        <th>SOUNDS OF NIGHT</th>
                                    </tr>
                                    <tr>
                                        <td>65ml</td>
                                    </tr>
                                    <tr>
                                        <td>₩ 25,000</td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                        <ul id="cart_prod">
                            <li>
                                <img src="img/testimg.webp">
                            </li>
                            <li>
                                <table class="cart_text">
                                    <tr>
                                        <th>SOUNDS OF NIGHT</th>
                                    </tr>
                                    <tr>
                                        <td>65ml</td>
                                    </tr>
                                    <tr>
                                        <td>₩ 25,000</td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                        <ul id="cart_prod">
                            <li>
                                <img src="img/testimg.webp">
                            </li>
                            <li>
                                <table class="cart_text">
                                    <tr>
                                        <th>SOUNDS OF NIGHT</th>
                                    </tr>
                                    <tr>
                                        <td>65ml</td>
                                    </tr>
                                    <tr>
                                        <td>₩ 25,000</td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                        <input type="button" value="Check out" class="cart_bt">
                    </div>
                </li>
                <li><img src="img/searchicon.png">
                    <div id="search_wrap">
                        <form name="searchfrm">
                            <input type="text" name="search" placeholder="검색어를 입력하세요" class="search_bar">
                            <input type="button" value="search" class="search_bt">
                        </form>
                    </div>
                </li>
            </ul>
            <!-- 유저 메뉴 끝 -->
            <!-- 로고 시작 -->
            <div id="logo">
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
            <!-- 마이페이지 메뉴 끝 -->
            <!-- 마이페이지 컨텐츠 시작 -->
            <div id="mypage_content">
                <ul class="review_content">
                    <li>
                        <?php
                        $orderDno=$_GET["no"];
                        // echo $orderDno;
                        $prodsql="select * from prod,order_detail where order_detail.no=$orderDno and order_detail.p_no=prod.no";
                        $prodrs=mysqli_query($conn,$prodsql);
                        $prodrow=mysqli_fetch_array($prodrs);
                        $img="/file/".$prodrow["img"];
                        $orderNoo=$prodrow["c_no"];
                        $orderPNo=$prodrow["p_no"];
                        $orderMNo=$prodrow["m_no"];
                        ?>
                        <img src="<?php echo $img?>">
                        <table class="review_content_table">
                            <tr>
                                <td><b><?php echo $prodrow["name"]?></b></td>
                                <td>
                                    구매일<br>
                                    <?php
                                    $buydatesql="select * from shop_order where o_no=$orderNoo";
                                    $buydaters=mysqli_query($conn,$buydatesql);
                                    $buydaterow=mysqli_fetch_array($buydaters);
                                    ?>
                                    <span><?php echo $buydaterow["date"]?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>₩ <?php echo $prodrow["price"]?></td>
                                <td>
                                    <?php echo $prodrow["size"]?><br>
                                    <span><?php echo $prodrow["smell"]?></span>
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <div id="review_modal">
                    <ul class="reviewPoint">
                        <li>
                            <label for="reviewPoint1" class="reviewStar">★</label>
                        </li>
                        <li>
                            <label for="reviewPoint2" class="reviewStar">★</label>
                        </li>
                        <li>
                            <label for="reviewPoint3" class="reviewStar">★</label>
                        </li>
                        <li>
                            <label for="reviewPoint4" class="reviewStar">★</label>
                        </li>
                        <li>
                            <label for="reviewPoint5" class="reviewStar">★</label>
                        </li>
                    </ul>
                    <input type="checkbox" name="check" id="reviewPoint1" value="1" class="hidden" onclick="review()">
                    <input type="checkbox" name="check" id="reviewPoint2" value="2" class="hidden" onclick="review()">
                    <input type="checkbox" name="check" id="reviewPoint3" value="3" class="hidden" onclick="review()">
                    <input type="checkbox" name="check" id="reviewPoint4" value="4" class="hidden" onclick="review()">
                    <input type="checkbox" name="check" id="reviewPoint5" value="5"class="hidden" onclick="review()">
                    <form name="reviewfrm" method="post" action="review_wrtie_ok.php">
                        <input type="hidden" id="result" name="review">
                        <input type="hidden" name="p_no" value="<?php echo $orderPNo?>">
                        <input type="hidden" name="m_no" value="<?php echo $orderMNo?>">
                        <input type="hidden" name="c_no" value="<?php echo $orderNoo?>">
                        <textarea cols="500" name="reviewcontent" rows="10" placeholder="리뷰평을 작성해주세요." class="review_text"></textarea>
                        <br>
                        <input type="reset" value="다시작성" class="review_del">
                        <input type="button" value="작성하기" class="review_add" onclick="review_add()">
                    </form>
                    <script>
                        function review(){
                            let check = 'input[name="check"]:checked';
                            let selectedElements = 
                                document.querySelectorAll(check);
                            let selectedElementsCnt =
                                selectedElements.length;
                            reviewfrm.review.value=selectedElementsCnt;
                        }
                        function review_add(){
                            if(reviewfrm.review.value==""){
                                alert("별점을 선택해주세요.");
                                return false;
                            }else if(reviewfrm.review.value=="0"){
                                alert("별점을 선택해주세요.");return false;
                            }
                            if(reviewfrm.reviewcontent.value==""){
                                alert("내용을 작성하세요.");
                                reviewfrm.reviewcontent.focus();return false;
                            }else{
                                document.reviewfrm.submit();
                            }
                        }
                    </script>
                </div>
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
                    <li>Shop
                        <ul class="footer_submenu">
                            <li>핸드크림
                                <ul class="footer_submenu_sub">
                                    <li>튜브핸드</li>
                                    <li>퍼퓸핸드</li>
                                    <li>체인핸드</li>
                                </ul>
                            </li>
                            <li>손소독제</li>
                            <li>향오브젝트</li>
                            <li>바디&핸드크림 대용량</li>
                            <li>룸스프레이</li>
                            <li>스킨케어</li>
                        </ul>
                    </li>
                    <li>Gift</li>
                    <li>Sample</li>
                    <li>Best seller</li>
                    <li>Store</li>
                    <li>Acount
                        <ul class="footer_submenu">
                            <li>Login</li>
                            <li>Signup</li>
                            <li>계정찾기</li>
                            <li>비밀번호찾기</li>
                        </ul>
                    </li>
                </ul>
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
                <li>통신판매업신고: 제 2014-서울마포-1050 호 (<a href="">사업자정보확인</a>)</li>
                <li><a href="">개인정보처리방침</a></li>
                <li><a href="">이용약관</a></li>
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