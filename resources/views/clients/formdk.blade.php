
@include('clients.blocks.header')
<style>
  /* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');




/* Container Layout */
.row1 {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
}

/* Form Container */
.form-container {
  flex: 1;
  background: #ffffff;
  padding: 35px 30px;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  animation: fadeInUp 0.8s ease;
  transition: all 0.3s ease;
}

.form-container:hover {
  transform: translateY(-5px);
}

.form-container img {
  max-width: 180px;
  display: block;
  margin: 0 auto 20px;
}

.form-container h2 {
  text-align: center;
  color: #0077b6;
  font-size: 28px;
  margin-bottom: 25px;
}

/* Form Group */
.form-group {
  margin-bottom: 20px;
}

.form-group label {
  font-weight: 600;
  margin-bottom: 8px;
  display: block;
  color: #1e3a5f;
}

.form-input {
  display: flex;
  align-items: center;
  background-color: #f1f3f5;
  border-radius: 12px;
  padding: 12px 15px;
  border: 2px solid transparent;
  transition: border-color 0.3s ease;
}

.form-input i {
  margin-right: 12px;
  color: #6c757d;
}

.form-input input {
  border: none;
  outline: none;
  background: transparent;
  flex: 1;
  font-size: 16px;
  color: #2c3e50;
}

.form-input:focus-within {
  border-color: #00b4d8;
}

