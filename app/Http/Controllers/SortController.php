<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortController extends Controller
{
    //
    public function sort()
    {
        $arr = [12, 3, 2, 5, 9, 6, 1];
//        echo "<pre>";
        $this->quick_sort($arr);
        var_dump(json_encode($arr));
        exit();
    }

    /**
     * 插入排序
     * 时间复杂度 O(n^2)
     * 1、第一层循环：循环待比较的所有元素，记录当前选择的元素
     * 2、第二层循环：当前选择的元素与已排好序的元素相比较，符合条件则交换
     * 3、从第二个元素开始循环，默认第一个元素已排好序
     *
     */
    public function insert_sort(array &$arr)
    {
        for ($i=1; $i < count($arr); $i++) {
            $a = $arr[$i];
            for ($j=$i-1; $j>=0 && $a<$arr[$j]; $j--) {
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $a;
            }
        }
//        return $arr;
    }

    /**
     * 冒泡排序
     * 时间复杂度 O(n^2)
     * 1、依次比较数组当中的左右元素，满足条件时，交换位置，保证右边的数大于左边的数
     * 2、第一轮结束后，数组最后一个元素一定是数组最大的元素
     * 3、对于剩下的 n-1 个数再执行步骤1
     * 4、利用tag可以减少执行次数，当没有任何数交换时，tag=0，表示数组有序，不进入循环
     *
     */
    public function bubble_sort($arr)
    {
        $n = count($arr);
        $tag = 1;
        for ($i=0; $i<$n && $tag == 1; $i++) {
            $tag = 0;
            for ($j=1; $j<$n-$i; $j++) {
                if ($arr[$j-1] > $arr[$j]) {
                    $tmp = $arr[$j-1];
                    $arr[$j-1] = $arr[$j];
                    $arr[$j] = $tmp;
                    $tag = 1;
                }
            }
        }

        return $arr;
    }

    /**
     * 快速排序
     */
    public function quick_sort(array &$arr)
    {
        $this->quick($arr, 0, count($arr)-1);
//        return $arr;
    }

    /**
     * 递归
     */
    private function quick(array &$arr, $start, $end)
    {
        if ($start < $end) {
            $i = $this->hoare($arr, $start, $end);
            $this->quick($arr, $start, $i - 1);
            $this->quick($arr, $i + 1, $end);
        }
    }

    /**
     * 找出中间数的位置
     */
    private function hoare(array &$arr, $start, $end)
    {
        $x = $arr[$end];
        $j = $start-1;
        for ($i=$start; $i<$end; $i++) {
            if ($arr[$i] < $x) {
                $j++;
                $tmp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $tmp;
            }
        }
        $arr[$end] = $arr[$j+1];
        $arr[$j+1] = $x;

        return $j+1;
    }
}
