<?php

namespace App\Http\Controllers\Menu;

use App\Http\Requests\Menu\AddMenuItemFormRequest;
use App\Http\Services\Menu\MenuItemManagerService;
use App\MenuItem;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class MenuController extends Controller
{
    public MenuItemManagerService $menuItemManagerService;

    public function __construct(MenuItemManagerService $menuItemManagerService)
    {
        $this->middleware('auth:restaurant', ['except' => ['getList', 'getInfo']]);
        $this->menuItemManagerService = $menuItemManagerService;
    }

    public function getList()
    {
        $menuItems = MenuItem::paginate(15);

        return view('menu.menu', ['menuItems' => $menuItems,]);
    }

    public function getAdd()
    {
        return view('menu.menu-add');
    }

    public function postAdd(AddMenuItemFormRequest $request)
    {
        $data = $request->validated();

        $this->menuItemManagerService->store($data);

        return redirect()->route('get.menu.list');
    }

    public function getInfo(MenuItem $menuItem)
    {
        $restaurants = $menuItem->restaurants()->orderBy('price')->paginate(10);

        return view('menu.menu-item', ['menuItem' => $menuItem, 'restaurants' => $restaurants]);
    }
}
