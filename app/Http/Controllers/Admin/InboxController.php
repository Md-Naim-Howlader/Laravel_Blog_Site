<?php

namespace App\Http\Controllers\Admin;
    use App\Models\Inbox;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ File, Storage};

class InboxController extends Controller
{

    public function index() {
        $inboxes = Inbox::latest()->paginate(6);
        return view("backend.admin.inbox.mailbox", compact("inboxes"));
    }
    public function show($id) {
        $inbox = Inbox::find($id);
        $inbox->status = "seen";
        $inbox->save();
        return view("backend.admin.inbox.readmali", compact("inbox"));
    }

    public function create() {
        return view("backend.admin.inbox.composemail");

    }
    public function replyMail($id) {
        $inbox = Inbox::find($id);
        return view("backend.admin.inbox.replymail", compact('inbox'));
    }

    public function delete($id) {
        $inbox = Inbox::find($id);

    if ($inbox) {
        $imagePath = public_path($inbox->photo);

        if (File::exists($imagePath)) {
            if (File::basename($inbox->photo) != "empty-user.webp") {
                File::delete($imagePath);
            }
        }

        $inbox->delete();
        return redirect()->route('admin.mailbox')->with('success', 'Inbox Deleted Successfully!');
    }

    return redirect()->back()->with('error', 'Inbox Not Found!');
    }

}
