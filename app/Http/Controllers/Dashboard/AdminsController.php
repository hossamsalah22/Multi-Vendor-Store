<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateRequest;
use App\Http\Requests\Dashboard\Admin\UpdateRequest;
use App\Models\Admin;
use App\Models\Store;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::withTrashed()->where('id', '!=', 1)->paginate(10);
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        return view('dashboard.admins.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $admin = Admin::create($validate);
        $image && $admin->addMedia($image)->toMediaCollection('admins');
        return redirect()->route('dashboard.admins.index')->with('success', 'Admin has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $admin->load('store');
        return view('dashboard.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $stores = Store::all();
        return view('dashboard.admins.edit', compact('admin', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Admin $admin)
    {
        $validate = $request->validated();
        $image = $request->file('image');
        $admin->update($validate);
        if ($image) {
            $admin->clearMediaCollection('admins');
            $admin->addMedia($image)->toMediaCollection('admins');
        }
        return redirect()->route('dashboard.admins.index')->with('success', 'Admin has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back()->with('success', 'Admin has been deleted successfully');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        Admin::onlyTrashed()->where('username', $id)->restore();
        return back()->with('success', 'Admin has been restored successfully');
    }

    /**
     * Ban the specified resource from storage.
     */
    public function ban(Admin $admin)
    {
        $admin->update(['banned' => $admin->banned ? 0 : 1]);
        return back()->with('success', 'Admin has been changed successfully');
    }
}
