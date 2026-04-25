@extends('admin.layout.page-app')
@section('page_title', __('label.edit_question'))

@section('content')
	@include('admin.layout.sidebar')

	<!-- Select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

	<div class="right-content">
		@include('admin.layout.header')

		<div class="body-content">
			<!-- mobile title -->
			<h1 class="page-title-sm">{{__('label.edit_question')}}</h1>

			<div class="border-bottom row mb-3">
				<div class="col-sm-10">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ route('admin.question.index') }}">{{__('label.question')}}</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							{{__('label.edit_question')}}
						</li>
					</ol>
				</div>
				<div class="col-sm-2 d-flex align-items-center justify-content-end">
					<a href="{{ route('admin.question.index') }}"
						class="btn btn-default mw-120 mt-14">{{__('label.question_list')}}</a>
				</div>
			</div>

			<div class="card custom-border-card">
				<div class="card-body">
					<form id="question" enctype="multipart/form-data">
						<input type="hidden" name="id" value="{{ $data->id }}">
						<input type="hidden" name="old_img_1" value="{{ $data->img_1 }}">
						<input type="hidden" name="old_img_2" value="{{ $data->img_2 }}">
						<input type="hidden" name="old_img_3" value="{{ $data->img_3 }}">
						<div class="form-row">
							<div class="col-md-5 mr-4">
								<div class="form-row">
									<div class="col-md-12">
										<div class="form-group">
											<label>{{__('label.service')}}<span class="text-danger">*</span></label>
											<select class="form-control" name="service_id">
												<option value="">{{__('label.select_service')}}</option>
												@foreach ($services as $key => $value)
													<option value="{{$value->id}}" {{ $data->service_id == $value->id ? "selected" : "" }}>{{$value->title}}
													</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label>{{__('label.description')}}<span class="text-danger">*</span></label>
											<textarea name="description" class="form-control"
												placeholder="{{__('label.description_here')}}"
												rows="3">{{ $data->description }}</textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 ml-4">
								<div class="form-row">
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.image_1')}}<span class="text-danger">*</span></label>
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' name="img_1" id="imageUpload"
														accept=".png, .jpg, .jpeg, .webp" />
													<label for="imageUpload" title="{{__('label.upload_file')}}"></label>
												</div>
												<div class="avatar-preview">
													<img src="{{ $data->img_1}}" id="imagePreview">
												</div>
											</div>
											<label class="mt-3 text-gray">{{__('label.max_size_5mb')}}</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.image_2')}}<span class="text-danger">*</span></label>
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' name="img_2" id="imageUpload2"
														accept=".png, .jpg, .jpeg, .webp" />
													<label for="imageUpload2" title="{{__('label.upload_file')}}"></label>
												</div>
												<div class="avatar-preview">
													<img src="{{$data->img_2}}" id="imagePreview2">
												</div>
											</div>
											<label class="mt-3 text-gray">{{__('label.max_size_5mb')}}</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>{{__('label.image_3')}}<span class="text-danger">*</span></label>
											<div class="avatar-upload ">
												<div class="avatar-edit">
													<input type='file' name="img_3" id="imageUpload3"
														accept=".png, .jpg, .jpeg, .webp" />
													<label for="imageUpload3" title="{{__('label.upload_file')}}"></label>
												</div>
												<div class="avatar-preview">
													<img src="{{$data->img_3}}" id="imagePreview3">
												</div>
											</div>
											<label class="mt-3 text-gray">{{__('label.max_size_5mb')}}</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="border-top pt-3 text-right">
							<button type="button" class="btn btn-default mw-120"
								onclick="update_question()">{{__('label.update')}}</button>
							<a href="{{route('admin.question.index')}}"
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

		function update_question() {

			var Check_Admin = '<?php echo Demo_Mode(); ?>';
			if (Check_Admin == 1) {

				$("#dvloader").show();
				var formData = new FormData($("#question")[0]);

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'POST',
					url: '{{route("admin.question.update", [$data->id])}}',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: function (resp) {
						$("#dvloader").hide();
						get_responce_message(resp, 'question', '{{ route("admin.question.index") }}');
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
	</script>
@endsection