
// var dropBtn = document.querySelector('.dropBtn');
// var dropdown = document.querySelector('#myDropdown')
// var dropBtnChild = document.querySelector('.dropBtnChild');
// var dropdownChild = document.querySelector('#myDropDownMenu');
var homeDropBtn = document.querySelector('.home_dropBtn');
var homeDropContent = document.querySelector('#home_drop_content');

// dropBtn.addEventListener('click', () => {
//     if(dropdown.closest('.show')) {
//         dropdown.classList.remove("show");
//     }
//     else {
//         dropdown.classList.add("show");
//     }
// })

// dropBtnChild.addEventListener('click', () => {
//     if(dropdownChild.closest('.showChild')) {
//         dropdownChild.classList.remove("showChild");
//     }
//     else {
//         dropdownChild.classList.add("showChild");
//     }
// })

homeDropBtn.addEventListener('click', () => {
    if (homeDropContent.closest('.home_show')) {
        homeDropContent.classList.remove("home_show");
    }
    else {
        homeDropContent.classList.add("home_show");
    }
})

function slide() {
    const IMG_WIDTH = 1349;
    const slideContainer = document.querySelector('.slides');
    const slideImages = [...document.querySelectorAll('.slideImage')];
    slideContainer.style.width = `${slideImages.length * IMG_WIDTH}px`;

    let index = 0;

    function next() {
        if (index < slideImages.length - 1) {
            index++;
        } else {
            index = 0;
        }
        slideContainer.style.transform = `translateX(-${index * IMG_WIDTH}px)`;
    }

    function prev() {
        if (index === 0) {
            index = slideImages.length - 1;
        } else {
            index--;
        }
        slideContainer.style.transform = `translateX(-${index * IMG_WIDTH}px)`
    }

    document.querySelector('#pre_btn').addEventListener('click', () => {
        prev();
    })

    document.querySelector('#next_Btn').addEventListener('click', () => {
        next();
    })

    setInterval(() => {
        next();
    }, 6000)
}
slide();

function addToCart(id) {
    $.post('api/cookie.php', {
        'action': 'add',
        'id': id,
        'quantity': 1
    }, function (data) {
        location.reload()
    })
}

function deleteCart(id) {
    $.post('api/cookie.php', {
        'action': 'delete',
        'id': id
    }, function (data) {
        location.reload();
    })
}

function minusQuantity(id) {
    $.post('api/cookie.php', {
        'action': 'minus',
        'id': id
    }, function (data) {
        location.reload();
    })
}

function plusQuantity(id) {
    $.post('api/cookie.php', {
        'action': 'plus',
        'id': id
    }, function (data) {
        location.reload();
    })
}

function addwishList(id) {
    $.post('api/cookie.php', {
        'actionwishList': 'add',
        'actionwishList': 'show',
        'id': id
    }, function (data) {
        location.reload();
    })
}

function removewishList(id) {
    $.post('api/cookie.php', {
        'actionwishList': 'remove',
        'id': id
    }, function (data) {
        location.reload();
    })
}

