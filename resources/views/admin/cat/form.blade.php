<!-- Category Modal -->

<div class="modal fade" id="categoryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    @include('partials._errors')
                    <form action="{{ route('admin.cat.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn blue"><i class="fa fa-plus"></i>
                                    @lang('site.add')</button>
                            </div>
                        </div>
                    </form>
                </div>
                @include('partials._errors')
                <form method="post" id="categoryForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @foreach (config('translatable.locales') as $locale)
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">@lang('site.' . $locale .
                            '.name')</label>
                        <div class="col-md-7">
                            <input type="text" name="{{ $locale }}[name]" class="form-control"
                                value="{{ old($locale . '.name') }}">
                        </div>
                    </div>
                    @endforeach
                    <div class="modal-footer">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <button type="submit" class="btn btn-primary" id="action_button" name="action_button"
                            value="Add"><i class="fa fa-plus"></i>
                            @lang('site.add')</button>
                        <button type="button" class="btn blue" data-dismiss="modal">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            {{ trans('site.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Delete -->

<div class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <h4 style="margin: 0;" class="text-center">{{ trans('site.are_you_sure_category') }}
                </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ trans('site.delete') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    {{ trans('site.close') }}</button>
            </div>
        </div>
    </div>
</div>