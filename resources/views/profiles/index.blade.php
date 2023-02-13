@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="div">Wellcome, {{ $user->username }}</div>

                    <div class="div">
                        <div class="pt-4">{{ $user->profile->title }}</div>
                    </div>
                    <div class="div">
                        <div class="pt-4">{{ $user->profile->description }}</div>
                    </div>
                    <div class="div">
                        <div class="pt-4">
                            <a href="{{ $user->profile->url }}" target="_blank">
                                {{ $user->profile->url }}
                            </a>
                        </div>
                    </div>

                    <div class="pull-right">
                        <a href="/p/create" class="button">Add new post</a>
                    </div>

                    @can('update', $user->profile)
                        <div class="pull-left">
                            <a href="/profile/{{ $user->id }}/edit" class="button">Edit profile</a>
                        </div>
                    @endcan

                    <div class="row">Total posts: {{ $user->posts->count() }}</div>

                    <div class="row pt-5">
                        @foreach ($user->posts as $post)
                            <div class="col-4 pr-5 pb-4">
                                <a href="/p/{{ $post->id }}">
                                    <img src="/storage/{{ $post->image }}" style="max-width: 160px;" class="rounded-circle">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
