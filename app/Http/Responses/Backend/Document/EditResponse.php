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
namespace App\Http\Responses\Backend\Document;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Document\Document
     */
    protected $documents;

    /**
     * @param App\Models\Document\Document $documents
     */
    public function __construct($documents)
    {
        $this->documents = $documents;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.documents.edit')->with([
            'documents' => $this->documents
        ]);
    }
}