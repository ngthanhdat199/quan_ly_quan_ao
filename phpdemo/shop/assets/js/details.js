function related() {
    const IMG_PRODUCT = 448;
    const productContainer = document.querySelector('.row_details')
    const product = [...document.querySelectorAll('.product')];
    productContainer.style.width = `${IMG_PRODUCT*product.length}px`

    var index = localStorage.getItem('slide')
    function nextProduct() {
        if (index < product.length - 3) {
            index++;
            localStorage.setItem('slide',index);
        }
        else {
            return;
        }
        productContainer.style.transform = `translateX(-${index * IMG_PRODUCT}px)`
    }

    function preProduct() {
        if (index === 0) {
            return 
        }
        else {
            index--;
            localStorage.setItem('slide',index);
        }
        productContainer.style.transform = `translateX(-${index * IMG_PRODUCT}px)`
    }

    var preBtn = document.querySelector('#pre_product');
    var nextBtn = document.querySelector('#next_product');
    function hidden() {
        if (index == 0) {
            preBtn.classList.add('hidden');
        } else {
            preBtn.classList.remove('hidden'); 
        }
        if (index == product.length - 3) {
            nextBtn.classList.add('hidden');
        } else {
            nextBtn.classList.remove('hidden');
        }
    }
    hidden();
    preBtn.addEventListener('click', () => {
        preProduct();
        hidden();
    })

    nextBtn.addEventListener('click', () => {
        nextProduct();
        hidden();
    })

    function saveSlide() {
        var index = localStorage.getItem('slide');
        productContainer.style.transform = `translateX(-${index * IMG_PRODUCT}px)`
    }
    saveSlide();
    // localStorage.removeItem('slide');
}
related();
