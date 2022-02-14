//메뉴
$("#menu>li").eq(0).mouseover(()=>{
    $("#submenu_back").stop().slideDown();
    $(".submenu").stop().slideDown();
    if(search==true){
        $("#submenu_back").stop().slideUp();
        $("#search_wrap").stop().slideUp();
        search = false;
    }if(cart==true){
        $("#cart_wrap").stop().slideUp();
        cart = false;
    }
})
$("#menu>li").eq(0).mouseleave(()=>{
    $("#submenu_back").stop().slideUp();
    $(".submenu").stop().slideUp();
})

//푸터 메뉴
$(".footer_menu>li").eq(0).click(()=>{
  $("#footer_modal").fadeIn();
})
$(".footer_modal_close").click(()=>{
  $("#footer_modal").css("display","none");
})
//유저메뉴 - 카트
var cart = false;
$("#usmenu>li").eq(1).click(()=>{
    if(cart==false){
        $("#cart_wrap").stop().slideDown();
        cart = true;
        if(search==true){
            $("#submenu_back").stop().slideUp();
            $("#search_wrap").stop().slideUp();
            search = false;
        }
    }else if(cart==true){
        $("#cart_wrap").stop().slideUp();
        cart = false;
    }
})
//유저메뉴 - 검색하기
var search = false;
$("#usmenu>li>img").click(()=>{
    if(search==false){
        $("#submenu_back").stop().slideDown();
        $("#search_wrap").stop().slideDown();
        search = true;
        if(cart==true){
            $("#cart_wrap").stop().slideUp();
            cart = false;
        }
    }
    else if(search==true){
        $("#submenu_back").stop().slideUp();
        $("#search_wrap").stop().slideUp();
        search = false;
    }
})

//스토어 슬라이드
$("#store .next").click(function () {
  $("#store .next").css({ color: "gray" });
  $("#store .prev").css({ color: "#222" });
  $(".store_list>li").eq(0).animate({ left: "-1200px" }, 2000);
  $(".store_list>li").eq(1).animate({ left: "-1200px" }, 2000);
});
$("#store .prev").click(function () {
  $("#store .prev").css({ color: "gray" });
  $("#store .next").css({ color: "#222" });
  $(".store_list>li").eq(0).animate({ left: "0px" }, 2000);
  $(".store_list>li").eq(1).animate({ left: "0px" }, 2000);
});
//스토어 탭
$(".store_content>li").eq(0).css("display", "block");
$(".store_content>li").eq(0).siblings().css("display", "none");
$(".store_nav>li").click(function () {
  var idx = $(".store_nav>li").index(this);
  // alert(idx);
  $(".store_content>li").eq(idx).css("display", "block");
  $(".store_content>li").eq(idx).siblings().css("display", "none");
});
//스토어 슬라이드
let now2 = 0;
$("#store_img2>img").eq(2).css("left", "-2400px");
$("#store_img2>img").eq(2).css("display", "none");
$("#store_img2>img").eq(3).css("left", "-1200px");
$("#store_img2>video").eq(0).css("left", "0px");
$("#store_img2>img").eq(0).css("left", "1200px");
$("#store_img2>img").eq(1).css("left", "2400px");

