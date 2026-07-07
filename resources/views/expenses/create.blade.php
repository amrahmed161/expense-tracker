@extends('layouts.app')

@section('title', __('expenses.create'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">{{ __('expenses.title') }}</a></li>
    <li class="breadcrumb-item active"> {{ __('expenses.create') }}</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus ml-2" style="color: #667eea;"></i>
                       {{ __('expenses.create_new') }}
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('expenses.store') }}">
                        @csrf

                        {{-- Title --}}
                        <div class="form-group">
                            <label>
                                {{ __('expenses.expense_title') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   placeholder="{{ __('expenses.title_placeholder') }}"
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Amount & Category --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{ __('expenses.amount') }}
                                        ({{ __('expenses.currency') }})
                                    </label>
                                    <input type="number" name="amount" step="0.01" min="0"
                                           class="form-control @error('amount') is-invalid @enderror"
                                           value="{{ old('amount') }}"
                                           placeholder="0.00">
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('expenses.category') }}</label>
                                    <select name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">
                                             {{ __('expenses.select_category') }}
                                            </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Date --}}
                        <div class="form-group">
                            <label>{{ __('expense.date') }} <span class="text-danger">*</span></label>
                            <input type="date" name="date"
                                   class="form-control @error('date') is-invalid @enderror"
                                   value="{{ old('date', now()->format('Y-m-d')) }}">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Notes --}}
                        <div class="form-group">
                            <label>{{ __('expenses.nota') }}</label>
                            <textarea name="notes" rows="3"
                                      class="form-control @error('notes') is-invalid @enderror"
                                      placeholder="{{ __('expenses.notes_placeholder') }}"
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-right ml-1"></i> {{ __('general.back') }}
                            </a>
                            <button type="submit" class="btn"
                                    style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                                <i class="fas fa-save ml-1"></i>  {{ __('general.save') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
