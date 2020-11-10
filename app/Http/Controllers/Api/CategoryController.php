<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bengkel;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Str;
use Exception;

class CategoryController extends Controller
{

    public function index(Request $request){
        $type = $request->get('type');

        $category = Category::all();

        if ($type){
            $category = Category::where('type',$type)->get();
        }

        return response()->json([
            'status' => 'OK',
            'type' => $type ?? 'all type',
            'data' => $category
        ]);
    }

    public function store(Request $request){
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        try {
            DB::beginTransaction();
            $category = Category::create($input);
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'created',
                'data' => $category
            ],201);
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ],400);
        }
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        $category = Category::findOrFail($id);
        try {
            DB::beginTransaction();
            $category = $category->update($input);
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
        try {
            DB::beginTransaction();
            $category = Category::findOrFail($id);

            foreach ($category->relations($category->type)->get() as $rel){
                $rel->categories()->dissociate();
                $rel->save();
            }

            $category->delete();
            DB::commit();
            return response()->json([
                'status' => 'OK',
                'msg' => 'success delete category',
            ]);
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json([
                'status' => 'ERROR',
                'msg' => $exception->getMessage()
            ]);
        }
    }

    public function getRelations($id){
        try {
            $category = Category::where('id', $id)->first();

            if (!$category){
                $data = [];
            }else{
                $data = $category->relations($category->type)->get();
            }

            return response()->json([
                'status' => 'OK',
                'category' => $category->name ?? null,
                'data' =>  $data
            ]);
        }catch (Exception $exception){
            return response()->json([
                'status' => "ERROR",
                'msg' => $exception->getMessage()
            ]);
        }
    }

    public function getBengkelByCategory($id){
        try {
            $bengkels = Bengkel::whereJsonContains('category',['category_id' => $id])->get();
            return response()->json([
                'status' => 'OK',
                'category_id' => $id,
                'data' =>  $bengkels
            ]);
        }catch (Exception $e){
            return response()->json([
                'status' => "ERROR",
                'msg' => $e->getMessage()
            ]);
        }
    }
}
