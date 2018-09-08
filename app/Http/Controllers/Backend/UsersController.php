<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        echo 'Showing users list';
    }

    public function show($id, Request $request)
    {
        $page = $request->input('page') ?? 1;

        echo '<p>Showing details of user id: '.$id.'</p>';
    }
}
