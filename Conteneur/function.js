// If a pop up is display, it will be hide in 5 seconds
if(document.getElementById("popUp"))
{
    window.setTimeout(hidePopUp, 5000);
}
function hidePopUp()
{
    document.getElementById("popUp").style.visibility = "hidden";
}

// Check if date format matches when input loses his focus
var birth_regex = /\d\d.\d\d.\d\d\d\d/;
document.getElementById("birth-date").onblur = function(e)
{
    if(!birth_regex.test(e.target.value))
    {
        document.getElementById("bad-date").style.display = "block";
        controlOnKeyUp()
    }
    if(birth_regex.test(e.target.value))
    {
        document.getElementById("bad-date").style.display = "none";
    }
}
// If regex doesn't match it will check each time when the user releases a touch
function controlOnKeyUp()
{
    document.getElementById("birth-date").onkeyup = function(e)
    {
        if(birth_regex.test(e.target.value))
        {
            document.getElementById('bad-date').style.display = "none";
        }
    }
}

// Check if date format matches when input loses his focus
var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
document.getElementById("email").onblur = function(e)
{
    console.log('coucou');
    if(!email_regex.test(e.target.value))
    {
        document.getElementById("bad-email").style.display = "block";
        controlOnKeyUp()
    }
    if(email_regex.test(e.target.value))
    {
        document.getElementById("bad-email").style.display = "none";
    }
}
// If regex doesn't match it will check each time when the user releases a touch. Then, the information will be displayed until the format matches
function controlOnKeyUp()
{
    document.getElementById("email").onkeyup = function(e)
    {
        if(email_regex.test(e.target.value))
        {
            document.getElementById('bad-email').style.display = "none";
        }
    }
}


// When button "Supprimer les utilisateurs" has been clicked
document.getElementById("buttonDelSelectedUser").onclick = function()
{
    var delUsers = []; 
    var postDelUsers = [];

    // catch all checkboxes, their value and push them into delUsers []. 
    $('#table input:checkbox:checked').each(function()
    {
        delUsers.push($(this).val());
    })
    for (var i = 0; i < delUsers.length; i++)
    {
        // values of delUsers element is name and email of users to delete so I split to display only the name in the modal.
        var delUserToSplit = delUsers[i]
        var delUser = delUserToSplit.split(',')
        var delUserElt = document.createElement("li");
        delUserElt.textContent = delUser[0];
        
        // PostdelUsers is the email to the user which will be the value of the input. It will content all the email user to delete 
        postDelUsers.push(delUser[1])

        document.getElementById("userToDel").appendChild(delUserElt);
    }
    postDelUsers.toString();
    var postDelUserElt = document.createElement("input");
    postDelUserElt.type = "hidden";
    postDelUserElt.name="userToDel";
    postDelUserElt.value = postDelUsers;
    document.getElementById("formUserToDel").appendChild(postDelUserElt);
}
document.getElementById("annulerUserToDel").onclick = function()
{
    document.getElementById("userToDel").innerHTML = "";
    document.getElementById("formUserToDel").innerHTML = "";
}


    



