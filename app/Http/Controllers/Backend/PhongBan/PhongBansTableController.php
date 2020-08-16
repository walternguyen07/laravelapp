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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PhongBan\PhongBanRepository;
use App\Http\Requests\Backend\PhongBan\ManagePhongBanRequest;

/**
 * Class PhongBansTableController.
 */
class PhongBansTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PhongBanRepository
     */
    protected $phongban;

    /**
     * contructor to initialize repository object
     * @param PhongBanRepository $phongban;
     */
    public function __construct(PhongBanRepository $phongban)
    {
        $this->phongban = $phongban;
    }

    /**
     * This method return the data of the model
     * @param ManagePhongBanRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePhongBanRequest $request)
    {
        return Datatables::of($this->phongban->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($phongban) {
                return Carbon::parse($phongban->created_at)->toDateString();
            })
            ->addColumn('actions', function ($phongban) {
                return $phongban->action_buttons;
            })
            ->make(true);
    }
}
