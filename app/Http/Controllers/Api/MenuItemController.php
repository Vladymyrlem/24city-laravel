<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:page,post,custom',
            'reference_id' => 'nullable|integer',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'nullable|integer',
        ]);

        $menuItem = MenuItem::create($validated);

        return response()->json(['menuItem' => $menuItem], 201);
    }
    public function getMenuItemsForMenu($menuId)
    {
        $menuItems = MenuItem::where('menu_id', $menuId)->get();
        return response()->json($menuItems);
    }
    /**
     * Display a listing of the menu items.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Отримати всі пункти меню
        $menuItems = MenuItem::with('children') // Завантажуємо дочірні пункти меню
        ->whereNull('parent_id') // Починаємо з верхнього рівня (без батьків)
        ->get();

        // Повертаємо їх у вигляді JSON
        return response()->json($menuItems);
    }
    public function list(Request $request)
    {
        $menuId = $request->get('menu_id');
        $menuItems = MenuItem::where('menu_id', $menuId)->with('children')->get();
        return response()->json($menuItems);
    }

    public function create()
    {
        $menus = Menu::all();
        return view('menu-items.create', compact('menus'));
    }
    public function show($id)
    {
        $menuItem = MenuItem::with('children')->findOrFail($id);
        return view('menu-items.show', compact('menuItem'));
    }

    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menus = Menu::all();
        $menuItems = MenuItem::where('menu_id', $menuItem->menu_id)->get();
        return view('menu-items.edit', compact('menuItem', 'menus', 'menuItems'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'title' => 'required|string|max:255',
            'url' => 'nullable|url',
            'parent_id' => 'nullable|exists:menu_items,id',
        ]);

        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update($validated);

        return redirect()->route('menu-items.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect()->route('menu-items.index')->with('success', 'Menu item deleted successfully.');
    }

    public function trash()
    {
        $menuItems = MenuItem::onlyTrashed()->get();
        return view('menu-items.trash', compact('menuItems'));
    }

    public function restore($id)
    {
        $menuItem = MenuItem::onlyTrashed()->findOrFail($id);
        $menuItem->restore();

        return redirect()->route('menu-items.trash')->with('success', 'Menu item restored successfully.');
    }

    public function forceDelete($id)
    {
        $menuItem = MenuItem::onlyTrashed()->findOrFail($id);
        $menuItem->forceDelete();

        return redirect()->route('menu-items.trash')->with('success', 'Menu item permanently deleted.');
    }
}
