<?php

namespace App\Http\Requests;

use App\Enums\ReservationSource;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array { return [
        'service_id'=>['required','integer','exists:services,id'],'staff_id'=>['required','integer','exists:staffs,id'],
        'starts_at'=>['required','date','after:now'],'customer_name'=>['required','string','max:100'],
        'phone'=>['required','string','max:30','regex:/^[0-9+()\-\s]+$/'],'email'=>['required','email:rfc','max:255'],
        'notes'=>['nullable','string','max:1000'],'source'=>['nullable',Rule::enum(ReservationSource::class)],
    ]; }
    public function messages(): array { return [
        'customer_name.required'=>'お名前を入力してください。','phone.required'=>'電話番号を入力してください。',
        'phone.regex'=>'電話番号を正しく入力してください。','email.required'=>'メールアドレスを入力してください。',
        'email.email'=>'メールアドレスを正しく入力してください。','starts_at.after'=>'未来の時間を選択してください。',
    ]; }
    public function after(): array { return [function(Validator $validator){
        $service=Service::find($this->integer('service_id')); $staff=Staff::find($this->integer('staff_id'));
        if ($service && $staff && ($service->shop_id !== $staff->shop_id || ! $staff->services()->whereKey($service->id)->exists()))
            $validator->errors()->add('staff_id','このスタッフは選択したメニューを担当できません。');
    }]; }
}
