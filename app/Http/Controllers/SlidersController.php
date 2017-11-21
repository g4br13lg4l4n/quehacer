<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Storage;
class SlidersController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return response()->json($slider, 200);
    }

   public function store(Request $request)
   {

        $pictureArray = [];
        define('UPLOAD_DIR', 'public/storage/uploads/');
        foreach ($request->imagesSlider as $image) {
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = '../'.UPLOAD_DIR . uniqid() . '.png';
            file_put_contents($file, $image_base64);
            $explde_file = explode("public/", $file);
            $file2 = '../'.$explde_file[0].$explde_file[1];
            array_push($pictureArray, $file2); 
        }

        foreach ($pictureArray as $value) {
            $picture = new Slider;
            $picture->imagen = $value;
            $picture->save();
        }

       return response()->json([
           'respuesta' => 'Imagen agregada' 
       ]);
   }

   public function destroy ($id)
   {

     $slider = Slider::find($id);
     $get_image = Slider::find($id);
     $clean_url = explode('/', $get_image);
     $picture = $clean_url[4];
     Storage::delete('public/uploads/'.$picture);

    $slider->delete();

     return response()->json([
         'respuesta' => 'Se ha eliminado la imagen'
     ], 200); 
   } 
}
