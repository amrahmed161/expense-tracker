@extends('layouts.app')

@section('title', __('categories.edit'))
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('categories.index') }}">
            {{ __('categories.title') }}
        </a>
    </li>

    <li class="breadcrumb-item active">
        {{ __('categories.edit') }}
    </li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit ml-2" style="color: #667eea;"></i>
                        {{ __('categories.edit') }} : {{ $category->name }}
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="form-group">
                            <label>
                                {{ __('categories.name') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $category->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Icon --}}
                        <div class="form-group">
                            <label>{{ __('categories.icon') }}</label>
                            <input
                                type="text"
                                name="icon"
                                class="form-control @error('icon') is-invalid @enderror"
                                value="{{ old('icon', $category->icon) }}"
                                placeholder="{{ __('categories.icon_placeholder') }}">
                                <small class="text-muted">
                                    {{ __('categories.fontawesome_help') }}

                                    <a href="https://fontawesome.com/icons" target="_blank">
                                        {{ __('categories.fontawesome') }}
                                    </a>
                                </small>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Color --}}
                        <div class="form-group">
                            <label>{{ __('categories.color') }}</label>
                            <div class="d-flex align-items-center">
                                <input type="color" name="color"
                                       class="form-control @error('color') is-invalid @enderror"
                                       value="{{ old('color', $category->color ?? '#667eea') }}"
                                       style="width: 60px; height: 40px; padding: 2px; cursor: pointer;">
                                       <span class="mr-3 text-muted">
                                            {{ __('categories.select_color') }}
                                        </span>
                            </div>
                            @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-right ml-1"></i>     {{ __('general.back') }}
                            </a>
                            <button type="submit" class="btn"
                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                                <i class="fas fa-save ml-1"></i> {{ __('general.update') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
