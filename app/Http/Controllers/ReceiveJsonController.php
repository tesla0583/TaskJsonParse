<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Json;
use App\Models\User;
use Carbon\Carbon;

class ReceiveJsonController extends Controller
{
    public function setJson(Request $request)
    {
        $start = microtime(true);

        $token = $request->header('Authorization');

        $user = User::all()
            ->where('token', $token)
            ->firstOrFail();

        $minute = Carbon::now()->diffInMinutes($user->expired_at);

        if ($minute > 5) {
            return response()->json([
                'status' => 0,
                'message' => 'Token expired, please authorize again!'
            ], 200);
        }

        $json = Json::create([
           'data' => $request->data
        ]);

        $time_elapsed_secs = microtime(true) - $start;
        $memory = memory_get_usage();

        return response()->json([
                'status' => 1,
                'id' => $json->id,
                'time in second' => round($time_elapsed_secs, 3),
                'memory in byte' => $memory,
                'message' => 'Json data added'
            ]
            , 200);
    }
}
