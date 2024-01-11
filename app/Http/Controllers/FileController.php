<?php
namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $photo = $request->file('photo');
        if($request->input('storagetype') == 'space'){
            $path = $photo->store('images', 'spaces');
            Person::create([
                'firstname'=>$request->input('firstname'),
                'lastname'=>$request->input('lastname'),
                'photo'=>$path,
		'storagetype' => 'space',
            ]);
        }
        else{
            $path = $photo->store('images', 'block');
            Person::create([
                'firstname'=>$request->input('firstname'),
                'lastname'=>$request->input('lastname'),
                'photo'=>$path,
		'storagetype' => 'block',
            ]);
        }
        return redirect('/view');
    }
    public function view()
    {
        $person = Person::all();
//	$filePath = $person->photo;
//	$fileContent= Storage::disk('block')->get($filePath);
//	$contentType='image/'.pathinfo($filePath, PATHINFO_EXTENSION)
//	return response($fileContent)->header('Content-type', $contentType);
	return view('view', compact('person'));
    }
	public function getImage(Request $request){
		$path = Person::find($request->id);
		$photoPath = $path->photo;
		if(Storage::disk('block')->exists($photoPath)){
			$fileContent = Storage::disk('block')->get($photoPath);
			$contentType =  pathinfo($photoPath, PATHINFO_EXTENSION);
		return response ($fileContent)->header('Content-Type',$contentType);
		}
	} 
}

