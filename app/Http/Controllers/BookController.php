<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books =  \App\Book::with('categories')->paginate(10);

            return view('book.index',  ['books'=>  $books]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
        $categories = \App\Category::all();
        return view('book.create',['categories' => $categories]);
        dd($categories);
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
        $new_book  =  new  \App\Book;
            $new_book->title =  $request->get('title');
            $new_book->description =  $request->get('description');
            $new_book->author =  $request->get('author');
            $new_book->publisher =  $request->get('publisher');
            $new_book->price =  $request->get('price');
            $new_book->stock =  $request->get('stock');
            $new_book->slug =  \Str::slug($request->get('title'));
            $new_book->created_by =  \Auth::user()->id;
            if($request->hasfile('cover')){
                $request->file('cover')->move('books_covers/',$request->file('cover')->getClientOriginalName());
                $new_book->cover = $request->file('cover')->getClientOriginalName();
                $new_book->save();
                }

            
            $new_book->categories()->attach($request->get('categories'));
            $new_book->status =  $request->get('save_action');
            if($request->get('save_action')  ==  'PUBLISH'){
                return redirect()
                ->route('books.index')
                ->with('status',  'Book successfully  saved and published');
                }   
            if($request->get('save_action')  ==  'DRAFT'){
                    return redirect()
                    ->route('books.index')
                    ->with('status',  'Book successfully  saved and published');
                    }  
                    $new_book->save();
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
}
