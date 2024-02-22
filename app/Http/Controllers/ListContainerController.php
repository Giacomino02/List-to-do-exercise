<?php

namespace App\Http\Controllers;

use App\Models\ListContainer;
use Illuminate\Http\Request;
use Psy\Command\ListCommand;

// si occupa della logica delle liste (CRUD):
class ListContainerController extends Controller
{
    public function create(Request $request)
    {
        $list = new ListContainer();
        $list->activity = $request->input('activity');
        $list->check = $request->input('check') ? true : false;
        $list->position = $request->input('position');
        $list->save();
        return redirect('/list');
    }

    public function read(Request $request)
    {
        // il metodo all del modello mi restituisce una collection (una specie di array), è una classe
        // query builder (classe)
        $lists = ListContainer::query()->orderBy('position', 'asc')->get();
        return view('listContainerView', [
            "lists" => $lists
        ]);
    }

    public function edit(Request $request, ListContainer $list){
        // compact() crea un array associativo con i dati che gli vengono dati 
        // in questo caso risulterà ['list' => $list]
        return view('listContainerEdit', compact('list'));
    }

    // Non voglio aggiornare TUTTI i dati, solo l elemento che ho editato (method validate())
    public function update(Request $request, ListContainer $list)
    {
        // $updateData = $request->validate([
        //     'activity' => '',
        //     'check' => '',
        //     'position' => '',
        // ]);
        $list->update($request->all());
        return redirect('/list');
    }

    public function delete(Request $request, ListContainer $list)
    {
        $list->delete();
        // => ritorna alla pagina principale list
        return redirect('/list');
    }

    public function createView(Request $request)
    {
        return view('formCreateList');
    }
}
