<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Party;
use App\Models\User;

class MemberController extends Controller
{
    //traer todos los jugadores

    public function allMembers()
    {
        Log::info('allMembers()');

        try {

            $members = Member::all();

            Log::info('Tasks done');

            return response()->json($members, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    //crear un jugador
    public function newMember(Request $request)
    {
        Log::info('newMember()');

        try {

            $validator = Validator::make($request->all(), [
                'PartyID' => 'required|integer',
                'PlayerID' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed'], 400);
            }

            $member = Member::create([
                'PartyID' => $request->PartyID,
                'PlayerID' => $request->PlayerID,
            ]);

            Log::info('Tasks done');

            return response()->json($member, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
    //traer por id 
    public function memberByID($id)
    {
        Log::info('getMember()');

        try {

            $member = Member::find($id);

            Log::info('Tasks done');

            return response()->json($member, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    // actualizar jugador
    public function updateMember(Request $request, $id)
    {
        Log::info('updateMember()');

        try {

            $validator = Validator::make($request->all(), [
                'PartyID' => 'required|integer',
                'PlayerID' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed'], 400);
            }

            $member = Member::find($id);

            $member->PartyID = $request->PartyID;
            $member->PlayerID = $request->PlayerID;

            $member->save();

            Log::info('Tasks done');

            return response()->json($member, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    //eliminar jugador
    public function deleteMember($id)
    {
        Log::info('deleteMember()');

        try {

            $member = Member::find($id);

            if (!$member) {
                return response()->json(['message' => 'Member not found'], 404);
            }

            $member->delete();

            Log::info('Tasks done');

            return response()->json(['message' => 'Member deleted'], 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }


    // traer todos los jugadores de partida
    public function membersByParty($id)
    {
        Log::info('membersByParty()');

        try {

            $members = Member::where('PartyID', $id)->get();

            Log::info('Tasks done');

            return response()->json($members, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
