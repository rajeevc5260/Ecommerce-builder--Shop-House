//cursor animation//
var cursor = document.querySelector(".cursor");
var cursor2 = document.querySelector(".cursor2");
document.addEventListener("mousemove",function(e){
  cursor.style.cssText = cursor2.style.cssText = "left: " + e.clientX + "px; top: " + e.clientY + "px;";
});


//animation on landing page//
anime({
    targets: '.navbar',
    opacity: {
        value: [0, 1],
        duration: 800,
        delay: 700
    },
    delay: 4500,
    easing: 'easeInOutExpo'
});
anime({
    targets: '.logo',
    opacity: {
        value: [0, 1],
        duration: 900,
        delay: 900
    },
    delay: 4500,
    easing: 'easeInOutExpo'
});

anime({
    targets: '.right li',
    translateX: [-200, 0],
    opacity: [0, 1],
    duration: 3000,
    delay: anime.stagger(200, {start: 500, from: 'first'}),
    easing: 'easeInOutExpo'
});

anime({
    targets: '.col h5',
    translateY: [50, 0],
    opacity: [0, 1],
    duration: 1300,
    delay: 2300,
    easing: 'easeInOutExpo'
});

anime({
    targets: '.col h1',
    translateY: [50, 0],
    opacity: [0, 1],
    duration: 1300,
    delay: 2600,
    easing: 'easeInOutExpo'
});

anime({
    targets: '.sbt',
    translateY: [50, 0],
    opacity: [0, 1],
    duration: 1300,
    delay: 2900,
    easing: 'easeInOutExpo'
});

anime({
    targets: '.card1',
    opacity: {
        value: [0, 1],
        duration: 3000,
        delay: 4000
    },
    delay: 4500,
    easing: 'easeInOutExpo'
});



anime({
    targets: '.card2',
    opacity: {
        value: [0, 1],
        duration: 3000,
        delay: 5000
    },
    delay: 4500,
    easing: 'easeInOutExpo'
});


anime({
    targets: '.card3',
    opacity: {
        value: [0, 1],
        duration: 3000,
        delay: 6000
    },
    delay: 4500,
    easing: 'easeInOutExpo'
});

anime({
    targets: '.card4',
    opacity: {
        value: [0, 1],
        duration: 3000,
        delay: 7000
    },
    delay: 4500,
    easing: 'easeInOutExpo'
});

anime({
    targets: '.scrolldown',
    translateY: [-50, 0],
    opacity: [0, 1],
    loop: true,
    duration: 2000,
});
//strat trail screen//
document.getElementById('sbt').addEventListener('click',
function(){
document.querySelector('.createacc').style.display ='flex';
});


//back to top//
$(document).ready(function(){

$(window).scroll(function(){
if($(this).scrollTop() > 30){
$('#topBtn').fadeIn();
} else{
$('#topBtn').fadeOut();
}
});

$("#topBtn").click(function(){
$('html ,body').animate({scrollTop : 0},500);
});
});


//globe//
am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    var chart = am4core.create("Globe", am4maps.MapChart);
    
    // Set map definition
    chart.geodata = am4geodata_worldLow;
    
    // Set projection
    chart.projection = new am4maps.projections.Orthographic();
    chart.panBehavior = "rotateLongLat";
    chart.deltaLatitude = -20;
    chart.padding(20,20,20,20);
    
    // limits vertical rotation
    chart.adapter.add("deltaLatitude", function(delatLatitude){
        return am4core.math.fitToRange(delatLatitude, -90, 90);
    })
    
    // Create map polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
    
    // Make map load polygon (like country names) data from GeoJSON
    polygonSeries.useGeodata = true;
    
    // Configure series
    var polygonTemplate = polygonSeries.mapPolygons.template;
    polygonTemplate.tooltipText = "{name}";
    polygonTemplate.fill = am4core.color("#47c78a");
    polygonTemplate.stroke = am4core.color("#454a58");
    polygonTemplate.strokeWidth = 0.5;
    
    var graticuleSeries = chart.series.push(new am4maps.GraticuleSeries());
    graticuleSeries.mapLines.template.line.stroke = am4core.color("#ffffff");
    graticuleSeries.mapLines.template.line.strokeOpacity = 0.08;
    graticuleSeries.fitExtent = false;
    
    
    chart.backgroundSeries.mapPolygons.template.polygon.fillOpacity = 0.1;
    chart.backgroundSeries.mapPolygons.template.polygon.fill = am4core.color("#ffffff");
    
    // Create hover state and set alternative fill color
    var hs = polygonTemplate.states.create("hover");
    hs.properties.fill = chart.colors.getIndex(0).brighten(-0.5);
    
    chart.seriesContainer.events.on("down", function(){
    if(animation){
      animation.stop();
    }
    })
    
    }); // end am4core.ready()


    //about//
    const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});



