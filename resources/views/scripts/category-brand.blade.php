<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#category').change(function () {
        let categoryId = $(this).val();
        let brandDropdown = $('#brand');

        brandDropdown.html('<option value="">Select Brand</option>'); // Reset brands
        brandDropdown.prop('disabled', true); // Disable brand dropdown initially

        if (categoryId) {
            $.ajax({
                url: `/admin/get-brands/${categoryId}`,
                type: 'GET',
                success: function (response) {
                    if (response.length > 0) {
                        brandDropdown.prop('disabled', false); // Enable if brands exist
                        response.forEach(function (brand) {
                            brandDropdown.append(`<option value="${brand.id}">${brand.name}</option>`);
                        });
                    }
                }
            });
        }
    });
});
</script>