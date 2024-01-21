document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const quantityButtons = document.querySelectorAll('.quantity-btn');
    const selectAllBtn = document.getElementById('selectAllBtn');
    const totalAmountElement = document.getElementById('totalAmount');

    // Đặt tổng tiền mặc định là 0 khi trang được tải
    totalAmountElement.textContent = 'Tổng tiền: 0';

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            // Khi checkbox thay đổi, cập nhật tổng tiền
            updateTotalAmount();
        });
    });

    quantityButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            const action = this.classList.contains('increase') ? 'increase' : 'decrease';
            updateCartQuantity(productId, action);
        });
    });

    // Thêm sự kiện cho nút chọn tất cả
    selectAllBtn.addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const selectAll = this.checked;

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAll;
        });

        // Tính tổng tiền dựa trên sản phẩm được chọn
        updateTotalAmount();
    });

    function updateCartQuantity(productId, action) {
        axios.post('/update-cart', {
            productId: productId,
            action: action
        })
        .then(function (response) {
            // Cập nhật số lượng trong giao diện ngay lập tức
            const quantitySpan = document.querySelector(`.quantity[data-product-id="${productId}"]`);
            const newQuantity = response.data.quantity;
            quantitySpan.textContent = newQuantity;

            // Cập nhật tổng tiền
            updateTotalAmount();
        })
        .catch(function (error) {
            console.error('Error updating cart quantity', error);
        });
    }

    function updateTotalAmount() {
        // Lấy tất cả các checkbox được chọn
        const checkboxes = document.querySelectorAll('.product-checkbox:checked');
        const quantities = document.querySelectorAll('.quantity');
        const prices = document.querySelectorAll('.table td:nth-child(3)');

        // Tính toán tổng tiền mới dựa trên sản phẩm được chọn
        let newTotalAmount = 0;
        checkboxes.forEach(checkbox => {
            const productId = checkbox.getAttribute('data-product-id');
            const quantityIndex = Array.from(quantities).findIndex(el => el.getAttribute('data-product-id') === productId);
            const price = parseFloat(prices[quantityIndex].textContent);
            const quantity = parseInt(quantities[quantityIndex].textContent);
newTotalAmount += price * quantity;
        });

        // Cập nhật tổng tiền trong giao diện
        totalAmountElement.textContent = `Tổng tiền: ${newTotalAmount}`;
    }
});
