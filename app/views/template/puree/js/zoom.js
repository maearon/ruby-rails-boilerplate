function imageZoom(imgID, resultID) {
    var img, lens, result, cx, cy;
    img = document.getElementById(imgID);
    result = document.getElementById(resultID);
    /*tạo lens:*/
    lens = document.createElement("DIV");
    lens.setAttribute("class", "img-zoom-lens");
    /*chèn lens:*/
    img.parentElement.insertBefore(lens, img);
    /*tính tỷ lệ giữa result DIV và lens:*/
    cx = result.offsetWidth / lens.offsetWidth;
    cy = result.offsetHeight / lens.offsetHeight;
    /*đặt thuộc tính nền cho result DIV:*/
    result.style.backgroundImage = "url('" + img.src + "')";
    result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
    /*thực thi chức năng khi ai đó di chuyển con trỏ qua image, hoặc the lens:*/
    lens.addEventListener("mousemove", moveLens);
    img.addEventListener("mousemove", moveLens);
    /*và cũng cho màn hình cảm ứng:*/
    lens.addEventListener("touchmove", moveLens);
    img.addEventListener("touchmove", moveLens);
    function moveLens(e) {
      var pos, x, y;
      /*ngăn chặn bất kỳ hành động nào khác có thể xảy ra khi di chuyển qua image:*/
      e.preventDefault();
      /*lấy vị trí x và y của con trỏ:*/
      pos = getCursorPos(e);
      /*tính toán vị trí của lens:*/
      x = pos.x - (lens.offsetWidth / 2);
      y = pos.y - (lens.offsetHeight / 2);
      /*ngăn không cho lens được đặt bên ngoài image:*/
      if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
      if (x < 0) {x = 0;}
      if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
      if (y < 0) {y = 0;}
      /*đặt vị trí của lens:*/
      lens.style.left = x + "px";
      lens.style.top = y + "px";
      /*hiển thị những gì lens "nhìn thấy":*/
      result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    }
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /*lấy vị trí x và y của image:*/
      a = img.getBoundingClientRect();
      /*tính toán tọa độ x và y của con trỏ, liên quan đến image:*/
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /*xem xét việc cuộn trang bất kỳ:*/
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
  }