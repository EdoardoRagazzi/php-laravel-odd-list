@extends('layouts.app')
@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
    <form action="{{ route('admin.posts.store')}}" method="post">
        @csrf
      

    <div class="mb-3">
        <label for="title" >Write Title</label>

        {{-- Remember method old so you don't delete the values already insert / doesn't delete your data --}}

        {{-- You can also use the error class that put you an exclamation warning with is-invalid / or you can add a message  --}}
        <input type="title" name="title" class="form-control 
        @error('title')
        is-invalid
        @enderror
        " id="title" value="{{old('title')}}" >
        @error('title')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
   
      </div>
      <label for="category"  class="form-label">Category</label>
        {{-- Remeber the value  --}}
        <select class="form-control" class="" name="category_id" id="category">
            <option value="">--Select--</option>
            @foreach($categories as $category)
            
            <option value="{{old('category_id',$category->id)}}"
                @if ($category->id ==old('category_id',$post->category_id)) selected
                    
                @endif>{{old('name',$category->name)}}</option>
            @endforeach
        </select>
      <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea class="form-control" type="text" name="content" cols="30" rows="10"  id="descrizione" >{{old('content')}}</textarea>
        
      </div>
      <div class="mb-3">
          <h3>Tag</h3>
          @foreach ($tags as $tag )
          <span class="d-inline-block">
              <input  id="tag{{ $loop->iteration }}" type="checkbox" value="{{$tag->id}}"
              @if(in_array($tag->id, old('tags',[]))) 
              checked
              @endif
              name="tags[]">
              <label for="tag{{ $loop->iteration }}" class="form-label">{{$tag->name}}</label>
          </span>
              
          @endforeach
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>




@endsection