<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $purchasesMonth = DB::select('SELECT MONTHNAME(pu.purchase_date) AS mes, SUM(pu.total) AS total_mes
            FROM purchases pu
            WHERE pu.status = "VALID"
            GROUP BY monthname(pu.purchase_date)
            ORDER BY MONTH(pu.purchase_date) DESC LIMIT 12
        ');

        $salesMonth = DB::select('SELECT MONTHNAME(s.sale_date) AS mes, SUM(s.total) AS total_mes
            FROM sales s
            WHERE s.status = "VALID"
            GROUP BY MONTHNAME(s.sale_date)
            ORDER BY MONTH(s.sale_date) DESC LIMIT 12
        ');

        $salesDay = DB::select('
            SELECT DATE_FORMAT(s.sale_date, "%d/%m/%Y") AS dia, SUM(s.total) AS total_dia
            FROM sales s
            WHERE s.status = "VALID"
            GROUP BY DATE_FORMAT(s.sale_date, "%d/%m/%Y")
            ORDER BY MONTH(s.sale_date) LIMIT 25;

        ');

        $totals = DB::select('
            SELECT (SELECT IFNULL(SUM(pu.total), 0)
                    FROM purchases pu
                    WHERE  MONTHNAME(pu.purchase_date) = MONTHNAME(CURDATE()) AND pu.status = "VALID") AS total_compras,
                (SELECT IFNULL(SUM(s.total),0)
                    FROM sales s
                    WHERE MONTHNAME(s.sale_date) = MONTHNAME(CURDATE()) AND s.status = "VALID") AS total_ventas
        ');

        $productsSales = DB::select('
            SELECT p.code AS code, SUM(sd.quantity) AS quantity, p.name AS name, p.id AS id, p.stock AS stock
            FROM products p
            INNER JOIN sale_details sd on p.id = sd.product_id
            INNER JOIN sales s ON sd.sale_id = s.id
            WHERE s.status = "VALID" AND YEAR(s.sale_date) = YEAR(CURDATE())
            GROUP BY p.code, p.name, p.id, p.stock
            ORDER BY SUM(sd.quantity) DESC LIMIT 5;
        ');

        return view('admin.home', compact(
            'purchasesMonth',
            'salesMonth',
            'salesDay',
            'totals',
            'productsSales'
        ));
    }
}
