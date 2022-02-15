<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Division;
use App\Models\Exam;
use App\Models\GeneralUser;
use App\Models\Institute;
use Illuminate\Http\Request;

class GeneralUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $divisions = Division::get();
        $exams = Exam::get();
        $institutes = Institute::get();
        $boards = Board::get();
        return view('registartion-form', compact('divisions', 'exams', 'institutes', 'boards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralUser  $generalUser
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralUser $generalUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralUser  $generalUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralUser $generalUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralUser  $generalUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralUser $generalUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralUser  $generalUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralUser $generalUser)
    {
        //
    }
}
