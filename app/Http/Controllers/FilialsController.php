<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilialsRequest;
use App\Http\Requests\UpdateFilialsRequest;
use App\Repositories\FilialsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Models\Filials;
use Symfony\Component\HttpFoundation\Response;


class FilialsController extends AppBaseController
{
    /** @var  FilialsRepository */
    private $filialsRepository;

    public function __construct(FilialsRepository $filialsRepo)
    {
        $this->filialsRepository = $filialsRepo;
    }

    /**
     * Display a listing of the Filials.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filials = $this->filialsRepository->all();

        return view('filials.index')
            ->with('filials', $filials);
    }

    /**
     * Show the form for creating a new Filial.
     *
     * @return Response
     */
    public function create()
    {
        return view('filials.create');
    }

    /**
     * Store a newly created Filial in storage.
     *
     * @param CreateFilialsRequest $request
     *
     * @return Response
     */
    public function store(CreateFilialsRequest $request)
    {
        $input = $request->all();

        $filials = $this->filialsRepository->create($input);

        Flash::success('Филиал успешно сохранён.');

        return redirect(route('filials.index'));
    }

    /**
     * Display the specified Filial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filials = $this->filialsRepository->find($id);

        if (empty($filials)) {
            Flash::error('Филиал не найден');

            return redirect(route('filials.index'));
        }

        return view('filials.show')->with('filials', $filials);
    }

    /**
     * Show the form for editing the specified Filial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filials = $this->filialsRepository->find($id);

        if (empty($filials)) {
            Flash::error('Филиал не найден');

            return redirect(route('filials.index'));
        }

        return view('filials.edit')->with('filials', $filials);
    }

    /**
     * Update the specified Filials in storage.
     *
     * @param int $id
     * @param UpdateFilialsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFilialsRequest $request)
    {
        $filial = $this->filialsRepository->find($id);

        if (empty($filial)) {
            Flash::error('Филиал не найден');

            return redirect(route('filials.index'));
        }

        $filial = $this->filialsRepository->update($request->all(), $id);

        Flash::success('Филиал успешно обновлён.');

        return redirect(route('filials.index'));
    }

    /**
     * Remove the specified Filial from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filials = $this->filialsRepository->find($id);

        if (empty($filials)) {
            Flash::error('Филиал не найден');

            return redirect(route('filials.index'));
        }

        $this->filialsRepository->delete($id);

        Flash::success('Филиал успешно удалён.');

        return redirect(route('filials.index'));
    }


    /**
     * Set user filial (session).
     *
     * @param Request $request
     *
     * @return Response
     */
    public function setUserFilial(Request $request)
    {

        $filial_id = $request->get('filial_id');
        /** @var Filials $filial */
        $filial = $this->filialsRepository->find($filial_id);

        $current_filial = ['filial_id' => $filial->id , 'filial_name' => $filial->name];
        session(['user_current_filial' => $current_filial]);

        return $this->sendResponse(['result' => true, 'filial' => $current_filial], Response::HTTP_OK);
    }

}
