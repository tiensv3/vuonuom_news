<?php
include './Template/Header.php';
include './Template/Navbar.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="m-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d826.2120575411834!2d106.34706382438915!3d9.921543773345828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a01961974caf2d%3A0xebdb3d68c84af361!2zVsaw4budbiDGsMahbSBEb2FuaCBuZ2hp4buHcCB04buJbmggVHLDoCBWaW5o!5e0!3m2!1svi!2s!4v1711331498429!5m2!1svi!2s"
                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="widget text-black">
                    <h3 class="mt-3 mb-3 text-uppercase text-success" style="font-weight: 600;">Thông tin:</h3>
                    <ul class="list-unstyled social">
                        <li class="mb-3"><a class="text-black" style="font-size: 1.2rem;" href="#"><span
                                    style="box-shadow: 0 0 5px rgba(0,0,0,0.5); padding: 8px 14px; border-radius:50%"
                                    class="icon-mobile"></span> 02943 855 246 (306) </a></li>
                        <li class="mb-3"><a class="text-black" style="font-size: 1.2rem;" href="#"><span
                                    style="box-shadow: 0 0 5px rgba(0,0,0,0.5); padding: 8px 9px; border-radius:50%"
                                    class="bi bi-envelope "></span> khoinghieptravinh@gmail.com</a></li>
                        <li class="mb-3"><a class="text-black" style="font-size: 1.2rem;" href="#"><span
                                    style="box-shadow: 0 0 5px rgba(0,0,0,0.5); padding: 8px 9px; border-radius:50%"
                                    class="icon-map "></span>
                                Vườn ươm Doanh nghiệp tỉnh Trà Vinh. Hội trường D5, Trường Đại học Trà Vinh, Số 126,
                                Đường Nguyễn Thiện Thành, Phường 5, Tp, Trà Vinh, Tỉnh Trà Vinh, Vietnam</a></li>

                        <li class="mb-3"><a class="text-black" style="font-size: 1.2rem;"
                                href="https://www.facebook.com/vuonuomdoanhnghieptinhtravinh"><span
                                    style="box-shadow: 0 0 5px rgba(0,0,0,0.5); padding: 8px 9px; border-radius:50%"
                                    class="icon-facebook"></span> Vườn ươm doanh nghiệp tỉnh Trà Vinh</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div>
        </div>
        <div class="col-md-7">
            <form action="./contact.php" method="post" class="mt-5">
                <h3 class="text-uppercase text-center m-3  text-success" style="font-weight: 600;">Thông tin liên hệ
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="text-black mb-3" style="font-weight: 600; font-size:1.2rem">Họ và
                                tên:</label>
                            <input type="text" name="fullname" id="" class="form-control"
                                placeholder="Ví dụ: Nguyễn Văn A" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="text-black mb-3" style="font-weight: 600; font-size:1.2rem">Số điện
                                thoại:</label>
                            <input type="text" name="phone" id="" class="form-control" placeholder="Ví dụ: 091234567"
                                required>
                        </div>
                    </div>
                </div>


                <div class="mb-3 mt-3">
                    <label for="" class="text-black mb-3" style="font-weight: 600; font-size:1.2rem">Email:</label>
                    <input type="text" name="email" id="" class="form-control" placeholder="Ví dụ: Example@gmail.com"
                        required>
                </div>

                <div class="mb-3 mt-3">
                    <label for="" class="text-black mb-3" style="font-weight: 600; font-size:1.2rem">Tiêu đề:</label>
                    <input type="text" name="subject" id="" class="form-control" placeholder="...." required>
                </div>

                <div class="mb-3 mt-3">
                    <label for="" class="text-black mb-3" style="font-weight: 600; font-size:1.2rem">Tin nhắn:</label>
                    <textarea name="message" id="messageContact" cols="30" rows="10" required></textarea>
                </div>

                <div class="mb-4">
                    <input type="submit" value="Gửi" name="sendContact" class="btn btn-success"
                        style="font-weight: 600; font-size: 1rem; width: 200px;float:right;">
                    <div class="clear"></div>
                </div>


            </form>
        </div>
    </div>
</div>

<?php
/* -------------------------------------------------------------------------- */
/*                               handle contact                               */
if (isset($_POST['sendContact'])) {
	include './connect.php';

	// Add contact
	$sql_insert_contact = "INSERT INTO contacts (name, phone, email, title, message) VALUES (?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql_insert_contact);
	$stmt->bind_param("sssss", $name, $phone, $email, $title, $message);


	$name = $_POST['fullname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$title = $_POST['subject'];
	$message = $_POST['message'];

	$result_insert_contact = $stmt->execute();

	if ($result_insert_contact == TRUE) {
		echo '<script src="./admin/assets/js/sweetalert.min.js"></script>';
		echo '<script>
				document.addEventListener("DOMContentLoaded", function() {
						swal({
								title: "Gửi thành công!",
								text: "Chúng tôi sẽ trả lời bạn sớm nhất!",
								icon: "success",
								button: "Đồng ý"
						}).then(() => {
								window.location.href = "./contact.php";
						});
				});
		</script>';
		exit();
	}
}
/* -------------------------------------------------------------------------- */
?>


<?php
include './Template/Footer.php';
?>