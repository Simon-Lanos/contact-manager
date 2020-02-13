function generateRandomString() {
    // generate two random segment of strings and returns it
    return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
}

function instantiateCollection(collection) {
    //create the add button
    let addButton = document.createElement('button');
    addButton.type = 'button';
    //add styling and content
    addButton.classList.add('btn');
    addButton.classList.add('btn-success');
    addButton.innerText = 'Add new';

    //attach click handler to it
    addButton.addEventListener('click', function() {
        //append a new form prototype at the end of the collection
        //need to replace __name__ to avoid id collision
        collection.innerHTML += collection.dataset.prototype.replace('__name__', generateRandomString());
    });

    //appends it to the begining of the collection
    collection.parentNode.insertBefore(addButton, collection);
}

document.addEventListener('DOMContentLoaded', function () {
    let collections = document.querySelectorAll('[data-prototype]');
    collections.forEach(function (collection) {
        instantiateCollection(collection);
    });
});
