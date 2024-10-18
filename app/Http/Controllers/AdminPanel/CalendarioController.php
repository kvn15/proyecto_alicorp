<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminPanel\CalendarioPage; 
use App\Models\AdminPanel\CalendarioCard;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

class CalendarioController extends Controller
{
    #Sección Calendario
    public function AllSlideC(){

        $AllSlideC = CalendarioPage::all();
        return view('adminPanel.calendario.slider',compact('AllSlideC'));

    }

    public function StoreSliderC(Request $request)
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
                $imagePath = 'calendario/' . uniqid() . '.' . $image->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));

                // Crear un registro en la base de datos
                CalendarioPage::create([
                    'caledario_slide' => $imagePath,
                ]);
            }
        }

        $notifiction = array(
            'message' => 'Las imagenes fueron cargadas satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notifiction);
    }

    public function DeleteSlideC($id){

        $slide = CalendarioPage::findOrFail($id);
        $img = 'storage/' . $slide->caledario_slide;
        //$img = public_path('storage/'.$img);
        
        unlink($img);

        CalendarioPage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Promo eliminado correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    

    }

    public function AllCards(){
        $Allcards = CalendarioCard::all();
        return view('adminPanel.calendario.cards',compact('Allcards'));

    }

    public function storeCards(Request $request)
    {
     
        $request->validate([
            'items.*.text' => 'required|string',
            'items.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'items.*.event_date' => 'required|date',
        ]);
        
        $notification = array(
            'message' => 'Cards agregados correctamente', 
            'alert-type' => 'success'
        );
        
        try {
            foreach ($request->items as $itemData) {

                $img = Image::make($itemData['image']->getRealPath());

                $img->resize(292, 322, function ($constraint) {
                    $constraint->upsize(); // Evitar que la imagen se agrande si es más pequeña
                });

                // Almacenar la imagen
                //$imagePath = $itemData['image']->store('storage/calendario', 'public');
                $imagePath = 'calendario/' . uniqid() . '.' . $itemData['image']->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));

                // Crear un nuevo registro en la base de datos
                CalendarioCard::create([
                    'text' => $itemData['text'],
                    'image_path' => $imagePath,
                    'event_date' => $itemData['event_date'],
                ]);
            }
        } catch (\Exception $e) {
            // Manejar cualquier error
            $notification = array(
                'message' => 'Hubo un error al agregar las Cards: ' . $e->getMessage(),
                'alert-type' => 'error'
            );
        }
        
        return back()->with($notification);
    }

    // public function UpdateCard(Request $request,$id){

    //     $request->validate([
    //         'items.*.id' => 'required|exists:calendario_cards,id', // Ensure the ID exists in the database
    //         'items.*.text' => 'required|string',
    //         'items.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow image to be nullable for updates
    //         'items.*.event_date' => 'required|date',
    //     ]);
        
    //     $notification = array(
    //         'message' => 'Cards actualizados correctamente', 
    //         'alert-type' => 'success'
    //     );
        
    //     try {
    //         foreach ($request->items as $itemData) {
    //             // Find the existing CalendarioCard record
    //             $calendarioCard = CalendarioCard::findOrFail($itemData['id']);
        
    //             // Check if an image was provided for update
    //             if (isset($itemData['image'])) {
    //                 $img = Image::make($itemData['image']->getRealPath());
        
    //                 $img->resize(292, 322, function ($constraint) {
    //                     $constraint->upsize(); // Prevent upscaling if the image is smaller
    //                 });
        
    //                 // Store the new image
    //                 $imagePath = 'calendario/' . uniqid() . '.' . $itemData['image']->getClientOriginalExtension();
    //                 $img->save(public_path('storage/' . $imagePath));
        
    //                 // Delete the old image if necessary
    //                 if ($calendarioCard->image_path && file_exists(public_path('storage/' . $calendarioCard->image_path))) {
    //                     unlink(public_path('storage/' . $calendarioCard->image_path));
    //                 }
        
    //                 // Update the image path
    //                 $calendarioCard->image_path = $imagePath;
    //             }
        
    //             // Update the text and event date
    //             $calendarioCard->text = $itemData['text'];
    //             $calendarioCard->event_date = $itemData['event_date'];
        
    //             // Save the changes to the database
    //             $calendarioCard->save();
    //         }
    //     } catch (\Exception $e) {
    //         // Handle any errors
    //         $notification = array(
    //             'message' => 'Hubo un error al actualizar las Cards: ' . $e->getMessage(),
    //             'alert-type' => 'error'
    //         );
    //     }
        
    //     return back()->with($notification);
        

    // }

    // app/Http/Controllers/CalendarioController.php

public function UpdateCard(Request $request, $id)
{
    $request->validate([
        'text' => 'required|string',
        'event_date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
        $calendarioCard = CalendarioCard::findOrFail($id);
        $calendarioCard->text = $request->text;
        $calendarioCard->event_date = $request->event_date;

        if ($request->hasFile('image')) {
            $img = Image::make($request->file('image')->getRealPath());
            $img->resize(292, 322, function ($constraint) {
                $constraint->upsize();
            });

            $imagePath = 'calendario/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $img->save(public_path('storage/' . $imagePath));

            if ($calendarioCard->image_path && file_exists(public_path('storage/' . $calendarioCard->image_path))) {
                unlink(public_path('storage/' . $calendarioCard->image_path));
            }

            $calendarioCard->image_path = $imagePath;
        }

        $calendarioCard->save();

        return back()->with('success', 'Card actualizada correctamente');
    } catch (\Exception $e) {
        return back()->with('error', 'Hubo un error al actualizar la Card: ' . $e->getMessage());
    }
}

// app/Http/Controllers/CalendarioController.php

public function DeleteCard($id)
{
    try {
        // Buscar la Card a eliminar
        $calendarioCard = CalendarioCard::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($calendarioCard->image_path && file_exists(public_path('storage/' . $calendarioCard->image_path))) {
            unlink(public_path('storage/' . $calendarioCard->image_path));
        }

        // Eliminar la Card de la base de datos
        $calendarioCard->delete();

        return back()->with('success', 'Card eliminada correctamente');
    } catch (\Exception $e) {
        return back()->with('error', 'Hubo un error al eliminar la Card: ' . $e->getMessage());
    }
}



}
