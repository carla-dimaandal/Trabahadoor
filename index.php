<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\style.css">
    <link rel="icon" href="Images\TBDlogo.png">
    
    
    <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
    (function(){ 
    emailjs.init("f2s9I_qLYG1bWIPlD");
    })();
</script> 
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Trabahadoor</title>
</head>
<body>
    <main>
        <div class="big-wrapper">
            <header>
                <nav>
                    <ul class='nav-bar'>
                        <div class="logo">
                            <img src="Images\TBDlogo.png" alt="Logo" class="img">
                            <h3>Trabahadoor</h3>
                        </div>
                        <input type='checkbox' id='check' />
                        <span class="menu">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="login_form.php">Log in</a></li>
                            <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                            <img src="Images\moon.png" id="icon">
                        </span>
                        <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
                    </ul>
                    
                </nav>
            </header>
    <!-- showcasee area starts -->
            <div class="showcase-area" id="home" data-aos="fade-right">
                <div class="container">
                <div class="left">
                    <div class="big-title">
                        <h1>Opening Opportunities</h1>
                        <h1>For All.</h1>
                    </div>
                    <p class="text">Welcome to Trabahadoor, the door towards inclusivity! We are dedicated to empowering 
                        individuals with diverse abilities by opening doors for them to connect with a wide range of employment opportunities
                    </p>
                    <div class="cta">
                        <a href="register_form.php" class="btn">Get Started</a>
                    </div>
                </div>
                <div class="right">
                    <img src="Images\person-img.png" alt="Person" class="person">
                </div>
            </div>   
            </div>
    <!-- about section starts here -->
            <section class="about" id="about" data-aos="fade-left">
                <h1 class="heading">About us</h1>
                <div class="container">  
                        <div class="image">
                            <div class="mySlides fade">
                                <img src="Images/image1.jpg">            
                            </div>
                              <div class="mySlides fade"> 
                            <img src="Images/image2.jpg"> 
                              </div>
                              <div class="mySlides fade">
                                <img src="Images/image3.jpg">    
                              </div>    
                              <div class="mySlides fade">
                                <img src="Images/image4.jpg">    
                              </div>  
                              <div class="mySlides fade">
                                <img src="Images/image5.jpg">    
                              </div>  
                              <div class="mySlides fade">
                                <img src="Images/image6.jpg">    
                              </div>  
                              <div class="mySlides fade">
                                <img src="Images/image7.jpg">    
                              </div>                 
                              <div class="mySlides fade">
                                <img src="Images/image8.jpg">    
                              </div>          
                              <div class="mySlides fade">
                                <img src="Images/pwdao_logo.png" id="pwdaoLogo">    
                              </div>  

                        </div>
                        <div class="content">
                            <h3>Where inclusion meets opportunity</h3>
                            <p>Trabahadoor is partnered with the Persons With Disabilities Office Batangas (PDAO). PDAO  is dedicated to providing quality services and fostering an atmosphere that supports the rights and general welfare of people with disabilities across the province. Join us in building a future where everyone, regardless of ability, has the opportunity to thrive in the workplace. Start your journey towards a fulfilling career or find the talent 
                                your company needs to succeed. Together, we're creating a more inclusive workforce for all.</p>
                            <a href="https://www.facebook.com/pdao.batangas" class="btn">Learn More</a>
                        </div>
                     </div>
                    </section>
<!-- services section starts here -->
            <section class="services-container" id="services" data-aos="fade-left">
                <div class="services-header">
                    <h2 class="section-header">SERVICES</h2>
            
                </div>
                    <div class="services-grid" data-aos="fade-left" data-aos-duration="50">
                        <div class="services-card">
                            <span><i class="ri-search-eye-line"></i></span>
                            <h4>Job Seekers</h4>
                            <p>Discover a diverse range of applicants with promising skills and experience who can benefit your company
                            </p>
                
                        </div>
                        <div class="services-card" data-aos="fade-left" data-aos-delay="100">
                            <span><i class="ri-hand-heart-line"></i></span>
                            <h4>Employer Partnerships</h4>
                            <p>We collaborate with forward-thinking employers who intend to create diverse and inclusive workplaces.</p>
                           
                        </div>
                        <div class="services-card" data-aos="fade-left" data-aos-delay="150">
                            <span><i class="ri-wheelchair-line"></i></span>
                            <h4>Accessibility</h4>
                            <p>Our website is designed with accessibility in mind, ensuring a seamless experience for users of all abilities.</p>
                            
                        </div>
                        <div class="services-card" data-aos="fade-left" data-aos-delay="200">
                            <span><i class="ri-empathize-line"></i></span>
                            <h4>Community Support:</h4>
                            <p>Connect with a supportive community of individuals who share similar experiences and challenges.</p>
                           
                        </div>
                    </div>
            </section>
<!-- contact section -->
            <section class="Contact" id="contact" data-aos="fade-right">
                <div class="contact-content">
                    <h2>Contact Us</h2>
                    <p> Need assistance? Want to get in touch? We would be glad to hear more from you. For more inquiries, you can visit
                    </p>
                    </div>
                    <div class="contact-container">
                        <div class="contact-info">
                            <div class="box">
                                <div class="icon"><i class="ri-map-pin-line"></i></div>
                                    <div class="contact-text">
                                        <h3>Address</h3>
                                        <p>P. Herrera Street, <br>Batangas city<br>Batangas, Philippines</p>
                                    </div>
                            </div>
                                <div class="box">
                                    <div class="icon"><i class="ri-phone-line"></i></div>
                                        <div class="contact-text">
                                            <h3>Phone</h3>
                                            <p>09196916451</p>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="icon"><i class="ri-mail-line"></i></div>
                                            <div class="contact-text">
                                                <h3>Email</h3>
                                                <p>pdao.batangas@gmail.com</p>
                                            </div>
                                      </div>
                                   </div>
                        <div class="contact-form">
                                <form>
                                    <h2>Send a Message</h2>
                                    <div class="inputbox">
                                        <input type="text" required="required" id="name">
                                        <span>Full Name</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" required="required" id="email">
                                        <span>Email</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type=textarea required="required" id="message"></input>
                                        <span>Type your Message...</span>
                                    </div>
                                    <div class="inputbox">
                                        <button class="btn" type="submit" onclick="sendMail()">Submit</button>
                                    </div>
                                </form>
                        </div>
                </div>
            </section>
        </div>

        <!--FOOTER-->
       <footer>
        <div clas="footerContainer">
            <div class="socialIcons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footerBottom">
                <p>Copyright &copy;2023 <span class="footerName">Trabahadoor</span></p>
            </div>
        </div>
       </footer>
    </main>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
var icon = document.getElementById("icon");
icon.onclick = function(){
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme")){
        icon.src = "./Images/sun.png";
    }else{
        icon.src = "./Images/moon.png";
    }
}
function sendMail(){
    var params = {
        name: document.getElementById("name").value , 
        email: document.getElementById("email").value , 
        message: document.getElementById("message").value , 
    };
    const serviceID = "service_01xagwd";
    const templateID = "template_j0iai7r";

    emailjs.send(serviceID, templateID, params)
    .then(function (response) {
        console.log("SUCCESS!", response.status, response.text);
      },
      function (error) {
        console.log("FAILED...", error);
      }
    );
    document.getElementById("name").value= "";
    document.getElementById("email").value= "";
    document.getElementById("message").value="";
  };
   
</script>
</body>
</html>