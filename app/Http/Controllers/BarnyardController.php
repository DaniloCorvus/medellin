<?php

namespace App\Http\Controllers;

use App\Models\Barnyard;
use App\Http\Requests\StoreBarnyardRequest;
use App\Repositories\BarnyardRepository;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class BarnyardController extends Controller
{
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BarnyardRepository $barnyardRepository)
    {
        $this->repository = $barnyardRepository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function show($id)
    {
        try {
            $barnyard = $this->repository->find($id);
            if (null == $barnyard) {
                return response()->json(['error' =>  'barnyard no found', 'code' => 404], 404);
            }
            return response()->json(['data' =>  $barnyard, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function forSelect()
    {
        try {
            $barnyards = $this->repository->forSelect();
            return response()->json(['data' =>  $barnyards, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function store(StoreBarnyardRequest $barnyardRequest)
    {

        try {
            $barnyard = $this->repository->create($barnyardRequest->all());
            return response()->json(['data' =>  $barnyard, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }

    public function update(Request $barnyardUpdateRequest)
    {

        try {
            $barnyard = $this->repository->create($barnyardUpdateRequest->all());
            return response()->json(['data' =>  $barnyard, 'code' => 200], 200);
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
            return response()->json(['error' =>  'Operacion no realizada. Posible error: barnyard no found', 'code' => 404], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }


    public function generate()
    {
        try {
            $barnyards = Barnyard::with('animals')->get();
            $pdf = PDF::loadView('pdf.export', compact('barnyards'));
            return $pdf->download('report.pdf');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'code' => 500], 500);
        }
    }
}
