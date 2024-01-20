<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="copyright" content="">
    <!-- Favicons -->
    <link href="{{ asset('img/logo.png')}}" rel="icon">
    <link href="{{ asset('img/logo.png')}}" rel="apple-touch-icon">
    @include('flash-message')


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">
    <!-- Css File -->
    <link rel="stylesheet" href="css/all-courses.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&family=Oswald&family=Roboto:ital@1&family=Source+Serif+Pro:ital@1&family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Section</title>
    <link rel="stylesheet" href="css/nav.css">
    <!-- <script src="js/menu.js"></script> -->

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <main>
        <div class="header">
    <div class="logo">
                <img src="{{ asset('img/logo.png')}}" alt="logo">
    </div>
    <div class="title">
        <h1> GermAc  </h1>
         
    </div>
    <div class="social-media">
        <div class="social-media-flex">
        <div>
            <i class="fa-brands fa-facebook"></i>
        </div>
        <div>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <div>
            <i class="fa-brands fa-linkedin"></i>
        </div>
        <div>
            <i class="fa-brands fa-youtube"></i>
        </div>
        <div>
            <i class="fa-brands fa-instagram"></i>
        </div>
        @if (Auth::user()!=null)
        @if (Auth::user()->role_id==1 || Auth::user()->role_id==3)
        <div>
            <a href="{{ route('streaming') }}"><i class="bi bi-file-slides"></i> </a>
        </div>
      @endif
      @endif
    </div>
    </div>

        @if (Auth::user()!=null)
                        @if (Auth::user()->role_id==1)
                        <div class="register">
                        <a href="{{ url('/admin/login') }}"> <input type="button" value=" Dashboard"></a>
                        </div>
                        {{-- <div class="register">
                          <a href="{{ route('streaming') }}"><input type="button" value="Start Streaming"></a>
                      </div> --}}
                        @endif
                        @if(Auth::user()->role_id!==1)
                        <div class="register">
                        <a href="{{ route('dash.homePage') }}"> <input type="button" value=" Your Profile"></a>
                        </div>
                    @endif
        @endif
        @if (Auth::user()==null)
        <div class="register">
        <a href="{{ route('register') }}"> <input type="button" value="Register Now"></a>
        {{-- <a href="{{ route('videos.uploadedVideo') }}"> <input type="button" value="uploadVideo"></a> --}}
    </div>
@endif
<div class="language">
  <div class="arabic" onclick="changeLanguage('ar')"></div>
  <div class="english" onclick="changeLanguage('en')"></div>
  <div class="german" onclick="changeLanguage('de')"></div>
</div>


</div>
<div class="nav">
    <div class="nav-container">
        <div class="hum" id="hum">
            <i class="fa-solid fa-bars fa-2x" style="color: #ffffff;"></i>
        </div>
    <div class="main-menu-container" id="main-menu-container">
      <ul class="main-menu">
        <li class="home"> <a href="{{route('home')}}">{{ __('translate.Home Page') }}  </a> </li>
        <li> <a href="{{route('contact.index')}}"> {{ __('translate.Contact us') }} </a></li>
        <li> <a href="{{route('about')}}"> {{ __('translate.About Us') }} </a> </li>
        <li class="germ" id="g"> <a href="#">{{ __('translate.GermAc Services') }}  </a>
            <div class="sub-menu-container" id="a">
                <ul class="sub-menu" id="b">
                <li> <a href="{{route('onlineCosulution')}}">{{ __('translate.Online Cosulutions') }}  </a> </li>
                    <li class="rela" id="q"> <a href="#"> {{ __('translate.Education') }}</a>
                        <div class="sub2-menu-container" id="w">
                            <ul class=" sub2-menu" id="e">
                                <li> <a href="{{route('section.index')}}"> {{ __('translate.Sections') }} </a> </li>
                                <li> <a href="{{route('course.index')}}"> {{ __('translate.All Courses') }} </a> </li>
                                <li> <a href="{{route('course.index')}}">{{ __('translate.New Courses') }} </a> </li>
                            </ul>
                        </div>
                    </li>
        <li> <a href="{{route('medicalTourism')}}"> {{ __('translate.Medical Tourism') }} </a> </li>

                    <li> <a href="{{route('developingandSupporting')}}">{{ __('translate.Developing medical and educational facilities') }}  </a> </li>

                </ul>
            </div> </li>
        <li> <a href="{{route('course.index')}}">{{ __('translate.Artificial Intelligence Department') }}  </a> </li>
        <li> <a href="{{route('humanSide')}}">{{ __('translate.Human Side') }}  </a> </li>


    </ul>
