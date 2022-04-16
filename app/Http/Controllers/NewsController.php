<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(6);
        // return $news;
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'body' => 'required',
    
           ]);

           if($request->file('img')){
            $image= $request->file('img');
            $imageName= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('images'), $imageName);
            // $data['image']= $filename;
            News::create([
                'title'=>$request['title'],
                'img'=> $imageName,
                'body'=>$validatedData['body']
            ]);
        }else{
            News::create([
                'title'=>$request['title'],
                // 'img'=> $imageName,
                'body'=>$validatedData['body']
            ]);
        }
     
        //    return $img;
        
        Alert::success('News Created', 'The News was created successfully' );
       return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $news = News::find($id);
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        // return $news['img'];
        $validatedData = $request->validate([
            'body' => 'required',
    
           ]);

           if($request->file('img')){
            $image= $request->file('img');
            $imageName= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('images'), $imageName);
            // $data['image']= $filename;
            $news->title = $request['title'];
            $news->img = $imageName;
            $news->body = $validatedData['body'];
            $news -> save();
        }else{
            $news->title = $request['title'];
            $news->img = $news['img'];
            $news->body = $validatedData['body'];
            $news -> save();
          
        }
        session()->flash('news_updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $news = News::find($id);
        $news->delete();
        session()->flash('news_deleted');
        return back();
    }
}
