@extends("layouts.global")
@section("title")  Users list @endsection
@section("content")
<b>Data Category</b>
                         <form  action="{{route('categories.index')}}">
                         <div class="row">
                    <div  class="col-md-6">
                                    <input
                                        
                                        
                                         class="form-control col-md-10"
                                         type="text"
                                         placeholder="Filter By Category Name"
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
                                href="{{url('categories/create')}}"
                                class="btn  btn-primary">Create Category</a>
                 </div>
        </div>

        <br>

        <div class="input-group-append">
                            
         <table class="table  table-bordered">
              <thead>
                    <tr>
                         <th><b>No</b></th>
                         <th><b>Category</b></th>
                         <th><b>Slug</b></th>
                         <th><b>Image</b></th>
                         <th><b>Action</b></th>
                    </tr>
               </thead>
               <tbody>
               @php
                $no = 1;
               @endphp
                    @foreach($categories as $data)
                         <tr>
                              <td>{{$no}}</td>
                              <td>{{$data->name}}</td>
                              <td>{{$data->slug}}</td>
                              <td>
                                   @if($data->image)
                                       <img   src="{{asset('categories_images/'.$data->image)}}"width="70px"/>
                                   @else
                                    N/A
                                   @endif
                              </td>
                        
                              <td>
                              <a   class="btn btn-info text-white btn-sm"  href="">Detail</a>
                              <a   class="btn btn-warning text-white btn-sm"  href="{{route('categories.edit',  [$data->id])}}">Edit</a>
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
        </form></td>                       </tr>
        @php
                $no++;
               @endphp
                    @endforeach
               </tbody>
           </table>
@endsection