$(".store_prev2").click(() => {
  if (now2 == 0) {
    now2 = 4;
  } else {
    now2--;
  }
  slide2(now2);
});
$(".store_next2").click(() => {
  if (now2 == 4) {
    now2 = 0;
  } else {
    now2++;
  }
  slide2(now2);
});
function slide2(now2) {
  if (now2 == 0) {
    $("#store_img2>img").eq(2).css("left", "-2400px");
    $("#store_img2>img").eq(2).css("display", "none");
    $("#store_img2>img").eq(3).css("left", "-1200px");
    $("#store_img2>video").eq(0).css("left", "0px");
    $("#store_img2>video").eq(0).css("display", "block");
    $("#store_img2>img").eq(0).css("left", "1200px");
    $("#store_img2>img").eq(0).css("display", "block");
    $("#store_img2>img").eq(1).css("left", "2400px");
    console.log(now2);
  }
  if (now2 == 1) {
    $("#store_img2>img").eq(3).css("left", "-2400px");
    $("#store_img2>img").eq(3).css("display", "none");
    $("#store_img2>video").eq(0).css("left", "-1200px");
    $("#store_img2>img").eq(0).css("left", "0px");
    $("#store_img2>img").eq(0).css("display", "block");
    $("#store_img2>img").eq(1).css("left", "1200px");
    $("#store_img2>img").eq(1).css("display", "block");
    $("#store_img2>img").eq(2).css("left", "2400px");
    console.log(now2);
  }
  if (now2 == 2) {
    $("#store_img2>video").eq(0).css("left", "-2400px");
    $("#store_img2>video").eq(0).css("display", "none");
    $("#store_img2>img").eq(0).css("left", "-1200px");
    $("#store_img2>img").eq(1).css("left", "0px");
    $("#store_img2>img").eq(1).css("display", "block");
    $("#store_img2>img").eq(2).css("left", "1200px");
    $("#store_img2>img").eq(2).css("display", "block");
    $("#store_img2>img").eq(3).css("left", "2400px");
    console.log(now2);
  }
  if (now2 == 3) {
    $("#store_img2>img").eq(0).css("left", "-2400px");
    $("#store_img2>img").eq(0).css("display", "none");
    $("#store_img2>img").eq(1).css("left", "-1200px");
    $("#store_img2>img").eq(2).css("left", "0px");
    $("#store_img2>img").eq(2).css("display", "block");
    $("#store_img2>img").eq(3).css("left", "1200px");
    $("#store_img2>img").eq(3).css("display", "block");
    $("#store_img2>video").eq(0).css("left", "2400px");
    console.log(now2);
  }
  if (now2 == 4) {
    $("#store_img2>img").eq(1).css("left", "-2400px");
    $("#store_img2>img").eq(1).css("display", "none");
    $("#store_img2>img").eq(2).css("left", "-1200px");
    $("#store_img2>img").eq(3).css("left", "0px");
    $("#store_img2>img").eq(3).css("display", "block");
    $("#store_img2>video").eq(0).css("left", "1200px");
    $("#store_img2>video").eq(0).css("display", "block");
    $("#store_img2>img").eq(0).css("left", "2400px");
    console.log(now2);
  }
}
let now = 0;
let imgs = 6;
$("#store_img>img").eq(0).css("left", "-3600px");
$("#store_img>img").eq(0).css("display", "none");
$("#store_img>img").eq(1).css("left", "-2400px");
$("#store_img>img").eq(2).css("left", "-1200px");
$("#store_img>img").eq(3).css("left", "0px");
$("#store_img>img").eq(4).css("left", "1200px");
$("#store_img>img").eq(4).css("display", "block");
$("#store_img>img").eq(5).css("left", "2400px");
$("#store_img>img").eq(6).css("left", "3600px");

