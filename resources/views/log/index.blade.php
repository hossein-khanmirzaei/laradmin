@extends('layouts.app')

@section('title', __('log.module') . ' ' . __('List'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('log.module') . ' ' . __('List') }}</h3>
            </div>

            <div class="card-body">
                <table id="logs-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('log.id') }}</th>
                            <th>{{ __('log.created_at') }}</th>
							<th>{{ __('log.user_id') }}</th>
							<th>{{ __('log.ip') }}</th>
							<th>{{ __('log.code') }}</th>
							<th>{{ __('log.path') }}</th>
							<th>{{ __('log.action') }}</th>
							<th>{{ __('log.model') }}</th>
							<th>{{ __('log.model_id') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <thead>
                        <tr>
                            <th>{{ __('log.id') }}</th>
                            <th>{{ __('log.created_at') }}</th>
							<th>{{ __('log.user_id') }}</th>
							<th>{{ __('log.ip') }}</th>
							<th>{{ __('log.code') }}</th>
							<th>{{ __('log.path') }}</th>
							<th>{{ __('log.action') }}</th>
							<th>{{ __('log.model') }}</th>
							<th>{{ __('log.model_id') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
	$('#logs-table').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax':{
            'url': "{{ route('paginatedLogs') }}",
            'dataType': 'json',
            'type': 'POST',
            'data': { _token: "{{ csrf_token() }}"},
        },
        'columns': [
            {
                'data': 'id',
                'name': 'id'
             },
            {
                'data': 'created_at',
                'name': 'created_at'
            },
            {
                'data': 'user.username',
                'name': 'user_id',
                'defaultContent': '',
                //'searchable': false
            },
            {
                'data': 'ip',
                'name': 'ip',
                //'searchable': false
            },
            {
                'data': 'code',
                'name': 'code'
            },
            {
                'data': 'path',
                'name': 'path'
            },
            {
                'data': 'action',
                'name': 'action'
            },
            {
                'data': 'model',
                'name': 'model'
            },
            {
                'data': 'model_id',
                'name': 'model_id'
            },
            {
                'data': 'actionLinks',
                'name': 'actionLinks',
                'defaultContent': "",
                'orderable': false,
                'searchable': false
            }
        ],
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'language': {
            'url': "{{ config('app.locale') == 'en' ? '' : asset('plugins/datatables/lang/' . config('app.locale') . '.json') }}"
        }
    });
</script>
@endpush
