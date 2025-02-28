<div>
    @if($pageTitle != 'Products')
        <a href="{{ route('admin.add-products') }}" class="btn btn--sm">Products</a>
    @endif
    @if($pageTitle != 'Categories')
        <a href=" {{ route('admin.categories') }} " class="btn btn--sm">Categories</a>
    @endif
    @if($pageTitle != 'Brands')
        <a href="{{ route('admin.brands') }}" class="btn btn--sm">Brand</a>
    @endif
</div>
