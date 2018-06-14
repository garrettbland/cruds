<?php

namespace App\Http\Controllers;

use App\Cruds;
use Illuminate\Http\Request;

//added these in
use Illuminate\Http\Response;
use Faker\Generator;

class CrudsController extends Controller
{

    public function index()
    {
        //index. We return the full set of Cruds with the index method. In a more serious app we’d use pagination, but let’s keep it simple for now.
        return response(Cruds::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Generator $faker)
    {
      $crud = new Cruds();
      $crud->name = $faker->lexify('????????');
      $crud->color = $faker->boolean ? 'red' : 'green';
      $crud->save();
      return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Cruds $cruds)
    {
        //
    }

    public function edit(Cruds $cruds)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //update. This action allows a client to change the color of a Crud.
        $crud = Cruds::findOrFail($id);
        $crud->color = $request->color;
        $crud->save();

        return response(null, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        //destroy. This is how we delete our Cruds.
         Cruds::destroy($id);

         return response(null, Response::HTTP_OK);
    }
}
