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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Interest\InterestRepository;
use App\Http\Requests\Backend\Interest\ManageInterestRequest;

/**
 * Class InterestsTableController.
 */
class InterestsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var InterestRepository
     */
    protected $interest;

    /**
     * contructor to initialize repository object
     * @param InterestRepository $interest;
     */
    public function __construct(InterestRepository $interest)
    {
        $this->interest = $interest;
    }

    /**
     * This method return the data of the model
     * @param ManageInterestRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageInterestRequest $request)
    {
        return Datatables::of($this->interest->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($interest) {
                return Carbon::parse($interest->created_at)->toDateString();
            })
            ->addColumn('actions', function ($interest) {
                return $interest->action_buttons;
            })
            ->make(true);
    }
}
