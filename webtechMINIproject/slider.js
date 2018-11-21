$(function(){
    
let autoSlide = true;

    let slide = $(".slide");
    let firstImg = $(".slide img:first-child");

    const prevBtn = $("#prev");
    const nextBtn = $("#next");
var slidesContainer = [];
var allSlides = [];
const Effects = ["bounceInRight", "flipInX", "lightSpeedIn", "jackInTheBox", "zoomInRight", "zoomInDown", "rotateInDownRight", "fadeInRight", "rubberBand"];

var indexVal = 0
var j = 0;
var k = 0;
    

for(let i = 0; i < slide.length; i++){  
    
    $(".slide").init().eq(i).hide();
    slidesContainer.push(slide[i].firstElementChild.getAttribute("src")); 
    allSlides.push(slide[i]);
}


prevBtn.css("background", 'url(' + $(".slide").init().eq($(".slide").length - 1).find("img")[0].src+ ')'); 
nextBtn.css("background", 'url(' + $(".slide").init().eq(1).find("img")[0].src+ ')');


$(".slide").init().eq(0).show();


prevBtn.on("click", prevSlides);
nextBtn.on("click", nextSlides);
   
    

function prevSlides(){
    
     if (indexVal === 0) {
           j = slidesContainer.length;
        indexVal = slidesContainer.length; 

        $(".slide").init().eq(0).hide();
        $(".slide").init().eq(slidesContainer.length-1).show();
    }
    indexVal = indexVal -1; // decrease by one
    
       allSlides.forEach(function(slides){
        slides.style.display = "none";
    });
    
      if(indexVal === slidesContainer.length - 1){
              k = 0;
           console.log(k);
             nextBtn.css("background", 'url(' + $(".slide").init().eq(k).find("img")[0].src+')');
          }else{
               k = 0;
            k = indexVal + 1;
               nextBtn.css("background", 'url(' + $(".slide").init().eq(k).find("img")[0].src+')');
          }
    
    Effects[Math.floor(Math.random() * (Effects.length ))];
    
$(allSlides[indexVal]).fadeIn().animateCss(Effects[Math.floor(Math.random() * Effects.length)], function() {
 $(this).removeClass("animated slideInLeft");
});

        j = indexVal - 1;    
        prevBtn.css("background", 'url(' + $(".slide").init().eq(j).find("img")[0].src+ ')');
    
     
      if(indexVal === 0){
        k = 0;
        k=indexVal + 1;
         prevBtn.css("background", 'url(' + $(".slide").init().eq($(".slide").length - 1).find("img")[0].src+ ')'); 
        nextBtn.css("background", 'url(' + $(".slide").init().eq(k).find("img")[0].src+ ')');
    }
    
}
    
function nextSlides(){
    indexVal != slidesContainer.length - 1?indexVal++ : indexVal = 0; 
             allSlides.forEach(function(slides){
        slides.style.display = "none";
    });
    
      Effects[Math.floor(Math.random() * (Effects.length ))];
    
$(allSlides[indexVal]).fadeIn().animateCss(Effects[Math.floor(Math.random() * Effects.length)], function() {
 $(this).removeClass("animated slideInLeft");
});
    
        if (indexVal === slidesContainer.length - 1){
             console.log($(".slide"));
        k = 0;
        nextBtn.css("background", 'url(' + $(".slide").init().eq(k).find("img")[0].src+ ')');
    }else{
          k = 0;
     k = indexVal + 1;
         nextBtn.css("background", 'url(' + $(".slide").init().eq(k).find("img")[0].src+ ')');
    }
    
     j = indexVal - 1;
    prevBtn.css("background", 'url(' + $(".slide").init().eq(j).find("img")[0].src+ ')'); 
    
     if(indexVal === 0){
        k = 0;
       j = slidesContainer.length - 1;
        k = indexVal + 1;
        prevBtn.css("background", 'url(' + $(".slide").init().eq(j).find("img")[0].src+ ')'); 
        nextBtn.css("background", 'url(' + $(".slide").init().eq(k).find("img")[0].src+ ')');
    }
    

}
    
if(autoSlide === true){
    setInterval(nextSlides, 5000);   
}    
    
});
    