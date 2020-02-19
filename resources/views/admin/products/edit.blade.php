@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/products">@lang('site.products')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/products/create">@lang('site.edit') @lang('site.product')</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-circle"></i>
                    @lang('site.edit') @lang('site.product')
                </div>
            </div>
            <div class="portlet-body form">
                @include('partials._errors')
                <form action="{{ route('admin.products.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.categories')</label>
                                <div class="col-md-6">
                                    <select name="category_id" class="form-control">
                                        <option value="">@lang('site.all_categories')</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.' . $locale . '.name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="{{ $locale }}[name]" class="form-control"
                                        value="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.' . $locale . '.description')</label>
                                <div class="col-md-6">
                                    <textarea name="{{ $locale }}[description]"
                                        class="form-control ckeditor">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.image')</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control image">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <img src="{{ $product->image_path }}" style="width: 100px"
                                        class="img-thumbnail image-preview" alt="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.purchase_price')</label>
                                <div class="col-md-6">
                                    <input type="number" name="purchase_price" step="0.01" class="form-control"
                                        value="{{ $product->purchase_price }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.sale_price')</label>
                                <div class="col-md-6">
                                    <input type="number" name="sale_price" step="0.01" class="form-control"
                                        value="{{ $product->sale_price }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.stock')</label>
                                <div class="col-md-6">
                                    <input type="number" name="stock" class="form-control" value="{{ $product->stock}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn blue"><i class="fa fa-plus"></i>
                                @lang('site.edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection