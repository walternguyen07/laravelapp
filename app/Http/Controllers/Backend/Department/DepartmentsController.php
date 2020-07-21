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
namespace App\Http\Controllers\Backend\Department;

use App\Models\Department\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Department\CreateResponse;
use App\Http\Responses\Backend\Department\EditResponse;
use App\Repositories\Backend\Department\DepartmentRepository;
use App\Http\Requests\Backend\Department\ManageDepartmentRequest;
use App\Http\Requests\Backend\Department\CreateDepartmentRequest;
use App\Http\Requests\Backend\Department\StoreDepartmentRequest;
use App\Http\Requests\Backend\Department\EditDepartmentRequest;
use App\Http\Requests\Backend\Department\UpdateDepartmentRequest;
use App\Http\Requests\Backend\Department\DeleteDepartmentRequest;

/**
 * DepartmentsController
 */
class DepartmentsController extends Controller
{
    /**
     * variable to store the repository object
     * @var DepartmentRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DepartmentRepository $repository;
     */
    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Department\ManageDepartmentRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDepartmentRequest $request)
    {
        return new ViewResponse('backend.departments.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDepartmentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Department\CreateResponse
     */
    public function create(CreateDepartmentRequest $request)
    {
        return new CreateResponse('backend.departments.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDepartmentRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreDepartmentRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.departments.index'), ['flash_success' => trans('alerts.backend.departments.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Department\Department  $department
     * @param  EditDepartmentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Department\EditResponse
     */
    public function edit(Department $department, EditDepartmentRequest $request)
    {
        return new EditResponse($department);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDepartmentRequestNamespace  $request
     * @param  App\Models\Department\Department  $department
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $department, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.departments.index'), ['flash_success' => trans('alerts.backend.departments.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDepartmentRequestNamespace  $request
     * @param  App\Models\Department\Department  $department
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Department $department, DeleteDepartmentRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($department);
        //returning with successfull message
        return new RedirectResponse(route('admin.departments.index'), ['flash_success' => trans('alerts.backend.departments.deleted')]);
    }
    
}
