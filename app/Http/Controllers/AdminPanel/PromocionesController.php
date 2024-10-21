<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdminPanel\PromocionesPage; 
use App\Models\AdminPanel\PromocionesCard;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

class PromocionesController extends Controller
{
     #Sección Promociones
     public function AllSlideP(){

        $AllSlideP = PromocionesPage::all();
        return view('adminPanel.promociones.slider',compact('AllSlideP'));

    }

    public function StoreSliderP(Request $request)
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
                $imagePath = 'promociones/' . uniqid() . '.' . $image->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));

                // Crear un registro en la base de datos
                PromocionesPage::create([
                    'promociones_slide' => $imagePath,
                ]);
            }
        }

        $notifiction = array(
            'message' => 'Las imagenes fueron cargadas satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notifiction);
    }

    public function DeleteSlideP($id){

        $slide = PromocionesPage::findOrFail($id);
        $img = 'storage/' . $slide->promociones_slide;
        //$img = public_path('storage/'.$img);
        
        unlink($img);

        PromocionesPage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Promo eliminado correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    

    }

    public function AllCards(){
        $Allcards = PromocionesCard::all();
        return view('adminPanel.promociones.cards',compact('Allcards'));

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

                $img->resize(430, 350, function ($constraint) {
                    $constraint->upsize(); // Evitar que la imagen se agrande si es más pequeña
                });

                // Almacenar la imagen
                //$imagePath = $itemData['image']->store('storage/Promociones', 'public');
                $imagePath = 'promociones/' . uniqid() . '.' . $itemData['image']->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));

                // Crear un nuevo registro en la base de datos
                PromocionesCard::create([
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

    public function UpdateCard(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $PromocionesCard = PromocionesCard::findOrFail($id);
            $PromocionesCard->text = $request->text;
            $PromocionesCard->event_date = $request->event_date;

            if ($request->hasFile('image')) {
                $img = Image::make($request->file('image')->getRealPath());
                $img->resize(292, 322, function ($constraint) {
                    $constraint->upsize();
                });

                $imagePath = 'Promociones/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $img->save(public_path('storage/' . $imagePath));

                if ($PromocionesCard->image_path && file_exists(public_path('storage/' . $PromocionesCard->image_path))) {
                    unlink(public_path('storage/' . $PromocionesCard->image_path));
                }

                $PromocionesCard->image_path = $imagePath;
            }

            $PromocionesCard->save();

            return back()->with('success', 'Card actualizada correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al actualizar la Card: ' . $e->getMessage());
        }
    }

    public function DeleteCard($id)
    {
        try {
            // Buscar la Card a eliminar
            $PromocionesCard = PromocionesCard::findOrFail($id);

            // Eliminar la imagen asociada si existe
            if ($PromocionesCard->image_path && file_exists(public_path('storage/' . $PromocionesCard->image_path))) {
                unlink(public_path('storage/' . $PromocionesCard->image_path));
            }

            // Eliminar la Card de la base de datos
            $PromocionesCard->delete();

            return back()->with('success', 'Card eliminada correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al eliminar la Card: ' . $e->getMessage());
        }
    }
}
