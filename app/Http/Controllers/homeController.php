<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCommentRequest;
use App\Models\Article;
use App\Models\category;
use App\Models\tag;
use Awssat\Visits\VisitsServiceProvider;
use GuzzleHttp\Psr7\Query;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class homeController extends Controller
{
    public function __construct(){
     $this->middleware('auth')->only('comment');
    }
    public function index(Request $request ){
        return $this->articleView($request['search'] ? ["search"=>$request->search ]:[]);
       
    }
    public function articlesByCategory(category $category){
      
        return $this->articleView(['category'=>$category]);

    }
    public function articlesByTag(tag $tag){
       
        
        return $this->articleView(['category'=>$tag]);


    }
    public function show(article $article){
        
       

        $comments = comment::where('article_id',$article->id)->count();
     
        return view('Articles.article',compact('article','comments'));
    }



    protected function articleView(array $filters){
    
     return view('Articles.index',['articles'=>Article::filters($filters)
           ->latest()->paginate(10)]);
    }
    public function commentaire(ValidateCommentRequest $request,article $article){
        $comment = new comment;
        $comment->content = $request->content;
        $comment->article_id = $article->id;
        $comment->users_id = Auth::id();
        $comment->save();
        toastr()->success('commentaire publié!', 'Success', ['timeOut' => 5000]);
        return back();
        
      
       


    }
    public function likeArticle( $id)
    {
        $article = Article::find($id);
        $article->like();
        $article->save();

        return redirect()->back()->with('status','Post Like successfully!');
    }

    public function unlikeArticle( $id)
    {
        $article = Article::find($id);
        $article->unlike();
        $article->save();
        
        return redirect()->back()->with('status','Post Like undo successfully!');
    }
   
}