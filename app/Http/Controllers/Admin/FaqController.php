<?php

namespace App\Http\Controllers\Admin;


use App\Models\PrintfulOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Products;
use App\Models\Blogs;
use App\Models\Faqs;
use App\Models\BlogReview;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Form;
use Validator;
use Auth;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //if(auth()->user()->email!='admin@gmail.com'){
        //return redirect('/');
        //}
    }

    public function index()
    {
        $faqs = Faqs::paginate(5);
        return view('admin.pages.faq.index')->with('faqs', $faqs)->with('activeLink', 'faqs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blogs.create')->with('activeLink', 'blogs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'feature_image' => '',
            'blog_image' => '',
            'meta_title' => 'string|max:255',
            'meta_description' => '',
            'meta_keyword' => 'string|max:255'
        ]);

        // Handle image uploads
        $feature_image = $request->file('feature_image')->store('public/images');
        $blog_image = $request->file('blog_image')->store('public/images');

        // Save data to the database
        $blog = new Blogs();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->feature_image = $feature_image;
        $blog->blog_image = $blog_image;
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->meta_keywords = $request->input('meta_keywords');

        $slug = Str::slug($request->input('title'));
        $existingSlug = Blogs::where('slug', $slug)->exists();

        if ($existingSlug) {
            $counter = 1;
            do {
                $newSlug = $slug . '-' . $counter;
                $existingSlug = Blogs::where('slug', $newSlug)->exists();
                $counter++;
            } while ($existingSlug);
            $slug = $newSlug;
        }

        // Save the blog
        $blog->slug = $slug;
        $blog->save();
        return redirect('/admin/blogs')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {

        return view('products.show')->with('products', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //echo "<pre>"; print_r($id); die;
        $blog = Blogs::find($id);
        return view('admin.pages.blogs.edit')->with('blog', $blog)->with('activeLink', 'blogs');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo "<pre>"; print_r($request->all()); die;
        $blog = Blogs::find($id);
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'feature_image' => '',
            'blog_image' => '',
            'meta_title' => 'string|max:255',
            'meta_description' => '',
            'meta_keyword' => 'string|max:255'
        ]);

        // Handle image uploads

        $feature_image = $blog->feature_image;
        if ($request->file('feature_image')) {
            $feature_image = $request->file('feature_image')->store('public/images');
        }

        $blog_image = $blog->blog_image;
        if ($request->file('blog_image')) {
            $blog_image = $request->file('blog_image')->store('public/images');
        }

        // Save data to the database          
        //$blog = new Blogs();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->blog_image = $blog_image;
        $blog->feature_image = $feature_image;
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->meta_keywords = $request->input('meta_keywords');

        $slug = Str::slug($request->input('title'));
        $existingSlug = Blogs::where('slug', $slug)->where('id','!=',$id)->exists();

        if ($existingSlug) {
            $counter = 1;
            do {
                $newSlug = $slug . '-' . $counter;
                $existingSlug = Blogs::where('slug', $newSlug)->exists();
                $counter++;
            } while ($existingSlug);
            $slug = $newSlug;
        }

        // Save the product
        $blog->slug = $slug;
        $blog->update();
        return redirect('/admin/blogs')->with('success');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  Products $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {


        //delete image from local folder "/photo/"
        //Storage::delete($product->product_image);

        //delete product title, description, amount and image from MySQL
        $product = Blogs::find($id);
        $product->delete();
        return redirect('/admin/blogs')->with('delete', ' ');
    }

    public function changestatus(Request $request){
        $blogs = BlogReview::where('id',$request->id)->update(['status'=>$request->status]);
        return redirect()->back()->with('status', 'Status Changed Successfully');
    }
}
