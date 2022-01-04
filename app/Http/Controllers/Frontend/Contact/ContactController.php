<?php

/**
 * Contact send mail
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Contact;
use App\Repositories\Services\ContactService;

class ContactController extends Controller
{
    /**
     * Properties ContactService
     *
     * @var ContactService|\App\Repositories\Services\ContactService
     */
    protected $contactService;

    /**
     * Inject contactService
     *
     * @param App\Repositories\Services\ContactService $contactService Inject contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Create contact and send mail
     *
     * @param App\Http\Requests\Contact\StoreContactRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreContactRequest $request)
    {
        $this->contactService->create($request);

        return redirect()->route('home.index');
    }
}
