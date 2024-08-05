<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $query = Good::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->has('stock_id')) {
            $query->whereHas('stocks', function ($query) use ($request) {
                $query->where('id', $request->input('stock_id'));
            });
        }

        $goods = $query->get();

        if ($request->has('price_min') && $request->has('price_max')) {
            $priceMin = $request->input('price_min');
            $priceMax = $request->input('price_max');

            $goods = $goods->filter(function ($good) use ($priceMin, $priceMax) {
                return $good->price['price'] >= $priceMin && $good->price['price'] <= $priceMax;
            });
        }

        if ($request->has('characteristic_name') && $request->has('characteristic_value')) {
            $characteristicName = $request->input('characteristic_name');
            $characteristicValue = $request->input('characteristic_value');

            $goods = $goods->filter(function ($good) use ($characteristicName, $characteristicValue) {
                return $good->characteristics->contains(function ($characteristic) use ($characteristicName, $characteristicValue) {
                    return $characteristic->name === $characteristicName && $characteristic->value === $characteristicValue;
                });
            });
        }

        if ($request->has('sort_by')) {
            $goods = $goods->sortBy('name');
        }

        if ($request->has('fields')) {
            $fields = explode(',', $request->input('fields'));
            $goods = $goods->map(function ($good) use ($fields) {
                return collect($good)->only($fields);
            });
        }

        $goods = new \Illuminate\Pagination\LengthAwarePaginator(
            $goods->forPage($request->input('page', 1), 14),
            $goods->count(),
            14,
            $request->input('page', 1),
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return response()->json([
            'success' => true,
            'data' => $goods
        ], 200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $good = Good::with(['stocks' => function ($query) {
            $query->select('id', 'count', 'address', 'good_id');
        }, 'characteristics' => function ($query) {
            $query->select('id', 'name', 'value', 'good_id');
        }])->find($id);

        if ($good) {
            return response()->json([
                'success' => true,
                'data' => $good
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Good not found'
            ], 404);
        }
    }
}
