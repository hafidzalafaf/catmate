<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets-landing/images/logo/logo.svg') }}" type="image/x-icon">
    <title>Catmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets-landing/owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/owl-carousel/dist/assets/owl.theme.default.min.css') }} ">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}">
    
</head>
<body>
    
    {{-- navbar --}}
    <section id="navbar">
        <div class="container">
            <div class="group">
                <div class="top">
                    <a href=""><img src="{{ asset('assets-landing/images/catmate.svg') }}" alt="logo catmate"></a>
                </div>
                <div class="bottom navigation">
                    <a href="Javascript:void(0)" id="jumbotron-nav">{{ __('Home') }}</a>
                    <a href="Javascript:void(0)" id="about-nav">{{ __('About') }}</a>
                    <a href="Javascript:void(0)" id="features-nav">{{ __('Features') }}</a>
                    <a href="Javascript:void(0)" id="pricing-nav">{{ __('Pricing') }}</a>
                    <a href="Javascript:void(0)" id="testimoni-nav">{{ __('Testimoni') }}</a>
                    <a href="Javascript:void(0)" id="faq-nav">{{ __('FAQ') }}</a>
                    <a href="Javascript:void(0)" id="whoweare-nav">{{ __('Who-we-are') }}</a>
                    <a href="Javascript:void(0)" id="contact-nav">{{ __('Contact') }}</a>
                </div>
            </div>
        </div>
    </section>
    {{-- end navbar --}}


    <section class="viewport">
        <div id="scroll-container">
            {{-- jumbotron --}}
            <section id="jumbotron" style="background-image: url({{ asset('assets-landing/images/header/bg.png') }})">
                <div class="container">
                    <div class="images">
                        <img id="jamal" src="{{ asset('assets-landing/images/header/cat2.png') }}" class="cat-2" alt="cat-2">
                        <img id="emeli" src="{{ asset('assets-landing/images/header/cat1.png') }}" class="cat-1" alt="cat-1">
                    </div>
                    <div class="content">
                        <div class="love" id="love">
                            <i class="fa-solid fa-heart four"></i>
                            <i class="fa-solid fa-heart three"></i>
                            <i class="fa-solid fa-heart two"></i>
                            <i class="fa-solid fa-heart one"></i>
                        </div>    
                    </div>
                    <div class="description" id="tagline">
                        <h1 >{{ __('Slogan') }} <br> {{ __('Slogan2') }}</h1>
                        <div class="buttons">
                            <a href="" class="google-play">
                                <img src="{{ asset('assets-landing/images/google-play.svg') }}" alt="">
                                <div>
                                    <p>{{ __('Play-store') }}</p>
                                    <h6> Google Play</h6> 
                                </div>   
                            </a>
                            <a href="" class="app-store">
                                <i class="fa-brands fa-apple"></i>
                                <div>
                                    <p> {{ __('App-store') }}</p>
                                    <h6>App Store</h6>
                                </div>
                                <div class="label">
                                    <span>{{ __('Soon') }}</span>
                                </div>       
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gradient">
                </div>
            </section>
            {{-- end jumbotron --}}

            {{-- About --}}
            <section id="about">
                <img class="bg-about" src="{{ asset('assets-landing/images/bg-about.png') }}" alt="background-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 left">
                            <img class="about-img" src="{{ asset('assets-landing/images/about-catmate.svg') }}" alt="about catmate">
                        </div>
                        <div class="col-md-5 col-lg-5 right">
                            <h4>{{ __('About-title') }}</h4>
                            <p>{{ __('About-description') }}</p>
                            <p>{{ __('About-description2') }}</p>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end About --}}

            {{-- video teaser --}}
            <section id="teaser">
                <div class="arrow-btn">
                    <i class="fa-solid fa-angle-down"></i>
                </div>
                <img class="teaser1" src="{{ asset("assets-landing/images/teaser/bg.png") }}" alt="bg-teaser">
                <img class="teaser3" src="{{ asset("assets-landing/images/teaser/track.png") }}" alt="track">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 p-0">
                            <video muted id="myVideo" autoplay loop src="{{ asset("assets-landing/video/teaser.mp4") }}"  type="video/mp4">
                            </video>
                        </div>
                        <img class="cat1" src="{{ asset("assets-landing/images/teaser/jamal.svg") }}" alt="Cat ambasador">
                        <img class="cat2" src="{{ asset("assets-landing/images/teaser/jamal2.svg") }}" alt="Cat ambasador 2">
                    </div>
                </div>
            </section>
            {{-- end video teaser --}}

            {{-- Features --}}
            <section id="features">
                <img src="{{ asset('assets-landing/images/cat-track2.svg') }}" class="foot-features" alt="catmate foot">
                <div class="container">
                    <h3>{{ __('Feature-title') }} <br> {{ __('Feature-title2') }}</h3>
                    <div class="row">
                        <div class="col-md-4 box">
                            <div class="d-flex">
                                <i class="fas fa-code"></i>
                                <h6>{{ __('Feature-one') }}</h6>
                            </div>
                            <p>{{ __('Feature-one-description') }}</p>
                        </div>
                        <div class="col-md-4 box">
                            <div class=" d-flex">
                                <i class="fab fa-html5"></i>
                                <h6>{{ __('Feature-two') }}</h6>
                            </div>
                            <p>{{ __('Feature-two-description') }}</p>
                        </div>
                        <div class="col-md-4 box">
                            <div class="d-flex">
                                <i class="fas fa-cogs"></i>
                                <h6>{{ __('Feature-three') }}</h6>
                            </div>
                            <p>{{ __('Feature-three-description') }}</p>
                        </div>
                        <div class="col-md-4 box">
                            <div class="d-flex">
                                <i class="fas fa-address-book"></i>
                                <h6>{{ __('Feature-four') }}</h6>
                            </div>
                            <p>{{ __('Feature-four-description') }}</p>
                        </div>
                        <div class="col-md-4 box">
                            <div class="d-flex">
                                <i class="fas fa-address-book"></i>
                                <h6>{{ __('Feature-five') }}</h6>
                            </div>
                            <p>{{ __('Feature-five-description') }}</p>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end Features --}}

            {{-- pricing --}}
            <section id="pricing">
                <img src="{{ asset('assets-landing/images/cat-track3.png') }}" alt="jejak kucing catmate">
                <div class="container">
                    <h3 class="title mb-5">{{ __('Pricing-title') }}<br>
                        {{ __('Pricing-title2') }}</h3>
                    <div class="current-pricing">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="wrapper">
                                    <div class="bubble">
                                        <p>{{ __('Pricing3') }}</p>
                                    </div>
                                    <div class="img">
                                        <img src="{{ asset('assets-landing/images/bubble-triangle.svg') }}" alt="">
                                    </div>
                                </div>
                                <img class="bg" src="{{ asset('assets-landing/images/pricing/cats.png') }}" alt="cats catmate">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end pricing --}}

            {{-- testimoni --}}
            <section id="testimoni">
                <img class="testi-bg" src="{{ asset('assets-landing/images/cat-track4.svg') }}" alt="Catmate track">
                <div class="container">
                    <h3>{{ __('Testimony-title') }}</h3>
                    <div class="">
                        <div class="owl-two owl-carousel owl-theme group" >
                            <div class="item">
                                <img class="user" src="{{ asset('assets-landing/images/user-1.png') }}" alt="user 1">
                                <div class="description">
                                    <p>{{ __('Testimony1') }}</p>
                                    <h6>Jasmine Andrews</h6>
                                    <span>Microsoft</span>
                                </div>
                            </div>
                            <div class="item">
                                <img class="user" src="{{ asset('assets-landing/images/user-2.png') }}" alt="user 1">
                                <div class="description">
                                    <p>{{ __('Testimony2') }}</p>
                                    <h6>Austin Campbell</h6>
                                    <span>Dropbox</span>
                                </div>
                            </div>
                            <div class="item">
                                <img class="user" src="{{ asset('assets-landing/images/user-3.png') }}" alt="user 1">
                                <div class="description">
                                    <p>{{ __('Testimony3') }}</p>
                                    <h6>Jasmine Andrews</h6>
                                    <span>Microsoft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end testimoni --}}

            {{-- FAQ --}}
            <section id="faq">
                <img class="bg-faq" src="{{ asset('assets-landing/images/cat-track5.svg') }}" alt="catmate track">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-md-10">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{ __('Faq-one') }} <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5148 1.56389C10.5148 1.48354 10.4746 1.39314 10.4143 1.33287L9.91211 0.830636C9.85184 0.770368 9.76144 0.73019 9.68108 0.73019C9.60073 0.73019 9.51032 0.770368 9.45006 0.830636L5.50251 4.77818L1.55497 0.830636C1.4947 0.770368 1.4043 0.73019 1.32394 0.73019C1.23354 0.73019 1.15318 0.770368 1.09291 0.830636L0.590681 1.33287C0.530413 1.39314 0.490234 1.48354 0.490234 1.56389C0.490234 1.64425 0.530413 1.73465 0.590681 1.79492L5.27148 6.47573C5.33175 6.53599 5.42215 6.57617 5.50251 6.57617C5.58287 6.57617 5.67327 6.53599 5.73354 6.47573L10.4143 1.79492C10.4746 1.73465 10.5148 1.64425 10.5148 1.56389Z" fill="#35354C"/>
                                        </svg>
                                        
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>- {{ __('Faq-one-description1') }}</p>
                                        <p>- {{ __('Faq-one-description2') }}</p>
                                        <p>- {{ __('Faq-one-description3') }}</p>
                                        <p>- {{ __('Faq-one-description4') }}</p>
                                    </div>
                                </div>
                                </div>
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        {{ __('Faq-two') }} <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5148 1.56389C10.5148 1.48354 10.4746 1.39314 10.4143 1.33287L9.91211 0.830636C9.85184 0.770368 9.76144 0.73019 9.68108 0.73019C9.60073 0.73019 9.51032 0.770368 9.45006 0.830636L5.50251 4.77818L1.55497 0.830636C1.4947 0.770368 1.4043 0.73019 1.32394 0.73019C1.23354 0.73019 1.15318 0.770368 1.09291 0.830636L0.590681 1.33287C0.530413 1.39314 0.490234 1.48354 0.490234 1.56389C0.490234 1.64425 0.530413 1.73465 0.590681 1.79492L5.27148 6.47573C5.33175 6.53599 5.42215 6.57617 5.50251 6.57617C5.58287 6.57617 5.67327 6.53599 5.73354 6.47573L10.4143 1.79492C10.4746 1.73465 10.5148 1.64425 10.5148 1.56389Z" fill="#35354C"/>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        {{ __('Faq-two-description') }}
                                    </div>
                                </div>
                                </div>
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        {{ __('Faq-three') }}<svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5148 1.56389C10.5148 1.48354 10.4746 1.39314 10.4143 1.33287L9.91211 0.830636C9.85184 0.770368 9.76144 0.73019 9.68108 0.73019C9.60073 0.73019 9.51032 0.770368 9.45006 0.830636L5.50251 4.77818L1.55497 0.830636C1.4947 0.770368 1.4043 0.73019 1.32394 0.73019C1.23354 0.73019 1.15318 0.770368 1.09291 0.830636L0.590681 1.33287C0.530413 1.39314 0.490234 1.48354 0.490234 1.56389C0.490234 1.64425 0.530413 1.73465 0.590681 1.79492L5.27148 6.47573C5.33175 6.53599 5.42215 6.57617 5.50251 6.57617C5.58287 6.57617 5.67327 6.53599 5.73354 6.47573L10.4143 1.79492C10.4746 1.73465 10.5148 1.64425 10.5148 1.56389Z" fill="#35354C"/>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{ __('Faq-three-description') }}</div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end FAQ --}}

            {{-- who we are --}}
            <section id="who-we-are">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-5 left">
                            <h4>{{ __('Who-we-are-title') }}</h4>
                            <div class="mb-4">
                                <p> {{ __('Who-we-are2') }}</p>
                                <p>{{ __('Who-we-are3') }}</p>
                                <p>{{ __('Who-we-are4') }}</p>
                            </div>
                            <a href="https://tupaitech.net/" target="_blank" class="btn-line mt-5">{{ __('Explore') }}</a>
                        </div>
                        <div class="col-md-6 col-xl-5 right" >
                            <img src="{{ asset('assets-landing/images/who-we-are.svg') }}" alt="catmate who-we-are">
                        </div>
                    </div>
                </div>
            </section>
            {{-- end who we are --}}

            {{-- contact --}}
            <section id="contact">
                <img src="{{ asset('assets-landing/images/bg-who-we-are.png') }}" class="background" alt="">
                <img src="{{ asset('assets-landing/images/cat-track6.svg') }}" alt="cat track">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-5 col-xl-4">
                            <h3>{{ __('Contact-one') }}</h3>
                            <p>{{ __('Contact-one-description') }}</p>
                            <form action="{{ route('send-email') }}" method="POST" class="contact-form">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Your-name') }}" value="{{ old('name') }}">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('Your-email') }}" value="{{ old('email') }}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pesan">{{ __('Message') }}</label>
                                    <textarea class="form-control" name="message" id="message" placeholder="{{ __('Your-message') }}">{{ old('message') }}</textarea>
                                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn-contact" id="contact-btn" disabled >{{ __('Send') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-lg-5 col-xl-5">
                            <h3>{{ __('Contact-two') }}</h3>
                            <p>{{ __('Contact-two-description') }}</p>
                            <div class="contact">
                                <a href=""><i class="fa-solid fa-phone"></i> +62 8218 8129 821</a>
                                <a href=""><i class="fa-solid fa-envelope"></i> info@catmate.com</a>
                            </div>
                            <div class="social-media">
                                <h6>{{ __('Contact-sosmed') }}</h6>
                                <div class="group">
                                    <a href="https://web.facebook.com/tupaitech" target="_blank"><i class="fa-brands fa-facebook-square"></i>Facebook</a>
                                    <a href="https://www.instagram.com/tupaitech/" target="_blank"><i class="fa-brands fa-instagram"></i>instagram</a>
                                    <a href="https://twitter.com/TupaiTech" target="_blank"><i class="fa-brands fa-twitter"></i>twitter</a>
                                    <a href="https://www.linkedin.com/company/tupaitech/" target="_blank"><i class="fa-brands fa-linkedin"></i>linkedin</a>
                                    {{-- <a href=""><i class="fa-brands fa-pinterest"></i>pinterest</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end contact --}}

            {{-- footer --}}
            <footer>
                <div class="container">
                    <div class="footer-top">
                        <div class="logo">
                            <img src="{{ asset('assets-landing/images/logo-white.svg') }}" alt="Catmate logo">
                            <p>{{ __('Catmate-footer') }}</p>
                            <div class="sosmed">
                                <a href="https://twitter.com/TupaiTech" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                <a href="https://web.facebook.com/tupaitech"target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                                <a href="https://www.instagram.com/tupaitech/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="produk">
                            <h6>{{ __('Product') }}</h6>
                            <a href="Javascript:void(0)" id="about-footer">{{ __('About') }}</a>
                            <a href="Javascript:void(0)" id="features-footer">{{ __('Features') }}</a>
                            <a href="Javascript:void(0)" id="pricing-footer">{{ __('Pricing') }}</a>
                        </div>
                        <div class="detail">
                            <h6>{{ __('Detail') }}</h6>
                            <a href="Javascript:void(0)" id="testimoni-footer">{{ __('Testimony') }}</a>
                            <a href="Javascript:void(0)" id="faq-footer">{{ __('FAQ') }}</a>
                            <a href="Javascript:void(0)" id="whoweare-footer">{{ __('Who-we-are') }}</a>
                        </div>
                        <div class="nara-hubung">
                            <h6>{{ __('Contact-person') }}</h6>
                            <a href="Javascript:void(0)" id="contact-footer">{{ __('Contact') }}</a>
                        </div>
                        <div class="language">
                            <ul>
                                @php
                                    $params = Route::current()->parameters();
                                    $params['locale']='en';
                                @endphp
                                @if (session('language'))
                                <li class="{{ session('language') && session('language')=='en' ? 'active' : 'hidden'}}" id="english" href="{{ route(Route::currentRouteName(), $params) }}">
                                @else
                                <li class="active" id="english" href="{{ route(Route::currentRouteName(), $params) }}">
                                @endif
                                    <p><img src="{{ asset('assets-landing/images/english.svg') }}" alt=""> English <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.8683 1.05169C8.92783 1.11121 8.95759 1.17966 8.95759 1.25704C8.95759 1.33443 8.92783 1.40288 8.8683 1.4624L4.70759 5.62312C4.64807 5.68264 4.57961 5.7124 4.50223 5.7124C4.42485 5.7124 4.3564 5.68264 4.29688 5.62312L0.136161 1.4624C0.076637 1.40288 0.0468751 1.33443 0.0468751 1.25704C0.0468751 1.17966 0.076637 1.11121 0.136161 1.05169L0.582589 0.605259C0.642113 0.545735 0.710565 0.515974 0.787946 0.515974C0.865327 0.515974 0.93378 0.545735 0.993304 0.605259L4.50223 4.11419L8.01116 0.605259C8.07068 0.545735 8.13914 0.515974 8.21652 0.515974C8.2939 0.515974 8.36235 0.545735 8.42188 0.605259L8.8683 1.05169Z" fill="white"/>
                                        </svg>
                                        </p>
                                </li>
                                @php
                                    $params['locale']='id';
                                @endphp
                                <li class="{{ session('language') && session('language')=='id' ? 'active' : 'hidden'}}" id="indonesia" href="{{ route(Route::currentRouteName(), $params) }}">
                                    <p><img src="{{ asset('assets-landing/images/indo.svg') }}" alt=""> Indonesia <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.8683 1.05169C8.92783 1.11121 8.95759 1.17966 8.95759 1.25704C8.95759 1.33443 8.92783 1.40288 8.8683 1.4624L4.70759 5.62312C4.64807 5.68264 4.57961 5.7124 4.50223 5.7124C4.42485 5.7124 4.3564 5.68264 4.29688 5.62312L0.136161 1.4624C0.076637 1.40288 0.0468751 1.33443 0.0468751 1.25704C0.0468751 1.17966 0.076637 1.11121 0.136161 1.05169L0.582589 0.605259C0.642113 0.545735 0.710565 0.515974 0.787946 0.515974C0.865327 0.515974 0.93378 0.545735 0.993304 0.605259L4.50223 4.11419L8.01116 0.605259C8.07068 0.545735 8.13914 0.515974 8.21652 0.515974C8.2939 0.515974 8.36235 0.545735 8.42188 0.605259L8.8683 1.05169Z" fill="white"/>
                                        </svg>
                                        </p>
                                </li>
                            </ul>  
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <p>© 2022 Tupai Tech All rights reserved.</p>
                    </div>
                </div>
            </footer>
            {{-- end footer --}}
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    {{-- gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    {{-- Smooth scroll --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.7.4/smooth-scrollbar.js"
        integrity="sha512-s+Za9YjKdWb7RODdRba1tjg+6RqPPnB+c7mQywwtdvn59eZYNI53pLOsTp1M7dkznKcWw45tq6xAHh/i1kvL6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Carousel -->
    <script src="{{ asset('assets-landing/owl-carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/navbar.js') }}"></script>
    <script>
        // disable submit btn
        function changeSubmitBtn() {
            let name = document.getElementById('name');
            let email = document.getElementById('email');
            let message = document.getElementById('message');
            let btn = document.getElementById('contact-btn');

            name.addEventListener('keyup', checkBtn);
            email.addEventListener('keyup', checkBtn);
            message.addEventListener('keyup', checkBtn);
            function checkBtn(){
                let nameVal = name.value.trim();
                let emailVal = email.value.trim();
                let messageVal = message.value.trim();
                if(nameVal != '' && emailVal != '' && messageVal != ''){
                    btn.classList.add('active');
                    $('#contact-btn').removeAttr('disabled');
                }else {
                    btn.classList.remove('active');
                    $('#contact-btn').Attr('disabled');
                }
                

            }
        };

        window.addEventListener('scroll', changeSubmitBtn());


        // change bg mobile
        $(document).ready(function(){
            if(window.innerWidth <= 768){
                $('#jumbotron').css("background-image", "url({{ asset('assets/images/header/bg-mobile.svg') }})");
            }
        })
        

        // Header paralax
        let tablet = window.innerWidth;
            if(tablet > 992){
                gsap.to("#jamal", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    x : 200,
                    y : 400
                });

                gsap.to("#emeli", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    x : -200,
                    y : 400
                });

                gsap.to("#tagline", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    y : 400
                });

                gsap.to("#love", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    y : 400
                });
            }else if(tablet <= 600){
                gsap.to("#jamal", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    x : 50,
                    y : 200
                });

                gsap.to("#emeli", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    x : -50,
                    y : 200
                });

                gsap.to("#tagline", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    y : 200
                });

                gsap.to("#love", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    y : 200
                });
            }else if(tablet <= 992){
                gsap.to("#jamal", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    x : 100,
                    y : 300
                });

                gsap.to("#emeli", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    x : -100,
                    y : 300
                });

                gsap.to("#tagline", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    y : 300
                });

                gsap.to("#love", {
                    scrollTrigger: {
                        trigger: '#jumbotron',
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 2
                    }, 
                    y : 300
                });
            }

        

        $(document).ready(function(){
            // padding top 300px
            let windowHeight = window.innerHeight;
            let windowWidth = window.innerWidth;
            if(windowHeight > 1300){
                $("#jumbotron").css("padding-top","300px");
                $("#jumbotron").css("height","110vh");
            }
            
            // Showing love 
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                if(windowWidth > 768){
                    if (scroll > 300) {
                        $("#love").fadeIn("slow");
                    }

                    else{
                        $("#love").fadeOut("slow");	
                    }
                }else if (windowWidth <= 600) {
                    if (scroll > 150) {
                        $("#love").fadeIn("slow");
                    }

                    else{
                        $("#love").fadeOut("slow");	
                    }
                } else if (windowWidth <= 768) {
                    if (scroll > 250) {
                        $("#love").fadeIn("slow");
                    }

                    else{
                        $("#love").fadeOut("slow");	
                    }
                }
            })
        });


        // carousel
         $('.owl-two').owlCarousel({
            margin: 60,
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive : {
                600 :{
                    items: 1
                },
                768 :{
                    items:1
                },
                992 :{
                    items:2
                }
            }
            
        })

        // Change language
        $( document ).ready(function() {

            $('#english').click(function(){
                $(this).removeClass('hidden');
                $(this).addClass('active');
                var href = $(this).attr('href');
                $('#indonesia').removeClass('active');
                $('#indonesia').addClass('hidden');
                changeLanguage('en',href);
                console.log(href);
            })
            $('#indonesia').click(function(){
                $(this).removeClass('hidden');
                $(this).addClass('active');
                var href = $(this).attr('href');
                $('#english').removeClass('active');
                $('#english').addClass('hidden');
                changeLanguage('id',href);
            })

        });

        function changeLanguage(lang, href) {
            // console.log(lang);
            var _token = "{{ csrf_token() }}";
            // var _route = "{{Route::currentRouteName()}}"
            var _route = "{{route(Route::currentRouteName(),Route::current()->parameters())}}"
            $.ajax({
                url: "{{route('changeLanguage')}}",
                type:'POST',
                data: {
                    _token:_token,
                    lang:lang,
                },
                success: function(data) {
                    console.log(data);
                    console.log(href);
                    window.location.replace(href)
                }
            });
        }

        // play video 
        $( window ).on("scroll", function(){
            let video = document.getElementById('myVideo');
            let distance = video.getBoundingClientRect().top;
            var halfWindow = $(window).height()*0.7;

            console.log($(window).scrollTop() >= $('#teaser').offset().top - halfWindow && $(window).scrollTop() <= $('#teaser').offset().top + halfWindow );

            if ($(window).scrollTop() >= $('#teaser').offset().top - halfWindow && $(window).scrollTop() <= $('#teaser').offset().top) {
                video.play();
            }else{
                video.pause();
            }

        })

        // navbar scroll
        $(document).ready(function(){
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                if (scroll > 50) {
                    $("#navbar").css("background" , "#fff");
                    $("#navbar").css("transition" , "0.3s ease-in");
                }

                else{
                    $("#navbar").css("background" , "transparent");  	
                    $("#navbar").css("transition" , "0.3s ease-in-out");
                }
            })
            $(window).on("load", function(){
                var scroll = $(window).scrollTop();
                if (scroll > 50) {
                    $("#navbar").css("background" , "#fff");
                }
                else{
                    $("#navbar").css("background" , "transparent");  	
                }
            })
            
        })
    </script>
    <!-- SMOOTH SCROLL -->
    <script>
        gsap.registerPlugin(ScrollTrigger);
        var container = document.querySelector("#scroll-container");
        var height;
        function setHeight() {
            height = container.clientHeight;
            document.body.style.height = height + "px";
        }
        ScrollTrigger.addEventListener("refreshInit", setHeight);
        window.addEventListener('scroll', setHeight);


        gsap.to(container, {
            y: () => -(height - document.documentElement.clientHeight),
            ease: "none",
            scrollTrigger: {
                trigger: document.body,
                start: "top top",
                end: "bottom bottom",
                scrub: 1,
                invalidateOnRefresh: true
            }
        });
    </script>
</body>
</html>