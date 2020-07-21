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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ProfessionalTitles\ProfessionalTitleRepository;
use App\Http\Requests\Backend\ProfessionalTitles\ManageProfessionalTitleRequest;

/**
 * Class ProfessionalTitlesTableController.
 */
class ProfessionalTitlesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProfessionalTitleRepository
     */
    protected $professionaltitle;

    /**
     * contructor to initialize repository object
     * @param ProfessionalTitleRepository $professionaltitle;
     */
    public function __construct(ProfessionalTitleRepository $professionaltitle)
    {
        $this->professionaltitle = $professionaltitle;
    }

    /**
     * This method return the data of the model
     * @param ManageProfessionalTitleRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProfessionalTitleRequest $request)
    {
        return Datatables::of($this->professionaltitle->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($professionaltitle) {
                return Carbon::parse($professionaltitle->created_at)->toDateString();
            })
            ->addColumn('actions', function ($professionaltitle) {
                return $professionaltitle->action_buttons;
            })
            ->make(true);
    }
}
