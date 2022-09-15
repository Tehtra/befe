@extends('base2') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a post</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('posts.update', $posts->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $posts->title }} />
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <input type="text" class="form-control" name="content" value={{ $posts->content }} />
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" name="category" value={{ $posts->category }} />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="status" value={{ $posts->status="publish" }}>Publish</button>
                <button type="submit" class="btn btn-primary" name="status" value={{ $posts->status="draft" }}>Draft</button>
            </div>
        </form>
    </div>
</div>
@endsection