$(".store_prev").click(() => {
  if (now == 0) {
    now = 6;
  } else {
    now--;
  }
  slide(now);
});
$(".store_next").click(() => {
  if (now == 6) {
    now = 0;
  } else {
    now++;
  }
  slide(now);
});
function slide(now) {
  if (now == 0) {
    $("#store_img>img").eq(0).css("left", "-3600px");
    $("#store_img>img").eq(0).css("display", "none");
    $("#store_img>img").eq(1).css("left", "-2400px");
    $("#store_img>img").eq(2).css("left", "-1200px");
    $("#store_img>img").eq(3).css("left", "0px");
    $("#store_img>img").eq(3).css("display", "block");
    $("#store_img>img").eq(4).css("left", "1200px");
    $("#store_img>img").eq(4).css("display", "block");
    $("#store_img>img").eq(5).css("left", "2400px");
    $("#store_img>img").eq(6).css("left", "3600px");
  } else if (now == 1) {
    $("#store_img>img").eq(1).css("left", "-3600px");
    $("#store_img>img").eq(1).css("display", "none");
    $("#store_img>img").eq(2).css("left", "-2400px");
    $("#store_img>img").eq(3).css("left", "-1200px");
    $("#store_img>img").eq(4).css("left", "0px");
    $("#store_img>img").eq(4).css("display", "block");
    $("#store_img>img").eq(5).css("left", "1200px");
    $("#store_img>img").eq(5).css("display", "block");
    $("#store_img>img").eq(6).css("left", "2400px");
    $("#store_img>img").eq(0).css("left", "3600px");
  } else if (now == 2) {
    $("#store_img>img").eq(2).css("left", "-3600px");
    $("#store_img>img").eq(2).css("display", "none");
    $("#store_img>img").eq(3).css("left", "-2400px");
    $("#store_img>img").eq(4).css("left", "-1200px");
    $("#store_img>img").eq(5).css("left", "0px");
    $("#store_img>img").eq(5).css("display", "block");
    $("#store_img>img").eq(6).css("left", "1200px");
    $("#store_img>img").eq(6).css("display", "block");
    $("#store_img>img").eq(0).css("left", "2400px");
    $("#store_img>img").eq(1).css("left", "3600px");
  }
  if (now == 3) {
    $("#store_img>img").eq(3).css("left", "-3600px");
    $("#store_img>img").eq(3).css("display", "none");
    $("#store_img>img").eq(4).css("left", "-2400px");
    $("#store_img>img").eq(5).css("left", "-1200px");
    $("#store_img>img").eq(6).css("left", "0px");
    $("#store_img>img").eq(6).css("display", "block");
    $("#store_img>img").eq(0).css("left", "1200px");
    $("#store_img>img").eq(0).css("display", "block");
    $("#store_img>img").eq(1).css("left", "2400px");
    $("#store_img>img").eq(2).css("left", "3600px");
  }
  if (now == 4) {
    $("#store_img>img").eq(4).css("left", "-3600px");
    $("#store_img>img").eq(4).css("display", "none");
    $("#store_img>img").eq(5).css("left", "-2400px");
    $("#store_img>img").eq(6).css("left", "-1200px");
    $("#store_img>img").eq(0).css("left", "0px");
    $("#store_img>img").eq(0).css("display", "block");
    $("#store_img>img").eq(1).css("left", "1200px");
    $("#store_img>img").eq(1).css("display", "block");
    $("#store_img>img").eq(2).css("left", "2400px");
    $("#store_img>img").eq(3).css("left", "3600px");
  }
  if (now == 5) {
    $("#store_img>img").eq(5).css("left", "-3600px");
    $("#store_img>img").eq(5).css("display", "none");
    $("#store_img>img").eq(6).css("left", "-2400px");
    $("#store_img>img").eq(0).css("left", "-1200px");
    $("#store_img>img").eq(1).css("left", "0px");
    $("#store_img>img").eq(1).css("display", "block");
    $("#store_img>img").eq(2).css("left", "1200px");
    $("#store_img>img").eq(2).css("display", "block");
    $("#store_img>img").eq(3).css("left", "2400px");
    $("#store_img>img").eq(4).css("left", "3600px");
  }
  if (now == 6) {
    $("#store_img>img").eq(6).css("left", "-3600px");
    $("#store_img>img").eq(6).css("display", "none");
    $("#store_img>img").eq(0).css("left", "-2400px");
    $("#store_img>img").eq(1).css("left", "-1200px");
    $("#store_img>img").eq(2).css("left", "0px");
    $("#store_img>img").eq(2).css("display", "block");
    $("#store_img>img").eq(3).css("left", "1200px");
    $("#store_img>img").eq(3).css("display", "block");
    $("#store_img>img").eq(4).css("left", "2400px");
    $("#store_img>img").eq(5).css("left", "3600px");
  }
}

