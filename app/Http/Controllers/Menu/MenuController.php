<?php

namespace App\Http\Controllers\Menu;

use App\Http\Requests\Menu\AddMenuItemFormRequest;
use App\Http\Services\Menu\MenuItemManagerService;
use App\MenuItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public MenuItemManagerService $menuItemManagerService;

    public function __construct(MenuItemManagerService $menuItemManagerService)
    {
        $this->middleware('auth:restaurant', ['except' => ['getList', 'getInfo', 'search']]);
        $this->menuItemManagerService = $menuItemManagerService;
    }

    public function getList()
    {
        $menuItems = MenuItem::query()
            ->orderByDesc('created_at')
            ->paginate(16);

        return view('menu.list', ['menuItems' => $menuItems]);
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
        $restaurants = $menuItem->restaurants()
            ->orderBy('price')
            ->paginate(16);

        return view('menu.item', ['menuItem' => $menuItem, 'restaurants' => $restaurants]);
    }

    public function search(Request $request)
    {
        $menuItems = '';
        if ($request->ajax()) {
            $menuItems = DB::table('menu_items')
                ->where('menu_item', 'LIKE', '%' . $request->search . "%")
                ->get();
        }
        return Response($menuItems);
    }
}
