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
            if(isset($_SESSION["id"])){
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
            <?php } ?>
            <!-- 마이페이지 컨텐츠 시작 -->
            <div id="mypage_content">
                <h1>자주 묻는 질문</h1>
                <ul class="faq_list">
                    <li>배송</li>
                    <li>주문/결제</li>
                    <li>취소/반품/교환</li>
                    <li>회원/혜택</li>
                    <li>이벤트 프로모션</li>
                    <li>사이트 이용/장애</li>
                </ul>
                <ul class="faq_content">
                    <li>
                        <ul class="faq_content_text">
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>송장 조회시, 아무런 내역도 확인되지 않아요.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    배송 시작 메시지는 송장을 등록한 기준으로 발송되는 것이므로, 해당 메시지를 수신하시더라도 실 택배사 인계 또는 집하가 진행중 일 수 있어, 현황 조회가 어려울 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문한 제품은 언제 수령할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    주문일(입금확인일)로부터 영업일 기준 2-5일 내 배송됩니다. 택배사 사정 또는 주문량에 따라 달라질 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>배송지를 변경 할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [마이페이지>주문/배송>주문 상세보기>수정하기]를 통해 배송지 수정할 수 있습니다. 다만, ‘입금’ 단계 이후부터는 수정이 불가합니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>이용 택배사는 어디인가요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    CJ대한통운을 통해 배송됩니다. 택배사 파업의 경우, 타 택배사로 변경될 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>합배송이 가능한가요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    개별 주문건에 대한 합배송은 불가합니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>한번에 결제하여, 여러사람에게 분할 배송 할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    주문 1건은 오직 한 주소지로 배송할 수 있습니다.<br>
                                    분할 배송을 원하실 경우, 개별 주문건을 생성(결제)해주셔야 합니다.<br>
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>배송비는 얼마인가요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    배송비는 2,500원입니다. 주문총액 30,000원 이상일 경우, 무료배송입니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>군부대(사서함)로 발송 가능한가요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    군부대(사서함) 주소는 택배사(CJ대한통운) 사정으로 배송 불가합니다. 주문 시, 배송이 진행되나 반송될 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>제주 및 도서 산간 배송 시 추가비용이 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    추가 비용이 발생하지 않습니다.
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="faq_content_text">
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문 완료 후 주소지 변경이 가능한가요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    주문/결제 이후 ‘입금' 상태일 경우에는 [마이페이지 > 주문/배송 >주문 상세보기] 에서 직접 변경이 가능하나, '상품준비중' 이후 단계부터는 배송지 수정이 불가합니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문 이후, 상품 옵션 변경/상품 추가하고 싶어요.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    주문한 상품 옵션을 변경할 수 없습니다. 상품 및 수량변경을 원하신다면 주문취소 후 다시 주문해 주시기 바랍니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문 이후, 결제 수단을 변경 할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    '입금' 상태 이후에는 결제수단 변경은 가능하지 않습니다. 주문 취소 후 원하시는 결제수단으로 재 주문해 주시기 바랍니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>영수증, 세금 계산서 발행 가능한가요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    주문건에 대한 증빙서류는 [마이페이지 > 주문내역/배송현황 -주문 상세보기] 하단의 ‘매출전표 확인’으로 확인 및 인쇄하실 수 있습니다. 신용카드 매출전표와 현금 영수증이 발행되므로, 별도 세금 계산서를 발행하지 않습니다. (온라인 대량구매건 포함)
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>사용 가능한 결제 수단에는 무엇이 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    탬버린즈 온라인 공식 홈페이지 내에서는 아래 수단으로 결제가 가능합니다.
                                    <br>
                                    <br>- 신용카드(국내)
                                    <br>- 실시간 계좌이체 (가상계좌)
                                    <br>- 무통장 입금 (가상계좌)
                                    <br>- 간편결제 (네이버페이, 카카오페이)
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>현금영수증을 발급 받고 싶습니다.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    현금 영수증은 무통장입금, 실시간 계좌이체 결제 이용 시 발급받으실 수 있습니다. [결제하기>결제내역확인>현금영수증 발행] 클릭 후, 소득공제용/지출증빙용 선택하여 결제 요청됩니다.
                                    <br>
                                    *현금영수증은 재발급이 불가합니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>비회원 주문 조회 방법을 알려주세요.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [마이페이지>비회원 주문조회]를 통해 연락처와 주문번호를 기입하여 주문 내역을 조회하실 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문한 내역은 어디서 확인하나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [마이페이지>주문/배송>주문 상세보기]에서 주문 시 기재하신 연락처와 주문번호를 기입하여 주문 내역을 조회하실 수 있습니다.
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="faq_content_text">
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문 이후, 주문/결제 취소가 되었어요</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    간편페이(네이버페이, 카카오페이) 결제 시, 일시적인 데이터 전송 오류로 주문/결제 취소될 수 있습니다. 이용 중인 창을 모두 닫으신 후, 새 창에서 재 주문 시도해주세요.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문 취소는 어떻게 하나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [마이페이지>주문/배송>주문 상세보기>취소하기]를 통해 취소하실 수 있습니다. ‘입금’ 단계 이후부터는 상품 패킹이 진행되어 주문 취소가 불가합니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문한 제품 중, 일부 상품만 취소/수량을 변경할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    일부 상품 또는 수량을 취소할 수 없습니다. ‘주문’ 또는 ‘입금’ 단계에서, 전체 주문 취소하신 후, 원하시는 상품/수량만큼 재 주문해주세요.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문취소 이후, 환불 소요 기간이 어떻게 되나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    결제 수단에 따른 환불 소요기간
                                    <br><br>
                                    (1) 카드 결제, 실시간 계좌이체 : 즉시 취소처리되나, 실 카드사 승인 취소까지 영업일 기준 3-5일 소요됩니다.
                                    <br><br>
                                    (2) 무통장 입금 : 주문 시 기재하신 ‘환불등록계좌’로 영업일 기준 3-5일 소요됩니다.
                                    <br><br>
                                    (3) 간편페이(네이버페이, 카카오페이): 즉시 취소 처리되나, 페이와 연동된 결제 수단이 신용카드일 경우, 카드사 승인 취소는 영업일 기준 3-5일 소요될 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>반품방법 알려주세요</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [마이페이지>주문/배송>주문 상세보기>반품하기]를 통해 반품 신청하실 수 있습니다. 반품 신청 이후, 1-2일 이내로 CJ대한통운 수거 기사님은 반품 접수지로 방문하여 상품 회수를 진행합니다. 반품 입고 및 제품 검수 확인 이후, 결제하신 수단으로 환불 진행됩니다. 반품하시는 상품 금액에서 반품 배송비가 차감되어 환불됩니다.
                                    <br>
                                    *무료배송 기준에 따라 반품 배송 비용이 변경될 수 있습니다.
                                    <br>
                                    -부분 반품 : 2,500원 비용 차감<br>
                                    -전체 반품 : 5,000원 비용 차감
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>반품 및 교환 규정을 알려주세요.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    반품 및 교환 규정은 다음과 같습니다.<br>
                                    <br>
                                    <br>    - 반품(환불) 및 교환은 구매처에서만 가능합니다. (온라인 <-> 매장 구매건 불가)
                                    <br>   - 제품을 수령하신 날로부터 14일 이내에 교환 또는 환불 의사를 말씀해 주셔야 합니다.
                                    <br>    - 제품은 개봉되지 않은 상태를 유지해야 하며, 개봉, 파손 또는 오염된 경우 반품이 거부될 수 있습니다.
                                    <br>    - 세트, 트리오 상품은 개별 수량 반품 및 교환이 불가합니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>다른 상품/향으로 교환하고 싶어요.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    단순 변심 또는 주문 실수로 인한 교환이 불가합니다. 반품 후, 원하시는 상품으로 재 구매를 요청 드립니다. (단, 제품 하자 시 교환 가능)
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>제품 하자로 인한 교환은 어떻게 진행되나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    주문번호와 주문 시 기재한 연락처를 기입하여 cs@tamburins.com으로 문의주주세요. 교환 신청서 접수 이후, 기존 수령하신 상품에 대한 회수가 진행되며
                                    제품 확인 후, 새 상품으로 발송됩니다.
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="faq_content_text">
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>회원가입 축하 포인트는 어떻게 받을 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                   <br>
                                    회원가입 방법에 따라 포인트 발급 방식이 달라질 수 있습니다.
                                    <br><br>
                                    (1)일반 회원가입 : 카카오톡 플러스 ‘탬버린즈‘ 채널 친구 추가> 카카오톡 메시지 내 코드 발급 > 신규 회원가입 항목 내 ‘코드 번호’ 입력 시 포인트 발급 완료
                                    <br><br>                             
                                    (2)카카오 가입 : 카카오 연동 회원가입 > 자동 포인트 발급 완료
                                    <br><br>
                                    (3)네이버 가입 : 카카오톡 플러스 ‘탬버린즈‘ 채널 친구 추가> 카카오톡 메시지 내 코드 발급 > 네이버 연동 회원가입 > 마이페이지> 회원정보 수정 ‘코드번호‘ 입력 시 포인트 발급 완료
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>회원가입 축하 적립금은 어떻게 사용할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [주문결제>할인/혜택사용>보유 포인트]영역에서 원하시는 포인트를 기입하시면 할인 적용됩니다. (사용기한 : 발급일로부터 180일 이내)
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>회원가입 축하 적립금이 발급되지 않았어요.</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    cs@tamburins.com으로 문의주시면, 해결 도와드리겠습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>회원 탈퇴는 어떻게 하나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    [마이페이지>계정 설정>회원정보 수정>회원 탈퇴하기]를 통해 탈퇴하실 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>회원 탈퇴 후 재가입을 할 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    일반 회원가입은 탈퇴 후 동일한 메일 계정으로 재가입이 불가합니다.<br>
                                    카카오, 네이버 연동 가입 계정은 탈퇴 이후에도 동일한 계정으로 재가입할 수 있습니다.
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="faq_content_text">
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>레드 익스쿨루시브/피라미드 패키지 선물 포장으로 상품 수령받을 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    튜브핸드크림(레드 익스클루시브), 쉘 퍼퓸핸드크림 15ml(레드 피라미드) 제품에 한하여 각 패키지 선물포장 됩니다. 시즌 한정으로 제공되며, 재고 소진 시 마감될 수 있습니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>튜브 핸드크림 구매시, 울리백은 언제까지 받을 수 있나요?</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    시즌 한정으로 제공되며, 재고 소진 시 마감될 수 있습니다.
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="faq_content_text">
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>주문 결제 시, 결제 오류 나면서 '장바구니 없음' 알람이 떠요</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    해당 오류가 발생하실 경우, 타 PC 또는 모바일 기기로 접속하여 재 주문 부탁드립니다.
                                </div>
                            </li>
                            <li>
                                <table class="faq_que">
                                    <tr>
                                        <th>갑자기 주문(결제)이 취소되었어요</th>
                                        <td>▼</td>
                                    </tr>
                                </table>
                                <div class="faq_re">
                                    간편페이(카카오페이,네이버페이) 결제 시, 데이터 전송 오류로 인해 주문이 정상 접수되지 않을 수 있습니다. 해당 오류가 발생하실 경우, 새 창에서 재 주문 시도해주세요.
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
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