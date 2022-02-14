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
        <div id="prod_wrap">
            <!-- 상단 컨텐츠부분(이미지,가격설명등) -->
            <div id="prod_top">
                <ul class="prod_top">
                    <?php 
                    $no=$_GET["no"];
                    $sql="select * from prod where no=$no";
                    $rs=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($rs);
                    $price=$row["price"];
                    $fname="/file/".$row["img"];
                    ?>
                    <li>
                        <img src="<?php echo $fname?>">
                    </li>
                    <li>
                        <table class="prod_text">
                            <tr>
                                <th><?php echo $row["name"]?></th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $row["smell"]?>
                                    <br>
                                    <span style="font-size:.8em"><?php echo $row["size"]?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>₩ <?php echo $row["price"]?></td>
                            </tr>
                        </table>
                        <!-- 카트 담기 버튼 시작-->
                        <form name="addCart" method="post" action="add_cart.php">
                            <div class="add_cart">
                                <div class="add_cart_wrap">
                                    <input type="hidden" name="p_no" value="<?php echo $no?>">
                                    <input type="hidden" name="price" value="<?php echo $price ?>">
                                    <input type="button" value="-" class="add_cart_bt1" onclick="del()">
                                    <input type="text" name="num" value="1" class="add_cart_num" >
                                    <input type="button"value="+"class="add_cart_bt2"onclick="plus()">
                                    <script>
                                    var numm = parseInt(addCart.num.value);
                                    function plus() {
                                        numm = numm + 1;
                                        // alert(numm)
                                        addCart.num.value = numm;
                                    }
                                    function del() {
                                        if (addCart.num.value != 1) {
                                        numm = numm - 1;
                                        // alert(numm)
                                        addCart.num.value = numm;
                                        } else {
                                        alert("1개 이상부터 구매 가능합니다.");
                                        numm = 1;
                                        addCart.num.value = numm;
                                        }
                                    }
                                    </script>
                                </div>
                                <input type="submit"value="Cart"class="add_cart_bt3">
                            </div>
                        </form>
                        <!-- 카트 담기 버튼 끝 -->
                        <!-- 상세보기 공지사항 -->
                        <ul class="detail_notice">
                            <li>
                                온라인 익스클루시브 혜택
                                <div class="down">▾</div>
                                <div class="up">▴</div>
                                <div class="detail_notice2">
                                    탬버린즈는 고객님들께 빠른 배송 및 반품과 최고의 경험을 제공하기 위해 언제나 세심한 주의를 기울입니다. 고객님을 위한 익스클루시브 서비스를 경험해보세요.
                                    <br>
                                    <br>
                                    · 회원가입 및 카카오톡 플러스 친구 추가 시 바로 사용 가능한 3,000원 혜택 
                                    <br>· 구매 금액의 2% 적립
                                    <br>· 후기 작성시 품목당 최대 1,000 포인트 혜택 
                                    <br>· 생일 축하 5,000 포인트 혜택 (1년 이내 구매 이력 있을 시)
                                </div>
                            </li>
                            <li>
                                제품 세부 정보
                                <div class="down">▾</div>
                                <div class="up">▴</div>
                                <div class="detail_notice2">
                                    사용시의 주의사항<br>
                                    1) 화장품 사용 시 또는 사용 후 직사광선에 의하여 사용부위가 붉은반점, 부어오름 또는 가려움증 등의 이상 증상이나 부작용이 있는 경우 전문의 등과 상담할 것
                                    <br>
                                    2) 상처가 있는 부위 등에는 사용을 자제할 것
                                    <br>
                                    3) 보관 및 취급 시의 주의사항 
                                    <br>
                                    가) 어린이의 손이 닿지 않는 곳에 보관할 것
                                    <br>
                                    나) 직사광선을 피해서 보관할 것 *본 제품은 공정거래위원회 고시 소비자 분쟁해결기준에 의해 보상 받으실 수 있습니다.
                                    <br><br>
                                    제조업자
                                    <br>
                                    주식회사 정코스
                                </div>
                            </li>
                            <li>
                                배송 & 반품
                                <div class="down">▾</div>
                                <div class="up">▴</div>
                                <div class="detail_notice2">
                                    <span style="color: #d73627">3만원 이상 구매하실 경우 배송 비용은 무료입니다.<br></span>
                                    <br>
                                    주문량 증가로 인해, 주문일로부터 영업일 기준 3~4일 이내 출고됩니다.(당일 출고 불가)
                                    <br><br>
                                    배송은 지역 택배사 사정에 따라 약간의 지연이 생길 수 있습니다.배송이 시작되면 고객님의 이메일과 문자 메시지로 송장 번호를 전송해 드립니다.
                                    <br>
                                    CJ대한통운(https://www.cjlogistics.com)
                                </div>
                            </li>
                        </ul>
                        <!-- 상세보기 공지사항 끝 -->
                    </li>
                </ul>
            </div>
            <!-- 상단 컨텐츠부분(이미지,가격설명등) 끝-->
            <!-- 상품 상세 설명 or 이미지 시작  -->
            <div id="prod_detail">
                <?php
                $sql2="select * from subimg where p_no=$no";
                $rs2=mysqli_query($conn,$sql2);
                ?>
                    <div class="prod_detail_img">
                        <?php
                            while($row2=mysqli_fetch_array($rs2)){
                            $fname2="/file/".$row2["subimg"];
                            $sqlv="select * from subimg where p_no=$no and subimg like '%.mp4'";
                            $rsv=mysqli_query($conn,$sqlv);
                            $rowv=mysqli_fetch_array($rsv);
                            if(!isset($rowv["subimg"])){
                        ?>
                            <img src="<?php echo $fname2?>">
                        <?php }else{ ?>
                            <video muted autoplay loop src="<?php echo $fname2?>"></video>
                        <?php } }?>
                    </div>
                <ul class="prod_detail_list">
                   <li>
                        <?php echo nl2br($row["content"])?>
                   </li>
                   <?php if($row["madeby"]!=null){?>
                   <li>
                       전성분<span>▾</span>
                        <div class="detail_1">
                            <?php echo nl2br($row["madeby"])?>
                        </div>
                   </li>
                   <?php } ?>
                   <?php if($row["howtouse"]!=null){?>
                   <li>
                        사용법<span>▾</span>
                        <div class="detail_1">
                            <?php echo nl2br($row["howtouse"])?>
                        </div>
                    </li>
                    <?php } ?>
               </ul>
            </div>
            <!-- 상품 상세 설명 or 이미지 끝-->
            <!-- 상품 리뷰 시작 -->
            <div id="prod_review">
                <div id="stock_title">
                    Review
                </div>
                <table class="review_table">
                    <!-- review db -->
                    <?php
                    //page
                    $pagecountsql="select count(*) as cnt from review where p_no=$no";
                    $pagecountrs=mysqli_query($conn,$pagecountsql);
                    $pagecountrow=mysqli_fetch_array($pagecountrs);
                    $allD=$pagecountrow["cnt"];
                    // echo $allD;
                    $pageCount=ceil($allD/5);
                    if(isset($page)){
                        $page=$_GET["page"];
                        $pageGroup=ceil($page/5);
                    }else{
                        $page=1;
                        $pageGroup=1;
                    }
                    $startRow=($page-1)*5;
                    $endRow=$startRow+4;
                    $startPage=($pageGroup-1)*5+1;
                    $endPage=$startPage+4;
                    $groupCount=ceil($pageCount/5);
                    //sql
                    $reviewsql="select * from review where p_no=$no order by re_no desc limit $startRow,$endRow";
                    $reviewrs=mysqli_query($conn,$reviewsql);
                    $chrowNumb=mysqli_num_rows($reviewrs);
                    if($chrowNumb==0){
                    ?>
                    <tr>
                        <th><div style="padding:20px 0px">아직 작성된 리뷰가 없습니다.</div></th>
                    </tr>
                    <?php
                    }else{
                    while($reviewRow=mysqli_fetch_array($reviewrs)){
                        $m_no=$reviewRow["m_no"];
                        $sqlo="select * from memb where m_no=$m_no";
                        $rso=mysqli_query($conn,$sqlo);
                        $rowo=mysqli_fetch_array($rso);
                    ?>
                    <tr>
                      <td>
                        <?php
                            if($reviewRow["star"]==1){
                                echo"★";}
                            if($reviewRow["star"]==2){
                                echo"★★";}
                            if($reviewRow["star"]==3){
                                echo"★★★";}
                            if($reviewRow["star"]==4){
                                echo"★★★★";}
                            if($reviewRow["star"]==5){
                                echo"★★★★★";}
                            ?>
                      </td>
                      <td><?php echo $reviewRow["content"]?></td>
                      <td><?php echo $rowo["id"]?></td>
                      <td><?php echo $reviewRow["date"]?></td>
                    </tr>
                    <?php } } ?>
                    <tr>
                      <td colspan="4">
                          <?php

                             if($pageGroup>1){
                                 $prevpage=($pageGroup-2)*5+1;
                                 ?>
                                 <a href="prod_detail.php?no=<?php echo $no?>&page=<?php echo $prevpage?>">[ Prev ]</a>
                                 <?php
                             }
                            for($i=$startPage;$i<=$endPage;$i++){
                                    if($i>$pageCount)break;
                                ?>
                                    <a href="prod_detail.php?no=<?php echo $no?>&page=<?php echo $i?>">[ <?php echo $i?> ]</a>
                                <?php
                            }
                            if($pageGroup<$groupCount){
                                $nextpage=$pageGroup*5+1;
                                ?>
                                <a href="prod_detail.php?no=<?php echo $no?>&page=<?php echo $nextpage?>">[ Next ]</a>
                                <?php
                            }
                          ?>
                      </td>
                    </tr>
                  </table>
            </div>
            <!-- 상품 리뷰 끝 -->
            <!-- 추천 상품 시작 -->
            <div id="recomend">
                <div id="stock_title">Recommend for you</div>
                <!-- recomend db -->
                <?php
                $keyword=$row["keyword"];
                $recsql="select * from prod where keyword like '%$keyword%' limit 0,3";
                $recrs=mysqli_query($conn,$recsql);
                ?>
                <ul class="best_seller_prod_list" style="margin-top:20px">
                    <?php
                    while($resrow=mysqli_fetch_array($recrs)){
                        $fnameee="/file/".$resrow["img"];
                        $no=$resrow["no"];
                    ?>
                    <li onclick="location.href='prod_detail.php?no=<?php echo $no?>'" style="cursor:pointer">
                        <div class="bs_prod_img">
                            <img src="<?php echo $fnameee?>">
                        </div>
                        <table class="bs_prod_text">
                            <tr>
                                <td>
                                    <?php echo $resrow["size"]?><br>
                                    <span style="font-size:.8em"><?php echo $resrow["smell"]?></span>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $resrow["name"]?></th>
                            </tr>
                            <tr>
                                <td>₩ <?php echo $resrow["price"]?></td>
                            </tr>
                        </table>
                    </li>
                    
                    <?php } ?>
                </ul>
            </div>
            <!-- 추천 상품 끝 -->
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