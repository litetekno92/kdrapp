<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Category;
use App\Folder;

class NotesController extends Controller
{

    /**
 * Enforce middleware.
 */
public function __construct()
{
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete']]);
    // Alternativly
    //$this->middleware('auth', ['except' => ['index', 'show']]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $notes=Note::all()->paginate(15);
        $notes = Note::paginate(8);
        return view('note.index', compact('notes', $notes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $note= new Note;
        $categories=Category::All();
        $folders=Folder::All();
        return view('note.create', compact('note', $note, 'categories', $categories, 'folders', $folders));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $note= new Note;
        $note->title=$request->get('title');
        $note->body=$request->get('body');
        $note->category_id=$request->get('category');
        $note->folder_id=$request->get('folder');
        $note->user_id=1;
        $note->save();
        return redirect('note')->with('success', 'Information has been added');

        //Note::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $note=Note::find($id);
      $category_name=Category::find($note->category_id)->name;
      $folder_name=Folder::find($note->folder_id)->name;
      //$folder_name=Folder::find($folder->id)->name;
      //$folders=Folder::All();
      return view('note.show', compact('note', 'category_name', 'folder_name'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //public function edit(Note $note)
    {
      $note=Note::find($id);
      $categories=Category::All();
      $folders=Folder::All();
      return view('note.edit', compact('note', 'categories', 'folders'));
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
        $note=Note::find($id);
        $note->title=$request->get('title');
        $note->body=$request->get('body');
        $note->category_id=$request->get('category');
        $note->folder_id=$request->get('folder');
        $note->user_id=1;
        $note->update();
        return redirect('note')->with('success', 'Information has been updated');
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
