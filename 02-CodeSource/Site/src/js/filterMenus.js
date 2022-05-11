let acc = document.getElementsByClassName("test");

for (let i = 0; i < acc.length; i++) 
{
    acc[i].addEventListener("click", function() 
    {
        let panel = this.nextElementSibling;
        let value = this.value;

        if (panel.style.maxHeight) 
        {
            value = value.replace("-", "+");
            panel.style.maxHeight = null;
        } 
        else 
        {
            value = value.replace("+", "-");
            panel.style.maxHeight = panel.scrollHeight + "px";
        } 
        this.value = value;
    });
}