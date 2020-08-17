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
namespace App\Http\Responses\Backend\Street;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Street\Street
     */
    protected $streets;

    /**
     * @param App\Models\Street\Street $streets
     */
    public function __construct($streets)
    {
        $this->streets = $streets;
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
        return view('backend.streets.edit')->with([
            'streets' => $this->streets
        ]);
    }
}