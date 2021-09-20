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
    <form action="{{ route('admin.posts.update', $post->id)}}" method="post">
        @csrf
        @method('PATCH')

    <div class="mb-3">
        <label for="title" >Write Title</label>
        {{-- Remeber the value  --}}
        <input type="title" name="title" class="form-control" id="title" value="{{old('title',$post->title)}}" >
   
    </div>
    <div class="mb-3">
        
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
      
   
    </div>
    

      <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        {{-- Not value because is a TextArea --}}
        <textarea class="form-control" type="text" name="content" cols="30" rows="10"  id="descrizione" >{{old('content',$post->content)}}</textarea>
        
      </div>
      <div class="mb-3">
        <h3>Tag</h3>
        @foreach ($tags as $tag )
        <span class="d-inline-block">
            <input  id="tag{{ $loop->iteration }}" type="checkbox" value="{{$tag->id}}"
            @if($post->tags->contains($tag->id)) 
            checked
            @elseif (in_array($tag->id, old('tags', [])))
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