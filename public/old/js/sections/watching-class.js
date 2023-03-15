const showAllComment = document.querySelector('#showAllComment');
const moreComments = document.querySelector('#moreComments');

showAllComment.onclick = () => {
    moreComments.classList.toggle('show_all');
}