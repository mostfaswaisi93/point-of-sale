@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/cat">@lang('site.categories')</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <form action="{{ route('admin.categories.index') }}" method="get">
                    <div class="form-group col-md-4">
                        <br>
                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search')"
                            value="{{ request()->search }}">
                    </div>
                    <div class="col-md-1">
                        <br>
                        <button class="btn btn-info" type="submit">@lang('site.search')</button>
                    </div>
                    <div class="col-md-1">
                        <br>
                        <button type="reset" class="btn btn-danger">@lang('site.reset')</button>
                    </div>
                </form>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group" name="create_category" id="create_category">
                                @if (auth()->user()->hasPermission('create_categories'))
                                <a class="btn sbold green"><i class="fa fa-plus"></i>
                                    @lang('site.add') @lang('site.category')</a>
                                @else
                                <a href="#" class="btn sbold green disabled"><i class="fa fa-plus"></i>
                                    @lang('site.add') @lang('site.category')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.products_count')</th>
                            <th>@lang('site.related_products')</th>
                            <th>@lang('site.created_at')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


@include('admin.cat.form')

@endsection

@push('scripts')

<script>
    var category_id = '';
    $(document).ready(function() {

        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('admin.cat.index') }}",
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    searchable: false,
                    orderable: false
                },
                { data: 'name', name: 'name' },
                { data: 'name', name: 'name' },
                { data: 'related_products', name: 'related_products' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false }
            ]
        });

        $('#create_category').click(function() {
            $('.modal-title').text('@lang('site.add') @lang('site.category')');
            $('#action_button').val('Add');
            $('#categoryForm').trigger('reset');
            $('#action').val('Add');
            $('#categoryModal').modal('show');
        });

        $('#categoryForm').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.cat.store') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            $('#categoryForm')[0].reset();
                            $('#data-table').DataTable().ajax.reload();
                            $('#categoryModal').modal('hide');
                            toastr.success('{{ trans('site.added_done') }}!', '{{ trans('site.success') }}!');
                        }
                        $('#form_result').html(html);
                    }
                });
            }
            if ($('#action').val() == "Edit") {
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.cat.update') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            $('#categoryForm')[0].reset();
                            $('#data-table').DataTable().ajax.reload();
                            $('#categoryModal').modal('hide');
                            toastr.success('{{ trans('site.edited_done') }}!', '{{ trans('site.success') }}!');
                        }
                        $('#form_result').html(html);
                    }
                });
            }
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "/admin/categories/" + id + "/edit",
                dataType: "json",
                success: function(html) {
                    $('#name').val(html.data.name);
                    $('#hidden_id').val(html.data.id);
                    $('.modal-title').text('{{ trans('site.edit_category') }}');
                    $('#action_button').val('Edit');
                    $('#action').val('Edit');
                    $('#categoryModal').modal('show');
                }
            });
        });

        $(document).on('click', '.delete', function() {
            category_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('.modal-title').text('{{ trans('site.confirmation') }}');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "categories/destroy/" + category_id,
                beforeSend: function() {
                    $('#ok_button').text('{{ trans('site.deleting') }}...');
                },
                success: function(data) {
                    $('#confirmModal').modal('hide');
                    $('#data-table').DataTable().ajax.reload();
                    $('#ok_button').html('<i class="fa fa-check" aria-hidden="true"></i> Delete');
                    toastr.success('{{ trans('site.deleted_done') }}!', '{{ trans('site.success') }}!');
                },
                error: function(data) {
                    console.log('error:', data);
                    $('#ok_button').html('<i class="fa fa-check" aria-hidden="true"></i> Delete');
                }
            });
        });
    });

</script>

@endpush