<?php
namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeInicio;
use App\Models\HomePromociones;
use Illuminate\Support\Facades\Storage;
use Image;

class HomeInicioController extends Controller
{
    public function dashboard(){
        $dash = HomeInicio::find(1);        
        return view('adminPanel.dashboard',compact('dash'));
    }

    public function StoreSlider(Request $request)
    {
        // Validar las imágenes
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Verificar que haya imágenes cargadas
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                // Crear una instancia de la imagen con Intervention
                $img = Image::make($image->getRealPath());

                // Redimensionar la imagen a un tamaño más pequeño
                $img->resize(900, 599, function ($constraint) {
                    $constraint->aspectRatio(); // Mantener la relación de aspecto
                    $constraint->upsize(); // Evitar que la imagen se agrande si es más pequeña
                });

                // Guardar la imagen redimensionada en el sistema de archivos
                $imagePath = 'home_slide/' . uniqid() . '.' . $image->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));

                // Crear un registro en la base de datos
                HomeInicio::create([
                    'home_slide' => $imagePath,
                ]);
            }
        }

        $notifiction = array(
            'message' => 'Las imagenes fueron cargadas satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notifiction);
    }

    public function AllSlide(){

        $AllSlide = HomeInicio::all();
        return view('adminPanel.inicio.dashboard',compact('AllSlide'));

    }

    public function EditSlide($id){

        $slider = HomeInicio::findOrFail($id);
        return view('adminPanel.edit_slider',compact('slider'));

    }// End Method 

    //     public function UpdateSlider(Request $request){

    //         $multi_image_id = $request->id;

    //      if ($request->file('image')) {
    //          $image = $request->file('image');
    //          $name_gen = hexdec(uniqid()).'.'.$image
    //             ->getClientOriginalExtension();  // 3434343443.jpg

    //         Image::make($image)->resize(900, 599)
    //             ->save(public_path('storage/home_slide/'.$name_gen));
            
    //         $save_url = 'home_slide/'.$name_gen;

    //          HomeInicio::findOrFail($multi_image_id)->update([
                
    //              'home_slide' => $save_url,

    //          ]); 

    //          $notification = array(
    //          'message' => 'Slider actualizado correctamente', 
    //          'alert-type' => 'success'
    //      );

    //      return redirect()->route('adminPanel.dashboard')->with($notification);

    //      }

    //   }

    public function DeleteSlider($id){

        $slide = HomeInicio::findOrFail($id);
        $img = 'storage/' . $slide->home_slide;
        //$img = public_path('storage/'.$img);
        
        unlink($img);

        HomeInicio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider se eliminó correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    

    }

    public function AllPromo(){

        $AllPromo = HomePromociones::all();
        return view('adminPanel.inicio.sec_promo',compact('AllPromo'));

    }
    
    public function StorePromociones(Request $request){
        // Validar las imágenes
        $request->validate([
            'promos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Verificar que haya imágenes cargadas
        if($request->hasFile('promos')) {
            foreach ($request->file('promos') as $image) {

                // Crear una instancia de la imagen con Intervention
                $img = Image::make($image->getRealPath());

                // Redimensionar la imagen a un tamaño más pequeño
                $img->resize(206.312, 250, function ($constraint) {
                    $constraint->aspectRatio(); // Mantener la relación de aspecto
                    $constraint->upsize(); // Evitar que la imagen se agrande si es más pequeña
                });

                // Guardar la imagen redimensionada en el sistema de archivos
                $imagePath = 'home_promo/' . uniqid() . '.' . $image->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));


                // Crear un registro en la base de datos
                HomePromociones::create([
                    'home_promos' => $imagePath,
                ]);
            }
        }

        $notifiction = array(
            'message' => 'Las promociones fueron cargadas satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notifiction);
    }

    public function DeletePromos($id){

        $promo = HomePromociones::findOrFail($id);
        $img = 'storage/' . $promo->home_promos;
        //$img = public_path('storage/'.$img);
        
        unlink($img);

        HomePromociones::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Promo eliminado correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    

    }

}

