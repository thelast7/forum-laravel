@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="/forum/create" class="btn btn-success btn-block">Buat Diskusi</a><br>
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
@endsection
