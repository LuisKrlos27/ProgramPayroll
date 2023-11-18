<?php

namespace App\Http\Controllers;

use App\Models\LogNomina;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogNominaController extends Controller
{
    public function index(){
        //$log = LogNomina::get();
        $log = DB::select('SELECT * FROM "logNominas" as l inner join empleados as e on l.empleado_id=e.id');
        //dd($log);
        return view('configuration.logPayroll.logPayrollList', ['sueldos'=>$log]);
    }
    public function create(){
    }
    public function store(Request $request){
        $request = json_decode($request->input('sueldos'));
        //dd($request);
        foreach($request as $sueldo){
            DB::table('logNominas')->insert([
                'diasT'=> $sueldo->diasT,
                'horasExtras'=>$sueldo->horasExtras,
                'vhora'=>$sueldo->vhora,
                'bono'=>$sueldo->bono,
                'valorDevengado'=>$sueldo->valorDevengado,
                'valorDescuento'=>$sueldo->valorDescuento,
                'sueldoNeto'=>$sueldo->sueldoNeto,
                'fechaRegistro'=>(new DateTime())->format('Y-m-d'),
                'empleado_id'=>$sueldo->empleado_id

            ]);
        }
        return redirect()->route('logNomina.index');
    }
    public function show(){
    }
    public function edit($id){
    }
    public function update(Request $request){
    }
    public function destroy($id){
        
    }
    public function almacenar($sueldos){
        dd($sueldos);
    }
    public function estadistica(){
        $log = DB::select('SELECT e.nombres, e.apellidos, AVG(l."sueldoNeto") as promedio_sueldo
        FROM "logNominas" as l
        JOIN empleados as e ON e.id = l.empleado_id
        GROUP BY e.nombres, e.apellidos;
        ');

        //dd($log);

        $json="[";
        foreach($log as $obj){
            $json=$json."{";
            $json=$json.'"name":"'.$obj->nombres.' '.$obj->apellidos.''.'",';
            $json=$json.'"y":'.$obj->promedio_sueldo;     
            $json=$json."},";    
        }
        $json=$json."]";
        $json=str_replace(",]","]",$json);
        
        //dd($log, $json);

        return view('configuration.logPayroll.statistic',['datas'=> $json]);
    }
}