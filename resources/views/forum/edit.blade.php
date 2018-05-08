@extends('layouts.main')

@section('title', 'Edit Diskusi')

@section('content')

@if(auth()->user()->id == $forum->user_id)
<div class="row">
	<div class="col-md-8">
		<form action="{{ route('forum.update', $forum->slug) }}" method="post" role="form">
			{{ csrf_field() }}
			{{ method_field('put') }}
			<div class="well">
				<h4 calass="text-center">Buat Diskusi</h4>
				<div class="form-group">
					<label for="judul">Judul</label>
					<input type="text" name="title" value="{{ $forum->title }}" class="form-control" placeholder="Isi Judul">
				</div>

				<div class="form-group">
					<label for="Tag">Tag</label>
					<select name="tags[]" multiple="multiple" class="form-control tags" placeholder="Tags">
						@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="diskusi">Diskusi</label>
					<textarea name="post" value="" class="form-control" placeholder="Isi Diskusi">{{ $forum->post }}</textarea>
				</div>

				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>

	<div class="col-md-4">
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Sudah punya akun ?</strong> <a href="{{ url('register') }}" class="alert-link">Daftar disini</a>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	
	$(".tags").select2();

	$(".tags").select2().val({!! json_encode($forum->tags()->allRelatedIds() ) !!}).trigger('change');

</script>
@endsection

@else
<script type="text/javascript">
	window.location = "/";
</script>

@endif