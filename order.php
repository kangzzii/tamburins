<?php
include "include.php"
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
        <form name="orderfrm" method="post">
            <div id="buy">
                <div id ="cart_buy" style="text-align: center;">
                    <h1>
                        Payment
                    </h1>
                    <!-- 주문자 동일 선택시 -->
                    <?php
                        if(isset($_GET["same"])){
                            $id=$_SESSION["id"];
                            $ordersql="select * from memb where id='$id'";
                            $orderrs=mysqli_query($conn,$ordersql);
                            $orderrow=mysqli_fetch_array($orderrs);
                    ?>
                    <table class="buyer_inf_table">
                        <tr>
                            <th>주문자정보
                                <a href="order.php?same=same">계정과 주문자가 동일</a>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $orderrow['name']?>" placeholder="이름" class="buyer_inf">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="tel" value="<?php echo $orderrow['tel']?>" placeholder="전화번호" class="buyer_inf">
                            </td>
                        </tr>
                    </table>
                    <table class="buyer_inf_table">
                        <tr>
                            <th>배송지 정보</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="addr" value="<?php echo $orderrow['addr']?>" placeholder="주소" class="buyer_inf">
                            </td>
                        </tr>
                        <tr>
                            <th><a href="javascript:addr(orderfrm.addr.value)">작성한 배송지를 기본 배송지로 지정하기</a>
                                <script>
                                    function addr(addr){
                                        // alert(addr);
                                        location.href='save_addr.php?addr='+addr+"&id=<?php echo $id?>";
                                    }
                                </script>
                            </th>
                        </tr>
                    </table>
                    <!-- 주문자 동일 끝 -->
                        <?php
                        }else{
                        ?>
                    <!-- 이외경우 -->
                    <table class="buyer_inf_table">
                        <tr>
                            <th>주문자정보
                                <a href="order.php?same=same">계정과 주문자가 동일</a>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="이름" class="buyer_inf">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="tel" placeholder="전화번호" class="buyer_inf">
                            </td>
                        </tr>
                    </table>
                    <table class="buyer_inf_table">
                        <tr>
                            <th>배송지 정보</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="addr" placeholder="주소" class="buyer_inf">
                            </td>
                        </tr>
                        <tr>
                            <th><a href="javascript:addr(orderfrm.addr.value)">작성한 배송지를 기본 배송지로 지정하기</a>
                                <script>
                                    function addr(addr){
                                        // alert(addr);
                                        location.href='save_addr.php?addr='+addr+"&id=<?php echo $id?>";
                                    }
                                </script>
                            </th>
                        </tr>
                    </table>
                    <?php } 
                        $id=$_SESSION["id"];
                        $findsql="select * from memb where id='$id'";
                        $findrs=mysqli_query($conn,$findsql);
                        $findrow=mysqli_fetch_array($findrs);
                        $m_no=$findrow["m_no"];
                        $noncheck="select * from memb where id='$id'";
                        $noncheckrs=mysqli_query($conn,$noncheck);
                        $noncheckrow=mysqli_fetch_array($noncheckrs);
                        if($noncheckrow["birthday"]!=""){
                        $pointSql="select * from point where m_no=$m_no order by no desc limit 0,1";
                        $pointRs=mysqli_query($conn,$pointSql);
                        $pointRow=mysqli_fetch_array($pointRs);
                        ?>
                    <table class="buyer_inf_table">
                        <tr>
                            <th colspan="2">포인트</th>
                        </tr>
                        <tr>
                            <th>가용포인트</th>
                            <td>
                                <input type="text" name="point_org" value="<?php echo $pointRow['point']?>" readonly style="text-align: right;" class="buyer_inf">
                            </td>
                        </tr>
                        <tr>
                            <th>사용 포인트</th>
                            <td>
                                <input type="text" name="point_use" value ="<?php echo $pointRow['point']?> "class="buyer_inf2">
                                <input type="button" value="사용하기" class="point_bt" onclick="total()">
                            </td>
                        </tr>
                    </table>
                    
                    <?php } ?>
                    <table class="buyer_inf_table">
                        <tr>
                            <th>결제수단</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                <ul class="pay_box">
                                    <li><label for="pay1">무통장입금1</label></li>
                                    <li><label for="pay2">무통장입금2</label></li>
                                    <li><label for="pay3">무통장입금3</label></li>
                                </ul>
                                
                                <input type="radio" name="pay" id="pay1" value="무통장입금1" class="hidden">
                                <input type="radio" name="pay" id="pay2" value="무통장입금2" class="hidden">
                                <input type="radio" name="pay" id="pay3" value="무통장입금3" class="hidden">
                            </td>
                        </tr>
                    </table>
                    <div class="order_notice" style="margin-top: 30px;text-align: left;width: 60%;">
                        [설 연휴 배송 및 반품]<br>
                        1.26(수) 오전 주문건까지 정상 배송 가능하며, 이후 주문 건은 2.3(목)부터 순차 배송됩니다.
                        <br>
                        [CJ대한통운 파업지역 배송]<br>
                        일부 지역에 한하여 배송이 불가합니다. 해당 지역 주문건은 타 택배사로 출고 진행될 예정이나, 출고 지연될 수 있습니다.
                        <br>
                        주문일로부터 2~3영업일 이내 출고됩니다.<br>
                        제품 구매 시 쇼핑백에 제공됩니다. (상품갯수와 관계없이 주문 건당 1개 제공
                    </div>
                    <input type="button" value="Payment" class="order_bt" onclick="endd()">
                </div>
                <div id="buyer">
                    <h1>Summary</h1>
                    <table class="buyer_table">
                        <?php
                        $endSql="select sum(price*numb)as sum from cart where m_no=$m_no";
                        $endrs=mysqli_query($conn,$endSql);
                        $endrow=mysqli_fetch_array($endrs);
                        ?>
                        <tr>
                            <th>주문금액</th>
                            <td><?php echo $endrow["sum"]?>원</td>
                        </tr>
                        <?php
                        if($noncheckrow["birthday"]!=""){
                        ?>
                        <tr>
                            <th>포인트</th>
                            <td><input type="text" name="point" readonly class="buyer_text" style="font-size:1em">
                                <script>
                                    function total(){
                                        let usePoint = parseInt(orderfrm.point_use.value);
                                        if( usePoint<= <?php echo $pointRow['point']?>){
                                        let point=orderfrm.point_use.value;
                                        orderfrm.point.value = point;
                                            allpay(point);
                                        }else{
                                            alert("가용 포인트를 초과 하였습니다.");
                                            orderfrm.point_use.focus();return false;
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th>배송비</th>
                            <td>
                                <?php
                                    if($endrow["sum"]>=30000){?>
                                    0원
                                    <?php }else{ ?>
                                        2,500원
                                    <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td style="color:red">
                                <?php
                                    if($noncheckrow["birthday"]!=""){
                                    if($endrow["sum"]>=30000){?>
                                        <script>
                                            function allpay(point){
                                                var pointt = parseInt(point) ;
                                                // console.log(pointt);
                                                var summm = parseInt(<?php echo $endrow["sum"]?>) ;
                                                // console.log(sum);
                                                var allpayyy = summm-pointt;
                                                // console.log(allpay);
                                                document.getElementById("i_result").innerHTML=allpayyy;
                                            }
                                        </script>
                                        <b id="i_result"></b>
                                    <?php }else{ ?>
                                        <script>
                                            function allpay(point){
                                                var pointt = parseInt(point) ;
                                                // console.log(pointt);
                                                var summm = parseInt(<?php echo ($endrow["sum"]+2500)?>) ;
                                                // console.log(sum);
                                                var allpayyy = summm-pointt;
                                                // console.log(allpay);
                                                document.getElementById("i_result").innerHTML=allpayyy;
                                            }
                                        </script>
                                        <b id="i_result"></b>
                                    <?php } }else{
                                        if($endrow["sum"]>=30000){
                                            echo $endrow["sum"];
                                        }else{
                                            echo ($endrow["sum"]+2500);
                                        }
                                    }?>
                            </td>
                        </tr>
                    </table>
                    <?php
                    if($noncheckrow["birthday"]!=""){
                    ?>
                    <script>
                        function endd(){
                            if(orderfrm.name.value==""){
                                alert("주문자명을 입력 해주세요.");
                                orderfrm.name.focus();return false;
                            }
                            if(orderfrm.tel.value==""){
                                alert("연락처를 입력 해주세요.");
                                orderfrm.tel.focus();return false;
                            }
                            if(orderfrm.addr.value==""){
                                alert("주소를 입력 해주세요.");
                                orderfrm.addr.focus();return false;
                            }
                            if(orderfrm.point.value==""){
                                alert("포인트 사용하기 버튼을 눌러주세요.");
                                orderfrm.point_use.focus();return false;
                            }
                            if(orderfrm.pay.value==""){
                                alert("결제방법을 선택 해주세요.");
                                orderfrm.pay.focus();return false;
                            }
                            else{
                                orderfrm.action="order_ok.php";
                                document.orderfrm.submit();
                            }
                        }
                    </script>
                    <?php }else{ ?>
                        <script>
                        function endd(){
                            if(orderfrm.name.value==""){
                                alert("주문자명을 입력 해주세요.");
                                orderfrm.name.focus();return false;
                            }
                            if(orderfrm.tel.value==""){
                                alert("연락처를 입력 해주세요.");
                                orderfrm.tel.focus();return false;
                            }
                            if(orderfrm.addr.value==""){
                                alert("주소를 입력 해주세요.");
                                orderfrm.addr.focus();return false;
                            }
                            if(orderfrm.pay.value==""){
                                alert("결제방법을 선택 해주세요.");
                                orderfrm.pay.focus();return false;
                            }
                            else{
                                orderfrm.action="order_ok.php";
                                document.orderfrm.submit();
                            }
                        }
                    </script>
                    <?php } ?>
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