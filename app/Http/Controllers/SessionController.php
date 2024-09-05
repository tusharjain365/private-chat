<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Http\Resources\SessionResource;
use App\Events\SessionEvent;

class SessionController extends Controller
{
    public function create(Request $request)
{
    \Log::info('Creating session with data:', ['friend_id' => $request->friend_id]);

    try {
        $session = Session::create(['user1_id' => auth()->id(), 'user2_id' => $request->friend_id]);
        $modifiedSession = new SessionResource($session);
        broadcast(new SessionEvent($modifiedSession, auth()->id()));
        return $modifiedSession;
    } catch (\Exception $e) {
        \Log::error('Error creating session:', ['error' => $e->getMessage()]);
        return response()->json(['error' => 'Failed to create session'], 500);
    }
}

}
