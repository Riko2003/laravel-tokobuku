@extends('layouts.global')

@section('title')  Data  book @endsection

@section('content')

  
<b>Data Buku</b>
                         <form  action="{{route('books.index')}}">
                         <div class="row">
                    <div  class="col-md-6">
                                    <input
                                        
                                        
                                         class="form-control col-md-10"
                                         type="text"
                                         placeholder="Filter By Nama Buku"
                                         name="name"/>
                                        </div>
                                        <div  class="input-group-append">
                                   <input
                                             type="submit"
                                             value="Filter"
                                             class="btn btn-primary"/>
                                    </div>
                               </div>
                          </form>
                  
                 <br>
                 <div  class="row">
                 <div  class="col-md-12  text-right">
                           <a
                                href="{{route('books.create')}}"
                                class="btn  btn-primary">Create Buku</a>
                 </div>
        </div>

        <br>

        <div class="input-group-append">
  
                <table  class="table  table-bordered table-stripped">
                           <thead>
                                <tr>
                                     <th><b>Cover</b></th>
                                     <th><b>Title</b></th>
                                     <th><b>Author</b></th>
                                     <th><b>Status</b></th>
                                     <th><b>Categories</b></th>
                                     <th><b>Stock</b></th>
                                     <th><b>Price</b></th>
                                     <th><b>Action</b></th>
                                </tr>
                           </thead>
                           <tbody>
                                @foreach($books as  $book)
                                     <tr>
                                          <td>
                                              @if($book->cover)
                                                   <img   src="{{asset('books_covers/'  . $book->cover)}}"width="96px"/>
                                              @endif
                                          </td>
                                          <td>{{$book->title}}</td>
                                          <td>{{$book->author}}</td>
                                          <td>
                                              @if($book->status ==  "DRAFT")
                                                   <span class="badge  bg-dark text-white">{{$book->status}}</span>
                                              @else
                                                   <span class="badge  badge-success">{{$book->status}}</span>
                                              @endif
                                          </td>
                                          <td>
                                              <ul  class="pl-3">
                                              @foreach($book->categories as $category)
                                                   <li>{{$category->name}}</li>
                                              @endforeach
                                              </ul>
                                          </td>
                                          <td>{{$book->stock}}</td>
                                          <td>{{$book->price}}</td>
                                          <td>
                                          <a   class="btn btn-info text-white btn-sm"  href="">Detail</a>
                              <a   class="btn btn-warning text-white btn-sm"  href="{{route('categories.edit',  [$book->id])}}">Edit</a>
                              <form onsubmit="return  confirm('Delete this  user permanently?')" class="d-inline" action=" " method="POST">
                @csrf
                <input
                    type="hidden"
                      name="_method"
                      value="POST">

                  <input
                      type="submit"
                      value="Delete"
                      class="btn  btn-danger btn-sm">
        </form>
                                          </td>
                                     </tr>
                                @endforeach
                           </tbody>
                           <tfoot>
                                <tr>
                                     <td  colspan="10">
                                          {{$books->appends(Request::all())->links()}}
                                     </td>
                                </tr>
                                </tfoot>
                                </table>
</div>
</div>
@endsection