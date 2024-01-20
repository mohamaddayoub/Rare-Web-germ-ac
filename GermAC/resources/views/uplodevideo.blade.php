<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Uplode Video</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dash/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dash/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/nav.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
                      @if (Auth::user()->work=="Admin" || Auth::user()->work=="Doctor")
                      <div>
                          <a href="{{ route('streaming') }}"><i class="bi bi-file-slides"></i> </a>
                      </div>
                    @endif
                    @endif
                  </div>
                  </div>

                      @if (Auth::user()!=null)
                                      @if (Auth::user()->work=="Admin")
                                      <div class="register">
                                      <a href="{{ url('/admin/login') }}"> <input type="button" value=" Dashboard"></a>
                                      </div>
                                      {{-- <div class="register">
                                        <a href="{{ route('streaming') }}"><input type="button" value="Start Streaming"></a>
                                    </div> --}}
                                      @endif
                                      @if(Auth::user()->work!="Admin")
                                      <div class="register">
                                      <a href="{{ route('dash.homePage') }}"> <input type="button" value=" Your Profile"></a>
                                      </div>
                                  @endif
                      @endif
                      @if (Auth::user()==null)
                      <div class="register">
                      <a href="{{ route('register') }}"> <input type="button" value="Register Now"></a>
                  </div>
              @endif

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
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Video upload</h1>
                            </div>
                            <form action="{{ route('uploadVideo')}}" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                        <h4>Your name </h4>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName",
                                         name ="title" , placeholder="Title">
                                    </div>
                                        <h4>Course Id </h4>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name ="course_id" , value=""   placeholder="description">
                                    <h4>Your Video </h4>
                                    <input type="file" class="form-control form-control-user"
                                    name ="video" ,   id="exampleInputPassword" placeholder="image">
                                </div>

                                          <br>
                                          <br>
                                        <div ><button  class="btn btn-facebook btn-user btn-block" type="submit">Uplode Video </button></div>
                                {{-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dash/vendor/jquery/jquery.min.js')}}" ></script>
    <script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dash/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dash/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
















