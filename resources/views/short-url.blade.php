@extends('layouts.app')
@section('content')
    <div class="py-5 text-center">
        <a href="{{route('index')}}"><h2>Short URL</h2></a>
        <p class="lead">Your short URL</p>
    </div>
    <div class="row g-5">
        <div class="col-lg-12">
            Origin URL: <a target="_blank" href="{{ $url->url }}">{{ $url->url }}</a><br>
            Short URL: <a target="_blank"
                          href="{{ route('url.redirect', $url->token) }}">{{ route('url.redirect', $url->token) }}</a><br>
            Transition Limit: <b>{{$url->transition_limit}}</b> <br>
            Lifetime End: <b>{{$url->lifetime}}</b> <br>
        </div>
        <div class="col-12">
            <a href="{{route('index')}}">
                <button class="w-100 btn btn-primary btn-lg" type="button">Back</button>
            </a>
        </div>
    </div>
@endsection
