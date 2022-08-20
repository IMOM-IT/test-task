<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountingCarsRequest;
use App\Models\AccountingCars;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class AcoountingCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables()->of(AccountingCars::select('*'))
                ->addColumn('action', 'cars.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountingCarsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountingCarsRequest $request)
    {
        AccountingCars::query()->create($request->validated());
        return redirect()->route('cars.index')
            ->with('success', trans('messages.success'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingCars $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = AccountingCars::query()->where('id', $id)->firstOrFail();
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountingCarsRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountingCarsRequest $request, $id)
    {
        AccountingCars::query()->update($request->validated());
        return redirect()->route('cars.index')
            ->with('success', trans('messages.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cars = AccountingCars::where('id', $request->id)->delete();
        return Response()->json($cars);
    }
}
