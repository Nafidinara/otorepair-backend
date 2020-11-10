<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Validator;
use DB;
use Str;
use Exception;

class SparepartController extends Controller
{
    public function rules()
    {
        return [
            'name' => 'required',
            'deskripsi' => 'required',
            'berat' => 'required',
            'stok' => 'required',
        ];
    }

    public function message()
    {
        return [

        ];
    }

    public function index()
    {
        $spareparts = Sparepart::all();
        return response()->json([
            'status' => 'OK',
            'data' => $spareparts
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, $this->rules(), $this->message());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try {
            DB::beginTransaction();
            $sparepart = Sparepart::create($input);
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'created',
                'data' => $sparepart
            ], 201);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ], 400);
        }
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $sparepart = Sparepart::findOrFail($id);
        $validator = Validator::make($input, $this->rules(), $this->message());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try {
            DB::beginTransaction();
            $montir = $sparepart->update($input);
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'success update data'
            ], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $sparepart = Sparepart::findOrFail($id);
            return response()->json([
                'status' => 'OK',
                'msg' => 'detail sparepart',
                'data' => $sparepart
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        try {
            $sparepart->delete();
            return response()->json([
                'status' => 'OK',
                'msg' => 'success delete sparepart',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ]);
        }
    }
}


