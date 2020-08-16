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
namespace App\Http\Controllers\Backend\RealEstateListings;

use App\Models\RealEstateListings\RealEstateListing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\RealEstateListings\CreateResponse;
use App\Http\Responses\Backend\RealEstateListings\EditResponse;
use App\Repositories\Backend\RealEstateListings\RealEstateListingRepository;
use App\Http\Requests\Backend\RealEstateListings\ManageRealEstateListingRequest;
use App\Http\Requests\Backend\RealEstateListings\CreateRealEstateListingRequest;
use App\Http\Requests\Backend\RealEstateListings\StoreRealEstateListingRequest;
use App\Http\Requests\Backend\RealEstateListings\EditRealEstateListingRequest;
use App\Http\Requests\Backend\RealEstateListings\UpdateRealEstateListingRequest;
use App\Http\Requests\Backend\RealEstateListings\DeleteRealEstateListingRequest;

/**
 * RealEstateListingsController
 */
class RealEstateListingsController extends Controller
{
    /**
     * variable to store the repository object
     * @var RealEstateListingRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RealEstateListingRepository $repository;
     */
    public function __construct(RealEstateListingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\RealEstateListings\ManageRealEstateListingRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageRealEstateListingRequest $request)
    {
        return new ViewResponse('backend.realestatelistings.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRealEstateListingRequestNamespace  $request
     * @return \App\Http\Responses\Backend\RealEstateListings\CreateResponse
     */
    public function create(CreateRealEstateListingRequest $request)
    {
        return new CreateResponse('backend.realestatelistings.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRealEstateListingRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreRealEstateListingRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.realestatelistings.index'), ['flash_success' => trans('alerts.backend.realestatelistings.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\RealEstateListings\RealEstateListing  $realestatelisting
     * @param  EditRealEstateListingRequestNamespace  $request
     * @return \App\Http\Responses\Backend\RealEstateListings\EditResponse
     */
    public function edit(RealEstateListing $realestatelisting, EditRealEstateListingRequest $request)
    {
        return new EditResponse($realestatelisting);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRealEstateListingRequestNamespace  $request
     * @param  App\Models\RealEstateListings\RealEstateListing  $realestatelisting
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateRealEstateListingRequest $request, RealEstateListing $realestatelisting)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $realestatelisting, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.realestatelistings.index'), ['flash_success' => trans('alerts.backend.realestatelistings.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRealEstateListingRequestNamespace  $request
     * @param  App\Models\RealEstateListings\RealEstateListing  $realestatelisting
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(RealEstateListing $realestatelisting, DeleteRealEstateListingRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($realestatelisting);
        //returning with successfull message
        return new RedirectResponse(route('admin.realestatelistings.index'), ['flash_success' => trans('alerts.backend.realestatelistings.deleted')]);
    }
    
}
