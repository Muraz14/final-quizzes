<?php

namespace App\Http\Middleware;

use App\Models\Quiz;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QuizPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $current_user_id = Auth::id();

        $quiz = Quiz::where('id', $request->id)->first();

        if (!$quiz->status && $current_user_id != 1 && $quiz->user_id != $current_user_id) {
            return redirect('/');
        }

        return $next($request);
    }
}
