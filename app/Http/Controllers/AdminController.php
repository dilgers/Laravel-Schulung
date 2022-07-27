<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function contact() {
        // $contact_requests = ContactRequest::all(); // ::all() => SELECT * FROM contact_requests

        // $contact_requests = ContactRequest::query()->where('done', false)->get();
        // $contact_requests = ContactRequest::withTrashed()->where('done', false)->get(); // with softdelete für alle (onlyTrashed gibt es auch)
        $contact_requests = ContactRequest::withTrashed()->where('done', false)->paginate(5); // für anzahl begrenzen ($contact_requests->links() in view)

        return view('admin.contact_requests', compact('contact_requests'));
    }

    /* public function contactDone(int $contact_request) {
        $contact_request = ContactRequest::findOrDail($contact_request);*/

    public function contactDone(ContactRequest $contact_request) {

        /* $contact_request->done = true;
        $contact_request->save(); */

        $contact_request->update([
            'done' => true,
        ]);

        // return redirect()->route('admin.contact');
        return redirect()->back();
    }

    public function contactDelete(ContactRequest $contact_request) {
        $contact_request->delete(); // (forceDelete) für entgültiges Löschen

        return redirect()->back();
    }
}
