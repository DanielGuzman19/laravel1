<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Models\Patient;

class MenuController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function pago(){
        if (auth()->user()->tipo === 'secretaria') {
            return view('secretaria.pago');
        }    
    }

    public function registrarP(){
        if (auth()->user()->tipo === 'doctor') {
            return view('doctor.registrarP');
        }    
    }

    public function registrarPS(){
        if (auth()->user()->tipo === 'secretaria') {
            return view('secretaria.registrarPS');
        }    
    }

    public function agendarCitaS(){
        if (auth()->user()->tipo === 'secretaria') {
            $pacientes = Patient::all();
            return view('secretaria.agendarCitaS', compact('pacientes'));
        }    
    }

    public function index()
    {
        if (auth()->user()->tipo === 'secretaria') {
            return view('secretaria.dashboard');
        } elseif (auth()->user()->tipo === 'doctor') {
            return view('doctor.dashboard');
        } else{
            return view('dashboard');
        }
    }

}
