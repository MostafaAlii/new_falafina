<?php
namespace App\Services\Contracts;
use App\DataTables\Dashboard\Admin\BranchDataTable;
use Illuminate\Http\Request;
interface BranchInterface {
    public function index(BranchDataTable $branchDataTable);
    public function create();
    public function store(Request $request);
}
