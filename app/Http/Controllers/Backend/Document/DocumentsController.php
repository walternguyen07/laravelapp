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
namespace App\Http\Controllers\Backend\Document;

use App\Models\Document\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Document\CreateResponse;
use App\Http\Responses\Backend\Document\EditResponse;
use App\Repositories\Backend\Document\DocumentRepository;
use App\Http\Requests\Backend\Document\ManageDocumentRequest;
use App\Http\Requests\Backend\Document\CreateDocumentRequest;
use App\Http\Requests\Backend\Document\StoreDocumentRequest;
use App\Http\Requests\Backend\Document\EditDocumentRequest;
use App\Http\Requests\Backend\Document\UpdateDocumentRequest;
use App\Http\Requests\Backend\Document\DeleteDocumentRequest;

/**
 * DocumentsController
 */
class DocumentsController extends Controller
{
    /**
     * variable to store the repository object
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DocumentRepository $repository;
     */
    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Document\ManageDocumentRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDocumentRequest $request)
    {
        return new ViewResponse('backend.documents.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDocumentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Document\CreateResponse
     */
    public function create(CreateDocumentRequest $request)
    {
        return new CreateResponse('backend.documents.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDocumentRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreDocumentRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Document\Document  $document
     * @param  EditDocumentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Document\EditResponse
     */
    public function edit(Document $document, EditDocumentRequest $request)
    {
        return new EditResponse($document);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDocumentRequestNamespace  $request
     * @param  App\Models\Document\Document  $document
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $document, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDocumentRequestNamespace  $request
     * @param  App\Models\Document\Document  $document
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Document $document, DeleteDocumentRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($document);
        //returning with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.deleted')]);
    }
    
}
