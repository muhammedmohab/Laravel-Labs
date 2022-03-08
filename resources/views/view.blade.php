@extends('layout/bloglayout')
@section('title')
    view post
@endsection
@section('topcontent')
<table class="table table-dark text-white">
    <tbody>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Discription</th>
        <th scope="col">Day</th>
      </tr>    
      <tr>
        <td> {{ $post->id }} </td>
        <td> {{ $post->title }} </td>
        <td> {{ $post->discription }} </td>
        <td> {{ $date }} </td>
      </tr>
  </tbody>
</table>
@endsection
