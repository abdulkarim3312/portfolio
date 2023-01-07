<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AddBlogCategory()
    {
        return view('admin.blog_category.add');
    }

    public function AllBlogCategory()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.all', compact('blogCategory'));
    }

    public function StoreBlogCategory(Request $request) 
    {
        $request -> validate([
            'blog_category' => 'required',
        ],[
            'blog_category.required' => 'Blog Category Name is Required',
        ]);

            BlogCategory::insert([
                'blog_category'        => $request->blog_category,  
            ]);
            $notification = array(
                'message' => 'Blog Category Inserted  Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('blog.all.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit', compact('blogCategory'));
    }

    public function updateBlogCategory(Request $request, $id)
    {
        BlogCategory::findOrFail($id)->update([
            'blog_category'        => $request->blog_category,  
        ]);
        $notification = array(
            'message' => 'Blog Category Updated  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.all.category')->with($notification);
    }

    public function deleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
