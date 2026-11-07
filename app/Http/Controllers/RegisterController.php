<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // 登録画面を表示
    public function create()
    {
        return view('register');
    }

    // 入力値をデータベースに登録
    public function store(RegisterRequest $request)
    {
        // フォームリクエストで検証済みの入力値を取得
        $validated = $request->validated();
        
        // 検証済みの入力値をデータベースに登録
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return view('register_success');
    }
}
