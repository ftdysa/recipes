
// Get the ul that holds the collection of tags
var ingredientsHolder = $('ul.ingredients');
var directionsHolder = $('ul.directions');

// setup an "add a tag" link
var $addIngredientLink = $('<a href="#" class="btn btn-primary small">Add an ingredient</a>');
var $addDirectionLink = $('<a href="#" class="btn btn-primary small">Add a direction</a>');
var $newLinkIng = $('<li></li>').append($addIngredientLink);
var $newLinkDir = $('<li></li>').append($addDirectionLink);

$(function() {
    // add the "add a tag" anchor and li to the tags ul
    ingredientsHolder.append($newLinkIng);
    directionsHolder.append($newLinkDir);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    ingredientsHolder.data('index', ingredientsHolder.find(':input').length);
    directionsHolder.data('index', directionsHolder.find(':input').length);

    $addIngredientLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addForm(ingredientsHolder, $newLinkIng);
    });

    $addDirectionLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addForm(directionsHolder, $newLinkDir);
    });
});

function addForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.data('prototype');

    // get the new index
    var index = collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}
