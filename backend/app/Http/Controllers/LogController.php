<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Get all the logs history.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLogs()
    {
        $logs = Log::with('user')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return response([
            'logs' => $logs
        ]);
    }
}
