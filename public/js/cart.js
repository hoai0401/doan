document.addEventListener('DOMContentLoaded', function () {
    const quantityButtons = document.querySelectorAll('.quantity-btn');

    quantityButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            const action = this.classList.contains('increase') ? 'increase' : 'decrease';
            updateCartQuantity(productId, action);
        });
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
        // Lấy tất cả các số lượng và giá từ các sản phẩm
        const quantities = document.querySelectorAll('.quantity');
        const prices = document.querySelectorAll('.table td:nth-child(2)');

        // Tính toán tổng tiền mới
        let newTotalAmount = 0;
        for (let i = 0; i < quantities.length; i++) {
            newTotalAmount += parseFloat(prices[i].textContent) * parseInt(quantities[i].textContent);
        }

        // Cập nhật tổng tiền trong giao diện
        document.getElementById('totalAmount').textContent = `Tổng tiền: ${newTotalAmount}`;
    }
});