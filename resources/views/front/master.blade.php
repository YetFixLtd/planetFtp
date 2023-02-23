<!DOCTYPE html>
<!doctype html>
<html class="no-js" lang="en-US">

<head>

    <!-- meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
    <!-- Uncomment the meta tags you are going to use! Be relevant and don't spam! -->
    <meta name="keywords" content="bdplex,bdplex.net,bdplex.com,plex,netflix,iflix,movie,moviedom,iitdom" />
    <meta name="description"
        content="Watch live online free 10000+ HD Movies and Tv series. download also Games , Softwares , Bangla Natok and many more....">
    <!-- Title -->
    <title>RS Network FTP. - Biggest Online Movie Server</title>
    <!--  Desktop Favicons  -->
    <link rel="icon" type="image/png" href="{{asset('assets')}}/images/favicons/favicon.ico" sizes="16x16">

    @include('front.includes.style')
    {{-- @include('frontEnd11.includes.style') --}}

    @stack('css')
    <!-- Modernizr Library -->

</head>

<body>

    <!-- Page Wrapper -->
    <div id="page_wrapper">

        <!-- Header style 4 -->
        <header id="header" class="site-header style5  cta_button dark-transparent" data-header-style="7">

            @include('front.includes.header2')
        </header>
        <style>
            #_wpk-custom-bar {
                display: none;
            }
        </style>
        <!--/ Header style 4 -->


        <!-- iOS Slider element with animateme scroll efect, custom height and bottom mask style 2 -->
        <style>
            .btn-fullcolor.btn-skewed:before {
                background: linear-gradient(to bottom, rgba(45, 24, 165, 0.75) 0%, rgb(113, 22, 124) 100%);
            }
        </style>
        <!-- Slideshow - CSS3 Panels element -->


       

        <!--/ Slideshow - CSS3 Panels element -->
        <br>


        @yield('content')






        <!-- Slideshow container -->

        <!-- Footer - Default Style -->


        @include('front.includes.footer')




        <a href="#Learn_more_panel" class="popup-with-form"><img src="{{ asset('assets') }}/images/message-button.png" class="ContentImg"
                style="position: fixed;bottom: 1px;right: 10px;width:60px;"></a> 
        <!--/ Footer - Default Style-->

    </div>
    <!-- /Page Wrapper -->


    <!-- Bubble-box with notification-box style -->
    <div class="bubble-box notification-box bg-purple" data-reveal-at="1200" data-hide-after="9000">
        <div class="bb--inner">
            <p>This is just a simple notice. Everything is in order and this is a <a href="#">simple link.</a></p>
        </div>
        <span class="bb--close"><i class="glyphicon glyphicon-remove"></i></span>
    </div>
    <!--  Bubble-box with notification-box style -->



    <!-- Login Panel content -->


    <div id="login_panel" class="mfp-hide loginbox-popup auth-popup">
        <div class="inner-container login-panel auth-popup-panel">
            <h3 class="m_title m_title_ext text-custom auth-popup-title tcolor">SIGN IN YOUR ACCOUNT TO HAVE ACCESS TO
                DIFFERENT FEATURES</h3>
            <p id="message3"></p>
            <form class="login_panel" name="login_form" method="post" action="">
                <div class="form-group kl-fancy-form">
                    <input type="text" id="lusername" name="lusername"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input" placeholder="eg: james_smith">
                    <label class="kl-font-alt kl-fancy-form-label">USERNAME</label>
                </div>
                <div class="form-group kl-fancy-form">
                    <input type="password" id="lpassword" name="lpassword"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input" placeholder="type password">
                    <label class="kl-font-alt kl-fancy-form-label">PASSWORD</label>
                </div>
                <label class="auth-popup-remember" for="kl-rememberme"><input type="checkbox" name="rememberme"
                        id="kl-rememberme" value="forever" class="auth-popup-remember-chb"> Remember Me </label>
                <input type="submit" id="submit" name="submit" class="btn zn_sub_button btn-block btn-fullcolor btn-md"
                    value="LOGIN NOW" onclick="insertData3()">
                <input type="hidden" value="login" class="" name="form_action"><input type="hidden" value="login"
                    class="" name="action" />
                <input type="hidden" value="#" class="" name="submit">
                <div class="links auth-popup-links">
                    <a href="#register_panel"
                        class="create_account auth-popup-createacc kl-login-box auth-popup-link">CREATE AN
                        ACCOUNT</a><span class="sep auth-popup-sep"></span><a href="#forgot_panel"
                        class="kl-login-box auth-popup-link">FORGOT YOUR PASSWORD?</a>
                </div>
            </form>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    </div>
    <div id="register_panel" class="mfp-hide loginbox-popup auth-popup">
        <div class="inner-container register-panel auth-popup-panel">
            <h3 class="m_title m_title_ext text-custom auth-popup-title">CREATE ACCOUNT</h3>
            <p id="message2"></p>
            <form class="register_panel" name="login_form" method="post" action="">
                <div class="form-group kl-fancy-form ">
                    <input type="text" id="Rusername" name="Rusername"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input"
                        placeholder="type desired username"><label
                        class="kl-font-alt kl-fancy-form-label">USERNAME</label>
                </div>
                <div class="form-group kl-fancy-form">
                    <input type="text" id="Reemail" name="Reemail"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input"
                        placeholder="your-email@website.com"><label
                        class="kl-font-alt kl-fancy-form-label">EMAIL</label>
                </div>
                <div class="form-group kl-fancy-form">
                    <input type="password" id="Rpass" name="Rpass"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input" placeholder="*****"><label
                        class="kl-font-alt kl-fancy-form-label">PASSWORD</label>
                </div>
                <div class="form-group kl-fancy-form">
                    <input type="password" id="Rrepass" name="Rrepass"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input" placeholder="*****"><label
                        class="kl-font-alt kl-fancy-form-label">CONFIRM PASSWORD</label>
                </div>
                <div class="form-group">
                    <input type="submit" id="submit2" name="submit"
                        class="btn zn_sub_button btn-block btn-fullcolor btn-md" value="CREATE MY ACCOUNT"
                        onclick="insertData2()">
                </div>
                <div class="links auth-popup-links">
                    <a href="#login_panel" class="kl-login-box auth-popup-link">ALREADY HAVE AN ACCOUNT?</a>
                </div>
            </form>
        </div>
    </div>



    <!--This code is for username validation-->





    <div id="forgot_panel" class="mfp-hide loginbox-popup auth-popup forgot-popup">
        <div class="inner-container forgot-panel auth-popup-panel">
            <h3 class="m_title m_title_ext text-custom auth-popup-title">FORGOT YOUR DETAILS?</h3>
            <p id="message3"></p>
            <form class="forgot_form" name="login_form" method="post" action="">
                <div class="form-group kl-fancy-form">
                    <input type="text" id="forgotemail" name="forgotemail"
                        class="form-control inputbox kl-fancy-form-input kl-fw-input" placeholder="...">
                    <label class="kl-font-alt kl-fancy-form-label">USERNAME OR EMAIL</label>
                </div>
                <div class="form-group">
                    <input type="submit" id="recover" name="submit"
                        class="btn btn-block zn_sub_button btn-fullcolor btn-md" value="SEND MY DETAILS!"
                        onclick="insertData4()">
                </div>
                <div class="links auth-popup-links">
                    <a href="#login_panel" class="kl-login-box auth-popup-link">AAH, WAIT, I REMEMBER NOW!</a>
                </div>
            </form>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    </div>
    <div id="Learn_more_panel" class="mfp-hide loginbox-popup auth-popup forgot-popup">
        <div class="inner-container login-panel auth-popup-panel">
            <h3 class="m_title m_title_ext text-custom auth-popup-title tcolor">Request Your Content or report about
                Content</h3>

            <form action="{{ route('email.send') }}" method="post">
            @csrf
            <div class="form-group">
               <label for="">Name</label>
               <input type="text" class="form-control" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="text" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
               <label for="">Subject</label>
               <input type="text" class="form-control" name="subject" placeholder="Enter subject">
            </div>
            <div class="form-group">
              <textarea name="message" cols="4" rows="4" class="form-control" placeholder="Message here...."></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-success">Send Email</button>
         </form>
            

            
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    </div>
    <!--/ Login Panel content -->


    <!-- ToTop trigger -->
    <a href="#" id="totop">TOP</a>
    <!--/ ToTop trigger -->




    <!-- JS FILES // These should be loaded in every page -->
    @include('front.includes.script')
    {{-- @include('frontEnd11.includes.script') --}}



</body>

</html>