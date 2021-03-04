<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkersRequest;
use App\Http\Requests\UpdateWorkersRequest;
use App\Models\Filials;
use App\Models\Positions;
use App\Repositories\WorkersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WorkersController extends AppBaseController
{
    /** @var  WorkersRepository */
    private $workersRepository;

    public function __construct(WorkersRepository $workersRepo)
    {
        $this->workersRepository = $workersRepo;
    }

    /**
     * Display a listing of the Workers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $workers = $this->workersRepository->all();

        $filials = Filials::get()->map(function (Filials $q) {
           return [$q->id => $q->name];
        });

        $positions = Positions::get()->map(function (Positions $q) {
            return [$q->id => $q->name];
        });

        return view('workers.index')
            ->with(['workers' => $workers, 'filials' => $filials, 'positions' => $positions]);
    }

    /**
     * Show the form for creating a new Workers.
     *
     * @return Response
     */
    public function create()
    {
        $filials = Filials::get()->toArray();

        $positions = Positions::get()->toArray();

        return view('workers.create')
            ->with(['filials' => $filials, 'positions' => $positions]);
    }

    /**
     * Store a newly created Workers in storage.
     *
     * @param CreateWorkersRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkersRequest $request)
    {
        $input = $request->all();

        $workers = $this->workersRepository->create($input);

        Flash::success('Сотрудник успешно сохранён.');

        return redirect(route('workers.index'));
    }

    /**
     * Display the specified Workers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $worker = $this->workersRepository->find($id);

        if (empty($worker)) {
            Flash::error('Workers not found');

            return redirect(route('workers.index'));
        }

        return view('workers.show')->with('worker', $worker);
    }

    /**
     * Show the form for editing the specified Workers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $worker = $this->workersRepository->find($id);

        if (empty($worker)) {
            Flash::error('Сотрудник не найден');

            return redirect(route('workers.index'));
        }

        $filials = Filials::get()->map(function (Filials $q) {
            return ['id' => $q->id, 'name' => $q->name];
        });

        $positions = Positions::get()->map(function (Positions $q) {
            return ['id' => $q->id, 'name' => $q->name];
        });

        return view('workers.edit')->with('workers', $worker)
            ->with(['worker' => $worker, 'filials' => $filials, 'positions' => $positions]);
    }

    /**
     * Update the specified Workers in storage.
     *
     * @param int $id
     * @param UpdateWorkersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkersRequest $request)
    {
        $worker = $this->workersRepository->find($id);

        if (empty($worker)) {
            Flash::error('Сотрудник не найден');

            return redirect(route('workers.index'));
        }

        $worker = $this->workersRepository->update($request->all(), $id);

        Flash::success('Сотрудник успешно сохранён.');

        return redirect(route('workers.index'));
    }

    /**
     * Remove the specified Workers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workers = $this->workersRepository->find($id);

        if (empty($workers)) {
            Flash::error('Сотрудник не найден');

            return redirect(route('workers.index'));
        }

        $this->workersRepository->delete($id);

        Flash::success('Сотрудник удалён.');

        return redirect(route('workers.index'));
    }
}
