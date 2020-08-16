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
namespace App\Repositories\Backend\Watched;

use DB;
use Carbon\Carbon;
use App\Models\Watched\Watched;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WatchedRepository.
 */
class WatchedRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Watched::class;

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
                config('module.watcheds.table').'.id',
                config('module.watcheds.table').'.created_at',
                config('module.watcheds.table').'.updated_at',
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
        if (Watched::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.watcheds.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Watched $watched
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Watched $watched, array $input)
    {
    	if ($watched->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.watcheds.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Watched $watched
     * @throws GeneralException
     * @return bool
     */
    public function delete(Watched $watched)
    {
        if ($watched->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.watcheds.delete_error'));
    }
}
