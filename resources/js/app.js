// Đảm bảo rằng bạn import các module cần thiết
require('./bootstrap');

// Định nghĩa hàm confirmDelete
function confirmDelete(event) {
    event.preventDefault(); // Ngăn chặn form submit ngay lập tức
    if (confirm('Bạn có chắc chắn muốn xóa mục này không? Hành động này không thể hoàn tác.')) {
        event.target.submit(); // Submit form nếu người dùng xác nhận
    } else {
        alert('Dữ liệu không được xóa.');
    }
}

// Đảm bảo rằng hàm được gắn vào window để có thể truy cập từ mọi nơi
window.confirmDelete = confirmDelete;
