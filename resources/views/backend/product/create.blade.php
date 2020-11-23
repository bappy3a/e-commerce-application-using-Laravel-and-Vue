@extends('backend.layouts.app')

@section('content')

<div class="bg-light lter b-b wrapper-md">
	<div class="row">
		<div class="col-md-6">
			<h1 class="m-n font-thin h3">Products</h1>
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
          <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name" required>
            </div>
            <div class="form-group">
              <label>Categorys</label>
              <select name="category_id" class="form-control" required>
                <option value=""> -- Select Category --</option>
                @foreach($categorys as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="number" class="form-control" placeholder="Price" name="unit_price" required value="0">
            </div>
            <div class="form-group">
              <label>Discount</label>
              <input type="number" class="form-control" placeholder="Discount" name="discount" required value="0">
            </div>
            <div class="form-group">
              <label>Current Stock</label>
              <input type="number" class="form-control" placeholder="Current Stock" name="current_stock" required value="0">
            </div>
            <div class="form-group">
              <label>Shipping Cost</label>
              <input type="number" class="form-control" placeholder="Current Stock" name="shipping_cost" required value="0">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <textarea  class="form-control" name="description" rows="4" cols="50" style="border-radius:6px;"></textarea>
            </div>
            <div class="form-group">
              <label>Thumbnail Image</label>
              <input type="file" class="form-control" name="thumbnail_img" required>
            </div>
            <div class="form-group">
              <label>Image Gallary <spam style="font-size: 12px; color: red">(Select multiple)</spam></label>
              <input type="file" class="form-control" name="photos[]" required multiple>
            </div>
            <button type="submit" class="btn btn-sm btn-primary pull-right">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection