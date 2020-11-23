@extends('backend.layouts.app')

@section('content')

<div class="bg-light lter b-b wrapper-md">
	<div class="row">
		<div class="col-md-6">
			<h1 class="m-n font-thin h3">Category</h1>
		</div>
		<div class="col-md-6">
			<button class="btn m-b-xs w-xs btn-success btn-sm pull-right">Add New</button>
		</div>
	</div>
</div>


<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Create</div>
        <div class="panel-body">
          <form role="form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name" required>
            </div>
            <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-sm btn-primary pull-right">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection