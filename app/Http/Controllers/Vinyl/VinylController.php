<?php

namespace App\Http\Controllers\Vinyl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VinylModel;
use Illuminate\Support\Facades\Validator;

class VinylController extends Controller
{
    public function index()
    {
        $vinylCollection = VinylModel::get();
        return response()->json($vinylCollection,200);
    }

    public function store(Request $request)
    {
        $validationRules = [
            'bandName' =>'required|min:2',
            'musicGenre' => 'required'
        ];
      $validator = Validator::make($request->all(), $validationRules);

      if($validator->fails()){
          return response()->json($validator->errors(), 400);
      }

      $createVinyl = VinylModel::create($request->all());
      return response()->json($createVinyl,200);
    }

    public function show($id)
    {
        $getVinylById = VinylModel::find($id);

        if(is_null($getVinylById)){
            return response()->json(['message:'=>'No ID found'], 404);
        }
        return response()->json($getVinylById, 200);
    }

    public function update(Request $request, $id)
    {
        $getVinylById = VinylModel::find($id);
        if(is_null($getVinylById)){
            return response()->json(['message:'=>'No ID found'], 404);
        }
        $getVinylById->update($request->all());
        return response()->json(['message:'=>'update successfully'],200);
    }

    public function destroy($id)
    {
        $getVinylById = VinylModel::find($id);
        if(is_null($getVinylById)){
            return response()->json(['message:'=>'No ID found'], 404);
        }
        $getVinylById->delete();
        return response()->json(['message:'=>'Delete successfully'], 202);
    }
}
