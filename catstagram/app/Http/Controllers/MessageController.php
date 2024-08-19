<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Bericht succesvol verwijderd.');
    }
}
