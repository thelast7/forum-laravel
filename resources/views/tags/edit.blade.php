@extends('layouts.main')

@section('title', 'Edit')

@section('content')

<form action="{{ route('tags.update', $tags->id) }}" method="post">

	{{csrf_field()}}
	{{method_field('put')}}

	<div class="form-group">
		<label for="name">Nama Tag</label><br>
		<input type="text" name="name" value="{{ $tags->name }}" class="form-group">
	</div>
<button type="submit" class="btn btn-info">Simpan</button>
<button type="submit" class="btn btn-danger" href="{{ route('tags.index') }}">Cancel</button>


</form>

@endsection