@extends('admin.layout.page-app')
@section('page_title', __('label.feedback'))
@section('tab_title', __('label.feedback'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <!-- Select2 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.feedback')}}</h1>

            <div class="border-bottom row mb-3">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('label.feedback')}}</li>
                    </ol>
                </div>
            </div>

            <!-- Add Feature -->
            <div class="card custom-border-card mt-3">
                <h5 class="card-header">{{__('label.add_feedback')}}</h5>
                <div class="card-body">
                    <form id="feedback" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="{{__('label.name_here')}}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('label.email')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="{{__('label.email_here')}}" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.mobile_no')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="mobile_no" class="form-control"
                                                placeholder="{{__('label.mobile_no_here')}}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.area_name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="area_name" class="form-control"
                                                placeholder="{{__('label.area_name_here')}}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.rating')}}<span class="text-danger">*</span></label>
                                            <input type="number" name="rating" class="form-control"
                                                placeholder="{{__('label.rating_here')}}" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12   ">
                                        <div class="form-group">
                                            <label>{{__('label.feedback')}}<span class="text-danger">*</span></label>
                                            <textarea name="feedback" class="form-control"
                                                placeholder="{{__('label.feedback_here')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top pt-3 text-right">
                            <button type="button" class="btn btn-default mw-120"
                                onclick="save_feedback()">{{__('label.save')}}</button>
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
                                <th>{{__('label.name')}}</th>
                                <th>{{__('label.email')}}</th>
                                <th>{{__('label.mobile_no')}}</th>
                                <th>{{__('label.area_name')}}</th>
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
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('#feature_id').select2({ placeholder: "{{__('label.select_feature')}}" });
        $('#edit_feature_id').select2({ placeholder: "{{__('label.select_feature')}}", dropdownParent: $('#EditModel') });
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                ...dataTableDefaults,
                ajax: {
                    url: "{{ route('admin.feedback.index') }}",
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
                    data: 'name',
                    name: 'name',
                    render: function (data) {
                        return data ? data : "-";
                    }
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function (data) {
                        return data ? data : "-";
                    }
                },
                {
                    data: 'mobile_no',
                    name: 'mobile_no',
                    render: function (data) {
                        return data ? data : "-";
                    }
                },
                {
                    data: 'area_name',
                    name: 'area_name',
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

        function save_feedback() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#feedback")[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.feedback.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'feedback', '{{ route("admin.feedback.index") }}');
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
                var url = `{{ route('admin.feedback.show', '') }}/${id}`;

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