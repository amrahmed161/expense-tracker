@extends('layouts.app')

@section('title', __('expense.title'))

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('expense.title') }}</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <i class="fas fa-money-bill-wave ml-2" style="color: #667eea;"></i>
                {{ __('expense.list') }}
            </h3>
            <a href="{{ route('expenses.create') }}" class="btn btn-sm"
               style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                <i class="fas fa-plus ml-1"></i> {{ __('expense.create') }}
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background: #f8f9fa;">
                    <tr>
                        <th>#</th>
                        <th>{{ __('expense.expense_title') }}</th>
                        <th>{{ __('expense.category') }}</th>
                        <th>{{ __('expense.amount') }}</th>
                        <th>{{ __('expense.date') }}</th>
                        <th>{{ __('expense.notes') }}</th>
                        <th>{{ __('expense.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $expense->title }}</td>
                            <td>
                                <span class="badge"
                                      style="background: {{ $expense->category->color ?? '#667eea' }};
                                             color: white; padding: 5px 10px; border-radius: 20px;">
                                    <i class="{{ $expense->category->icon ?? 'fas fa-tag' }} ml-1"></i>
                                    {{ $expense->category->name }}
                                </span>
                            </td>
                            <td>
                                <strong style="color: #f5576c;">
                                    {{ number_format($expense->amount, 2) }} ج.م
                                </strong>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="fas fa-calendar ml-1"></i>
                                    {{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}
                                </small>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $expense->notes ?? '—' }}
                                </small>
                            </td>
                            <td>
                                <a href="{{ route('expenses.edit', $expense) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('expenses.destroy', $expense) }}"
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('{{__('expenses.delete_confirmation')}}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                <p class="text-muted">{{ __('expense.empty') }}</p>
                                <a href="{{ route('expenses.create') }}" class="btn btn-sm"
                                   style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                                      {{ __('expense.first_expense') }}
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($expenses->hasPages())
            <div class="card-footer">
                {{ $expenses->links() }}
            </div>
        @endif
    </div>

@endsection
