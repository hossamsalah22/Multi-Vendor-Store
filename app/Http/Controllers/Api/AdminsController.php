<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateRequest;
use App\Http\Requests\Dashboard\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::withTrashed()->where('id', '!=', 1)->paginate(10);
        return $admins;
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
        return $admin;
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return $admin->load('store');
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
        return $admin;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json(['message' => 'Admin has been deleted successfully']);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        Admin::onlyTrashed()->where('username', $id)->restore();
        return response()->json(['message' => 'Admin has been restored successfully']);
    }

    /**
     * Ban the specified resource from storage.
     */
    public function ban(Admin $admin)
    {
        $admin->update(['banned' => $admin->banned ? 0 : 1]);
        return response()->json(['message' => 'Admin has been Changed successfully']);
    }
}
