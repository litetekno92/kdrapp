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
        //  $notes = Note::paginate(8);
        $notes = Note::with('categories')->paginate(8);
        // flash('Welcome To KdrApp')->success();
        return view('note.index', compact('notes'));
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
        $array_of_categories = $request->category_id;
        $note->folder_id=$request->get('folder');
        $note->user_id=\Auth::id();
        $note->categories()->attach($array_of_categories);
        $note->save();
        flash('Information has been added')->success();
        //return redirect('note')->with('success', 'Information has been added');
        return redirect('note');

        //Note::create($request->All());
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
        //$category_name=Category::find($note->category_id)->name;
        $folder_name=Folder::find($note->folder_id)->name;
        //$categories=Category::pluck('name', 'id');
       //  $categories = $note->categories()->get();
        $categories = $note->categories;
      //  dd($categories);
        /*foreach ($categories as $category) {
          print_r($category->name);
          echo "<BR>";
          echo "_________________";
          echo "<BR>";
        }
        dd($id);*/
        //$categories = Category::with('notes')->where(['note_id' => $id])->get();
        //$folders=Folder::pluck('name', 'id');
        return view('note.show', compact('note', 'categories', 'folder_name'));
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
        $categories=Category::pluck('name', 'id');
        $folders=Folder::pluck('name', 'id');

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
        $array_of_categories = $request->category_id;



        $note->folder_id=$request->get('folder_id');
        $note->categories()->sync($array_of_categories);

        $note->update();
        flash('Information has been updated')->success();
        return redirect('note');
        //
    }

    /**
     * Confirm the removal the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confDestroy($id)
    {
        $note=Note::find($id);
        return view('note.delete', compact('note'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note=Note::find($id);
        $note->delete();
        flash('Information has been deleted')->success();
        return redirect('note');

    }
}
