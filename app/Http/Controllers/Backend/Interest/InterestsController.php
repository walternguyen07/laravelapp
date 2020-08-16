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
namespace App\Http\Controllers\Backend\Interest;

use App\Models\Interest\Interest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Interest\CreateResponse;
use App\Http\Responses\Backend\Interest\EditResponse;
use App\Repositories\Backend\Interest\InterestRepository;
use App\Http\Requests\Backend\Interest\ManageInterestRequest;
use App\Http\Requests\Backend\Interest\CreateInterestRequest;
use App\Http\Requests\Backend\Interest\StoreInterestRequest;
use App\Http\Requests\Backend\Interest\EditInterestRequest;
use App\Http\Requests\Backend\Interest\UpdateInterestRequest;
use App\Http\Requests\Backend\Interest\DeleteInterestRequest;

/**
 * InterestsController
 */
class InterestsController extends Controller
{
    /**
     * variable to store the repository object
     * @var InterestRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param InterestRepository $repository;
     */
    public function __construct(InterestRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Interest\ManageInterestRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageInterestRequest $request)
    {
        return new ViewResponse('backend.interests.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateInterestRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Interest\CreateResponse
     */
    public function create(CreateInterestRequest $request)
    {
        return new CreateResponse('backend.interests.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreInterestRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreInterestRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.interests.index'), ['flash_success' => trans('alerts.backend.interests.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Interest\Interest  $interest
     * @param  EditInterestRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Interest\EditResponse
     */
    public function edit(Interest $interest, EditInterestRequest $request)
    {
        return new EditResponse($interest);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateInterestRequestNamespace  $request
     * @param  App\Models\Interest\Interest  $interest
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateInterestRequest $request, Interest $interest)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $interest, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.interests.index'), ['flash_success' => trans('alerts.backend.interests.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteInterestRequestNamespace  $request
     * @param  App\Models\Interest\Interest  $interest
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Interest $interest, DeleteInterestRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($interest);
        //returning with successfull message
        return new RedirectResponse(route('admin.interests.index'), ['flash_success' => trans('alerts.backend.interests.deleted')]);
    }
    
}
