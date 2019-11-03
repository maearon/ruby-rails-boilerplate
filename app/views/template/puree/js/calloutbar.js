  // Get the modal
  var modal = document.getElementsByClassName("ui-corner-all popup-scale-in")[0];
    var overlay = document.getElementsByClassName("ui-widget-overlay")[0];

  // Get the button that opens the modal
  var btn = document.getElementsByClassName("dialog-forgotpassword")[0];

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("ui-icon-closethick")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
    overlay.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
    overlay.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        overlay.style.display = "none";
    }
  }