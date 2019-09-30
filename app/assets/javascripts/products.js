function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  expandImg.src = imgs.src;
  document.querySelectorAll('*[id^="thumbnail_"]').forEach(function(image){
    image.setAttribute('style', "");
  });
  imgs.setAttribute("style", "border: 2px solid #000");
}
