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
namespace App\Repositories\Backend\Khachhang;

use DB;
use Carbon\Carbon;
use App\Models\Khachhang\Khachhang;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KhachhangRepository.
 */
class KhachhangRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Khachhang::class;

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
                config('module.khachhangs.table').'.id',
                config('module.khachhangs.table').'.created_at',
                config('module.khachhangs.table').'.updated_at',
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
        if (Khachhang::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.khachhangs.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Khachhang $khachhang
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Khachhang $khachhang, array $input)
    {
    	if ($khachhang->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.khachhangs.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Khachhang $khachhang
     * @throws GeneralException
     * @return bool
     */
    public function delete(Khachhang $khachhang)
    {
        if ($khachhang->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.khachhangs.delete_error'));
    }
}
