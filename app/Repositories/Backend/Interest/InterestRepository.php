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
namespace App\Repositories\Backend\Interest;

use DB;
use Carbon\Carbon;
use App\Models\Interest\Interest;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InterestRepository.
 */
class InterestRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Interest::class;

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
                config('module.interests.table').'.id',
                config('module.interests.table').'.created_at',
                config('module.interests.table').'.updated_at',
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
        if (Interest::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.interests.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Interest $interest
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Interest $interest, array $input)
    {
    	if ($interest->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.interests.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Interest $interest
     * @throws GeneralException
     * @return bool
     */
    public function delete(Interest $interest)
    {
        if ($interest->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.interests.delete_error'));
    }
}
