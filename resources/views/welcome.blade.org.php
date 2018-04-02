<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
	<h1>Hello World !!</h1>
	<!-- <h1>{{ $greeting or 'Hello '}} {{ $name or '' }}</h1> -->
	<!-- HTML 주석 안에서 Foo를(을) 출력합니다. -->
	{{--블레이드 주석 안에서 {{ $name }} 을(를) 출력합니다. --}}
	<h1>Hi Hello Anyong !! Foo</h1>

	@if($itemCount = count($items))
		<p>{{ $itemCount }} 종류의 과일이 있습니다. </p>
	@else
		<p>is there nothing !! </p>
	@endif

	<ul>
	@forelse($items as $item)
		<li>{{ $item }}</li>
	@empty
		<li>is there nothing !!!! </li>
	@endforelse
	<ul>

	@extends('layouts.master')

	@section('style')
	<style>
		body {background: green; color: white;}
	</style>
	@endsection

	@section('content')
		@include('partials.footer')
		<p>Im 'content' section of Child view</p>
	@endsection

	@section('script')
		<script>
			// alert("Im 'script' section of Child view !!");
		</script>
		<p>Im 'script' section of Child view !!</p>
	@endsection
</body>
</html>
