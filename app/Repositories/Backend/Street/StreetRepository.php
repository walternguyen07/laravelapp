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
namespace App\Repositories\Backend\Street;

use DB;
use Carbon\Carbon;
use App\Models\Street\Street;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StreetRepository.
 */
class StreetRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Street::class;

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
                config('module.streets.table').'.id',
                config('module.streets.table').'.created_at',
                config('module.streets.table').'.updated_at',
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
        if (Street::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.streets.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Street $street
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Street $street, array $input)
    {
    	if ($street->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.streets.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Street $street
     * @throws GeneralException
     * @return bool
     */
    public function delete(Street $street)
    {
        if ($street->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.streets.delete_error'));
    }
}
