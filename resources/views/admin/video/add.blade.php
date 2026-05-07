@extends('admin.layout.page-app')
@section('page_title', __('label.add_video'))

@section('content')
    @include('admin.layout.sidebar')

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.add_video')}}</h1>
            <div class="border-bottom row mb-3">
                <div class="col-sm-10">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.video.index') }}">{{__('label.video')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{__('label.add_video')}}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.video.index') }}"
                        class="btn btn-default mw-120 mt-14">{{__('label.video_list')}}</a>
                </div>
            </div>

            <div class="custom-border-card">
                <form id="video" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('label.service')}}<span class="text-danger">*</span></label>
                                        <select name="service_id" id="" class="form-control">
                                            <option value="">{{__('label.select_service')}}</option>
                                            @foreach($services as $key => $value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group video_box">
                                        <label>Upload Video</label>
                                        <div id="container" style="position: relative;" class="vup-card">
                                            <div class="vup-card-header">
                                                <div class="vup-card-header-left">
                                                    <div class="vup-icon-badge">
                                                        <i class="fa-solid fa-film"></i>
                                                    </div>
                                                    <div class="vup-header-text">
                                                        <span class="vup-header-primary">Upload Video</span>
                                                    </div>
                                                </div>
                                                <span class="vup-format-tag">MP4</span>
                                            </div>
                                            <div class="vup-file-row">
                                                <div class="vup-file-input-wrap">
                                                    <span class="vup-file-icon"><i
                                                            class="fa-regular fa-file-video"></i></span>
                                                    <input type="file" id="uploadFile" name="uploadFile"
                                                        style="position: relative; z-index: 1;"
                                                        class="import-file vup-file-input">
                                                </div>
                                                <a id="upload" class="btn primary-bg text-white vup-upload-trigger">
                                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                                    <span>Upload Files</span>
                                                </a>
                                            </div>
                                            <div id="filelist" class="vup-progress-area">
                                            </div>
                                            <input type="hidden" name="video" id="mp3_file_name" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ml-4">
                                <label class="ml-5">{{__('label.image')}}<span class="text-danger">*</span></label>
                                <div class="avatar-upload ml-5">
                                    <div class="avatar-edit">
                                        <input type='file' name="image" id="imageUpload"
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
                    </div>
                    <div class="border-top pt-3 text-right">
                        <button type="button" class="btn btn-default mw-120"
                            onclick="save_video()">{{__('label.save')}}</button>
                        <a href="{{route('admin.video.index')}}"
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
    <!-- Chunk JS -->
    <script src="{{ asset('/assets/js/plupload.full.min.js')}}"></script>
    <script src="{{ asset('/assets/js/common.js')}}"></script>
    <script>
        $('#access_type').select2({
            placeholder: "{{__('label.select_access_type')}}"
        });

        function save_video() {

            var Check_Admin = '<?php echo Demo_Mode(); ?>';
            if (Check_Admin == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#video")[0]);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.video.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'video', '{{ route("admin.video.index") }}');
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