<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalRequest;
use App\Repositories\AnimalRepository;
use App\Repositories\BarnyardRepository;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $repository;
    private $barnyardRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        AnimalRepository $animalRepository,
        BarnyardRepository $barnyardRepository
    ) {
        $this->repository = $animalRepository;
        $this->barnyardRepository = $barnyardRepository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function ageAverage()
    {
        return response()->success($this->repository->ageAverage());
    }

    public function show($id)
    {
        try {
            $animal = $this->repository->find($id);
            if (null == $animal) {
                return response()->json(['error' =>  'animal no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $animal, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(StoreAnimalRequest $animalRequest)
    {

        try {

            if (!$this->checkSpace($animalRequest->get('barnyard_id'))) {
                return response()->json(['data' =>  'no hay espacio ', 'code' => 400], 200);
            }

            $animal = $this->repository->create($animalRequest->all());
            return response()->json(['data' =>  $animal, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function checkSpace($id)
    {
        return $this->barnyardRepository->disponibility($id);
    }

    public function update(Request $animalUpdateRequest, $id)
    {
        try {
            $animal = $this->repository->update($animalUpdateRequest->all(), $id);
            return response()->json(['data' =>  $animal, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function destroy($id)
    {
        try {
            if (($this->repository->delete($id))) {
                return response()->json(['data' =>  'Eliminado Correcto', 'code' => 200], 200);
            }
            return response()->json(['error' =>  'Operacion no realizada. Posible error: animal no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
