<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function store(Request $request)
    {
        // Other logic here
        $tenant = Tenant::create(['name' => $request->name]);
        $tenant->domains()->create([
            'domain' => $request->subdomain . '.' . config('tenancy.central_domains')[0],
        ]);
    }
}
