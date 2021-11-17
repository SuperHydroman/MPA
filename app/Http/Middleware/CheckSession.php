<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $songs = Session::pull('Playlist');
        if ($songs == null) {
            Session::put('Playlist', $songs);
            return Redirect::to($request->getSession()->previousUrl());
        }

        Session::put('Playlist', $songs);
        return $next($request);
    }
}
