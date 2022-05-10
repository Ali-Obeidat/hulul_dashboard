<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\DocumentStatus;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class apiDocumentController extends Controller
{
    public function getAllDocumentsRequest()
    {

        $usersDocuments = Document::with('user')->orderBy('created_at', 'desc')->get();
        return ['Users Documents' => $usersDocuments];
    }

    public function update(Request $request,  $id)
    {

        $document = Document::find($id);
        // return $document->user->email;
        if ($request->document_status === 'accepted') {
            if ($document->document_status == $request->document_status) {
                return  'The Document already ' . $request->document_status;
            }
            $document->document_status = $request->document_status;
            $document->save();
            try {
                Mail::to($document->user->email)->send(new DocumentStatus($request->document_status));
            } catch (\Throwable $th) {
                //throw $th;
            }
            return  'The Document was ' . $request->document_status;

        } elseif ($request->document_status === 'rejected') {
            if ($document->document_status == $request->document_status) {
                return  'The Document already ' . $request->document_status;
            }
            $document->document_status = $request->document_status;
            $document->save();
            try {

                Mail::to($document->user->email)->send(new DocumentStatus($request->document_status));
            } catch (\Throwable $th) {
                //throw $th;
            }
            return 'The Document was ' . $request->document_status;
        }
    }
}
