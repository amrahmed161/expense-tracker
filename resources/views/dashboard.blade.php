@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('breadcrumb')
    <li class="breadcrumb-item active">لوحة التحكم</li>
@endsection

@section('content')

    {{-- Stats Cards --}}
    <div class="row">

        {{-- Total Expenses --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="small-box" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; border-radius: 12px;">
                <div class="inner">
                    <h3>{{ number_format($totalExpenses, 2) }} <small style="font-size:16px;">ج.م</small></h3>
                    <p>إجمالي المصروفات</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <a href="{{ route('expenses.index') }}" class="small-box-footer" style="background: rgba(0,0,0,0.1);">
                    عرض الكل <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>

        {{-- Monthly Expenses --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="small-box" style="background: linear-gradient(135deg, #f093fb, #f5576c); color: white; border-radius: 12px;">
                <div class="inner">
                    <h3>{{ number_format($monthlyExpenses, 2) }} <small style="font-size:16px;">ج.م</small></h3>
                    <p>مصروفات {{ now()->translatedFormat('F') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="{{ route('expenses.index') }}" class="small-box-footer" style="background: rgba(0,0,0,0.1);">
                    عرض الكل <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>

        {{-- Total Categories --}}
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="small-box" style="background: linear-gradient(135deg, #4facfe, #00f2fe); color: white; border-radius: 12px;">
                <div class="inner">
                    <h3>{{ $totalCategories }}</h3>
                    <p>عدد الفئات</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer" style="background: rgba(0,0,0,0.1);">
                    إدارة الفئات <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- Latest Expenses --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                        <i class="fas fa-history ml-2" style="color: #667eea;"></i>
                        آخر المصروفات
                    </h3>
                    <a href="{{ route('expenses.create') }}" class="btn btn-sm"
                       style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                        <i class="fas fa-plus ml-1"></i> إضافة مصروف
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead style="background: #f8f9fa;">
                            <tr>
                                <th>العنوان</th>
                                <th>الفئة</th>
                                <th>المبلغ</th>
                                <th>التاريخ</th>
                                <th>إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestExpenses as $expense)
                                <tr>
                                    <td>
                                        <i class="fas fa-circle ml-2"
                                           style="color: {{ $expense->category->color ?? '#667eea' }}; font-size: 10px;"></i>
                                        {{ $expense->title }}
                                    </td>
                                    <td>
                                        <span class="badge"
                                              style="background: {{ $expense->category->color ?? '#667eea' }}; color: white; padding: 5px 10px; border-radius: 20px;">
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
                                        <a href="{{ route('expenses.edit', $expense) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('expenses.destroy', $expense) }}"
                                              method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('هل أنت متأكد؟')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                        <p class="text-muted">لا يوجد مصروفات بعد</p>
                                        <a href="{{ route('expenses.create') }}" class="btn btn-sm"
                                           style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                                            إضافة أول مصروف
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($latestExpenses->count() > 0)
                    <div class="card-footer text-center">
                        <a href="{{ route('expenses.index') }}" style="color: #667eea;">
                            عرض كل المصروفات <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
