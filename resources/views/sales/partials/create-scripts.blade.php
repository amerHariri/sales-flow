<script>
    document.addEventListener('DOMContentLoaded', function () {

        const productSelect = document.getElementById('productSelect');
        const unitPriceInput = document.getElementById('unit_price');
        const quantityInput = document.getElementById('quantity');
        const totalAmountInput = document.getElementById('total_amount');

        // ✅ لو الصفحة ما فيها هذه العناصر، لا تعمل شيء (حتى ما يصير errors)
        if (!productSelect || !unitPriceInput || !quantityInput || !totalAmountInput) return;

        function calculateTotal() {
            const unitPrice = parseFloat(unitPriceInput.value) || 0;
            const quantity = parseFloat(quantityInput.value) || 0;
            totalAmountInput.value = (unitPrice * quantity).toFixed(2);
        }

        function syncPriceFromSelectedProduct() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            unitPriceInput.value = selectedOption?.dataset?.price || '';
        }

        // ✅ Events (تعمل في create و edit)
        productSelect.addEventListener('change', function () {
            syncPriceFromSelectedProduct();
            calculateTotal();
        });

        quantityInput.addEventListener('input', calculateTotal);

        // ✅ أهم سطرين: تهيئة الحالة عند فتح الصفحة (يحل مشكلة edit)
        syncPriceFromSelectedProduct();
        calculateTotal();
    });
</script>