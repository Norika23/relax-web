<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ServiceRequest extends FormRequest { public function authorize():bool{return auth()->check();} public function rules():array{return ['name'=>['required','string','max:100'],'description'=>['nullable','string','max:1000'],'price'=>['required','integer','min:0'],'duration_minutes'=>['required','integer','min:1','max:600'],'buffer_minutes'=>['required','integer','min:0','max:180'],'display_order'=>['required','integer','min:0'],'is_active'=>['nullable','boolean']];} }
