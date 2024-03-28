<footer class="site-footer bg-success" style="box-shadow: 0 0 3px rgba(0,0,0,0.8)">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-uppercase text-center mb-2  " style="font-weight: 800; letter-spacing: 2px; text-shadow: 2px 2px 5px rgba(0,0,0,0.5); color: white;">Vườn
                    ươm doanh nghiệp tỉnh trà vinh</h1>
                <h3 class="text-uppercase text-center" style="font-weight: 600; letter-spacing: 2px; color: yellow; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">TRA
                    VINH BUSINESS INCUBATOR</h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="">
                            <p class="text-justify" style="font-size: 1.1rem; line-height: 1.8;"><span class="" style="font-weight: 700; font-size: 1.2rem; letter-spacing: 1px;">Địa chỉ:</span> Tòa nhà D5, Trường Đại học Trà Vinh
                                <br> <span style="font-size: 1.0rem;">(Số 126, Nguyễn Thiện Thành, K4, P5, Tp. Trà Vinh)</span>.
                            </p>
                        </div>
                        <div class="">
                            <p class="text-justify" style="font-size: 1.1rem; line-height: 1.8;"><span class="" style="font-weight: 700; font-size: 1.2rem; letter-spacing: 1px;">Giờ làm việc:</span> 7:00 - 17:00, thứ 2 đến thứ 6. </p>
                        </div>
                        <div class="">
                            <p class="text-justify" style="font-size: 1.1rem; line-height: 1.8;"><span class="" style="font-weight: 700; font-size: 1.2rem; letter-spacing: 1px;">Số điện thoại:</span> 02943 855 246 (306)</p>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <h6 class="text-center text-uppercase" style="font-weight: 700; font-size: 1.1rem;">Theo dõi chúng tôi</h6>
                        <ul class="d-flex" style="list-style: none;">
                            <li class=" mb-3 mt-3" style="margin-right:5px;">
                                <a class="text-black" style="font-size: 1rem;" href="https://www.facebook.com/vuonuomdoanhnghieptinhtravinh?locale=vi_VN" target="_blank"><span class=" bi bi-facebook bg-white text-black  " style="font-size: 1.2rem;  margin-right:5px; padding: 8px 10px; border-radius: 50%;"></span></a>
                            </li>
                            <li class="mb-3 mt-3" style="margin-right:5px;">
                                <a class="text-black" style="font-size: 1.1rem;" href="mailto:khoinghieptravinh@gmail.com"> <span class=" bi bi-envelope bg-white text-black  " style="font-size: 1.2rem;  margin-right:5px; padding: 8px 10px; border-radius: 50%;"></span></a>
                            </li>
                            <!-- <li class="mb-3 mt-3" style="margin-right:5px;">
                                <a class="text-black" style="font-size: 1.1rem;" href=""> <span class=" bi bi-geo-alt bg-white text-black rounded" style="font-size: 1.2rem;  margin-right:5px; padding: 8px 10px;"></span></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</footer>



<script src="./asset/js/bootstrap.bundle.min.js"></script>
<script src="./asset/js/tiny-slider.js"></script>

<script src="./asset/js/flatpickr.min.js"></script>


<script src="./asset/js/aos.js"></script>
<script src="./asset/js/glightbox.min.js"></script>
<script src="./asset/js/navbar.js"></script>
<script src="./asset/js/counter.js"></script>
<script src="./asset/js/custom.js"></script>

<script>
    CKEDITOR.replace('messageContact');
</script>
</body>

</html>



<script src="./asset/js/bootstrap.bundle.min.js"></script>
<script src="./asset/js/tiny-slider.js"></script>

<script src="./asset/js/flatpickr.min.js"></script>


<script src="./asset/js/aos.js"></script>
<script src="./asset/js/glightbox.min.js"></script>
<script src="./asset/js/navbar.js"></script>
<script src="./asset/js/counter.js"></script>
<script src="./asset/js/custom.js"></script>


<script>
    CKEDITOR.replace('messageContact');
</script>

<script>
    const partnerRow = document.querySelector('.partner-row');
    let counter = 0;
    const slideWidth = partnerRow.clientWidth;

    function nextSlide() {
        if (counter >= partnerRow.children.length - 1) return;
        counter++;
        partnerRow.style.transform = `translateX(-${counter * slideWidth}px)`;
    }

    function prevSlide() {
        if (counter <= 0) return;
        counter--;
        partnerRow.style.transform = `translateX(-${counter * slideWidth}px)`;
    }
</script>

<script>
    $(document).ready(function() {
        $('.partner-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>


</body>

</html>