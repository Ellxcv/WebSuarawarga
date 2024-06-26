<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Suarawarga</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
  </head>
  <body>
    <section class="header">
      <nav>
        <a href="index.html"><img src="image/government64px.png" alt="" /></a>
        <div class="nav-links" id="navLinks">
          <i class="bx bx-x" onclick="hideMenu()"></i>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about-us">About Us</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div>
        <i class="bx bx-menu" onclick="showMenu()"></i>
      </nav>
      <div class="text-box">
        <h1>Selamat Datang di Suarawarga</h1>
        <p>
          Kami menyediakan platform bagi warga untuk mengekspresikan pendapat
          mereka <br />dan kekhawatiran mengenai permasalahan pemerintah daerah.
        </p>
        <a href="" class="hero-btn">Untuk Informasi Lebih Lanjut</a>
      </div>
    </section>

    <!-- Slider -->
    <section class="carousel">
      <div class="slider">
        <div class="list">
          <div class="item">
            <img src="./image/Untitled-4.jpg" alt="" />

            <div class="content">
              <div class="title">Informasi Kebijakan Publik</div>
              <div class="type">Rangkuman</div>
              <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Deleniti temporibus quis eum consequuntur voluptate quae
                doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Sequi, aut.
              </div>
              <div class="button">
                <button>SEE MORE</button>
              </div>
            </div>
          </div>

          <div class="item">
            <img src="./image/Untitled-2.jpg" alt="" />

            <div class="content">
              <div class="title">Informasi Kebijakan Publik</div>
              <div class="type">Analisis Dampak</div>
              <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Deleniti temporibus quis eum consequuntur voluptate quae
                doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Sequi, aut.
              </div>
              <div class="button">
                <button>SEE MORE</button>
              </div>
            </div>
          </div>

          <div class="item">
            <img src="./image/Untitled-3.jpg" alt="" />

            <div class="content">
              <div class="title">Informasi Kebijakan Publik</div>
              <div class="type">Pembanding</div>
              <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Deleniti temporibus quis eum consequuntur voluptate quae
                doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Sequi, aut.
              </div>
              <div class="button">
                <button>SEE MORE</button>
              </div>
            </div>
          </div>

          <div class="item">
            <img src="./image/Untitled-5.jpg" alt="" />

            <div class="content">
              <div class="title">Informasi Kebijakan Publik</div>
              <div class="type">Pertanyaan</div>
              <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Deleniti temporibus quis eum consequuntur voluptate quae
                doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Sequi, aut.
              </div>
              <div class="button">
                <button>SEE MORE</button>
              </div>
            </div>
          </div>
        </div>

        <div class="thumbnail">
          <div class="item">
            <img src="./image/Untitled-4.jpg" alt="" />
          </div>
          <div class="item">
            <img src="./image/Untitled-2.jpg" alt="" />
          </div>
          <div class="item">
            <img src="./image/Untitled-3.jpg" alt="" />
          </div>
          <div class="item">
            <img src="./image/Untitled-5.jpg" alt="" />
          </div>
        </div>

        <div class="nextPrevArrows">
          <button class="prev"><</button>
          <button class="next">></button>
        </div>
      </div>
    </section>
    <!-- Our Services -->

    <section class="services" id="services">
      <h1>Our Services</h1>
      <p>
        Some of the services we offer include: Online petition submission
        Government issue tracking Community engagement
      </p>
      <div class="row">
        <div class="course-col">
          <h3>test1</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non
            laudantium libero nemo ducimus tempore? Nulla cumque facere quia
            iure ipsum quibusdam aut excepturi, id illum modi, quas ipsam saepe
            consectetur.
          </p>
        </div>
        <div class="course-col">
          <h3>test2</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non
            laudantium libero nemo ducimus tempore? Nulla cumque facere quia
            iure ipsum quibusdam aut excepturi, id illum modi, quas ipsam saepe
            consectetur.
          </p>
        </div>
        <div class="course-col">
          <h3>test3</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non
            laudantium libero nemo ducimus tempore? Nulla cumque facere quia
            iure ipsum quibusdam aut excepturi, id illum modi, quas ipsam saepe
            consectetur.
          </p>
        </div>
      </div>
    </section>

    <!-- About Us + Contact -->

    <section class="about-us" id="about-us">
      <h1>About Us</h1>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi eligendi
        tempora deserunt. Vel tempora expedita maiores laudantium accusamus
        iusto, eum minus sunt! Aut magnam nemo accusamus earum impedit delectus
        quisquam?
      </p>
    </section>

    <section class="new-section">
      <button class="show-modal">CONTACT US</button>
      <span class="overlay"></span>

      <div class="modal-box">
        <i class="fa-regular fa-circle-check"></i>
        <h2>Completed</h2>
        <h3>Lagi Dikerjakan bolo!</h3>

        <div class="buttons">
          <button class="close-btn">Ok, Close</button>
          <button>Wkwkw</button>
        </div>
      </div>
    </section>

    <!-- Footer -->

    <section class="footer">
      <h4>Copyright © 2023 SuaraWarga</h4>
      <div class="icons">
        <i class="bx bxl-facebook"></i>
        <i class="bx bxl-instagram"></i>
        <i class="bx bxl-linkedin"></i>
      </div>
    </section>

    <!-- Javascript -->
    <script src="javascript/script.js"></script>
  </body>
</html>
