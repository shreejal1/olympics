<?php
require('header.php');
// echo $_SESSION['id'];
?>
<h3 class="home-heading">Home</h3>

<div class="slideshow">
  <img src="./images/image1.jpg" alt="Image 1" class="mySlides">
  <img src="./images/image2.jpg" alt="Image 2" class="mySlides">
  <img src="./images/image3.jpg" alt="Image 3" class="mySlides">
</div>

<script>
    var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<?php
require('footer.php');
?>