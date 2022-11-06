<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\inertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index',[
            'blogs' => inertiaTest::all()
        ]);
    }

    public function show($id)
    {
        //dd($id);
        return Inertia::render('Inertia/Show',
        [
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new inertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            'message' => '登録しました'
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }
}
