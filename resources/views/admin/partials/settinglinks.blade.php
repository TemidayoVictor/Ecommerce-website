<div>
    @if($pageTitle != 'Settings')
        <a href="{{ route('admin.settings') }}" class="btn btn--sm">Delivery Locations</a>
    @endif
    @if($pageTitle != 'Generate Coupon')
        <a href=" {{ route('admin.settings.generate-coupon') }} " class="btn btn--sm">Coupons</a>
    @endif
    @if($pageTitle != 'Sales')
        <a href=" {{ route('admin.settings.create-sales') }} " class="btn btn--sm">Sales</a>
    @endif
</div>
