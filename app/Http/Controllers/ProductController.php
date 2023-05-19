<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Arr;

class ProductController extends Controller
{

    function index(){

        $data=Product::query()->paginate(4);

        return view('product', ['list'=>$data,'page_list'=>$data,'total_list'=>$data->total()]);
    }

    function select(Request $request){
        $data=$request->all()["select_p"];

        $sql=Product::query()->whereRaw(" (p_label ='%{$data}%' or  p_name ='%{$data}%' or o_price ='%{$data}%') ")->get();

    }

    public function getlist(Request $request)
    {
        $get_data = $request->all();

        $data=Product::query()
            ->when(Arr::get($get_data,'select_p'),function($query,$select_p){
                return $query
                    ->where('p_label','like',"%$select_p%")
                    ->orwhere('p_name','like',"%$select_p%")
                    ->orwhere('o_price','like',"%$select_p%");
            })
            ->paginate(4);

        return view('product_ek', ['list'=>$data,'page_list'=>$data,'total_list'=>$data->total()]);
    }

    /**
     * 看SQL的工具
     * @param $sql
     * @return string
     */
    public function getRawQuery($sql){
        $query = str_replace(array('?'), array('\'%s\''), $sql->toSql());
        $query = vsprintf($query, $sql->getBindings());
        return $query;
    }

    /**
     * getRawQuery 工具示範
     * @return void
     */
    public function exRawQuery(){
        $select_p = "微星";

        $data=Product::query()
            ->where('p_label','like',"%$select_p%");

        // 結果會印出 select * from `product` where `p_label` like '%微星%'
        return $this->getRawQuery($data);
    }

}