let now3 = 0;
$("#store_img3>img").eq(4).css("left", "-4800px");
$("#store_img3>img").eq(4).css("display", "none");
$("#store_img3>img").eq(5).css("left", "-3600px");
$("#store_img3>img").eq(6).css("left", "-2400px");
$("#store_img3>img").eq(7).css("left", "-1200px");
$("#store_img3>video").eq(0).css("left", "0px");
$("#store_img3>video").eq(0).css("display", "block");
$("#store_img3>img").eq(0).css("left", "1200px");
$("#store_img3>img").eq(1).css("left", "2400px");
$("#store_img3>img").eq(1).css("display", "block");
$("#store_img3>img").eq(2).css("left", "3600px");
$("#store_img3>img").eq(3).css("left", "4800px");
$(".store_prev3").click(() => {
  if (now3 == 0) {
    now3 = 8;
  } else {
    now3--;
  }
  slide3(now3);
});
$(".store_next3").click(() => {
  if (now3 == 8) {
    now3 = 0;
  } else {
    now3++;
  }
  slide3(now3);
});
function slide3(now3) {
  if (now3 == 1) {
    $("#store_img3>img").eq(5).css("left", "-4800px");
    $("#store_img3>img").eq(5).css("display", "none");
    $("#store_img3>img").eq(6).css("left", "-3600px");
    $("#store_img3>img").eq(7).css("left", "-2400px");
    $("#store_img3>video").eq(0).css("left", "-1200px");
    $("#store_img3>img").eq(0).css("left", "0px");
    $("#store_img3>img").eq(0).css("display", "block");
    $("#store_img3>img").eq(1).css("left", "1200px");
    $("#store_img3>img").eq(2).css("left", "2400px");
    $("#store_img3>img").eq(2).css("display", "block");
    $("#store_img3>img").eq(3).css("left", "3600px");
    $("#store_img3>img").eq(4).css("left", "4800px");
  }
  if (now3 == 2) {
    $("#store_img3>img").eq(6).css("left", "-4800px");
    $("#store_img3>img").eq(6).css("display", "none");
    $("#store_img3>img").eq(7).css("left", "-3600px");
    $("#store_img3>video").eq(0).css("left", "-2400px");
    $("#store_img3>img").eq(0).css("left", "-1200px");
    $("#store_img3>img").eq(1).css("left", "0px");
    $("#store_img3>img").eq(1).css("display", "block");
    $("#store_img3>img").eq(2).css("left", "1200px");
    $("#store_img3>img").eq(3).css("left", "2400px");
    $("#store_img3>img").eq(3).css("display", "block");
    $("#store_img3>img").eq(4).css("left", "3600px");
    $("#store_img3>img").eq(5).css("left", "4800px");
  }
  if (now3 == 3) {
    $("#store_img3>img").eq(7).css("left", "-4800px");
    $("#store_img3>img").eq(7).css("display", "none");
    $("#store_img3>video").eq(0).css("left", "-3600px");
    $("#store_img3>img").eq(0).css("left", "-2400px");
    $("#store_img3>img").eq(1).css("left", "-1200px");
    $("#store_img3>img").eq(2).css("left", "0px");
    $("#store_img3>img").eq(2).css("display", "block");
    $("#store_img3>img").eq(3).css("left", "1200px");
    $("#store_img3>img").eq(4).css("left", "2400px");
    $("#store_img3>img").eq(4).css("display", "block");
    $("#store_img3>img").eq(5).css("left", "3600px");
    $("#store_img3>img").eq(6).css("left", "4800px");
  }
  if (now3 == 4) {
    $("#store_img3>video").eq(0).css("left", "-4800px");
    $("#store_img3>video").eq(0).css("display", "none");
    $("#store_img3>img").eq(0).css("left", "-3600px");
    $("#store_img3>img").eq(1).css("left", "-2400px");
    $("#store_img3>img").eq(2).css("left", "-1200px");
    $("#store_img3>img").eq(3).css("left", "0px");
    $("#store_img3>img").eq(3).css("display", "block");
    $("#store_img3>img").eq(4).css("left", "1200px");
    $("#store_img3>img").eq(5).css("left", "2400px");
    $("#store_img3>img").eq(5).css("display", "block");
    $("#store_img3>img").eq(6).css("left", "3600px");
    $("#store_img3>img").eq(7).css("left", "4800px");
  }
  if (now3 == 5) {
    $("#store_img3>img").eq(0).css("left", "-4800px");
    $("#store_img3>img").eq(0).css("display", "none");
    $("#store_img3>img").eq(1).css("left", "-3600px");
    $("#store_img3>img").eq(2).css("left", "-2400px");
    $("#store_img3>img").eq(3).css("left", "-1200px");
    $("#store_img3>img").eq(4).css("left", "0px");
    $("#store_img3>img").eq(4).css("display", "block");
    $("#store_img3>img").eq(5).css("left", "1200px");
    $("#store_img3>img").eq(6).css("left", "2400px");
    $("#store_img3>img").eq(6).css("display", "block");
    $("#store_img3>img").eq(7).css("left", "3600px");
    $("#store_img3>video").eq(0).css("left", "4800px");
  }
  if (now3 == 6) {
    $("#store_img3>img").eq(1).css("left", "-4800px");
    $("#store_img3>img").eq(1).css("display", "none");
    $("#store_img3>img").eq(2).css("left", "-3600px");
    $("#store_img3>img").eq(3).css("left", "-2400px");
    $("#store_img3>img").eq(4).css("left", "-1200px");
    $("#store_img3>img").eq(5).css("left", "0px");
    $("#store_img3>img").eq(5).css("display", "block");
    $("#store_img3>img").eq(6).css("left", "1200px");
    $("#store_img3>img").eq(7).css("left", "2400px");
    $("#store_img3>img").eq(7).css("display", "block");
    $("#store_img3>video").eq(0).css("left", "3600px");
    $("#store_img3>img").eq(0).css("left", "4800px");
  }
  if (now3 == 7) {
    $("#store_img3>img").eq(2).css("left", "-4800px");
    $("#store_img3>img").eq(2).css("display", "none");
    $("#store_img3>img").eq(3).css("left", "-3600px");
    $("#store_img3>img").eq(4).css("left", "-2400px");
    $("#store_img3>img").eq(5).css("left", "-1200px");
    $("#store_img3>img").eq(6).css("left", "0px");
    $("#store_img3>img").eq(6).css("display", "block");
    $("#store_img3>img").eq(7).css("left", "1200px");
    $("#store_img3>video").eq(0).css("left", "2400px");
    $("#store_img3>video").eq(0).css("display", "block");
    $("#store_img3>img").eq(0).css("left", "3600px");
    $("#store_img3>img").eq(1).css("left", "4800px");
  }
  if (now3 == 8) {
    $("#store_img3>img").eq(3).css("left", "-4800px");
    $("#store_img3>img").eq(3).css("display", "none");
    $("#store_img3>img").eq(4).css("left", "-3600px");
    $("#store_img3>img").eq(5).css("left", "-2400px");
    $("#store_img3>img").eq(6).css("left", "-1200px");
    $("#store_img3>img").eq(7).css("left", "0px");
    $("#store_img3>img").eq(7).css("display", "block");
    $("#store_img3>video").eq(0).css("left", "1200px");
    $("#store_img3>img").eq(0).css("left", "2400px");
    $("#store_img3>img").eq(0).css("display", "block");
    $("#store_img3>img").eq(1).css("left", "3600px");
    $("#store_img3>img").eq(2).css("left", "4800px");
  }
  if (now3 == 0) {
    $("#store_img3>img").eq(4).css("left", "-4800px");
    $("#store_img3>img").eq(4).css("display", "none");
    $("#store_img3>img").eq(5).css("left", "-3600px");
    $("#store_img3>img").eq(6).css("left", "-2400px");
    $("#store_img3>img").eq(7).css("left", "-1200px");
    $("#store_img3>video").eq(0).css("left", "0px");
    $("#store_img3>video").eq(0).css("display", "block");
    $("#store_img3>img").eq(0).css("left", "1200px");
    $("#store_img3>img").eq(1).css("left", "2400px");
    $("#store_img3>img").eq(1).css("display", "block");
    $("#store_img3>img").eq(2).css("left", "3600px");
    $("#store_img3>img").eq(3).css("left", "4800px");
  }
}

