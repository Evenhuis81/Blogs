<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Form;
use \App\Blog;

class FormController extends Controller
{
    public function store(Request $request)

    {


        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        // dd($validated);

        if ($request->hasfile('filename')) {

            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $data[] = $name;
            }
        }

        $form = new Form();
        $form->filename = json_encode($data);


        $form->save();

        return back()->with('success', 'Your image has been successfully uploaded');
    }

    public function create(Blog $blog)
    {
        return view('/images.create', compact('blog'));
    }

    public function show(Blog $blog)
    {
        return view('/images.create', compact('blog'));
    }
}
