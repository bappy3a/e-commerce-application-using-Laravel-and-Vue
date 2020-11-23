@extends('backend.layouts.app')

@section('content')

<div class="bg-light lter b-b wrapper-md">
	<div class="row">
		<div class="col-md-6">
			<h1 class="m-n font-thin h3">Products</h1>
		</div>
		<div class="col-md-6">
			<a href="{{ route('product.create') }}" class="btn m-b-xs w-xs btn-success btn-sm pull-right">Add New</a>
		</div>
	</div>
</div>
  <div class="wrapper-md">
    <div class="panel panel-default">
      <div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th data-breakpoints="xs">#</th>
              <th width="10%">Image</th>
              <th>Name</th>
              <th>Proice</th>
              <th>Stock</th>
              <th>Featured</th>
              <th>Published</th>
              <th width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($products as $key=>$product)
	            <tr>
	              <td>#{{ $key + 1 }}</td>
	              <td><img style="width: 60px;height: 60px" src="{{ asset($product->thumbnail_img) }}" alt=""></td>
	              <td>{{ $product->name }}</td>
                <td>${{ $product->unit_price }}</td>
                <td>{{ $product->current_stock }} (Pc)</td>
                <td>
                  <label class="i-switch m-t-xs m-r">
                    <input onchange="update_featured(this)" type="checkbox" <?php if($product->featured == 1) echo "checked";?> value="{{ $product->id }}" >
                    <i></i>
                  </label>
                </td>
                <td>
                  <label class="i-switch m-t-xs m-r">
                    <input onchange="update_featured(this)" type="checkbox" <?php if($product->published == 1) echo "checked";?> value="{{ $product->id }}" >
                    <i></i>
                  </label>
                </td>
                <td>
                  <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="{{ route('product.delete',$product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>
                </td>
	            </tr>
	        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script type="text/javascript">
    function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    alert('Featured products updated successfully');
                }
                else{
                    alert('Something went wrong!!!');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('Published products updated successfully');
                }
                else{
                    showAlert('Something went wrong!!!');
                }
            });
        }
  </script>
@endsection