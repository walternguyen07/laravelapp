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
namespace App\Http\Controllers\Backend\Department;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Department\DepartmentRepository;
use App\Http\Requests\Backend\Department\ManageDepartmentRequest;

/**
 * Class DepartmentsTableController.
 */
class DepartmentsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DepartmentRepository
     */
    protected $department;

    /**
     * contructor to initialize repository object
     * @param DepartmentRepository $department;
     */
    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    /**
     * This method return the data of the model
     * @param ManageDepartmentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDepartmentRequest $request)
    {
        return Datatables::of($this->department->getForDataTable())
            ->escapeColumns(['id'])
            ->escapeColumns(['name'])
            ->addColumn('status', function ($department) {
                return $department->status == 1 ? "Hoạt động" : "Không hoạt động";
            })
            ->addColumn('created_at', function ($department) {
                return Carbon::parse($department->created_at)->toDateString();
            })
            ->addColumn('actions', function ($department) {
                return $department->action_buttons;
            })
            ->make(true);
    }
}
