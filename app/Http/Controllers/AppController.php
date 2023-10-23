<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    public function findDuplicates(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'data' => 'required|array'
        ]);
        if ($validation->fails())
            return response()->json($validation->messages(), 422);
        $elementCounts = [];
        $duplicates = [];

        foreach ($request->data as $element) {
            if (isset($elementCounts[$element])) {
                $elementCounts[$element]++;
                if ($elementCounts[$element] == 2) {
                    $duplicates[] = $element;
                }
            } else {
                $elementCounts[$element] = 1;
            }
        }

        sort($duplicates);
        return response()->json(compact('duplicates'));
    }

    public function groupByOwners(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'data' => 'required|array'
        ]);
        if ($validation->fails())
            return response()->json($validation->messages(), 422);

        $groupedOwners = [];
        foreach ($request->data as $d => $owner) {
            $groupedOwners[$owner][] = $d;
        }
        ksort($groupedOwners);
        return response()->json(compact('groupedOwners'));
    }
}