/* Submit Button */
.Dkngay {
  width: 100%;
  padding: 14px;
  background: linear-gradient(135deg, #00b4d8, #0077b6);
  color: #fff;
  border: none;
  border-radius: 12px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s;
} */

button[type="submit"]:hover {
  transform: scale(1.03);
  background: linear-gradient(135deg, #0077b6, #023e8a);
}

/* Course Info */
.phandoi {
  flex: 1;
  background: #ffffff;
  padding: 35px 30px;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  animation: fadeInUp 1s ease;
}

.phandoi h3 {
  font-size: 26px;
  color: #023e8a;
  margin-bottom: 20px;
  text-align: center;
}

.phandoi p,
.phandoi strong {
  color: #1e3a5f;
  font-weight: 600;
  margin-bottom: 12px;
}

.phandoi ol {
  padding-left: 20px;
  margin-bottom: 15px;
}

.phandoi li {
  margin-bottom: 10px;
  line-height: 1.6;
  color: #374151;
}

/* Responsive Design */
@media (max-width: 768px) {
  .row1 {
    flex-direction: column;
  }

  .form-container,
  .phandoi {
    width: 100%;
  }
}

/* Animations */
@keyframes fadeInUp {
  from {
    transform: translateY(30px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}



/* Phần mô tả khóa học */
.phandoi {
  flex: 1 1 400px;
  background: #ffffff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
  max-width: 600px;
}

.phandoi h3 {
  color: #e53935;
  margin-bottom: 20px;
}

.phandoi strong {
  color: #1a237e;
  display: block;
  margin-top: 20px;
  margin-bottom: 10px;
}

.phandoi ol {
  padding-left: 20px;
  margin-top: 0;
}

.phandoi li {
  margin-bottom: 10px;
  line-height: 1.6;
}

/* Responsive mobile */
@media (max-width: 768px) {
  .row1 {
    flex-direction: column;
    padding: 20px;
  }

  .form-container,
  .phandoi {
    max-width: 100%;
  }
}

/* ======= Thông tin khóa học (section) ======= */
/* ==== CÀI ĐẶT CHUNG ==== */


h2 {
  color: #1d4ed8;
  font-size: 24px;
  margin-bottom: 16px;
  border-left: 4px solid #3b82f6;
  padding-left: 12px;
}


.phandoi h3{
  text-align: left;
}
.row1{
  margin-top: 8%;
}
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

body {
  margin: 0;
  background: linear-gradient(135deg, #e8f0ff, #fefefe);
  font-family: 'Inter', sans-serif;
  color: #333;
}

.tt-khoa-hoc {
  max-width: 900px;
  margin: 60px auto;
  padding: 0 20px;
}

.tt-khoa-hoc .section1 {
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(8px);
  border-radius: 16px;
  padding: 30px 35px;
  margin-bottom: 40px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  overflow: hidden;
}

.tt-khoa-hoc .section1:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.section-title1 {
  font-size: 26px;
  font-weight: 700;
  color: #1f3c88;
  margin-bottom: 20px;
  position: relative;
  padding-left: 40px;
}

.section-title1::before {
  content: "🎓";
  position: absolute;
  left: 0;
  top: 0;
  font-size: 26px;
}

.section-content p,
.tt-khoa-hoc p {
  font-size: 16.5px;
  margin-bottom: 14px;
}

.tt-khoa-hoc strong {
  color: #1d3557;
  font-weight: 600;
}

.tt-khoa-hoc ul {
  list-style: none;
  padding-left: 0;
  margin-top: 14px;
}

.tt-khoa-hoc ul li {
  padding-left: 24px;
  margin-bottom: 10px;
  position: relative;
}

.tt-khoa-hoc ul li::before {
  content: "✔";
  position: absolute;
  left: 0;
  color: #2ecc71;
  font-weight: bold;
}

@media (max-width: 768px) {
  .tt-khoa-hoc {
    padding: 0 15px;
  }

  .section1 {
    padding: 25px;
  }

  .section-title1 {
    font-size: 22px;
    padding-left: 34px;
  }

 
}


</style>
<div class="row1">

    <div class="form-container">
      <img src="assets/images/logos/logo-two.png" alt="Banner khóa học">
      <h2>Đăng Ký Khóa Học</h2>
      <form action="/submit-form" method="post">
        <div class="form-group">
          <label for="name">Họ và tên</label>
          <div class="form-input">
            <i class="fas fa-user"></i>
            <input type="text" id="name" name="name" required placeholder="Họ và tên">
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <div class="form-input">
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" name="email" required placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="phone">Số điện thoại</label>
          <div class="form-input">
            <i class="fas fa-phone"></i>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,11}" placeholder="VD: 0987654321">
          </div>
        </div>
        <button type="submit" class="Dkngay">Đăng ký ngay</button>
      </form>
    </div>
  

  <div class="phandoi">
    <h3>Khóa học lập trình Java Spring Boot</h3>
    <p><strong>Ai nên tham gia khóa học:</strong></p>
    <ol>
      <li>Người mới bắt đầu học lập trình</li>
      <li>Người trái ngành muốn chuyển hướng sang lĩnh vực IT</li>
      <li>Các quản lý muốn hiểu và làm việc với team IT</li>
      <li>Người mong muốn làm chủ ít nhất một ngôn ngữ lập trình</li>
      <li>Sinh viên cao đẳng, đại học hoặc người đã đi làm</li>
      <li>Người muốn tự tay tạo ra các website yêu thích</li>
    </ol>
    <strong>Mục tiêu đầu ra:</strong>
    <ol>
      <li>Nắm chắc thiết kế giao diện web với HTML, CSS; xử lý mượt mà giao diện với UI/UX</li>
      <li>Nắm vững quy trình phát triển một dự án web hoàn chỉnh</li>
      <li>Tự xây dựng website cá nhân để sử dụng, phục vụ công việc hoặc đem đi phỏng vấn</li>
      <li>Hoàn thành 2 giao diện web và 2 website đầy đủ sử dụng PHP MVC và Laravel Framework</li>
      <li>Tự tin ứng tuyển vào vị trí fresher</li>
      <li>Loại bỏ hoàn toàn tư tưởng phải đi thực tập</li>
    </ol>
  </div>
</div>

<section class="tt-khoa-hoc">
  <div class="section1">
    <h2 class="section1-title">Đăng ký & Cơ hội nghề nghiệp</h2>
    <p>Các công ty đối tác tuyển dụng luôn săn đón học viên được đào tạo tại <strong>DevPro</strong>.</p>
    <p><strong>Đối tác:</strong> Misa, Samsung, FPT Software, Co-well Asia, VC-Corp, VNP, ITC, IIST, Needy, HK Media, WORKS.VN, Dore.</p>
  </div>

  <div class="section1">
    <h2 class="section1-title">Cam kết đầu ra</h2>
    <div class="section-content">
      <p><strong>Chất lượng đào tạo thực tế:</strong> học viên được trải nghiệm hoàn toàn khác biệt so với lý thuyết trong trường.</p>
      <p>DevPro luôn cập nhật công nghệ mới nhất để bắt kịp xu hướng tuyển dụng.</p>
      <p><strong>99% học viên</strong> được hỗ trợ làm việc full-time. Có nền tảng học online linh hoạt: iOS, Android, PHP, Java, C/C++.</p>
      <p>Sau khóa học, học viên sẽ bảo vệ demo với sản phẩm thật được làm trong quá trình học.</p>
    </div>
  </div>

  <div class="section1">
    <h2 class="section1-title">Lộ trình chương trình học</h2>
    <div class="section-content">
      <p><strong>Phần 1: Java Core</strong> (Java Console, không giao diện)</p>
      <ul>
        <li>Nắm kiến thức nền tảng Java</li>
        <li>Tư duy lập trình: hướng cấu trúc, hướng đối tượng</li>
        <li>Giải quyết bài toán quản lý dữ liệu</li>
      </ul>
    </div>
  </div>
</section>

<section class="about-team-area pb-70 rel z-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <h2>Đội ngũ giảng viên</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="team-item hover-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
          <img src="assets/images/team/guide1.jpg" alt="Giảng viên 1">
          <div class="content">
            <h6>John L. Simmons</h6>
            <span class="designation">Java Senior Developer</span>
            <div class="social-style-one inner-content">
              <a href="contact.html"><i class="fab fa-twitter"></i></a>
              <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
              <a href="contact.html"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="team-item hover-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
          <img src="assets/images/team/guide2.jpg" alt="Giảng viên 2">
          <div class="content">
            <h6>Andrew K. Manley</h6>
            <span class="designation">Spring Boot Expert</span>
            <div class="social-style-one inner-content">
              <a href="contact.html"><i class="fab fa-twitter"></i></a>
              <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
              <a href="contact.html"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="team-item hover-content" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
          <img src="assets/images/team/guide3.jpg" alt="Giảng viên 3">
          <div class="content">
            <h6>Drew J. Bridges</h6>
            <span class="designation">Fullstack Trainer</span>
            <div class="social-style-one inner-content">
              <a href="contact.html"><i class="fab fa-twitter"></i></a>
              <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
              <a href="contact.html"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="team-item hover-content" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
          <img src="assets/images/team/guide4.jpg" alt="Giảng viên 4">
          <div class="content">
            <h6>Byron F. Simpson</h6>
            <span class="designation">Laravel Mentor</span>
            <div class="social-style-one inner-content">
              <a href="contact.html"><i class="fab fa-twitter"></i></a>
              <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
              <a href="contact.html"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

        
          
          



@include('clients.blocks.footer')