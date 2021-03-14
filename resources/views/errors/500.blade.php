@extends('layouts.app')

@section('title', __('serverError'))

@section('content')
<div class="error-page">
    <h2 class="headline text-danger">500</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i>{{ __('somthingWrong') }}</h3>

        <p>
            {{ __('workOnFixing') }}
            {!! __('returnToDashboardText', ['link' => '<a href="' . route('home') . '">' . __('returnToDashboardLink') . '</a>']) !!}
        </p>
    </div>
</div>
<!-- /.error-page -->
@endsection
