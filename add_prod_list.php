<?php
include "include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자페이지</title>
    <link rel="stylesheet" href="style2.css">
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="script.js" defer="defer"></script>
    <!-- 폰트 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
</head>
<body>
    <div id="wrap">
        <!-- 헤더 시작 -->
        <header>
            <div id="header_wrap">
                <!-- 로고시작 -->
                <div id="logo">
                    <img src="img/logo_small.png">
                </div>
                <!-- 로고 끝 -->
                <!-- 메뉴 시작 -->
                <ul id="menu">
                    <li>
                        <ul class="menu_wrap">
                            <li><img src="img/login.png"></li>
                            <li>고객관리</li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu_wrap">
                            <li><img src="img/add.png"></li>
                            <li>상품조회/추가</li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu_wrap">
                            <li><img src="img/grap.png"></li>
                            <li>주문현황</li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu_wrap">
                            <li><img src="img/money.png"></li>
                            <li>통계</li>
                        </ul>
                    </li>
                </ul>
                <!-- 메뉴 끝 -->
                <!-- 로그인 메뉴 -->
                <input type="button" value="Logout" class="login_bt">
                <input type="button" value="홈페이지" class="login_bt">
                <!-- 로그인 메뉴 끝 -->
            </div>
        </header>
        <!-- 헤더 끝 -->
        <!-- 본문시작 -->
        <section>
            <ul class="nav">
                <li style="background-color:#003494;">상품추가하기</li>
                <li>상품조회</li>
            </ul>
        </section>
        <article>
            <form name="frm1" method="post" enctype="multipart/form-data" action="add_prod_ok.php">
                <table class="add_prod_table">
                    <tr>
                        <th>상품명</th>
                        <td><input type="text" name="name" placeholder="상품명을 입력하세요" class="add_prod_text"></td>
                    </tr>
                    <tr>
                        <th>상품분류</th>
                        <td>
                            <select name="kinds">
                                <option value="2">튜브핸드</option>
                                <option value="3">퍼퓸핸드</option>
                                <option value="4">체인핸드</option>
                                <option value="7">손소독제</option>
                                <option value="5"> 향오브젝트</option>
                                <option value="8">바디&핸드 대용량</option>
                                <option value="6">룸스프레이</option>
                                <option value="9">스킨케어</option>
                                <option value="10">선물</option>
                                <option value="11">샘플키트</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>포스터여부</th>
                        <td><input type="checkbox" name="poster">포스터로추가하기</td>
                    </tr>
                    <tr>
                        <th>가격</th>
                        <td><input type="text" name="price" placeholder="상품가격을 입력하세요" class="add_prod_text"></td>
                    </tr>
                    <tr>
                        <th>대표이미지</th>
                        <td><input type="file" name="img" class="add_prod_text"></td>
                    </tr>
                    <tr>
                        <th>상세이미지</th>
                        <td><input type="file" name="subimg[]" class="add_prod_text" multiple="multiple"></td>
                    </tr>
                    <tr>
                        <th>향 종류</th>
                        <td><input type="text" name="smell" placeholder="향/용량등을 입력하세요" class="add_prod_text"></td>
                    </tr>
                    <tr>
                        <th>용량</th>
                        <td><input type="text" name="size" placeholder="향/용량등을 입력하세요" class="add_prod_text"></td>
                    </tr>
                    <tr>
                        <th>전성분</th>
                        <td><textarea cols="1000" rows="10" name="madeby" class="add_prod_text" style="width: 400px;height: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <th>사용법</th>
                        <td><textarea cols="1000" rows="10" name="howtouse" class="add_prod_text" style="width: 400px;height: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <th>키워드</th>
                        <td><input type="text" name="keyword" placeholder="키워드를 입력하세요" class="add_prod_text"></td>
                    </tr>
                    <tr>
                        <th>상세 설명</th>
                        <td><textarea cols="1000" rows="10" name="content" class="add_prod_text" style="width: 400px;height: 200px;"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="추가하기" class="add_prod_bt">
                        </td>
                    </tr>
                </table>
            </form>
        </article>
        <!-- 본문 끝 -->
        <!-- 바닥글 시작 -->
        
        <!-- 바닥글 끝 -->
    </div>
</body>
</html>