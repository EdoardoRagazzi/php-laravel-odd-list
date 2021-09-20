@extends('layouts.app')

@section('content')
            <div class="container">
              <h2>Details Products</h2>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                  <div class="card-header">{{$post->title}}</div>
                    <div class="card-body">
                      <h3>Category: 
                        @if ($post->category)
                        {{$post->category->name}}
                          
                        @endif
                      </h3>
                      <h5 class="card-title">SLUG: {{$post->slug}}</h5>
                      <p class="card-text">{{$post->content}}</p>
                    </div>

                  </div>
                  <div class="mt-3">
                    <h4>Tags</h4>
                    {{-- @if ($post->tags)
                    @foreach ($post->tags as $tag )
                    <span class="badge badge-success">{{$tag->name}}</span>
                    @endforeach
                    @endif --}}
                    {{-- Condizione con il for else --}}
                    @forelse ($post->tags as $tag )
                      <span class="badge badge-success">{{$tag->name}}</span>
                    @empty
                      <span>Non ci sono Tag</span>
                    @endforelse
                      
                    
                  </div>
                  <div>
                    <a href="{{ route('admin.posts.index')}}" class="btn btn-warning">Go Back</a>
                  </div>

            </div>
@endsection