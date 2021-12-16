@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<a href="/groups/create" class="badge bg-primary">Add Groups</a>
@foreach($groups as $group)

<div class="card border-success" style="width: 18rem;">
    <div class="card-body">
        <a href="/groups/{{ $group['id'] }}" class="card-title">{{ $group['name'] }}</a>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $group['description'] }}</li>
        </ul>
        <hr>
    <a href="/groups/addmembers/{{$group['id']}}"class="badge bg-primary">Add Groups Member</a>    
    <ul class="list-group">    
    @foreach ($group->friends as $friend)

  <li class="list-group-item d-flex justify-content-between align-items-center">
  {{$friend->nama}}
  <form action="/groups/deleteaddmembers/{{ $friend->id }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="badge bg-danger">X</button>
        </form>

    @endforeach
    </ul>
        <hr>
        <a href="/groups/{{ $group['id'] }}/edit" class="badge bg-warning">Edit</a>
        <form action="/groups/{{ $group['id'] }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="badge bg-danger">Delete Group</button>
        </form>
    </div>
</div>

@endforeach

<div>
<div class="row mt-3">
		<div class="col-md-6">
{{ $groups->links() }}
</div>
</div>
</div>

@endsection
