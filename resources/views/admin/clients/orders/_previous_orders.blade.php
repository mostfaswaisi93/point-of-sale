<!-- Show -->

<div class="modal fade" id="showModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body">
                    @foreach ($orders as $order)
                    <div class="panel-group">
                        <div class="panel panel-content">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse"
                                        href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toDayDateTimeString() }}</a>
                                </h4>
                            </div>
                            <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>@lang('site.name')</th>
                                                    <th>@lang('site.quantity')</th>
                                                    <th>@lang('site.price')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->pivot->quantity }}</td>
                                                    <td>{{ number_format($product->sale_price, 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">
                                                        <h4>@lang('site.total') :
                                                            <span
                                                                class="total-price">{{ number_format($order->total_price, 2) }}</span>
                                                        </h4>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $orders->links() }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    @lang('site.close')</button>
            </div>
        </div>
    </div>
</div>