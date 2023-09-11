<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@if(isset($meta_title)) {{$meta_title}} - @endif{{ trans('panel.site_title') }}</title>
@if(isset($meta_desc))
<meta name="description" content="{{$meta_desc}}">
@endif
    @if(isset($meta_keywords))
<meta name="keywords" content="{{$meta_keywords}}">
@endif


   {{--
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
--}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/media.css') }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="{{ asset('css/script.js') }}"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@yield('styles')
</head>
<body>
<div class="container pt-2 navbar_for_desktop">
  <div class="row">
    <div class="col-lg-1 col-md-1 col-sm-4 col-4">
      <div class="main_logo"> <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt=""> </a></div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-6 col-4">
      <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
          <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link disabled" href="#">Build A List</a> </li>
            <li class="nav-item dropdown"><a class="nav-link" href="#" id="navbarDropdown" role="button"
                                             data-toggle="dropdown" aria-haspopup="true"
                                             aria-expanded="false"> Ready-Made Lists </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @php @endphp
                @foreach($headerLinks['list_categoires'] as $list_category)
                  <a class="dropdown-item" href="{{route('lists_by_cat',[$list_category->slug])}}">{{$list_category->listCategory_title}}</a>
              @endforeach
              {{--                                <a class="dropdown-item" href="#">Job Titles</a>--}}
              {{--                                <div class="dropdown-divider"></div>--}}
              {{--                                <a class="dropdown-item" href="#">Pricing 3</a></div>--}}
            </li>
            @foreach($headerLinks['page_categories'] as $page_category)
              @if($headerLinks['page_categories_pages_count'][$page_category->id]>0 )
                @if($headerLinks['page_categories_pages_count'][$page_category->id]==1 )
                  <li class="nav-item"> <a class="nav-link disabled" href="{{route('pages',[$headerLinks['page_categories_pages'][$page_category->id][0]->slug])}}">{{$page_category->name}}</a> </li>
                @elseif($headerLinks['page_categories_pages_count'][$page_category->id]>1)
                  <li class="nav-item dropdown"><a class="nav-link" href="#" id="navbarDropdown" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">{{$page_category->name}}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @php @endphp
                      @foreach($headerLinks['page_categories_pages'][$page_category->id] as $cat_pages)
                        <a class="dropdown-item" href="{{route('pages',[$cat_pages->slug])}}">{{$cat_pages->title}}</a>
                    @endforeach
                    {{--                                <a class="dropdown-item" href="#">Job Titles</a>--}}
                    {{--                                <div class="dropdown-divider"></div>--}}
                    {{--                                <a class="dropdown-item" href="#">Pricing 3</a></div>--}}
                  </li>
                @endif
              @endif


            @endforeach
            <li class="nav-item"> <a class="nav-link disabled" href="{{route('blogs.index')}}">Blog</a> </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </nav>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-4">
      <div class="menu-nav">
        <div class="dropdown-container" tabindex="-1">
          <div class="nav-item dropdown"> <a class="nav-link  three-dots" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">About</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container pt-2 navbar_for_mobile">
  <div class="row">
    <div class="col-lg-10 col-md-10 col-sm-6 col-4">
      <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link disabled" href="#">Build A List</a> </li>
            <li class="nav-item dropdown"><a class="nav-link" href="#" id="navbarDropdown" role="button"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false"> Ready-Made Lists </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @php @endphp
                @foreach($headerLinks['list_categoires'] as $list_category)
                  <a class="dropdown-item" href="{{route('lists_by_cat',[$list_category->slug])}}">{{$list_category->listCategory_title}}</a>
                @endforeach
               </div>  </li>
            @foreach($headerLinks['page_categories'] as $page_category)
              @if($headerLinks['page_categories_pages_count'][$page_category->id]>0 )
                @if($headerLinks['page_categories_pages_count'][$page_category->id]==1 )
                  <li class="nav-item"> <a class="nav-link disabled" href="{{route('pages',[$headerLinks['page_categories_pages'][$page_category->id][0]->slug])}}">{{$page_category->name}}</a> </li>
                @elseif($headerLinks['page_categories_pages_count'][$page_category->id]>1)
                  <li class="nav-item dropdown"><a class="nav-link" href="#" id="navbarDropdown" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">{{$page_category->name}}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @php @endphp
                      @foreach($headerLinks['page_categories_pages'][$page_category->id] as $cat_pages)
                        <a class="dropdown-item" href="{{route('pages',[$cat_pages->slug])}}">{{$cat_pages->title}}</a>
                    @endforeach
                    {{--                                <a class="dropdown-item" href="#">Job Titles</a>--}}
                    {{--                                <div class="dropdown-divider"></div>--}}
                    {{--                                <a class="dropdown-item" href="#">Pricing 3</a></div>--}}
                  </li>
                @endif
              @endif


            @endforeach
            <li class="nav-item"> <a class="nav-link disabled" href="{{route('blogs.index')}}">Blog</a> </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </nav>
    </div>
	  <div class="col-lg-1 col-md-1 col-sm-4 col-4">
      <div class="main_logo"> <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt=""> </a></div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-4">
      <div class="menu-nav">
        <div class="dropdown-container" tabindex="-1">
          <div class="nav-item dropdown"> <a class="nav-link  three-dots" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">About</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@yield("content") 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
@yield('scripts')
</body>
