<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade laravel walter package to newer
 * versions in the future.
 *
 * @category    Walter
 * @package     Laravel
 * @author      Walter Nguyen
 * @copyright   Copyright (c) Walter Nguyen
 */
namespace App\Http\Controllers\Backend\Street;

use App\Models\Street\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Street\CreateResponse;
use App\Http\Responses\Backend\Street\EditResponse;
use App\Repositories\Backend\Street\StreetRepository;
use App\Http\Requests\Backend\Street\ManageStreetRequest;
use App\Http\Requests\Backend\Street\CreateStreetRequest;
use App\Http\Requests\Backend\Street\StoreStreetRequest;
use App\Http\Requests\Backend\Street\EditStreetRequest;
use App\Http\Requests\Backend\Street\UpdateStreetRequest;
use App\Http\Requests\Backend\Street\DeleteStreetRequest;

/**
 * StreetsController
 */
class StreetsController extends Controller
{
    /**
     * variable to store the repository object
     * @var StreetRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param StreetRepository $repository;
     */
    public function __construct(StreetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Street\ManageStreetRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageStreetRequest $request)
    {
        return new ViewResponse('backend.streets.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateStreetRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Street\CreateResponse
     */
    public function create(CreateStreetRequest $request)
    {
        return new CreateResponse('backend.streets.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStreetRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreStreetRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.streets.index'), ['flash_success' => trans('alerts.backend.streets.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Street\Street  $street
     * @param  EditStreetRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Street\EditResponse
     */
    public function edit(Street $street, EditStreetRequest $request)
    {
        return new EditResponse($street);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStreetRequestNamespace  $request
     * @param  App\Models\Street\Street  $street
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateStreetRequest $request, Street $street)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $street, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.streets.index'), ['flash_success' => trans('alerts.backend.streets.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteStreetRequestNamespace  $request
     * @param  App\Models\Street\Street  $street
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Street $street, DeleteStreetRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($street);
        //returning with successfull message
        return new RedirectResponse(route('admin.streets.index'), ['flash_success' => trans('alerts.backend.streets.deleted')]);
    }
    
}
