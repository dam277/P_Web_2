function displayImage(t, width, height, alt)
{
    // let beacon = document.getElementsByClassName("books")
    // let image = document.createElement("img");
    // image.src = src;
    // image.width = width;
    // image.height = height;
    // image.alt = alt;

    let img = document.createElement("img");
    img.src = "http://www.google.com/intl/en_com/images/logo_plain.png";
    let src = document.getElementsByClassName("books[]");

    src.forEach(display);

    function display(position) 
    {
        position.appendChild(img);
    }
}