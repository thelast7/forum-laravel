@extends('layouts.main')

@section('title', 'home')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ url('forum/create') }}" class="btn btn-success btn-block">Buat Diskusi</a><br>
@include('forum.includes.tags')
        </div>

        <div class="col-md-10">
	        <div class="list-group">
@include('forum.includes.post-list')   
	        </div> <br>
		    <div class="text-center">
	          {!! $forum->links() !!}
	        </div>
    	</div>
    </div>
@endsection
