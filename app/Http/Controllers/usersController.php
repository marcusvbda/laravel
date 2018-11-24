<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use marcusvbda\uploader\Controllers\UploaderController as Uploader;
use App\Models\{User};
use App\Services\AlertService;

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

    public function edit(User $user, Request $request)
    {
        try {
            $data = $request->all();
            $user->update($data);
            $alert = AlertService::flash('success', '<strong>Pronto!</strong> Usuário foi atualizado com sucesso.');

            return response()->json(['success' => true, 'message' => null, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'data' => null]);
        }
    }

    public function profileUpload(Request $request)
    {
        try {
            $data = $request->file('file');
            $file = Uploader::upload($data, "user_profile_".$user->id, '');
            Uploader::makeThumbnail($file);

            return response()->json(['success' => true, 'message' => null, 'data' => $file]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'data' => null]);
        }
    }
}
