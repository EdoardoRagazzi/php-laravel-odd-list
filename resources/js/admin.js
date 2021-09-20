require('./bootstrap');

const deleteForm = document.querySelectorAll('.delete-post-form');

deleteForm.forEach(item => {
    item.addEventListener('submit', function (e) {
        const resp = confirm('Delete Confirm');

        // add the preventDefault per dirgli di non fare l operazione se non si pusha ok
        if (!resp) {
            e.preventDefault();
        }
    })
});