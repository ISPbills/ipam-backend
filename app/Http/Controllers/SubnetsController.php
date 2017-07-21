<?php

namespace App\Http\Controllers;

use App\Subnet;
use Illuminate\Http\Request;

class SubnetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subnets = \App\Subnet::all();
        
        foreach ($subnets as $subnet) {
            $subnet['site']= $subnet->site()->get();
            
        }

        return $subnets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subnet = new \App\Subnet;
        $subnet->fill($request->all())->save();
        return redirect()->route('testingmark');

        //  $subnet = \App\Subnet::create($request->all());

        // return response()->json($equipment,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function show(Subnet $subnets)
    {
        $subnets['site'] = $subnets->site()->get();
        return $subnets;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function edit(Subnet $subnets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subnet $subnets)
    {
        // $subnet->update($request->all());
        // return response()->json($subnet,200);

        $subnet = \App\Subnet::find($request->id);
        $subnet->fill($request->all())->save();
        return redirect()->route('testingmark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subnets  $subnets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subnet $subnets)
    {

        $subnet = \App\Subnet::find($subnets->id);
        $subnet->delete();
        return redirect()->route('testingmark');
        // $subnets->delete();

        // return response()->json(null,204);
    }
}
