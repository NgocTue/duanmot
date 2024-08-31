<!-- ***** Footer Start ***** -->
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#"> Ngõ 72 phố đình quán bắc từ liêm Hà Nội</a></li>
                            <li><a href="#">hieundph34772@fpt.edu.vn</a></li>
                            <li><a href="#">0967150645</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Mua sắm &amp; danh mục</h4>
                    <ul>
                        <li><a href="#"> Áo sweat</a></li>
                        <li><a href="#">Áo phông </a></li>
                        <li><a href="#">Áo len</a></li>
                        <li><a href="#">Áo cardigan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Liên kết</h4>
                    <ul>
                        <li><a href="#">Trang chủ </a></li>
                        <li><a href="#">về chúng tôi</a></li>
                        <li><a href="#">Trợ giúp</a></li>
                        <li><a href="#">liên hệ với chúng tôi</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Trợ giúp &amp; thông tin</h4>
                    <ul>
                        <li><a href="#">Trợ giúp</a></li>
                        <li><a href="#">câu hỏi thường gặp</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © tao tự code
                        
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>