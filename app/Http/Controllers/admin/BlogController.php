<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\ErrorBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBlog = Blog::all();
        return view('admin.blog.Blog',compact('dataBlog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.AddBlog');
    }

    public function insert(ErrorBlogRequest $request)
    { 
        $file=$request->image_blog;
        $fileName ="";
        if(!empty($file)){
            $fileName=$file->getClientOriginalName();
            $file->move('admin/upload/blog',$fileName);
        }

        $dataBlog = new Blog();
        $dataBlog->title_blog=$request->title_blog;
        $dataBlog->image_blog=$fileName;
        $dataBlog->description_blog=$request->description_blog;
        $dataBlog->content_blog=$request->content_blog;
        $dataBlog->save();

        return redirect()->route('blog')->with('success',('create profile success'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $dataBlog = Blog::where('id_blog',$id)->get();
        return view('admin.blog.EditBlog',compact('dataBlog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ErrorBlogRequest $request, string $id)
    {
        $file=$request->image_blog;
        $fileName ="";
        if(!empty($file)){
            $fileName=$file->getClientOriginalName();
            $file->move('admin/upload/blog',$fileName);
        }
        Blog::where('id_blog',$id)->update([
                'title_blog'=>$request->title_blog,
                'image_blog'=>$fileName,
                'description_blog'=>$request->description_blog,
                'content_blog'=>$request->content_blog,
        ]);
        return redirect()->route('blog')->with('success',('update profile success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::where('id_blog',$id)->delete();
        return redirect()->route('blog')->with('success',('delete profile success'));
    }
}
