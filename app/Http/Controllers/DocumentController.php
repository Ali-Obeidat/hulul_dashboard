<?php

namespace App\Http\Controllers;

use App\Events\Notifications;
use App\Mail\DocumentStatus;
use App\Models\Document;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Stichoza\GoogleTranslate\GoogleTranslate;


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
        $usersDocuments = Document::with('user')->orderBy('created_at', 'desc')->get();
        // return $usersDocuments[0]->user->name;
        return view('admin.requests.usersDocuments', compact('usersDocuments'));
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
        $langs = ['ar', 'en'];
        $transBody = [];
        // return $document->user->email;
        if ($request->document_status === 'accepted') {
            // if ($document->document_status == $request->document_status) {
            //     return  'The Document already ' . $request->document_status;
            // }
            $document->document_status = $request->document_status;
            $document->save();

            if ($document->type == 'Address confirmation') {

                $title = 'accept-Address-confirmation-document';
                $body = 'Wonderful!! Confirmation of your place of residence has been successfully approved.';
                $image = 'location-tick';
                $info = [
                    'document_id' => $document->id,

                ];
                foreach ($langs as $lang) {
                    $tr = new GoogleTranslate($lang, null);
                    //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                    array_push($transBody, [$lang => $tr->translate($body)]);
                }

                event(new Notifications($title, $transBody, $document->user_id, $image, $info));

                Notification::create([
                    'user_id' => $document->user_id,
                    'title' => $title,
                    'notification_body' => $body,
                    'notification_image' => $image,
                    'info' => $info,
                ]);
            }
            if ($document->type == 'identity confirmation') {
                $title = 'accept-identity-confirmation-document';
                $body = 'Wonderful!! Your identity confirmation has been successfully approved.';
                $image = 'profile-tick';
                $info = [
                    'document_id' => $document->id,

                ];
                foreach ($langs as $lang) {
                    $tr = new GoogleTranslate($lang, null);
                    //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                    array_push($transBody, [$lang => $tr->translate($body)]);
                }

                event(new Notifications($title, $transBody, $document->user_id, $image, $info));

                Notification::create([
                    'user_id' => $document->user_id,
                    'title' => $title,
                    'notification_body' => $body,
                    'notification_image' => $image,
                    'info' => $info,
                ]);
            }

            Alert::success('Document Status', 'The Document was ' . $request->document_status);

            // return $document;
        } elseif ($request->document_status === 'rejected') {
            if ($document->document_status == $request->document_status) {
                return  'The Document already ' . $request->document_status;
            }
            $document->document_status = $request->document_status;
            $document->save();

            if ($document->type == 'Address confirmation') {

                $title = 'reject-Address-confirmation-document';
                $body = 'Confirmation of your place of residence was not approved. Please upload other documents.';
                $image = 'location-cross';
                $info = [
                    'document_id' => $document->id,

                ];
                foreach ($langs as $lang) {
                    $tr = new GoogleTranslate($lang, null);
                    //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                    array_push($transBody, [$lang => $tr->translate($body)]);
                }

                event(new Notifications($title, $transBody, $document->user_id, $image, $info));

                Notification::create([
                    'user_id' => $document->user_id,
                    'title' => $title,
                    'notification_body' => $body,
                    'notification_image' => $image,
                    'info' => $info,
                ]);
            }
            if ($document->type == 'identity confirmation') {
                $title = 'reject-identity-confirmation-document';
                $body = 'Your identity confirmation was not approved. Please upload other documents.';
                $image = 'profile-delete';
                $info = [
                    'document_id' => $document->id,

                ];
                foreach ($langs as $lang) {
                    $tr = new GoogleTranslate($lang, null);
                    //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                    array_push($transBody, [$lang => $tr->translate($body)]);
                }

                event(new Notifications($title, $transBody, $document->user_id, $image, $info));

                Notification::create([
                    'user_id' => $document->user_id,
                    'title' => $title,
                    'notification_body' => $body,
                    'notification_image' => $image,
                    'info' => $info,
                ]);
            }
           
            Alert::error('Document Status', 'The Document was ' . $request->document_status);
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
