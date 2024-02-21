<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Work;
use Inertia\Inertia;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Work::select('id','name','price','content','request')->get());

        $works =Work::select('id','name','price','deadline','content','skill','memo','status','created_at')->get();

        return Inertia::render('Works/Index',[
            'works' =>$works
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Works/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        Work::create([
            'name' => $request->name,
            'price' => $request->price,
            'deadline' => $request->deadline,
            'content' => $request->content,
            'skill' => $request->skill,
            'memo' => $request->memo,
        

        ]);

        return to_route('works.index')
        ->with([
            'message' => '依頼を登録しました' ,
            'request' => 'success' 
            ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        // dd($work);
        return Inertia::render('Works/Show',[
            'work' => $work
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return Inertia::render('Works/Edit',[
            'work' => $work
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkRequest $request, Work $work)
    {
        // dd($request , $work);

        $work->name = $request->name;
        $work->price = $request->price;
        $work->deadline = $request->deadline;
        $work->content = $request->content;
        $work->skill = $request->skill;
        $work->memo = $request->memo;
        $work->status = $request->status;

        $work->save();

        return to_route('works.index')
        ->with([
            'message' => '更新しました' ,
            'status' => 'success' 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
