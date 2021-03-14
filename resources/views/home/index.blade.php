@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    @if (Auth::user()->is_super)
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{__('menu')}}</h3>

                        <p>{{__('manageMenus')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <a href="{{ route('menus.index') }}" class="small-box-footer">{{__('enter')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{__('user')}}</h3>

                        <p>{{__('manageUsers')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">{{__('enter')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{__('system')}}</h3>

                        <p>{{__('manageLogs')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <a href="{{ route('settings.index') }}" class="small-box-footer">{{__('enter')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    @endif
@endsection
