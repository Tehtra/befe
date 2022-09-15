@extends('base')
@section('main')
<main id='main'>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Preview</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Content</td>
          <td>Category</td>
          <td>Created Date</td>
          <td>Updated Date</td>
          <td>Status</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $postspreview)
        <tr>
            <td>{{$postspreview->id}}</td>
            <td>{{$postspreview->title}}</td>
            <td>{{$postspreview->content}}</td>
            <td>{{$postspreview->category}}</td>
            <td>{{$postspreview->created_at}}</td>
            <td>{{$postspreview->updated_at}}</td>
            <td>{{$postspreview->status}}</td>
            <td>
                <a href="{{ route('posts.edit',$postspreview->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('posts.destroy', $postspreview->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
<span>
    {{ $posts->links() }}
</span>
@endsection