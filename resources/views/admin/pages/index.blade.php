@extends('admin.layout.page-app')
@section('page_title', __('label.hero_images'))
@section('tab_title', __('label.hero_images'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm">{{__('label.hero_images')}}</h1>

            <div class="border-bottom row mb-3">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('label.hero_images')}}</li>
                    </ol>
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
                                <th>{{__('label.image')}}</th>
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
                            <h5 class="modal-title" id="exampleModalLabel">{{__('label.hero_images')}}</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit_pages" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="old_img" id="old_image">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{__('label.name')}}<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="{{__('label.name_here')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ml-4">
                                                    <label class="ml-5">{{__('label.image')}}<span
                                                            class="text-danger">*</span></label>
                                                    <div class="avatar-upload ml-5">
                                                        <div class="avatar-edit">
                                                            <input type='file' name="img" id="imageUpload"
                                                                accept=".png, .jpg, .jpeg, .webp" />
                                                            <label for="imageUpload" title="Select File"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <img src="" alt="upload_img.png" id="imagePreview">
                                                            <label
                                                                class="mt-3 text-gray">{{__('label.max_size_10mb')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default mw-120"
                                    onclick="update_pages()">{{__('label.update')}}</button>
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
    <!-- Sortorder -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                ...dataTableDefaults,
                ajax: {
                    url: "{{ route('admin.pages.index') }}",
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
                    data: 'img',
                    name: 'img',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return `<a href='${data}' target='_blank'>
                                                                            <img src='${data}' class='img-thumbnail size-55' alt="image">
                                                                        </a>`;
                    },
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

        function save_pages() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#pages")[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.pages.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'pages', '{{ route("admin.pages.index") }}');
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

        $(document).on("click", ".edit_pages", function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var image = $(this).data('image');

            $(".modal-body #id").val(id);
            $(".modal-body #name").val(name);
            $(".modal-body #imagePreview").attr('src', image);
            $(".modal-body #old_image").val(image);
        });


        function update_pages() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#edit_pages")[0]);

                var Edit_Id = $("#edit_id").val();
                var url = '{{ route("admin.pages.update", ":id") }}';
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
                        get_responce_message(resp, 'edit_pages', '{{ route("admin.pages.index") }}');
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

    </script>
@endsection