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
namespace App\Http\Responses\Backend\PhongBan;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\PhongBan\PhongBan
     */
    protected $phongbans;

    /**
     * @param App\Models\PhongBan\PhongBan $phongbans
     */
    public function __construct($phongbans)
    {
        $this->phongbans = $phongbans;
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
        return view('backend.phongbans.edit')->with([
            'phongbans' => $this->phongbans
        ]);
    }
}