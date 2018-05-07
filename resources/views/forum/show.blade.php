@extends('layouts.main')

@section('title', 'Show')

@section('content')

<div class="show-header">
	<h1>{{ $forum->title }}</h1>
{{-- 	<div>
		<a href="{{ route('forum.create') }}" class="btn btn-sm pull-right">Buat Diskusi</a>
	</div> --}}
</div>
<br>
<div class="row">
	<div class="col-md-8">
		<div class="well">
			<p>{{ $forum->post }}</p>
		</div>

        <div class="d-flex w-100 justify-content-between">
        	@foreach ($forum->tags as $tag)
	        <span class="badge badge-primary">{{$tag->name}}</span>
	        @endforeach
	        <span class="pull-right">by <a href="#">{{ $forum->user->name }} </a>{{ date('j F Y, h:ia', strtotime($forum->created_at)) }}</span>
        </div>

	<label>Komentar:</label>
	@foreach($forum->comments as $comment)

	<div class="card card-default">
	  <div class="card-body">
		<small>{{ $comment->user->name }}</small>
		<div class="pull-right">
		<p>{{ $comment->isi_komentar }}</p>
		</div>
	  </div>
	</div>

	@endforeach

	<form action="{{ route('buatKomentar.store', $forum->id) }}" method="post">
		{{csrf_field()}}
		<label>Tulis Komentar</label>
		<div class="form-group">
			<input type="text" name="isi_komentar" class="form-control" placeholder="Tulis Komentar..">
		</div>

		<button class="btn btn-success" type="submit">Kirim</button>
	</form>

	</div>

	<div class="col-md-4">
		@if(auth()->user()->id == $forum->user_id)
		<a href="{{ route('forum.edit', $forum->id) }}" class="btn btn-success btn-block">Edit</a>
		<br>

		<form action="{{ route('forum.destroy', $forum->id) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('delete') }}
			<input type="submit" value="Delete" class="btn btn-block btn-danger">
		</form>

		@endif
		<br>
		<div class="alert alert-dismissible alert-warning">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Sudah punya akun ?</strong> <a href="{{ url('register') }}" class="alert-link">Daftar disini</a>
		</div>
	</div>
</div>
@endsection