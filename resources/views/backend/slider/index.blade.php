@extends('backend.layouts.app')

@section('content')

<div class="bg-light lter b-b wrapper-md">
	<div class="row">
		<div class="col-md-6">
			<h1 class="m-n font-thin h3">Sliders</h1>
		</div>
		<div class="col-md-6">
			<a href="{{ route('slider.create') }}" class="btn m-b-xs w-xs btn-success btn-sm pull-right">Add New</a>
		</div>
	</div>
</div>
  <div class="wrapper-md">
    <div class="panel panel-default">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th data-breakpoints="xs">#</th>
              <th>Image</th>
              <th width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($sliders as $key=>$slider)
	            <tr>
	              <td>{{ $key + 1 }}</td>
	              <td><img style="width: 60px;height: 60px" src="{{ asset($slider->image) }}" alt=""></td>
                <td>
                  <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                  <a href="{{ route('slider.destroy',$slider->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>
                </td>
	            </tr>
	        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection