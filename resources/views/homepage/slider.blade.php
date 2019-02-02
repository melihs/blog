<div class="trending-post-area">
        <div class="container-fluid">
            <div class="row">
                <div class="trend-post-list zm-posts owl-active-1 clearfix">
                    <!-- Start single trend post -->
                    @foreach($sliders as $slider)
                        <div class="col-2">
                            <article class="zm-trending-post zm-lay-a zm-single-post" data-dark-overlay="2.5"  data-scrim-bottom="9" data-effict-zoom="3">
                            <div class="zm-post-thumb">
                                <img src="/{{ $slider->image }}" alt="img" height="300" width="200">
                            </div>
                            <div class="zm-post-dis text-white">
                                <div class="zm-category"><a href="/kategori/{{ $slider->category->id }}/{{ $slider->category->slug }}" class="bg-cat-3 cat-btn">{{ $slider->category->title }}</a></div>
                                <h2 class="zm-post-title"><a href="/yazi/{{ $slider->id }}/{{ $slider->slug }}">{{ $slider->title }}</a></h2>
                                <div class="zm-post-meta">
                                    <ul>
                                        <li class="s-meta zm-author">{{ $slider->user->name }}</li>
                                        <li class="s-meta zm-date">{{ date_format($slider->created_at ,'d m Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                        </div>
                    @endforeach
                    <!-- End single trend post -->
                </div>
            </div>
        </div>
    </div>
