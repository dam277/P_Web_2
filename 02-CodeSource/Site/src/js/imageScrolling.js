let _books;     // Global array of all the 5 last books

 // Set the position of the images into 3 variables
 let book1 = document.getElementById("book1");
 let book2 = document.getElementById("book2");
 let book3 = document.getElementById("book3");

/// ---- FUNCTION = onLoad = ----
/// Recover the 5 last books on the load 
/// of the homepage and set them into a table
/// ---
/// book1 => First of the 5 books
/// book2 => Second of the 5 books
/// book3 => Third of the 5 books
/// book4 => Fourth of the 5 books
/// book5 => fifth of the 5 books
/// ---
/// Set a global variable into this table
function onLoad(book1, book2, book3, book4, book5) 
{
    let books = Array();    // Array of books

    //Push all the books into the array
    books.push(book1);
    books.push(book2);
    books.push(book3);
    books.push(book4);
    books.push(book5);

    // Set the global variable
    _books = books;
}

/// ---- FUNCTION = moveLeft = ----
/// rotates by 1 to the left the list of books
/// to exchange their place, in order to display
/// them in this new position on the homepage
function moveLeft()
{
    // Set a variable to have the book which will move to the other side of the array
    let lastBook = _books[0];  

    // Exchange the places of the table by 1 to the left
    for (let i = 0; i < _books.length; i++) 
    {
        if(i < _books.length - 1)
        {
            _books[i] = _books[i + 1];
        }
        else
        {
            _books[i] = lastBook;
        }
    }

    // Change the image on the page
    book1.src=_books[0];
    book2.src=_books[1];
    book3.src=_books[2];
}

/// ---- FUNCTION = moveRight = ----
/// rotates by 1 to the right the list of books
/// to exchange their place, in order to display
/// them in this new position on the homepage
function moveRight()
{
    // Set a variable to have the book which will move to the other side of the array
    let lastBook = _books[_books.length - 1];

    // Exchange the places of the table by 1 to the right
    for (let i = _books.length - 1; i >= 0; i--) 
    {
        if (i > 0) 
        {
            _books[i] = _books[i - 1];
        }
        else
        {
            _books[i] = lastBook;
        }
    }

    // Change the image on the page
    book1.src=_books[0];
    book2.src=_books[1];
    book3.src=_books[2];
}