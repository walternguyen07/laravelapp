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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Watched\WatchedRepository;
use App\Http\Requests\Backend\Watched\ManageWatchedRequest;

/**
 * Class WatchedsTableController.
 */
class WatchedsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var WatchedRepository
     */
    protected $watched;

    /**
     * contructor to initialize repository object
     * @param WatchedRepository $watched;
     */
    public function __construct(WatchedRepository $watched)
    {
        $this->watched = $watched;
    }

    /**
     * This method return the data of the model
     * @param ManageWatchedRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageWatchedRequest $request)
    {
        return Datatables::of($this->watched->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($watched) {
                return Carbon::parse($watched->created_at)->toDateString();
            })
            ->addColumn('actions', function ($watched) {
                return $watched->action_buttons;
            })
            ->make(true);
    }
}
