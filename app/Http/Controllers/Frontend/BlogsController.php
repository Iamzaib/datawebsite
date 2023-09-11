<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BlogsController extends Controller
{
    use MediaUploadingTrait;
    private const PAGINATE=10;
    public $all_categories,$all_tags,$recent_posts;

    public function __construct()
    {
        $this->all_categories = BlogCategory::all();
        $this->all_tags=BlogTag::all();
        $this->recent_posts=BlogPost::with(['categories', 'tags', 'media'])->orderBy('id','desc')->take(6)->get();
    }

    public function index()
    {
        //abort_if(Gate::denies('blog_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPosts = BlogPost::with(['categories', 'tags', 'media'])->orderBy('id','desc')->paginate(self::PAGINATE);
        $meta_title="Blog Posts";
        $meta_keywords='blog, blog by pickyourdata';
        $meta_desc='Blog posts from PickYourData';
        $categories=$this->all_categories;
        $tags=$this->all_tags;
        $recent_posts=$this->recent_posts;
        return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','categories','tags','recent_posts'));
    }
    public function category_list($slug)
    {
        $cat=BlogCategory::where('slug', $slug)->first();
        abort_if(!isset($cat), Response::HTTP_NOT_FOUND, '404 Blog Post Not Found');
        $blogPosts = BlogPost::with(['categories', 'tags', 'media'])->whereHas('categories', function($q) use ($slug){
            $q->where('slug', $slug);
        })->orderBy('id','desc')->paginate(self::PAGINATE);
        $meta_title=$cat->name." Blog Posts";
        $meta_keywords=$cat->name.', blogs, blog by pickyourdata';
        $meta_desc=$cat->name.' Blog posts from PickYourData';
        $cat_name=$cat->name;
        $categories=$this->all_categories;
        $tags=$this->all_tags;
        $recent_posts=$this->recent_posts;
       //return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','categories','tags'));
        return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','cat_name','categories','tags','recent_posts'));
    }
    public function tag_list($slug)
    {
        $tag=BlogTag::where('slug', $slug)->first();
        abort_if(!isset($tag), Response::HTTP_NOT_FOUND, '404 Blog Post Not Found');
        $blogPosts = BlogPost::with(['categories', 'tags', 'media'])->whereHas('tags', function($q) use ($slug){
            $q->where('slug', $slug);
        })->orderBy('id','desc')->paginate(self::PAGINATE);
        $meta_title=$tag->name." Blog Posts";
        $meta_keywords=$tag->name.', blogs, blog by pickyourdata';
        $meta_desc=$tag->name.' Blog posts from PickYourData';
        $tag_name=$tag->name;
        $categories=$this->all_categories;
        $tags=$this->all_tags;
        $recent_posts=$this->recent_posts;
//        return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','categories','tags'));
        return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','tag_name','categories','tags','recent_posts'));
    }
    public function user_list($id)
    {
        $user=User::find($id);
        abort_if(!isset($user), Response::HTTP_NOT_FOUND, '404 Blog Post Not Found');
        $blogPosts = BlogPost::with(['categories', 'tags', 'media'])->where('user_id',$id)->orderBy('id','desc')->paginate(self::PAGINATE);
        $meta_title=$user->name." Blog Posts";
        $meta_keywords=$user->name.' blogs, blogs, blog by pickyourdata';
        $meta_desc=$user->name.' Blog posts from PickYourData';
        $user_name=$user->name;
        $categories=$this->all_categories;
        $tags=$this->all_tags;
        $recent_posts=$this->recent_posts;
//        return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','categories','tags'));
        return view('frontend.pages.blog', compact('blogPosts','meta_title','meta_desc','meta_keywords','user_name','categories','tags','recent_posts'));
    }
    public function get_tag_cat($type){

    }
    public function create()
    {
        abort_if(Gate::denies('blog_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = BlogCategory::pluck('name', 'id');

        $tags = BlogTag::pluck('name', 'id');

        return view('admin.blogPosts.create', compact('categories', 'tags'));
    }

    public function store(StoreBlogPostRequest $request)
    {
        $blogPost = BlogPost::create($request->all());
        $blogPost->categories()->sync($request->input('categories', []));
        $blogPost->tags()->sync($request->input('tags', []));
        if ($request->input('featured_image', false)) {
            $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $blogPost->id]);
        }

        return redirect()->route('admin.blog-posts.index');
    }

    public function edit(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = BlogCategory::pluck('name', 'id');

        $tags = BlogTag::pluck('name', 'id');

        $blogPost->load('categories', 'tags');

        return view('admin.blogPosts.edit', compact('categories', 'blogPost', 'tags'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {
        $blogPost->update($request->all());
        $blogPost->categories()->sync($request->input('categories', []));
        $blogPost->tags()->sync($request->input('tags', []));
        if ($request->input('featured_image', false)) {
            if (!$blogPost->featured_image || $request->input('featured_image') !== $blogPost->featured_image->file_name) {
                if ($blogPost->featured_image) {
                    $blogPost->featured_image->delete();
                }
                $blogPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($blogPost->featured_image) {
            $blogPost->featured_image->delete();
        }

        return redirect()->route('admin.blog-posts.index');
    }

    public function show(BlogPost $blog)
    {
        $blog->load('categories', 'tags');
        $data['meta_title']=$meta_title=$blog->meta_title!=''?$blog->meta_title:$blog->title;
        $data['meta_keywords']=$meta_keywords=$blog->meta_keywords??',blogs, blog by pickyourdata';
        $data['meta_desc']=$meta_desc=$blog->meta_description!=''?$blog->meta_description:$blog->excerpt;
        $data['categories']=$categories=$this->all_categories;
        $data['tags']=$tags=$this->all_tags;
        $data['blog']=$blog;
        $data['recent_posts']=$this->recent_posts;
        return view('frontend.pages.singleblog',$data);
    }
    public function view($slug)
    {
        $blog=BlogPost::where('slug','=',$slug)->first();
        abort_if(!isset($blog), Response::HTTP_NOT_FOUND, '404 Blog Post Not Found');
        $blog->load('categories', 'tags');
        $data['meta_title']=$meta_title=$blog->meta_title!=''?$blog->meta_title:$blog->title;
        $data['meta_keywords']=$meta_keywords=$blog->meta_keywords??',blogs, blog by pickyourdata';
        $data['meta_desc']=$meta_desc=$blog->meta_description!=''?$blog->meta_description:$blog->excerpt;
        $data['categories']=$categories=$this->all_categories;
        $data['tags']=$tags=$this->all_tags;
        $data['blog']=$blog;
        $data['recent_posts']=$this->recent_posts;
        return view('frontend.pages.singleblog',$data);
    }

    public function destroy(BlogPost $blogPost)
    {
        abort_if(Gate::denies('blog_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogPostRequest $request)
    {
        abort_if(Gate::denies('blog_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        BlogPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('blog_post_create') && Gate::denies('blog_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BlogPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
