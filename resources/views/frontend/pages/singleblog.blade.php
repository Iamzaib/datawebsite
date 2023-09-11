@extends('layouts.frontendapp')

@section('content')
    <!--  tabs start-->
    <div class="ready_made_list_page">
        <div class="new_tabs_secndpage">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div>
                            <h1>{{ $blog->title }}</h1>
                            <ul>
                                <li><a href="{{route('home')}}">Home ></a> </li>
                                <li class="ml-5"><a href="{{route('blogs.index')}}">Blog ></a> </li>
                                @foreach($blog->categories as $key => $item)
                                    <li class="ml-5"><a href="{{route('blog_category',$item->slug)}}">{{ $item->name }}, </a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!--
                    <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                        <div>
                            <p>Learn about the latest tricks in marketing from data experts on our blog. Uncover the secrets of finding the best business leads, gain insider knowledge, and become a marketing master!</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="new_sections_job data_page">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="boxes">
                        <div class="data_page_left">
                            <p>Written by <a href="{{route('blog_user',$blog->post_by->id)}}"><span>{{$blog->post_by->name}}</span></a> in
                                @foreach($blog->categories as $key => $item)
                                    <a href="{{route('blog_category',$item->slug)}}"> <span>{{ $item->name }},</span></a>
                                @endforeach at {{date('d.m.Y',strtotime($blog->created_at))}}</p>
                            <div id="description">
                                {!! $blog->page_text !!}
                            </div>
{{--                            <div><div class="post-share clearfix gap-bottom-medium">--}}
{{--<span class="fa fa-facebook" displaytext="Facebook" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton"><span>&nbsp;</span><span class="stArrow"><span class="stButton_gradient stHBubble" style="display: inline-block;"><span class="stBubble_hcount">0</span></span></span></span></span></span>--}}
{{--<span class="fa fa-twitter" displaytext="Tweet" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton"><span>&nbsp;</span><span class="stArrow"><span class="stButton_gradient stHBubble" style="display: inline-block;"><span class="stBubble_hcount">0</span></span></span></span></span></span>--}}
{{--<button class="post-back-to-top" type="button"><i class="icon icon-keyboard-arrow-up post-back-to-top__icon"></i> Back To Top</button>--}}
{{--</div></div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
{{--                    <div class="boxes_right mb-4">--}}
{{--                        <div class="list-group">--}}
{{--                            <a class="list-group-item list-group-item-action" disabled="disabled"><b>SHARE THIS</b></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
                </div>
            </div>
        </div>
    </div>
    <!--  tabs end-->
    <div></div>
@endsection
