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
namespace App\Repositories\Backend\PhongBan;

use DB;
use Carbon\Carbon;
use App\Models\PhongBan\PhongBan;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PhongBanRepository.
 */
class PhongBanRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = PhongBan::class;

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
                config('module.phongbans.table').'.id',
                config('module.phongbans.table').'.created_at',
                config('module.phongbans.table').'.updated_at',
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
        if (PhongBan::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.phongbans.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param PhongBan $phongban
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(PhongBan $phongban, array $input)
    {
    	if ($phongban->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.phongbans.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param PhongBan $phongban
     * @throws GeneralException
     * @return bool
     */
    public function delete(PhongBan $phongban)
    {
        if ($phongban->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.phongbans.delete_error'));
    }
}
