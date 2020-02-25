<!-- Add Client -->

<div class="modal fade" id="clientModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="clientForm" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-2">@lang('site.name'): </label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" />
                        </div>
                    </div>
                    @for ($i = 0; $i < 2; $i++) <div class="form-group">
                        <label class="control-label col-md-2">@lang('site.phone'): </label>
                        <div class="col-md-9">
                            <input type="text" name="phone[]" class="form-control" />
                        </div>
            </div>
            @endfor
            <div class="form-group">
                <label class="control-label col-md-2">@lang('site.address'): </label>
                <div class="col-md-9">
                    <input type="text" name="address" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="action" id="action" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <button type="submit" class="btn btn-primary" id="action_button" name="action_button" value="Add"><i
                        class="fa fa-plus"></i>
                    @lang('site.add')</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    @lang('site.close')</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>