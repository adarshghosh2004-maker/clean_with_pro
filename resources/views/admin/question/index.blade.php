@extends('admin.layout.page-app')
@section('page_title', __('label.question'))
@section('tab_title', __('label.question'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.question')}}</h1>

            <div class="border-bottom row mb-3">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('label.question')}}</li>
                    </ol>
                </div>
            </div>

            <!-- Add Language -->
            <div class="card custom-border-card mt-3">
                <h5 class="card-header">{{__('label.add_question')}}</h5>
                <div class="card-body">
                    <form id="question" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="">
                        <div class="form-row">
                            <div class="col-md-5 mr-4">
                                <div class="form-row">
                                    <div class="col-md-12">
                                         <div class="form-group">
                                            <label>{{__('label.service')}}<span class="text-danger">*</span></label>
                                            <select class="form-control" name="service_id">
                                                <option value="">{{__('label.select_service')}}</option>
                                                @foreach ($services as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('label.description')}}<span class="text-danger">*</span></label>
                                            <textarea name="description" class="form-control"
                                                placeholder="{{__('label.description_here')}}" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ml-4">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >{{__('label.image_1')}}<span
                                                    class="text-danger">*</span></label>
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="img_1" id="imageUpload"
                                                        accept=".png, .jpg, .jpeg, .webp" />
                                                    <label for="imageUpload" title="{{__('label.upload_file')}}"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <img src="{{asset('assets/imgs/upload_img.png')}}" id="imagePreview">
                                                </div>
                                            </div>
                                            <label class="mt-3 text-gray">{{__('label.max_size_5mb')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.image_2')}}<span
                                                    class="text-danger">*</span></label>
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="img_2" id="imageUpload2"
                                                        accept=".png, .jpg, .jpeg, .webp" />
                                                    <label for="imageUpload2" title="{{__('label.upload_file')}}"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <img src="{{asset('assets/imgs/upload_img.png')}}" id="imagePreview2">
                                                </div>
                                            </div>
                                            <label class="mt-3 text-gray">{{__('label.max_size_5mb')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >{{__('label.image_3')}}<span
                                                    class="text-danger">*</span></label>
                                            <div class="avatar-upload ">
                                                <div class="avatar-edit">
                                                    <input type='file' name="img_3" id="imageUpload3"
                                                        accept=".png, .jpg, .jpeg, .webp" />
                                                    <label for="imageUpload3" title="{{__('label.upload_file')}}"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <img src="{{asset('assets/imgs/upload_img.png')}}" id="imagePreview3">
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
                                onclick="save_question()">{{__('label.save')}}</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Search && Table -->
            <div class="card custom-border-card mt-3">
                <div class="page-search mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-magnifying-glass fa-xl light-gray"></i></span>
                        </div>
                        <input type="text" id="input_search" class="form-control" placeholder="{{__('label.search')}}"
                            aria-label="Search" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="table-responsive table">
                    <table class="table table-striped text-center table-bordered" id="datatable">
                        <thead>
                            <tr class="table-bg">
                                <th>{{__('label.#')}}</th>
                                <th>{{__('label.image_1')}}</th>
                                <th>{{__('label.image_2')}}</th>
                                <th>{{__('label.image_3')}}</th>
                                <th>{{__('label.service')}}</th>
                                <th>{{__('label.status')}}</th>
                                <th>{{__('label.action')}}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <!-- Sortorder -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                ...dataTableDefaults,
                ajax: {
                    url: "{{ route('admin.question.index') }}",
                    data: function (d) {
                        d.input_search = $('#input_search').val();
                    },
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'img_1',
                    name: 'img_1',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return `<a href='${data}' target='_blank'>
                                                <img src='${data}' class='img-thumbnail size-55'>
                                            </a>`;
                    },
                },
                 {
                    data: 'img_2',
                    name: 'img_2',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return `<a href='${data}' target='_blank'>
                                                <img src='${data}' class='img-thumbnail size-55'>
                                            </a>`;
                    },
                },
                 {
                    data: 'img_3',
                    name: 'img_3',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return `<a href='${data}' target='_blank'>
                                                <img src='${data}' class='img-thumbnail size-55'>
                                            </a>`;
                    },
                },
                {
                    data: 'service',
                    name: 'service',
                    render: function (data) {
                        return data ? data : "-";
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
                ],
            });

            $('#input_search').keyup(function () {
                table.draw();
            });
        });

        function save_question() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#question")[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.question.store") }}',
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
                showError();
            }
        }
    
        function update_question() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#edit_question")[0]);

                var Edit_Id = $("#edit_id").val();
                var url = '{{ route("admin.question.update", ":id") }}';
                url = url.replace(':id', Edit_Id);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {

                        $("#dvloader").hide();
                        if (resp.status == 200) {
                            $('#EditModel').modal('toggle');
                        }
                        get_responce_message(resp, 'edit_question', '{{ route("admin.question.index") }}');
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

        function change_status(id) {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var url = `{{ route('admin.question.show', '') }}/${id}`;

                $.ajax({
                    type: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (resp) {
                        $("#dvloader").hide();

                        if (resp.status == 200) {
                            toastr.success(resp.success);
                        } else {
                            toastr.error(resp.errors);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dvloader").hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                showError();
            }
        };

        $(document).on('change', '.status-checkbox', function () {
            id = $(this).attr('data-id');
            change_status(id);
        })
    </script>
@endsection