<?php

/**
 * Total cart
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

/**
 * Total all Cart
 * 
 * @return mixed
 */
function tongCart()
{
    if (empty(Session::get('cart')) === false) {
        $products = Session::get('cart');
        $total = 0;
        foreach ($products as $value) {
            $total += (int)$value['total'];
        }

        return $total;
    }
}
