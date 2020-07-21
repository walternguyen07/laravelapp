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
namespace App\Repositories\Backend\ProfessionalTitles;

use DB;
use Carbon\Carbon;
use App\Models\ProfessionalTitles\ProfessionalTitle;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfessionalTitleRepository.
 */
class ProfessionalTitleRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ProfessionalTitle::class;

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
                config('module.professionaltitles.table').'.id',
                config('module.professionaltitles.table').'.created_at',
                config('module.professionaltitles.table').'.updated_at',
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
        if (ProfessionalTitle::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.professionaltitles.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param ProfessionalTitle $professionaltitle
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(ProfessionalTitle $professionaltitle, array $input)
    {
    	if ($professionaltitle->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.professionaltitles.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param ProfessionalTitle $professionaltitle
     * @throws GeneralException
     * @return bool
     */
    public function delete(ProfessionalTitle $professionaltitle)
    {
        if ($professionaltitle->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.professionaltitles.delete_error'));
    }
}
