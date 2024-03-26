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
        return view('admin.pages.faq.index')->with('faqs', $faqs)->with('activeLink', 'faq');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faq.create')->with('activeLink', 'faq');
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
            'meta_title' => '',
            'meta_description' => '',
            'meta_keyword' => ''
        ]);

        // Save data to the database
        $blog = new Faqs();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->save();
        return redirect('/admin/faq')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {

        return view('admin.pages.faq.show')->with('products', $product);
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
        $blog = Faqs::find($id);
        return view('admin.pages.faq.edit')->with('blog', $blog)->with('activeLink', 'faq');
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
        $blog = Faqs::find($id);
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required'
        ]);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->update();
        return redirect('/admin/faq')->with('success');
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
        $product = Faqs::find($id);
        $product->delete();
        return redirect('/admin/faq')->with('delete', ' ');
    }

    public function changestatus(Request $request){
        $blogs = BlogReview::where('id',$request->id)->update(['status'=>$request->status]);
        return redirect()->back()->with('status', 'Status Changed Successfully');
    }
}
