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
namespace App\Http\Controllers\Backend\Street;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Street\StreetRepository;
use App\Http\Requests\Backend\Street\ManageStreetRequest;

/**
 * Class StreetsTableController.
 */
class StreetsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var StreetRepository
     */
    protected $street;

    /**
     * contructor to initialize repository object
     * @param StreetRepository $street;
     */
    public function __construct(StreetRepository $street)
    {
        $this->street = $street;
    }

    /**
     * This method return the data of the model
     * @param ManageStreetRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageStreetRequest $request)
    {
        return Datatables::of($this->street->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($street) {
                return Carbon::parse($street->created_at)->toDateString();
            })
            ->addColumn('actions', function ($street) {
                return $street->action_buttons;
            })
            ->make(true);
    }
}
