@extends('layouts.app')

@section('title', 'Server Error!')

@section('content')
<div class="error-page">
    <h2 class="headline text-danger">500</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i>{{ __('somthingWrong') }}</h3>

        <p>
            {{ __('workOnFixing') }}
            {{ __('meanwhileYouMay') }} <a href="{{ route('home') }}">{{ __('returnToDashboard') }}</a>{{ __('trySearchForm') }}
        </p>
    </div>
</div>
<!-- /.error-page -->
@endsection
