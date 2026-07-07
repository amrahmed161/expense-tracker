<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::where('user_id',Auth::id())->with('category')->latest()->paginate(10);
        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required|exists:categories,id',
            'title'=>'required|string|max:255',
            'amount'=>'required|numeric|min:0',
            'date'=>'required|date',
            'notes'=>'nullable|string'
        ]);
        Expense::create([
            'user_id'=> Auth::id(),
            'category_id'=> $request->category_id,
            'title'=> $request->title,
            'amount'=> $request->amount,
            'date'=> $request->date,
            'notes'=> $request->notes
        ]);
        return redirect()->route('expenses.index')->with('success','تم إضافة المصروف بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::all();
        return view('expenses.edit', compact('expense','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'amount'      => 'required|numeric|min:0',
            'date'        => 'required|date',
            'notes'       => 'nullable|string',
        ]);
        $expense->update($request->all());

        return redirect()->route('expenses.index')
            ->with('success', 'تم تعديل المصروف بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }

        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'تم حذف المصروف بنجاح!');
    }

}
