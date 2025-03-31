<div>
    @if($pageTitle != 'Products')
        <a href="{{ route('admin.add-products') }}" class="btn btn--sm">Add Products</a>
    @endif
    @if($pageTitle != 'Categories')
        <a href=" {{ route('admin.categories') }} " class="btn btn--sm">Categories</a>
    @endif
    @if($pageTitle != 'Brands')
        <a href="{{ route('admin.brands') }}" class="btn btn--sm">Brand</a>
    @endif
    @if($pageTitle != 'Kitchen')
        <a href="{{ route('admin.add-kitchen') }}" class="btn btn--sm">Kitchen</a>
    @endif
</div>
