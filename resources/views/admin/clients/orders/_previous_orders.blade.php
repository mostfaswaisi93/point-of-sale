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
                                        @foreach ($order->products as $product)
                                        <li class="list-group-item">{{ $product->name }}</li>
                                        @endforeach
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