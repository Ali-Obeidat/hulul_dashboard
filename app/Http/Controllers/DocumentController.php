<?php

namespace App\Http\Controllers;

use App\Mail\DocumentStatus;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usersDocuments = Document::with('user')-> where('document_status','processing')->orderBy('created_at','desc')->get();
        $usersDocuments = Document::with('user')->orderBy('created_at','desc')->get();
        // return $usersDocuments[0]->user->name;
        return view('admin.requests.usersDocuments',compact('usersDocuments'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
        $document = Document::find($id);
        // return $document->user->email;
        if ($request->document_status === 'accepted' ) {
            $document->document_status = $request->document_status;
            $document->save();
        Alert::success('Document Status', 'The Document was '.$request->document_status );

            // return $document;
        }elseif ($request->document_status === 'rejected') {
            $document->document_status = $request->document_status;
            $document->save();
        Alert::error('Document Status', 'The Document was '.$request->document_status );

        }
        
        try {
            Mail::to($document->user->email)->send(new DocumentStatus($request->document_status));
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
