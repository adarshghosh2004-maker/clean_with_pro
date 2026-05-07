@extends('admin.layout.page-app')
@section('page_title', __('label.add_service'))

@section('content')
    @include('admin.layout.sidebar')

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.add_service')}}</h1>
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
                            {{__('label.add_service')}}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.service.index') }}"
                        class="btn btn-default mw-120 mt-14">{{__('label.service_list')}}</a>
                </div>
            </div>

            <div class="custom-border-card">
                <form id="service" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('label.title')}}<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="{{__('label.name_here')}}"
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('label.short_title')}}<span class="text-danger">*</span></label>
                                <input type="text" name="short_title" class="form-control"
                                    placeholder="{{__('label.short_title_here')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__('label.description')}}<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description"
                                    placeholder="{{ __('label.description_here') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ml-5">{{__('label.banner_image')}}<span class="text-danger">*</span></label>
                                <div class="avatar-upload ml-5">
                                    <div class="avatar-edit">
                                        <input type='file' name="banner_img" id="imageUpload"
                                            accept=".png, .jpg, .jpeg, .webp" />
                                        <label for="imageUpload" title="Select File"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <img src="{{asset('assets/imgs/upload_img.png')}}" alt="upload_img.png"
                                            id="imagePreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ml-5">{{__('label.detail_image1')}}<span class="text-danger">*</span></label>
                                <div class="avatar-upload ml-5">
                                    <div class="avatar-edit">
                                        <input type='file' name="detail_img1" id="imageUpload2"
                                            accept=".png, .jpg, .jpeg, .webp" />
                                        <label for="imageUpload2" title="Select File"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <img src="{{asset('assets/imgs/upload_img.png')}}" alt="upload_img.png"
                                            id="imagePreview2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ml-5">{{__('label.detail_image2')}}<span class="text-danger">*</span></label>
                                <div class="avatar-upload ml-5">
                                    <div class="avatar-edit">
                                        <input type='file' name="detail_img2" id="imageUpload3"
                                            accept=".png, .jpg, .jpeg, .webp" />
                                        <label for="imageUpload3" title="Select File"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <img src="{{asset('assets/imgs/upload_img.png')}}" alt="upload_img.png"
                                            id="imagePreview3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top pt-3 text-right">
                        <button type="button" class="btn btn-default mw-120"
                            onclick="save_service()">{{__('label.save')}}</button>
                        <a href="{{route('admin.service.index')}}"
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
        $('#access_type').select2({
            placeholder: "{{__('label.select_access_type')}}"
        });

        function save_service() {

            var Check_Admin = '<?php echo Demo_Mode(); ?>';
            if (Check_Admin == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#service")[0]);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.service.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'service', '{{ route("admin.service.index") }}');
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