<?php

namespace App\Http\Controllers\Admin;
    use App\Models\Inbox;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InboxController extends Controller
{

    public function getAllMail() {
        $inboxes = Inbox::latest()->paginate(6);
        return view("backend.admin.inbox.mailbox", compact("inboxes"));
    }
    public function getMailById($id) {
        $inbox = Inbox::find($id);
        return view("backend.admin.inbox.readmali", compact("inbox"));
    }
}
