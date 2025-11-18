<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Models\User;
use App\Models\Ads;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCateg = Category::latest()->where('user_id', Auth::id())->paginate(8);

        return view('panel.adscategory', [
            "userCateg" => $userCateg,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'titleCateg' => ['required', 'between:3,20', 'regex:/^[a-z\d\-_\s]+$/i'] ,
            ],
            [
                'titleCateg.between' => '05-20 caracteres please',
                'titleCateg.required' => 'Can not be empty'
            ]

        );

        $arr = [
            'title' => $request['titleCateg'],
            'user_id' => Auth::user()->id,

        ];

        $post = new Category();
        $post->title = $arr['title'];
        $post->user_id = $arr['user_id'];
        $post->save();
        $success = "Added";
        //return back()->withSuccess($success);
        return redirect()->route('AdsCategory')->withSuccess($success);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'titleCateg' => ['required', 'between:3,20', 'regex:/^[a-z\d\-_\s]+$/i']
            ],
            [
                'titleCateg.between' => '05-20 caracteres please',
                'titleCateg.required' => 'Can not be empty'
            ]

        );



        $new = Category::findOrFail($id);
            if(Auth::user()->id==$new->user_id){
            $new->update([
                'title' => $request['titleCateg'],
                'user_id' => Auth::user()->id,
            ]);


        return redirect()->route('AdsCategory')->withSuccess("Category updated successfully");}else{
            echo "Not allowed";
        }
    }

    public function edit($id)
    {
        
        $category = Category::findOrFail($id);
        if(Auth::user()->id==$category->user_id){
        return view('panel/update-category', compact('category'));}else{
            echo('Not allowed');
        }
    }

    public function destroy($id){
       
        $new = Category::findOrFail($id);
       
        if(Auth::user()->id==$new->user_id){
        $new->delete();
        return redirect()->route('AdsCategory')->withSuccess("Category deleted successfully");}else{
            echo "Not allowed";
        }

    }
}
