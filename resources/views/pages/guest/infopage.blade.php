@extends('index')
@section('content')
 <div class="goldly_container_data">
    <div class="goldly_container_info right_sidebar grid_view content_boxed">
       <main id="primary" class="site-main">
          <article id="post-2" class="post-2 page type-page status-publish hentry">
             <header class="entry-header">
                <h1 class="entry-title">{{$title}}</h1>
             </header>
             <!-- .entry-header -->
             <div class="entry-content">
                @if ($page)
                     @yield('infocontent')
                @else
                @endif
             </div>
             <!-- .entry-content -->
          </article>
          <!-- #post-2 -->
       </main>
       <!-- #main -->
       <aside id="secondary" class="widget-area">
          <section id="block-2" class="widget widget_block widget_search">
             <form role="search" method="get" action="http://localhost/wordpresstest/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
                <label for="wp-block-search__input-1" class="wp-block-search__label">Cari</label>
                <div class="wp-block-search__inside-wrapper"><input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="" required=""><button type="submit" class="wp-block-search__button ">Cari</button></div>
             </form>
          </section>
          <section id="block-3" class="widget widget_block">
             <div class="wp-block-group">
                <div class="wp-block-group__inner-container">
                   <h2>Pos-pos Terbaru</h2>
                   <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                      <li><a href="http://localhost/wordpresstest/index.php/2022/01/12/halo-dunia/">Halo dunia!</a></li>
                   </ul>
                </div>
             </div>
          </section>
          <section id="block-4" class="widget widget_block">
             <div class="wp-block-group">
                <div class="wp-block-group__inner-container">
                   <h2>Komentar Terbaru</h2>
                   <ol class="wp-block-latest-comments">
                      <li class="wp-block-latest-comments__comment">
                         <article>
                            <footer class="wp-block-latest-comments__comment-meta"><a class="wp-block-latest-comments__comment-author" href="https://wordpress.org/">Seorang Komentator WordPress</a> mengenai <a class="wp-block-latest-comments__comment-link" href="http://localhost/wordpresstest/index.php/2022/01/12/halo-dunia/#comment-1">Halo dunia!</a></footer>
                         </article>
                      </li>
                   </ol>
                </div>
             </div>
          </section>
       </aside>
       <!-- #secondary -->
    </div>
 </div>
@endsection