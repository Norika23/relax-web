<?php
namespace App\Http\Controllers\Demo\Admin;
use App\Http\Controllers\Controller; use App\Http\Requests\AdminLoginRequest; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class AuthController extends Controller { public function create():View{return view('demo.admin.login');} public function store(AdminLoginRequest $request):RedirectResponse{$request->authenticate();return redirect()->intended(route('demo.admin.dashboard'));} public function destroy(Request $request):RedirectResponse{auth()->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('demo.admin.login');} }
