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
namespace App\Http\Responses\Backend\Khachhang;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Khachhang\Khachhang
     */
    protected $khachhangs;

    /**
     * @param App\Models\Khachhang\Khachhang $khachhangs
     */
    public function __construct($khachhangs)
    {
        $this->khachhangs = $khachhangs;
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
        return view('backend.khachhangs.edit')->with([
            'khachhangs' => $this->khachhangs
        ]);
    }
}