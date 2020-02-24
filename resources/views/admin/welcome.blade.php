@extends('layouts.admin.app')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('admin.categories.index') }}">
            <div class="visual">
                <i class="fa fa-list"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup">{{ $categories_count }}</span>
                </div>
                <div class="desc">@lang('site.categories')</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('admin.products.index') }}">
            <div class="visual">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup">{{ $products_count }} </div>
                <div class="desc"> @lang('site.products') </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('admin.clients.index') }}">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup">{{ $clients_count }}</span>
                </div>
                <div class="desc"> @lang('site.clients') </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('admin.users.index') }}">
            <div class="visual">
                <i class="fa fa-cogs"></i>
            </div>
            <div class="details">
                <div class="number"> {{ $users_count }} </div>
                <div class="desc"> @lang('site.users') </div>
            </div>
        </a>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bar-chart font-green"></i>
                    <span class="caption-subject font-green bold uppercase">@lang('site.sales_graph')</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    // Line Chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}-{{ $data->day }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('site.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10,
            parseTime: false
        });
</script>

@endpush