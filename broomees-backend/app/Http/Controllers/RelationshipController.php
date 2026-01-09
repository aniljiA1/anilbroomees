<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function store(Request $request, $id)
    {
        $target = User::findOrFail($id);
        $sourceId = $request->header('X-User-Id');

        if ($sourceId == $id) {
            return response()->json(['error' => 'Cannot relate to self'], 400);
        }

        $source = User::findOrFail($sourceId);

        if ($source->relationships()->where('related_user_id', $id)->exists()) {
            return response()->json(['error' => 'Relationship already exists'], 409);
        }

        $source->relationships()->attach($id);
        $target->relationships()->attach($sourceId);

        return response()->json(['message' => 'Relationship created']);
    }

    public function destroy(Request $request, $id)
    {
        $sourceId = $request->header('X-User-Id');

        User::findOrFail($sourceId)->relationships()->detach($id);
        User::findOrFail($id)->relationships()->detach($sourceId);

        return response()->json(['message' => 'Relationship removed']);
    }
}
