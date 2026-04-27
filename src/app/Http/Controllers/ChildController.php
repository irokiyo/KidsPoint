<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::all();

        return view('family.index', compact('children'));
    }
    public function show(Child $child)
    {
        return view('family.show', compact('child'));
    }
    public function create()
    {
        return view('family.register');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('img_url')) {
            $imagePath = $request->file('img_url')->store('img_url', 'public');
        } else {
            $imagePath = null;
        }

        Child::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'img_url' => $imagePath
        ]);

        return redirect()->route('child.index')->with('success', '登録しました。');
    }
    public function update(Child $child, Request $request)
    {
        $imagePath = $request->hasFile('img_url') ? $request->file('img_url')->store('img_url', 'public') : null;

        $child->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'img_url' => $imagePath
        ]);
        return view('family.index')->with('success', '更新しました。');
    }
    public function delete(Child $child)
    {
        $child->delete();
        return view('family.index')->with('success', '削除しました。')    ;
    }
}
