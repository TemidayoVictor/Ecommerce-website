<div>
    @if($pageTitle != 'Settings')
        <a href="{{ route('admin.settings.add-location') }}" class="btn btn--sm">Delivery Locations</a>
    @endif
    @if($pageTitle != 'Generate Coupon')
        <a href=" {{ route('admin.settings.generate-coupon') }} " class="btn btn--sm">Coupons</a>
    @endif
</div>
