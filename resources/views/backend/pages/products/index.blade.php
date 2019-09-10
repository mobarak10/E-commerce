@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Manage Product
			</div>
			<div class="card-body">
				@include('backend.partial.messages')
				<table class="table table-hover">
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Action</th>
					</tr>
					{{-- products variable comes from Backend/ProductController index method --}}
					@foreach ($products as $product) 
						<tr>
							<td>{{ $loop->index +1 }}</td> {{-- in laravel when foreach loop is create $loop variable is auto genarate --}}
							<td>{{ $product->title }}</td>
							<td>{{ $product->price}}</td>
							<td>{{ $product->quantity }}</td>
							<td>
								<a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Edit</a>

								<a href="#deleteModel{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

								<!-- Delete Modal -->
								<div class="modal fade" id="deleteModel{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">

											<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>

											<div class="modal-body">
												<form action="{{ route('admin.product.delete', $product->id) }}" method="post">
													{{ csrf_field() }}
													<button type="submit" class="btn btn-danger">Parmanent Delete</button>
												</form>
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											</div>

										</div>
									</div>
								</div>

							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
