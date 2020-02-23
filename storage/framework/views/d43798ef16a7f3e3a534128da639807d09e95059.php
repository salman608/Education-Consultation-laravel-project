<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?> | <?php echo e(config('app.slogan')); ?></title>
    <meta property="og:title" content="<?php echo e(config('app.name')); ?> | <?php echo e(config('app.slogan')); ?>"/>
    <meta property="og:image" content="<?php echo e(asset('assets/images/logo.png')); ?>"/>
    <meta property="og:description" content="A platform to connect students/parents with their right tutor.
Brief message-25000+ Expert male/female tutors from Bangla Medium, English Medium,IELTS, GMAT, SAT, Medical/University Admission test, Project/Assignment are available. Locate your Home tutor in districts of Bangladesh." />
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon16.png')); ?>"> 
    <meta name="google-site-verification" content="cqC7jASDD6ePj60BddTtffY2XB4wLCObIFKDCV8aEns">

    <link rel="stylesheet" href="<?php echo e(asset('assets/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/datepicker/bootstrap-datepicker.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/timepicker/bootstrap-timepicker.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/owlcarousel/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/toastr/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/style.css')); ?>" />

    <script type="text/javascript" src="<?php echo e(asset('assets/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/fontawesome/js/all.min.js')); ?>"></script>
    <!-- UIkit JS -->
    <script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/owlcarousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/axios/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/scripts.js')); ?>"></script>
</head>
<body>
<header class="header">
    <div class="row">
        <div class="col-lg-4">
            <a class="" href="<?php echo e(route('/')); ?>">
                <img src="<?php echo e(asset('assets/images/tutor-provide.png')); ?>" width="200px" height="">
            </a>
        </div>
        <div class="col-lg-4">
            <p><strong>Contact No : 01744-271585</strong></p>
            <p><strong>Email : info@tutorprovide.com</strong></p>
        </div>
        <div class="col-lg-4">
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/tutorprovide"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCOxKVjBONG8sdAk5EIQ2l1Q"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://www.linkedin.com/groups/13758366/"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/tutorprovideofficial/"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/ProvideTutor"><i class="fab fa-twitter-square"></i></a></li>
            </ul>
        </div>
    </div>
