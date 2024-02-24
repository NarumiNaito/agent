<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
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
        // dd(Work::select('id','name','price','content','status')->get());
    //もと
        // $works =Work::select('id','user_id','workName','price','deadline','content','skill','memo','status',)
        // ->orderBy('created_at','desc')->get();

        $user_id = Auth::id(); 
        $works = Work::where('user_id', $user_id)
        ->select('id','user_id','workName','price','deadline','content','skill','memo','status')
        ->orderBy('created_at','desc')
        ->get();

        
        
        // dd($works);

        return Inertia::render('Works/Index',[
            'works' =>$works,
            'user_id'=>$user_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Works/Create',[
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request, )
    {
        Work::create([
            'workName' => $request->workName, 
            'user_id' => Auth::id(),
            'price' => $request->price,
            'deadline' => $request->deadline,
            'content' => $request->content,
            'skill' => $request->skill,
            'memo' => $request->memo,
        ]);



        return to_route('works.index')
        ->with([
            'message' => '依頼を登録しました' ,
            'status' => 'success' 
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

        $work->workName = $request->workName;
        // $work->user_id = $request->user_id;
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
