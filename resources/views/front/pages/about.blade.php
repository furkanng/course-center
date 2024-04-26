
@extends('front.layout.app')

@section('title', 'Home Page')
@section('content')
      <!-- offcanvas area start -->
      <div class="offcanvas__area">
         <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="offcanvas__wrapper">
                      <div class="offcanvas__content">
                         <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo logo">
                               <a href="index.html">
                               <img src="{{asset("front/")}}assets/img/logo/logo.png" alt="logo">
                               </a>
                            </div>
                            <div class="offcanvas__close">
                               <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                                  <i class="fal fa-times"></i>
                               </button>
                            </div>
                         </div>
                         <div class="offcanvas__search mb-25">
                            <form action="#">
                               <input type="text" placeholder="What are you searching for?">
                               <button type="submit" ><i class="far fa-search"></i></button>
                            </form>
                         </div>
                         <div class="mobile-menu fix"></div>
                         <div class="offcanvas__text d-none d-lg-block">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore</p>
                         </div>
                         <div class="offcanvas__map d-none d-lg-block mb-15">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd"></iframe>
                         </div>
                         <div class="offcanvas__contact mt-30 mb-20">
                            <h4>Contact Info</h4>
                            <ul>
                               <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                     <i class="fal fa-map-marker-alt"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                     <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A, Mirnada City Tower, NYC</a>
                                  </div>
                               </li>
                               <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                     <i class="far fa-phone"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                     <a href="mailto:support@gmail.com">088889797697</a>
                                  </div>
                               </li>
                               <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                     <i class="fal fa-envelope"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                     <a href="tel:+012-345-6789">support@mail.com</a>
                                  </div>
                               </li>
                            </ul>
                         </div>
                         <div class="offcanvas__social">
                            <ul>
                               <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                               <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
        </div>
      </div>
      <!-- offcanvas area end -->      
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->

      <main>

         <!-- breadcrumb area start -->
         <section class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay" data-background="{{asset("front/assets/img/breadcrumb/breadcrumb-bg-1.jpg")}}">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content text-center p-relative z-index-1">
                        <h3 class="breadcrumb__title">About</h3>
                        <div class="breadcrumb__list">
                           <span><a href="index.html">Home</a></span>
                           <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
                           <span>About</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- about area start -->
         <section class="about__area pt-120 pb-120 p-relative">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-7 col-xl-7 col-lg-7">
                     <div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
                        <div class="about__shape">
                           <img class="about__shape-1 d-none d-sm-block" src="assets/img/about/about-shape-1.png" alt="">
                           <img class="about__shape-2 d-none d-sm-block" src="assets/img/about/about-shape-2.png" alt="">
                           <img class="about__shape-3" src="assets/img/about/about-shape-3.png" alt="">
                        </div>
                        <div class="about__thumb-left mr-10">
                           <div class="about__thumb-1 mb-10">
                              <img src="assets/img/about/about-1.jpg" alt="">
                           </div>
                           <div class="about__thumb-1 mb-10 text-end">
                              <img src="assets/img/about/about-3.jpg" alt="">
                           </div>
                        </div>
                        <div class="about__thumb-2 mb-10">
                           <img src="assets/img/about/about-2.jpg" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-5 col-lg-5">
                     <div class="about__content pl-70 pr-25">
                        <div class="section__title-wrapper mb-15">
                           <span class="section__title-pre">About Eduker</span>
                           <h2 class="section__title">Degrees in Various academic Didciplines</h2>
                        </div>
                        <p>Not only can university offer an environment rich in our social an cultural experiences.</p>

                        <div class="about__list mb-40">
                           <ul>
                              <li><i class="fa-solid fa-check"></i> Access to all our courses</li>
                              <li><i class="fa-solid fa-check"></i> Learn the latest skills</li>
                              <li><i class="fa-solid fa-check"></i> Upskill your organization</li>
                           </ul>
                        </div>

                        <div class="about__btn">
                           <a href="about.html" class="tp-btn tp-btn-2">Read more</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about area end -->

         <!-- course area start -->
         <section class="course__area pt-115 pb-90 grey-bg-3">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="section__title-wrapper text-center mb-60">
                        <span class="section__title-pre">Top Courses</span>
                        <h2 class="section__title section__title-44">Our Featured Courses</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing aelit, sed do eiusmod</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                     <div class="course__item white-bg transition-3 mb-30">
                        <div class="course__thumb w-img fix">
                           <a href="course-details.html">
                              <img src="assets/img/course/course-1.jpg" alt="">
                           </a>
                        </div>
                        <div class="course__content p-relative">
                           <div class="course__price">
                              <span>$74</span>
                           </div>
                           <div class="course__tag">
                              <a href="#">Digital</a>
                           </div>
                           <h3 class="course__title">
                              <a href="course-details.html">University seminar series global.</a>
                           </h3>
                           <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                           <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                              <div class="course__tutor">
                                 <a href="#"><img src="assets/img/course/tutor/course-tutor-1.jpg" alt="">Brian Cumin</a>
                              </div>
                              <div class="course__lesson">
                                 <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    12 Lessons
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                     <div class="course__item white-bg transition-3 mb-30">
                        <div class="course__thumb w-img fix">
                           <a href="course-details.html">
                              <img src="assets/img/course/course-2.jpg" alt="">
                           </a>
                        </div>
                        <div class="course__content p-relative">
                           <div class="course__price">
                              <span>Free</span>
                           </div>
                           <div class="course__tag">
                              <a href="#">UX Design</a>
                           </div>
                           <h3 class="course__title">
                              <a href="course-details.html">Web coding and apache basics</a>
                           </h3>
                           <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                           <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                              <div class="course__tutor">
                                 <a href="#"><img src="assets/img/course/tutor/course-tutor-2.jpg" alt="">Jack Morkel</a>
                              </div>
                              <div class="course__lesson">
                                 <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    12 Lessons
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                     <div class="course__item white-bg transition-3 mb-30">
                        <div class="course__thumb w-img fix">
                           <a href="course-details.html">
                              <img src="assets/img/course/course-3.jpg" alt="">
                           </a>
                        </div>
                        <div class="course__content p-relative">
                           <div class="course__price">
                              <span>$52</span>
                           </div>
                           <div class="course__tag">
                              <a href="#">Economics</a>
                           </div>
                           <h3 class="course__title">
                              <a href="course-details.html">Economics historical development</a>
                           </h3>
                           <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                           <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                              <div class="course__tutor">
                                 <a href="#"><img src="assets/img/course/tutor/course-tutor-3.jpg" alt="">Hilary Ouse</a>
                              </div>
                              <div class="course__lesson">
                                 <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    8 Lessons
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                     <div class="course__item white-bg transition-3 mb-30">
                        <div class="course__thumb w-img fix">
                           <a href="course-details.html">
                              <img src="assets/img/course/course-4.jpg" alt="">
                           </a>
                        </div>
                        <div class="course__content p-relative">
                           <div class="course__price">
                              <span>Free</span>
                           </div>
                           <div class="course__tag">
                              <a href="#">Beginner</a>
                           </div>
                           <h3 class="course__title">
                              <a href="course-details.html">Learn algebra the easy way!</a>
                           </h3>
                           <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                           <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                              <div class="course__tutor">
                                 <a href="#"><img src="assets/img/course/tutor/course-tutor-4.jpg" alt="">Phanta Bear</a>
                              </div>
                              <div class="course__lesson">
                                 <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    3 Lessons
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                     <div class="course__item white-bg transition-3 mb-30">
                        <div class="course__thumb w-img fix">
                           <a href="course-details.html">
                              <img src="assets/img/course/course-5.jpg" alt="">
                           </a>
                        </div>
                        <div class="course__content p-relative">
                           <div class="course__price">
                              <span>$104</span>
                           </div>
                           <div class="course__tag">
                              <a href="#">Economics</a>
                           </div>
                           <h3 class="course__title">
                              <a href="course-details.html">Angular the complete guide</a>
                           </h3>
                           <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                           <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                              <div class="course__tutor">
                                 <a href="#"><img src="assets/img/course/tutor/course-tutor-5.jpg" alt="">Hilary Ouse</a>
                              </div>
                              <div class="course__lesson">
                                 <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    8 Lessons
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                     <div class="course__item white-bg transition-3 mb-30">
                        <div class="course__thumb w-img fix">
                           <a href="course-details.html">
                              <img src="assets/img/course/course-6.jpg" alt="">
                           </a>
                        </div>
                        <div class="course__content p-relative">
                           <div class="course__price">
                              <span>$32</span>
                           </div>
                           <div class="course__tag">
                              <a href="#">IT Specialist</a>
                           </div>
                           <h3 class="course__title">
                              <a href="course-details.html">Intelligence analyst course 2022</a>
                           </h3>
                           <p>A beginner’s guide to designing or renovating interior spaces that pop.</p>

                           <div class="course__bottom d-sm-flex align-items-center justify-content-between">
                              <div class="course__tutor">
                                 <a href="#"><img src="assets/img/course/tutor/course-tutor-6.jpg" alt="">Oliver Porter</a>
                              </div>
                              <div class="course__lesson">
                                 <a href="#"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.2V4.49999C1 1.7 1.70588 1 4.52941 1H9.47059C12.2941 1 13 1.7 13 4.49999V11.5C13 11.598 13 11.696 12.9929 11.794" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.01176 10.0999H13V12.5498C13 13.9008 11.8918 14.9998 10.5294 14.9998H3.47059C2.10824 14.9998 1 13.9008 1 12.5498V12.0948C1 10.9959 1.90353 10.0999 3.01176 10.0999Z" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 4.5H9.82353" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.17647 6.94995H7.70589" stroke="#49535B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    3 Lessons
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- course area end -->

         <!-- team area start -->
         <section class="team__area pt-115">
            <div class="container">
               <div class="row align-items-end">
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="section__title-wrapper-2 mb-40">
                        <span class="section__title-pre-2">Top Instructors</span>
                        <h3 class="section__title-2">Become A Instruction Instructor.</h3>
                     </div>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="team__wrapper mb-45 pl-70">
                        <p>Placerat veritatis ullamco rutrum quia illo, aenean eaque necessitatibus aptent vehicula porta? Sollicitudin id, laboris commodi! </p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                     <div class="team__item text-center mb-40">
                        <div class="team__thumb">
                           <div class="team__shape">
                              <img src="assets/img/team/team-shape-1.png" alt="">
                           </div>
                           <img src="assets/img/team/team-1.png" alt="">
                           <div class="team__social transition-3">
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                              <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                           </div>
                        </div>
                        <div class="team__content">
                           <h3 class="team__title">
                              <a href="team-details.html">Melissa Jones</a>
                           </h3>
                           <span class="team__designation">Professor</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                     <div class="team__item text-center mb-40">
                        <div class="team__thumb">
                           <div class="team__shape">
                              <img src="assets/img/team/team-shape-2.png" alt="">
                           </div>
                           <img src="assets/img/team/team-2.png" alt="">
                           <div class="team__social transition-3">
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                              <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                           </div>
                        </div>
                        <div class="team__content">
                           <h3 class="team__title">
                              <a href="team-details.html">Morgan Key</a>
                           </h3>
                           <span class="team__designation">Teacher MBA</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                     <div class="team__item text-center mb-40">
                        <div class="team__thumb">
                           <div class="team__shape">
                              <img src="assets/img/team/team-shape-3.png" alt="">
                           </div>
                           <img src="assets/img/team/team-3.png" alt="">
                           <div class="team__social transition-3">
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                              <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                           </div>
                        </div>
                        <div class="team__content">
                           <h3 class="team__title">
                              <a href="team-details.html">Andra Flatcher </a>
                           </h3>
                           <span class="team__designation">Lead Teacher</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                     <div class="team__item text-center mb-40">
                        <div class="team__thumb">
                           <div class="team__shape">
                              <img src="assets/img/team/team-shape-4.png" alt="">
                           </div>
                           <img src="assets/img/team/team-4.png" alt="">
                           <div class="team__social transition-3">
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                              <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                           </div>
                        </div>
                        <div class="team__content">
                           <h3 class="team__title">
                              <a href="team-details.html">Oliver Porter</a>
                           </h3>
                           <span class="team__designation">Photogrepher</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- team area end -->

         <!-- testimonial area start -->
         <section class="testimonial__area pt-120 pb-120 fix">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="section__title-wrapper-2 mb-40 text-center">
                        <span class="section__title-pre">Testimonials</span>
                        <h3 class="section__title section__title-44">What our Customers Say.</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="testimonial__slider">
                        <div class="testimonial__active owl-carousel">
                              <div class="testimonial__item transition-3 text-center white-bg">
                                 <div class="testimonial__avater">
                                    <img src="assets/img/testimonial/testimonial-1.jpg" alt="">
                                 </div>
                                 <div class="testimonial__text">
                                    <h4>Great quality!</h4>
                                    <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat lacus vitae neque ornare.</p>
                                 </div>
                                 <div class="testimonial__avater-info mb-5">
                                    <h3>Dianne Ameter</h3>
                                    <span>UX Designer</span>
                                 </div>
                                 <div class="testimonial__rating">
                                    <ul>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="testimonial__item transition-3 text-center white-bg">
                                 <div class="testimonial__avater">
                                    <img src="assets/img/testimonial/testimonial-2.jpg" alt="">
                                 </div>
                                 <div class="testimonial__text">
                                    <h4>Code Quality!</h4>
                                    <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat lacus vitae neque ornare.</p>
                                 </div>
                                 <div class="testimonial__avater-info mb-5">
                                    <h3>Douglas Lyphe</h3>
                                    <span>Devolopment</span>
                                 </div>
                                 <div class="testimonial__rating">
                                    <ul>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="testimonial__item transition-3 text-center white-bg">
                                 <div class="testimonial__avater">
                                    <img src="assets/img/testimonial/testimonial-3.jpg" alt="">
                                 </div>
                                 <div class="testimonial__text">
                                    <h4>Customer Support</h4>
                                    <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat lacus vitae neque ornare.</p>
                                 </div>
                                 <div class="testimonial__avater-info mb-5">
                                    <h3>Russell Sprout</h3>
                                    <span>IT Specialist</span>
                                 </div>
                                 <div class="testimonial__rating">
                                    <ul>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="testimonial__item transition-3 text-center white-bg">
                                 <div class="testimonial__avater">
                                    <img src="assets/img/testimonial/testimonial-4.jpg" alt="">
                                 </div>
                                 <div class="testimonial__text">
                                    <h4>Good Product</h4>
                                    <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Phasellus feugiat lacus vitae neque ornare.</p>
                                 </div>
                                 <div class="testimonial__avater-info mb-5">
                                    <h3>Shahnewaz Sakil</h3>
                                    <span>Developer</span>
                                 </div>
                                 <div class="testimonial__rating">
                                    <ul>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                       <li>
                                          <a href="#"><i class="fa-solid fa-star"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- testimonial area end -->

         <!-- brand area start -->
         <section class="brand__area pb-70">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-4 col-xl-4 col-lg-4">
                     <div class="brand__wrapper">
                        <div class="section__title-wrapper-2">
                           <span class="section__title-pre">Testimonials</span>
                           <h3 class="section__title section__title-30">Who will you learn with?</h3>
                        </div>
                        <p>You can list your partners or instructors's brands here to show off your site's reputation</p>
                        <div class="brand__btn">
                           <a href="about.html" class="tp-btn-5 tp-btn-6">View all partners</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-8 col-xl-8 col-lg-8">
                     <div class="brand__item-wrapper pl-100">
                        <div class="row align-items-center">
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-1.png" alt="">
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-2.png" alt="">
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-3.png" alt="">
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-4.png" alt="">
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-5.png" alt="">
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-6.png" alt="">
                              </div>
                           </div>
                           <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                              <div class="brand__item text-center m-img mb-40">
                                 <img src="assets/img/brand/brand-7.png" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- brand area end -->


      </main>

@endsection