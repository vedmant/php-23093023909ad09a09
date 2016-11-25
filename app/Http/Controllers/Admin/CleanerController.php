<?php

namespace App\Http\Controllers\Admin;

use App\Cleaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CleanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cleaner = Cleaner::paginate(25);

        return view('+admin.cleaner.index', compact('cleaner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('+admin.cleaner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'quality_score' => 'required',
        ]);

        $cleaner = Cleaner::create($request->all());

        $cleaner->cities()->attach($request->get('cities'));

        Session::flash('flash_message', 'Cleaner added!');

        return redirect('admin/cleaner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cleaner = Cleaner::findOrFail($id);

        return view('+admin.cleaner.show', compact('cleaner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cleaner = Cleaner::findOrFail($id);

        return view('+admin.cleaner.edit', compact('cleaner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'quality_score' => 'required',
        ]);

        $cleaner = Cleaner::findOrFail($id);
        $cleaner->update($request->all());

        $cleaner->cities()->detach();
        $cleaner->cities()->attach($request->get('cities'));

        Session::flash('flash_message', 'Cleaner updated!');

        return redirect('admin/cleaner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cleaner::destroy($id);

        Session::flash('flash_message', 'Cleaner deleted!');

        return redirect('admin/cleaner');
    }
}
