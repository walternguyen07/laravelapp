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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Document\DocumentRepository;
use App\Http\Requests\Backend\Document\ManageDocumentRequest;

/**
 * Class DocumentsTableController.
 */
class DocumentsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DocumentRepository
     */
    protected $document;

    /**
     * contructor to initialize repository object
     * @param DocumentRepository $document;
     */
    public function __construct(DocumentRepository $document)
    {
        $this->document = $document;
    }

    /**
     * This method return the data of the model
     * @param ManageDocumentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDocumentRequest $request)
    {
        return Datatables::of($this->document->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($document) {
                return Carbon::parse($document->created_at)->toDateString();
            })
            ->addColumn('actions', function ($document) {
                return $document->action_buttons;
            })
            ->make(true);
    }
}
