@extends('admin.layout.page-app')
@section('page_title', __('label.app_settings'))
@section('tab_title', __('label.app_settings'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.app_settings')}}</h1>

            <div class="border-bottom row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('label.app_settings')}}</li>
                    </ol>
                </div>
            </div>

            <ul class="nav nav-pills custom-tabs inline-tabs" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="app-tab" data-toggle="tab" href="#app" role="tab" aria-controls="app"
                        aria-selected="true">{{__('label.app_settings')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="smtp-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="smtp"
                        aria-selected="false">{{__('label.smtp')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social"
                        aria-selected="false">{{__('label.social_setting')}}</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app-tab">
                    <div class="card custom-border-card">
                        <h5 class="card-header">{{__('label.app_settings')}}</h5>
                        <div class="card-body">
                            <form id="app_setting" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>{{__('label.company_name')}}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="company_name" value="{{ $result['company_name'] }}"
                                                    class="form-control" placeholder="{{__('label.company_name_here')}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>{{__('label.email')}} <span class="text-danger">*</span></label>
                                                <input type="email" name="email" value="{{ $result['email'] }}"
                                                    class="form-control" placeholder="{{__('label.email_here')}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.contact')}} <span class="text-danger">*</span></label>
                                                <input type="text" name="contact" value="{{ $result['contact'] }}"
                                                    class="form-control" placeholder="{{__('label.contact_here')}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.abn_number')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="abn_number"
                                                    value="{{ $result['abn_number'] ?? '' }}" class="form-control"
                                                    placeholder="{{__('label.abn_number_here')}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.acn_number')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="acn_number"
                                                    value="{{ $result['acn_number'] ?? '' }}" class="form-control"
                                                    placeholder="{{__('label.acn_number_here')}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.bsb')}} <span class="text-danger">*</span></label>
                                                <input type="text" name="bsb" value="{{ $result['bsb'] ?? '' }}"
                                                    class="form-control" placeholder="{{__('label.bsb_here')}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.account_number')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="account_number"
                                                    value="{{ $result['account_number'] ?? '' }}" class="form-control"
                                                    placeholder="{{__('label.account_number_here')}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.whatsapp_number')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="whatsapp_number"
                                                    value="{{ $result['whatsapp_number'] ?? '' }}" class="form-control"
                                                    placeholder="{{__('label.whatsapp_number_here')}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label> {{__('label.website')}} <span class="text-danger">*</span></label>
                                                <input type="text" name="website" value="{{ $result['website'] ?? '' }}"
                                                    class="form-control" placeholder="{{__('label.website_here')}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>{{__('label.address')}}<span class="text-danger">*</span></label>
                                                <textarea name="address" rows="1" class="form-control"
                                                    placeholder="{{__('label.address_here')}}">{{ $result['address'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group ml-5">
                                                    <label class="ml-5">{{__('label.company_logo')}}<span
                                                            class="text-danger">*</span></label>
                                                    <div class="avatar-upload ml-5">
                                                        <div class="avatar-edit">
                                                            <input type='file' name="company_logo" id="imageUpload"
                                                                accept=".png, .jpg, .jpeg, .webp" />
                                                            <label for="imageUpload"
                                                                title="{{__('label.upload_file')}}"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <img src="{{ $result['company_logo'] }}" id="imagePreview">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="old_company_logo"
                                                        value="{{ $result['company_logo'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top pt-3 text-right">
                                    <button type="button" class="btn btn-default mw-120"
                                        onclick="app_setting()">{{__('label.save')}}</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="smtp" role="tabpanel" aria-labelledby="smtp-tab">
                    <div class="card custom-border-card">
                        <h5 class="card-header">{{__('label.email_setting_smtp')}}</h5>
                        <div class="card-body">
                            <form id="smtp_setting">
                                <input type="hidden" name="id" value="{{ $smtp->id }}">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.is_smtp_active')}}<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="">{{__('label.select_status')}}</option>
                                            <option value="0" {{ $smtp->status == 0 ? 'selected' : ''}}>{{__('label.no')}}
                                            </option>
                                            <option value="1" {{ $smtp->status == 1 ? 'selected' : ''}}>{{__('label.yes')}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.host')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="host" class="form-control" value="{{ $smtp->host }}"
                                            placeholder="{{__('label.host_here')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.port')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="port" class="form-control" value="{{ $smtp->port }}"
                                            placeholder="{{__('label.port_here')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.protocol')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="protocol" class="form-control"
                                            value="{{ $smtp->protocol }}" placeholder="{{__('label.protocol_here')}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.user_name')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="user" class="form-control" value="{{ $smtp->user }}"
                                            placeholder="{{__('label.user_name_here')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.password')}}<span class="text-danger">*</span></label>
                                        <input type="password" name="pass" class="form-control" value="{{ $smtp->pass }}"
                                            placeholder="{{__('label.password_here')}}">
                                        <label class="mt-1 text-gray">{{__('label.search_for_better_result')}} <a
                                                href="https://support.google.com/mail/answer/185833?hl=en" target="_blank"
                                                class="btn-link">{{__('label.click_here')}}</a></label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.from_name')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="from_name" class="form-control"
                                            value="{{ $smtp->from_name }}" placeholder="{{__('label.from_name_here')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.from_email')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="from_email" class="form-control"
                                            value="{{ $smtp->from_email }}" placeholder="{{__('label.from_email_here')}}">
                                    </div>
                                </div>
                                <div class="border-top pt-3 text-right">
                                    <button type="button" class="btn btn-default mw-120"
                                        onclick="smtp_setting()">{{__('label.save')}}</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($smtp->status == 1)
                        <div class="card custom-border-card col-md-6">
                            <h5 class="card-header">{{__('label.test_smtp')}}</h5>
                            <div class="card-body">
                                <form id="test_smtp" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>{{__('label.email')}}</label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="{{__('label.email_here')}}">
                                        </div>
                                    </div>
                                    <div class="border-top pt-3 text-right">
                                        <button type="button" class="btn btn-default mw-120"
                                            onclick="test_smtp()">{{__('label.send')}}</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                    <div class="card custom-border-card">
                        <h5 class="card-header">{{__('label.social_links')}}</h5>
                        <div class="card-body">
                            <form id="social_link" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                        <input type="text" name="name[]" class="form-control"
                                            placeholder="{{__('label.name_here')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.url')}}<span class="text-danger">*</span></label>
                                        <input type="url" name="url[]" class="form-control"
                                            placeholder="{{__('label.url_here')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>{{__('label.icon')}}<span class="text-danger">*</span></label>
                                        <input type="file" name="image[]" class="form-control import-file social_img"
                                            id="social_img" accept=".png, .jpg, .jpeg, .webp">
                                        <input type="hidden" name="old_image[]" value="">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <div class="custom-file">
                                            <img src="{{asset('assets/imgs/upload_img.png')}}" class="img-thumbnail size-90"
                                                id="link_img_social_img">
                                        </div>
                                    </div>
                                    <div class="col-md-1 mt-2">
                                        <div class="flex-grow-1 px-5 d-inline-flex">
                                            <div class="change mr-3 mt-4" id="add_btn">
                                                <a class="btn btn-success add-more text-white"
                                                    onclick="add_more_link()">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @for ($i = 0; $i < count($social_link); $i++)
                                    <div class="social_part">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                                <input type="text" name="name[]" value="{{ $social_link[$i]['name'] }}"
                                                    class="form-control" placeholder="{{__('label.name_here')}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{__('label.url')}}<span class="text-danger">*</span></label>
                                                <input type="url" name="url[]" value="{{ $social_link[$i]['url'] }}"
                                                    class="form-control" placeholder="{{__('label.url_here')}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{__('label.icon')}}<span class="text-danger">*</span></label>
                                                <input type="file" name="image[]" class="form-control import-file social_img"
                                                    id="social_img_{{$i}}" accept=".png, .jpg, .jpeg, .webp">
                                                <input type="hidden" name="old_image[]"
                                                    value="{{ basename($social_link[$i]['image']) }}">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <div class="custom-file">
                                                    <img src="{{$social_link[$i]['image']}}" class="img-thumbnail size-90"
                                                        id="link_img_social_img_{{$i}}">
                                                </div>
                                            </div>
                                            <div class="col-md-1 mt-2">
                                                <div class="flex-grow-1 px-5 d-inline-flex">
                                                    <div class="change mr-3 mt-4" id="add_btn">
                                                        <a class="btn btn-danger text-white remove_link">-</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                                <div class="add-more-social-link"></div>

                                <div class="border-top pt-3 text-right">
                                    <button type="button" class="btn btn-default mw-120"
                                        onclick="social_link()">{{__('label.save')}}</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        // App Setting
        function app_setting() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#app_setting")[0]);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.appsetting.app") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'app_setting', '{{ route("admin.appsetting.index") }}');
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dvloader").hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                showError();
            }
        }

        // SMTP
        function smtp_setting() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#smtp_setting")[0]);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.appsetting.smtp") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        $("html, body").animate({
                            scrollTop: 0
                        }, "swing");
                        get_responce_message(resp);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dvloader").hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                showError();
            }
        }

        // test smtp 
        function test_smtp() {
            var isAdmin = <?php echo Demo_Mode(); ?>;
            if (isAdmin == 1) {
                var formData = new FormData($("#test_smtp")[0]);
                $("#dvloader").show();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.appsetting.testsmtp") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        $("html, body").animate({
                            scrollTop: 0
                        }, "swing");
                        get_responce_message(resp, 'test_smtp');
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dvloader").hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                showError();
            }
        }
        $("body").on("click", ".remove_link", function (e) {
            $(this).parents('.social_part').remove();
        });

        // Multipal Img Show 
        $(document).on('change', '.social_img', function () {
            readURL(this, this.id);
        });
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#link_img_' + id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // Social Link Save
        function social_link() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#social_link")[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.appsetting.sociallink") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'social_link', '{{ route("admin.appsetting.index") }}');
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dvloader").hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                showError();
            }
        }

        // OnBoarding Screen Add-Remove Link Part
        var i = -1;

        function add_more_link() {

            var data = '<div class="social_part">';
            data += '<div class="row">';
            data += '<div class="form-group col-md-3">';
            data += '<label>{{__("label.name")}}<span class="text-danger">*</span></label>';
            data += '<input type="text" name="name[]" class="form-control" placeholder="{{__("label.name_here")}}">';
            data += '</div>';
            data += '<div class="form-group col-md-3">';
            data += '<label>{{__("label.url")}}<span class="text-danger">*</span></label>';
            data += '<input type="url" name="url[]" class="form-control" placeholder="{{__("label.url_here")}}">';
            data += '</div>';
            data += '<div class="form-group col-lg-3">';
            data += '<label>{{__("label.icon")}}<span class="text-danger">*</span></label>';
            data += '<input type="file" name="image[]" class="form-control import-file social_img" id="social_img_' + i + '" accept=".png, .jpg, .jpeg, .webp">';
            data += '<input type="hidden" name="old_image[]" value="">';
            data += '</div>';
            data += '<div class="form-group col-md-1">';
            data += '<div class="custom-file">';
            data += '<img src="{{asset("assets/imgs/upload_img.png")}}" class="img-thumbnail size-90" id="link_img_social_img_' + i + '">';
            data += '</div>';
            data += '</div>';
            data += '<div class="col-md-1 mt-2">';
            data += '<div class="flex-grow-1 px-5 d-inline-flex">';
            data += '<div class="change mr-3 mt-4" id="add_btn">';
            data += '<a class="btn btn-danger add-more text-white remove_link">-</a>';
            data += '</div>';
            data += '</div>';
            data += '</div>';
            data += '</div>';
            data += '</div>';

            $('.add-more-social-link').append(data);
            i--;
            $("html, body").animate({
                scrollTop: $(document).height()
            }, "slow");
        }
    </script>
@endsection