let now4 = 0;
$("#store_img4>img").eq(2).css("left", "-2400px");
$("#store_img4>img").eq(2).css("display", "none");
$("#store_img4>img").eq(3).css("left", "-1200px");
$("#store_img4>video").eq(0).css("left", "0px");
$("#store_img4>img").eq(0).css("left", "1200px");
$("#store_img4>video").eq(0).css("display", "block");
$("#store_img4>img").eq(0).css("display", "block");
$("#store_img4>img").eq(1).css("left", "2400px");
$(".store_prev4").click(() => {
  if (now4 == 0) {
    now4 = 4;
  } else {
    now4--;
  }
  slide4(now4);
});
$(".store_next4").click(() => {
  if (now4 == 4) {
    now4 = 0;
  } else {
    now4++;
  }
  slide4(now4);
});
function slide4(now4) {
  if (now4 == 0) {
    $("#store_img4>img").eq(2).css("left", "-2400px");
    $("#store_img4>img").eq(2).css("display", "none");
    $("#store_img4>img").eq(3).css("left", "-1200px");
    $("#store_img4>video").eq(0).css("left", "0px");
    $("#store_img4>img").eq(0).css("left", "1200px");
    $("#store_img4>video").eq(0).css("display", "block");
    $("#store_img4>img").eq(0).css("display", "block");
    $("#store_img4>img").eq(1).css("left", "2400px");
  }
  if (now4 == 1) {
    $("#store_img4>img").eq(3).css("left", "-2400px");
    $("#store_img4>img").eq(3).css("display", "none");
    $("#store_img4>video").eq(0).css("left", "-1200px");
    $("#store_img4>img").eq(0).css("left", "0px");
    $("#store_img4>img").eq(1).css("left", "1200px");
    $("#store_img4>img").eq(0).css("display", "block");
    $("#store_img4>img").eq(1).css("display", "block");
    $("#store_img4>img").eq(2).css("left", "2400px");
  }
  if (now4 == 2) {
    $("#store_img4>video").eq(0).css("left", "-2400px");
    $("#store_img4>video").eq(0).css("display", "none");
    $("#store_img4>img").eq(0).css("left", "-1200px");
    $("#store_img4>img").eq(1).css("left", "0px");
    $("#store_img4>img").eq(2).css("left", "1200px");
    $("#store_img4>img").eq(1).css("display", "block");
    $("#store_img4>img").eq(2).css("display", "block");
    $("#store_img4>img").eq(3).css("left", "2400px");
  }
  if (now4 == 3) {
    $("#store_img4>img").eq(0).css("left", "-2400px");
    $("#store_img4>img").eq(0).css("display", "none");
    $("#store_img4>img").eq(1).css("left", "-1200px");
    $("#store_img4>img").eq(2).css("left", "0px");
    $("#store_img4>img").eq(3).css("left", "1200px");
    $("#store_img4>img").eq(2).css("display", "block");
    $("#store_img4>img").eq(3).css("display", "block");
    $("#store_img4>video").eq(0).css("left", "2400px");
  }
  if (now4 == 4) {
    $("#store_img4>img").eq(1).css("left", "-2400px");
    $("#store_img4>img").eq(1).css("display", "none");
    $("#store_img4>img").eq(2).css("left", "-1200px");
    $("#store_img4>img").eq(3).css("left", "0px");
    $("#store_img4>video").eq(0).css("left", "1200px");
    $("#store_img4>img").eq(3).css("display", "block");
    $("#store_img4>video").eq(0).css("display", "block");
    $("#store_img4>img").eq(0).css("left", "2400px");
  }
}

