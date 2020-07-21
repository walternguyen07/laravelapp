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
namespace App\Repositories\Backend\Department;

use DB;
use App\Events\Backend\Department\DepartmentCreated;
use App\Events\Backend\Department\DepartmentDeleted;
use App\Events\Backend\Department\DepartmentUpdated;
use Carbon\Carbon;
use App\Models\Department\Department;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DepartmentRepository.
 */
class DepartmentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Department::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.departments.table').'.id',
                config('module.departments.table').'.name',
                config('module.departments.table').'.status',
                config('module.departments.table').'.created_at',
                config('module.departments.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Department::create($input)) {
            event(new DepartmentCreated($department));
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.departments.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Department $department
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Department $department, array $input)
    {
        if ($department->update($input))
        event(new DepartmentUpdated($department));
            return true;

        throw new GeneralException(trans('exceptions.backend.departments.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Department $department
     * @throws GeneralException
     * @return bool
     */
    public function delete(Department $department)
    {
        if ($department->delete()) {
            event(new DepartmentDeleted($department));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.departments.delete_error'));
    }
}
