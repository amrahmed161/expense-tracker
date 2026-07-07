<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $totalExpenses = Expense::where('user_id', Auth::id())->sum('amount');
        $monthlyExpenses = Expense::where('user_id',Auth::id())->whereMonth('date',now()->month)->sum('amount');
        $totalCategories = Category::count();
         $latestExpenses = Expense::where('user_id', Auth::id())
            ->with('category')
            ->latest()
            ->take(5)
            ->get();
            return view('dashboard', compact(
            'totalExpenses',
            'monthlyExpenses',
            'totalCategories',
            'latestExpenses'));
    }
}
