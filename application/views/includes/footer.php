<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<footer id="footer" class="footer">

  <div class="container text-center mt-4">
    <p>
      <a href="contact" class="text-white">
        Data Protection | Imprint</a>
    </p>

    <div class="credits">
      <p class="my-2">
        <a href="https://www.linkedin.com/company/ieup/?viewAsMember=true" target="_blank" class="text-white">
          <i class="bi bi-linkedin"></i> LinkedIn
        </a>
      </p>
      <p class="mb-0">

        Designed by <a href="https://www.ia-meetings.com/" target="_blank" class="text-white">IA-meetings</a>
      </p>
    </div>
  </div>

</footer>






<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>



<script>
  $(document).ready(function() {
    var bubbleList = $('.bubble-container');
    const bubbleCount = bubbleList.length;
    const degStep = 180 / (bubbleCount - 1);

    $('.bubble-container').each((index) => {
      const deg = index * degStep;
      const invertDeg = deg * -1;

      $(bubbleList[index]).css('transform', `rotate(${deg}deg)`);
      $(bubbleList[index]).css('opacity', `1`);
      $(bubbleList[index]).find('.bubble').css('transform', `rotate(${invertDeg}deg)`);
    })
  })
</script>


    <script>
        $(".nav-link").on("click", function() {
            var transformLeft = $(this).attr("data-trasform");
            $(".nav-tab-slider .slider").css({
                transform: "translateX(" + transformLeft + "%)",
            });
        });

        $("#pills-tab .nav-link").on("click", function() {
            //   console.log($(this).attr("data-trasform"));
            var transformLeft = $(this).attr("data-trasform");
            $(".nav-tab-slider .slider").css({
                transform: "translateX(" + transformLeft + "%)",
            });
        });
    </script>