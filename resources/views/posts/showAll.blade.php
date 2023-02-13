@extends('layouts.app')

@section('content')
<style>
  .card:hover {
    background-color: #f2f2f2;
  }
  a {
    color:cornflowerblue;
    text-decoration: none;
  }
  a:hover {
    color:dodgerblue;
    /* text-decoration: underline; */
  }
</style>
    <div class="container">
        <div class="row">
            <div class="d-flex flex-wrap">

                @foreach ($posts as $post)
                    <a href="/p/{{ $post->id }}" class="m-3">
                        <div class="card mb-3" style="max-width: 340px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="/storage/{{ $post-> image }}" class="card-img" alt="image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->caption }}</h5>
                                        <p class="card-text">{{ $post->user->username }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>        

@endsection
