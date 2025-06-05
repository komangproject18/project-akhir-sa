<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('searching.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'numbers' => 'required|string',
            'algorithm' => 'required|in:bubble,selection',
            'search' => 'nullable|numeric'
        ]);

        $numbers = explode(',', str_replace(' ', '', $request->numbers));
        $numbers = array_map('intval', $numbers);

        $sorted = $request->algorithm == 'bubble'
            ? $this->bubbleSort($numbers)
            : $this->selectionSort($numbers);

        $searchResult = null;
        if ($request->search !== null) {
            $searchResult = $this->binarySearch($sorted, intval($request->search));
        }

        return view('searching.hasil', [
            'sorted' => $sorted,
            'search' => $request->search,
            'searchResult' => $searchResult,
            'algorithm' => $request->algorithm
        ]);
    }

    private function bubbleSort($arr)
    {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
                }
            }
        }
        return $arr;
    }

    private function selectionSort($arr)
    {
        $n = count($arr);
        for ($i = 0; $i < $n; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            [$arr[$i], $arr[$minIndex]] = [$arr[$minIndex], $arr[$i]];
        }
        return $arr;
    }

    private function binarySearch($arr, $target)
    {
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);

            if ($arr[$mid] == $target) {
                return $mid;
            } elseif ($arr[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return -1;
    }
}
