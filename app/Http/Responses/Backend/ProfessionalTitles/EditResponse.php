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
namespace App\Http\Responses\Backend\ProfessionalTitles;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ProfessionalTitles\ProfessionalTitle
     */
    protected $professionaltitles;

    /**
     * @param App\Models\ProfessionalTitles\ProfessionalTitle $professionaltitles
     */
    public function __construct($professionaltitles)
    {
        $this->professionaltitles = $professionaltitles;
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
        return view('backend.professionaltitles.edit')->with([
            'professionaltitles' => $this->professionaltitles
        ]);
    }
}