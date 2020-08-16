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
namespace App\Http\Controllers\Backend\Watched;

use App\Models\Watched\Watched;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Watched\CreateResponse;
use App\Http\Responses\Backend\Watched\EditResponse;
use App\Repositories\Backend\Watched\WatchedRepository;
use App\Http\Requests\Backend\Watched\ManageWatchedRequest;
use App\Http\Requests\Backend\Watched\CreateWatchedRequest;
use App\Http\Requests\Backend\Watched\StoreWatchedRequest;
use App\Http\Requests\Backend\Watched\EditWatchedRequest;
use App\Http\Requests\Backend\Watched\UpdateWatchedRequest;
use App\Http\Requests\Backend\Watched\DeleteWatchedRequest;

/**
 * WatchedsController
 */
class WatchedsController extends Controller
{
    /**
     * variable to store the repository object
     * @var WatchedRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param WatchedRepository $repository;
     */
    public function __construct(WatchedRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Watched\ManageWatchedRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageWatchedRequest $request)
    {
        return new ViewResponse('backend.watcheds.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateWatchedRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Watched\CreateResponse
     */
    public function create(CreateWatchedRequest $request)
    {
        return new CreateResponse('backend.watcheds.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreWatchedRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreWatchedRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.watcheds.index'), ['flash_success' => trans('alerts.backend.watcheds.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Watched\Watched  $watched
     * @param  EditWatchedRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Watched\EditResponse
     */
    public function edit(Watched $watched, EditWatchedRequest $request)
    {
        return new EditResponse($watched);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateWatchedRequestNamespace  $request
     * @param  App\Models\Watched\Watched  $watched
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateWatchedRequest $request, Watched $watched)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $watched, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.watcheds.index'), ['flash_success' => trans('alerts.backend.watcheds.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteWatchedRequestNamespace  $request
     * @param  App\Models\Watched\Watched  $watched
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Watched $watched, DeleteWatchedRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($watched);
        //returning with successfull message
        return new RedirectResponse(route('admin.watcheds.index'), ['flash_success' => trans('alerts.backend.watcheds.deleted')]);
    }
    
}
