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
namespace App\Http\Controllers\Backend\Khachhang;

use App\Models\Khachhang\Khachhang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Khachhang\CreateResponse;
use App\Http\Responses\Backend\Khachhang\EditResponse;
use App\Repositories\Backend\Khachhang\KhachhangRepository;
use App\Http\Requests\Backend\Khachhang\ManageKhachhangRequest;
use App\Http\Requests\Backend\Khachhang\CreateKhachhangRequest;
use App\Http\Requests\Backend\Khachhang\StoreKhachhangRequest;
use App\Http\Requests\Backend\Khachhang\EditKhachhangRequest;
use App\Http\Requests\Backend\Khachhang\UpdateKhachhangRequest;
use App\Http\Requests\Backend\Khachhang\DeleteKhachhangRequest;

/**
 * KhachhangsController
 */
class KhachhangsController extends Controller
{
    /**
     * variable to store the repository object
     * @var KhachhangRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param KhachhangRepository $repository;
     */
    public function __construct(KhachhangRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Khachhang\ManageKhachhangRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageKhachhangRequest $request)
    {
        return new ViewResponse('backend.khachhangs.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateKhachhangRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Khachhang\CreateResponse
     */
    public function create(CreateKhachhangRequest $request)
    {
        return new CreateResponse('backend.khachhangs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreKhachhangRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreKhachhangRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.khachhangs.index'), ['flash_success' => trans('alerts.backend.khachhangs.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Khachhang\Khachhang  $khachhang
     * @param  EditKhachhangRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Khachhang\EditResponse
     */
    public function edit(Khachhang $khachhang, EditKhachhangRequest $request)
    {
        return new EditResponse($khachhang);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateKhachhangRequestNamespace  $request
     * @param  App\Models\Khachhang\Khachhang  $khachhang
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateKhachhangRequest $request, Khachhang $khachhang)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $khachhang, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.khachhangs.index'), ['flash_success' => trans('alerts.backend.khachhangs.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteKhachhangRequestNamespace  $request
     * @param  App\Models\Khachhang\Khachhang  $khachhang
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Khachhang $khachhang, DeleteKhachhangRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($khachhang);
        //returning with successfull message
        return new RedirectResponse(route('admin.khachhangs.index'), ['flash_success' => trans('alerts.backend.khachhangs.deleted')]);
    }
    
}
