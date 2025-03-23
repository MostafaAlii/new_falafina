<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Dashboard\Admin\BranchDataTable;
use App\Services\Contracts\BranchInterface;
class BranchController extends Controller {
    public function __construct(protected BranchDataTable $branchDataTable, protected BranchInterface $branchInterface) {
        $this->branchInterface = $branchInterface;
        $this->branchDataTable = $branchDataTable;
    }

    public function index(BranchDataTable $branchDataTable) {
        return $this->branchInterface->index($this->branchDataTable);
    }

    public function create() {
        return $this->branchInterface->create();
    }

    public function store(Request $request) {
        return $this->branchInterface->store($request);
    }


}
