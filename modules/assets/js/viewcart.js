
const btn_thanhtoan = $('.btn-action.checkout');
const btn_form = $('.order-form');

btn_thanhtoan.onclick = function () {
    this.style.display = "none"
    btn_form.style.display = "block"
}
