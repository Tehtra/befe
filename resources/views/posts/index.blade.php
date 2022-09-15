@extends('base')
@section('main')

  <main id="main">
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
          @foreach($posts as $posts)
          <tr>
              <td>{{$posts->id}}</td>
              <td>{{$posts->title}}</td>
              <td>{{$posts->content}}</td>
              <td>{{$posts->category}}</td>
              <td>{{$posts->created_at}}</td>
              <td>{{$posts->updated_at}}</td>
              <td>{{$posts->status}}</td>
              <td>
                  <a href="{{ route('posts.edit',$posts->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <form action="{{ route('posts.destroy', $posts->id)}}" method="post">
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
  <div class="col-sm-12">
  
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection