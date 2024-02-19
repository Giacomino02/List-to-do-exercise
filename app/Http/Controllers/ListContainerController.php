<?php

namespace App\Http\Controllers;

use App\Models\ListContainer;
use Illuminate\Http\Request;
use Psy\Command\ListCommand;

// si occupa della logica delle liste (CRUD):
class ListContainerController extends Controller
{
    public function create(Request $request){
        $list = new ListContainer();
        $list->activity = $request->input('activity');
        $list->check = $request->input('check')? true:false;
        $list->position = $request->input('position');
        $list->save();
    }

    public function read(Request $request){
        // il metodo all del modello mi restituisce una collection (una specie di array), è una classe
        // query builder (classe)
        $lists = ListContainer::query()->orderBy('position', 'asc')->get();
        return view('listContainerView', [
            "lists" => $lists
        ]);
    }

    public function update(Request $request, ListContainer $list){
        $list->activity = $request->input('activity');
        $list->check = $request->input('check')? true:false;
        $list->save();
        return view('listContainerUpdated', [
            "list" => $list
        ]);
    }

    public function delete(Request $request, ListContainer $list){
        $list->delete();
        return "La lista è stata eliminata";
    }

    public function createView(Request $request){
        return view('formCreateList');
    }
}
