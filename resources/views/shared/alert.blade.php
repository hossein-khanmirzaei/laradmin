@foreach (['success', 'danger', 'warning', 'info'] as $status)
	@if (session()->has($status))
		<div class="alert alert-dismissible alert-{{ $status }}" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>
			<h5>
				@if ('success' == $status)
					<i class="icon fas fa-check"></i> {{__('success')}}!
				@elseif ('danger' == $status)
					<i class="icon fas fa-ban"></i> {{__('error')}}!
				@elseif ('warning' == $status)
					<i class="icon fas fa-exclamation-triangle"></i> {{__('warning')}}!
				@elseif ('info' == $status)
					<i class="icon fas fa-info"></i> {{__('information')}}!
				@endif
			</h5>
			{{ session()->get($status) }}
		</div>
	@endif
@endforeach

@if (count($errors))
	<div class="alert alert-dismissible alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>
		<h5>
			<i class="icon fas fa-ban"></i> {{__('validationError')}}!
		</h5>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
