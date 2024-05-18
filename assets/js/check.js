function validateEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function validatePassword(password) {
    // Kiểm tra mật khẩu không có khoảng trắng
    if (/\s/.test(password)) {
        return false;
    }

    // Kiểm tra độ dài mật khẩu
    if (password.length < 8 || password.length > 16) {
        return false;
    }
    return true;
}

function isEmpty(value) {
    return value.trim() === '';
}
function checkEmptyAndHighlight(inputElement) {
    if (isEmpty(inputElement.val())) {
        return inputElement.css('border', '1px solid red');
    }
}
$('input').on('input', function() {
    $(this).css('border', '');
});

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}