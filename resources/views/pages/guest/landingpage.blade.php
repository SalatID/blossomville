@extends('index')
@section('content')
<div class="theme_section_info">
    <div class="featured_slider_image">
       <div id="owl-demo" class="owl-carousel owl-theme featuredimage_slider owl-loaded owl-drag">
          <div class="owl-stage-outer">
             <div class="owl-stage" style="transform: translate3d(-3710px, 0px, 0px); transition: all 0s ease 0s; width: 12985px;">
               @foreach ($banner as $item)
               <div class="owl-item" style="width: 1855px;">
                  <div class="item">
                     <div class="hentry-inner">
                        <div class="post-thumbnail">
                           <img src="{{$item->banner_src}}" alt="The Last of us">
                        </div>
                        <div class="entry-container">
                           <div class="featured_slider_disc entry-summary"></div>
                        </div>
                     </div>
                  </div>
               </div>
                   
               @endforeach
                {{-- <div class="owl-item" style="width: 1855px;">
                   <div class="item">
                      <div class="hentry-inner">
                         <div class="post-thumbnail">
                            <img src="/guest/assets/images/taman.jpeg" alt="The Last of us">
                         </div>
                         <div class="entry-container">
                            <div class="featured_slider_disc entry-summary"></div>
                         </div>
                      </div>
                   </div>
                </div> --}}
             </div>
          </div>
          <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button></div>
          <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
       </div>
    </div>
    <div class="featured-section_data">
       <div id="featured-section" class="featured-section section">
          <div class="card-container featured_content">
             <div class="card section-featured-wrep">
                <div class="side featured-thumbnail" data-href="/datawarga">
                   <div class="featured-icon"> 
                      <i class="fa fa-user"></i>
                   </div>
                   <div class="featured-title">
                      <header class="entry-header">
                         <h4>
                            DATA WARGA									
                         </h4>
                      </header>
                   </div>
                </div>
                {{-- <div class="side back featured-thumbnail" data-href="/datawarga">
                   <div class="featured-icon"> 
                      <i class="fa fa-user"></i>
                   </div>
                   <div class="featured-title">
                      <header class="entry-header">
                         <h4>
                            DATA WARGA								
                         </h4>
                      </header>
                      <div class="entry-content">
                      </div>
                   </div>
                </div> --}}
             </div>
             <div class="card section-featured-wrep">
                <div class="side featured-thumbnail" data-href="#our_portfolio_info">
                   <div class="featured-icon"> 
                      <i class="fa fa-play-circle"></i>
                   </div>
                   <div class="featured-title">
                      <header class="entry-header">
                         <h4>
                            KEGIATAN WARGA									
                         </h4>
                      </header>
                   </div>
                </div>
                {{-- <div class="side back featured-thumbnail" data-href="/">
                   <div class="featured-icon"> 
                      <i class="fa fa-play-circle"></i>
                   </div>
                   <div class="featured-title">
                      <header class="entry-header">
                         <h4>
                            KEGIATAN WARGA								
                         </h4>
                      </header>
                      <div class="entry-content">
                      </div>
                   </div>
                </div> --}}
             </div>
             <div class="card section-featured-wrep">
                <div class="side featured-thumbnail" data-href="#our_info">
                   <div class="featured-icon"> 
                      <i class="fa fa-info"></i>
                   </div>
                   <div class="featured-title">
                      <header class="entry-header">
                         <h4>
                            INFO WARGA									
                         </h4>
                      </header>
                   </div>
                </div>
                {{-- <div class="side back featured-thumbnail" data-href="/">
                   <div class="featured-icon"> 
                      <i class="fa fa-info"></i>
                   </div>
                   <div class="featured-title">
                      <header class="entry-header">
                         <h4>
                            INFO WARGA								
                         </h4>
                      </header>
                      <div class="entry-content">
                      </div>
                   </div>
                </div> --}}
             </div>
          </div>
       </div>
    </div>
    <div class="about_section_info p-3">
       <div class="about_data">
          <div class="about_main_title">
             <h1>About Us</h1>
          </div>
          <div class="about_main_discription">
             <p class="text-justify">Cluster Blossom Ville merupakan hunian yang dibangun PT Harpiah Unggul Pratama,  yang berada di kawasan Citra Raya di Panongan, Tangerang, tepatnya  di Jl. Citra Raya Boulevard. Sebagai perumahan terbesar di kawasan ini, Citra Raya menawarkan lokasi yang strategis, lingkungan nyaman dan asri, disertai fasilitas yang lengkap dengan lokasi mudah diakses dari Jakarta maupun Tangerang. Bagi pencari hunian yang berencana bertempat tinggal di Tangerang, Cluster Blossom Ville adalah pilihan yang menguntungkan untuk ditempati sekaligus investasi. 
             </p>
          </div>
          <div class="row">
             <div class="col-xl-7 d-flex justify-content-start">
                <img src="/guest/assets/images/17an-2.jpeg" alt="The Last of us">
             </div>
             <div class="col-xl-5">
               <p class="text-justify">
                  Cluster Blossom Ville  mengusung hunian dengan konsep modern minimalis yang menerapkan gerbang satu pintu dan sistem keamanan 24 jam. Lingkungan cluster nyaman dan tenang karena cukup jauh dari jalan raya. Jalan depan rumah bisa muat untuk dua kendaraan roda empat. Unit rumah yang tanpa pagar dengan taman mungilnya mampu memberi kesan lapang. Cluster juga memiliki area komersial berupa ruko yang menjual berbagai barang dan jasa, termasuk minimarket. 
                </p>
             </div>
          </div>
       </div>
    </div>
    @if (!$news->isEmpty())
    <div class="our_info" id="our_info">
       <div class="our_portfolio_data">
          <div class="our_portfolio_main_title">
             <h1>Info Warga</h1>
          </div>
          <div class="our_portfolio_main_disc">
             <p></p>
          </div>
          <div class="wrappers our_portfolio_section">
             @foreach ($news as $item)
             <div class=" col-xl-4 col-md-4 col-sm-6 m-2 " style="background: #eee" onclick="window.location.href='/news/detail/{{Crypt::encryptString($item->id)}}'">
               <img class="card-img-top" src="/{{$item->news_banner}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
               <div class="card-body">
                   <h3 class="card-title">{{$item->title}}</h3>
               </div>
           </div>
             @endforeach
          </div>
       </div>
    </div>
    @endif
    @if (!$activity->isEmpty())
    <div class="our_portfolio_info" id="our_portfolio_info">
       <div class="our_portfolio_data">
          <div class="our_portfolio_main_title">
             <h1>Kegiatan Warga</h1>
          </div>
          <div class="our_portfolio_main_disc">
             <p></p>
          </div>
          <div class="wrappers our_portfolio_section">
             @foreach ($activity as $item)
             <div class="parent our_portfolio_caption">
                <div class="child our_portfolio_image">
                   <div class="our_portfolio_container" >
                      <div>

                      </div>
                      <img src="{{$item->activity_img}}" alt="The Last of us" style="height: 20vh;width:30vh;object-fit:cover">
                      <div class="our_portfolio_title">
                         <h3>{{$item->title}}</h3>
                      </div>
                      <div class="our_portfolio_sub_heading">
                         <p>{{$item->activity_date}}</p>
                      </div>
                   </div>
                   <div class="our_portfolio_btn">
                      <a href="/aktifitas/{{Crypt::encryptString($item->id)}}" target="_blank"><i class="fa fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
             @endforeach
          </div>
       </div>
    </div>
    @endif
    <div class="our_team_section">
       <div class="our_team_info">
          <div class="our_team_main_title">
             <div class="our_team_tit">
                <h1>Pengurus RT/RW</h1>
             </div>
             <div class="our_team_main_disc">
                <p></p>
             </div>
          </div>
          <div class="row">
             @foreach ($rt as $item)
                 
             <div class="our_team_container d-flex justify-content-center">
                <div class="our_team_container_data">
                   <div class="our_team_thumb">
                      <img src="{{$item->rt_foto_src}}" alt="The Last of us">
                   </div>
                   <div class="our_team_img">
                      <img src="{{$item->rt_foto_src}}" alt="The Last of us">
                   </div>
                   <div class="our_team_title">
                      <h3>KETUA RT {{sprintf('%02d', $item->rt_no)}}</h3>
                   </div>
                   <div class="our_team_headline">
                      <p>{{$item->rt_name}}</p>
                   </div>
                   <div class="our_team_social_icon">
                      <a class="twitter our_social_icon" href="https://wa.me/{{$item->rt_whatsapp}}" target="_blank">
                      <i class="fa fa-whatsapp"></i>
                      </a>
                      {{-- <a class="facebook our_social_icon" href="https://www.facebook.com/" target="_blank">
                      <i class="fa fa-facebook"></i>
                      </a>
                      <a class="instagram our_social_icon" href="https://www.instagram.com/" target="_blank">
                      <i class="fa fa-instagram"></i>
                      </a>
                      <a class="linkedin our_social_icon" href="https://www.linkedin.com/feed/" target="_blank">
                      <i class="fa fa-linkedin"></i>
                      </a> --}}
                   </div>
                </div>
             </div>
             @endforeach
             <div class="our_team_container">
                <div class="our_team_container_data">
                   <div class="our_team_thumb">
                      <img src="/guest/assets/images/rt16.jpeg" alt="The Last of us">
                   </div>
                   <div class="our_team_img">
                      <img src="/guest/assets/images/rt16.jpeg" alt="The Last of us">
                   </div>
                   <div class="our_team_title">
                      <h3>KETUA RW 16</h3>
                   </div>
                   <div class="our_team_headline">
                      <p>AJI KUSNORO</p>
                   </div>
                   <div class="our_team_social_icon">
                      <a class="twitter our_social_icon" href="https://wa.me/6281389612344" target="_blank">
                      <i class="fa fa-whatsapp"></i>
                      </a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>@if (!$testimoni->isEmpty())
        
    <div class="our_testimonial_section">
       <div class="our_testimonial_info">
          <div class="our_testimonial_main_title">
             <div class="testimonial_title">
                <h1>Testimoni Warga</h1>
             </div>
             <div class="our_testimonial_main_disc">
                <p></p>
             </div>
          </div>
          <div class="owl-carousel owl-theme testinomial_owl_slider owl-loaded owl-drag" id="testinomial_owl_slider">
             <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(-1110px, 0px, 0px); transition: all 0s ease 0s; width: 3330px;">
                  @foreach ($testimoni as $item)
                  <div class="owl-item col-sm-12" >
                     <div class="our_testimonial_data">
                        <div class="testimonials_disc">
                           <div class="our_testimonials_container">
                              <p style="height: 10vh" class="text-justify font-italic">{{$item->summary}} ~ <strong>{{$item->getcreator->full_name}}</strong> </p>
                              <div class="testimonials_title">
                                 <h2>{{$item->title}}</h2>
                              </div>
                              {{-- <div class="testimonials_title">
                                 <h3>{{$item->getcreator->full_name}}</h3>
                              </div> --}}
                           </div>
                        </div>
                        <div class="testimonials_image bg-secondary rounded-circle">
                           <img src="/guest/assets/images/testimoni.png" alt="">								
                        </div>
                     </div>
                  </div>
                      
                  @endforeach
                </div>
             </div>
             <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
             <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
          </div>
       </div>
    </div>
    @endif
    @if(!$product->isEmpty())
    <div class="our_sponsors_section">
       <div class="our_sponsors_info">
          <div class="our_sponsors_data">
             <div class="our_sponsors_title">
                <h1>Usaha Warga</h1>
             </div>
          </div>
          <div class="our_sponsors_contain">
             @foreach ($product as $item)
             <div class="bg-white col-xl-4 col-md-4 col-sm-6 m-2">
               <img class="card-img-top" src="/{{$item->image}}" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
               <div class="card-body">
                   <h3 class="card-title">{{$item->product_name}}</h3>
                   <h5 class="card-title"><a href="/toko/detail/{{Crypt::encryptString($item->getstore->id)}}">Toko : {{$item->getstore->store_name}}</a> </h5>
                   <p class="card-text">Rp {{$item->price}}</p>
                   
               </div>
           </div>
             {{-- <div class="our_sponsors_img">
                <a href=""><img src="{{$item->image}}" alt="The Last of us"></a>
             </div> --}}
             @endforeach
             <div class="bg-white col-xl-3 col-md-4 col-sm-6" onclick="allproduct()">
               <img class="card-img-top" src="/guest/assets/images/products.png" style="height: 25vh; object-fit:cover;width:100%" alt="Card image cap">
               <div class="card-body">
                   <h3 class="card-title">Lihat Produk Lainnya</h3>
                   <h5><i class="fa fa-arrow-right"></i> </h5>
               </div>
           </div>
          </div>
       </div>
    </div>
    @endif
 </div>
 <script>
    function allproduct(){
       window.location.href = '/products'
    }
 </script>
@endsection