<div>
    @if($pageTitle != 'Settings')
        <a href="{{ route('admin.settings.add-location') }}" class="btn btn--sm">Delivery Locations</a>
    @endif
    @if($pageTitle != 'Generate Coupon')
        <a href=" {{ route('admin.settings.generate-coupon') }} " class="btn btn--sm">Coupons</a>
    @endif
    @if($pageTitle != 'Brands')
        <a href="{{ route('admin.brands') }}" class="btn btn--sm">Brand</a>
    @endif
</div>
