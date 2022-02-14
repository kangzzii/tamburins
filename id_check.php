<?php
include "include.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sqlid="select * from memb where id='$id'";
    $rsid=mysqli_query($conn,$sqlid);
    $cntid=mysqli_num_rows($rsid);
    $rowid=mysqli_fetch_array($rsid);
}
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
    <div id="nonmemb_pop">
        <form name="frm" method="post">
            <ul class="nonmemb_list">
                <li><img src="img/logo_small.png"></li>
                <li style="text-align:center">
                    <?php if($cntid!=0){ ?>
                        <?php echo $id?>는 <span style="color:red">사용불가능</span>한 ID입니다.
                        <?php
                    }else{ ?>
                        <?php echo $id?>는 <span style="color:blue">사용가능</span>한 ID입니다.
                </li>
                <li>
                    <input type="button" class="nonmemb_bt" value="닫기" onclick="send()">
                </li>
            </ul>
            <input type="hidden" name="id2" value="<?php echo $id?>">
            <?php } ?>
            <script>
                function send(){
                    opener.document.signfrm.id2.value="<?php echo $id?>";
                    this.close();
                }
            </script>
        </form>
    </div>
</body>
</html>