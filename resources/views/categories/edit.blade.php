@extends('layouts.global')

    @section('title')  Create  Category @endsection
    @section('content')
    <form
                 enctype="multipart/form-data"
                 class="bg-white  shadow-sm  p-3"
                 action="{{route('categories.update',  [$category->id])}}"
                 method="POST">

                 @csrf
                 <input
                type="hidden"
                value="PUT"
                name="_method"/>
                <b>Edit Category</b><br>
                <br>
                 <label>Category  Name</label><br>
                 <input
                      type="text"
                      class="form-control"
                      name="name"
                      value="{{$category->name}}"/>
                 <br>
                 <label>Category  Slug</label><br>
                 <input
                      type="text"
                      class="form-control"
                      name="slug"
                      value="{{$category->slug}}"/>
                 <br>

                 @if($category->image)
            <span>Current  image</span><br>
            <img   src="{{asset('categories_images/'.  $category->image)}}" width="120px">
            <br><br>
        @endif

        <input
            type="file"
            class="form-control"
             name="image">
        <small  class="text-muted">Kosongkan  jika tidak ingin mengubah
        gambar</small>
<br><br>


                  <input
                      type="submit"
                      class="btn  btn-primary"
                      value="Save"/>
        </form>
    @endsection