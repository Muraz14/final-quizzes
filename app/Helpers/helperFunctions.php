<?php
use Illuminate\Support\Facades\Auth;

function isCurrentUserAdmin()
{
    if (Auth::id() == 1) {
        return true;
    }

    return false;
}