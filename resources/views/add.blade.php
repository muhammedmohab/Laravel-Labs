@extends('layout/bloglayout')
@section('title')
    Add Post
@endsection
@section('topcontent')
<form action="{{route("posts.store")}}" method="post">
  @csrf
  <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-white">Id</label>
        <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled/>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-white">Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-white">Discription</label>
        <textarea name="discription" id="" cols="30" rows="5" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <select name="user" class="form-control" aria-label="Default select example">
          @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-success">Submit</button>
      
</form>
<div class="mt-3">
  <x-button type="primary" href="/posts">Back</x-button>
</div>
@endsection