</div>
</div>
</div>
    <!-- <div class="nav">
        <div class="logo">
            <i class="fa-sharp fa-regular fa-circle fa-2xl"></i>
        </div>
        <div class="logo-menu">
            <i class="fa-solid fa-bars fa-2xl"></i>
            <ul>
                <li> <a href="#services"> Services </a> </li>
                <li> <a href="#portfolio"> Portfolio </a> </li>
                <li> <a href="#about-us"> About Us </a> </li>
                <li> <a href="#contact-us"> Contact </a> </li>
             </ul>
        </div>
    </div> -->
    <!-- <div class="land">
        <div class="intro">
            <h1> Hello There </h1>
            <p> We Are Leon - Super Creative & Minimal Agency Web Temaplate </p>
        </div>
    </div> -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
      
      <div class="text-center">
        <h3>{{ GoogleTranslate::trans('New Courses ', app()->getLocale()) }}</h3>
        <p>{{ GoogleTranslate::trans('we have alot of courses in our website .', app()->getLocale()) }}</p>

       {{-- <p>{{ GoogleTranslate::trans('GermAc, the Germac Academy, is considered the first registered academic consultancy and training center in the Middle East, located in Dubai. It offers unique services directly from Germany through skilled Germac doctors and academics.', app()->getLocale()) }}</p> --}}
      
      </div>
      </div>
      </section><!-- End Cta Section -->
  
   
      @if ($courses != null)
      <div class="top-courses">
     
    @foreach ($courses as $course)
    <div class="feat">
      <form action="{{route('course.show') }}" method="post" role="form" class="course-form">
        @csrf 
  
         {{-- <div class="disc"><button type="submit" style="border: none; background: none; padding: 0;"><h5 style="color: goldenrod ">{{$course->name}}</h5></button> --}}
       <div class="disc"><h5 style="color: goldenrod "><button type="submit" style="border: none; background: none; padding: 0;">{{ GoogleTranslate::trans($course->name, app()->getLocale()) }}</button></h5>
          
     </div>
      <input type="hidden" name="id" value="{{$course->id}}">
    </form>               
  </div>
  @endforeach
  </div>
  @endif
  

                                 
 









    <footer id="footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-6">
                <div class="footer-info">
                  <h3>GermAC</h3>
                  <p>Dubai World Trade Center-Sheikh Rashid 
                    Tower </p>
                    Floor number  4 </p> <br>
                    <strong>Phone:</strong> <br> 
                    <br>
                    UAE:00971559610205
                    <br>
                    UAE:00971026660826
                    
                    <br>
                    KSA : 00966530604870<br>
                      Germany :004915901386561
                      <br>
                      
                       <br> 
                    <strong>Email:
                      <br>
                      <br> </strong> info@germ-ac.com<br>
                  </p>
                <div class="social-links mt-3">
                <a href="#" class="fa-brands fa-facebook"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="#" class="fa-brands fa-linkedin"></a>
                <a href="#" class="fa-brands fa-youtube"></a>
                <a href="#" class="fa-brands fa-instagram"></a>
              </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('about')}}">About us</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('developingandSupporting')}}">Developing medical and educational facilities </a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('medicalTourism')}}">Medical Tourism </a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('contact.index')}}">Contact</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('section.index')}}">Section</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('course.index')}}"> All Courses </a> </li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('course.index')}}"> New Courses</a> </li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('onlineCosulution')}}"> Online Cosulutions </a> </li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('humanSide')}}"> Human Side </a> </li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-6 footer-newsletter">
                <h4>GermAC</h4>
                 
                        <img src="{{ asset('img/logo.png')}}" alt="logo">

              </div>

            </div>
          </div>
        </div>

        <div class="container">
          <div class="copyright">
          &copy; POWERED BY <strong><span><a href="https://rare-web.com/" ><i> Rare Web <i></a></span></strong>. All Rights Reserved Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
          </div>
        </div>
      </footer><!-- End Footer -->
    <script src="js/menu.js"></script>
    <script src="js/app.js"></script>
    <!-- Vendor JS Files -->
  <script src="assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets2/vendor/aos/aos.js"></script>
  <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets2/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>
<script src="js/menu.js"></script>
<script>
  function changeLanguage(language) {
    var url = "{{ route('changeLang') }}";
    window.location.href = url + "?lang=" + language;
  }
</script>

<script>
  // تحديد القيمة المحفوظة في السيشن للغة الحالية
  var currentLocale = "{{ session()->get('locale') }}";

  // تحديد العناصر المتطابقة مع اللغة الحالية وتعيينها كمحددة
  var elements = document.querySelectorAll('.language div');
  elements.forEach(function(element) {
    if (element.classList.contains(currentLocale)) {
      element.classList.add('selected');
    }
  });
</script>

    </body>
    </html>
