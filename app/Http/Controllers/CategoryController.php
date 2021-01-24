<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //
        $categories =  \App\Category::paginate(10);

                $filterKeyword =  $request->get('name');

                 if($filterKeyword){
                           $categories =  \App\Category::where("name",  "LIKE",
        "%$filterKeyword%")->paginate(10);
                 }
    
        return view('categories.index',  ['categories' =>  $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name  =  $request->get('name');
        
                         $new_category =  new  \App\Category;
                         $new_category->name =  $name;
        
                         $new_category->created_by =  \Auth::user()->id;
        
                         $new_category->slug =  \Str::slug($name, '-');
       
                          if($request->hasfile('image')){
                            $request->file('image')->move('categories_images/',$request->file('image')->getClientOriginalName());
                            $new_category->image = $request->file('image')->getClientOriginalName();
                            $new_category->save();
                            }
        
                          return redirect()->route('categories.create')->with('status','Category successfully  created');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = \App\Category::find($id);
        return view('categories.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $name  =  $request->get('name');
                 $slug =  $request->get('slug');

                 $category =  \App\Category::findOrFail($id);

                 $category->name =  $name;
                 $category->slug =  $slug;
                 
                 $category->updated_by =  \Auth::user()->id;


                 if($request->hasfile('image')){
                    $request->file('image')->move('categories_images/',$request->file('image')->getClientOriginalName());
                    $category->image = $request->file('image')->getClientOriginalName();
                    $category->save();
                    }

                  $category->save();

                  return redirect()->route('categories.index',  [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ajaxSearch(Request $request){
                    $keyword =  $request->get('q');
                    
                   
                        $categories =  \App\Category::where("name",  "LIKE",
     "%$keyword%")->first();
              
 
                    return view('book.create',compact('categories'));
        }
}
