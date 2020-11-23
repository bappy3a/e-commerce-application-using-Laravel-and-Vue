@extends('layouts.app')


@section('content')
    <div class="header">
        
        <header-components></header-components>

    </div>
    <div class="clearfix"></div>


    <router-view></router-view>
    <vue-snotify></vue-snotify>
    <vue-progress-bar></vue-progress-bar>

    
    <footer class="dark-footer skin-dark-footer style-2">
        <div class="before-footer">
            <div class="container">
                <div class="row">
            
                    <div class="col-lg-4 col-md-4">
                        <div class="single_facts">
                            <div class="facts_icon">
                                <i class="ti-shopping-cart"></i>
                            </div>
                            <div class="facts_caption">
                                <h4>Free Home Delivery</h4>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4">
                        <div class="single_facts">
                            <div class="facts_icon">
                                <i class="ti-money"></i>
                            </div>
                            <div class="facts_caption">
                                <h4>Money Back Guarantee</h4>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4">
                        <div class="single_facts last">
                            <div class="facts_icon">
                                <i class="ti-headphone-alt"></i>
                            </div>
                            <div class="facts_caption">
                                <h4>24x7 Online Support</h4>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-4">
                        <div class="footer_widget">
                            <h4 class="extream">Contact us</h4>
                            <p>Let's here all about it! <a href="#" class="theme-cl">Get it touch</a></p>
                            
                            <div class="address_infos">
                                <ul>
                                    <li><i class="ti-home theme-cl"></i>#F#A-2,H#28, R#9, B#B Section#13,
                                        <br> Mirpur, Dhaka,Bangladesh</li>
                                    <li><i class="ti-headphone-alt theme-cl"></i>+880 1721209595</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                            
                    <div class="col-lg-2 col-md-2">
                        <div class="footer_widget">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Organic</a></li>
                                <li><a href="#">Grocery</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Furniture</a></li>
                            </ul>
                        </div>
                    </div>
                            
                    <div class="col-lg-2 col-md-2">
                        <div class="footer_widget">
                            <h4 class="widget_title">Our Company</h4>
                            <ul class="footer-menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">My company</a></li>
                                <li><a href="#">Our Studio</a></li>
                                <li><a href="#">Nightlife</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-2">
                        <div class="footer_widget">
                            <h4 class="widget_title">Latest News</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Offers & Deals</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">My Products</a></li>
                                <li><a href="#">Favorites</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-2">
                        <div class="footer_widget">
                            <h4 class="widget_title">Customer Support</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Conditions</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-lg-6 col-md-8">
                        <p class="mb-0">©Copyright {{ date('Y') }} Bringo Shop. Designd By <a href="https://fb.com/bappy3a">Ahmed Bappy</a>.</p>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 text-right">
                        <ul class="footer_social_links">
                            <li><a href="https://www.facebook.com/bappy3a/"><i class="ti-facebook"></i></a></li>
                            <li><a href="https://twitter.com/bappy3a"><i class="ti-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/bappy3a/"><i class="ti-instagram"></i></a></li>
                            <li><a href="https://github.com/bappy3a"><i class="ti-github"></i></a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    
    <!-- cart -->
    <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <cart-components></cart-components>
    </div>
    <!-- cart -->




@endsection