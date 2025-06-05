<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function index()
    {
        return view('fibbonaci.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'n' => 'required|integer|min:1|max:100'
        ]);

        $n = $request->input('n');
        $fibonacci = $this->generateFibonacci($n);

        return view('fibbonaci.index', compact('n', 'fibonacci'));
    }

    private function generateFibonacci($n)
    {
        $fib = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $fib[] = $fib[$i - 1] + $fib[$i - 2];
        }

        return array_slice($fib, 0, $n);
    }
}
