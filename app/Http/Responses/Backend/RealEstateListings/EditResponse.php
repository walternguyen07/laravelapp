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
namespace App\Http\Responses\Backend\RealEstateListings;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\RealEstateListings\RealEstateListing
     */
    protected $realestatelistings;

    /**
     * @param App\Models\RealEstateListings\RealEstateListing $realestatelistings
     */
    public function __construct($realestatelistings)
    {
        $this->realestatelistings = $realestatelistings;
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
        return view('backend.realestatelistings.edit')->with([
            'realestatelistings' => $this->realestatelistings
        ]);
    }
}