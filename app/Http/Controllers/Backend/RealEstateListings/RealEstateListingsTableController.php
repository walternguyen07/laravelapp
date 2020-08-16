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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\RealEstateListings\RealEstateListingRepository;
use App\Http\Requests\Backend\RealEstateListings\ManageRealEstateListingRequest;

/**
 * Class RealEstateListingsTableController.
 */
class RealEstateListingsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var RealEstateListingRepository
     */
    protected $realestatelisting;

    /**
     * contructor to initialize repository object
     * @param RealEstateListingRepository $realestatelisting;
     */
    public function __construct(RealEstateListingRepository $realestatelisting)
    {
        $this->realestatelisting = $realestatelisting;
    }

    /**
     * This method return the data of the model
     * @param ManageRealEstateListingRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRealEstateListingRequest $request)
    {
        return Datatables::of($this->realestatelisting->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($realestatelisting) {
                return Carbon::parse($realestatelisting->created_at)->toDateString();
            })
            ->addColumn('actions', function ($realestatelisting) {
                return $realestatelisting->action_buttons;
            })
            ->make(true);
    }
}
