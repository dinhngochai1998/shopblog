<?php

namespace App\Http\Controllers\Backend\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TagRepository;
use App\Http\Requests\Tag\TagStoreRequest;

class TagController extends Controller
{
    protected $tagRepo;

    public function __construct(TagRepository $tagRepo)
    {
       
        $this->tagRepo = $tagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = $this->tagRepo->all();
        return view('backend.admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.tag.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $tag = $this->tagRepo->create($request->validated());

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->tagRepo->delete($id);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepo->find($id);

        return view('backend.admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = $this->tagRepo->update($request->all(), $id);
        return redirect()->route('tag.index');
    }


}
