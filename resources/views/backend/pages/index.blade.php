@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card card-body">
			<h3>Welcome to admin panel</h3>
			<br>
			<br>
			<p>
				<a href="{{ route('index') }}" target="_blank" class="btn btn-primary btn-lg">Visit main site</a>
			</p>
		</div>
	</div>
	<!-- content-wrapper ends -->
	<!-- partial:partials/_footer.html -->
	<footer class="footer">
		<div class="container-fluid clearfix">
			<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Joy</a>. All rights reserved.</span>
			<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made with Laravel <i class="mdi mdi-heart text-danger"></i>
			</span>
		</div>
	</footer>
	<!-- partial -->
</div>
<!-- main-panel ends -->

@endsection
