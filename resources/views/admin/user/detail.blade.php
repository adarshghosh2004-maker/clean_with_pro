@extends('admin.layout.page-app')
@section('page_title', __('label.quote_details'))
@section('tab_title', __('label.quote_details'))

@section('content')
	@include('admin.layout.sidebar')

	<!-- Select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

	<div class="right-content">
		@include('admin.layout.header')

		<div class="body-content">
			<!-- mobile title -->
			<h1 class="page-title-sm">{{ __('label.quote_details') }}</h1>

			{{-- Breadcrumb --}}
			<div class="border-bottom row mb-3">
				<div class="col-sm-10">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ route('admin.user.index') }}">{{ __('label.quotes') }}</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							{{ __('label.quote_details') }}
						</li>
					</ol>
				</div>
				<div class="col-sm-2 d-flex align-items-center justify-content-end">
					<a href="{{ route('admin.user.index') }}" class="btn btn-default mw-120 mt-14">
						{{ __('label.quotes') }}
					</a>
				</div>
			</div>

			<form id="user_update" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" name="id" value="@if($quote){{$quote->id}}@endif">
				{{-- ── Quote Info Card (read-only) ── --}}
				<div class="detail-card">
					<h5>{{ __('label.quote_details') }}</h5>

					<div class="row g-3">
						{{-- Name --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.name') }}</label>
							<input type="text" class="form-control-static" name="name" value="{{ $quote->name }}" readonly>
						</div>

						{{-- Email --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.email') }}</label>
							<input type="text" class="form-control-static" name="email" value="{{ $quote->email }}"
								readonly>
						</div>

						{{-- Phone --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.phone') }}</label>
							<input type="text" class="form-control-static" name="phone" value="{{ $quote->phone }}"
								readonly>

						</div>

						{{-- Suburb --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.suburb') }}</label>
							<input type="text" class="form-control-static bg-white" name="suburb" value="{{ $quote->suburb }}">
						</div>
						{{-- Current Status (badge display) --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.current_status') }}</label>
							<div class="form-control-static">
								@php
									$statusLabels = [
										0 => __('label.pending'),
										1 => __('label.confirmed'),
										2 => __('label.completed'),
										3 => __('label.cancelled'),
									];
								@endphp
								<span class="status-badge status-{{ $quote->status }}">
									{{ $statusLabels[$quote->status] ?? __('label.unknown') }}
								</span>
							</div>
						</div>

						{{-- Amount (display only; editable below) --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.amount') }}</label>
							<div class="form-control-static">
								{{ $quote->amount ? '$' . $quote->amount : '-' }}
							</div>
						</div>
					</div>
					<div class="row g-3 mt-1">
						<div class="col-12 detail-field">
							<label>{{ __('label.message') }}</label>
							<div class="msg-box">{{ $quote->msg }}</div>
						</div>
					</div>
					<div class="row">
						{{-- Date --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.date') }}</label>
							<input type="date" class="form-control-static bg-white" name="date" value="{{ $quote->date }}">

						</div>
						{{-- Time --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.time') }}</label>
							<select name="time" class="form-control-static bg-white" required>
								<option value="">{{ __('label.select_a_time') }}</option>
								<option value="07:00" {{ $quote->time == '07:00' ? 'selected' : ''}}>7:00 AM</option>
								<option value="07:30" {{ $quote->time == '07:30' ? 'selected' : ''}}>7:30 AM</option>
								<option value="08:00" {{ $quote->time == '08:00' ? 'selected' : ''}}>8:00 AM</option>
								<option value="08:30" {{ $quote->time == '08:30' ? 'selected' : ''}}>8:30 AM</option>
								<option value="09:00" {{ $quote->time == '09:00' ? 'selected' : ''}}>9:00 AM</option>
								<option value="09:30" {{ $quote->time == '09:30' ? 'selected' : ''}}>9:30 AM</option>
								<option value="10:00" {{ $quote->time == '10:00' ? 'selected' : ''}}>10:00 AM</option>
								<option value="10:30" {{ $quote->time == '10:30' ? 'selected' : ''}}>10:30 AM</option>
								<option value="11:00" {{ $quote->time == '11:00' ? 'selected' : ''}}>11:00 AM</option>
								<option value="11:30" {{ $quote->time == '11:30' ? 'selected' : ''}}>11:30 AM</option>
								<option value="12:00" {{ $quote->time == '12:00' ? 'selected' : ''}}>12:00 PM</option>
								<option value="12:30" {{ $quote->time == '12:30' ? 'selected' : ''}}>12:30 PM</option>
								<option value="13:00" {{ $quote->time == '13:00' ? 'selected' : ''}}>1:00 PM</option>
								<option value="13:30" {{ $quote->time == '13:30' ? 'selected' : ''}}>1:30 PM</option>
								<option value="14:00" {{ $quote->time == '14:00' ? 'selected' : ''}}>2:00 PM</option>
								<option value="14:30" {{ $quote->time == '14:30' ? 'selected' : ''}}>2:30 PM</option>
								<option value="15:00" {{ $quote->time == '15:00' ? 'selected' : ''}}>3:00 PM</option>
								<option value="15:30" {{ $quote->time == '15:30' ? 'selected' : ''}}>3:30 PM</option>
								<option value="16:00" {{ $quote->time == '16:00' ? 'selected' : ''}}>4:00 PM</option>
								<option value="16:30" {{ $quote->time == '16:30' ? 'selected' : ''}}>4:30 PM</option>
								<option value="17:00" {{ $quote->time == '17:00' ? 'selected' : ''}}>5:00 PM</option>
								<option value="17:30" {{ $quote->time == '17:30' ? 'selected' : ''}}>5:30 PM</option>
								<option value="18:00" {{ $quote->time == '18:00' ? 'selected' : ''}}>6:00 PM</option>
								<option value="18:30" {{ $quote->time == '18:30' ? 'selected' : ''}}>6:30 PM</option>
								<option value="19:00" {{ $quote->time == '19:00' ? 'selected' : ''}}>7:00 PM</option>
							</select>
						</div>

						{{-- Service --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.service') }}</label>
							<select name="service_id" class="form-control-static bg-white">
								<option value="0" {{ $quote->service_id == 0 ? 'selected' : ''}}>{{ __('label.special_offer') }}</option>
								@foreach ($services as $key => $value)
									<option value="{{ $value->id }}" {{ $quote->service_id == $value->id ? 'selected' : '' }}>
										{{ $value->title }}
									</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				{{-- ── Editable Fields Card ── --}}
				<div class="detail-card">
					<h5>{{ __('label.update_quote') }}</h5>

					<div class="row g-3">
						{{-- Status (editable) --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.status') }} <span class="text-danger">*</span></label>
							<select name="status" class="form-select" required>
								<option value="0" {{ $quote->status == 0 ? 'selected' : '' }}>{{ __('label.pending') }}</option>
								<option value="1" {{ $quote->status == 1 ? 'selected' : '' }}>{{ __('label.confirmed') }}</option>
								<option value="2" {{ $quote->status == 2 ? 'selected' : '' }}>{{ __('label.completed') }}</option>
								<option value="3" {{ $quote->status == 3 ? 'selected' : '' }}>{{ __('label.cancelled') }}</option>
							</select>
							@error('status')
								<div class="text-danger mt-1" style="font-size:12px">{{ $message }}</div>
							@enderror
						</div>

						{{-- Amount (editable) --}}
						<div class="col-md-4 detail-field">
							<label>{{ __('label.amount') }}</label>
							<input type="number" name="amount" class="form-control"
								value="{{ old('amount', $quote->amount) }}" min="0" placeholder="{{ __('label.enter_amount') }}">
						</div>
					</div>

					{{-- Reply Message (editable) --}}
					<div class="row g-3 mt-1">
						<div class="col-12 detail-field">
							<label>{{ __('label.reply') }}</label>
							<textarea name="reply" class="form-control" rows="4"
								placeholder="{{ __('label.write_reply') }}">{{ old('reply', $quote->reply) }}</textarea>
							@error('reply')
								<div class="text-danger mt-1" style="font-size:12px">{{ $message }}</div>
							@enderror
						</div>
					</div>

					{{-- Action Buttons --}}
					<div class="d-flex justify-content-end">
						<button type="button" class="btn btn-default mr-3" onclick="update_user()">
							{{ __('label.update') }}
						</button>
						<a href="{{ route('admin.user.index') }}" class="btn btn-cancel">
							{{ __('label.cancel') }}
						</a>
						<input type="hidden" name="_method" value="PATCH">
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('pagescript')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script>
		$(document).ready(function () {
			$('select[name="status"]').select2({
				minimumResultsForSearch: Infinity,
				width: '100%'
			});
		});

		function update_user() {

			var Check_Admin = '<?php echo Demo_Mode(); ?>';
			if (Check_Admin == 1) {

				$("#dvloader").show();
				var formData = new FormData($("#user_update")[0]);
				console.log(formData);

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'POST',
					url: '{{route("admin.user.update", [$quote->id])}}',
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
	</script>
@endsection