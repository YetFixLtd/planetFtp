<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    public function index()
    {
        $links = Link::all();

        return view('admin.link.index', [
            'links' => $links
        ]);
    }


    public function create()
    {
        return view('admin.link.create');
    }


    public function store(Request $request)
    {
        $link = new Link();
        $link->fill($request->all());
        $link->save();

        return redirect()->back()->with('message', 'Info stored successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $link = Link::find($id);

        return view('admin.link.edit', [
            'link' => $link
        ]);
    }


    public function update(Request $request)
    {
        $link = Link::find($request->id);
        $link->fill($request->all());
        $link->update();

        return redirect()->route('link.index')->with('message', 'Info Updated successfully');
    }


    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();

        return redirect()->back()->with('message', 'Info Deleted successfully');
    }
}
