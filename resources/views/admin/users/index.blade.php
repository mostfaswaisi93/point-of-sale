@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/users">@lang('site.users')</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<div class="table-toolbar">
    <div class="row">
        <form action="{{ route('admin.users.index') }}" method="get">
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
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                @if (auth()->user()->hasPermission('create_users'))
                <a href="{{ route('admin.users.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.user')</a>
                @else
                <a href="#" class="btn sbold green disabled"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.user')</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>@lang('site.users_management')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    @if ($users->count() > 0)
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.first_name')</th>
                                <th>@lang('site.last_name')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.image')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index=>$user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img src="{{ $user->image_path }}" style="width: 50px;" class="img-thumbnail"
                                        alt=""></td>
                                <td>{{ $user->created_at->format('m-d-Y') }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_users'))
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                    </a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_users'))
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                    @else
                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->appends(request()->query())->links() }}
                    @else
                    <h5>@lang('site.no_data_found')</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection