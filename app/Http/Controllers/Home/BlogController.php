<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function AddBlog()
    {
        $blogCategories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.index', compact('blogCategories'));
    }

    public function StoreBlog(Request $request)
    {
        $request -> validate([
            'blog_title' => 'required', 
        ],[
            'portfolio_name.required' => 'Blog Name is Required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(430,327)->save('upload/blog_image/'.$name_gen);
        $save_url = 'upload/blog_image/'.$name_gen;


        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title'       => $request->blog_title,
            'blog_tags'        => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image'       => $save_url,
            'created_at'       => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Blog Inserted  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.all')->with($notification);
    }
    public function AllBlog()
    {
        $blogs = Blog::with('category')->get();
        // $blog = BlogCategory::all();
        // foreach($blogs as $blog)
        // {
        //     dd($blog->category->blog_category);
        // }
        return view('admin.blog.manage', [
            'blogs' => $blogs,
            
        ]);
    }

    public function EditBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blogCategories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.edit_blog', compact('blog', 'blogCategories'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
        if($request->file('blog_image'))
        {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog_image/'.$name_gen);
            $save_url = 'upload/blog_image/'.$name_gen;

            

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title'       => $request->blog_title,
                'blog_tags'        => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image'       => $save_url,
                
            ]);
            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('blog.all')->with($notification);
        }
        else
        {
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title'       => $request->blog_title,
                'blog_tags'        => $request->blog_tags,
                'blog_description' => $request->blog_description,
                
            ]);
            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('blog.all')->with($notification);
        } // End Else
    }

    public function DeleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img);
        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogDetails($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogCategories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogs = Blog::findOrFail($id);
        return view('frontend.blog.details', compact('blogs', 'allblogs', 'blogCategories'));
    }

    public function CategoryBlog($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogCategories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogPost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $categoryName = BlogCategory::findOrFail($id);
        return view('frontend.blog.category_details', compact('blogPost', 'allblogs', 'blogCategories', 'categoryName'));
    }

    public function HomeBlog()
    {
        $allblogs = Blog::latest()->get();
        $blogCategories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog.home', compact('allblogs', 'blogCategories'));
    }
}
