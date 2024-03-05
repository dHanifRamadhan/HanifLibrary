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

// LOAD
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('currentTime')) {
        setInterval(CurrentTime, 1000)
    }
})