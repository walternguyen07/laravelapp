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
namespace App\Repositories\Backend\RealEstateListings;

use DB;
use Carbon\Carbon;
use App\Models\RealEstateListings\RealEstateListing;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RealEstateListingRepository.
 */
class RealEstateListingRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = RealEstateListing::class;

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
                config('module.realestatelistings.table').'.id',
                config('module.realestatelistings.table').'.created_at',
                config('module.realestatelistings.table').'.updated_at',
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
        if (RealEstateListing::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.realestatelistings.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param RealEstateListing $realestatelisting
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(RealEstateListing $realestatelisting, array $input)
    {
    	if ($realestatelisting->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.realestatelistings.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param RealEstateListing $realestatelisting
     * @throws GeneralException
     * @return bool
     */
    public function delete(RealEstateListing $realestatelisting)
    {
        if ($realestatelisting->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.realestatelistings.delete_error'));
    }
}
