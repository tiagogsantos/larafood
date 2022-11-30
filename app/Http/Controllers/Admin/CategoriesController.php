<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;

        $this->middleware(['can:categorias']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->repository->paginate();

        return view('admin.pages.categories.index', [
            'categories' => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('categories.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category = Category::where('id', $id)->first();

        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.tables.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        $category->update($data);

        return view('admin.pages.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$category = $this->repository->find($id)) {
            return redirect()->back();
        }

        $category->delete();

        return view('admin.pages.categories.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $categories = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                    $query->orWhere('name', 'LIKE', "%$request->filter%");
                }
            })
            ->latest()
            ->paginate();

        return view('admin.pages.categories.index', compact('categories', 'filters'));
    }
}
