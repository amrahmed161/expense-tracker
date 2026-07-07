<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Expense\StoreExpenseRequest;
use App\Http\Requests\Api\Expense\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(){
        $expenses =Expense::where(`user_id`,Auth::id())->with('category')->latest()->paginate(10);
        return ApiResponse::send(200,true,'تم جلب المصروفات بنجاح',ExpenseResource::collection($expenses));
    }
    public function store(StoreExpenseRequest $request){
        $expense = Expense::create([
            'user_id'=>Auth::id(),
            'category_id' => $request->category_id,
            'title'=>$request->title,
            'amount'=>$request->amount,
            'date' => $request->date,
            'notes'=> $request->notes,
        ]);
        return ApiResponse::send(201,true,'تم إضافة المصروف بنجاح',new ExpenseResource($expense));
    }
    public function show(Expense $expense){
        if ($expense->user_id !== Auth::id()) {
            return ApiResponse::send(403,false,'غير مصرح لك');
        }
        return ApiResponse::send(200,true,'تم جلب المصروف بنجاح',new ExpenseResource($expense));
    }
    public function update(UpdateExpenseRequest $request ,Expense $expense){
        if ($expense->user_id !== Auth::id()) {
            return ApiResponse::send(403, false, 'غير مصرح لك');
        }
        $expense->update($request->validated());
        return ApiResponse::send(200,true,'تم جلب المصروف بنجاح',new ExpenseResource($expense));
    }
        public function destroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            return ApiResponse::send(403, false, 'غير مصرح لك');
        }

        $expense->delete();

        return ApiResponse::send(200, true, 'تم حذف المصروف بنجاح');
    }
}
