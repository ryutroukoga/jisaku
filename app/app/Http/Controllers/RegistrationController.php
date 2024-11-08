<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Danger;
use App\Post;
use App\User;
use App\Application;

class RegistrationController extends Controller
{
    //違反報告画面からホーム画面（DB登録）
    public function dangerpost2(Request $request)
    {
        $danger = new Danger;
        $danger->user_id = $request->user_id;
        $danger->post_id = $request->post_id;
        $danger->detail = $request->input('detail', '');
        $danger->save();
        return redirect('/');
    }

    // 入力内容を確認画面に渡す
    public function requestcheck(Request $request)
    {
        // 仮のID
        $user_id = 1;
        return view('request', [
            'user_id' => $user_id,
            'detail' => $request->input('detail'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'DueDate' => $request->input('DueDate'),
        ]);
    }

    //確認画面からホーム画面（DB保存）
    public function request(Request $request)
    {
        $application = new Application;
        //設定をNULLにしているからログイン実装後戻す
        $application->user_id = $request->user_id;
        $application->detail = $request->detail;
        $application->phone = $request->phone;
        $application->email = $request->email;
        $application->DueDate = $request->DueDate;
        $application->save();
        return redirect('/');
    }

    //新規登録確認画面へ遷移
    public function signcheck(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 画像のパスを保存するための変数を初期化
        $imagePath = null;
        // 画像が送信されているか確認し、存在する場合は保存
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
        }

        return view('signup', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'image' => $imagePath, // 確認画面には保存された画像のパスを渡す
        ]);
    }

    //新規登録確認画面からホーム画面（DB保存）
    public function sign(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $request->image;
        $user->save();
        return redirect('/');
    }

    //マイページへ
    public function mypage()
    {
        // // ログインしていない場合はログインページにリダイレクト
        // if (!Auth::check()) {
        //     return redirect()->route('logingo');
        // }
    
        $user = Auth::user(); // ログインしているユーザーの情報を取得
        return view('mypage', compact('user')); // 'mypage' ビューにユーザー情報を渡す
    }
    










    public function userupdate()
    {
        // $user = Auth::user();

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->save();

        return redirect("/");
    }
    public function userdelete()
    {
        // $user = Auth::user();
        // $user->delete();

        return view("userdelete");
    }
    public function deletemypage()
    {
        // $user = Auth::user();
        // $user->delete();

        return redirect("/");
    }
}
