<?php

namespace App\Http\Controllers;

//-------------importar classes-------------
use Illuminate\Http\Request;
use App\Clases\Coche;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



class CocheController extends Controller
{
    public function rellenarCompactos()
    {
        $coches = [];

        $coche = new Coche();
        $coche->nombre = 'Polo';
        $coche->descripcion='Listo para cambiarlo todo';
        $coche->img = 'imagenes/polo.png';
        array_push($coches, $coche);

        $coche = new Coche();
        $coche->nombre = 'Golf';
        $coche->descripcion='Más diseño, más tecnología, mismo espíritu';
        $coche->imagen = 'imagenes/golf.png';
        array_push($coches, $coche);

        $coche = new Coche();
        $coche->nombre = 'Golf GTD';
        $coche->descripcion='Diesel de alto rendimiento';
        $coche->imagen = 'imagenes/golf_gtd.png';
        array_push($coches, $coche);

        $coche = new Coche();
        $coche->nombre = 'Golf GTI';
        $coche->descripcion='Indomable, una vez más';
        $coche->imagen = 'imagenes/golf_gti.png';
        array_push($coches, $coche);

        return $coches;
    }

    public function rellenarElectricos()
    {
        $coches = [];

        $coche = new Coche();
        $coche->nombre = 'Passat GTE';
        $coche->descripcion='Híbrido elegante';
        $coche->imagen = 'imagenes/passat_gte.png';
        array_push($coches, $coche);

        $coche = new Coche();
        $coche->nombre = 'Golf GTE';
        $coche->descripcion='Motor híbrido, puro carácter';
        $coche->imagen = 'imagenes/golf_gte.png';
        array_push($coches, $coche);

        $coche = new Coche();
        $coche->nombre = 'e-Golf';
        $coche->descripcion='100% eléctrico, hasta 300km de autonomía';
        $coche->imagen = 'imagenes/e-golf.png';
        array_push($coches, $coche);

        return $coches;
    }

    public function indexCompactos(Request $request)
    {
        if($request->session()->has('compactos')) //si existe o no
        {
            $coches = $request->session()->get('compactos');
        }
        else
        {
            //$coches = $this->rellenarCompactos();
            $coches = [];
            $request->session()->put('compactos',$coches);
        }

        $datos['coches'] = $coches;
        $datos['titulo'] = 'COMPACTOS';
        return view('autos', $datos);
    }

     public function indexElectricos(Request $request)
    {
        if($request->session()->has('electricos')) //si existe o no
        {

            $coches = $request->session()->get('electricos');
        }
        else
        {
            $coches = $this->rellenarElectricos();
            $request->session()->put('electricos',$coches);
        }

        $datos['coches'] = $coches;
        $datos['titulo'] = 'ELECTRICOS';
        return view('autos', $datos);
    }

    public function create()
    {
        $datos['titulo'] = 'COCHE NUEVO';

        return view('nuevo',$datos);
    }

    public function store(Request $request)
    {
        //para guardarlo en el coche
        $coche = new Coche();

        $coche->nombre = $request->input('nombre');
        $coche->descripcion= $request->input('descripcion');
        $fichero = $request->file('imagen');

        if($fichero) //si existe
        {
            $imagen_path = $fichero->getClientOriginalName(); //coge el path original
            Storage::disk('public')->putFileAs('imagenes/', $fichero, $imagen_path);
        }
        $coche->imagen = "imagenes/" . $imagen_path;

        $coches = $coches = $request->session()->get('compactos');
        array_push($coches, $coche);
        $request->session()->put('compactos',$coches);

        $datos['coches'] = $coches;
        $datos['titulo'] = 'COMPACTOS';
        return view('autos', $datos);
    }

    public function delete(Request $request, $nombre)
    {
        $coches = $request->session()->get('compactos');

        //buscamos el coche que hemos pasado
        $i = 0;
        $encontrado = false;

        while ($i < \count($coches) && !$encontrado)
        {
            if($coches[$i]->nombre == $nombre)
            {
                $encontrado = true;
            }
            else
            {
                $i++;
            }
        }

        //si lo hemos  encontrado
        if($encontrado)
        {
            //primero borramos el fichero (imagen)
            if(Storage::disk('public')->exists($coches[$i]->imagen)) //si existe
            {
                Storage::disk('public')->delete($coches[$i]->imagen);
            }

            unset($coches[$i]);
            //reordenar array y lo guarda en el mismo array y asi quitamos los espacios vacios
            $coches = array_values($coches);
            $request->session()->put('compactos', $coches);
        }

        return \redirect()->action('CocheController@indexCompactos');
    }

}

?>