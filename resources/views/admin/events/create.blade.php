@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open([
                    'route' => ['admin.events.store'],
                    'method' => 'post',
                ]) !!}
                {{ csrf_field() }}
                    <h3>イベントを登録する</h3>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('name', __('validation.attributes.name'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('name', null, [
                                        'class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.name'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('description', __('validation.attributes.description'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('description', null, [
                                        'class' => 'form-control'.($errors->has('description') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.description'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('date', __('validation.attributes.date'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('date', null, [
                                        'class' => 'form-control'.($errors->has('date') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.date'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('open', __('validation.attributes.open'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('open', null, [
                                        'class' => 'form-control'.($errors->has('open') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.open'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('start', __('validation.attributes.start'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('start', null, [
                                        'class' => 'form-control'.($errors->has('start') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.start'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('close', __('validation.attributes.close'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('close', null, [
                                        'class' => 'form-control'.($errors->has('close') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.close'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('venue', __('validation.attributes.venue'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('venue', null, [
                                        'class' => 'form-control'.($errors->has('venue') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.venue'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('pre_price', __('validation.attributes.pre_price'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('pre_price', null, [
                                        'class' => 'form-control'.($errors->has('pre_price') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.pre_price'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('basic_price', __('validation.attributes.basic_price'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('basic_price', null, [
                                        'class' => 'form-control'.($errors->has('basic_price') ? ' is-invalid' : ''),
                                        'placeholder' => __('validation.attributes.basic_price'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('category', __('validation.attributes.category'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-3">
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">登録する</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
