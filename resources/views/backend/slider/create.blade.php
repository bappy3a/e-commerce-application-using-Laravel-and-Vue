@extends('backend.layouts.app')

@section('content')

<div class="bg-light lter b-b wrapper-md">
	<div class="row">
		<div class="col-md-6">
			<h1 class="m-n font-thin h3">Slider</h1>
		</div>
	</div>
</div>


<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Create</div>
        <div class="panel-body">
          <form role="form" action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
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