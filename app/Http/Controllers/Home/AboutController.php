<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Multi_image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
    }

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        if($request->file('about_image'))
        {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(523,605)->save('upload/about_image/'.$name_gen);
            $save_url = 'upload/about_image/'.$name_gen;


            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }
        else
        {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                
            ]);
            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        } // End Else
    } // End method

    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about.about_page', compact('aboutpage'));
    }

    public function MultiImage()
    {
        return view('admin.about_page.multi_image');
    }

    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('multi_image');

        foreach($image as $multi_image)
        {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(220,220)->save('upload/multi_image/'.$name_gen);
            $save_url = 'upload/multi_image/'.$name_gen;

            Multi_image::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);

        } // End of the foreach loop
            $notification = array(
                'message' => 'Multi Image Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.multi_image')->with($notification);     
    }

    public function allMultiImage()
    {
        $allMultiImage = Multi_image::all();
        return view('admin.about_page.all_image', compact('allMultiImage'));
    }

    public function EditMultiImage($id)
    {
        $multiImage = Multi_image::findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function UpdateMultiImage(Request $request)
    {
        $multiImage_id = $request->id;
        if($request->file('multi_image'))
        {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(220,220)->save('upload/about_image/'.$name_gen);
            $save_url = 'upload/about_image/'.$name_gen;


            Multi_image::findOrFail($multiImage_id)->update([
                
                'multi_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Multi Image Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.multi_image')->with($notification);
        }
    }

    public function DeleteMultiImage($id)
    {
        $multi = Multi_image::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        Multi_image::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
