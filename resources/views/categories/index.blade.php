@extends('layouts.app')

@section('title', __('category.title'))

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('category.title')}}</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <i class="fas fa-tags ml-2" style="color: #667eea;"></i>
                {{ __('category.list') }}
            </h3>
            <a href="{{ route('categories.create') }}" class="btn btn-sm"
               style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                <i class="fas fa-plus ml-1"></i>{{ __('category.create') }}
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background: #f8f9fa;">
                    <tr>
                        <th>#</th>
                        <th>{{ __('category.category') }}</th>
                        <th>{{ __('category.icon') }}</th>
                        <th>{{ __('category.expenses_count') }} </th>
                        <th>{{ __('category.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge"
                                      style="background: {{ $category->color ?? '#667eea' }};
                                             color: white; padding: 6px 12px; border-radius: 20px;">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td>
                                <i class="{{ $category->icon ?? 'fas fa-tag' }}"
                                   style="color: {{ $category->color ?? '#667eea' }}; font-size: 18px;"></i>
                            </td>
                            <td>
                                <span class="badge badge-secondary">
                                    {{ $category->expenses->count() }} {{ __('category.expense') }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> {{ __('general.update') }}
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('{{ __('categories.delete_confirmation') }}')">
                                        <i class="fas fa-trash"></i> {{ __('general.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-tags fa-2x text-muted mb-2"></i>
                                <p class="text-muted">{{ __('category.empty') }}</p>
                                <a href="{{ route('categories.create') }}" class="btn btn-sm"
                                   style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                                   {{ __('category.first_category') }}
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
