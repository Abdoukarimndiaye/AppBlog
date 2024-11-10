<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\articleValidateRequest;
use App\Http\Requests\upadateRequest;
use App\Models\Article;
use App\Models\category;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('Admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Admin.dashboard',[
            'articles'=>Article::without('categories','tags')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $tags = tag::all();
    
      
        return view('Admin.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(articleValidateRequest $request)

    {
        $validated = $request->validated();
        $validated['thumbnail'] =  $validated['thumbnail']->store('thumbnails');
        $validated['excerpt']=str::limit($validated['content'],150);
        $article = Article::create($validated);
        $article->tags()->sync($validated['tag_ids'] ?? null);
        toastr()->success('Article publié avec success!','Success',['timeOut' => 5000]);
        return redirect()->route('article',$article)->with('status','article publié !');
    
        
       
        
    }

    /**
     * Display the specified resource.
     * 
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)

    {
       $tags= tag::all();
       $categories = category::all();
    
        return view('Admin.update',compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(upadateRequest $request, Article $article)
    {
        $validated =  $request->validated();
        if($request->has('thumbnail')){
            Storage::delete($validated['thumbnail']);
            $validated['thumbnail'] = $validated['thumbnail']->store('thumbnails');
            $validated['excerpt']=str::limit($validated['content'],150);
            $article->update($validated);
            $article->tags()->sync($validated['tag_ids'] ?? null);
            toastr()->success('Article modifié avec success!','Success',['timeOut' => 5000]);
           return redirect()->route('article',$article);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        Storage::delete($article->thumbnail);
        $article->delete();
        return redirect()->route('Admin.articles.index')->with('status','article supprimé !');
    }
}
