<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Category;
use App\Comic;

use App\Mail\ComicMail;
use Illuminate\Support\Facades\Mail;

class ComicController extends Controller
{
    private $comicValidation = [

        'category_id' => 'required',
        'image' => 'required|image',
        'image_hero' => 'required|image',
        'image_cover' => 'required|image',
        'title' => 'required|string',
        'price' => 'required|numeric',
        'body' => 'string',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact ('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crea un nuovo fumetto';
        $categories = Category::all();

        return view('admin.comics.create', compact('title', 'categories' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate($this->comicValidation);

        $newComic = new Comic();

        if(!empty($data["image"])) {
            $data["image"] = storage::disk('public')->put('images',$data["image"]);
        }
        if(!empty($data["image_hero"])) {
            $data["image_hero"] = storage::disk('public')->put('images',$data["image_hero"]);
        }
        if(!empty($data["image_cover"])) {
            $data["image_cover"] = storage::disk('public')->put('images',$data["image_cover"]);
        }

        $newComic->fill($data);
        $saved = $newComic->save();

        if($saved) {
            Mail::to('pippo@gmail.com')->send(new ComicMail($newComic));
            return redirect()
                ->route('admin.comics.index')
                ->with('message', "fumetto" . $newComic->title . "creato correttamente");
        }else{
            return redirect()
                ->route('admin.comics.index')
                ->with('message', "errore nel salvataggio");
        }
        


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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
