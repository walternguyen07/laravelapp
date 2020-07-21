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
namespace App\Http\Controllers\Backend\ProfessionalTitles;

use App\Models\ProfessionalTitles\ProfessionalTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ProfessionalTitles\CreateResponse;
use App\Http\Responses\Backend\ProfessionalTitles\EditResponse;
use App\Repositories\Backend\ProfessionalTitles\ProfessionalTitleRepository;
use App\Http\Requests\Backend\ProfessionalTitles\ManageProfessionalTitleRequest;
use App\Http\Requests\Backend\ProfessionalTitles\CreateProfessionalTitleRequest;
use App\Http\Requests\Backend\ProfessionalTitles\StoreProfessionalTitleRequest;
use App\Http\Requests\Backend\ProfessionalTitles\EditProfessionalTitleRequest;
use App\Http\Requests\Backend\ProfessionalTitles\UpdateProfessionalTitleRequest;
use App\Http\Requests\Backend\ProfessionalTitles\DeleteProfessionalTitleRequest;

/**
 * ProfessionalTitlesController
 */
class ProfessionalTitlesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProfessionalTitleRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProfessionalTitleRepository $repository;
     */
    public function __construct(ProfessionalTitleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ProfessionalTitles\ManageProfessionalTitleRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageProfessionalTitleRequest $request)
    {
        return new ViewResponse('backend.professionaltitles.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProfessionalTitleRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ProfessionalTitles\CreateResponse
     */
    public function create(CreateProfessionalTitleRequest $request)
    {
        return new CreateResponse('backend.professionaltitles.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProfessionalTitleRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreProfessionalTitleRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.professionaltitles.index'), ['flash_success' => trans('alerts.backend.professionaltitles.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ProfessionalTitles\ProfessionalTitle  $professionaltitle
     * @param  EditProfessionalTitleRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ProfessionalTitles\EditResponse
     */
    public function edit(ProfessionalTitle $professionaltitle, EditProfessionalTitleRequest $request)
    {
        return new EditResponse($professionaltitle);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProfessionalTitleRequestNamespace  $request
     * @param  App\Models\ProfessionalTitles\ProfessionalTitle  $professionaltitle
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateProfessionalTitleRequest $request, ProfessionalTitle $professionaltitle)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $professionaltitle, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.professionaltitles.index'), ['flash_success' => trans('alerts.backend.professionaltitles.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProfessionalTitleRequestNamespace  $request
     * @param  App\Models\ProfessionalTitles\ProfessionalTitle  $professionaltitle
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(ProfessionalTitle $professionaltitle, DeleteProfessionalTitleRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($professionaltitle);
        //returning with successfull message
        return new RedirectResponse(route('admin.professionaltitles.index'), ['flash_success' => trans('alerts.backend.professionaltitles.deleted')]);
    }
    
}
