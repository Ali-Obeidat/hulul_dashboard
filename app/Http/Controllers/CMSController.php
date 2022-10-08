<?php

namespace App\Http\Controllers;

use App\Models\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms = CMS::first();
        return view('admin.cms.index',compact('cms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // store in db
         $validator = Validator::make($request->all(), [
            'theme_color' =>'required',
            'logo' =>'required',
            'slider_first_image' =>'required',
            'slider_second_image' =>'required',
            'slider_third_image' =>'required',
        ]);

        $logo = $this->upload($request->logo);
        $slider_first = $this->upload($request->slider_first_image);
        $slider_second = $this->upload($request->slider_second_image);
        $slider_third = $this->upload($request->slider_third_image);

        $cms = CMS::find($request->id);
        $cms->theme_color = $request->theme_color;
        $cms->logo = $logo;
        $cms->slider_first_image = $slider_first;
        $cms->slider_second_image = $slider_second;
        $cms->slider_third_image = $slider_third;
        $cms->save();

        Alert::success('cms', 'CMS Updated successfully');
        return view('admin.cms.index',compact('cms'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CMS  $cMS
     * @return \Illuminate\Http\Response
     */
    public function show(CMS $cMS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CMS  $cMS
     * @return \Illuminate\Http\Response
     */
    public function edit(CMS $cMS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CMS  $cMS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CMS $cMS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CMS  $cMS
     * @return \Illuminate\Http\Response
     */
    public function destroy(CMS $cMS)
    {
        //
    }
    public function upload($file)
    {
        $file= $file;
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('files'), $filename);
            return 'files/'.$filename;
    }
}
