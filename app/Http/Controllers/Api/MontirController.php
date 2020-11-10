<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Montir;
use Exception;
use Illuminate\Http\Request;
use Validator;
use DB;

class MontirController extends Controller
{

    public function rules(){
        return [
            'name' => 'required',
            'no_hp' => 'required'
        ];
    }

    public function message(){
        return [

        ];
    }

    public function index(){
        $montirs = Montir::all();
        return response()->json([
           'status' => 'OK',
           'data' => $montirs
        ]);
    }

    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,$this->rules(),$this->message());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            DB::beginTransaction();
            $montir = Montir::create($input);
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'created',
                'data' => $montir
            ],201);
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ],400);
        }
    }

    public function update(Request $request,$id){
        $input = $request->all();
        $montir = Montir::findOrFail($id);
        $validator = Validator::make($input,$this->rules(),$this->message());
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            DB::beginTransaction();
            $montir = $montir->update($input);
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'success update data'
            ],200);
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ],400);
        }
    }

    public function destroy($id){
        $montir = Montir::findOrFail($id);
        try {
            $montir->delete();
            return response()->json([
               'status' => 'OK',
               'msg' => 'success delete montir',
            ]);
        }catch (Exception $exception){
            return response()->json([
               'status' => 'ERROR',
               'msg' => $exception->getMessage()
            ]);
        }
    }

    public function show($id){
        try {
            $montir = Montir::findOrFail($id);
            return response()->json([
               'status' => 'OK',
               'msg' => 'detail montir',
               'data' => $montir
            ]);
        }catch (Exception $exception){
            return response()->json([
               'status'  => 'ERROR',
                'msg' => $exception->getMessage()
            ]);
        }
    }
}
