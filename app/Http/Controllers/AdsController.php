<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AdsController extends Controller

{
    
     /**
     * Display a listing of the resource.
     */

    public function home()
    {
    //    $ads=Ads::latest()->paginate(9);
       $allCategory=Category::all();
    
        $categorys=Category::distinct()->get(['title']);
       $locations=Ads::distinct()->get(['location']);
        $price_min=Ads::min('price');
         $price_max=Ads::max('price');

        $query= Ads::latest();
        


        if (isset($_GET['category']) && ($_GET['category']!=NULL)) {
            $optioncategory = htmlspecialchars($_GET['category']);
            $category_ids=Category::select('id')->where('title', $optioncategory)->get();
            $query->whereIn('category_id', $category_ids);
        }
        if (isset($_GET['location']) &&  ($_GET['location']!=NULL)) {
             $optionlocation = htmlspecialchars($_GET['location']);
            $query->where('location', $optionlocation);
        }
        if (isset($_GET['prixMin']) &&  ($_GET['prixMin']!=NULL)) {
             $optionprixMin = htmlspecialchars($_GET['prixMin']);
            $query->where('price', $optionprixMin);
        }
          if (isset($_GET['prixMax']) &&  ($_GET['prixMax']!=NULL)) {
            $optionprixMax = htmlspecialchars($_GET['prixMax']);
            $query->where('price', $optionprixMax);
        }
         if (isset($_GET['condition']) &&  ($_GET['condition']!=NULL)) {
            $optioncondition = htmlspecialchars($_GET['condition']);
            if ($optioncondition == "New"){
                 $query->where('condition', 'New');
            }
            if ($optioncondition == "Good"){
                 $query->where('condition', 'Good');
            }
            if ($optioncondition == "Used"){
                 $query->where('condition', 'Used');
            }
           
        }


        if ((isset($_GET['prixMin']) && ($_GET['prixMin']!=NULL)) && (isset($_GET['prixMax']) && ($_GET['prixMax']!=NULL))) {
            $optionprixMin = htmlspecialchars($_GET['prixMin']);
            $optionprixMax = htmlspecialchars($_GET['prixMax']);
            $query->where('price', '>=', $optionprixMin )->where('price', '<=',  $optionprixMax)->groupBy('id');
        }
        $ads=$query->paginate(9);

        return view('ads',["ads"=>$ads,
            "allCategory"=>$allCategory,

            "categorys"=>$categorys,
            "locations"=>$locations,
            "price_min"=>$price_min,
             "price_max"=>$price_max,

        ]);   
    }

    public function index()
    {
       $userAds=Ads::latest()->where('user_id',Auth::id())->paginate(8);
       
        $userCateg=Category::all()->where('user_id',Auth::id());
        return view('panel.adspanel',[
            "userCateg"=>$userCateg,
            "userAds"=>$userAds,
            

        ]);   
    }

    
    /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $ad = Ads::find($id);
    return $ad;
  }

   
  public function create()
    {
       
       $userCateg=Category::all()->where('user_id',Auth::id());
        return view('panel.create-ads',[
            "userCateg"=>$userCateg, 
        ]);   
    }
 
    public function store(Request $request){
        $request->validate([
        'title'=>'required|between:3,25|regex:/^[a-z\d\-_\s]+$/i',
        'price'=>'required|regex:/^[0-9]+$/',
        'location'=>'required|between:3,25|regex:/^[a-z\d\-_\s]+$/i',
        'description'=>'required|between:10,80|regex:/^[a-z\d\-_.\s]+$/i',
        'slug'=>'required|image|max:8000',
        'category_id'=>'required',
        'condition'=>'required',
            
        ]);
        if($request->hasFile('slug')){
            $imgPath=$request->file('slug')->store('','public');

        }
        $arr=[
             'title'=>$request['title'],
        'price'=>$request['price'],
        'location'=>$request['location'],
        'description'=>$request['description'],
        'slug'=>$imgPath,
        'category_id'=>$request['category_id'],
        'user_id'=>Auth::user()->id,
        'condition'=>$request['condition'],
        ];
        
           $imgPath=null;
            $post= new Ads();
            $post->title=$arr['title'];
            $post->price=$arr['price'];
            $post->slug=$arr['slug'];
            $post->description=$arr['description'];
            $post->location=$arr['location'];
            $post->category_id=$arr['category_id'];
            $post->user_id=$arr['user_id'];
            $post->condition=$arr['condition'];
            $post->save();
            
             $success="Ads created !";

      return redirect()->route('AdsDashboard')->withSuccess($success);;
        
    }
  
    public function search(Request $request) {
        $search =$request->input('search');
        $ads=Ads::where('title', 'like', "%$search%")->latest()->paginate(9);

        return view('ads',["ads"=>$ads
        ]);
    }

    public function filter() {
       
    }

  
    
    /**
     * Update the specified resource in storage.
     */
     public function update(string $id, Request $request ){
        

      
         $request->validate([
        'title'=>'required|between:3,25|regex:/^[a-z\d\-_\s]+$/i',
        'price'=>'required|regex:/^[0-9]+$/',
        'location'=>'required|between:3,25|regex:/^[a-z\d\-_\s]+$/i',
        'description'=>'required|between:10,80|regex:/^[a-z\d\-_.\s]+$/i',
        'slug'=>'required|image',
        'category_id'=>'required',
        'condition'=>'required'
        
            
        ]);
        
            
            $imgPath=$request->file('slug')->store('','public');
           

        //dd($imgPath);
        $arr=[
            'adId'=>$id,
             'title'=>$request['title'],
        'price'=>$request['price'],
        'location'=>$request['location'],
        'description'=>$request['description'],
        'slug'=>$imgPath,
        'category_id'=>$request['category_id'],
         'condition'=>$request['condition'],
        'user_id'=>Auth::user()->id,
        ];
        $ads=Ads::findOrFail($id);
        // $ads->update($request->all());
        if(Auth::user()->id==$ads->user_id){
            DB::table('ads')
                ->where('id',$arr['adId'])
                ->where('user_id',Auth::user()->id)
                ->update(array(
                   'title'=>$arr['title'],
                   'price'=>$arr['price'],
                    'location'=>$arr['location'],
                    'description'=>$arr['description'],
                    'category_id'=>$arr['category_id'],
                    'slug'=>$arr['slug'],
                    'condition'=>$arr['condition']
                   
                ));
    
     return redirect()->route('AdsDashboard');}else{
        echo "Not allowed";
     }
        
    }

     public function destroy($id){
        $ads=Ads::findOrFail($id);
        // $ads->update($request->all());
    if(Auth::user()->id==$ads->user_id){
        $ads->delete();
        return redirect()->route('AdsDashboard')->withSuccess("Ad deleted successfully");}else{
            echo "Not allowed";
        }

    }
}
