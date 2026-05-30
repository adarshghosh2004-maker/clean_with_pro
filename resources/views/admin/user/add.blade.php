@extends('admin.layout.page-app')
@section('page_title', __('label.add_quote'))
@section('tab_title', __('label.add_quote'))

@section('content')
    @include('admin.layout.sidebar')

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.add_user')}}</h1>
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
                            {{__('label.add_user')}}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.user.index') }}"
                        class="btn btn-default mw-120 mt-14">{{__('label.user_list')}}</a>
                </div>
            </div>

            <div class="custom-border-card">
                <form id="user" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="{{ __('label.name_here') }}" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.email')}}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="{{ __('label.email_here') }}" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.phone')}}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="{{ __('label.phone_here') }}" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.suburb')}}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="suburb"
                                            placeholder="{{ __('label.suburb_here') }}" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.date')}}<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.time')}}<span class="text-danger">*</span></label>
                                        <input type="time" class="form-control" name="time"
                                            placeholder="{{ __('label.time_here') }}" value="00:00" step="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('label.service')}}<span class="text-danger">*</span></label>
                                        <select class="form-control" name="service_id">
                                            @foreach ($services as $key => $value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>{{__('label.msg')}}<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="msg" placeholder="{{ __('label.msg_here') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top pt-3 text-right">
                        <button type="button" class="btn btn-default mw-120"
                            onclick="save_user()">{{__('label.save')}}</button>
                        <a href="{{route('admin.user.index')}}"
                            class="btn btn-cancel mw-120 ml-2">{{__('label.cancel')}}</a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('#service_id').select2();

        function save_user() {

            var Check_Admin = '<?php echo Demo_Mode(); ?>';
            if (Check_Admin == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#user")[0]);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.user.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'user', '{{ route("admin.user.index") }}');
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