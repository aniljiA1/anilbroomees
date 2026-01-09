<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'hobby' => 'required|string|max:100'
        ]);

        $user = User::findOrFail($id);

        if ($user->hobbies()->where('name', $request->hobby)->exists()) {
            return response()->json(['error' => 'Hobby already added'], 409);
        }

        $user->hobbies()->create([
            'name' => $request->hobby
        ]);

        return response()->json(['message' => 'Hobby added']);
    }

    public function destroy(Request $request, $id)
    {
        $request->validate(['hobby' => 'required']);

        $user = User::findOrFail($id);
        $user->hobbies()->where('name', $request->hobby)->delete();

        return response()->json(['message' => 'Hobby removed']);
    }
}
