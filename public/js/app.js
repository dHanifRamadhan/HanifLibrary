// 
// ==========================
// JavaScript Pemula By Hanif
// ==========================
// 

// const { document } = require("postcss");

document.addEventListener('DOMContentLoaded', function () {
    var checkLevelPassword = document.getElementsByClassName('check-level-password');

    if (checkLevelPassword) {
        Array.from(checkLevelPassword).forEach(function (checkLevelPassword) {
            var inputPassword = document.getElementById('password');

            if (inputPassword) {
                checkLevelPassword.addEventListener('input', function () {
                    inputPassword.classList.remove('border-slate-500');

                    if (inputPassword.value.length < 6) {
                        inputPassword.classList.remove('border-yellow-500');
                        inputPassword.classList.remove('border-green-600');
                        inputPassword.classList.add('border-red-600');
                    } else if (inputPassword.value.length >= 6 && inputPassword.value.length < 12) {
                        inputPassword.classList.remove('border-red-600');
                        inputPassword.classList.remove('border-green-600');
                        inputPassword.classList.add('border-yellow-500');
                    } else {
                        inputPassword.classList.remove('border-red-500');
                        inputPassword.classList.remove('border-yellow-500');
                        inputPassword.classList.add('border-green-600');
                    }
                });
            }
        });
    }


    var maxLengthNumberPhone = 12
    if (document.getElementById('number')) {
        document.getElementById('number').addEventListener('input', function (e) {
            var input = e.target;
            var inputValue = input.value;

            var cleaned = inputValue.replace(/\D/g, '');
            var formatted = cleaned.slice(0, 3) + '-' + cleaned.slice(3, 7) + '-' + cleaned.slice(7, maxLengthNumberPhone);
            input.value = formatted;
        })
    }


    if (document.getElementById("imageInput")) {
        document.getElementById("imageInput").addEventListener('input', function (e) {
            var preview = document.getElementById('preview')
            var imageInput = e.target

            if (imageInput.files[0]) {
                var reader = new FileReader()
                reader.onloadend = function () {
                    preview.src = reader.result
                    preview.classList.remove('hidden')
                    preview.classList.add('flex')
                }
                reader.readAsDataURL(imageInput.files[0])
            } else {
                preview.src = ''
                preview.classList.add("hidden")
                preview.classList.remove("flex")
            }
        })
    }

    var inputNoSpace = document.getElementsByClassName('input-no-space')
    if (inputNoSpace) {
        Array.from(inputNoSpace).forEach(function (inputNoSpace) {
            inputNoSpace.addEventListener('input', function (e) {
                e.target.value = e.target.value.replace(/\s/g, '')
            })
        })
    }

    if (document.getElementById('email')) {
        document.getElementById('email').addEventListener('input', function (e) {
            var inputEmail = e.target
            var check = document.getElementById('checkEmail')
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

            inputEmail.value = inputEmail.value.toLowerCase()

            if (regex.test(inputEmail.value)) {
                check.classList.remove('hidden')
                inputEmail.classList.remove('border-slate-500')
                inputEmail.classList.add('border-green-600')
            } else {
                check.classList.add('hidden')
                inputEmail.classList.remove('border-green-600')
                inputEmail.classList.add('border-slate-500')

            }
        })
    }

    if (document.getElementById('closeSession')) {
        document.getElementById('closeSession').addEventListener('click', function () {
            var modal = document.getElementById('modalSession')
            modal.classList.add('hidden')
        })
    }
});

function showPassword() {
    var password = document.getElementById('password');
    var show = document.getElementById('showPassword');
    var hidden = document.getElementById('hiddenPassword');

    if (password.type === 'password') {
        password.type = 'text';
        show.classList.remove('hidden');
        hidden.classList.add('hidden');
    } else {
        password.type = 'password';
        show.classList.add('hidden');
        hidden.classList.remove('hidden');
    }
}

function CurrentTime() {
    var currentTimeElement = document.getElementById('currentTime')
    currentTimeElement.innerText = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
}

if (document.getElementById('currentTime')) {
    document.addEventListener('DOMContentLoaded', function () {
        setInterval(CurrentTime, 1000)
    });
}

if (document.getElementById('price')) {
    document.getElementById('price').addEventListener('input', function (e) {
        var input = e.target

        input.value = input.value.replace(/\D/g, '')
    })
}

if (document.getElementById('create')) {
    document.getElementById('create').addEventListener('click', function () {
        var modal = document.getElementById('modal')
        modal.classList.remove('hidden')
        modal.classList.add('flex')
    })
}

if (document.getElementById('close')) {
    document.getElementById('close').addEventListener('click', function () {
        var modal = document.getElementById('modal')
        modal.classList.remove('flex')
        modal.classList.add('hidden')
    })
}

if (document.getElementById('moneyIndonesia')) {
    const moneyIndonesiaSpans = document.querySelectorAll('[id^="moneyIndonesia"]');

    moneyIndonesiaSpans.forEach(span => {
        const originValue = span.innerText;
        const formatValue = formatIndonesiaCurrency(originValue);
        span.innerText = formatValue;
    });

    function formatIndonesiaCurrency(value) {
        return Number(value).toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 2
        });
    }
}

// if (document.getElementById('refresh')) {
//     addEventListener('DOMContentLoaded', function () {
//         setInterval(function () {
//             var refresh = document.getElementById('refresh')
//             refresh.innerHTML = refresh.innerHTML
//         }, 1000);
//     })
// }