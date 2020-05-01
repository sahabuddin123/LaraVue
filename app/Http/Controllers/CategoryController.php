<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Facade\FlareClient\Http\Response;
use Psy\Util\Json;
//use Illuminate\Http\Concerns\InteractsWithInput as hasFile;


class CategoryController extends Controller
{
    use UploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:191|min:3|required',
            'image' => 'required|mimes:png,jpg,svg,jpeg,gip|image'
        ]);

        $ctg = new Category();
        $ctg->name =  $request->name;
        $path = $request->file('image')->store('Categories');
        $ctg->image = $path;
       // dd($category);
        //dd($ctg);
         if ($ctg->save()) {
            return response()->json($ctg);
         }

         else{
            return response()->json($ctg, 500);
         }
        //dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //dd($request->all(), $category);

        $request->validate([
            'name' => 'max:191|min:3|required',
            // 'image' => 'mimes:png,jpg,svg,jpeg,gip|image'
        ]);
            $category->name = $request->name;
            $oldpath = $category->image;
            if($request->hasFile('image')){
                $path = $request->file('image')->store('Categories');
                $category->image = $path;
                Storage::delete($oldpath);
            }
            if($category->save()){
                return response()->json($category, 200);
                // return response()->json([
                //     'data' => $category,
                //     'message' => 'Category Update Successfully!',
                //     'status_code' => 200
                // ], 200);
            }
            else{
                Storage::delete($path);
                return response()->json([
                    'data' => $category,
                    'message' => 'Some Errors',
                    'status_code' => 500
                ], 500);
            }
        //dd($request->all(), $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //dd($category);
        if ($category->image != null) {
           // $this->deleteOne($category->image);
            Storage::delete($category->image);
        }
        if ($category->delete()) {
            return response()->json([
                'message' => 'Category delete Successfully!',
                'status_code' => 200
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'Some Errors',
                'status_code' => 500
            ], 500);
        }
    }

    // public function addCategory(Request $request) {
    //     $data = $request->all();
    //     DB::table('tablename')->insert($data);
    //     return Response::json(true);
    // }
}
