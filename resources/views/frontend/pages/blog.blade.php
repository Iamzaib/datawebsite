@extends('layouts.frontendapp')

@section('content')
    <!--  tabs start-->
    <div class="ready_made_list_page">
        <div class="new_tabs_secndpage">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div>
                            <h1 class="text-uppercase">@if(isset($user_name))
                                    Blogs By {{$user_name}}
                                @elseif(isset($cat_name))
                                    Blogs in {{$cat_name}}
                                @elseif(isset($tag_name))
                                    Blogs by tag {{$tag_name}}
                                @else
                                  Blog Posts
                                @endif</h1>
                            <ul>
                                <li><a href="{{route('home')}}">Home</a> </li>
                                <li class="ml-5">
                                    @if(isset($user_name))
                                        Blogs By {{$user_name}}
                                    @elseif(isset($cat_name))
                                        Blogs in {{$cat_name}}
                                    @elseif(isset($tag_name))
                                        Blogs by tag {{$tag_name}}
                                    @else
                                        Blog Posts
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                        <div>
                            <p>Learn about the latest tricks in marketing from data experts on our blog. Uncover the secrets of finding the best business leads, gain insider knowledge, and become a marketing master!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="new_sections_job blogs_page">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    @foreach($blogPosts as $post)
                    <div class="boxes">
                        <div class="date_month">
                            <h1>@php echo date('d',strtotime($post->created_at)); @endphp</h1>
                            <p><span>@php echo strtoupper(date('M',strtotime($post->created_at))); @endphp</span></p>
                        </div>
                        <div class="date_month_new">
                            <h1><a href="{{route('singleblog',$post->slug)}}">{!! strtoupper($post->title)     !!}</a></h1>
                            <p>Written by <a href="{{route('blog_user',$post->post_by->id)}}"><span>{{$post->post_by->name}}</span></a> in
                                @foreach($post->categories as $key => $item)
                                    <a href="{{route('blog_category',$item->slug)}}"> <span>{{ $item->name }},</span></a>
                                @endforeach </p>
                            <p>{{$post->excerpt}}</p>
                            <button onclick="document.location='{{route('singleblog',$post->slug)}}'">READ MORE<i class="arrow right"></i></button>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="boxes mt-5">--}}
{{--                        <div class="date_month">--}}
{{--                            <h1>15</h1>--}}
{{--                            <p><span>DEC</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="date_month_new">--}}
{{--                            <h1><a href="">NEW FEATURE LAUNCHES ON BOOKYOURDATA - WEB TECHNOLOGIES</a></h1>--}}
{{--                            <p>Written by <span>Gary Taylor</span> in <span>Data</span> </p>--}}
{{--                            <p> This month we're launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>--}}
{{--                            <button onclick="document.location='job-levels.html'">READ MPRE<i class="arrow right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="boxes mt-5">--}}
{{--                        <div class="date_month">--}}
{{--                            <h1>12</h1>--}}
{{--                            <p><span>APR</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="date_month_new">--}}
{{--                            <h1><a href="">NEW FEATURE LAUNCHES ON BOOKYOURDATA - WEB TECHNOLOGIES</a></h1>--}}
{{--                            <p>Written by <span>Gary Taylor</span> in <span>Data</span> </p>--}}
{{--                            <p> This month we're launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>--}}
{{--                            <button onclick="document.location='job-levels.html'">READ MPRE<i class="arrow right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="boxes mt-5">--}}
{{--                        <div class="date_month">--}}
{{--                            <h1>21</h1>--}}
{{--                            <p><span>MAR</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="date_month_new">--}}
{{--                            <h1><a href="">NEW FEATURE LAUNCHES ON BOOKYOURDATA - WEB TECHNOLOGIES</a></h1>--}}
{{--                            <p>Written by <span>Gary Taylor</span> in <span>Data</span> </p>--}}
{{--                            <p> This month we're launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>--}}
{{--                            <button onclick="document.location='job-levels.html'">READ MPRE<i class="arrow right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="boxes mt-5">--}}
{{--                        <div class="date_month">--}}
{{--                            <h1>23</h1>--}}
{{--                            <p><span>FEB</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="date_month_new">--}}
{{--                            <h1><a href="">NEW FEATURE LAUNCHES ON BOOKYOURDATA - WEB TECHNOLOGIES</a></h1>--}}
{{--                            <p>Written by <span>Gary Taylor</span> in <span>Data</span> </p>--}}
{{--                            <p> This month we're launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>--}}
{{--                            <button onclick="document.location='job-levels.html'">READ MPRE<i class="arrow right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="boxes mt-5">--}}
{{--                        <div class="date_month">--}}
{{--                            <h1>01</h1>--}}
{{--                            <p><span>FEB</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="date_month_new">--}}
{{--                            <h1><a href="">NEW FEATURE LAUNCHES ON BOOKYOURDATA - WEB TECHNOLOGIES</a></h1>--}}
{{--                            <p>Written by <span>Gary Taylor</span> in <span>Data</span> </p>--}}
{{--                            <p> This month we're launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>--}}
{{--                            <button onclick="document.location='job-levels.html'">READ MPRE<i class="arrow right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="boxes mt-5">--}}
{{--                        <div class="date_month">--}}
{{--                            <h1>21</h1>--}}
{{--                            <p><span>MAR</span></p>--}}
{{--                        </div>--}}
{{--                        <div class="date_month_new">--}}
{{--                            <h1><a href="">NEW FEATURE LAUNCHES ON BOOKYOURDATA - WEB TECHNOLOGIES</a></h1>--}}
{{--                            <p>Written by <span>Gary Taylor</span> in <span>Data</span> </p>--}}
{{--                            <p> This month we're launching a new feature here at Bookyourdata around the Web Technologies your prospects are using!Now, you can sort based on systems in place and gain more insight into who your targe...</p>--}}
{{--                            <button onclick="document.location='job-levels.html'">READ MPRE<i class="arrow right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="boxes mt-5">
                        <div class="date_month_new">
                            {!! $blogPosts->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="boxes_right">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action"  disabled="disabled"><b>CATEGORIES</b></a>
                            @foreach($categories as $category)
                            <a href="{{route('blog_category',$category->slug)}}" class="list-group-item list-group-item-action">{{$category->name}}</a>
                            @endforeach
{{--                            <a href="#" class="list-group-item list-group-item-action">Marketing</a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">Lifestyle</a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">Sales Prospecting</a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">Email Marketing</a>--}}
                        </div>
                    </div>
                    <div class="boxes_right mt-5">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action"  disabled="disabled"><b>RECENT POSTS</b></a>
                            @foreach($recent_posts as $post)
                                <a href="{{route('singleblog',$post->slug)}}" class="list-group-item list-group-item-action text-capitalize">{{$post->title}}<i class="arrow right"></i></a>
                            @endforeach

{{--                            <a href="#" class="list-group-item list-group-item-action">Cold Emailing - The most effective m...<i class="arrow right"></i></a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">3 Essentials to targeting and prospec...<i class="arrow right"></i></a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">Need leads? 5 factors to consider wh...<i class="arrow right"></i></a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">4 sales prospecting tools to engage l...<i class="arrow right"></i></a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">5 ways to increase your return on ceo..<i class="arrow right"></i></a>--}}
                        </div>
                    </div>
{{--                    <div class="boxes_right mt-5">--}}
{{--                        <div class="list-group">--}}
{{--                            <a href="#" class="list-group-item list-group-item-action" disabled="disabled"><b>NEWSLETTER</b></a>--}}
{{--                            <a href="#" class="list-group-item list-group-item-action">Subscribe to our email newsletter for useful articles and valuable resources.</a>--}}
{{--                            <a class="list-group-item list-group-item-action" disabled="disabled"><input type="text" name="" placeholder="name@email.com" ><i class="arrow right" href="#" ></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <!--  tabs end-->
    <div></div>
    <div class="ready_to_bost">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="ready_made_list">
                        <h1>READY TO BOOST YOUR SALES LIKE YOUR COMPETITORS?
                            TRY OUR TOOL FOR FREE. </h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="bulid_list_btn">
                        <button type="button" class="btn">Build A List<span>&#8594;</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
