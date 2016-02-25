function validateForm() 
{
    if (typeof document.myForm.firstname == "undefined" || document.myForm.firstname.value == null || document.myForm.firstname.value.trim() == "") 
    {
        alert("Please enter a first name.");
        return false;
    }
    if (typeof document.myForm.lastname == "undefined" || document.myForm.lastname.value == null || document.myForm.lastname.value.trim() == "") 
    {
        alert("Please enter a last name.");
        return false;
    }
    if (typeof document.myForm.address1 == "undefined" || document.myForm.address1.value == null || document.myForm.address1.value.trim() == "") 
    {
        alert("Please enter an address.");
        return false;
    }
    if (typeof document.myForm.city == "undefined" || document.myForm.city.value == null || document.myForm.city.value.trim() == "") 
    {
        alert("Please enter a city name.");
        return false;
    }
    if (typeof document.myForm.state == "undefined" || document.myForm.state.value == null || document.myForm.state.value.trim().length != 2)
    {
        alert("Please enter a valid state.");
        return false;
    }
    if (typeof document.myForm.zip == "undefined" || document.myForm.zip.value == null || 
       (document.myForm.zip.value.trim().length != 9 && document.myForm.zip.value.trim().length != 5) ||
       !document.myForm.zip.value.trim().match(/^\d+$/))
    {
        alert("Please enter a valid zip code.");
        return false;
    }
    return true;
}