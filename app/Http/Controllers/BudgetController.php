<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::latest('date')->get();
        $total = $budgets->sum('amount');
        return view('budget.index', compact('budgets', 'total'));
    }

    public function create()
    {
        return view('budget.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Budget::create($data);
        return redirect()->route('budget.index')->with('success', 'Budget berhasil ditambahkan.');
    }

    public function edit(Budget $budget)
    {
        return view('budget.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget)
    {
        $data = $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $budget->update($data);
        return redirect()->route('budget.index')->with('success', 'Budget berhasil diperbarui.');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        return redirect()->route('budget.index')->with('success', 'Budget berhasil dihapus.');
    }
}
