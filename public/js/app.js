// =============================================== //
//                  Hanif Ramadhan                 //
// =============================================== //


if (document.getElementById('sessionModal') && document.getElementById('closeSession')) {
    var closeButton = document.getElementById('closeSession')
    var modal = document.getElementById('sessionModal')
    closeButton.addEventListener('click', function() {
        modal.classList.add('hidden');
    })
}

const CurrentTime = () => {
    var Times = document.getElementById('currentTime')
    Times.innerHTML = new Date().toLocaleTimeString([], {
        hour : '2-digit',
        minute : '2-digit',
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

if (inputRating && fullStar0 && fullStar1 && fullStar2 && fullStar3 && fullStar4 && star0 && star1 && star2 &&star3) {
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

// LOAD
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('currentTime')) {
        setInterval(CurrentTime, 1000)
    }
})