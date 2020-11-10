<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servis;
use Illuminate\Http\Request;
use DB;
use Exception;
use Validator;

class ServisController extends Controller
{
    public function rules()
    {
        return [
            'name' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ];
    }

    public function message()
    {
        return [

        ];
    }

    public function index()
    {
        $servis = Servis::all();
        return response()->json([
            'status' => 'OK',
            'data' => $servis
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
            $servis = Servis::create($input);
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'created',
                'data' => $servis
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
        $servis = Servis::findOrFail($id);
        $validator = Validator::make($input, $this->rules(), $this->message());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try {
            DB::beginTransaction();
            $montir = $servis->update($input);
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
            $servis = Servis::findOrFail($id);
            return response()->json([
                'status' => 'OK',
                'msg' => 'detail servis',
                'data' => $servis
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
        $servis = Servis::findOrFail($id);
        try {
            $servis->delete();
            return response()->json([
                'status' => 'OK',
                'msg' => 'success delete servis',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ]);
        }
    }

    public function cek(){
        dd('tyrtyrtyr');
    }
}
