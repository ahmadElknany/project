@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">{{$thread->creatorName()}} : </a>
                    {{$thread->title}}
                </div>
                <div class="panel-body">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($thread->replies as $reply)
            @include('threads.replies')
        @endforeach
    </div>

    @if(auth()->check())
        <div class="row">
            <form method="POST" action="{{$thread->path().'/replies'}}">
                <div class="form-group">
                    <textarea id="body" name="body" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @endif

</div>
@endsection
