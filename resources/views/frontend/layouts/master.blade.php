<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title', 'Laravel Ecommerce')
	</title>
	@include('frontend.partial.style')

</head>
<body>
	<!-- start navbar -->
	<div class="wrapper">

	@include('frontend.partial.nav')
	@include('frontend.partial.messages')
	@yield("content")

	@include('frontend.partial.footer')
		
	</div>
	<!-- end navbar -->

	@include('frontend.partial.scripts')
	@yield('scripts')

</body>
</html>