<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaRequest;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\PersonaDomicilio;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\URL;
use PHPUnit\Framework\Attributes\Group;

class PersonaController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->input('paginate', '5');
        $personas = Persona::orderBy('id', 'desc')->paginate($paginate);
        return view('personas.index', compact('personas'));
    }

    // PersonaController.php

    public function search(Request $request)
    {
        $query = $request->input('query');
        $personas = Persona::where('nombre', 'like', "%{$query}%")
            ->orWhere('primer_ap', 'like', "%{$query}%")
            ->orWhere('segundo_ap', 'like', "%{$query}%")
            ->get();

        $html = '';
        foreach ($personas as $persona) {
            $buttonsHtml = view('personas.funciones.search', ['persona' => $persona])->render();

            $html .= '<tr>';
            $html .= '<td>' . $this->implodeName($persona) . '</td>';
            $html .= '<td>' . $persona->rfc . '</td>';
            $html .= '<td>' . $persona->telefono . '</td>';
            $html .= '<td>' . $persona->tipo_persona . '</td>';
            $html .= '<td>' . $buttonsHtml . '</td>';
            $html .= '</tr>';
        }

        return response()->json(['html' => $html]);
    }

    protected function implodeName($persona)
    {
        return implode(' ', [$persona->nombre, $persona->primer_ap, $persona->segundo_ap]);
    }



    public function create()
    {
        return view('personas.create');
    }

    public function store(PersonaRequest $request)
    {
 
        $persona = new Persona();

        $persona->nombre = $request->nombre;
        $persona->primer_ap = $request->primer_ap;
        $persona->segundo_ap = $request->segundo_ap;
        $persona->rfc = $request->rfc;
        $persona->telefono = $request->telefono;
        $persona->tipo_persona = $request->tipo_persona;
        $persona->estatus = $request->estatus;

        
        $persona->save();

        return redirect()->route('personas.index');
    }

    public function show(Persona $persona)
    {
        return response()->json(['personas' => $persona]);
    }

    //Activar o desactivar
    public function activated(Request $request, Persona $persona)  {
        $persona->estatus = $request->estatus;

        $persona->save();

        // Obtener la URL actual
        $currentUrl = URL::previous();

        // Redirigir a la URL actual
        return redirect($currentUrl);
    }

    public function edit($id)
    {
        $persona = Persona::find($id);

        return response()->json(['persona' => $persona]);
    }


    public function update(PersonaRequest $request, Persona $persona)
    {

        $persona->nombre = $request->nombre;
        $persona->primer_ap = $request->primer_ap;
        $persona->segundo_ap = $request->segundo_ap;
        $persona->rfc = $request->rfc;
        $persona->telefono = $request->telefono;
        $persona->tipo_persona = $request->tipo_persona;
        $persona->estatus = $request->estatus;

        $persona->save();

        // Obtener la URL actual
        $currentUrl = URL::previous();

        // Redirigir a la URL actual
        return redirect($currentUrl);
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        // Obtener la URL actual
        $currentUrl = URL::previous();

        // Redirigir a la URL actual
        return redirect($currentUrl);
    }
}