//상품상세보기 notice슬라이드
let detail_false = false;
$(".detail_notice>li").click(function () {
  var detail = $(".detail_notice>li").index(this);
  // alert(idx);
  if (detail_false == false) {
    $(".detail_notice>li").eq(detail).children(".detail_notice2").slideDown();
    $(".detail_notice>li")
      .eq(detail)
      .siblings()
      .children(".detail_notice2")
      .slideUp();
    detail_false = true;
  } else {
    $(".detail_notice>li").eq(detail).children(".detail_notice2").slideUp();
    detail_false = false;
  }
});

//결제방법 버튼
$(".pay_box > li").click(function(){
  var pay= $(".pay_box > li").index(this);
  // alert(pay);
  $(".pay_box > li").eq(pay).css({"background-color":"#222","color":"white"})
  $(".pay_box > li").eq(pay).siblings().css({"background-color":"white","color":"#222"})
})

//리뷰 모달
let reviewStar1 = false;
let reviewStar2 = false;
let reviewStar3 = false;
let reviewStar4 = false;
let reviewStar5 = false;
$(".reviewPoint>li").eq(0).click(function(){
  if(reviewStar1==false){
    $(".reviewPoint>li").eq(0).css({"color":"#222"});
    reviewStar1 = true;
  }else if( reviewStar1==true){
    $(".reviewPoint>li").eq(0).css({"color":"gray"});
    reviewStar1 = false;
  }
})
$(".reviewPoint>li").eq(1).click(function(){
  if(reviewStar2==false){
    $(".reviewPoint>li").eq(1).css({"color":"#222"});
    reviewStar2 = true;
  }else if( reviewStar2==true){
    $(".reviewPoint>li").eq(1).css({"color":"gray"});
    reviewStar2 = false;
  }
})
$(".reviewPoint>li").eq(2).click(function(){
  if(reviewStar3==false){
    $(".reviewPoint>li").eq(2).css({"color":"#222"});
    reviewStar3 = true;
  }else if( reviewStar3==true){
    $(".reviewPoint>li").eq(2).css({"color":"gray"});
    reviewStar3 = false;
  }
})
$(".reviewPoint>li").eq(3).click(function(){
  if(reviewStar4==false){
    $(".reviewPoint>li").eq(3).css({"color":"#222"});
    reviewStar4 = true;
  }else if( reviewStar4==true){
    $(".reviewPoint>li").eq(3).css({"color":"gray"});
    reviewStar4 = false;
  }
})
$(".reviewPoint>li").eq(4).click(function(){
  if(reviewStar5==false){
    $(".reviewPoint>li").eq(4).css({"color":"#222"});
    reviewStar5 = true;
  }else if( reviewStar5==true){
    $(".reviewPoint>li").eq(4).css({"color":"gray"});
    reviewStar5 = false;
  }
})

