@extends('admin.layout.page-app')
@section('page_title', __('label.edit_service'))
@section('tab_title', __('label.edit_service'))

@section('content')
	@include('admin.layout.sidebar')

	<!-- Select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

	<div class="right-content">
		@include('admin.layout.header')

		<div class="body-content">
			<!-- mobile title -->
			<h1 class="page-title-sm">{{__('label.edit_service')}}</h1>

			<div class="border-bottom row mb-3">
				<div class="col-sm-10">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ route('admin.service.index') }}">{{__('label.service')}}</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							{{__('label.edit_service')}}
						</li>
					</ol>
				</div>
				<div class="col-sm-2 d-flex align-items-center justify-content-end">
					<a href="{{ route('admin.service.index') }}"
						class="btn btn-default mw-120 mt-14">{{__('label.service_list')}}</a>
				</div>
			</div>

			<div class="card custom-border-card">
				<div class="card-body">
					<form name="service" id="service_update" enctype="multipart/form-data" autocomplete="off">
						<input type="hidden" name="id" value="@if($data){{$data->id}}@endif">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label>{{__('label.title')}}<span class="text-danger">*</span></label>
											<input type="text" name="title" class="form-control"
												placeholder="{{__('label.name_here')}}" value="{{ $data->title }}"
												autofocus>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>{{__('label.short_title')}}<span class="text-danger">*</span></label>
											<input type="text" name="short_title" class="form-control"
												placeholder="{{__('label.short_title_here')}}"
												value="{{ $data->short_title }}">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12">
										<div class="form-group">
											<label>{{__('label.description')}}<span class="text-danger">*</span></label>
											<textarea class="form-control" name="description"
												placeholder="{{ __('label.description_here') }}">{{ $data->description }}</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="col-md-3">
								<div class="form-group ml-4">
									<label class="ml-5">{{__('label.banner_image')}}<span
											class="text-danger">*</span></label>
									<div class="avatar-upload ml-5">
										<div class="avatar-edit">
											<input type='file' name="banner_img" id="imageUpload"
												accept=".png, .jpg, .jpeg, .webp" />
											<label for="imageUpload" title="Select File"></label>
										</div>
										<div class="avatar-preview">
											<img src="{{ $data->banner_img }}" alt="upload_img.png" id="imagePreview">
											<label class="mt-1 text-gray">{{__('label.max_size_10mb')}}</label>
										</div>
									</div>
									<input type="hidden" name="old_banner_img" value="{{ $data->banner_img }}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group ml-4">
									<label class="ml-5">{{__('label.detail_image1')}}<span
											class="text-danger">*</span></label>
									<div class="avatar-upload ml-5">
										<div class="avatar-edit">
											<input type='file' name="detail_img1" id="imageUpload2"
												accept=".png, .jpg, .jpeg, .webp" />
											<label for="imageUpload2" title="Select File"></label>
										</div>
										<div class="avatar-preview">
											<img src="{{ $data->detail_img1 }}" alt="upload_img.png" id="imagePreview2">
											<label class="mt-1 text-gray">{{__('label.max_size_10mb')}}</label>
										</div>
									</div>
									<input type="hidden" name="old_detail_img1" value="{{ $data->detail_img1 }}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group ml-4">
									<label class="ml-5">{{__('label.detail_image2')}}<span
											class="text-danger">*</span></label>
									<div class="avatar-upload ml-5">
										<div class="avatar-edit">
											<input type='file' name="detail_img2" id="imageUpload3"
												accept=".png, .jpg, .jpeg, .webp" />
											<label for="imageUpload3" title="Select File"></label>
										</div>
										<div class="avatar-preview">
											<img src="{{ $data->detail_img2 }}" alt="upload_img.png" id="imagePreview3">
											<label class="mt-1 text-gray">{{__('label.max_size_10mb')}}</label>
										</div>
									</div>
									<input type="hidden" name="old_detail_img2" value="{{ $data->detail_img2 }}">
								</div>
							</div>
						</div>
						<div class="border-top pt-3 text-right">
							<button type="button" class="btn btn-default mw-120"
								onclick="update_service()">{{__('label.update')}}</button>
							<a href="{{route('admin.service.index')}}"
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

		function update_service() {

			var Check_Admin = '<?php echo Demo_Mode(); ?>';
			if (Check_Admin == 1) {

				$("#dvloader").show();
				var formData = new FormData($("#service_update")[0]);

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'POST',
					url: '{{route("admin.service.update", [$data->id])}}',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: function (resp) {
						$("#dvloader").hide();
						get_responce_message(resp, 'service_update', '{{ route("admin.service.index") }}');
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

			var service_time = "<?php echo $data->type; ?>";
			if (service_time == "Day") {
				for (let i = 8; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (service_time == "Week") {
				for (let i = 5; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (service_time == "Month") {
				for (let i = 13; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else if (service_time == "Year") {
				for (let i = 2; i <= 31; i++) {
					$(".time option[value=" + i + "]").hide();
				}
			} else {
				$('.time').hide();
			}
		});

		$('#service_time').on('click', function () {

			$('.time').show();
			var type = $("#service_time").val()

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