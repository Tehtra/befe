@extends('base') 
@section('main')
<main id="main">
<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link {{ request()->is('allpost1') ? 'active' : null }}"  href="{{ url('allpost1')}}" role="tab">Publish</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->is('draft') ? 'active' : null }}"  href="{{ url('draft')}}" role="tab">Draft</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ request()->is('thrash') ? 'active' : null }}"  href="{{ url('thrash')}}" role="tab">Trash</a>
	</li>
</ul><!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane {{ request()->is('allpost1') ? 'active' : null }}" id="{{ url('allpost1')}}" role="tabpanel">
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
                @foreach($posts as $postspub)
                <tr>
                    <td>{{$postspub->id}}</td>
                    <td>{{$postspub->title}}</td>
                    <td>{{$postspub->content}}</td>
                    <td>{{$postspub->category}}</td>
                    <td>{{$postspub->created_at}}</td>
                    <td>{{$postspub->updated_at}}</td>
                    <td>{{$postspub->status}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$postspub->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $postspub->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
	</div>
	<div class="tab-pane {{ request()->is('draft') ? 'active' : null }}" id="{{ url('draft')}}" role="tabpanel">
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
                @foreach($posts as $postsdraft)
                <tr>
                    <td>{{$postsdraft->id}}</td>
                    <td>{{$postsdraft->title}}</td>
                    <td>{{$postsdraft->content}}</td>
                    <td>{{$postsdraft->category}}</td>
                    <td>{{$postsdraft->created_at}}</td>
                    <td>{{$postsdraft->updated_at}}</td>
                    <td>{{$postsdraft->status}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$postsdraft->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $postsdraft->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
	</div>
	<div class="tab-pane {{ request()->is('thrash') ? 'active' : null }}" id="{{ url('thrash')}}" role="tabpanel">
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
                @foreach($posts as $poststhrash)
                <tr>
                    <td>{{$poststhrash->id}}</td>
                    <td>{{$poststhrash->title}}</td>
                    <td>{{$poststhrash->content}}</td>
                    <td>{{$poststhrash->category}}</td>
                    <td>{{$poststhrash->created_at}}</td>
                    <td>{{$poststhrash->updated_at}}</td>
                    <td>{{$poststhrash->status}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$poststhrash->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $poststhrash->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
	</div>
</div>
@endsection