//자주 묻는 질문
let fnq_false = false;
$(".faq_content_text>li").click(function () {
  var fnq_detail = $(".faq_content_text>li").index(this);
  // alert(idx);
  if (fnq_false == false) {
    $(".faq_content_text>li").eq(fnq_detail).children(".faq_re").slideDown();
    $(".faq_content_text>li").eq(fnq_detail).siblings().children(".faq_re").slideUp();
      fnq_false = true;
  } else if(fnq_false==true){
    $(".faq_content_text>li").eq(fnq_detail).children(".faq_re").slideUp();
    fnq_false = false;
  }
});

$(".faq_content>li").eq(0).css("display","block");
$(".faq_content>li").eq(0).siblings().css("display","none");
$(".faq_list>li").eq(0).css({"background-color":"#d73627","color":"white"})
$(".faq_list>li").eq(0).siblings().css({"background-color":"white","color":"#222"})
$(".faq_list>li").click(function(){
  var faq_list_ind =  $(".faq_list>li").index(this);
  $(".faq_list>li").eq(faq_list_ind).css({"background-color":"#d73627","color":"white"})
  $(".faq_list>li").eq(faq_list_ind).siblings().css({"background-color":"white","color":"#222"})
  $(".faq_content>li").eq(faq_list_ind).css("display","block");
  $(".faq_content>li").eq(faq_list_ind).siblings().css("display","none");

})


//인덱스 베스트셀러 슬라이드
$(".best_seller_bt>li").eq(0).click(()=>{
  $("#best_seller_prod").animate({"left":"0px"},2000)
})
$(".best_seller_bt>li").eq(1).click(()=>{
  $("#best_seller_prod").animate({"left":"-1200px"},2000)
})
//인덱스 기프트 슬라이드
$(".gift_move_bt>li").eq(0).click(()=>{
  $("#gift_prod2").animate({"left":"0px"},2000)
})
$(".gift_move_bt>li").eq(1).click(()=>{
  $("#gift_prod2").animate({"left":"-1200px"},2000)
})


//상품 상세 상세설명란
var prodDetailFalse=false;
$(".prod_detail_list>li").click(function(){
  var prodDetail = $(".prod_detail_list>li").index(this);
  // alert(prodDetail);
  if(prodDetailFalse==false){
  $(".prod_detail_list>li").eq(prodDetail).children(".detail_1").slideDown();
  prodDetailFalse=true;
  }
  else if(prodDetailFalse==true){
  $(".prod_detail_list>li").eq(prodDetail).children(".detail_1").slideUp();
  prodDetailFalse=false;
  }
})
//상품 메뉴 따라오게 하기
var currentPosition = parseInt($("nav").css("top"));
$(window).scroll(function() {
  let navPosition= window.scrollY;
  // console.log("scrollY",navPosition);
  if(navPosition>1400){
    $("nav").stop().css({"top":"1400px"});
  }else{
      var position = $(window).scrollTop(); 
      $("nav").stop().animate({"top":position+currentPosition+"px"},20); 
  }
  
});

//리뷰
$(".review_tap_content>li").eq(1).css("display","none");
$(".review_nav>li").eq(0).click(()=>{
  $(".review_nav>li").eq(0).css({"background-color": "#cec6bd"})
  $(".review_nav>li").eq(0).siblings().css({"background-color": "white"})
  $(".review_tap_content>li").eq(0).css("display","block");
  $(".review_tap_content>li").eq(0).siblings().css("display","none");
})
$(".review_nav>li").eq(1).click(()=>{
  $(".review_nav>li").eq(1).css({"background-color": "#cec6bd"})
  $(".review_nav>li").eq(1).siblings().css({"background-color": "white"})
  $(".review_tap_content>li").eq(1).css("display","block");
  $(".review_tap_content>li").eq(1).siblings().css("display","none");
})