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
namespace App\Repositories\Backend\Document;

use DB;
use Carbon\Carbon;
use App\Models\Document\Document;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentRepository.
 */
class DocumentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Document::class;

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
                config('module.documents.table').'.id',
                config('module.documents.table').'.created_at',
                config('module.documents.table').'.updated_at',
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
        if (Document::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.documents.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Document $document
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Document $document, array $input)
    {
    	if ($document->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.documents.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Document $document
     * @throws GeneralException
     * @return bool
     */
    public function delete(Document $document)
    {
        if ($document->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.documents.delete_error'));
    }
}
