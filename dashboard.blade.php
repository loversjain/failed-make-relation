@extends('layout.master')
@section('title')
Welcome  {{isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email}}
@endsection

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="post" action="{{ route('post.create') }}">
			<div class="form-group">
				<textarea name="post" class="form-control" rows="6" cols="5"></textarea>
				
			</div>
			<div class="form-group">
				<button class="btn btn-primary" name="submit">Create Post</button>
				<input type="hidden" value="{{Session::token()}}" name="_token"> 
			</div>
			<div class="form-group">@include('includes.message')</div>

		 </form>
	</div>
</div>
<div class="row">
<div class="col-md-6 col-md-offset-4">
<div class="bs-callout" style="border-left-color: #ce4844;" id="callout-input-needs-type"> <h4>Type declaration required</h4> <p>Inputs will only be fully styled if their <code>type</code> is properly declared.</p> </div>
</div>
</div>
@endsection
