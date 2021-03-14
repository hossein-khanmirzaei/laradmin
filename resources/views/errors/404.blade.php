@extends('layouts.app')

@section('title', __('pageNotFound'))

@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 404</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i>{{ __('pageNotFound') }}</h3>

        <p>
            {{ __('couldNotFindThePage') }}
            {!! __('returnToDashboardText', ['link' => '<a href="' . route('home') . '">' . __('returnToDashboardLink') . '</a>']) !!}
        </p>
    </div>
    <!-- /.error-content -->
</div>
<!-- /.error-page -->
@endsection
