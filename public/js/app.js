// =============================================== //
//                  Hanif Ramadhan                 //
// =============================================== //

if (document.getElementById('sessionModal') && document.getElementById('closeSession')) {
    var closeButton = document.getElementById('closeSession')
    var modalSession = document.getElementById('sessionModal')
    closeButton.addEventListener('click', function () {
        modalSession.classList.add('hidden')
    })
}

const CurrentTime = () => {
    var Times = document.getElementById('currentTime')
    Times.innerHTML = new Date().toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit',
    })
}

var info = document.getElementById('info')
var comments = document.getElementById('comments')
var description = document.getElementById('description')

var infoBook = document.getElementById('infoBook')
var commentBook = document.getElementById('commentsBook')
var descBook = document.getElementById('descBook')
if (info && comments && description) {
    info.addEventListener('click', () => {
        info.classList.remove('text-slate-400')
        comments.classList.remove('border-b')
        description.classList.remove('border-b')
        info.classList.add('border-b')
        comments.classList.add('text-slate-400')
        description.classList.add('text-slate-400')

        infoBook.classList.remove('hidden')
        commentBook.classList.add('hidden')
        descBook.classList.add('hidden')
        descBook.classList.remove('flex')
    })
    comments.addEventListener('click', () => {
        comments.classList.remove('text-slate-400')
        info.classList.remove('border-b')
        description.classList.remove('border-b')
        comments.classList.add('border-b')
        info.classList.add('text-slate-400')
        description.classList.add('text-slate-400')

        commentBook.classList.remove('hidden')
        infoBook.classList.add('hidden')
        descBook.classList.add('hidden')
        descBook.classList.remove('flex')
    })
    description.addEventListener('click', () => {
        description.classList.remove('text-slate-400')
        comments.classList.remove('border-b')
        info.classList.remove('border-b')
        description.classList.add('border-b')
        comments.classList.add('text-slate-400')
        info.classList.add('text-slate-400')

        descBook.classList.remove('hidden')
        commentBook.classList.add('hidden')
        infoBook.classList.add('hidden')
        descBook.classList.add('flex')
    })
}

var inputRating = document.getElementById('rating')

var fullStar0 = document.getElementById('star-full-0')
var fullStar1 = document.getElementById('star-full-1')
var fullStar2 = document.getElementById('star-full-2')
var fullStar3 = document.getElementById('star-full-3')
var fullStar4 = document.getElementById('star-full-4')

var star0 = document.getElementById('star-0')
var star1 = document.getElementById('star-1')
var star2 = document.getElementById('star-2')
var star3 = document.getElementById('star-3')

if (inputRating && fullStar0 && fullStar1 && fullStar2 && fullStar3 && fullStar4 && star0 && star1 && star2 && star3) {
    fullStar0.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.add('hidden')
        fullStar2.classList.add('hidden')
        fullStar3.classList.add('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.remove('hidden')
        star1.classList.remove('hidden')
        star2.classList.remove('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "2"
    })
    fullStar1.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.add('hidden')
        fullStar3.classList.add('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.add('hidden')
        star1.classList.remove('hidden')
        star2.classList.remove('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "4"
    })
    fullStar2.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.remove('hidden')
        fullStar3.classList.add('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.add('hidden')
        star1.classList.add('hidden')
        star2.classList.remove('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "6"
    })
    fullStar3.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.remove('hidden')
        fullStar3.classList.remove('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.add('hidden')
        star1.classList.add('hidden')
        star2.classList.add('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "8"
    })
    star0.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.add('hidden')
        fullStar3.classList.add('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.add('hidden')
        star1.classList.remove('hidden')
        star2.classList.remove('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "4"
    })
    star1.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.remove('hidden')
        fullStar3.classList.add('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.add('hidden')
        star1.classList.add('hidden')
        star2.classList.remove('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "6"
    })
    star2.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.remove('hidden')
        fullStar3.classList.remove('hidden')
        fullStar4.classList.add('hidden')

        star0.classList.add('hidden')
        star1.classList.add('hidden')
        star2.classList.add('hidden')
        star3.classList.remove('hidden')

        inputRating.value = "8"
    })
    star3.addEventListener('click', () => {
        fullStar0.classList.remove('hidden')
        fullStar1.classList.remove('hidden')
        fullStar2.classList.remove('hidden')
        fullStar3.classList.remove('hidden')
        fullStar4.classList.remove('hidden')

        star0.classList.add('hidden')
        star1.classList.add('hidden')
        star2.classList.add('hidden')
        star3.classList.add('hidden')

        inputRating.value = "10"
    })
}

var btnModal = document.getElementById('btn-modal')
var modal = document.getElementById('modal')
var btnCloseModal = document.getElementById('btn-close-modal')
if (btnModal && modal && btnCloseModal) {
    btnModal.addEventListener('click', () => {
        modal.classList.remove('hidden')
        modal.classList.add('flex')
    })
    btnCloseModal.addEventListener('click', () => {
        modal.classList.add('hidden')
        modal.classList.remove('flex')
    })
}

