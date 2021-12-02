@extends('layouts.Page_app')

@section('title' )

@section('content')
<main>
    <div class="main-wrapper pt-80">
        <div class="container py-5">
            @foreach ($data as $content)
                <h4>{{ $content->title}}</h4>
                <div>{!! $content->body !!}</div>
            @endforeach

        </div>
    </div>
</main>

@endsection
