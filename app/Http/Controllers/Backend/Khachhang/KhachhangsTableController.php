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

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Khachhang\KhachhangRepository;
use App\Http\Requests\Backend\Khachhang\ManageKhachhangRequest;

/**
 * Class KhachhangsTableController.
 */
class KhachhangsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var KhachhangRepository
     */
    protected $khachhang;

    /**
     * contructor to initialize repository object
     * @param KhachhangRepository $khachhang;
     */
    public function __construct(KhachhangRepository $khachhang)
    {
        $this->khachhang = $khachhang;
    }

    /**
     * This method return the data of the model
     * @param ManageKhachhangRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageKhachhangRequest $request)
    {
        return Datatables::of($this->khachhang->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($khachhang) {
                return Carbon::parse($khachhang->created_at)->toDateString();
            })
            ->addColumn('actions', function ($khachhang) {
                return $khachhang->action_buttons;
            })
            ->make(true);
    }
}
