function generateRandomString() {
    // generate two random segment of strings and returns it
    return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
}

function instantiateCollection(collection) {

    let addButton = document.createElement('button');
    addButton.type = 'button';
    addButton.classList.add('btn');
    addButton.innerText = 'Add new Address';

    addButton.addEventListener('click', function() {
        collection.innerHTML += collection.dataset.prototype.replace('__name__', generateRandomString());
    });

    collection.parentNode.insertBefore(addButton, collection);
}

document.addEventListener('DOMContentLoaded', function () {
    let collections = document.querySelectorAll('[data-prototype]');
    collections.forEach(function (collection) {
        instantiateCollection(collection);
    });
});
