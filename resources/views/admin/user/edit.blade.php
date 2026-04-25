@extends('admin.layout.page-app')
@section('page_title', __('label.edit_user'))

@section('content')
	@include('admin.layout.sidebar')

	<!-- Select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

	<div class="right-content">
		@include('admin.layout.header')

		<div class="body-content">
			<!-- mobile title -->
			<h1 class="page-title-sm">{{__('label.edit_user')}}</h1>

			<div class="border-bottom row mb-3">
				<div class="col-sm-10">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ route('admin.user.index') }}">{{__('label.user')}}</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							{{__('label.edit_user')}}
						</li>
					</ol>
				</div>
				<div class="col-sm-2 d-flex align-items-center justify-content-end">
					<a href="{{ route('admin.user.index') }}"
						class="btn btn-default mw-120 mt-14">{{__('label.user_list')}}</a>
				</div>
			</div>

			<div class="card custom-border-card">
				<div class="card-body">
					<form name="user" id="user_update" enctype="multipart/form-data" autocomplete="off">
						<input type="hidden" name="id" value="@if($data){{$data->id}}@endif">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-row">
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.name')}}<span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="name"
												placeholder="{{ __('label.name_here') }}" value="{{ $data->name ?? '' }} ">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.email')}}<span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="email"
												placeholder="{{ __('label.email_here') }}" value="{{ $data->email ?? '' }}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.phone')}}<span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="phone"
												placeholder="{{ __('label.phone_here') }}" value="{{ $data->phone ?? '' }}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.suburb')}}<span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="suburb"
												placeholder="{{ __('label.suburb_here') }}" value="{{ $data->suburb ?? '' }}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.date')}}<span class="text-danger">*</span></label>
											<input type="date" class="form-control" name="date" value="{{ $data->date ?? '' }}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.time')}}<span class="text-danger">*</span></label>
											<input type="time" class="form-control" name="time"
												placeholder="{{ __('label.time_here') }}" value="{{ $data->time ?? '00:00' }}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.service')}}<span class="text-danger">*</span></label>
											<select class="form-control" name="service_id">
												@foreach ($services as $key => $value)
													<option value="{{$value->id}}" {{ $data->service_id == $value->id ? 'selected' : '' }}>{{$value->title}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label>{{__('label.msg')}}<span class="text-danger">*</span></label>
											<textarea class="form-control" name="msg"
												placeholder="{{ __('label.msg_here') }}">{{ $data->msg ?? '' }}</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="border-top pt-3 text-right">
							<button type="button" class="btn btn-default mw-120"
								onclick="update_user()">{{__('label.update')}}</button>
							<a href="{{route('admin.user.index')}}"
								class="btn btn-cancel mw-120 ml-2">{{__('label.cancel')}}</a>
							<input type="hidden" name="_method" value="PATCH">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('pagescript')
	<!-- Select2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script>
		$('#access_type').select2({
			placeholder: "{{__('label.select_access_type')}}"
		});

		function update_user() {

			var Check_Admin = '<?php echo Demo_Mode(); ?>';
			if (Check_Admin == 1) {

				$("#dvloader").show();
				var formData = new FormData($("#user_update")[0]);

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'POST',
					url: '{{route("admin.user.update", [$data->id])}}',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: function (resp) {
						$("#dvloader").hide();
						get_responce_message(resp, 'user_update', '{{ route("admin.user.index") }}');
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						$("#dvloader").hide();
						toastr.error(errorThrown, textStatus);
					}
				});
			} else {
				toastr.error('{{__("label.you_have_no_right_to_add_edit_and_delete")}}');
			}
		}

		$(document).ready(function () {

			var user_time = "<?php echo $data->type; ?>";
			if (user_time == "Day") {
				for (let i = 8; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (user_time == "Week") {
				for (let i = 5; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (user_time == "Month") {
				for (let i = 13; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (user_time == "Year") {
				for (let i = 2; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else {
				$('.time').hide();
			}
		});

		$('#user_time').on('click', function () {

			$('.time').show();
			var type = $("#user_time").val()

			for (let i = 1; i <= 31; i++) {
				$(".time option[value=" + i + "]").show();
				$(".time option[value=" + i + "]").attr("selected", false);
			}

			if (type == "Day") {
				for (let i = 8; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (type == "Week") {
				for (let i = 5; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (type == "Month") {
				for (let i = 13; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (type == "Year") {
				for (let i = 2; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else {
				$('.time').hide();
			}
		})
	</script>
@endsection