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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="{{__('label.name_here')}}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.email')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="{{__('label.email_here')}}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.mobile_no')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="mobile_no" class="form-control"
                                                placeholder="{{__('label.mobile_no_here')}}" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{__('label.area_name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="area_name" class="form-control"
                                                placeholder="{{__('label.area_name_here')}}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>{{__('label.feedback')}}<span class="text-danger">*</span></label>
                                            <textarea name="feedback" class="form-control"
                                                placeholder="{{__('label.feedback_here')}}" rows="1"></textarea>
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
                                <th>{{__('label.feedback')}}</th>
                                <th>{{__('label.status')}}</th>
                                <th>{{__('label.action')}}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <!-- Edit Model -->
            <div class="modal fade" id="EditModel" tabindex="-1" data-backdrop="static" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('label.edit_feedback')}}</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit_feedback" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit_id">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="edit_name" class="form-control"
                                                        placeholder="{{__('label.name_here')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>{{__('label.email')}}<span class="text-danger">*</span></label>
                                                    <input type="text" name="email" id="edit_email" class="form-control"
                                                        placeholder="{{__('label.email_here')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>{{__('label.mobile_no')}}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="mobile_no" id="edit_mobile_no"
                                                        class="form-control" placeholder="{{__('label.mobile_no_here')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>{{__('label.area_name')}}<span class="text-danger">*</span></label>
                                                    <input type="text" name="area_name" id="edit_area_name" class="form-control"
                                                        placeholder="{{__('label.area_name_here')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>{{__('label.feedback')}}<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="feedback" id="edit_feedback" class="form-control"
                                                        placeholder="{{__('label.feedback_here')}}" rows="1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default mw-120"
                                    onclick="update_feedback()">{{__('label.update')}}</button>
                                <button type="button" class="btn btn-cancel mw-120"
                                    data-dismiss="modal">{{__('label.close')}}</button>
                                <input type="hidden" name="_method" value="PATCH">
                            </div>
                        </form>
                    </div>
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
                    data: 'feedback',
                    name: 'feedback',
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

        $(document).on("click", ".edit_feedback", function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var mobile_no = $(this).data('mobile_no');
            var area_name = $(this).data('area_name');
            var feedback = $(this).data('feedback');

            $(".modal-body #edit_id").val(id);
            $(".modal-body #edit_name").val(name);
            $(".modal-body #edit_email").val(email);
            $(".modal-body #edit_mobile_no").val(mobile_no);
            $(".modal-body #edit_area_name").val(area_name);
            $(".modal-body #edit_feedback").val(feedback);
        });

        function update_feedback() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#edit_feedback")[0]);

                var Edit_Id = $("#edit_id").val();
                var url = '{{ route("admin.feedback.update", ":id") }}';
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
                        get_responce_message(resp, 'edit_feedback', '{{ route("admin.feedback.index") }}');
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
                            if (resp.status_code == 1) {
                                $('#' + id).text('{{__("label.show")}}').removeClass('hide-btn').addClass('show-btn').attr('title', "{{__('label.click_to_hide')}}");
                            } else {
                                $('#' + id).text('{{__("label.hide")}}').removeClass('show-btn').addClass('hide-btn').attr('title', "{{__('label.click_to_show')}}");
                            }
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