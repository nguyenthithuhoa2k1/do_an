<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Frontend\Comment;
use App\Models\Frontend\Rate;
use Illuminate\Support\Facades\Auth;


class BlogFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $dataBlog = Blog::orderBy('created_at', 'DESC')->paginate(3);
       return view('frontend.blog.Blog',compact('dataBlog')); 
    }

    public function detail(string $id)
    {
        $id_user = '';
        $dataUser = '';
        if(Auth::check()){
            $id_user = Auth::id();
            $dataUser = Auth::user();
        }
        $id_blog = $id;
        $blogDetail = Blog::where('id_blog',$id)->get();
        $next_record = Blog::where('id_blog', '>', $id)->orderBy('id_blog')->first();
        $previous_record = Blog::where('id_blog', '<', $id)->orderBy('id_blog','desc')->first();
        $averageRate = Rate::where('id_blog',$id)->get()->pluck('rate')->avg();
        $comments = Comment::where('id_blog',$id)->where('level',0)->get();
        return view('frontend.blog.BlogDetail',compact('blogDetail','next_record','previous_record','averageRate','id_user','id_blog','dataUser','comments'));
    }

    public function insertRate(Request $request)
    {
        if(Auth::check()){
            $id_user = Auth::id();
            if(Rate::where('id_blog',$request->id_blog)->where('id_user',$id_user)->first()){
                Rate::where('id_blog',$request->id_blog)
                ->update([
                    'id_blog'=>$request->id_blog,
                    'id_user'=>$id_user,
                    'rate'=>$request->rate,
                ]);
                $averageRate = Rate::where('id_blog',$request->id_blog)->get()->pluck('rate')->avg();
                return response()->json(['message' => 'Sucess','averageRate' => $averageRate]);
            }else{
                $insertRate = new Rate();
                $insertRate->rate = $request->rate;
                $insertRate->id_blog = $request->id_blog;
                $insertRate->id_user =$id_user;
                if($insertRate->save()){
                    $averageRate = Rate::where('id_blog',$request->id_blog)->get()->pluck('rate')->avg();
                    return response()->json(['message' => 'Sucess','averageRate' => $averageRate]);
                }else{
                    return response()->json(['message' => 'Error']);
                }
            }
            
        }else{
            return response()->json(['message' => "Bạn chưa login!"]);
        }
    }

    public function createComment()
    {
        return view('frontend.blog.Comment');
    }

    public function insertComment(Request $request)
    {
        if(Auth::check()){
            $dataUser = Auth::user();
            $id_user = Auth::id();
            $dataComment = new Comment();
            $dataComment->id_blog = $request->id_blog;
            $dataComment->comment = $request->comment;
            $dataComment->level = $request->level;
            $dataComment->id_user = $id_user;
            $dataComment->name_user = $dataUser->name;
            $dataComment->avatar_user = $dataUser->avatar;

            if($dataComment->save()){
                return response()->json(['message' => 'Sucess','dataComment' => $dataComment]);
            }else{
                return response()->json(['message' => 'Error']);
            }
        }else{
            return response()->json(['message' => "Bạn chưa login!"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
