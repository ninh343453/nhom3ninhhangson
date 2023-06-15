<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Music;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function home()
    {
        $musics = Music::latest()->paginate(5);

        return view('music.home', compact('musics'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index()
    {
        dd("check");
        $musics = Music::latest()->paginate(5);

        return view('music.index', compact('musics'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $categories = Category::all();

        return view('music.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [

                'name' => 'required',
                'lyrics' => 'required',
                'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:100000',
                'singer' => 'required'
            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                $path = public_path('image/music');

                $fileName = time() . '_' . $file->getClientOriginalName();

                $file->move($path, $fileName);

            } else {

                $fileName = 'noname.jpg';

            }
            //audio
            if ($request->hasFile('audio')) {

                $file = $request->file('audio');

                $path = public_path('audio/music');

                $fileAudio = time() . '_' . $file->getClientOriginalName();

                $file->move($path, $fileAudio);

            } else {

                $FileName = 'noname.mp3';

            }

            $newMusic = new Music();
            $newMusic->name = $request->name;
            $newMusic->lyrics = $request->lyrics;
            $newMusic->image = $fileName;
            $newMusic->audio = $fileAudio;
            $newMusic->price = $request->price;
            $newMusic->description = $request->description;
            $newMusic->singer = $request->singer;
            $newMusic->category_id = $request->category;

            $newMusic->save();

            return redirect()->route('music.index')

                ->with('success', 'Music Add successfully.');
        }
        
    }
    public function show($id)
    {
        $music = Music::find($id);

        return view('music.show', ['music' => $music]);
    }
    public function edit($id)
    {
        $categories = Category::all();

        $music = Music::with('category')->find($id);

        return view('music.edit', ['music' => $music, 'categories' => $categories]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lyrics' => 'required',
                'price' => 'required',
                'description' => 'required',
                'singer' => 'required'
            ]);

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

            }

            $fileName = "";

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path('image/music');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
            //audio
            if ($request->hasFile('audio')) {
                $file = $request->file('audio');
                $path = public_path('audio/music');
                $fileAudio = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileAudio);
            }

            $music = Music::find($id);
            if ($music != null) {
                $music->name = $request->name;
                $music->lyrics = $request->lyrics;
                $music->image = $fileName;
                $music->audio = $fileAudio;
                $music->price = $request->price;
                $music->description = $request->description;
                $music->singer = $request->singer;
                $music->category_id = $request->category;
                if ($fileName) {
                    $music->image = $fileName;
                    $music->audio = $fileAudio;

                }
                $music->save();
                return redirect()->route('music.index')
                    ->with('success', 'Music updated successfully');
            } else {
                return redirect()->route('music.index')
                    ->with('Error', 'music not update');

            }

        }
    }
    public function destroy($id)
    {
        $music = Music::find($id);

        $image_path = "/image/music/.$music->image"; 
        $audio_path = "/audio/music/.$music->audio";// Value is not URL but directory file path

        if (File::exists($image_path)) {

            File::delete($image_path);

        }
        if (File::exists($audio_path)) {

            File::delete($audio_path);

        }

        $music->delete();

        return redirect()->route('music.index')

            ->with('success', 'Music deleted successfully');
    }

}