const HistoryModal = (btn, iconDown, iconUp, modal) => {
    var btn = document.getElementById(btn)
    var iconDown = document.getElementById(iconDown)
    var iconUp = document.getElementById(iconUp)
    var modal = document.getElementById(modal)
    if (btn && iconDown && iconUp && modal) {
        if (iconDown.classList.contains('hidden')) {
            iconDown.classList.remove('hidden')
            iconUp.classList.add('hidden')
            modal.classList.add('hidden')
            modal.classList.remove('animate-fade-down', 'animate-once', 'animate-duration-1500')
        } else {
            iconDown.classList.add('hidden')
            iconUp.classList.remove('hidden')
            modal.classList.remove('hidden')
            modal.classList.add('animate-fade-down', 'animate-once', 'animate-duration-1500')
        }
    }
}

var levelPassword = document.getElementsByClassName('level-password')
var inputPassword = document.getElementById('password')

if (levelPassword && inputPassword) {
    Array.from(levelPassword).forEach((levelPassword) => {
        levelPassword.addEventListener('input', () => {
            inputPassword.classList.remove('border-slate-500');

            if (inputPassword.value.length < 6) {
                inputPassword.classList.remove('border-orange-500')
                inputPassword.classList.remove('border-green-600')
                inputPassword.classList.add('border-red-600')
            } else if (inputPassword.value.length >= 6 && inputPassword.value.length < 12) {
                inputPassword.classList.remove('border-red-600')
                inputPassword.classList.remove('border-green-600')
                inputPassword.classList.add('border-orange-500')
            } else {
                inputPassword.classList.remove('border-red-600') // Corrected from 'border-red-500'
                inputPassword.classList.remove('border-orange-500')
                inputPassword.classList.add('border-green-600')
            }
        })
    })
}


var inputNoSpace = document.getElementById('no-space')
if (inputNoSpace) {
    Array.from(inputNoSpace).forEach((inputNoSpace) => {
        inputNoSpace.addEventListener('click', () => {
            inputNoSpace.value = inputNoSpace.value.replace(/\s/g, '')
        })
    })
}

var email = document.getElementById('email')
var checkEmail = document.getElementById('check-email')
var pathEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

if (email && checkEmail) {
    email.addEventListener('input', () => {
        email.value = email.value.toLowerCase()
        if (pathEmail.test(email.value)) {
            checkEmail.classList.remove('hidden')
            email.classList.remove('border-slate-500')
            email.classList.add('border-green-600')
        } else {
            checkEmail.classList.add('hidden')
            email.classList.add('border-slate-500')
            email.classList.remove('border-green-600')
        }
    })
}

var showPassword = document.getElementById('show-password')
var hiddenPassword = document.getElementById('hidden-password')

if (inputPassword && showPassword && hiddenPassword) {
    showPassword.addEventListener('click', () => {
        inputPassword.type = 'text'
        showPassword.classList.add('hidden')
        hiddenPassword.classList.remove('hidden')
    })
    hiddenPassword.addEventListener('click', () => {
        inputPassword.type = 'password'
        showPassword.classList.remove('hidden')
        hiddenPassword.classList.add('hidden')
    })
}

var number = document.getElementById('number')

if (number) {
    number.addEventListener('input', () => {
        var numberValue = number.value
        var clean = numberValue.replace(/\D/g, '')
        var format = clean.slice(0, 3) + '-' + clean.slice(3, 7) + '-' + clean.slice(7, 12)
        number.value = format
    })
}

var imageInput = document.getElementById('image-input')
var imagePreview = document.getElementById('image-preview')
var imageFileReader = new FileReader()

if (imageInput && imagePreview) {
    imageInput.addEventListener('input', () => {
        if (imageInput.files[0]) {
            imageFileReader.onloadend = () => {
                imagePreview.src = imageFileReader.result
                imagePreview.classList.remove('hidden')
                imagePreview.classList.add('flex')
            }
            imageFileReader.readAsDataURL(imageInput.files[0])
        } else {
            imagePreview.src = ''
            imagePreview.classList.remove('flex')
            imagePreview.classList.add('hidden')
        }
    })
}

var inputUpdate = document.getElementById('officer-updated-id')
var inputDelete = document.getElementById('officer-deleted-id')
var checkboxOfficer = document.querySelectorAll('.checkbox-officer-id')

if (inputDelete && inputUpdate && checkboxOfficer) {
    checkboxOfficer.forEach((data) => {
        data.addEventListener('change', () => {
            let valueId = ''
            checkboxOfficer.forEach((checkbox) => {
                if (checkbox.checked) {
                    valueId += checkbox.value + ','
                }
            })
            inputUpdate.value = valueId.slice(0, -1)
            inputDelete.value = valueId.slice(0, -1)
        })
    })
}

var customerCoin = document.getElementById('customer-coin-id')
var customerBan = document.getElementById('customer-ban-id')
var customerDelete = document.getElementById('customer-delete-id')
var customerCheckBox = document.querySelectorAll('.checkbox-customer-id')

// if (customerCoin && customerUpdate && customerBan && customerDelete && customerCheckBox) {
    customerCheckBox.forEach((data) => {
        data.addEventListener('change', () => {
            let valueId = ''
            customerCheckBox.forEach((checkbox) => {
                if (checkbox.checked) {
                    valueId += checkbox.value + ','
                }
            })
            customerCoin.value = valueId.slice(0, -1)
            customerUpdate.value = valueId.slice(0, -1)
            customerBan.value = valueId.slice(0, -1)
            customerDelete.value = valueId.slice(0, -1)
        })
    })
// }

// LOAD
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('currentTime')) {
        setInterval(CurrentTime, 1000)
    }
})