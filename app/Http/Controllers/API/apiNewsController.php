<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class apiNewsController extends Controller
{
    public function getAllNews()
    {

        $news = News::all();
        // return $news;
        return ['news' => $news];
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'body' => 'required',

        ]);

        if ($request->file('img')) {
            $image = $request->file('img');
            $imageName = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            // $data['image']= $filename;
            News::create([
                'title' => $request['title'],
                'img' => $imageName,
                'body' => $validatedData['body']
            ]);
        } else {
            News::create([
                'title' => $request['title'],
                // 'img'=> $imageName,
                'body' => $validatedData['body']
            ]);
        }

        //    return $img;

        return 'The News was created successfully';
    }


    public function update(Request $request, $id)
    {
        $news = News::find($id);
        // return $news['img'];
        $validatedData = $request->validate([
            'body' => 'required',

        ]);

        if ($request->file('img')) {
            $image = $request->file('img');
            $imageName = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            // $data['image']= $filename;
            $news->title = $request['title'];
            $news->img = $imageName;
            $news->body = $validatedData['body'];
            $news->save();
        } else {
            $news->title = $request['title'];
            $news->img = $news['img'];
            $news->body = $validatedData['body'];
            $news->save();
        }
        return 'news_updated';
    }

    public function destroy($id)
    {
        $news = News::find($id);
        try {
            $news->delete();
            return 'news_deleted';
        } catch (\Throwable $th) {
            return 'news not exist';
        }
    }
}
