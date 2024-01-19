<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    const imgPosition = document.querySelectorAll(".slider-container img")
    const imgContainer = document.querySelector(".slider-container")
    const dotItem = document.querySelectorAll(".dot")
    let imgSlider = imgPosition.length
    let index = 0
    // console.log(imgPosition)
    imgPosition.forEach(function(image, index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click", function(){
            slider(index)
        })
    })
    function imgSlide(){
        index++;
        if(index >= imgSlider){
            index = 0
        }
        slider(index)

    }

    function slider(index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }

     document.querySelector('.user-panel').addEventListener('mouseover', function () {
        // Show the dropdown content
        document.querySelector('.dropdown-content').style.display = 'block';
        document.getElementById('user-name').classList.add('active');
    });

    document.querySelector('.user-panel').addEventListener('mouseout', function () {
        // Hide the dropdown content
        document.querySelector('.dropdown-content').style.display = 'none';
        document.getElementById('user-name').classList.remove('active');
    });


$(document).ready( function () {
    $('#myTable').DataTable();
} );

//product-show
    $(document).ready(function () {
        var images = $('.hinh');
        var thumbnailsContainer = $('.thumbnails-container');

        // Ẩn nút chuyển ảnh khi chỉ có một ảnh
        if (images.length <= 1) {
            thumbnailsContainer.hide();
        }

        // Tạo ảnh nhỏ tương ứng với số lượng ảnh
        for (var i = 0; i < images.length; i++) {
            var thumbnail = $('<img class="thumbnail">');
            thumbnail.attr('src', images.eq(i).attr('src'));
            thumbnail.attr('alt', images.eq(i).attr('alt'));
            thumbnailsContainer.append(thumbnail);

            // Xử lý sự kiện khi ảnh nhỏ được nhấn
            thumbnail.on('click', function () {
                var index = $(this).index();
                showImage(index);
            });
        }

        // Hiển thị ảnh đầu tiên và làm cho ảnh nhỏ tương ứng trở thành active
        showImage(0);

        // Hàm hiển thị ảnh và ảnh nhỏ tương ứng
        function showImage(index) {
            images.hide();
            images.eq(index).show();
            $('.thumbnail').removeClass('active');
            $('.thumbnail').eq(index).addClass('active');
        }
    });

//car
<script src="{{ asset('js/js.js') }}" defer></script>
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
                    const newQuantity = response.data.quantity; // Sửa đổi ở đây
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

