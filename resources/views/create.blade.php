@extends('layouts.app')

@section('title', 'Friends')


@section('content')

<form action="/friends" method='POST'>
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="Text" class="form-control" name="nama" id="Nama">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">No Tlp</label>
    <input type="Text" class="form-control" name="no_tlp" id="No Tlp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Alamat</label>
    <input type="Text" class="form-control" name="alamat" id="Alamat">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection