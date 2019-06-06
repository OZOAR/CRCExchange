<!--footer start-->
<footer class="app-footer dark-theme">
    <div class="primary-footer">
        <div class="container ">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center align-items-center d-md-block wow fadeInUp" data-wow-delay=".2s">
                    <img src="/images/footer-logo.png" class="app-footer__logo">
                    <!-- <a href="/images/AML_KYC_Policy EXRATE.pdf" target="_blank">@lang('homepage.footer.menu.policy')</a>   <a href="https://t.me/exrateby" target="_blank" class="social"><img src="/images/telegram-icon.svg"> </a> -->
                    <p class="copyright">@lang('homepage.footer.menu.address')</p>
                    <p class="copyright">&copy; 2018 exrate.net</p>
                </div>
                <div class="col-md-3 wow fadeInUp" data-wow-delay=".2s">
                    <h3>@lang('homepage.footer.menu.information')</h3>
                    <br>
                    <h4>
                    <a class=footer_link href="/images/terms_of_use.pdf" target="_blank">@lang('homepage.footer.menu.terms')</a>        </h4>
                    <h4>
                    <a class=footer_link href="/images/AML_KYC_Policy EXRATE.pdf" target="_blank">@lang('homepage.footer.menu.policy')</a>        </h4>

                </div>
                <div class="col-md-3 wow fadeInUp" data-wow-delay=".2s">
                    <h3>@lang('homepage.footer.menu.contacts')</h3>
                    <br>
                    <h4 class="f-icon">
                        <div class="icon">
                            <img src="/images/mail.svg" class="svg" alt="">
                        </div>
                        <a href="mailto:support@exrate.net" target="_blank">support@exrate.net</a></h4>
                    <h4 class="f-icon"> <div class="icon">
                            <img src="/images/telegram.svg" class="svg" alt="">
                        </div>
                        <a href="t.me/exrateby" target="_blank">t.me/exrateby</a></h4>
                </div>
                <div class="col-md-3 wow fadeInUp" data-wow-delay=".2s">
                    <h3>@lang('homepage.footer.menu.worktime')</h3>
                    <br>
                    <h4><b>@lang('homepage.footer.menu.exchange.title')</b> @lang('homepage.footer.menu.exchange.time')</h4>
                    <h4><b>@lang('homepage.footer.menu.support.title')</b> @lang('homepage.footer.menu.support.time')</h4>
                    {{--<h4 class="text-uppercase">&nbsp;</h4>--}}
                    
                </div>
                {{--<div class="col-md-4 mb-md-0 mb-3 wow fadeInUp" data-wow-delay=".3s">--}}
                    {{--<h6 class="text-uppercase">Resources</h6>--}}
                    {{--<ul class="list-unstyled">--}}
                        {{--<li><a href="javascript:;">Free schedules</a></li>--}}
                        {{--<li><a href="javascript:;">terms & privacy</a></li>--}}
                        {{--<li><a href="javascript:;">api reference</a></li>--}}
                        {{--<li><a href="javascript:;">help desk</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--<div class="col-md-4 wow fadeInUp" data-wow-delay=".4s">--}}
                    {{--<h6 class="text-uppercase">About & Contacts</h6>--}}
                    {{--<ul class="list-unstyled">--}}
                        {{--<li><a href="javascript:;">Our Vision</a></li>--}}
                        {{--<li><a href="javascript:;">Features</a></li>--}}
                        {{--<li><a href="javascript:;">About Us</a></li>--}}
                        {{--<li><a href="javascript:;">Contact Us</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="secondary-footer text-md-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 partners text-center">
                    <a href="https://www.bestchange.ru" target="_blank">
                        <img src="/images/bestchange-logo.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="secondary-footer text-md-left" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-md-0">
                    <div class="payment-cards wow fadeInUp" data-wow-delay=".45s">
                        </div>
                </div> -->
                <!-- <div class="col-md-6 text-md-right wow fadeInUp" data-wow-delay=".5s">
                    <div class="float-md-right  mb-md-0 mb-3">
                        <span class="sm-txt pr-2">Language:</span>
                        <div class="btn-group ">
                            <button type="button" class="btn-language dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                English
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">English</button>
                                <button class="dropdown-item" type="button">French</button>
                                <button class="dropdown-item" type="button">Chinese</button>
                            </div>
                        </div>
                    </div>

                    <div class="social-links float-md-right">
                        <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                        <a href="javascript:;"><i class="fa fa-bitcoin"></i></a>
                        <a href="javascript:;"><i class="fa fa-youtube"></i></a>
                        <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                        <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div> -->
            </div>
        </div>
        
</footer>
<!--footer end-->

<!-- <footer>
    <div class="container">
        <a href="/terms-of-use" class="footer-link">@lang('homepage.footer.menu.terms')</a>
        <a href="{{ route('page.policy') }}" class="footer-link">@lang('homepage.footer.menu.policy')</a>
        <a href="/faq" class="footer-link">@lang('homepage.footer.menu.faq')</a>

        <span id="footer-copy">&copy <script>document.write(new Date().getFullYear())</script> exrate.cc</span>
    </div>
</footer> -->



<!-- Begin Verbox {literal} -->
<script type='text/javascript'>
    (function(d, w, m) {
        window.supportAPIMethod = m;
        var s = d.createElement('script');
        s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
        s.async = true;
        var id = 'a62647952ae7bb8e74135029b0353fc5';
        s.src = '//admin.verbox.ru/support/support.js?h='+id;
        var sc = d.getElementsByTagName('script')[0];
        w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
        if (sc) sc.parentNode.insertBefore(s, sc);
        else d.documentElement.firstChild.appendChild(s);
    })(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox →

