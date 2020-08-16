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
namespace App\Http\Controllers\Backend\PhongBan;

use App\Models\PhongBan\PhongBan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\PhongBan\CreateResponse;
use App\Http\Responses\Backend\PhongBan\EditResponse;
use App\Repositories\Backend\PhongBan\PhongBanRepository;
use App\Http\Requests\Backend\PhongBan\ManagePhongBanRequest;
use App\Http\Requests\Backend\PhongBan\CreatePhongBanRequest;
use App\Http\Requests\Backend\PhongBan\StorePhongBanRequest;
use App\Http\Requests\Backend\PhongBan\EditPhongBanRequest;
use App\Http\Requests\Backend\PhongBan\UpdatePhongBanRequest;
use App\Http\Requests\Backend\PhongBan\DeletePhongBanRequest;

/**
 * PhongBansController
 */
class PhongBansController extends Controller
{
    /**
     * variable to store the repository object
     * @var PhongBanRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PhongBanRepository $repository;
     */
    public function __construct(PhongBanRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\PhongBan\ManagePhongBanRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePhongBanRequest $request)
    {
        return new ViewResponse('backend.phongbans.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePhongBanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PhongBan\CreateResponse
     */
    public function create(CreatePhongBanRequest $request)
    {
        return new CreateResponse('backend.phongbans.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePhongBanRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePhongBanRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.phongbans.index'), ['flash_success' => trans('alerts.backend.phongbans.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\PhongBan\PhongBan  $phongban
     * @param  EditPhongBanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PhongBan\EditResponse
     */
    public function edit(PhongBan $phongban, EditPhongBanRequest $request)
    {
        return new EditResponse($phongban);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePhongBanRequestNamespace  $request
     * @param  App\Models\PhongBan\PhongBan  $phongban
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePhongBanRequest $request, PhongBan $phongban)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $phongban, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.phongbans.index'), ['flash_success' => trans('alerts.backend.phongbans.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePhongBanRequestNamespace  $request
     * @param  App\Models\PhongBan\PhongBan  $phongban
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(PhongBan $phongban, DeletePhongBanRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($phongban);
        //returning with successfull message
        return new RedirectResponse(route('admin.phongbans.index'), ['flash_success' => trans('alerts.backend.phongbans.deleted')]);
    }
    
}
