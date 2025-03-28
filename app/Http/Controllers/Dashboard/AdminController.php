<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\Admin\AdminDataTable;
use App\Dto\AdminDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\CreateRequest;
use App\Services\Facades\AdminFacade;

class AdminController extends Controller
{
    public function index(AdminDataTable $adminDataTable)
    {
        return AdminFacade::index($adminDataTable);
    }

    public function create()
    {
        return view('dashboard.admin.admins.create', ['pageTitle' => trans('dashboard/admin.admins')]);
    }

    public function store(CreateRequest $request)
    {
        $adminDto = AdminDto::create($request);
        AdminFacade::store($adminDto);

        return redirect()->route('admin.admins.index')->with('success', trans('dashboard/general.create_success'));
    }

    public function edit($id)
    {
        $admin = AdminFacade::find($id);

        return view('dashboard.admin.admins.edit', compact('admin'));
    }

    public function update(CreateRequest $request, $id)
    {
        $adminDto = AdminDto::create($request);
        $admin = AdminFacade::update($adminDto, $id);

        return redirect()->route('admin.admins.index')->with('success', trans('dashboard/general.update_success'));
    }

    public function destroy($id)
    {
        AdminFacade::destroy($id);

        return redirect()->route('admin.admins.index')->with('success', trans('dashboard/general.delete_success'));
    }
    // public function show($uuid) {
    //     $admin = Admin::whereHas('profile', function($query) use ($uuid) {
    //         $query->whereUuid($uuid);
    //     })->firstOrFail();
    //     return response()->json($admin);
    // }
}
