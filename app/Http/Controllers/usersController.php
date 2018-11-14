<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User};

class usersController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $filter = (isset($data['filter']) ? $data['filter'] : '');

        $users = User::where('name', 'like', "%$filter%")
            ->orWhere('email', 'like', "%$filter%")
            ->paginate(10);

        return view('backend.pages.users.index', compact('users', 'filter'));
    }

    public function show(User $user)
    {
        return view('backend.pages.users.show', compact('user'));
    }
}