</header>
<section class="section">
    <div class="row">
        <div class="col-lg-2">
            <div class="blocks">
                <ul class="menus nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('/')) ? 'active' : ''); ?>" href="<?php echo e(route('/')); ?>"><i class="fas fa-home">&nbsp;</i><span>Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('login')) ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>"><i class="fas fa-sign-in-alt">&nbsp;</i><span>Sign In</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('register/tutor')) ? 'active' : ''); ?>" href="<?php echo e(route('register.tutor')); ?>"><i class="fas fa-user-tie">&nbsp;</i><span>Tutor Registration</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('register')) ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>"><i class="fas fa-user-circle">&nbsp;</i><span>Guardian Registration</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('whytutorprovide')) ? 'active' : ''); ?>" href="<?php echo e(route('whytutorprovide')); ?>"><i class="fas fa-info-circle">&nbsp;</i><span>Why Tutor Provide</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('jobboard')) ? 'active' : ''); ?>" href="<?php echo e(route('jobboard.index')); ?>"><i class="fas fa-book-reader">&nbsp;</i><span>Available Tuitions</span></a>
                    </li>
                </ul>
            </div>
            <div class="blocks categories_hide_md">
                <h5 class="title">Popular Categories</h5>
                <div class="categories owl-carousel owl-theme">
                    <a href="<?php echo e(route('login')); ?>" class="item">
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/Bangla-Medium.jpg')); ?>" alt="">
                            <h4>Bangla Medium</h4>
                        </div>
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/English-Version.jpg')); ?>" alt="">
                            <h4>English Version</h4>
                        </div>
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/English-Mdium.jpg')); ?>" alt="">
                            <h4>English Medium</h4>
                        </div>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="item">
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/Religious-Studies.jpg')); ?>" alt="">
                            <h4>Religious Studies</h4>
                        </div>
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/admission-test.jpg')); ?>" alt="">
                            <h4>Admission Test</h4>
                        </div>
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/arts.jpg')); ?>" alt="">
                            <h4>Arts</h4>
                        </div>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="item">
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/language-learning.jpg')); ?>" alt="">
                            <h4>Language Learning</h4>
                        </div>
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/test-preparetion.jpg')); ?>" alt="">
                            <h4>Test Preparation</h4>
                        </div>
                        <div class="category">
                            <img src="<?php echo e(asset('assets/images/Bangla-Medium.jpg')); ?>" alt="">
                            <h4>Bangla Medium</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="blocks categories_hide_md">
                <img src="<?php echo e(asset('assets/images/banner.png')); ?>" alt="Advertiesment">
            </div>
        </div>
        <div class="col-lg-7">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="col-lg-3">
            <div class="blocks categories_hide_lg">
                <h5 class="title">Popular Categories</h5>
                <div class="categories owl-carousel owl-theme">
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/Bangla-Medium.jpg')); ?>" alt="">
                        <h4>Bangla Medium</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/English-Version.jpg')); ?>" alt="">
                        <h4>English Version</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/English-Mdium.jpg')); ?>" alt="">
                        <h4>English Medium</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/Religious-Studies.jpg')); ?>" alt="">
                        <h4>Religious Studies</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/admission-test.jpg')); ?>" alt="">
                        <h4>Admission Test</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/arts.jpg')); ?>" alt="">
                        <h4>Arts</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/language-learning.jpg')); ?>" alt="">
                        <h4>Language Learning</h4>
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="category item">
                        <img src="<?php echo e(asset('assets/images/test-preparetion.jpg')); ?>" alt="">
                        <h4>Test Preparation</h4>
                    </a>
                </div>
            </div>
            <div class="blocks">
                <div class="youtube">
                    <a href="https://www.youtube.com/channel/UCOxKVjBONG8sdAk5EIQ2l1Q/videos">
                        <img src="<?php echo e(asset('assets/images/Youtube-logo-black.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="blocks">
                <h5 class="title">Guardian feedback</h5>
                <div class="content">
                    <ul class="feedback owl-carousel owl-theme">
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Barrister-Riaz-Mahmud.png')); ?>" class="rounded-circle" alt="Barrister Riaz Mahmud" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Barrister Riaz Mahmud</a></h5>
                                    <p>Profession: Lawyer </p>
                                    <p>We’re all very busy in our professional life. As a busy parent it’s very important for me to choose a qualified tutor for my child. I’ve found my desired tutor from TutorProvide.com, they are very professional & committed to ensure the guardian satisfaction. I wish best of luck for them.  </p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Mortuja-Jamal.png')); ?>" class="rounded-circle" alt="Mortuja Jamal" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Mortuja Jamal</a></h5>
                                    <p>Profession: Businessman</p>
                                    <p>I got a well-qualified tutor for my daughter within a very short time. Thanks a lot to TutorProvide.com for their qualified service.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Zarna-Rashide-Akter.png')); ?>" class="rounded-circle" alt="Zarna Rashide Akter" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Zarna Rashide Akter</a></h5>
                                    <p>Profession: Politician (Female Ward Councilor, Mirpur 6)</p>
                                    <p>TutorProvide.com helps me to find well trained & professional tutor for children whenever I need. They are very professional & never compromise with the quality.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Sahabul-Alam.png')); ?>" class="rounded-circle" alt="Sahabul Alam" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Sahabul Alam</a></h5>
                                    <p>Profession: Banker (BRAC Bank Limited)</p>
                                    <p>Find the perfect house tutor for your child from TutorProvide.com. They’ll ensure you to find the best tuition service as per your requirement.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Nasima-Akter.png')); ?>" class="rounded-circle" alt="Nasima Akter" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Nasima Akter</a></h5>
                                    <p>Profession: House Wife</p>
                                    <p>TutorProvide.com makes it very easy for me to get the qualified teacher that I was looking for. I can ensure you that they’ll help you to get the perfect tutor for your child.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Anjumanara-Lata.png')); ?>" class="rounded-circle" alt="Anjumanara Lata" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Anjumanara Lata</a></h5>
                                    <p>Profession: House Wife</p>
                                    <p>I’m very satisfied with TutorProvide.com as I’ve found the perfect teacher I was looking for my Son. They are not only qualified as well as committed to provide the best within a very short time.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Mohammad-Iqbal.png')); ?>" class="rounded-circle" alt="" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Mohammad Iqbal</a></h5>
                                    <p>Profession: Assistant Police Commissioner</p>
                                    <p>Security comes very first to me & I can ensure you that they have a very high professional team to provide you a very highly skilled Teacher, ensuring your safety & security.  You may contact with them to get their satisfactory service.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/guardian_feedback/Mofizur-Rahman.png')); ?>" class="rounded-circle" alt="Mofizur Rahman" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Mofizur Rahman</a></h5>
                                    <p>Profession: Businessman</p>
                                    <p>I love TutorProvide.com very much. I’ve found the perfect tutor I was looking for within a very short time. They are very punctual & highly professional. My blessings are with them.     </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="blocks">
                <h5 class="title">Tutors feedback</h5>
                <div class="content">
                    <ul class="feedback owl-carousel owl-theme">
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Md-Shakil-SK.png')); ?>" class="rounded-circle" alt="Md Shakil SK" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Md Shakil SK</a></h5>
                                    <p>Institution: Shaheed Suhrawardy Medical College</p>
                                    <p>Subject: MBBS 3rd year</p>
                                    <p>As a Medical student, it’s very difficult for me to get the satisfactory tuition job nearby my location. TutorProvide.com made it very easy for me to get that (Tuition Job). I wish them best of luck for their future success. </p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Mahima-Hoque.png')); ?>" class="rounded-circle" alt="Mahima Hoque" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Mahima Hoque</a></h5>
                                    <p>Institution: NSU</p>
                                    <p>Subject: CSE</p>
                                    <p>I’m very much happy with their highly skilled team & their services. My best wishes will be always with them.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Nafisa-Airin.png')); ?>" class="rounded-circle" alt="Nafisa Airin" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Nafisa Airin</a></h5>
                                    <p>Institution: BUP</p>
                                    <p>Subject: International Relations</p>
                                    <p>I had got their reference from my friend, I contacted with them & their platform helped me a lot to get some satisfactory tuition jobs within a very short time. I recommend you to try their highly qualified services as well. </p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Sadman-Fahim.png')); ?>" class="rounded-circle" alt="Sadman Fahim" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Sadman Fahim</a></h5>
                                    <p>Institution: Ahsanullah University of Science & Technology</p>
                                    <p>Subject: CSE</p>
                                    <p>Hi! Everyone, I’m an Engineering Student. I got some Tuition Jobs from their platform. They are very committed to provide qualified tuition jobs.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Faisal-Moheuddin.png')); ?>" class="rounded-circle" alt="Faisal Moheuddin" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Faisal Moheuddin</a></h5>
                                    <p>Institution: Military Institute of Science and Technology (MIST)</p>
                                    <p>Subject: Industrial & Production Engineering (IPE)</p>
                                    <p>Tried their website & got some Tuition Jobs nearby my location. I highly appreciate their services.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Minal-Hossain-Prodhan.png')); ?>" class="rounded-circle" alt="Minal Hossain Prodhan" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Minal Hossain Prodhan</a></h5>
                                    <p>Institution: Rajshahi University</p>
                                    <p>Subject: Applied Chemistry and Chemical Engineering</p>
                                    <p>After completing my Graduation from Rajshahi University, I had come back to Dhaka& looking for some Tuition Jobs to complete my Master’s (Chemical Engineering). Thanks to TutorProvide.com to find me some satisfactory tuition jobs in a very short time. </p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Hafizur-Rahman.png')); ?>" class="rounded-circle" alt="Hafizur Rahman" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Hafizur Rahman</a></h5>
                                    <p>Institution: Dhaka University</p>
                                    <p>Subject: International Relations</p>
                                    <p>I recommend my friends to try TutorProvide.com as they provide very satisfactory Tuition services for everyone. </p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Arifur-Rahman.png')); ?>" class="rounded-circle" alt="Arifur Rahman" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Arifur Rahman</a></h5>
                                    <p>Institution: BUET</p>
                                    <p>Subject: Materials and Metallurgical Engineering</p>
                                    <p>As a BUETian I’m very happy to recommend you TutorProvide.com as they have a very highly qualified Team & Services for the Teachers & Students. I pray to the almighty for the future success.</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Kaniz-Jahan.png')); ?>" class="rounded-circle" alt="Kaniz Jahan" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Kaniz Jahan</a></h5>
                                    <p>Institution: BUET</p>
                                    <p>Subject: Urban and Regional Planning</p>
                                    <p>After getting admitted to BUET I was looking for some good Tuition Jobs nearby my BUET Campus. It was very difficult for me at that time, as security was a big issue for me. TutorProvide.com helped me a lot to get some tuition jobs within a very short time on a well secured environment.      </p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="media">
                                <img src="<?php echo e(asset('assets/images/tutor_feedback/Azezul-Huque.png')); ?>" class="rounded-circle" alt="Md Azezul Huque" style="width: 70px;">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="">Md Azezul Huque</a></h5>
                                    <p>Institution: Dhaka University </p>
                                    <p>Subject: Arabic</p>
                                    <p>As I’m an Arabic Student, getting a tuition job was difficult for me. Then I had heard about TutorProvide.com form my friend. Their platform helped me to manage some tuition jobs as per my requirement, I’m very thanks full to them.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="row">
        <div class="col-lg-3">
            <h5>Connected Us</h5>
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/tutorprovide"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCOxKVjBONG8sdAk5EIQ2l1Q"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://www.linkedin.com/groups/13758366/"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/tutorprovideofficial/"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/ProvideTutor"><i class="fab fa-twitter-square"></i></a></li>
            </ul>
        </div>
        <div class="col-lg-2">
            <p>
                <a href="<?php echo e(route('whytutorprovide')); ?>">
                    <strong>Why Tutor Provide</strong>
                </a>
            </p>
            <p>
                <a href="https://tutorprovide.blogspot.com/">
                    <strong>Blog</strong>
                </a>
            </p>
            <p>
                <a href="<?php echo e(route('contact.create')); ?>">
                    <strong>Contact</strong>
                </a>
            </p>
        </div>
        <div class="col-lg-2">
            <p>
                <a href="<?php echo e(route('register.tutor')); ?>">
                    <strong>Tutor Registration</strong>
                </a>
            </p>
            <p>
                <a href="<?php echo e(route('register')); ?>">
                    <strong>Guardian Registration</strong>
                </a>
            </p>
            <p>
                <a href="<?php echo e(route('conditions')); ?>">
                    <strong>Terms And Conditions</strong>
                </a>
            </p>
        </div>
        <div class="col-lg-5">
            <div class="aim">
                <h5><?php echo e(config('app.name')); ?> Aim</h5>
                <p><?php echo e(config('app.name')); ?>.com- Is The online tutor matching platform in Bangladesh. <?php echo e(config('app.name')); ?>.com helps students & parents connect with qualified Tutors in-person and online tutors in over different categories.</p>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="row">
            <div class="col-lg-3">&nbsp;</div>
            <div class="col-lg-6">
                <p>Copyright @ 2019 <?php echo e(config('app.name')); ?>. All Rights Reserved.</p>
            </div>
            <div class="col-lg-3">&nbsp;</div>
        </div>
    </div>
</footer>


<?php if(session()->has('message')): ?>
    <?php $__env->startComponent('component.alert'); ?>
        <?php if(session()->has('message.success')): ?>
            <strong>Thank You!</strong>!
        <?php endif; ?>
        <?php if(session()->has('message.error')): ?>
            <strong>Failed!</strong>!
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\tutore\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>