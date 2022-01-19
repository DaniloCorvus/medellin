<?php

namespace App\Http\Controllers;

use App\Models\Barnyard;
use Illuminate\Http\Request;

class StatiticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $result = [];
        $result['name'] = [];
        $result['quantity'] = [];

        $countBarnyard = Barnyard::withCount('animals')->get();

        foreach ($countBarnyard as $barnyard) {
            array_push($result['name'], $barnyard->name);
            array_push($result['quantity'], $barnyard->animals_count);
        }

        return response()->success([
            'conteo' =>  $result,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
