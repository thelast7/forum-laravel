@extends('layouts.main')

@section('content')

    <div class="jumbotron">
      <h2 class="display-3">Selamat Datang di Forum</h2>
      <p class="lead">Disini adalah wadah berdiskusi antara anggota KAHMIPreneurs</p>
      <hr class="my-4">
      <p>Sudah terdaftar di KAHMIPreneur ?</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Daftar Sekarang</a>
      </p>
    </div>

    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('forum.create') }}" class="btn btn-success btn-block">Buat Diskusi</a><br>
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