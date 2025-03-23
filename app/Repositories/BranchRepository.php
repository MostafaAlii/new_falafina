<?php

namespace  App\Repositories;

use App\Models\Branch;
use App\Services\Contracts\BranchInterface;
use Illuminate\Http\Request;
use App\DataTables\Dashboard\Admin\BranchDataTable;

class BranchRepository implements BranchInterface
{
    public function index(BranchDataTable $branchDataTable)
    {
        return $branchDataTable->render('dashboard.admin.branches.index', ['pageTitle' => 'الفروع']);
    }

    public function create()
    {
        return view('dashboard.admin.branches.create', ['pageTitle' => 'إضافة فرع']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        Branch::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('admin.branches.index')->with('success', 'تم حفظ الفرع بنجاح!');
    }
}
