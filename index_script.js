//샘플 페이드인아웃
let sampleIndex = document.getElementById("index_sample_prod")
window.addEventListener("scroll",()=>{
  let sampleSCR = window.scrollY;
  // console.log("scrollY",sampleSCR);
  if(sampleSCR >=3700 || sampleSCR <=2400){
    sampleIndex.style.animation="popOut 1s ease-out";
  }else{
    sampleIndex.style.animation="popIn 1s ease-out";
  }
})

//인덱스 기프트 슬라이드 in
let giftText = document.getElementById("index_gift_text");
window.addEventListener("scroll",()=>{
  let value = window.scrollY;
  // console.log("scrollY",value);
  // if(value>1000){
  //   giftText.style.animation="slide 1s ease-out";
  // }
  if(value >= 1950 || value ==500){
    giftText.style.animation="slideNo 1s ease-out";
  }
  else{
    giftText.style.animation="slide 1s ease-out";
  }
})