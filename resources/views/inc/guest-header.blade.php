<header id="masthead" class="site-header ">
    <div class="top_bar_info">
       <div class="container-fluid d-flex justify-content-between p-2">
          <div class="container row">
             <div class="contact_data col-xl-6 col-sm-12">
                <div class="contact_icon">
                   <i class="fa fa-phone"></i>
                </div>
                <div class="contact_info">
                   <p>Security<a href="http://wa.me/6282113118003" target="_blank">+62821-1311-8003</a></p>
                </div>
             </div>
             <div class="email_data col-xl-6 col-sm-12">
                <div class="email_icon">
                   <i class="fa fa-envelope"></i>
                </div>
                <div class="email_info">
                   <p><a href="mailto:humas@blossomvillecitraraya.com">humas@blossomvillecitraraya.com</a> </p>
                </div>
             </div>
          </div>
          <div class="header_social_icon">
             <div class="socials_icons">
                @if (($siteSetting->site_twitter_on??'')=='Y')
                <a class="twitter social_icon" href="{{$siteSetting->site_twitter}}" target="_blank">
                <i class="fa fa-twitter"></i>
                </a>
                @endif
                @if (($siteSetting->site_email_on??'')=='Y')
                <a class="facebook social_icon" href="{{$siteSetting->site_email}}" target="_blank">
                <i class="fa fa-envelope"></i>
                </a>
                @endif
                @if (($siteSetting->site_instagram_on??'')=='Y')
                <a class="instagram social_icon" href="{{$siteSetting->site_instagram}}" target="_blank">
                <i class="fa fa-instagram"></i>
                </a>
                    
                @endif
                @if (($siteSetting->site_whatsapp_on??'')=='Y')
                <a class="linkedin social_icon" href="https://wa.me/{{$siteSetting->site_whatsapp}}" target="_blank">
                <i class="fa fa-whatsapp"></i>
                </a>
                    
                @endif
             </div>
             {{-- <div class="goldly_menu_btn">
                <a class="call_menu_btn" href="#">Get A Quote</a>
             </div> --}}
          </div>
       </div>
    </div>
    <div class="main_site_header">
       <div class="header_info">
          <div class="header_data">
             <div class="site-branding p-3">
                <div class="header_logo d-flex justify-content-start">
                  <img src="/{{$siteSetting->site_icon??''}}" style="width: 8vw;height: 3vw;margin-top: 4%;" class="img-fluid" id="siteIcon" alt="">
                  <div>
                     <h1 class="site-title"><a href="/" rel="home"> {{$siteSetting->site_title??''}}</a></h1>
                     <p class="site-description">{{$siteSetting->site_description??''}}</p>

                  </div>
                </div>
             </div>
             <!-- .site-branding -->
          </div>
          <div class="menu_call_button">
             <div class="call_button_info">
                <nav id="site-navigation" class="main-navigation">
                   <button class="menu-toggle" id="navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
                      <i class="fa fa-bars"></i>
                      <!-- <i class="fa fa-close"></i> -->
                   </button>
                   <div id="primary-menu" class="menu nav-menu">
                      <ul>
                         <li class="page_item page-item-2"><a href="/">Home</a></li>
                         {{-- <li class="page_item page-item-2"><a href="/">Layanan Warga</a></li> --}}
                         {{-- <li class="page_item page-item-2"><a href="/">Info Warga</a></li> --}}
                         <li class="page_item page-item-2"><a href="/auth/login">Login</a></li>
                         {{-- 
                         <li class="page_item page-item-2"><a href="http://localhost/wordpresstest/index.php/laman-contoh/">Laman Contoh</a></li>
                         --}}
                      </ul>
                   </div>
                </nav>
                <!-- #site-navigation -->
                
                <div class="mobile_menu main-navigation" id="mobile_primary">
                   <div id="primary-menu" class="menu">
                     <ul>
                        <li class="page_item page-item-2"><a href="/">Home</a></li>
                        {{-- <li class="page_item page-item-2"><a href="/">Layanan Warga</a></li> --}}
                        {{-- <li class="page_item page-item-2"><a href="/">Info Warga</a></li> --}}
                        <li class="page_item page-item-2"><a href="/auth/login">Login</a></li>
                        {{-- 
                        <li class="page_item page-item-2"><a href="http://localhost/wordpresstest/index.php/laman-contoh/">Laman Contoh</a></li>
                        --}}
                     </ul>
                   </div>
                   <div class="header_social_icon">
                     <div class="socials_icons">
                        @if (($siteSetting->site_twitter_on??'')=='Y')
                        <a class="twitter social_icon" href="{{$siteSetting->site_twitter}}" target="_blank">
                        <i class="fa fa-twitter"></i>
                        </a>
                        @endif
                        @if (($siteSetting->site_email_on??'')=='Y')
                        <a class="facebook social_icon" href="{{$siteSetting->site_email}}" target="_blank">
                        <i class="fa fa-envelope"></i>
                        </a>
                        @endif
                        @if (($siteSetting->site_instagram_on??'')=='Y')
                        <a class="instagram social_icon" href="{{$siteSetting->site_instagram}}" target="_blank">
                        <i class="fa fa-instagram"></i>
                        </a>
                            
                        @endif
                        @if (($siteSetting->site_whatsapp_on??'')=='Y')
                        <a class="linkedin social_icon" href="https://wa.me/{{$siteSetting->site_whatsapp}}" target="_blank">
                        <i class="fa fa-whatsapp"></i>
                        </a>
                            
                        @endif
                     </div>
                     {{-- <div class="goldly_menu_btn">
                        <a class="call_menu_btn" href="#">Get A Quote</a>
                     </div> --}}
                  </div>
                   <button class="menu-toggle" id="mobilepop" aria-expanded="false">
                   <i class="fa fa-close"></i>
                   </button>				
                </div>
               
                {{-- 
                <div class="cart_search_icon">
                   <div id="cl_serch" class="cl_serch">
                      <a href="#" id="searchlink" class="cl_res_serch_icon searchlink">	
                      <i id="serches" class="fa fa-search fa-lg serches" aria-hidden="true"></i>
                      </a>								
                      <div class="searchform">
                         <form id="search" class="serching" action="">
                            <input type="text" class="s" id="s" name="s" placeholder="keywords...">
                            <button type="submit" class="sbtn"><i class="fa fa-search"></i></button>
                         </form>
                      </div>
                   </div>
                </div>
                --}}
             </div>
          </div>
       </div>
    </div>
 </header>