let toaster = {
    show:  function(data) {
        if (data.responseText !== undefined) {
            console.log("Response text: " + data.responseText);
            return;
        }
        let object = JSON.parse(data);
        console.log(object);
        if (object.error !== undefined)
            console.log(object.error);
        if (object.message !== undefined)
            console.log(object.message);
    }
};