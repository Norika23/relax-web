<form class="admin-form" method="post" action="{{ $staff ? route('demo.admin.staffs.update', $staff) : route('demo.admin.staffs.store') }}">
    @csrf
    @if($staff) @method('put') @endif
    <div class="field-grid">
        <label>名前<input class="booking-input" name="name" value="{{ old('name', $staff?->name) }}" required></label>
        <label>指名料<input class="booking-input" type="number" name="nomination_fee" value="{{ old('nomination_fee', $staff?->nomination_fee ?? 0) }}" required></label>
        <label>表示順<input class="booking-input" type="number" name="display_order" value="{{ old('display_order', $staff?->display_order ?? 0) }}" required></label>
        <label>写真パス<input class="booking-input" name="photo_path" value="{{ old('photo_path', $staff?->photo_path) }}"></label>
        <label>紹介文<textarea class="booking-input" name="bio">{{ old('bio', $staff?->bio) }}</textarea></label>
    </div>
    <fieldset><legend>担当メニュー</legend>
        @foreach($services as $service)
            <label><input type="checkbox" name="service_ids[]" value="{{ $service->id }}" @checked($staff?->services?->contains($service) ?? false)> {{ $service->name }}</label>
        @endforeach
    </fieldset>
    <label><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" @checked($staff?->is_active ?? true)> 公開</label>
    <label><input type="hidden" name="can_accept_reservations" value="0"><input type="checkbox" name="can_accept_reservations" value="1" @checked($staff?->can_accept_reservations ?? true)> 予約受付可</label>
    <button class="booking-primary">保存</button>
</form>
